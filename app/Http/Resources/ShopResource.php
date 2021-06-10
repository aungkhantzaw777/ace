<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
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
            "id"=> $this->id,
            "admin_id"=> $this->admin_id,
            "name"=> $this->name,
            "description"=> $this->description,
            "discount_type"=> $this->discount_type,
            "amount"=> $this->amount,
            "image_url"=> $this->image_url,
            "code"=> 23334,
            "start_datetime"=> $this->start_datetime,
            "end_datetime"=> $this->end_datetime,
            "coupon_type"=> $this->coupon_type,
            "used_count"=> $this->used_count,
            "created_at"=> $this->created_at,
            "updated_at"=> $this->created_at,
            "shops"=> $this->shops,
            
        ];
    }
}
