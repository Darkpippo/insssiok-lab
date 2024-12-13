<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'account_number_receiver' => 'required',
            'name_surname_employee' => 'required',
            'name_surname_receiver' => 'required',
            'amount' => 'required',
            'account_number_sender' => 'required|numeric',
            'name_surname_sender' => 'required'
        ];
    }
}
