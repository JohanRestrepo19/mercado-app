<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "type" => "categories",
            "attributes" => [
                "name" => $this->name
            ],
            "relationships" => [
                'products' => ($request->wants_random) ? $this->randomProducts : $this->products
            ]
        ];
    }
}
