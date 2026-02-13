<div
    class="card content flex-1 flex flex-col"
    x-data="{ showModal: false }"
>
    <div class="table-header flex justify-between items-center">
        <h1 class="text-lg font-bold">Performance Report</h1>
        <div class="flex items-center gap-3">
            <div class="border border-2 border-gray-500 px-3 py-1 rounded-md">
                <input 
                    wire:model.live.debounce.300ms="search"
                    class="outline-none text-sm bg-transparent" 
                    type="text" 
                    placeholder="Search students..."
                />
                <i class="fa-solid fa-magnifying-glass text-sm"></i>
            </div>
            <i class="fa-solid fa-ellipsis-vertical cursor-pointer"></i>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>STUDENT ID</th>
                    <th>STUDENT NAME</th>
                    <th>GRADE LEVEL</th>
                    <th>CURRENT PROGRESS</th>
                    <th>AVERAGE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $user)
                    @php
                        $completed = $user->trackings->where('status', 'completed');
                        $currentLesson = $user->trackings->max('lesson_id') ?? 0;
                        $average = $completed->count()
                            ? round(
                                $completed->avg(function ($track) {
                                    if (!$track->lesson || $track->lesson->total_scores == 0) {
                                        return 0;
                                    }
                                    return ($track->score / $track->lesson->total_scores) * 100;
                                }),
                                1
                            )
                            : 0;
                    @endphp

                    <tr>
                        <td>#{{ $user->id }} <i class="fa-regular fa-copy cursor-pointer text-gray-400" onclick="navigator.clipboard.writeText('{{ $user->id }}')"></i></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->grade_level ?? 'N/A' }}</td>
                        <td>
                            <div class="flex items-center gap-2">
                                <div class="w-32 bg-gray-700 rounded-full h-2">
                                    <div 
                                        class="bg-[#F4C300] h-2 rounded-full" 
                                        style="width: {{ $totalLessons > 0 ? ($currentLesson / $totalLessons) * 100 : 0 }}%"
                                    ></div>
                                </div>
                                <span class="text-xs text-gray-400">{{ $currentLesson }}/{{ $totalLessons }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="font-semibold {{ $average >= 85 ? 'text-green-400' : ($average >= 75 ? 'text-yellow-400' : 'text-red-400') }}">
                                {{ number_format($average, 1) }}%
                            </span>
                        </td>
                        <td>
                            <button
                                wire:click="viewStudentProgress({{ $user->id }})"
                                @click="showModal = true"
                                class="text-blue-400 hover:underline flex items-center gap-1"
                                title="View Detailed Progress"
                            >
                                <i class="fa-solid fa-eye"></i> View
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-8">
                            @if($search)
                                No students found matching "{{ $search }}"
                            @else
                                No students found
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->


    <!-- Backdrop -->
    <div x-show="showModal" x-transition.opacity class="fixed inset-0 bg-black/30 z-40" @click="showModal = false; $wire.closeModal()"></div>

    <!-- Student Progress Detail Modal -->
    <div
        x-show="showModal"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 flex items-center justify-center z-50"
        @click.self="showModal = false; $wire.closeModal()"
    >
        @if($selectedStudent)
        <div class="relative bg-[#31343A] p-8 rounded-lg shadow-lg w-[50rem] max-h-[90vh] overflow-hidden flex flex-col">
            <button class="absolute right-7 top-7 text-gray-400 hover:text-gray-200" @click="showModal = false; $wire.closeModal()">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Header -->
            <div class="mb-6">
                <h2 class="text-2xl font-bold mb-2">{{ $selectedStudent->name }}</h2>
                <div class="flex gap-4 text-sm text-gray-400">
                    <span>ID: #{{ $selectedStudent->id }}</span>
                    <span>•</span>
                    <span>{{ $selectedStudent->email }}</span>
                    <span>•</span>
                    <span>Grade: {{ $selectedStudent->grade_level ?? 'N/A' }}</span>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div class="bg-gray-800 p-4 rounded-lg">
                    <div class="text-2xl font-bold text-[#F4C300]">{{ $studentProgress['completed'] ?? 0 }}</div>
                    <div class="text-xs text-gray-400">Completed</div>
                </div>
                <div class="bg-gray-800 p-4 rounded-lg">
                    <div class="text-2xl font-bold text-blue-400">{{ $studentProgress['in_progress'] ?? 0 }}</div>
                    <div class="text-xs text-gray-400">In Progress</div>
                </div>
                <div class="bg-gray-800 p-4 rounded-lg">
                    <div class="text-2xl font-bold text-green-400">{{ number_format($studentProgress['average_score'] ?? 0, 1) }}%</div>
                    <div class="text-xs text-gray-400">Average Score</div>
                </div>
                <div class="bg-gray-800 p-4 rounded-lg">
                    <div class="text-2xl font-bold text-purple-400">{{ $studentProgress['total_lessons'] ?? 0 }}</div>
                    <div class="text-xs text-gray-400">Total Lessons</div>
                </div>
            </div>

            <!-- Pre/Post Test Row -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-gray-800 p-4 rounded-lg flex items-center justify-between">
                    <div>
                        <div class="text-xs text-gray-400 mb-1">Pretest Score</div>
                        @if($studentProgress['pretest'] ?? null)
                            <div class="text-xl font-bold text-[#F4C300]">{{ $studentProgress['pretest']['score'] }}</div>
                        @else
                            <div class="text-xl font-bold text-gray-500">Not taken</div>
                        @endif
                    </div>
                    <i class="fa-solid fa-clipboard-list text-2xl text-gray-600"></i>
                </div>
                <div class="bg-gray-800 p-4 rounded-lg flex items-center justify-between">
                    <div>
                        <div class="text-xs text-gray-400 mb-1">Posttest Score</div>
                        @if($studentProgress['posttest'] ?? null)
                            <div class="text-xl font-bold text-green-400">{{ $studentProgress['posttest']['score'] }}</div>
                        @else
                            <div class="text-xl font-bold text-gray-500">Not taken</div>
                        @endif
                    </div>
                    <i class="fa-solid fa-flag-checkered text-2xl text-gray-600"></i>
                </div>
            </div>

            <!-- Lessons Progress Table -->
            <div class="flex-1 overflow-y-auto scrolling pr-2">
                <h3 class="font-semibold mb-3">Lesson Progress</h3>
                <table class="w-full">
                    <thead class="sticky top-0 bg-[#31343A]">
                        <tr class="text-left text-xs text-gray-400 border-b border-gray-700">
                            <th class="pb-2">LESSON</th>
                            <th class="pb-2">STATUS</th>
                            <th class="pb-2">SCORE</th>
                            <th class="pb-2">PERCENTAGE</th>
                            <th class="pb-2">ATTEMPTS</th>
                            <th class="pb-2">DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($studentProgress['lessons'] ?? [] as $lesson)
                        <tr class="border-b border-gray-700/50 text-sm">
                            <td class="py-3">
                                <span class="font-medium">Lesson {{ $lesson['lesson_id'] }}</span>
                                <div class="text-xs text-gray-500">{{ $lesson['lesson_title'] }}</div>
                            </td>
                            <td class="py-3">
                                @if($lesson['status'] === 'completed')
                                    <span class="px-2 py-1 bg-green-900 text-green-200 rounded text-xs">Completed</span>
                                @else
                                    <span class="px-2 py-1 bg-blue-900 text-blue-200 rounded text-xs">In Progress</span>
                                @endif
                            </td>
                            <td class="py-3">{{ $lesson['score'] }} / {{ $lesson['total_score'] }}</td>
                            <td class="py-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-20 bg-gray-700 rounded-full h-2">
                                        <div 
                                            class="h-2 rounded-full {{ $lesson['percentage'] >= 85 ? 'bg-green-400' : ($lesson['percentage'] >= 75 ? 'bg-yellow-400' : 'bg-red-400') }}" 
                                            style="width: {{ $lesson['percentage'] }}%"
                                        ></div>
                                    </div>
                                    <span class="text-xs {{ $lesson['percentage'] >= 85 ? 'text-green-400' : ($lesson['percentage'] >= 75 ? 'text-yellow-400' : 'text-red-400') }}">
                                        {{ number_format($lesson['percentage'], 1) }}%
                                    </span>
                                </div>
                            </td>
                            <td class="py-3 text-gray-400">{{ $lesson['attempts'] }}</td>
                            <td class="py-3 text-gray-400 text-xs">{{ $lesson['completed_at'] ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-8 text-gray-500">No progress data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer Actions -->
            <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-700">
                <button 
                    @click="showModal = false; $wire.closeModal()" 
                    class="px-4 py-2 border border-gray-500 rounded hover:bg-gray-700"
                >
                    Close
                </button>
            </div>
        </div>
        @endif
    </div>
</div>