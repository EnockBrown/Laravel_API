<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsViewController extends Controller
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
        //return Product::all();
       $products= Product::orderBy('created_at','desc')->paginate(10);
        return view('pages.products')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
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
            'product_name' =>'required',
            'product_price' => 'required',
            'stock' => 'required',
            'image' => 'image|max:1999'
        ]);
          //handle file upload
        if($request->hasFile('image'))
        {
           //get filename and extension
           $fileNameWithExtension=$request->file('image')->getClientOriginalName();

           //getFile name
           $filename=pathinfo($fileNameWithExtension,PATHINFO_FILENAME);

           //GET EXTENSION
           $extension=$request->file('image')->getClientOriginalExtension();

           //filename to store
           $fileNameToStore=$filename.'_'.time().'.'.$extension;

           //upload image
           $path=$request->file('image')->storeAs('public/images',$fileNameToStore);

           $name=$path.$fileNameToStore;

        }
        else
        {
           $fileNameToStore='noimage.jpg';
        }

        $product=new Product();
        $product -> product_name =$request->input('product_name');
        $product -> product_price =$request->input('product_price');
        $product -> stock =$request->input('stock');
        $product -> product_link = $fileNameToStore;
        $product->save();
         return redirect('/products')->with('success','Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::find($id);
        return view('pages.Show')->with('product',$product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= Product::find($id);
        return view('pages.edit')->with('product',$product);
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
        $this->validate($request, [
            'product_name' =>'required',
            'product_price' => 'required',
            'stock' => 'required',
            'image' => 'image|max:1999'
        ]);
          //handle file upload
        if($request->hasFile('image'))
        {
           //get filename and extension
           $fileNameWithExtension=$request->file('image')->getClientOriginalName();

           //getFile name
           $filename=pathinfo($fileNameWithExtension,PATHINFO_FILENAME);

           //GET EXTENSION
           $extension=$request->file('image')->getClientOriginalExtension();

           //filename to store
           $fileNameToStore=$filename.'_'.time().'.'.$extension;

           //upload image
           $path=$request->file('image')->storeAs('public/images',$fileNameToStore);

           $name=$path.$fileNameToStore;

        }
        else
        {
           $fileNameToStore='noimage.jpg';
        }

        $product= Product::find($id);
        $product -> product_name =$request->input('product_name');
        $product -> product_price =$request->input('product_price');
        $product -> stock =$request->input('stock');
        $product -> product_link = $fileNameToStore;
        $product->save();
         return redirect('/products')->with('success','Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect('/products')->with('success','Product Removed');
    }
}
