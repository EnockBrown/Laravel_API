@extends('layout.app')

@section('content')

    <div class="panel-body">
        <table class="table table-bordered">
                <tr>
                <!-- <th></th> -->
                <th>ID</th>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Country</th>
                <th>Actions</th>
                </tr>
                    @if (count($users) > 0)
                        @foreach ($users as $user )
                            <tr>
                                    <td>{{$user->user_id}}</td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->middle_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->user_phone}}</td>
                                    <td>{{$user->user_email}}</td>
                                    <td>{{$user->country}}</td>
                                    <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit-modal">
                                            <i class="fa fa-trash"></i><small> <a href="#" class="btn btn-info">Edit</a></small>
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

        <div class="modal fade" id="edit-modal">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" ><b>Edit User</b></h4>
                </div>
                <div class="modal-body">
                <form role="form" action="/edit_user">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User ID</label>
                        <input type="text" class="form-control" name="user_id" placeholder="User ID" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact</label>
                    <input type="text" class="form-control" name="contact" value="{{ Auth::id()}}"placeholder="Enter contact">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Change Password</label>
                        <input type="password" class="form-control" name="change_password" placeholder="Enter password">
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
    </div>
  @endsection
