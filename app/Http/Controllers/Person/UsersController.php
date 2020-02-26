<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Customers;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'user_id'=> 'required',
            'first_name'=> 'required',
            'middle_name'=> 'required',
            'last_name'=> 'required',
            'user_phone'=> 'required',
            'user_email'=> 'required',
            'country' => 'required',
            'cover_image' => 'image|max:1999'

        ]);

                  //handle file upload
                  if($request->hasFile('cover_image'))
                  {
                     //get filename and extension
                     $fileNameWithExtension=$request->file('cover_image')->getClientOriginalName();

                     //getFile name
                     $filename=pathinfo($fileNameWithExtension,PATHINFO_FILENAME);

                     //GET EXTENSION
                     $extension=$request->file('cover_image')->getClientOriginalExtension();

                     $absurl = 'http://' . gethostbyname(gethostname()) . '/F:/laravel/restservices/public/storage/images';
                     //filename to store
                     $fileNameToStore=$filename.'_'.time().'.'.$extension;

                     //upload image
                     $path=$request->file('cover_image')->storeAs('public/storage/images',$fileNameToStore);

                     //$name=$absurl.'/'.$fileNameToStore;

                  }
                  else
                  {
                     $fileNameToStore='noimage.jpg';
                  }

                  $unique_id=uniqid("",true);
                  //$product=new User();
                  $product=new Customers();
                  $product -> user_id =$request->input('user_id');
                  $product -> first_name =$request->input('first_name');
                  $product -> middle_name =$request->input('middle_name');
                  $product -> last_name =$request->input('last_name');
                  $product -> user_phone =$request->input('user_phone');
                  $product -> user_email =$request->input('user_email');
                  $product -> unique_id =$unique_id;
                  $product -> country =$request->input('country');
                  $product -> cover_image =$fileNameToStore;
                  $product->save();
                //   $product -> stock =$request->input('stock');
                //   $product -> product_link = $fileNameToStore;
                  //$product->save();
                  //return $product;

                // //save payment customer
               // $customer=Customers::create($request->all());
                return new UserResource($product);
                // $payment=Payment::create($request->all());
                // return new PaymentResource($payment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=Customers::find($id);
      //  $image_link = $customer->first_name;
        return new UserResource($customer);
        //return new ProductResourceCollection(Product::paginate());


        // $customer=Customers::find($id);

        // $name = $customer->first_name;
        // return $name;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
