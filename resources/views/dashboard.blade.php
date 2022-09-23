@extends('layouts.sidebar')
@section('contents')
    <h2>Bienvenido, {{auth()->user()->name}}.</h2>
@endsection