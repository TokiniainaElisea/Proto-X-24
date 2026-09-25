<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevisFilterRequest extends FormRequest
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
            'begin' => ['nullable'],
            'ending' => ['nullable'],
            'quote_reference' => ['nullable', 'string'],
            'montant' => ['nullable', 'numeric'],
            'name_client' => ['nullable', 'string'], 
        ];
    }
}
