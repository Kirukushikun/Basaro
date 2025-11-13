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
          <nav>
               <div class="logo">
                    <img class="img-logo" src="../Img/logo-light.png" style="width: 130px;" alt="">
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

                    <div>Hi, <span class="font-semibold">Iverson</span></div>
               </header>

               <br>

               @yield('content')
          </main>

          <script src="{{ asset('js/teacher.js') }}" defer></script>
          @livewireScripts
    </body>
</html>