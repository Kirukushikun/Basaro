<?php

namespace App\Livewire;

use App\Models\UserTest;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Pretest extends Component
{
    public array $answers = [];         // ['1' => 'A', '2' => 'B', ...]
    public ?UserTest $firstAttempt = null;
    public bool $hasFirstAttempt = false;

    // -------------------------------------------------------
    // Answer key — keyed by question number
    // -------------------------------------------------------

    private array $answerKey = [
        1  => 'B', 2  => 'B', 3  => 'A', 4  => 'C', 5  => 'A',
        6  => 'A', 7  => 'A', 8  => 'C', 9  => 'B', 10 => 'B',
        11 => 'B', 12 => 'C', 13 => 'A', 14 => 'C', 15 => 'C',
        16 => 'A', 17 => 'B', 18 => 'C', 19 => 'C', 20 => 'C',
        21 => 'A', 22 => 'B', 23 => 'C', 24 => 'C', 25 => 'A',
        26 => 'C', 27 => 'B', 28 => 'C', 29 => 'A', 30 => 'A',
        31 => 'A', 32 => 'C', 33 => 'B', 34 => 'A', 35 => 'A',
        36 => 'C', 37 => 'B', 38 => 'C', 39 => 'B', 40 => 'A',
        41 => 'A', 42 => 'A', 43 => 'A', 44 => 'A', 45 => 'B',
        46 => 'A', 47 => 'B', 48 => 'A', 49 => 'B', 50 => 'C',
    ];

    // -------------------------------------------------------
    // Lifecycle
    // -------------------------------------------------------

    public function mount(): void
    {
        $userId = Auth::id();

        $this->hasFirstAttempt = UserTest::hasFirstAttempt($userId, 'pretest');
        $this->firstAttempt    = UserTest::getFirstAttempt($userId, 'pretest');

        // Pre-fill answers from first attempt (read-only display)
        if ($this->firstAttempt) {
            $this->answers = $this->firstAttempt->answers;
        }
    }

    // -------------------------------------------------------
    // Submit
    // -------------------------------------------------------

    public function submit(): void
    {
        $userId = Auth::id();

        // Validate — all 50 questions must be answered
        $unanswered = array_diff(
            range(1, 50),
            array_keys(array_filter($this->answers, fn($a) => $a !== null && $a !== ''))
        );

        if (count($unanswered) > 0) {
            $this->noreloadNotif(
                'failed',
                'Hindi Kumpleto',
                'Dapat sagutin ang lahat ng ' . count($unanswered) . ' katanungang hindi pa nasasagot.'
            );
            return;
        }

        // Score the answers
        $score = 0;
        foreach ($this->answerKey as $num => $correct) {
            if (isset($this->answers[$num]) && strtoupper($this->answers[$num]) === $correct) {
                $score++;
            }
        }

        $attemptNumber = UserTest::nextAttemptNumber($userId, 'pretest');
        $isFirst       = $attemptNumber === 1;

        UserTest::create([
            'user_id'  => $userId,
            'type'     => 'pretest',
            'answers'  => $this->answers,
            'score'    => $score,
            'attempt'  => $attemptNumber,
            'is_first' => $isFirst,
        ]);

        // Redirect to lessons with a flash notification
        $this->reloadNotif(
            'success',
            'Naisumite na!',
            "Nakuha mo ang {$score} sa 50 sa BASARO Pretest. Maaari ka nang magsimula sa mga aralin!"
        );

        $this->redirect('/lessons');
    }

    // -------------------------------------------------------
    // Retry — clear answers, unlock form (first attempt stays in DB)
    // -------------------------------------------------------

    public function retryTest(): void
    {
        $this->answers        = [];
        $this->hasFirstAttempt = false;
    }

    // -------------------------------------------------------
    // Render
    // -------------------------------------------------------

    public function render()
    {
        return view('livewire.pretest');
    }

    // -------------------------------------------------------
    // Notification helpers
    // -------------------------------------------------------

    private function noreloadNotif(string $type, string $header, string $message): void
    {
        $this->dispatch('notif', type: $type, header: $header, message: $message);
    }

    private function reloadNotif(string $type, string $header, string $message): void
    {
        session()->flash('notif', [
            'type'    => $type,
            'header'  => $header,
            'message' => $message,
        ]);
    }
}