<!-- Login -->
```html
@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('login.submit') }}" class="relative rounded-[10px] shadow-[0_20px_60px_rgba(0,0,0,0.3)] overflow-hidden w-full h-screen md:h-auto md:max-w-[650px] lg:max-w-[900px] flex flex-col md:flex-row">
        @csrf
        
        <!-- Left Panel -->
        <div class="hidden md:flex md:w-1/2 bg-[#31343A] text-white py-[67.5px] lg:py-[90px] px-[45px] lg:px-[60px] flex-col justify-center">
            <img src="{{asset('img/logo-light.png')}}" alt="">
        </div>

        <!-- Right Panel -->
        <div class="w-full md:w-1/2 h-full py-10 px-8 md:py-[67.5px] md:px-[45px] lg:py-[90px] lg:px-[60px] flex flex-col justify-center bg-white">
            
            <h2 class="text-[1.5rem] lg:text-[2rem] font-black mb-[22.5px] lg:mb-[30px] text-[#333] text-center md:text-left">Login</h2>
            
            <div class="mb-4 lg:mb-5">
                <input 
                    type="text" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="Username" 
                    class="w-full py-[11.25px] lg:py-[15px] px-0 border-0 border-b-[3px] border-b-[#ddd] text-[0.75rem] lg:text-base outline-none focus:border-b-[#F4C300] transition-colors duration-300" 
                    required
                >
            </div>

            <div class="mb-4 lg:mb-5" x-data="{ show: false }">
                <div class="relative">
                    <input 
                        :type="show ? 'text' : 'password'"
                        name="password"
                        placeholder="Password"
                        class="w-full py-[11.25px] lg:py-[15px] pr-9 lg:pr-12 px-0 border-0 border-b-[3px] border-b-[#ddd] text-[0.75rem] lg:text-base outline-none focus:border-b-[#F4C300] transition-colors duration-300"
                        required
                    >
                    
                    <button 
                        type="button"
                        @click="show = !show"
                        class="absolute right-0 top-1/2 -translate-y-1/2 text-[0.75rem] lg:text-base text-[#888] hover:text-[#F4C300] transition-colors duration-300"
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
            
            <button 
                type="submit" 
                class="block mx-auto mt-[22.5px] lg:mt-[30px] py-[9px] lg:py-3 px-[37.5px] lg:px-[50px] bg-[#F4C300] text-white border-0 rounded-[7px] lg:rounded-[10px] text-[0.75rem] lg:text-base font-semibold hover:bg-[#dab10eff] transition-colors duration-300 cursor-pointer"
            >
                Sign In
            </button>
            
            <p class="text-center mt-[22.5px] lg:mt-[30px] text-[0.675rem] lg:text-[0.9rem] text-[#666]">
                Login as <a href="/teacher/login" class="text-yellow-500 no-underline hover:underline">Teacher</a>
            </p>
        </div>
    </form>
@endsection
```


