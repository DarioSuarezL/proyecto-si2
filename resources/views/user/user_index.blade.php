@extends('layouts.sidebar')
@push('styles')
    @vite(['resources/css/app.css','resources/js/app.js'])
@endpush

@section('contents')
    <span class="text-white">probando conexión con vite</span>
@endsection