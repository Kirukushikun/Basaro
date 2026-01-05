<div 
    class="flex-1 overflow-y-auto scrolling pr-4 mb-5"
    x-data="{ 
        showModal: false, 
        modalType: '' 
    }"
    @close-modal.window="showModal = false"
>
    <!-- Profile Information Card -->
    <div class="card flex flex-col gap-4 mb-4">
        <div class="">
            <h1 class="text-base font-bold">Profile Information</h1>
            <p class="text-sm text-[#ADADAD]">Manage your profile and account settings</p>
        </div>
        
        <div class="flex flex-col gap-2 w-[100%] lg:w-[50%]">
            <label class="text-xs" for="fullname">Full Name:</label>
            <input 
                type="text" 
                id="fullname"
                wire:model="fullname"
                class="text-xs rounded-md px-3 py-2 border border-[#ADADAD] bg-transparent text-white"
                placeholder="Enter your full name"
            />
            @error('fullname') 
                <span class="!text-red-500 text-xs">{{ $message }}</span> 
            @enderror
        </div>

        <div class="flex flex-col gap-2 w-[100%] lg:w-[50%]">
            <label class="text-xs" for="username">Username:</label>
            <input 
                type="text" 
                id="username"
                wire:model="username"
                class="text-xs rounded-md px-3 py-2 border border-[#ADADAD] bg-transparent text-white"
                placeholder="Enter your username"
                readonly
            />
            @error('username') 
                <span class="!text-red-500 text-xs">{{ $message }}</span> 
            @enderror
        </div>

        <button 
            @click="showModal = true; modalType = 'profile'"
            class="px-4 py-2 bg-[#F4C300] border border-2 border-[#F4C300] rounded-lg !font-bold text-black text-xs w-fit hover:scale-105"
        >
            SAVE CHANGES
        </button>
    </div>

    <!-- Update Password Card -->
    <div class="card flex flex-col gap-4">
        <div class="">
            <h1 class="text-base font-bold">Update Password</h1>
            <p class="text-sm text-[#ADADAD]">Ensure your account is using a long, unique password to stay secure</p>
        </div>
        
        <div class="flex flex-col gap-2 w-[100%] lg:w-[50%]">
            <label class="text-xs" for="current_password">Current Password:</label>
            <input 
                type="password" 
                id="current_password"
                wire:model="current_password"
                class="text-xs rounded-md px-3 py-2 border border-[#ADADAD] bg-transparent text-white"
                placeholder="Enter current password"
                autocomplete="current-password"
            />
            @error('current_password') 
                <span class="!text-red-500 text-xs">{{ $message }}</span> 
            @enderror
        </div>

        <div class="flex flex-col gap-2 w-[100%] lg:w-[50%]">
            <label class="text-xs" for="new_password">New Password:</label>
            <input 
                type="password" 
                id="new_password"
                wire:model="new_password"
                class="text-xs rounded-md px-3 py-2 border border-[#ADADAD] bg-transparent text-white"
                placeholder="Enter new password (min 6 characters)"
                autocomplete="new-password"
            />
            @error('new_password') 
                <span class="!text-red-500 text-xs">{{ $message }}</span> 
            @enderror
        </div>

        <div class="flex flex-col gap-2 w-[100%] lg:w-[50%]">
            <label class="text-xs" for="new_password_confirmation">Confirm Password:</label>
            <input 
                type="password" 
                id="new_password_confirmation"
                wire:model="new_password_confirmation"
                class="text-xs rounded-md px-3 py-2 border border-[#ADADAD] bg-transparent text-white"
                placeholder="Confirm new password"
                autocomplete="new-password"
            />
            @error('new_password_confirmation') 
                <span class="!text-red-500 text-xs">{{ $message }}</span> 
            @enderror
        </div>

        <button 
            @click="showModal = true; modalType = 'password'"
            class="px-4 py-2 bg-[#F4C300] border border-2 border-[#F4C300] rounded-lg !font-bold text-black text-xs w-fit hover:scale-105"
        >
            UPDATE PASSWORD
        </button>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="px-4 py-2 my-4 bg-red-400 border border-2 border-red-400 rounded-lg font-bold text-black text-xs w-fit">
            LOG OUT
        </button>
    </form>

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
        class="fixed inset-0 flex items-center justify-center z-50 p-4"
        @click.self="showModal = false"
    >
        <div class="relative bg-[#31343A] p-6 rounded-lg shadow-lg w-full max-w-[20rem]">
            <button class="absolute right-5 top-5 text-gray-400 hover:text-gray-200" @click="showModal = false">
                <i class="fa-solid fa-xmark text-base"></i>
            </button>

            <!-- Profile Update Confirmation -->
            <template x-if="modalType === 'profile'">
                <div class="flex flex-col gap-4">
                    <h2 class="text-base font-semibold -mb-2">Update Profile</h2>
                    <p class="text-sm">Are you sure you want to update your profile information?</p>

                    <div class="flex justify-end gap-2">
                        <button 
                            @click="showModal = false" 
                            class="px-3 py-2 border border-gray-500 rounded text-sm hover:bg-gray-700"
                        >
                            Cancel
                        </button>
                        <button 
                            @click="$wire.updateProfile()"
                            :disabled="$wire.isUpdatingProfile"
                            class="px-3 py-2 bg-[#F4C300] text-black rounded text-sm hover:bg-yellow-500 disabled:opacity-50 disabled:cursor-not-allowed font-bold"
                            x-text="$wire.isUpdatingProfile ? 'Updating...' : 'Confirm'"
                        ></button>
                    </div>
                </div>
            </template>

            <!-- Password Update Confirmation -->
            <template x-if="modalType === 'password'">
                <div class="flex flex-col gap-4">
                    <h2 class="text-base font-semibold -mb-2">Update Password</h2>
                    <p class="text-sm">Are you sure you want to update your password?</p>

                    <div class="flex justify-end gap-2">
                        <button 
                            @click="showModal = false" 
                            class="px-3 py-2 border border-gray-500 rounded text-sm hover:bg-gray-700"
                        >
                            Cancel
                        </button>
                        <button 
                            @click="$wire.updatePassword(); showModal = false"
                            :disabled="$wire.isUpdatingPassword"
                            class="px-3 py-2 bg-[#F4C300] text-black rounded text-sm hover:bg-yellow-500 disabled:opacity-50 disabled:cursor-not-allowed font-bold"
                            x-text="$wire.isUpdatingPassword ? 'Updating...' : 'Confirm'"
                        ></button>
                    </div>
                </div>
            </template>
        </div>
    </div>     
</div>