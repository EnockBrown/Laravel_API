<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsViewController extends Controller
{

           /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $payments=Payment::orderBy('created_at','desc')->paginate(10);
        return view('pages.payments')->with('payments',$payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment= Payment::find($id);
        return view('pages.payment_show')->with('payment',$payment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment=Payment::find($id);


           $name = $payment->product_name;
           $payment_id =$payment->payment_id;
           $quantity =$payment->quantity;
           $customer_id =$payment->customer_id;
           $amount =$payment->amount;
           $status ="CONFIRMED";
           $paid_On =$payment->created_at;
           $updated_on=   strlen(date('d/m/Y H:i:s'));

           $UpdatePayment= Payment::find($id);
           $UpdatePayment -> product_name =$name;
           $UpdatePayment -> payment_id =$payment_id;
           $UpdatePayment -> quantity =$quantity;
           $UpdatePayment -> customer_id =$customer_id;
           $UpdatePayment -> amount =$amount;
           $UpdatePayment -> status =$status;
           $UpdatePayment -> created_at =$paid_On;
           $UpdatePayment -> updated_at =$updated_on;
           $UpdatePayment->save();

           return redirect('/payments')->with('success','Payment Updated');

        // $product=new Product();
        // $product -> product_name =$request->input('product_name');
        // $product -> product_price =$request->input('product_price');
        // $product -> stock =$request->input('stock');
        // $product -> product_link = $fileNameToStore;
        // $product->save();
        //  return redirect('/products')->with('success','Product Added');
        // $products= Product::orderBy('created_at','desc')->paginate(10);
        // return view('pages.products')->with('products',$products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment=Payment::find($id);
        $payment->delete();
        return redirect('/payments')->with('success','Payment Removed');
        // $product=Product::find($id);
        // $product->delete();
        // return redirect('/products')->with('success','Product Removed');
    }
}
