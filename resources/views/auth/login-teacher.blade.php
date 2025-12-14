@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('teacher.login.submit') }}" class="rounded-[10px] shadow-[0_20px_60px_rgba(0,0,0,0.3)] overflow-hidden max-w-[900px] w-full flex flex-col md:flex-row">
        @csrf
        <!-- Left Panel -->
        <div class="w-full md:w-1/2 bg-[#31343A] text-white py-[90px] px-[60px] md:py-[90px] md:px-[60px] py-10 px-8 flex flex-col justify-center">
            <img src="{{asset('img/logo-light.png')}}" alt="">
        </div>

        <!-- Right Panel -->
        <div class="w-1/2 py-[90px] px-[60px] flex flex-col justify-center bg-white">
            <h2 class="text-[2rem] font-black mb-[30px] text-[#333]"><span class=" text-yellow-500">Teacher's</span> Login </h2>
            <div class="mb-5">
                <input type="text" class="w-full py-[15px] px-0 border-0 border-b-[3px] border-b-[#ddd] text-base outline-none focus:border-b-[#F4C300] transition-colors duration-300" name="email" value="{{ old('email') }}" placeholder="Email" required>
            </div>
            <div class="mb-5" x-data="{ show: false }">
                <div class="relative">
                    <input 
                        :type="show ? 'text' : 'password'"
                        name="password"
                        placeholder="Password"
                        class="w-full py-[15px] pr-12 px-0 border-0 border-b-[3px] border-b-[#ddd] text-base outline-none focus:border-b-[#F4C300] transition-colors duration-300"
                        required
                    >

                    <!-- Eye Icon -->
                    <button 
                        type="button"
                        @click="show = !show"
                        class="absolute right-0 top-1/2 -translate-y-1/2 text-[#888] hover:text-[#F4C300] transition-colors duration-300"
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
            <button class="block mx-auto mt-[30px] py-3 px-[50px] bg-[#F4C300] text-white border-0 rounded-[10px] text-base cursor-pointer font-semibold hover:bg-[#dab10eff] transition-colors duration-300" type="submit">Sign In</button>
            <p class="text-center mt-[30px] text-[0.9rem] text-[#666]">
                Login as <a href="/login" class="text-[#F4C300] no-underline hover:underline">Student</a>
            </p>
        </div>
    </form>
@endsection
