<?php

namespace App\Http\Resources;

use App\Models\Customers;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $absurl = 'http://' . gethostbyname(gethostname()).'/restservices/public/storage/storage/images/' ;
        return [
            'user_id'=> $this -> user_id,
            'first_name'=> $this -> first_name,
            'middle_name'=> $this -> middle_name,
            'last_name'=> $this -> last_name,
            'user_phone'=> $this -> user_phone,
            'user_email'=> $this -> user_email,
            'unique_id'=> $this -> unique_id,
            'country'=> $this -> country,
            'cover_image'=> $this -> cover_image,
            'base_url'=>$absurl
        ];
    }
}
