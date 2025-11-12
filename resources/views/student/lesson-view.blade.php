@extends('layouts.app')

@section('content')
    @if($slide == 'first-slide')
        <livewire:first-slide :lesson="$lesson"/>
    @else
        <livewire:second-slide :lesson="$lesson" />
    @endif
@endsection