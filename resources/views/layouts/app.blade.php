<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{asset('css/student.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <!-- Navbar -->
        <nav class="nav">
            <img class="logo" src="../Img/logo-light.png" alt="">
            <div class="nav-links" id="nav-links">
                <a href="/dashboard" class="text-lg {{ request()->is('dashboard*') ? 'active' : '' }}">Dashboard</a>
                <a href="/lessons" class="text-lg {{ request()->is('lessons*') ? 'active' : '' }}">Lessons</a>
                <a href="#" class="text-lg">Achievements</a>
                <a href="#" class="text-lg">Profile</a>
            </div>
        </nav>

        <nav class="nav-broken">
            <img class="logo-broken" width="60" src="../Img/logo-light-broken.png" alt="">
            <i class="fa-solid fa-bars text-2xl cursor-pointer"></i>
        </nav>

        @yield('content')
    </body>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</html>