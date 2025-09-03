<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BankContractResource extends JsonResource
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
            'number' => $this->number,
            'signed_at' => $this->signed_at->format('Y-m-d'),
            'writer' => [
                'id' => $this->writer->id,
                'name' => $this->writer->name,
            ]
        ];
    }
}
