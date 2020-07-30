@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Checked</th>
                        <th>Checked at</th>
                        <th>Response Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($endpoints as $endpoint)
                        <tr>
                            <td>{{$endpoint->id}}</td>
                            <td>{{$endpoint->checked}}</td>
                            <td>{{$endpoint->checked_at}}</td>
                            <td>{{$endpoint->http_code}}</td>
                            <td>{{$endpoint->http_code}}</td>
                            <td>Actions</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <a role="button" class="btn btn-outline-primary btn-lg" href="{{url('register')}}">Register</a>
            </div>
        </div>
    </div>

@endsection
