<?php

namespace App\Http\Requests;

use App\Models\BankContract;
use Illuminate\Foundation\Http\FormRequest;

class StoreBankContractRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'number' => ['required', 'string', 'min:2', 'max:255', 'unique:' . BankContract::class . ',number'],
            'signed_at' => ['required', 'date_format:Y-m-d'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'number.unique' => 'Договор с таким номером уже существует',
        ];
    }
}
