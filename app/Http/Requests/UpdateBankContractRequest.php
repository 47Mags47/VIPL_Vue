<?php

namespace App\Http\Requests;

use App\Models\BankContract;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBankContractRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'number' => ['required', 'string', 'min:1', 'max:255', 'unique:'. BankContract::class .',number,' . $this->route('bank_contract')->id],
            'signed_at' => ['required', 'date_format:Y-m-d'],
        ];
    }
}
