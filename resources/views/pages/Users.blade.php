@extends('layout.app')

@section('content')

<div class="panel panel-heading">
    <h3 class="btn btn-primary btn-lg btn-block">Registered Customers</h3>
</div>

<a class="navbar-brand" href="{{ url('/home') }}">
    <button type="button" class="btn btn-outline-secondary">Dahboard</button>
</a>
<a class="navbar-brand" href="{{ url('/home') }}">
    <button type="button" class="btn btn-outline-secondary">Back</button>
</a>
    <div class="panel-body">
        <table class="table table-bordered">
                <tr>
                <th>Cover Image</th>
                <th>User ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Country</th>
                <th>Verified</th>
                <th>Actions</th>
                </tr>
                    @if (count($users) > 0)
                        @foreach ($users as $user )
                            <tr>
                                    <td>
                                            <img class="img-thumbnail alt="Responsive image" src="/storage/storage/images/{{$user->cover_image}}"/>

                                    </td>
                                    <td>{{$user->user_id}}</td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->middle_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->user_phone}}</td>
                                    <td>{{$user->user_email}}</td>
                                    <td>{{$user->country}}</td>
                                    <td> <strong class="btn btn-outline-success">{{$user->verified}}</strong></td>
                                    <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit-modal">
                                            <small>
                                                {!!Form::open(['action' => ['Person\UsersViewController@update', $user->id],'method' => 'PUT'])!!}
                                                    {{Form::hidden('method', 'PUT')}}
                                                    {{ Form::submit('VERIFY', ['class' => 'btn btn-info'])}}
                                                {!! Form::close() !!}
                                            </small>
                                        </button>

                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#delete-modal">
                                        <i class="fa fa-trash"></i><small> <a href="#" class="btn btn-danger">Delete</a></small>
                                        </button>
                                    </div>
                                    </td>

                            </tr>
                        @endforeach

                    @else
                    <p>NO REGISTERED CUSTOMERS</p>
                    @endIf
            </table>
            {{$users->links()}}
        </div>
        @endsection
