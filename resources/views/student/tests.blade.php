@extends('layouts.app')

@section('content')
    @if ($type === 'pretest')
        <livewire:pretest />
    @elseif ($type === 'posttest')
        <livewire:posttest />
    @endif
@endsection