<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
{
    public function toArray($request)
    {
        return ["id" => $this->id, "name" => $this->service->name, "price" => $this->price, "user" => $this->user_id,];
    }
}
