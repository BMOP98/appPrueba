<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detalle
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $valor
 * @property $created_at
 * @property $updated_at
 *
 * @property VehiculoDetalle[] $vehiculoDetalles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Detalle extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'descripcion', 'valor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculoDetalles()
    {
        return $this->hasMany(\App\Models\VehiculoDetalle::class, 'id', 'detalle_id');
    }
    
}
