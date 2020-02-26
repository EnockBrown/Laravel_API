<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
          // dd($this-> review),
           'reviews'=> $this -> review,
           'from_users_id' => $this -> from_users_id,
           'product_name' => $this -> product_name
       ];
    }
}
