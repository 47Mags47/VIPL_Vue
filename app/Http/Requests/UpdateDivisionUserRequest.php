<?php

namespace App\Http\Requests;

use App\Models\DivisionRole;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDivisionUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role_id' => ['required', 'exists:' . DivisionRole::class . ',id']
        ];
    }
}
