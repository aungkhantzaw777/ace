<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class getResource extends JsonResource
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
                
            ],
            "errors"=> [],
            "duration"=> microtime(true)

            

        ];
    }
}
