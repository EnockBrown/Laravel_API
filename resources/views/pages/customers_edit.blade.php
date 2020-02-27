@extends('layout.app')

@section('content')
                    <a class="navbar-brand" href="{{ url('/users') }}">
                        <button type="button" class="btn btn-outline-dark">Go Back</button>
                    </a>


            {{ Form::open(['action' => ['Person\UsersViewController@update', $new_user->id] , 'method' =>'POST','enctype'=>'multipart/form-data']) }}

                <div class="form-group">
                 {{Form::label('product_name', 'Product Name')}}
                 {{Form::text('product_name', $new_user->first_name,['class' => 'form-control','placeholder' =>'Product Name'])}}
                </div>

                <div class="form-group">
                    {{Form::label('product_price', 'Product Price')}}
                    {{Form::text('product_price', $new_user->middle_name,['class' => 'form-control','placeholder' =>'Ksh.5000'])}}
                </div>

                <div class="form-group">
                    {{Form::label('stock', 'Stock ')}}
                    {{Form::text('stock', $new_user->last_name,['class' => 'form-control','placeholder' =>'Example 400 in Stock'])}}
                </div>

                
                {{ Form::hidden('_method','PUT') }}
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

            {{ Form::close() }}


@endsection

