<div
    class="card content flex-1 flex flex-col"
    x-data="{
        showModal: false,
        modalTemplate: '',
    }"
>
    <div class="table-header flex justify-between items-center mb-4">
        <h1 class="text-lg font-bold">Teacher List</h1>
        <div class="flex items-center gap-3">
            <div class="border border-2 border-gray-500 px-3 py-1 rounded-md">
                <input 
                    wire:model.live.debounce.300ms="search"
                    class="outline-none text-sm bg-transparent" 
                    type="text" 
                    placeholder="Search teachers..."
                />
                <i class="fa-solid fa-magnifying-glass text-sm"></i>
            </div>
            <button class="px-5 py-2 bg-[#F4C300] border border-2 border-[#F4C300] rounded-lg font-bold text-black text-xs" @click="showModal = true; modalTemplate = 'create'">ADD NEW TEACHER</button>
            <i class="fa-solid fa-ellipsis-vertical cursor-pointer"></i>
        </div>
    </div>

    {{-- Table scrolls independently; pagination stays pinned below it --}}
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>TEACHER ID</th>
                    <th>TEACHER NAME</th>
                    <th>USERNAME</th>
                    <th>ROLE</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $teacher)
                <tr>
                    <td>#{{ $teacher->id }} <i class="fa-regular fa-copy cursor-pointer text-gray-400" onclick="navigator.clipboard.writeText('{{ $teacher->id }}')"></i></td>
                    <td>
                        {{ $teacher->name }}
                        @if($teacher->id === Auth::id())
                            <span class="text-xs text-gray-400 italic ml-2">(You)</span>
                        @endif
                    </td>
                    <td>{{ $teacher->email }}</td>
                    <td>
                        <span class="px-2 py-1 rounded text-xs font-semibold {{ $teacher->role === 'admin' ? 'bg-purple-900 text-purple-200' : 'bg-blue-900 text-blue-200' }}">
                            {{ ucfirst($teacher->role) }}
                        </span>
                    </td>
                    <td>
                        <span class="{{ $teacher->is_disabled ? 'text-red-400' : 'text-green-400' }}">•</span> 
                        {{ $teacher->is_disabled ? 'Disabled' : 'Active' }}
                    </td>
                    <td>
                        @if($teacher->id === Auth::id())
                            <span class="text-gray-500 text-sm italic">Edit in Profile</span>
                        @else
                            <div class="flex gap-3">
                                <i class="fa-solid fa-pen-to-square cursor-pointer hover:scale-125 text-blue-400" 
                                   @click="showModal = true; modalTemplate = 'edit'; $wire.targetID({{ $teacher->id }})"
                                   title="Edit Teacher"></i>
                                <i class="fa-solid fa-key cursor-pointer hover:scale-125 text-yellow-400"
                                   @click="showModal = true; modalTemplate = 'reset'; $wire.targetID({{ $teacher->id }})"
                                   title="Reset Password"></i>
                                <i class="fa-solid fa-trash-can cursor-pointer hover:scale-125 text-red-400"
                                   @click="showModal = true; modalTemplate = 'delete'; $wire.targetID({{ $teacher->id }})"
                                   title="Delete Teacher"></i>
                                <i class="fa-solid {{ $teacher->is_disabled ? 'fa-user-check' : 'fa-user-xmark' }} cursor-pointer hover:scale-125 {{ $teacher->is_disabled ? 'text-green-400' : 'text-gray-400' }}"
                                   wire:click="toggleStatus({{ $teacher->id }})"
                                   title="{{ $teacher->is_disabled ? 'Enable Teacher' : 'Disable Teacher' }}"></i>
                            </div>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500 py-8">
                        @if($search)
                            No teachers found matching "{{ $search }}"
                        @else
                            No teachers found
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination is OUTSIDE .table-container so it stays pinned at the card bottom --}}
    <div class="pt-3 border-t border-gray-600 flex-shrink-0">
        <x-pagination :paginator="$teachers" />
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
                    <h2 class="text-xl font-semibold">Create Teacher</h2>

                    <div class="input-group">
                        <label class="block mb-1">Teacher Full Name:</label>
                        <input type="text" wire:model="fullname" class="border rounded w-full p-2 text-black" />
                        @error('fullname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-group">
                        <label class="block mb-1">Email Address:</label>
                        <input type="email" wire:model="username" class="border rounded w-full p-2 text-black" />
                        @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-group">
                        <label class="block mb-1">Password:</label>
                        <input type="password" wire:model="password" class="border rounded w-full p-2 text-black" />
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-group">
                        <label class="block mb-1">Role:</label>
                        <select wire:model="role" class="border rounded w-full p-2 text-black">
                            <option value="">Select Role</option>
                            <option value="teacher">Teacher</option>
                            <option value="admin">Admin</option>
                        </select>
                        @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end gap-3">
                        <button @click="showModal = false; $wire.clear()" class="px-4 py-2 border border-gray-500 rounded hover:bg-gray-700">Cancel</button>
                        <button
                            @click="$wire.submit()"
                            :disabled="$wire.isSubmitting"
                            class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800 disabled:opacity-50 disabled:cursor-not-allowed"
                            x-text="$wire.isSubmitting ? 'Creating...' : 'Confirm'"
                        ></button>
                    </div>
                </div>
            </template>

            <!-- Edit Modal -->
            <template x-if="modalTemplate === 'edit'">
                <div class="flex flex-col gap-5">
                    <h2 class="text-xl font-semibold">Edit Teacher</h2>

                    <div class="input-group">
                        <label class="block mb-1">Teacher Full Name:</label>
                        <input type="text" wire:model="fullname" class="border rounded w-full p-2 text-black" />
                        @error('fullname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-group">
                        <label class="block mb-1">Email Address:</label>
                        <input type="email" wire:model="username" class="border rounded w-full p-2 text-black" />
                        @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-group">
                        <label class="block mb-1">Role:</label>
                        <select wire:model="role" class="border rounded w-full p-2 text-black">
                            <option value="">Select Role</option>
                            <option value="teacher">Teacher</option>
                            <option value="admin">Admin</option>
                        </select>
                        @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end gap-3">
                        <button @click="showModal = false; $wire.clear()" class="px-4 py-2 border border-gray-500 rounded hover:bg-gray-700">Cancel</button>
                        <button
                            @click="$wire.update()"
                            :disabled="$wire.isUpdating"
                            class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800 disabled:opacity-50 disabled:cursor-not-allowed"
                            x-text="$wire.isUpdating ? 'Updating...' : 'Update'"
                        ></button>
                    </div>
                </div>
            </template>

            <!-- Reset Password Modal -->
            <template x-if="modalTemplate === 'reset'">
                <div class="flex flex-col gap-5">
                    <h2 class="text-xl font-semibold">Reset Password</h2>
                    <p class="text-gray-300">Enter a new password for this teacher.</p>

                    <div class="input-group">
                        <label class="block mb-1">New Password:</label>
                        <input type="password" wire:model="password" class="border rounded w-full p-2 text-black" placeholder="Minimum 6 characters" />
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end gap-3">
                        <button @click="showModal = false; $wire.clear()" class="px-4 py-2 border border-gray-500 rounded hover:bg-gray-700">Cancel</button>
                        <button 
                            @click="$wire.resetPassword()"
                            :disabled="$wire.isResetting"
                            class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 disabled:opacity-50 disabled:cursor-not-allowed"
                            x-text="$wire.isResetting ? 'Resetting...' : 'Reset Password'"
                        ></button>
                    </div>
                </div>
            </template>

            <!-- Delete Confirmation -->
            <template x-if="modalTemplate === 'delete'">
                <div class="flex flex-col gap-5">
                    <h2 class="text-xl font-semibold -mb-2">Delete Teacher</h2>
                    <p>Are you sure you want to delete this teacher?</p>

                    <div class="flex justify-end gap-3">
                        <button @click="showModal = false" class="px-4 py-2 border border-gray-500 rounded hover:bg-gray-700">Cancel</button>
                        <button 
                            @click="$wire.delete()"
                            :disabled="$wire.isDeleting"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 disabled:opacity-50 disabled:cursor-not-allowed"
                            x-text="$wire.isDeleting ? 'Deleting...' : 'Confirm'"
                        ></button>
                    </div>
                </div>
            </template>
        </div>
    </div> 
</div>