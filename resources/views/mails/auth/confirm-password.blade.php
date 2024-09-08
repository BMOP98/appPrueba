
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Dirección de Correo Electrónico</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-10">
        <div class="px-6 py-4">
            <h1 class="text-2xl font-bold text-gray-800">¡Hola!</h1>
            <p class="mt-4 text-gray-600">Haga clic en el botón a continuación para verificar su dirección de correo electrónico.</p>
            <div class="mt-6">
                <a href="{{ $url }}" class="px-4 py-2 bg-blue-600 text-white text-sm font-bold rounded hover:bg-blue-700">
                    Verificar Dirección de Correo Electrónico
                </a>
            </div>
            <p class="mt-6 text-gray-600">
                Saludos,<br>
                SEAVS
            </p>
        </div>
        <div class="px-6 py-4 bg-gray-100 border-t">
            <p class="text-gray-600 text-xs">
                Si tiene problemas para hacer clic en el botón "Verificar Dirección de Correo Electrónico", copie y pegue la URL a continuación en su navegador web:
            </p>
            <p class="mt-2 text-blue-600 text-xs break-words">
              {{ $url }}
            </p>
        </div>
    </div>

</body>
</html>
