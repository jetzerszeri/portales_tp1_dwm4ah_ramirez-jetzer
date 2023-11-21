<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => 'required|min:3|max:20',
            'lastname' => 'required|min:2|max:20',
            'email' => 'required|email',
            'address' => 'required|min:2|max:100',
            'city' => 'required|min:3|max:30',
            'state_id' => 'required',
            'zip_code' => 'required|digits:5',
            'service_id' => 'required|exists:services,id',
            'service_date' => 'required|date|after_or_equal:today',
            'notes' => 'max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'name.max' => 'El nombre debe tener máximo 20 caracteres.',
            'lastname.required' => 'El apellido es requerido.',
            'lastname.min' => 'El apellido debe tener al menos 2 caracteres.',
            'lastname.max' => 'El apellido debe tener máximo 20 caracteres.',
            'email.required' => 'El email es requerido.',
            'email.email' => 'El email debe ser válido.',
            'address.required' => 'La dirección es requerida.',
            'address.min' => 'La dirección debe tener al menos 2 caracteres.',
            'address.max' => 'La dirección debe tener máximo 100 caracteres.',
            'city.required' => 'La ciudad es requerida.',
            'city.min' => 'La ciudad debe tener al menos 3 caracteres.',
            'city.max' => 'La ciudad debe tener máximo 30 caracteres.',
            'state_id.required' => 'El estado es requerido.',
            'zip_code.required' => 'El código postal es requerido.',
            'zip_code.digits' => 'El código postal debe tener 5 dígitos.',
            'service_id.required' => 'El servicio es requerido.',
            'service_id.exists' => 'El servicio es inválido.',
            'service_date.required' => 'La fecha del servicio es requerida.',
            'service_date.date' => 'La fecha del servicio es inválida.',
            'service_date.after_or_equal' => 'La fecha del servicio debe ser posterior o igual a hoy.',
            'notes.max' => 'Las notas deben tener máximo 1000 caracteres.',
        ];
    }
}
