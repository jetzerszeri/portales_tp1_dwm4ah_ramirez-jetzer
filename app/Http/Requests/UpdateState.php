<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateState extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $stateId = $this->route('state');

        return [
            'name' => [
                'required',
                'min:3',
                'max:100',
                Rule::unique('states', 'name')->ignore($stateId),
            ],
            'abbreviation' => [
                'required',
                'min:2',
                'max:2',
                Rule::unique('states', 'abbreviation')->ignore($stateId),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del estado es obligatorio.',
            'name.min' => 'El nombre debe tener al menos :min caracteres.',
            'name.max' => 'El nombre no debe tener más de :max caracteres.',
            'name.unique' => 'Ya existe un estado con ese nombre.',
            'abbreviation.required' => 'La abreviatura del estado es obligatoria.',
            'abbreviation.min' => 'La abreviatura debe tener al menos :min caracteres.',
            'abbreviation.max' => 'La abreviatura no debe tener más de :max caracteres.',
            'abbreviation.unique' => 'Ya existe un estado con esa abreviatura.',
        ];
    }
}
