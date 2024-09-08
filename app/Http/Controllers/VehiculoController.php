<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoRequest;
use App\Mail\TestMail;
use App\Models\Anio;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Descripcione;
use App\Models\EstadoVehiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\VehiculoDetalle;
use App\Models\VehiculoPrecio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtenemos el valor del campo de búsqueda
        $search = $request->input('search');

        // Si existe un valor en el campo de búsqueda, filtramos los resultados
        $vehiculos = Vehiculo::query()
            ->when($search, function ($query, $search) {
                return $query->where('placa', 'like', '%' . $search . '%');
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        // Retornamos la vista con los resultados filtrados
        return view('vehiculo.index', compact('vehiculos'))
            ->with('i', ($request->input('page', 1) - 1) * $vehiculos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $vehiculo = new Vehiculo();
        $clientes = Cliente::all();
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('vehiculo.create', compact('vehiculo', 'clientes', 'marcas', 'categorias'));
    }
    public function getModelos($marcaId)
    {
        $modelos = Modelo::where('marca_id', $marcaId)->get();
        return response()->json(['modelos' => $modelos]);
    }

    public function getDescripciones($modeloId)
    {
        $descripciones = Descripcione::where('modelo_id', $modeloId)->get();
        return response()->json(['descripciones' => $descripciones]);
    }

    public function getAnios($descripcionId)
    {
        $anios = Anio::where('descripcion_id', $descripcionId)->get();
        return response()->json(['anios' => $anios]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoRequest $request): RedirectResponse
    {

        $request->validated();
        $request->merge([
            'estado_vehiculo_id' => 1,
            'user_id' => Auth::user()->id,
        ]);

        Vehiculo::create($request->all());

        return Redirect::route('vehiculos.index')
            ->with('success', 'Vehiculo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $vehiculo = Vehiculo::find($id);

        return view('vehiculo.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $vehiculo = Vehiculo::find($id);

        return view('vehiculo.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculoRequest $request, Vehiculo $vehiculo): RedirectResponse
    {
        $vehiculo->update($request->validated());

        return Redirect::route('vehiculos.index')
            ->with('success', 'Vehiculo updated successfully');
    }
    public function updateEstado($id): RedirectResponse
    {
        $vehiculo = Vehiculo::with('vehiculoDetalles')->with('estadoVehiculo')->with('vehiculoPrecios')->find($id);

        if ($vehiculo->estado_vehiculo_id == 1) {
            $estadoAnterior = $vehiculo->estadoVehiculo->estado; // Captura el estado actual
            $vehiculo->estado_vehiculo_id = 2;
            $vehiculo->save();
            $estadoNuevo = EstadoVehiculo::where('id', 2)->first()->estado;


            Mail::to($vehiculo->cliente->email)->send(new TestMail($vehiculo, $estadoAnterior, $estadoNuevo));
            return Redirect::route('vehiculos.index')
                ->with('success', 'Vehiculo updated successfully');
        }

        if ($vehiculo->estado_vehiculo_id == 3) {

            if (Auth::user()->rol->name != 'Asesor') {
                return redirect::route('vehiculos.precio', compact('vehiculo'));
            } else {
                return Redirect::route('vehiculos.index');
            }
        }

        if ($vehiculo->estado_vehiculo_id == 5 || $vehiculo->estado_vehiculo_id == 6) {
            if (Auth::user()->rol->name != 'Asesor') {

                return redirect::route('vehiculos.avaluo', compact('vehiculo'));
            } else {
                return Redirect::route('vehiculos.index');
            }
        }
        if ($vehiculo->estado_vehiculo_id == 6) {
            if (Auth::user()->rol->name != 'Asesor') {
                return redirect::route('vehiculos.oferta', compact('vehiculo'));
            } else {
                return Redirect::route('vehiculos.index');
            }
        }
    }
    public function precio(Vehiculo $vehiculo): View
    {
        $detalles = VehiculoDetalle::where('vehiculo_id', $vehiculo->id)->get();
        return view('vehiculo.precios', compact('vehiculo', 'detalles'));
    }
    public function avaluo(Vehiculo $vehiculo): View
    {
        $precio = VehiculoPrecio::where('vehiculo_id', $vehiculo->id)->first();
        $vehiculoPrecio = new VehiculoPrecio();
        if ($precio != null) {
            $vehiculoPrecio = $precio;
        }


        return view('vehiculo.avaluo', compact('vehiculo', 'vehiculoPrecio'));
    }
    public function oferta(Vehiculo $vehiculo): View
    {
        $vehiculoPrecio = VehiculoPrecio::where('vehiculo_id', $vehiculo->id)->first();
        $vehiculoDetalles = VehiculoDetalle::with('detalle')->where('vehiculo_id', $vehiculo->id)->get();
        return view('vehiculo.oferta', compact('vehiculo', 'vehiculoPrecio', 'vehiculoDetalles'));
    }
    public function destroy($id): RedirectResponse
    {
        if (Auth::user()->rol->name == 'SuperAdmin' || Auth::user()->rol->name == 'Administrador') {
            Vehiculo::find($id)->delete();
            return Redirect::route('vehiculos.index')
                ->with('success', 'Vehiculo deleted successfully');
        } else {
            return Redirect::route('vehiculos.index');
        }
    }
}
