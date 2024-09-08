<?php

namespace App\Http\Controllers;

use App\Models\VehiculoDetalle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoDetalleRequest;
use App\Mail\TestMail;
use App\Models\EstadoVehiculo;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VehiculoDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $vehiculoDetalles = VehiculoDetalle::paginate();

        return view('vehiculo-detalle.index', compact('vehiculoDetalles'))
            ->with('i', ($request->input('page', 1) - 1) * $vehiculoDetalles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $vehiculoDetalle = new VehiculoDetalle();

        return view('vehiculo-detalle.create', compact('vehiculoDetalle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoDetalleRequest $request): RedirectResponse
    {
        VehiculoDetalle::create($request->validated());

        return Redirect::route('vehiculo-detalles.index')
            ->with('success', 'VehiculoDetalle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $vehiculoDetalle = VehiculoDetalle::find($id);

        return view('vehiculo-detalle.show', compact('vehiculoDetalle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $vehiculoDetalle = VehiculoDetalle::find($id);

        return view('vehiculo-detalle.edit', compact('vehiculoDetalle'));
    }
    public function batchUpdate(Request $request)
    {


        // Validar los datos entrantes
        $validatedData = $request->validate([
            'detalles' => 'required|array',
            'detalles.*.vehiculoId' => 'required',
            'detalles.*.id' => 'required|exists:vehiculo_detalles,id',
            'detalles.*.precio' => 'required|numeric|min:0',
        ]);
        $sumaTotal = 0;

        // Procesar cada detalle
        foreach ($validatedData['detalles'] as $detalleData) {
            $detalle = VehiculoDetalle::findOrFail($detalleData['id']);
            $detalle->valor = $detalleData['precio'];
            $detalle->save();
            $sumaTotal += $detalle->valor;
        }
        $vehiculo = Vehiculo::with('estadoVehiculo')->find($validatedData['detalles'][0]['vehiculoId']);
        $estadoAnterior = $vehiculo->estadoVehiculo->estado; // Captura el estado actual
        $vehiculo->estado_vehiculo_id = 5;
        $vehiculo->valores_mecanicos = $sumaTotal;
        $vehiculo->save();
        $estadoNuevo = EstadoVehiculo::where('id', 5)->first()->estado;
        Mail::to($vehiculo->cliente->email)->send(new TestMail($vehiculo, $estadoAnterior, $estadoNuevo));

        // Devolver una respuesta JSON con éxito
        return response()->json(['success' => true]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VehiculoDetalle $vehiculoDetalle): RedirectResponse
    {
        if (!$vehiculoDetalle->estado) {
            $vehiculoDetalle->valor = $request->valor ? $request->valor : 0;
            $vehiculoDetalle->update();
        }
        $vehiculo = Vehiculo::find($vehiculoDetalle->vehiculo_id);
        $vehiculo->estado_vehiculo_id = 4;
        $vehiculo->save();

        return Redirect::route('vehiculos.precio', $vehiculoDetalle->vehiculo_id)
            ->with('success', 'VehiculoDetalle updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VehiculoDetalle::find($id)->delete();

        return Redirect::route('vehiculo-detalles.index')
            ->with('success', 'VehiculoDetalle deleted successfully');
    }
}
