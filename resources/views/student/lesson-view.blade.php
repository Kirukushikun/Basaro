@extends('layouts.app')

@section('content')
    @if($slide == 'first-slide')
        <livewire:first-slide :lesson="$lesson"/>
    @elseif($slide == 'second-slide')
        <livewire:second-slide :lesson="$lesson" />
    @else 
        <livewire:third-slide :lesson="$lesson" />
    @endif
@endsection