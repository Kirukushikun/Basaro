<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Lesson;
use App\Models\Note;
use App\Models\UserTrack;
use Illuminate\Support\Facades\DB;

class DashboardStudent extends Component
{   

    public $notes;
    public $noteTitle = '';
    public $noteContent = '';
    public $selectedNoteId;
    public $selectedNote;

    public $message;

    protected $rules = [
        'noteTitle' => 'required|min:3|max:255',
        'noteContent' => 'required|min:5',
    ];

    public function mount()
    {
        $this->loadNotes();
    }

    public function loadNotes()
    {
        try {
            $this->notes = Note::where('user_id', auth()->id())
                ->latest()
                ->get();

        } catch (\Exception $e) {
            $this->noreloadNotif('failed', 'Error', 'Unable to load notes.');
        }
    }

    public function createNote()
    {
        try {
            $this->validate();

            Note::create([
                'user_id' => auth()->id(),
                'title' => $this->noteTitle,
                'content' => $this->noteContent,
            ]);

            $this->reset(['noteTitle', 'noteContent']);
            $this->loadNotes();

            // notification without reload
            $this->noreloadNotif('success', 'Success', 'Note created successfully!');

        } catch (\Exception $e) {

            // notify error without reload
            $this->noreloadNotif('failed', 'Error', 'Failed to create note.');
        }
    }

    public function updatedSelectedNoteId($value)
    {
        try {
            $this->selectedNote = Note::find($value);

            if (!$this->selectedNote) {
                $this->noreloadNotif('failed', 'Not Found', 'Note does not exist.');
            }

        } catch (\Exception $e) {
            $this->noreloadNotif('failed', 'Error', 'Unable to load selected note.');
        }
    }

    public function render()
    {
        try {
            $user = Auth::user();
            $hasPretest = \App\Models\UserTest::hasFirstAttempt($user->id, 'pretest');
            $hasPosttest = \App\Models\UserTest::hasFirstAttempt($user->id, 'posttest');
            $allLessonsComplete = $user->current_lesson > 20 || 
                                ($user->current_lesson == 20 && $user->current_progress == 100);

            $lesson = null;
            if ($hasPretest) {
                $lesson = \App\Models\Lesson::find($user->current_lesson);
            }

            $this->message = DB::table('note')->first() ?? null;

        } catch (\Exception $e) {
            $this->reloadNotif('failed', 'Error', 'Could not load the lesson.');
            $hasPretest = false;
            $hasPosttest = false;
            $allLessonsComplete = false;
            $lesson = null;
        }

        return view('livewire.dashboard-student', compact(
            'lesson', 'hasPretest', 'hasPosttest', 'allLessonsComplete'
        ));
    }

    public function deleteNote()
    {
        try {
            // make sure something is selected
            if (!$this->selectedNoteId) {
                $this->noreloadNotif('failed', 'Error', 'No note selected.');
                return;
            }

            $note = Note::where('user_id', auth()->id())
                ->where('id', $this->selectedNoteId)
                ->first();

            if (!$note) {
                $this->noreloadNotif('failed', 'Error', 'Note not found.');
                return;
            }

            $note->delete();

            // refresh notes
            $this->loadNotes();

            // clear selected note since it's deleted
            $this->selectedNote = null;
            $this->selectedNoteId = null;

            // success notification
            $this->noreloadNotif('success', 'Deleted', 'Note deleted successfully.');

        } catch (\Exception $e) {
            $this->noreloadNotif('failed', 'Error', 'Failed to delete note.');
        }
    }


    private function noreloadNotif($type, $header, $message)
    {
        $this->dispatch('notif', type: $type, header: $header, message: $message);
    }

    private function reloadNotif($type, $header, $message)
    {
        session()->flash('notif', [
            'type' => $type,
            'header' => $header,
            'message' => $message
        ]);
    }
}
