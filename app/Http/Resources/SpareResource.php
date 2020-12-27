<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpareResource extends JsonResource
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
            'id' => $this->id,
            'code' => $this->code,
            'description' => $this->description,
            'category' => $this->category->name,
            'brand' => $this->brand->name,
            'measure' => $this->measure,
            'original_code' => $this->original_code,
            'price' => $this->price,
            'investment' => $this->investment
        ];
    }
}
