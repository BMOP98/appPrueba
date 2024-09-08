
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Notificación de Vehículo</title>
</head>

<body>
    <h1>Notificación de Vehículo</h1>
    <p>Estimado/a {{ $vehiculo->cliente->nombre }},</p>
    <p>Le informamos que el proceso de su vehículo {{ $vehiculo->marca->nombre }} {{ $vehiculo->modelo->nombre }} con placa {{ $vehiculo->placa }} ha cambiado de estado.</p>
    <p>El estado anterior del vehículo era: <strong>{{ $estadoAnterior }}</strong></p>
    <p>El nuevo estado del vehículo es: <strong>{{ $estadoNuevo }}</strong></p>
    <br>
    <p>Agradecemos su confianza en nuestros servicios.</p>
</body>

</html>
