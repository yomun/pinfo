<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'addr' => $this->addr,
            'postcode' => $this->postcode,
            'state' => $this->state,
        ];
    }
}
