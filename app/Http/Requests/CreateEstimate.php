<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEstimate extends FormRequest
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
            'request_id' => 'required|exists:requests,id',
            'notes' => 'required|max:1000',
            'price' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'request_id.required' => 'La solicitud es requerida.',
            'request_id.exists' => 'La solicitud es inválida.',
            'notes.max' => 'Las notas deben tener máximo 1000 caracteres.',
            'notes.required' => 'Las notas son requeridas.',
            'price.required' => 'El precio es requerido.',
            'price.numeric' => 'El precio debe ser un número.',

        ];
    }
}
