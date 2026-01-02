@extends('layouts.app')

@section('content')
    @if($slide == 'first-slide')
        <livewire:first-slide :lesson="$lesson"/>
    @elseif($slide == 'second-slide')
        <livewire:second-slide :lesson="$lesson" />
    @elseif($slide == 'third-slide') 
        <livewire:third-slide :lesson="$lesson" />
    @elseif($slide == 'fourth-slide')
        <livewire:fourth-slide :lesson="$lesson" />
    @else
        <livewire:fourth-slide-panuto :lesson="$lesson" />
    @endif
@endsection