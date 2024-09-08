<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
        rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-10">
        <div class="px-6 py-4">
            <h1 class="text-2xl font-bold text-gray-800">¡Hola!</h1>
            <p class="mt-4 text-gray-600">Estás recibiendo este correo electrónico porque recibimos una solicitud de
                restablecimiento de contraseña para tu cuenta.</p>
            <div class="mt-6">
                <a href="{{ $url }}"
                    class="px-4 py-2 bg-gray-800 text-white text-sm font-bold rounded hover:bg-gray-900">
                    Restablecer Contraseña
                </a>
            </div>
            <p class="mt-6 text-gray-600">
                Este enlace para restablecer la contraseña expirará en 60 minutos.
            </p>
            <p class="mt-2 text-gray-600">
                Si no solicitaste un restablecimiento de contraseña, no se requiere ninguna acción adicional.
            </p>
            <p class="mt-6 text-gray-600">
                Saludos,<br>
                SEAVS
            </p>
        </div>
        <div class="px-6 py-4 bg-gray-100 border-t">
            <p class="text-gray-600 text-xs">
                Si tienes problemas para hacer clic en el botón "Restablecer Contraseña", copia y pega la URL a
                continuación en tu navegador web:
            </p>
            <p class="mt-2 text-blue-600 text-xs break-words">
                {{ $url }}
            </p>
        </div>
    </div>

</body>

</html>
