@extends('layouts.app')

@section('title', 'Register')

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
                            <button type="button" class="close" data-dismiss="alert" title="Excluir">&times;</button>
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            @endif

            <form action="{{url('register')}}" method="POST">
                @csrf
                <input type="text" id="login" class="fadeIn second" name="endpoint" placeholder="URL">

                <input type="submit" class="fadeIn fourth" value="Register">
            </form>
        </div>
    </div>
@endsection
