<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{asset('img/icon.ico')}}" type="image/x-icon" />
        <link rel="stylesheet" href="{{asset('css/student.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <div 
            x-data="{
                notifs: [],

                addNotif(type, header, message) {
                    let id = Date.now();

                    // 🔥 push new notification to the TOP
                    this.notifs.unshift({ id, type, header, message, show: true });

                    // fade-out after 4s
                    setTimeout(() => {
                        let n = this.notifs.find(n => n.id === id);
                        if (n) n.show = false;

                        // remove from array after transition
                        setTimeout(() => {
                            this.notifs = this.notifs.filter(n => n.id !== id);
                        }, 500);

                    }, 4000);
                }
            }"

            x-init="
                @if(session('notif'))
                    setTimeout(() => {
                        addNotif(
                            '{{ session('notif.type') }}',
                            '{{ session('notif.header') }}',
                            '{{ session('notif.message') }}'
                        );
                    }, 500);
                @endif

                window.addEventListener('notif', (event) => {
                    let n = event.detail;
                    addNotif(n.type, n.header, n.message);
                });
            "

            class="absolute top-10 right-10 z-50 flex flex-col gap-4"
        >

            <template x-for="n in notifs" :key="n.id">
                <div 
                    x-show="n.show"
                    x-transition:enter="transition transform ease-out duration-500"
                    x-transition:enter-start="-translate-y-5 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition transform ease-in duration-500"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0 -translate-y-5"
                    class="notification w-auto !bg-[#31343A] flex flex-col px-15 py-7 whitespace-nowrap rounded-lg border-solid shadow-xl"
                >
                    <div class="notif-header font-bold text-lg flex items-center relative">
                        <i x-show="n.type === 'success'" class="fa-regular fa-circle-check absolute -left-8 !text-green-500 text-xl"></i>
                        <i x-show="n.type === 'failed'" class="fa-regular fa-circle-xmark absolute -left-8 !text-red-500 text-xl"></i>
                        <span x-text="n.header"></span>
                        <i class="fa-solid fa-xmark absolute -right-8 text-gray-500 hover:text-gray-300 text-xl cursor-pointer"
                            @click="n.show = false"></i>
                    </div>

                    <div class="notif-body text-md text-gray-300" x-text="n.message"></div>
                </div>
            </template>
        </div>
        <!-- Loading Screen -->
        <div id="page-loader">
            <div class="loader-spinner"></div>
            <p class="loader-text">Loading...</p>
        </div>

        <!-- Navbar -->
        <nav class="nav hidden md:flex">
            <img class="logo" src="{{asset('img/logo-light.png')}}" alt="">
            <div class="nav-links" id="nav-links">
                <a href="/dashboard" class="!text-xs  {{ request()->is('dashboard*') ? 'active' : '' }}">Dashboard</a>
                <a href="/lessons" class="!text-xs  {{ request()->is('lessons*') || request()->is('lesson-view*') ? 'active' : '' }}">Lessons</a>
                <a href="/achievements" class="!text-xs  {{ request()->is('achievements*') ? 'active' : '' }}">Achievements</a>
                <a href="/profile" class="!text-xs  {{ request()->is('profile*') ? 'active' : '' }}">Profile</a>
            </div>
        </nav>

        <!-- Mobile Navbar -->
        <nav class="nav-broken md:hidden flex items-center justify-between px-4 py-3" x-data="{ open: false }">
            <img class="logo-broken" width="60" src="{{asset('img/logo-light-broken.png')}}" alt="">
            <button @click="open = !open" class="text-white focus:outline-none">
                <i class="fa-solid !text-xl sm:!text-2xl transition-transform duration-300" :class="open ? 'fa-xmark' : 'fa-bars'"></i>
            </button>

            <!-- Mobile Menu Overlay -->
            <div 
                x-show="open" 
                @click.away="open = false"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-x-full"
                x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 translate-x-full"
                class="fixed inset-y-0 right-0 w-64 bg-[#31343A] shadow-lg z-50 flex flex-col"
                style="display: none;"
            >
                <!-- Close button inside menu -->
                <div class="flex items-center justify-between p-4 border-b border-gray-700">
                    <img width="50" src="{{asset('img/logo-light-broken.png')}}" alt="">
                    <button @click="open = false" class="text-white">
                        <i class="fa-solid fa-xmark !text-xl sm:!text-2xl"></i>
                    </button>
                </div>

                <!-- Menu Links -->
                <div class="flex flex-col p-4 space-y-4">
                    <a href="/dashboard" class="!text-base sm:!text-lg py-3 px-4 rounded-lg transition-colors {{ request()->is('dashboard*') ? 'bg-[#F4C300] text-black font-bold' : 'text-white hover:bg-gray-700' }}">
                        <i class="fa-solid fa-house mr-3"></i>Dashboard
                    </a>
                    <a href="/lessons" class="!text-base sm:!text-lg py-3 px-4 rounded-lg transition-colors {{ request()->is('lessons*') || request()->is('lesson-view*') ? 'bg-[#F4C300] text-black font-bold' : 'text-white hover:bg-gray-700' }}">
                        <i class="fa-solid fa-book mr-3"></i>Lessons
                    </a>
                    <a href="/achievements" class="!text-base sm:!text-lg py-3 px-4 rounded-lg transition-colors {{ request()->is('achievements*') ? 'bg-[#F4C300] text-black font-bold' : 'text-white hover:bg-gray-700' }}">
                        <i class="fa-solid fa-trophy mr-3"></i>Achievements
                    </a>
                    <a href="/profile" class="!text-base sm:!text-lg py-3 px-4 rounded-lg transition-colors {{ request()->is('profile*') ? 'bg-[#F4C300] text-black font-bold' : 'text-white hover:bg-gray-700' }}">
                        <i class="fa-solid fa-user mr-3"></i>Profile
                    </a>
                    
                    <!-- Logout -->
                    <div class="pt-4 mt-auto border-t border-gray-700">
                        <a href="/teacher/dashboard" class="!text-base sm:!text-lg py-3 px-4 rounded-lg transition-colors text-red-400 hover:bg-gray-700 flex items-center">
                            <i class="fa-solid fa-arrow-right-from-bracket mr-3"></i>Logout
                        </a>
                    </div>
                </div>
            </div>

            <!-- Overlay Background -->
            <div 
                x-show="open" 
                @click="open = false"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-black/30 z-40"
                style="display: none;"
            ></div>
        </nav>

        @yield('content')

        @livewireScripts
        
        <!-- Loading Screen Script -->
        <script>
            window.pageReady = false;

            window.addEventListener('load', function() {
                const loader = document.getElementById('page-loader');

                setTimeout(() => {
                    loader.classList.add('hidden');

                    setTimeout(() => {
                        loader.remove();
                        window.pageReady = true;   // <-- loading finished
                    }, 400);

                }, 150);
            });
        </script>
    </body>
</html>