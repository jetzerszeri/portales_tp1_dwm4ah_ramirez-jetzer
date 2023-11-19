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
            'state_id' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
            'zip_code' => 'required|digits:5',
            'service_id' => 'required|exists:services,id',
            'service_date' => 'required|date|after_or_equal:today',
            'notes' => 'max:1000',
        ];
    }
}
