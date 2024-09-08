<?php

namespace App\Livewire;

use App\Models\EstadoVehiculo;
use App\Models\Vehiculo;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $types = ['food', 'shopping', 'entertainment', 'travel', 'other'];

    public $colors = [
        'food' => '#f6ad55',
        'shopping' => '#fc8181',
        'entertainment' => '#90cdf4',
        'travel' => '#66DA26',
        'other' => '#cbd5e0',
    ];

    public $firstRun = true;

    public $showDataLabels = false;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
        'onBlockClick' => 'handleOnBlockClick',
    ];

    public function handleOnPointClick($point)
    {
        dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function handleOnBlockClick($block)
    {
        dd($block);
    }

    public function render()
    {
        $vehiculosPorMes = Vehiculo::selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes', 'asc')
            ->get();

        $columnChartModelVehiculos = (new ColumnChartModel())
            ->setTitle('Vehículos X Mes');

        foreach ($vehiculosPorMes as $dato) {
            $columnChartModelVehiculos->addColumn(
                'Mes ' . Carbon::create()->locale('es')->month($dato->mes)->translatedFormat('F'),
                $dato->total,
                '#90cdf4' // Color de la barra
            );
        }
        $modelosMasIngresados = DB::table('vehiculos')
        ->join('modelos', 'vehiculos.modelo_id', '=', 'modelos.id')
        ->select('modelos.nombre as modelo', DB::raw('COUNT(vehiculos.id) as total'))
        ->groupBy('modelos.nombre')
        ->orderBy('total', 'desc')
        ->limit(5)
        ->get();

        $columnChartModelModelos = (new ColumnChartModel())
            ->setTitle('Modelos Más Ingresados');

        foreach ($modelosMasIngresados as $modelo) {
            $columnChartModelModelos->addColumn(
                $modelo->modelo,
                $modelo->total,
                '#fc8181' // Color de la barra
            );
        }
        $lineChartModelTotales = (new LineChartModel())
            ->setTitle('Total de Vehículos por Mes')
            ->setSmoothCurve(); // Opción para suavizar la curva de la línea
        $totalesPorMes = Vehiculo::selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes', 'asc')
            ->get();

        foreach ($totalesPorMes as $total) {
            $lineChartModelTotales->addPoint(
                'Mes ' . Carbon::create()->locale('es')->month($dato->mes)->translatedFormat('F'),
                $total->total
            );
        }
        $vehiculosPorEstado = Vehiculo::selectRaw('estado_vehiculo_id, COUNT(*) as total')
            ->groupBy('estado_vehiculo_id')
            ->orderBy('estado_vehiculo_id', 'asc')
            ->get();

        // Crear el modelo para el gráfico de dona
        $donutChartModel = (new PieChartModel())

            ->setTitle('Vehículos por Estado');

        // Agregar los datos al gráfico
        foreach ($vehiculosPorEstado as $vehiculo) {
            $estadoNombre = EstadoVehiculo::find($vehiculo->estado_vehiculo_id)->estado; // Obtener el nombre del estado
            $donutChartModel->asPie()->addSlice(
                $estadoNombre, // Nombre del estado
                $vehiculo->total,
                '#' . substr(md5(rand()), 0, 6) // Color aleatorio
            );
        }
        return view('livewire.dashboard-component')
            ->with([
                'columnChartModelVehiculos' => $columnChartModelVehiculos,
                'columnChartModelModelos' => $columnChartModelModelos,
                'lineChartModelTotales' => $lineChartModelTotales,
                'donutChartModel' => $donutChartModel,
            ]);
    }
}
