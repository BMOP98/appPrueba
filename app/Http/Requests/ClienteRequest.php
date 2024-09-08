<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'cedula' => 'required|string|max_digits:13|min_digits:10',
            'telefono' => 'required|string|max_digits:10|min_digits:10',
            'email' => 'required|string',
            'direccion' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',

            'cedula.required' => 'El campo cédula es obligatorio.',
            'cedula.string' => 'El campo cédula debe ser una cadena de texto.',
            'cedula.max_digits' => 'El campo cédula no puede tener más de 13 dígitos.',
            'cedula.min_digits' => 'El campo cédula debe tener al menos 9 dígitos.',

            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.string' => 'El campo teléfono debe ser una cadena de texto.',
            'telefono.max_digits' => 'El campo teléfono no puede tener más de 10 dígitos.',
            'telefono.min_digits' => 'El campo teléfono debe tener exactamente 10 dígitos.',

            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.string' => 'El campo correo electrónico debe ser una cadena de texto.',

            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'El campo dirección debe ser una cadena de texto.',
        ];
    }
}
