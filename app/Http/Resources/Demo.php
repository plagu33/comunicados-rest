<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Demo extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
        ];
    }
}
