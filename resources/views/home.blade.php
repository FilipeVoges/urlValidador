@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            @if (isset($message_success) && !empty($message_success))
                <div class="fadeIn third">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{$message_success}}
                    </div>
                </div>
            @endif
            @if (isset($message_error) && !empty($message_error))
                <div class="fadeIn third">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{$message_error}}
                    </div>
                </div>
            @endif
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Endpoint</th>
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
                            <td>{{$endpoint->endpoint}}</td>
                            <td>{{$endpoint->checked}}</td>
                            <td>{{$endpoint->checked_at}}</td>
                            <td>{{$endpoint->http_code}}</td>
                            <td>
                                <a role="button" class="btn btn-outline-danger" href="{{url('/delete/' . $endpoint->id)}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                                @if ($endpoint->checked)
                                    <button type="button" class="btn btn-outline-primary" id="seeBody" href="{{url('see/' . $endpoint->id)}}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <a role="button" class="btn btn-outline-primary btn-lg" href="{{url('register')}}">Register</a>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modalBodyPage">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Endpoint Body</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="bodyPage"></div>
            </div>
        </div>
    </div>

@endsection
