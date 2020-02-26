@extends('layout.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <h3 class="btn btn-primary btn-lg btn-block">Available Products</h3>
                </div>

                <div class="panel-body">
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            <button type="button" class="btn btn-outline-secondary">Dahboard</button>
                        </a>
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            <button type="button" class="btn btn-outline-secondary">Back</button>
                        </a>

                        <a class="navbar-brand" href="{{ url('/products/create') }}">
                            <button type="button" class="btn btn-outline-secondary">Add New Product</button>
                        </a>

                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Created at</th>
                            <th>Update_at</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        @if (count($products) > 0)
                               @foreach ($products as $product )
                                      <tr>
                                            <th> <a href="/products/{{$product->id}}">{{$product->product_name}}</a></th>
                                            <th><small><b>Ksh.</b>{{$product->product_price}}</small></th>
                                            <th><small><b></b>{{$product->stock}}</small></th>
                                            <th><small><b>Created at: </b>{{$product->created_at}}</small></th>
                                            <th><small><b>Updated at: </b>{{$product->updated_at}}</small></th>
                                            <th><small> <a href="/products/{{$product->id}}/edit" class="btn btn-info">Edit</a></small></th>
                                            <th><small>
                                                       {!!Form::open(['action' => ['Person\ProductsViewController@destroy', $product->id],'method' => 'DELETE'])!!}
                                                            {{Form::hidden('method', 'DELETE')}}
                                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                        {!! Form::close() !!}</small>
                                            </th>
                                      </tr>
                                @endforeach
                            {{$products->links()}}
                         @else
                                <p>NO PRODUCTS</p>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

