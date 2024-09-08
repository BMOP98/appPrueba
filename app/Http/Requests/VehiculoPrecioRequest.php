<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoPrecioRequest extends FormRequest
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
			'vehiculo_id' => 'required',
			'precio_vehiculo' => 'required',
			'depreciacion' => 'required',
			'iva' => 'required',
			'anio_antiguedad_kilometraje' => 'required',
			'valor_sistema' => 'required',
			'oferta' => 'required',
        ];
    }
}
