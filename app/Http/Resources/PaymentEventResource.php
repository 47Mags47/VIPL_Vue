<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentEventResource extends JsonResource
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
            'date' => $this->date,
            'payment' => [
                'id' => $this->payment->id,
                'code' => $this->payment->code,
                'name' => $this->payment->name,
            ],
            'status' => [
                'id' => $this->status->id,
                'name' => $this->status->name,
            ]
        ];
    }
}
