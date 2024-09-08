<?php

namespace App\Http\Controllers\Api;

use App\Models\Detalle;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\DetalleResource;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $detalles = Detalle::paginate();

        return DetalleResource::collection($detalles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetalleRequest $request): Detalle
    {
        return Detalle::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Detalle $detalle): Detalle
    {
        return $detalle;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetalleRequest $request, Detalle $detalle): Detalle
    {
        $detalle->update($request->validated());

        return $detalle;
    }

    public function destroy(Detalle $detalle): Response
    {
        $detalle->delete();

        return response()->noContent();
    }
}
