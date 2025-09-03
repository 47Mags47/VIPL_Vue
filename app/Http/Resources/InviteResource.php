<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InviteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'email' => $this->email,
            'token' => $this->token,
            'division' => [
                'id' => $this->division->id,
                'name' => $this->division->name,
            ],
            'role' => [
                'id' => $this->role->id,
                'name' => $this->role->name,
            ],
        ];
    }
}
