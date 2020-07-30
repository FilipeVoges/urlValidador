@extends('layouts.app')

@section('title', $code . ' ' . $message)

@section('content')
    <div class="card card-login mx-auto text-center bg-white">
        <div class="card-header mx-auto bg-white">
            <span>
                <img src="{{ url('/images/error.png') }}" height="200" class="w-100" alt="Logo">
            </span>
        </div>
        <div class="card-body" style="color: #D3090A !important;">
            <span class="h1">{{$code}}</span><br>
            <span class="h3">{{$message}}!</span>
        </div>
    </div>
@endsection
