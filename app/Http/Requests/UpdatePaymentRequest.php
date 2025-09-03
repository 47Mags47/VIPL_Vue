<?php

namespace App\Http\Requests;

use App\Models\Law;
use App\Models\Payment;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'min:3', 'max:3', 'unique:' . Payment::class . ',code,' . $this->route('payment')->id],
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'kbk'   => ['required', 'string', 'min:20', 'max:20', 'regex:/[0-9A-ZА-Я]{20}/'],
            'law_id' => ['required', 'exists:' . Law::class . ',id'],
        ];
    }
}
