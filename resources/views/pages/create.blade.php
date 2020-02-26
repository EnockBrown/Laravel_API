@extends('layout.app')

@section('content')
                    <a class="navbar-brand" href="{{ url('/products') }}">
                        <button type="button" class="btn btn-outline-dark">Go Back</button>
                    </a>
                    <ul class="nav navbar-nav navbar-right">
                        <h1 class="btn btn-warning btn-lg btn-block">Add New Products</h1>
                    </ul>


            {{ Form::open(['action' => 'Person\ProductsViewController@store' , 'method' =>'POST', 'enctype' => 'multipart/form-data']) }}

                <div class="form-group">
                 {{Form::label('product_name', 'Product Name')}}
                 {{Form::text('product_name', '',['class' => 'form-control','placeholder' =>'Product Name'])}}
                </div>

                <div class="form-group">
                    {{Form::label('product_price', 'Product Price')}}
                    {{Form::text('product_price', '',['class' => 'form-control','placeholder' =>'Ksh.5000'])}}
                </div>

                <div class="form-group">
                    {{Form::label('stock', 'Stock ')}}
                    {{Form::text('stock', '',['class' => 'form-control','placeholder' =>'Example 400 in Stock'])}}
                </div>

                <div class="form-group">
                    {{Form::file('image')}}
                </div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

            {{ Form::close() }}


@endsection

