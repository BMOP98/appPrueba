<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Descripcione
 *
 * @property $id
 * @property $descripcion
 * @property $modelo_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Modelo $modelo
 * @property Anio[] $anios
 * @property Vehiculo[] $vehiculos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Descripcione extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['descripcion', 'modelo_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modelo()
    {
        return $this->belongsTo(\App\Models\Modelo::class, 'modelo_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function anios()
    {
        return $this->hasMany(\App\Models\Anio::class, 'id', 'descripcion_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculos()
    {
        return $this->hasMany(\App\Models\Vehiculo::class, 'id', 'descripcion_id');
    }
    
}
