@extends('layouts.app')

@section('content')
    @if ($type === 'abakada')
        @include('references.abakada')
    @elseif ($type === 'marungko')
        @include('references.marungko')
    @endif
@endsection