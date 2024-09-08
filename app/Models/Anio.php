<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Anio
 *
 * @property $id
 * @property $anio
 * @property $descripcion_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Descripcione $descripcione
 * @property Vehiculo[] $vehiculos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Anio extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['anio', 'descripcion_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function descripcione()
    {
        return $this->belongsTo(\App\Models\Descripcione::class, 'descripcion_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculos()
    {
        return $this->hasMany(\App\Models\Vehiculo::class, 'id', 'anio_id');
    }
    
}
