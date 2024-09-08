<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
            'placa' => [
                'required',
                'string',
                'unique:vehiculos,placa',
                'regex:/^[A-Z]{3}[0-9]{4}$/'
            ],
            'marca_id' => 'required',
            'modelo_id' => 'required',
            'categoria_id' => 'required',
            'anio' => 'required|integer|min:0|min_digits:4|before_or_equal:' . date('Y'),
            'descripcion_id' => 'required',
            'kilometraje' => 'required|min:0',
            'cliente_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'placa.required' => 'La placa del vehículo es obligatoria.',
            'placa.string' => 'La placa debe ser una cadena de texto.',
            'placa.unique' => 'La placa ya ha sido registrada anteriormente.',
            'placa.regex' => 'La placa debe tener 3 letras seguidas de 4 números (por ejemplo: ABC1234).',

            'color.required' => 'El color del vehículo es obligatorio.',
            'color.string' => 'El color debe ser una cadena de texto.',

            'marca.required' => 'La marca del vehículo es obligatoria.',
            'marca.string' => 'La marca debe ser una cadena de texto.',

            'modelo.required' => 'El modelo del vehículo es obligatorio.',
            'modelo.string' => 'El modelo debe ser una cadena de texto.',

            'anio.required' => 'El año del vehículo es obligatorio.',
            'anio.before_or_equal' => 'El año del vehículo no puede ser mayor que el año en curso.',

            'kilometraje.required' => 'El kilometraje del vehículo es obligatorio.',
            'kilometraje.min' => 'El kilometraje no puede ser un valor negativo.',

            'cliente_id.required' => 'El cliente es obligatorio.',
        ];
    }
}
