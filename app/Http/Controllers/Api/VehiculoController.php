<?php

namespace App\Http\Controllers\Api;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\VehiculoResource;
use Illuminate\Support\Facades\Auth;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (Auth::user()->rol->name == 'SuperAdmin') {
            $vehiculos = Vehiculo::Where("estado_vehiculo_id", 2)->paginate();
        } else {
            if (Auth::user()->rol->name == 'Técnico de Mecanica' || Auth::user()->rol->name == 'Administrador') {
                $vehiculos = Vehiculo::Where("estado_vehiculo_id", 2)->paginate();
            }else{
                return response()->json(['message' => 'No autorizado'], 401);
            }
        }


        return VehiculoResource::collection($vehiculos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoRequest $request): Vehiculo
    {
        return Vehiculo::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo): Vehiculo
    {
        return $vehiculo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculoRequest $request, Vehiculo $vehiculo): Vehiculo
    {
        $vehiculo->update($request->validated());

        return $vehiculo;
    }

    public function destroy(Vehiculo $vehiculo): Response
    {
        $vehiculo->delete();

        return response()->noContent();
    }
}
