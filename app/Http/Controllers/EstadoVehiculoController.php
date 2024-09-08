<?php

namespace App\Http\Controllers;

use App\Models\EstadoVehiculo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoVehiculoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EstadoVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $estadoVehiculos = EstadoVehiculo::paginate();

        return view('estado-vehiculo.index', compact('estadoVehiculos'))
            ->with('i', ($request->input('page', 1) - 1) * $estadoVehiculos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $estadoVehiculo = new EstadoVehiculo();

        return view('estado-vehiculo.create', compact('estadoVehiculo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstadoVehiculoRequest $request): RedirectResponse
    {
        EstadoVehiculo::create($request->validated());

        return Redirect::route('estado-vehiculos.index')
            ->with('success', 'EstadoVehiculo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $estadoVehiculo = EstadoVehiculo::find($id);

        return view('estado-vehiculo.show', compact('estadoVehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $estadoVehiculo = EstadoVehiculo::find($id);

        return view('estado-vehiculo.edit', compact('estadoVehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstadoVehiculoRequest $request, EstadoVehiculo $estadoVehiculo): RedirectResponse
    {
        $estadoVehiculo->update($request->validated());

        return Redirect::route('estado-vehiculos.index')
            ->with('success', 'EstadoVehiculo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        EstadoVehiculo::find($id)->delete();

        return Redirect::route('estado-vehiculos.index')
            ->with('success', 'EstadoVehiculo deleted successfully');
    }
}
