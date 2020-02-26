@extends('layout.app')

@section('content')
                    <a class="navbar-brand" href="{{ url('/payments') }}">
                        <button type="button" class="btn btn-outline-dark">Go Back</button>
                    </a>


            {{ Form::open(['action' => ['Person\PaymentsViewController@update', $payment->id] , 'method' =>'POST','enctype'=>'multipart/form-data']) }}

                <div class="form-group">
                 {{Form::label('product_name', 'Product Name')}}
                 {{Form::text('product_name', $payment->product_name,['class' => 'form-control','disabled','placeholder' =>'Product Name'])}}
                </div>

                <div class="form-group">
                    {{Form::label('payment_id', 'Payment ID')}}
                    {{Form::text('payment_id', $payment->payment_id,['class' => 'form-control','disabled','placeholder' =>'Ksh.5000'])}}
                </div>

                <div class="form-group">
                    {{Form::label('quantity', 'Quantity ')}}
                    {{Form::text('quantity', $payment->quantity,['class' => 'form-control','disabled','placeholder' =>'Example 400 in Stock'])}}
                </div>
                <div class="form-group">
                    {{Form::label('amount', 'Amount ')}}
                    {{Form::text('amount', $payment->amount,['class' => 'form-control','disabled','placeholder' =>'Example 400 in Stock'])}}
                </div>

                <div class="form-group">
                    {{Form::label('status', 'Status ')}}
                    {{Form::text('status', $payment->status,['class' => 'form-control','placeholder' =>'Example 400 in Stock'])}}
                </div>

                <div class="form-group">
                    {{Form::label('payment_on', 'Paid On ')}}
                    {{Form::text('payment_on', $payment->created_at,['class' => 'form-control','disabled','placeholder' =>'Example 400 in Stock'])}}
                </div>

                <div class="form-group">
                    {{Form::label('stock', 'Confirmed On ')}}
                    {{Form::text('date_created', old('date_created',Carbon\Carbon::today()->format('l jS \\of F Y h:i:s A')),['class'=>'form-control date-picker'])}}
                </div>


                {{ Form::hidden('_method','PUT') }}
                {{Form::submit('Submit', ['class' => 'btn btn-info'])}}

            {{ Form::close() }}


@endsection

