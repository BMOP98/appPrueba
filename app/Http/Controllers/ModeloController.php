<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ModeloRequest;
use App\Models\Marca;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $modelos = Modelo::paginate();

        return view('modelo.index', compact('modelos'))
            ->with('i', ($request->input('page', 1) - 1) * $modelos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        $modelo = new Modelo();
        $marcas = Marca::all();
        return view('modelo.create', compact('modelo',  'marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModeloRequest $request): RedirectResponse
    {
        Modelo::create($request->validated());

        return Redirect::route('modelos.index')
            ->with('success', 'Modelo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $modelo = Modelo::find($id);

        return view('modelo.show', compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $modelo = Modelo::find($id);

        return view('modelo.edit', compact('modelo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModeloRequest $request, Modelo $modelo): RedirectResponse
    {
        $modelo->update($request->validated());

        return Redirect::route('modelos.index')
            ->with('success', 'Modelo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Modelo::find($id)->delete();

        return Redirect::route('modelos.index')
            ->with('success', 'Modelo deleted successfully');
    }
}
