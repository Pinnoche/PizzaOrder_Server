<?php

namespace App\Http\Resources\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PizzaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => ucwords($this->name),
            'type' => ucwords($this->type),
            'base' => ucwords($this->base),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
