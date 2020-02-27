@extends('layout.app')

@section('content')

    <div class="row">
            <div class="panel panel-default">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <button type="button" class="btn btn-outline-secondary">{{config('app.name')}}</button>
                </a>
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <button type="button" class="btn btn-outline-secondary">Back</button>
                </a>

                <div class="panel-body">

                        <h3 class="btn btn-primary btn-lg btn-block">Payments</h3>

                    <table class="table table-striped">
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Payment ID</th>
                            <th>Customer ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th >Payment On</th>
                            <th >Confirmed On</th>
                            <th>Confirm</th>
                            <th>Delete</th>
                        </tr>
                        @if (count($payments) > 0)
                               @foreach ($payments as $payment )
                                      <tr>
                                            <th> {{$payment->product_name}}</th>
                                            <th><small>{{$payment->quantity}}</small></th>
                                            <th><small>{{$payment->payment_id}}</small></th>
                                            <th><small><b></b>{{$payment->customer_id}}</small></th>
                                            <th><small><b>Ksh.</b>{{$payment->amount}}</small></th>
                                            <th><small><b><strong class="btn btn-outline-success">{{$payment->status}}</strong></b></small></th>
                                            <th ><small><strong>Payed On: </strong>{{$payment->created_at}}</small></th>
                                            <th ><small><strong><b>Confirmed On:</strong> {{$payment->updated_at}}</b></small></th>
                                            <th><small>

                                                {!!Form::open(['action' => ['Person\PaymentsViewController@update', $payment->id],'method' => 'PUT'])!!}
                                                    {{Form::hidden('method', 'PUT')}}
                                                    {{ Form::submit('Confirm', ['class' => 'btn btn-info'])}}
                                                {!! Form::close() !!}
                                               </small>
                                            </th>
                                            <th><small>
                                                       {!!Form::open(['action' => ['Person\PaymentsViewController@destroy', $payment->id],'method' => 'DELETE'])!!}
                                                            {{Form::hidden('method', 'DELETE')}}
                                                            {{ Form::submit('Clear', ['class' => 'btn btn-danger'])}}
                                                        {!! Form::close() !!}</small>
                                            </th>
                                      </tr>
                                @endforeach

                         @else
                                <p class="btn btn-outline-danger"><strong>NO PAYMENTS AVAILABLE !!!</strong></p>
                        @endif
                    </table>
                    {{$payments->links()}}
                </div>
            </div>
    </div>
@endsection

