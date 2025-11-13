@extends('layouts.ppa') 

@section('content')
 <div
    class="card content flex-1 flex flex-col"
    x-data="{
                showModal: false,
                modalTemplate: '',
            }"
>
    <div class="table-header flex justify-between items-center">
        <h1 class="text-lg font-bold">Student List</h1>
        <div class="flex items-center gap-3">
            <div class="border border-2 border-gray-500 px-3 py-1 rounded-md">
                <input class="outline-none text-sm" type="text" />
                <i class="fa-solid fa-magnifying-glass text-sm"></i>
            </div>
            <button class="px-5 py-2 bg-[#F4C300] border border-2 border-[#F4C300] rounded-lg font-bold text-black text-xs" @click="showModal = true; modalTemplate = 'create'">ADD NEW STUDENT</button>
            <i class="fa-solid fa-ellipsis-vertical cursor-pointer"></i>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>STUDENT ID</th>
                    <th>STUDENT NAME</th>
                    <th>USERNAME</th>
                    <th>STATUS</th>
                    <th>LAST LOGIN</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#1553 <i class="fa-regular fa-copy cursor-pointer text-gray-400"></i></td>
                    <td>Chris Bacon</td>
                    <td>Web Developer</td>
                    <td>BFC</td>
                    <td>IT & Security</td>
                    <td>
                        <div class="flex gap-3">
                            <i class="fa-solid fa-pen-to-square cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-trash-can cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-user-xmark cursor-pointer hover:scale-125"></i>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="pagination-container flex items-center justify-end gap-3 mt-auto">
        <div class="text-xs text-gray-400">Showing 1 to 10 of 50 results</div>

        <!-- Previous Button -->
        <button class="px-2 py-2 rounded-md hover:scale-110 cursor-pointer bg-teal-100 text-sm">
            <i class="fa-solid fa-caret-left text-teal-500"></i>
        </button>

        <!-- Page Numbers -->
        <button class="bg-teal-400 text-white px-4 py-2 rounded-md hover:scale-110 cursor-pointer text-sm">1</button>
        <button class="bg-teal-100 text-teal-500 px-4 py-2 rounded-md hover:scale-110 cursor-pointer text-sm">2</button>
        <button class="bg-teal-100 text-teal-500 px-4 py-2 rounded-md hover:scale-110 cursor-pointer text-sm">3</button>
        <button class="bg-teal-100 text-teal-500 px-4 py-2 rounded-md hover:scale-110 cursor-pointer text-sm">4</button>
        <button class="bg-teal-100 text-teal-500 px-4 py-2 rounded-md hover:scale-110 cursor-pointer text-sm">5</button>

        <!-- Next Button -->
        <button class="px-2 py-2 rounded-md hover:scale-110 cursor-pointer bg-teal-100 text-sm">
            <i class="fa-solid fa-caret-right text-teal-500"></i>
        </button>
    </div>
</div>

@endsection
