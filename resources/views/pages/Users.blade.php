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
                <th>Actions</th>
                </tr>
                    @if (count($users) > 0)
                        @foreach ($users as $user )
                            <tr>
                                    <td>
                                        <div class="col-md-4 col-sm-4">
                                            <img style="width:100%;height:100%" src="/storage/storage/images/{{$user->cover_image}}"/>
                                        </div>
                                    </td>
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
                <h4 class="modal-title" ><b>Verify Customer</b></h4>
                </div>
                <div class="modal-body">
                <form role="form" action="/edit_user">
                    {{ Form::open(['action' => ['Person\ProductsViewController@update', $user->user_id] , 'method' =>'POST','enctype'=>'multipart/form-data']) }}

                    <div class="form-group">
                     {{Form::label('product_name', 'Product Name')}}
                     {{Form::text('product_name', $user->first_name,['class' => 'form-control','placeholder' =>'Product Name'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('product_price', 'Product Price')}}
                        {{Form::text('product_price', $user->last_name,['class' => 'form-control','placeholder' =>'Ksh.5000'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('stock', 'Stock ')}}
                        {{Form::text('stock', $user->country,['class' => 'form-control','placeholder' =>'Example 400 in Stock'])}}
                    </div>

                    <div class="form-group">
                        {{Form::file('image')}}
                    </div>
                    {{ Form::hidden('_method','PUT') }}
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

                {{ Form::close() }}
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
