@extends('layout.app')

@section('content')

        <a class="navbar-brand" href="{{ url('/products') }}">
            <button type="button" class="btn btn-outline-secondary"> Go Back</button>
        </a>
    <div class="well">

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <img style="width:100%" src="/storage/images/{{$product->product_link}}"/>
            </div>
            <div class="col-md-8 col-sm-8">
                <h2>{{$product->product_name}}</h2>
                <li class="list-group-item">
                    <p><b>Price: Ksh.</b>{{$product->product_price}}</p>
                    <p>Stock: {{$product->stock}}</p>
                    <p>Link: {{$product->product_link}}</p>
                    <div class="alert alert-light" role="alert">
                        <small><b>Created at: </b>{{$product->created_at}}</small>
                    </div>
                </li>

                <hr>
                <a href="/products/{{$product->id}}/edit" class="btn btn-info">Edit</a>

                {!!Form::open(['action' => ['Person\ProductsViewController@destroy', $product->id],'method' => 'DELETE', 'class' => 'btn float-right'])!!}
                    {{Form::hidden('method', 'DELETE')}}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!! Form::close() !!}
            </div>
        </div>

   </div>


@endsection

