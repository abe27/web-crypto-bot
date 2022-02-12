<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class InterestingResource extends JsonResource
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
            'id' => $this->id,
            'asset_id' => $this->asset_id,
            'exchange_id' => $this->exchange_id,
            'currency_id' => $this->currency_id,
            'trend' => $this->trend,
            'last_price' => $this->last_price,
            'last_percent' => $this->last_percent,
            'open_order' => $this->open_order,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
        ];
    }
}
