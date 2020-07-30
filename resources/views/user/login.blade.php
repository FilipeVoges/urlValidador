@extends('layouts.app')

@section('title', 'Login')

@if (isset($sidebar) && $sidebar)
    @section('sidebar')
        @parent
    @endsection
@endif

@section('content')
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <i class="fa fa-user"></i>
            </div>

            @if (isset($errors))
                <div class="fadeIn third">
                    @foreach ($errors as $error)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            @endif

            <form action="{{url('autenticar')}}" method="POST">
                @csrf
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Login">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Senha">

                <input type="submit" class="fadeIn fourth" value="Autenticar">
            </form>
        </div>
    </div>
@endsection
