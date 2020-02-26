<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Resources\PersonResourceCollection;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * returns details of a single product
     */
    public function show(Product $product):ProductResource
    {

        return new ProductResource($product);
    }

    /**
     * returns all products in the database
     */
    public function index():ProductResourceCollection
    {
        return new ProductResourceCollection(Product::paginate());
    }

    /**
     * to create an new Product
     */
    public function store(Request $request)
    {
        //validate the form
       $request -> validate([
           'product_name' =>'required',
           'product_price' => 'required',
           'product_link' => 'required',
           'stock'       => 'required',
       ]);



       //save the product
       $product=Product::create($request->all());

       //return newly created product
       return new ProductResource($product);
    }

    /**
     * update existing product
     */

     public function update(Request $request,Product  $product):ProductResource
     {
         $product->update($request->all());

         //return new product details
         return new ProductResource($product);
     }
    //destroy
    public function destroy(Product $product)
    {
       $product->delete();

       return response()->json();
    }
}
