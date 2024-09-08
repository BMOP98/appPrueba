<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnioRequest;
use App\Models\Descripcione;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AnioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $anios = Anio::paginate();

        return view('anio.index', compact('anios'))
            ->with('i', ($request->input('page', 1) - 1) * $anios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $anio = new Anio();
        $descripciones = Descripcione::all();
        return view('anio.create', compact('anio', 'descripciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnioRequest $request): RedirectResponse
    {
        Anio::create($request->validated());

        return Redirect::route('anios.index')
            ->with('success', 'Anio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $anio = Anio::find($id);

        return view('anio.show', compact('anio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $anio = Anio::find($id);

        return view('anio.edit', compact('anio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnioRequest $request, Anio $anio): RedirectResponse
    {
        $anio->update($request->validated());

        return Redirect::route('anios.index')
            ->with('success', 'Anio updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Anio::find($id)->delete();

        return Redirect::route('anios.index')
            ->with('success', 'Anio deleted successfully');
    }
}
