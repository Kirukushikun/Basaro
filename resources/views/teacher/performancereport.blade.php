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
            <i class="fa-solid fa-ellipsis-vertical cursor-pointer"></i>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>STUDENT ID</th>
                    <th>STUDENT NAME</th>
                    <th>GRADE LEVEL</th>
                    <th>CURRENT PROGRESS</th>
                    <th>AVERAGE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#1 <i class="fa-regular fa-copy cursor-pointer text-gray-400"></i></td>
                    <td>Chris Bacon</td>
                    <td>Grade 7</td>
                    <td>Lesson 2</td>
                    <td><span class="text-red-400">73%</span></td>
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
                    <td>Grade 8</td>
                    <td>Lesson 4</td>
                    <td><span class="text-green-400">92%</span></td>
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
                    <td>Grade 7</td>
                    <td>Lesson 3</td>
                    <td><span class="text-yellow-400">75%</span></td>
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
                    <td>Grade 9</td>
                    <td>Lesson 1</td>
                    <td><span class="text-red-400">74%</span></td>
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
                    <td>Grade 10</td>
                    <td>Lesson 6</td>
                    <td><span class="text-green-400">93%</span></td>
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
                    <td>Grade 8</td>
                    <td>Lesson 5</td>
                    <td><span class="text-yellow-400">81%</span></td>
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
                    <td>Grade 7</td>
                    <td>Lesson 3</td>
                    <td><span class="text-green-400">88%</span></td>
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
                    <td>Grade 9</td>
                    <td>Lesson 7</td>
                    <td><span class="text-green-400">95%</span></td>
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
