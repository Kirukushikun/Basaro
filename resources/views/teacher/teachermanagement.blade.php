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
        <h1 class="text-lg font-bold">Teacher List</h1>
        <div class="flex items-center gap-3">
            <div class="border border-2 border-gray-500 px-3 py-1 rounded-md">
                <input class="outline-none text-sm" type="text" />
                <i class="fa-solid fa-magnifying-glass text-sm"></i>
            </div>
            <button class="px-5 py-2 bg-[#F4C300] border border-2 border-[#F4C300] rounded-lg font-bold text-black text-xs" @click="showModal = true; modalTemplate = 'create'">ADD NEW TEACHER</button>
            <i class="fa-solid fa-ellipsis-vertical cursor-pointer"></i>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>TEACHER ID</th>
                    <th>TEACHER NAME</th>
                    <th>USERNAME</th>
                    <th>STATUS</th>
                    <th>LAST LOGIN</th>
                    <th>ACTION</th>
                </tr>
            </thead>
           <tbody>
                <tr>
                    <td>#1 <i class="fa-regular fa-copy cursor-pointer text-gray-400"></i></td>
                    <td>Chris Bacon</td>
                    <td>chris_bacon</td>
                    <td><span class="text-yellow-400">•</span> Idle</td>
                    <td>13/11/2025</td>
                    <td>
                        <div class="flex gap-3">
                            <i class="fa-solid fa-pen-to-square cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-trash-can cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-user-xmark cursor-pointer hover:scale-125"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>#2 <i class="fa-regular fa-copy cursor-pointer text-gray-400"></i></td>
                    <td>Jane Doe</td>
                    <td>janedoe_08</td>
                    <td><span class="text-red-400">•</span> Inactive</td>
                    <td>12/11/2025</td>
                    <td>
                        <div class="flex gap-3">
                            <i class="fa-solid fa-pen-to-square cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-trash-can cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-user-xmark cursor-pointer hover:scale-125"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>#3 <i class="fa-regular fa-copy cursor-pointer text-gray-400"></i></td>
                    <td>Michael Smith</td>
                    <td>mike_smith77</td>
                    <td><span class="text-green-400">•</span> Active</td>
                    <td>10/11/2025</td>
                    <td>
                        <div class="flex gap-3">
                            <i class="fa-solid fa-pen-to-square cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-trash-can cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-user-xmark cursor-pointer hover:scale-125"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>#4 <i class="fa-regular fa-copy cursor-pointer text-gray-400"></i></td>
                    <td>Sarah Johnson</td>
                    <td>sjohnson</td>
                    <td><span class="text-yellow-400">•</span> Idle</td>
                    <td>09/11/2025</td>
                    <td>
                        <div class="flex gap-3">
                            <i class="fa-solid fa-pen-to-square cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-trash-can cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-user-xmark cursor-pointer hover:scale-125"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>#5 <i class="fa-regular fa-copy cursor-pointer text-gray-400"></i></td>
                    <td>Olivia Brown</td>
                    <td>liv_brown</td>
                    <td><span class="text-green-400">•</span> Active</td>
                    <td>08/11/2025</td>
                    <td>
                        <div class="flex gap-3">
                            <i class="fa-solid fa-pen-to-square cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-trash-can cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-user-xmark cursor-pointer hover:scale-125"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>#6 <i class="fa-regular fa-copy cursor-pointer text-gray-400"></i></td>
                    <td>Daniel Lee</td>
                    <td>danlee_92</td>
                    <td><span class="text-red-400">•</span> Inactive</td>
                    <td>07/11/2025</td>
                    <td>
                        <div class="flex gap-3">
                            <i class="fa-solid fa-pen-to-square cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-trash-can cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-user-xmark cursor-pointer hover:scale-125"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>#7 <i class="fa-regular fa-copy cursor-pointer text-gray-400"></i></td>
                    <td>Emma Wilson</td>
                    <td>emmaw</td>
                    <td><span class="text-green-400">•</span> Active</td>
                    <td>06/11/2025</td>
                    <td>
                        <div class="flex gap-3">
                            <i class="fa-solid fa-pen-to-square cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-trash-can cursor-pointer hover:scale-125"></i>
                            <i class="fa-solid fa-user-xmark cursor-pointer hover:scale-125"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>#8 <i class="fa-regular fa-copy cursor-pointer text-gray-400"></i></td>
                    <td>Liam Garcia</td>
                    <td>liam_g</td>
                    <td><span class="text-yellow-400">•</span> Idle</td>
                    <td>04/11/2025</td>
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
        <button class="px-2 py-2 rounded-md hover:scale-110 cursor-pointer bg-yellow-100 text-sm">
            <i class="fa-solid fa-caret-left text-yellow-600"></i>
        </button>

        <!-- Page Numbers -->
        <button class="bg-yellow-400 text-white px-4 py-2 rounded-md hover:scale-110 cursor-pointer text-sm">1</button>
        <button class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-md hover:scale-110 cursor-pointer text-sm">2</button>
        <button class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-md hover:scale-110 cursor-pointer text-sm">3</button>
        <button class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-md hover:scale-110 cursor-pointer text-sm">4</button>
        <button class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-md hover:scale-110 cursor-pointer text-sm">5</button>

        <!-- Next Button -->
        <button class="px-2 py-2 rounded-md hover:scale-110 cursor-pointer bg-yellow-100 text-sm">
            <i class="fa-solid fa-caret-right text-yellow-600"></i>
        </button>
    </div>
</div>

@endsection
