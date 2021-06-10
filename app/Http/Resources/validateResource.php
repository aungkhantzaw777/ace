<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class validateResource extends JsonResource
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
            "success"=> 0,
            "code"=> 400,
            "meta"=> [
                "method"=> "POST",
                "endpoint"=> "1/shops"
            ],
            "data" => [], 
            "errors" => [
                
            ]
        ];
    }
}
