<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VehiculoDetalle
 *
 * @property $id
 * @property $vehiculo_id
 * @property $detalle_id
 * @property $estado
 * @property $valor
 * @property $created_at
 * @property $updated_at
 *
 * @property Detalle $detalle
 * @property Vehiculo $vehiculo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VehiculoDetalle extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['vehiculo_id', 'detalle_id', 'estado', 'valor', 'descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detalle()
    {
        return $this->belongsTo(\App\Models\Detalle::class, 'detalle_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehiculo()
    {
        return $this->belongsTo(\App\Models\Vehiculo::class, 'vehiculo_id', 'id');
    }

}
