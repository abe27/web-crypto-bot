<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\ExchangeResource;

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
            'asset_id' => $this->get_asset,
            'exchange_id' => $this->get_exchange,
            'currency_id' => $this->get_currency,
            'trend' => $this->trend,
            'last_price' => $this->last_price,
            'last_percent' => $this->last_percent,
            'open_order' => $this->open_order,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at->format('d/m/Y H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}
