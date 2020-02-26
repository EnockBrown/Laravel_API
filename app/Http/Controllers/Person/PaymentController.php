<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PaymentResource;
use App\Http\Resources\PaymentResourceCollection;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function show(Payment $payment):PaymentResource
    {
        return new PaymentResource($payment);
    }

    public function index():PaymentResourceCollection
    {
       return new PaymentResourceCollection(Payment::paginate());
    }

    public function store(Request $request)
    {
        $this -> validate($request,[
            'customer_id' => 'required',
            'payment_id' =>'required',
            'quantity' =>'required',
            'amount' => 'required',
            'product_name' =>  'required'
        ]);

        //save payment request
        $payment=Payment::create($request->all());
        return new PaymentResource($payment);
    }
}
