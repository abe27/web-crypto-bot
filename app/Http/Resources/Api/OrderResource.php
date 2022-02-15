<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user_id' => $this->user_id,
            'interest_id' => $this->interest_id,
            'order_type_id' => $this->order_type_id,
            'orderno' => $this->orderno,
            'at_price' => $this->at_price,
            'total_coin' => $this->total_coin,
            'type' => $this->type,
            'status' => $this->status,
            'is_checked' => $this->is_checked,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at->format('d/m/Y H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}
