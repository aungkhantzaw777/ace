<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class getResources extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "success"=> 1,
            "code"=> 200,
            "meta"=> [
                "method"=> "GET",
                "endpoint"=> "1/shops",
                "limit"=> 30,
                "offset"=> 0,
                "total"=> $this->count()
            ],
            "data"=> [
                "id"=> $this->id,
                "admin_id"=> $this->admin_id,
                "name"=> $this->name,
                "description"=> $this->description,
                "discount_type"=> $this->discount_type,
                "amount"=> 10,
                "image_url"=> "https://s3-ap-northeast-1.amazonaws.com/coupon.stage.image/photos/290/001.jpg",
                "code"=> $this->code,
                "start_datetime"=> $this->start_datetime,
                "end_datetime"=> $this->end_datetime,
                "coupon_type"=> $this->coupon_type,
                "used_count"=> 1,
                "created_at"=> $this->created_at,
                "updated_at"=> $this->deleted_at,
  
            ],
            "errors"=> [],
            "duration"=> microtime(true)

        ];
    }
}
