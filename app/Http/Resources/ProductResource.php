<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return[
            'product_name'=>$this->product_name,
            'product_price'=>$this->product_price,
            'stock'=>$this-> stock,
            'product_link'=> $this->product_link,
        ];
    }
}
