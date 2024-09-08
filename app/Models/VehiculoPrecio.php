<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VehiculoPrecio
 *
 * @property $id
 * @property $vehiculo_id
 * @property $precio_vehiculo
 * @property $depreciacion
 * @property $valores_mecanicos
 * @property $valor_sistema
 * @property $oferta
 * @property $created_at
 * @property $updated_at
 *
 * @property Vehiculo $vehiculo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VehiculoPrecio extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['vehiculo_id', 'precio_vehiculo', 'depreciacion', 'iva', 'anio_antiguedad_kilometraje', 'valor_sistema', 'oferta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehiculo()
    {
        return $this->belongsTo(\App\Models\Vehiculo::class, 'vehiculo_id', 'id');
    }
}
