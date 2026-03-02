@props(['paginator'])

@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $paginator */
    $currentPage = $paginator->currentPage();
    $lastPage    = $paginator->lastPage();

    $start = max(1, $currentPage - 2);
    $end   = min($lastPage, $start + 4);

    if ($end - $start < 4) {
        $start = max(1, $end - 4);
    }

    $pages = range($start, $end);
@endphp

<div class="pagination-container flex items-center justify-end gap-3 mt-auto">
    <div class="text-sm !text-gray-400">
        Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
    </div>

    @if ($currentPage > 1)
        <button
            wire:click="goToPage({{ $currentPage - 1 }})"
            class="px-4 py-2 rounded-md hover:scale-110 cursor-pointer bg-yellow-100 text-yellow-500">
            <i class="fa-solid fa-caret-left"></i>
        </button>
    @endif

    @foreach ($pages as $i)
        <button
            wire:click="goToPage({{ $i }})"
            class="{{ $i == $currentPage ? 'bg-yellow-500 text-white' : 'bg-yellow-100 text-yellow-500' }}
                   px-4 py-2 rounded-md hover:scale-110 cursor-pointer">
            {{ $i }}
        </button>
    @endforeach

    @if ($currentPage < $lastPage)
        <button
            wire:click="goToPage({{ $currentPage + 1 }})"
            class="px-4 py-2 rounded-md hover:scale-110 cursor-pointer bg-yellow-100 text-yellow-500">
            <i class="fa-solid fa-caret-right"></i>
        </button>
    @endif
</div>