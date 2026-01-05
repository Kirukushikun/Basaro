@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('login.submit') }}" class="relative rounded-[10px] shadow-[0_20px_60px_rgba(0,0,0,0.3)] overflow-hidden w-full h-screen md:h-auto md:max-w-[650px] flex flex-col md:flex-row">
        @csrf
        <!-- Left Panel -->
        <!-- 90px × 0.75 = 67.5px | 60px × 0.75 = 45px -->
        <div class="hidden md:flex md:w-1/2 bg-[#31343A] text-white py-[67.5px] px-[45px] flex-col justify-center">
            <img src="{{asset('img/logo-light.png')}}" alt="">
        </div>

        <!-- Right Panel -->
        <!-- 90px × 0.75 = 67.5px | 60px × 0.75 = 45px -->
        <div class="w-full md:w-1/2 h-full py-[67.5px] px-[45px] md:py-[67.5px] md:px-[45px] py-10 px-8 flex flex-col justify-center bg-white">
            <!-- 2rem × 0.75 = 1.5rem ✓ | 30px × 0.75 = 22.5px -->
            <h2 class="text-[1.5rem] font-black mb-[22.5px] text-[#333] text-center md:text-left">Login</h2>
            
            <!-- 20px × 0.75 = 15px (mb-5 stays mb-5 since that's already in Tailwind) -->
            <div class="mb-4">
                <!-- 15px × 0.75 = 11.25px | text-base (16px) × 0.75 = 12px -->
                <input type="text" class="w-full py-[11.25px] px-0 border-0 border-b-[3px] border-b-[#ddd] !text-[0.75rem] outline-none focus:border-b-[#F4C300] transition-colors duration-300" name="email" value="{{ old('email') }}" placeholder="Username" required>
            </div>

            <div class="mb-4" x-data="{ show: false }">
                <div class="relative">
                    <!-- 15px × 0.75 = 11.25px | 48px × 0.75 = 36px (pr-12 → pr-9) | text-base × 0.75 = 12px -->
                    <input 
                        :type="show ? 'text' : 'password'"
                        name="password"
                        placeholder="Password"
                        class="w-full py-[11.25px] pr-9 px-0 border-0 border-b-[3px] border-b-[#ddd] !text-[0.75rem] outline-none focus:border-b-[#F4C300] transition-colors duration-300"
                        required
                    >

                    <!-- Eye Icon -->
                    <button 
                        type="button"
                        @click="show = !show"
                        class="absolute !text-[0.75rem] right-0 top-1/2 -translate-y-1/2 text-[#888] hover:text-[#F4C300] transition-colors duration-300"
                    >
                        <i :class="show ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                    </button>
                </div>
            </div>
            
            @if ($errors->has('login'))
                <p class="text-sm text-red-500 text-center">
                    {{ $errors->first('login') }}
                </p>
            @endif
            
            <!-- 30px × 0.75 = 22.5px | py-3 (12px) × 0.75 = 9px | 50px × 0.75 = 37.5px | text-base × 0.75 = 12px -->
            <button class="block mx-auto mt-[22.5px] py-[9px] px-[37.5px] bg-[#F4C300] text-white border-0 rounded-[7px] !text-[0.75rem] cursor-pointer font-semibold hover:bg-[#dab10eff] transition-colors duration-300" type="submit">Sign In</button>
            
            <!-- 30px × 0.75 = 22.5px | 0.9rem (14.4px) × 0.75 = 10.8px = 0.675rem -->
            <p class="text-center mt-[22.5px] text-[0.675rem] text-[#666]">
                Login as <a href="/teacher/login" class="text-yellow-500 no-underline hover:underline">Teacher</a>
            </p>
        </div>
    </form>
@endsection