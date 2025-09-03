<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'        => ['required', 'string', 'min:2', 'max:255'],
            'last_name'         => ['nullable', 'string', 'min:2', 'max:255'],
            'middle_name'       => ['nullable', 'string', 'min:2', 'max:255'],
            'login'             => ['required', 'string', 'min:2', 'max:255', 'unique:' . User::class . ',login'],
            'password'          => ['required', 'string', 'min:4', 'max:255', 'confirmed'],
            'token'             => ['required']
        ];
    }
}
