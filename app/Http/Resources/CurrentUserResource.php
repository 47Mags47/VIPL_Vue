<?php

namespace App\Http\Resources;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrentUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $division = Division::whereKey(session('user.division'))->first();

        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'email' => $this->email,
            'status' => [
                'id' => $this->status->id,
                'name' => $this->status->name,
            ],
            'permissions' => $this->getAllPermissions()->pluck('code'),
            'division' => [
                'id' => $division?->id,
                'name' => $division?->name,
            ]
        ];
    }
}
