 <div
    class="card content flex-1 flex flex-col"
    x-data="{
                showModal: false,
                modalTemplate: '',
            }"
>
    <div class="table-header flex justify-between items-center">
        <h1 class="text-lg font-bold">Teacher List</h1>
        <div class="flex items-center gap-3">
            <div class="border border-2 border-gray-500 px-3 py-1 rounded-md">
                <input class="outline-none text-sm" type="text" />
                <i class="fa-solid fa-magnifying-glass text-sm"></i>
            </div>
            <button class="px-5 py-2 bg-[#F4C300] border border-2 border-[#F4C300] rounded-lg font-bold text-black text-xs" @click="showModal = true; modalTemplate = 'create'">ADD NEW TEACHER</button>
            <i class="fa-solid fa-ellipsis-vertical cursor-pointer"></i>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>TEACHER ID</th>
                    <th>TEACHER NAME</th>
                    <th>USERNAME</th>
                    <th>STATUS</th>
                    <th>LAST LOGIN</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr>
                    <td>#{{ $teacher->id }} <i class="fa-regular fa-copy cursor-pointer text-gray-400"></i></td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>
                        <span class="{{ $teacher->is_disabled ? 'text-red-400' : 'text-green-400' }}">•</span> 
                        {{ $teacher->is_disabled ? 'Disabled' : 'Active' }}
                    </td>
                    <td>{{ $teacher->updated_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="flex gap-3">
                            <i class="fa-solid fa-pen-to-square cursor-pointer hover:scale-125" 
                               @click="showModal = true; modalTemplate = 'edit'; $wire.targetID({{ $teacher->id }})"></i>
                            <i class="fa-solid fa-trash-can cursor-pointer hover:scale-125"
                               @click="showModal = true; modalTemplate = 'delete'; $wire.targetID({{ $teacher->id }})"></i>
                            <i class="fa-solid {{ $teacher->is_disabled ? 'fa-user-check' : 'fa-user-xmark' }} cursor-pointer hover:scale-125"
                               wire:click="toggleStatus({{ $teacher->id }})"
                               title="{{ $teacher->is_disabled ? 'Enable Teacher' : 'Disable Teacher' }}"></i>
                        </div>
                    </td>
                </tr>
                @endforeach
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
            <button class="absolute right-7 top-7 text-gray-400 hover:text-gray-200" @click="showModal = false">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Create / Edit Modal -->
            <template x-if="modalTemplate === 'create' || modalTemplate === 'edit'">
                <div class="flex flex-col gap-5">
                    <h2 class="text-xl font-semibold" x-text="modalTemplate === 'create' ? 'Create Teacher' : 'Edit Teacher'"></h2>

                    <div>
                        <label class="block mb-1">Teacher Full Name:</label>
                        <input type="text" wire:model="fullname" class="border rounded w-full p-2 text-black" />
                        @error('fullname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block mb-1">Email Address:</label>
                        <input type="email" wire:model="username" class="border rounded w-full p-2 text-black" />
                        @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <template x-if="modalTemplate === 'create'">
                        <div>
                            <label class="block mb-1">Password:</label>
                            <input type="password" wire:model="password" class="border rounded w-full p-2 text-black" />
                            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </template>

                    <div>
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
                            @click="showModal = false; modalTemplate === 'create' ? $wire.submit() : $wire.update();"
                            class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800"
                        >
                            <span x-text="modalTemplate === 'create' ? 'Confirm' : 'Update'"></span>
                        </button>
                    </div>
                </div>
            </template>

            <!-- Delete Confirmation -->
            <div class="flex flex-col gap-5" x-show="modalTemplate === 'delete'">
                <h2 class="text-xl font-semibold -mb-2">Delete Teacher</h2>
                <p>Are you sure you want to delete this teacher?</p>

                <div class="flex justify-end gap-3">
                    <button @click="showModal = false" class="px-4 py-2 border border-gray-500 rounded hover:bg-gray-700">Cancel</button>
                    <button @click="showModal = false; $wire.delete()" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Confirm</button>
                </div>
            </div>
        </div>
    </div> 
</div>