<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <link rel="icon" href="{{asset('img/icon.ico')}}" type="image/x-icon" />
        <link rel="stylesheet" href="{{asset('css/teacher.css')}}">
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

          <button id="sidebar-reveal-btn" class="sidebar-reveal-btn" title="Show sidebar">
               <i class="fa-solid fa-bars"></i>
          </button>

          <nav class="app-sidebar">
               <div class="logo">
                    <img class="img-logo" src="{{asset('img/logo-light.png')}}" style="width: 130px;" alt="">
                    <button id="toggle-btn" class="text-lg hover:scale-125" title="Hide sidebar"><i class="fa-solid fa-bars"></i></button>
               </div>

               <aside class="sidebar">
                    <a href="/teacher/dashboard" class="{{ request()->is('teacher/dashboard*') ? 'active' : '' }}"
                         ><span><i class="fa-solid fa-house-chimney"></i></span>
                         <p>Dashboard</p></a
                    >
                    <a href="/teacher/studentmanagement" class="{{ request()->is('teacher/studentmanagement*') ? 'active' : '' }}"
                         ><span><i class="fa-solid fa-graduation-cap"></i></span>
                         <p>Student Management</p></a
                    >
                    <a href="/teacher/teachermanagement" class="{{ request()->is('teacher/teachermanagement*') ? 'active' : '' }}"
                         ><span><i class="fa-solid fa-user-tie"></i></span>
                         <p>Teacher Management</p></a
                    >
                    <a href="/teacher/performancereport" class="{{ request()->is('teacher/performancereport*') ? 'active' : '' }}"
                         ><span><i class="fa-solid fa-star"></i></span>
                         <p>Performance Report</p></a
                    >
                    <a href="/teacher/settings" class="{{ request()->is('teacher/settings*') ? 'active' : '' }}"
                         ><span><i class="fa-solid fa-gear"></i></span>
                         <p>Settings</p></a
                    >
               </aside>
          </nav>

          {{-- min-w-0 prevents flex child from overflowing its parent (the key fix for width tracking vw) --}}
          {{-- overflow-hidden completes the flex chain so .table-container can scroll internally --}}
          <main class="min-w-0 overflow-hidden size-full flex flex-col">
               <header class="flex justify-between mb-4">
                    <div>
                         <div class="text-sm text-gray-400">Pages / <span>Header</span></div>
                         <div class="font-bold">
                              @if(request()->is('teacher/dashboard*'))
                                   Dashboard
                              @elseif(request()->is('teacher/studentmanagement*'))
                                   Student Management
                              @elseif(request()->is('teacher/teachermanagement*'))
                                   Teacher Management
                              @elseif(request()->is('teacher/performancereport*'))
                                   Performance Report
                              @elseif(request()->is('teacher/settings*'))
                                   Settings
                              @endif
                         </div>
                    </div>

                    <div>Hi, 
                         <span class="font-semibold">
                              @auth('teacher')
                                   {{ auth('teacher')->user()->name }}
                              @endauth
                         </span>
                    </div>
               </header>

               @yield('content')
          </main>

               <nav class="bottom-nav">
                    <a href="/teacher/dashboard" class="{{ request()->is('teacher/dashboard*') ? 'active' : '' }}">
                         <span><i class="fa-solid fa-house-chimney"></i></span>
                    </a>
                    <a href="/teacher/studentmanagement" class="{{ request()->is('teacher/studentmanagement*') ? 'active' : '' }}">
                         <span><i class="fa-solid fa-graduation-cap"></i></span>
                    </a>
                    <a href="/teacher/teachermanagement" class="{{ request()->is('teacher/teachermanagement*') ? 'active' : '' }}">
                         <span><i class="fa-solid fa-user-tie"></i></span>
                    </a>
                    <a href="/teacher/performancereport" class="{{ request()->is('teacher/performancereport*') ? 'active' : '' }}">
                         <span><i class="fa-solid fa-star"></i></span>
                    </a>
                    <a href="/teacher/settings" class="{{ request()->is('teacher/settings*') ? 'active' : '' }}">
                         <span><i class="fa-solid fa-gear"></i></span>
                    </a>
               </nav>

          <script src="{{ asset('js/teacher.js') }}" defer></script>
          @livewireScripts
    </body>
</html>