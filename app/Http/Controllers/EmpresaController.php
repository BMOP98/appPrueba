<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $empresas = Empresa::paginate();

        return view('empresa.index', compact('empresas'))
            ->with('i', ($request->input('page', 1) - 1) * $empresas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $empresa = new Empresa();

        return view('empresa.create', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpresaRequest $request): RedirectResponse
    {
        $request->estado == "on" ? $request->merge(['estado' => true]) : $request->merge(['estado' => false]);
        Empresa::create([
            'nombre' => $request->nombre,
            'estado' => $request->estado,
            'direccion' => $request->direccion,
            'ruc' => $request->ruc,
            'email' => $request->email,
            'telefono' => $request->telefono
        ]);
        return Redirect::route('empresas.index')
            ->with('success', 'Empresa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $empresa = Empresa::find($id);

        return view('empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $empresa = Empresa::find($id);

        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpresaRequest $request, Empresa $empresa): RedirectResponse
    {
        $empresa->update($request->validated());

        return Redirect::route('empresas.index')
            ->with('success', 'Empresa updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Empresa::find($id)->delete();

        return Redirect::route('empresas.index')
            ->with('success', 'Empresa deleted successfully');
    }
}
