<?php

namespace App\Http\Resources;

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
        return [
            'id'                => $this->id,
            'first_name'        => $this->first_name,
            'last_name'         => $this->last_name,
            'middle_name'       => $this->middle_name,
            'email'             => $this->email,
            'password_expired'  => $this->password_expired,
            'status'            => [
                'id'    => $this->status->id,
                'name'  => $this->status->name,
            ],
            'role'              => [
                'id'    => $this->role->id,
                'name'  => $this->role->name,
            ],
            'email_verified_at' => $this->email_verified_at->format('Y-m-d'),
            'permissions' => $this->permissions->map(function($permission){
                return $permission->code;
            }),
        ];
    }
}
