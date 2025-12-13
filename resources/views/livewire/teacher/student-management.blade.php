<div
    class="card content flex-1 flex flex-col"
    x-data="{ showModal: false, modalTemplate: '' }"
>
    <div class="table-header flex justify-between items-center">
        <h1 class="text-lg font-bold">Student List</h1>
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
            <button class="px-5 py-2 bg-[#F4C300] border border-2 border-[#F4C300] rounded-lg font-bold text-black text-xs" @click="showModal = true; modalTemplate = 'create';">ADD NEW STUDENT</button>
            <i class="fa-solid fa-ellipsis-vertical cursor-pointer"></i>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>STUDENT ID</th>
                    <th>STUDENT NAME</th>
                    <th>USERNAME</th>
                    <th>STATUS</th>
                    <th>LAST LOGIN</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr>
                    <td>#{{ $student->id }} <i class="fa-regular fa-copy cursor-pointer text-gray-400" onclick="navigator.clipboard.writeText('{{ $student->id }}')"></i></td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td><span class="text-green-400">•</span> Active</td>
                    <td>
                        @if($student->last_login_at)
                            {{ $student->last_login_at->format('d/m/Y H:i') }}
                        @else
                            <span class="text-gray-500">Never</span>
                        @endif
                    </td>
                    <td>
                        <div class="flex gap-3">
                            <i class="fa-solid fa-pen-to-square cursor-pointer hover:scale-125 text-blue-400" 
                               @click="showModal = true; modalTemplate = 'edit'; $wire.targetID({{ $student->id }})"
                               title="Edit Student"></i>
                            <i class="fa-solid fa-key cursor-pointer hover:scale-125 text-yellow-400"
                               @click="showModal = true; modalTemplate = 'reset'; $wire.targetID({{ $student->id }})"
                               title="Reset Password"></i>
                            <i class="fa-solid fa-trash-can cursor-pointer hover:scale-125 text-red-400"
                               @click="showModal = true; modalTemplate = 'delete'; $wire.targetID({{ $student->id }})"
                               title="Delete Student"></i>
                        </div>
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

    <!-- Backdrop -->
    <div x-show="showModal" x-transition.opacity class="fixed inset-0 bg-black/30 z-40" @click="showModal = false"></div>

    <!-- Modal Container -->
    <div
        x-show="showModal"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 flex items-center justify-center z-50"
        @click.self="showModal = false"
    >
        <div class="relative bg-[#31343A] p-8 rounded-lg shadow-lg w-[26rem]">
            <button class="absolute right-7 top-7 text-gray-400 hover:text-gray-200" @click="showModal = false; $wire.clear()">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Create Modal -->
            <template x-if="modalTemplate === 'create'">
                <div class="flex flex-col gap-5">
                    <h2 class="text-xl font-semibold">Create Student</h2>

                    <div class="input-group">
                        <label class="block mb-1">Student Full Name:</label>
                        <input type="text" wire:model="fullname" class="border rounded w-full p-2 text-black" />
                        @error('fullname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-group">
                        <label class="block mb-1">Student Username:</label>
                        <input type="text" wire:model="username" class="border rounded w-full p-2 text-black" />
                        @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-group">
                        <label class="block mb-1">Password:</label>
                        <input type="password" wire:model="password" class="border rounded w-full p-2 text-black" />
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-group">
                        <label class="block mb-1">Grade Level:</label>
                        <input type="text" wire:model="grade_level" class="border rounded w-full p-2 text-black" />
                        @error('grade_level') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-group">
                        <label class="block mb-1">Assigned Teacher:</label>
                        <input type="text" wire:model="assigned_teacher" class="border rounded w-full p-2 text-black" />
                        @error('assigned_teacher') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end gap-3">
                        <button @click="showModal = false; $wire.clear()" class="px-4 py-2 border border-gray-500 rounded hover:bg-gray-700">Cancel</button>
                        <button
                            @click="showModal = false; $wire.submit();"
                            class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800"
                        >
                            Confirm
                        </button>
                    </div>
                </div>
            </template>

            <!-- Edit Modal -->
            <template x-if="modalTemplate === 'edit'">
                <div class="flex flex-col gap-5">
                    <h2 class="text-xl font-semibold">Edit Student</h2>

                    <div class="input-group">
                        <label class="block mb-1">Student Full Name:</label>
                        <input type="text" wire:model="fullname" class="border rounded w-full p-2 text-black" />
                        @error('fullname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-group">
                        <label class="block mb-1">Student Username:</label>
                        <input type="text" wire:model="username" class="border rounded w-full p-2 text-black" />
                        @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-group">
                        <label class="block mb-1">Grade Level:</label>
                        <input type="text" wire:model="grade_level" class="border rounded w-full p-2 text-black" />
                        @error('grade_level') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-group">
                        <label class="block mb-1">Assigned Teacher:</label>
                        <input type="text" wire:model="assigned_teacher" class="border rounded w-full p-2 text-black" />
                        @error('assigned_teacher') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end gap-3">
                        <button @click="showModal = false; $wire.clear()" class="px-4 py-2 border border-gray-500 rounded hover:bg-gray-700">Cancel</button>
                        <button
                            @click="showModal = false; $wire.update();"
                            class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800"
                        >
                            Update
                        </button>
                    </div>
                </div>
            </template>

            <!-- Reset Password Modal -->
            <template x-if="modalTemplate === 'reset'">
                <div class="flex flex-col gap-5">
                    <h2 class="text-xl font-semibold">Reset Password</h2>
                    <p class="text-gray-300">Enter a new password for this student.</p>

                    <div class="input-group">
                        <label class="block mb-1">New Password:</label>
                        <input type="password" wire:model="password" class="border rounded w-full p-2 text-black" placeholder="Minimum 6 characters" />
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end gap-3">
                        <button @click="showModal = false; $wire.clear()" class="px-4 py-2 border border-gray-500 rounded hover:bg-gray-700">Cancel</button>
                        <button @click="showModal = false; $wire.resetPassword()" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">Reset Password</button>
                    </div>
                </div>
            </template>

            <!-- Delete Confirmation -->
            <template x-if="modalTemplate === 'delete'">
                <div class="flex flex-col gap-5">
                    <h2 class="text-xl font-semibold -mb-2">Delete Student</h2>
                    <p>Are you sure you want to delete this student?</p>

                    <div class="flex justify-end gap-3">
                        <button @click="showModal = false" class="px-4 py-2 border border-gray-500 rounded hover:bg-gray-700">Cancel</button>
                        <button @click="showModal = false; $wire.delete()" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Confirm</button>
                    </div>
                </div>
            </template>
        </div>
    </div> 
</div>