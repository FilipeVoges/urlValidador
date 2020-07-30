<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Filipe Voges">
<meta name="csrf-token" content="{{csrf_token()}}">

<title>{{config('app.name')}} - @yield('title')</title>


<link href="{{url('/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{url('/css/app.css?v=')}}{{env('APP_VERSAO')}}" rel="stylesheet">
<link href="{{url('/plugins/fontawesome/css/all.min.css')}}" rel="stylesheet">
<link href="{{url('/plugins/dataTables/jquery.dataTables.css')}}" rel="stylesheet">

<link href=" {{url('/plugins/fontawesome/js/all.min.js')}}" rel="stylesheet">
<script src="{{url('/plugins/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('/plugins/jquery-mask/jquery.mask.js')}}"></script>
<script src="{{url('/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('/plugins/dataTables/jquery.dataTables.js')}}"></script>
@yield('styles')
