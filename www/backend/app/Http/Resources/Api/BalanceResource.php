<?php

namespace App\Http\Resources\Api;

use App\Models\Api\Balance;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Balance
 */
class BalanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'contract_id' => $this->contract_id,
            'amount' => $this->amount,
            'lastReplenishmentDate' => date('c', strtotime($this->lastReplenishment->datetime)),
            'createdAt' => $this->created_at,
        ];
    }
}
