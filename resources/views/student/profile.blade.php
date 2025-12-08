@extends('layouts.app')

@section('content')
<main class="flex-1 overflow-hidden mb-10">
     <div class="lessons overflow-y-auto h-full pr-5">
          <div class="card flex flex-col justify-center gap-5 pr-5 mb-7"> 
               <div class="">
                    <h1 class="text-xl font-bold">Profile Information</h1>
                    <p class="text-[#ADADAD]">Manage your profile and account settings</p>
               </div>
               
               <div class="flex flex-col gap-2 w-[100%] lg:w-[50%] ">
                    <label class="text-sm" for="">Full Name:</label>
                    <input type="text" class="text-sm rounded-md px-4 py-2 border border-[#ADADAD] bg-opacity-0">
               </div>

               <div class="flex flex-col gap-2 w-[100%] lg:w-[50%] ">
                    <label class="text-sm" for="">Username:</label>
                    <input type="text" class="text-sm rounded-md px-4 py-2 border border-[#ADADAD] bg-opacity-0">
               </div>

               <button class="px-5 py-2 bg-[#F4C300] border border-2 border-[#F4C300] rounded-lg !font-bold text-black text-xs w-fit hover:scale-105">SAVE</button>
          </div>

          <div class="card flex flex-col justify-center gap-5 pr-5">      
               <div class="">
                    <h1 class="text-xl font-bold">Update Password</h1>
                    <p class="text-[#ADADAD]">Ensure your account is using a long, unique password to stay secure </p>
               </div>
               
               <div class="flex flex-col gap-2 w-[100%] lg:w-[50%] ">
                    <label class="text-sm" for="">Current Password:</label>
                    <input type="text" class="text-sm rounded-md px-4 py-2 border border-[#ADADAD] bg-opacity-0">
               </div>

               <div class="flex flex-col gap-2 w-[100%] lg:w-[50%] ">
                    <label class="text-sm" for="">New Password:</label>
                    <input type="text" class="text-sm rounded-md px-4 py-2 border border-[#ADADAD] bg-opacity-0">
               </div>

               <div class="flex flex-col gap-2 w-[100%] lg:w-[50%] ">
                    <label class="text-sm" for="">Confirm Password:</label>
                    <input type="text" class="text-sm rounded-md px-4 py-2 border border-[#ADADAD] bg-opacity-0">
               </div>

               <button class="px-5 py-2 bg-[#F4C300] border border-2 border-[#F4C300] rounded-lg !font-bold text-black text-xs w-fit hover:scale-105">SAVE</button>
          </div> 

          <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button type="submit" class="px-5 py-2 my-5 bg-red-400 border border-2 border-red-400 rounded-lg font-bold text-black text-xs w-fit">
                    LOG OUT
               </button>
          </form>
                    
          
     </div>

</main>
@endsection