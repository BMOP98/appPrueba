<?php

namespace App\Http\Controllers;

use App\Models\Descripcione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DescripcioneRequest;
use App\Models\Modelo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DescripcioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $descripciones = Descripcione::paginate();

        return view('descripcione.index', compact('descripciones'))
            ->with('i', ($request->input('page', 1) - 1) * $descripciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $descripcione = new Descripcione();
        $modelos = Modelo::all();
        return view('descripcione.create', compact('descripcione', 'modelos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DescripcioneRequest $request): RedirectResponse
    {
        Descripcione::create($request->validated());

        return Redirect::route('descripciones.index')
            ->with('success', 'Descripcione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $descripcione = Descripcione::find($id);

        return view('descripcione.show', compact('descripcione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $descripcione = Descripcione::find($id);

        return view('descripcione.edit', compact('descripcione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DescripcioneRequest $request, Descripcione $descripcione): RedirectResponse
    {
        $descripcione->update($request->validated());

        return Redirect::route('descripciones.index')
            ->with('success', 'Descripcione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Descripcione::find($id)->delete();

        return Redirect::route('descripciones.index')
            ->with('success', 'Descripcione deleted successfully');
    }
}
