<?php

namespace App\Http\Requests;

use App\Models\Law;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLawRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'min:1', 'max:15', 'unique:'. Law::class .',code,' . $this->route('law')->id],
            'name' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }
}
