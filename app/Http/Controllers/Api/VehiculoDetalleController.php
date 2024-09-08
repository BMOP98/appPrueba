<?php

namespace App\Http\Controllers\Api;

use App\Models\VehiculoDetalle;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoDetalleRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\VehiculoDetalleResource;
use App\Mail\TestMail;
use App\Models\Detalle;
use App\Models\EstadoVehiculo;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Mail;

class VehiculoDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $vehiculoDetalles = VehiculoDetalle::paginate();

        return VehiculoDetalleResource::collection($vehiculoDetalles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoDetalleRequest $request): VehiculoDetalle
    {
        // Encuentra el vehículo con su estado actual
        $vehiculo = Vehiculo::with('estadoVehiculo')->find($request->vehiculo_id);

        // Obtiene el último registro donde 'valor' es mayor que 0
        $ultimoDetalle = Detalle::where('valor', '>', '0')->orderBy('id', 'desc')->first();

        // Verifica si el ID del último detalle es igual al ID que viene en el request
        if ($ultimoDetalle && $ultimoDetalle->id == $request->vehiculo_id) {
            // Captura el estado anterior como '2'
            $estadoAnterior = EstadoVehiculo::where('id', 2)->first()->estado;


            // Captura el nuevo estado como '3'
            $estadoNuevo = EstadoVehiculo::where('id', 3)->first()->estado;

            // Envía el correo con el estado anterior y nuevo
            Mail::to($vehiculo->cliente->email)->send(new TestMail($vehiculo, $estadoAnterior, $estadoNuevo));
        }
        // Cambia el estado del vehículo a '3'
        $vehiculo->estado_vehiculo_id = 3;
        $vehiculo->save();

        // Guarda los detalles del vehículo y devuelve la respuesta
        return VehiculoDetalle::create($request->validated());
    }


    /**
     * Display the specified resource.
     */
    public function show(VehiculoDetalle $vehiculoDetalle): VehiculoDetalle
    {
        return $vehiculoDetalle;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculoDetalleRequest $request, VehiculoDetalle $vehiculoDetalle): VehiculoDetalle
    {
        $vehiculoDetalle->update($request->validated());

        return $vehiculoDetalle;
    }

    public function destroy(VehiculoDetalle $vehiculoDetalle): Response
    {
        $vehiculoDetalle->delete();

        return response()->noContent();
    }
}
