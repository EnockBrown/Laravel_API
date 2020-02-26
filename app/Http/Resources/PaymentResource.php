<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'customer_id' => $this -> customer_id,
            'quantity' => $this-> quantity,
            'payment_id' => $this -> payment_id,
            'amount' => $this -> amount,
            'status' => $this -> status,
            'product_name' => $this -> product_name,
        ];
    }
}
