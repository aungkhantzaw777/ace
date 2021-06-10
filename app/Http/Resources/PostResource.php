<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'success' => '1', 'code' => '201', 
            'meta' => ['method' => 'POST', 'endpoint' => '1/shops'],
            'data' => ['id' => $this->id],
            "errors" => [],
            "duration" => microtime(true) - LARAVEL_START
        ];
        
    }
}
