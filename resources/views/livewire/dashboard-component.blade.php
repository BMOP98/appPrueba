<div>
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Vehículos por mes -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-2">Modelos más ingresados</h2>
                <livewire:livewire-column-chart :column-chart-model="$columnChartModelModelos" />
            </div>

            <!-- Modelos más ingresados -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-2">Vehiculos por mes</h2>
                <livewire:livewire-column-chart :column-chart-model="$columnChartModelVehiculos" />
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <livewire:livewire-line-chart :line-chart-model="$lineChartModelTotales" />
            </div>
            <div class="bg-white shadow-md rounded-lg p-6">
                <livewire:livewire-pie-chart :pie-chart-model="$donutChartModel" />
            </div>
        </div>
    </div>



</div>
