<?php

namespace App\Http\Controllers;

use App\Models\VehiculoPrecio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoPrecioRequest;
use App\Mail\TestMail;
use App\Models\EstadoVehiculo;
use App\Models\Vehiculo;
use App\Models\VehiculoDetalle;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;

class VehiculoPrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $vehiculoPrecios = VehiculoPrecio::paginate();

        return view('vehiculo-precio.index', compact('vehiculoPrecios'))
            ->with('i', ($request->input('page', 1) - 1) * $vehiculoPrecios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $vehiculoPrecio = new VehiculoPrecio();

        return view('vehiculo-precio.create', compact('vehiculoPrecio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoPrecioRequest $request)
    {
        $vehiculo = Vehiculo::with('estadoVehiculo')->find($request->vehiculo_id);
        $vehiculoPrecio = VehiculoPrecio::where('vehiculo_id', $request->vehiculo_id)->first();
        $estadoAnterior = $vehiculo->estadoVehiculo->estado; // Captura el estado actual
        if ($vehiculoPrecio != null) {
            $vehiculoPrecio->update([
                'oferta' => $request->oferta
            ]);
            $vehiculo->estado_vehiculo_id = 7;
            $vehiculo->save();
            $estadoNuevo = EstadoVehiculo::where('id', 7)->first()->estado;
        } else {

            $vehiculo->estado_vehiculo_id = 6;
            $vehiculo->save();
            VehiculoPrecio::create($request->validated());
            $estadoNuevo = EstadoVehiculo::where('id', 6)->first()->estado;
        }
        Mail::to($vehiculo->cliente->email)->send(new TestMail($vehiculo, $estadoAnterior, $estadoNuevo));

        return Redirect::route('vehiculo-precios.index')
            ->with('success', 'VehiculoPrecio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $vehiculoPrecio = VehiculoPrecio::find($id);

        return view('vehiculo-precio.show', compact('vehiculoPrecio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $vehiculoPrecio = VehiculoPrecio::find($id);

        return view('vehiculo-precio.edit', compact('vehiculoPrecio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculoPrecioRequest $request, VehiculoPrecio $vehiculoPrecio): RedirectResponse
    {
        $vehiculoPrecio->update($request->validated());

        return Redirect::route('vehiculo-precios.index')
            ->with('success', 'VehiculoPrecio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        VehiculoPrecio::find($id)->delete();

        return Redirect::route('vehiculo-precios.index')
            ->with('success', 'VehiculoPrecio deleted successfully');
    }
}
