@extends('layouts.app')

@section('content')
    @if($slide == 'first-slide')
        <livewire:first-slide />
    @else
        <livewire:second-slide />
    @endif
@endsection