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
    
        <style>
          /* ============================================
          TEACHER MODULE - RESPONSIVE FIXES
          Paste this at the end of your teacher.css
          ============================================ */

          /* Mobile First - Base styles for small screens */
          @media (max-width: 768px) {
          /* Navigation fixes */
          nav .logo {
               padding: 0 1rem;
          }
          
          nav .logo img {
               width: 100px !important;
          }

          /* Main content padding */
          main {
               padding: 1rem !important;
          }

          /* Header responsiveness */
          header {
               flex-direction: column !important;
               align-items: flex-start !important;
               gap: 1rem;
          }

          header > div:first-child {
               width: 100%;
          }

          header > div:last-child {
               width: 100%;
               text-align: left;
          }

          /* Dashboard - Summary Cards */
          .grid.grid-cols-4 {
               grid-template-columns: repeat(1, 1fr) !important;
          }

          /* Dashboard - Main Cards Layout */
          .main-cards {
               display: flex !important;
               flex-direction: column !important;
               gap: 1.5rem;
          }

          /* Performance Distribution Chart */
          .graph > div {
               padding: 20px !important;
               padding-bottom: 50px !important;
          }

          /* Grade Level Overview */
          .asset-statuses {
               grid-template-columns: 1fr !important;
               gap: 1rem !important;
          }

          /* Top Performers - Stack vertically on mobile */
          .right-cards > .card:first-child > div.flex.justify-center {
               flex-direction: column !important;
               height: auto !important;
               gap: 1rem;
          }

          .right-cards > .card:first-child > div.flex.justify-center > div {
               width: 100% !important;
          }

          .right-cards > .card:first-child > div.flex.justify-center > div > div {
               height: 8rem !important;
          }

          /* Alert and Message Section */
          .alert-action {
               flex-direction: column !important;
          }

          /* Table responsiveness */
          .table-header {
               flex-direction: column !important;
               gap: 1rem;
               align-items: flex-start !important;
          }

          .table-header .flex.items-center.gap-3 {
               width: 100%;
               flex-direction: column;
               align-items: stretch !important;
          }

          .table-header .flex.items-center.gap-3 > * {
               width: 100%;
          }

          .table-header button {
               width: 100%;
               justify-content: center;
          }

          /* Make tables scrollable horizontally */
          .table-container {
               overflow-x: auto;
               -webkit-overflow-scrolling: touch;
          }

          .table-container table {
               min-width: 800px;
          }

          /* Modal adjustments */
          div[x-show="showModal"] > div {
               width: calc(100% - 2rem) !important;
               max-width: 26rem;
               margin: 1rem;
          }

          /* Settings page */
          .flex.flex-col.gap-2.w-\\[50\\%\\] {
               width: 100% !important;
          }

          /* Performance Report Modal */
          div.w-\\[50rem\\] {
               width: calc(100% - 2rem) !important;
               max-width: 50rem;
               margin: 1rem;
               max-height: 90vh;
          }

          /* Modal stats grid */
          .grid.grid-cols-4 {
               grid-template-columns: repeat(2, 1fr) !important;
          }

          /* Pre/Post test grid */
          .grid.grid-cols-2 {
               grid-template-columns: 1fr !important;
          }
          }

          /* Tablet - Medium screens */
          @media (min-width: 769px) and (max-width: 1024px) {
          /* Dashboard cards - 2 columns on tablet */
          .grid.grid-cols-4 {
               grid-template-columns: repeat(2, 1fr) !important;
          }

          /* Table adjustments */
          .table-container {
               overflow-x: auto;
          }

          .table-container table {
               min-width: 900px;
          }

          /* Settings inputs */
          .flex.flex-col.gap-2.w-\\[50\\%\\] {
               width: 75% !important;
          }
          }

          /* Additional utility fixes */
          @media (max-width: 640px) {
          /* Smaller text on very small screens */
          .text-xl {
               font-size: 1.125rem !important;
          }

          .text-lg {
               font-size: 1rem !important;
          }

          /* Card padding reduction */
          .card {
               padding: 1rem !important;
          }

          /* Notification positioning */
          .absolute.top-10.right-10 {
               top: 1rem !important;
               right: 1rem !important;
               left: 1rem;
               width: auto !important;
          }

          /* Button text sizes */
          button.text-xs {
               font-size: 0.75rem;
               padding-left: 1rem;
               padding-right: 1rem;
          }
          }

          /* Landscape phone optimization */
          @media (max-width: 896px) and (orientation: landscape) {
          main {
               padding: 0.5rem !important;
          }

          .card {
               padding: 1rem !important;
          }

          /* Reduce modal heights for landscape */
          div[x-show="showModal"] > div {
               max-height: 85vh;
               overflow-y: auto;
          }
          }

          /* Print styles */
          @media print {
          nav,
          .table-header button,
          td i.fa-solid {
               display: none !important;
          }

          .table-container {
               overflow: visible !important;
          }

          .table-container table {
               min-width: auto !important;
          }
          }
        </style>
    
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

          <nav>
               <div class="logo">
                    <img class="img-logo" src="{{asset('img/logo-light.png')}}" style="width: 130px;" alt="">
                    <button id="toggle-btn" class="text-lg hover:scale-125"><i class="fa-solid fa-bars"></i></button>
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

          <!-- Subject to tailwind -->
          <main class="size-full flex flex-col">
               <header class="flex justify-between">
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

               <br>

               @yield('content')
          </main>

          <script src="{{ asset('js/teacher.js') }}" defer></script>
          @livewireScripts
    </body>
</html>