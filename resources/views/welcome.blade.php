<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WaliTake</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-black">
        <div class="text-center space-y-4 p-8">
            <h1 class="text-3xl font-bold text-black dark:text-white">WaliTake</h1>

            <p class="text-lg text-green-600 dark:text-green-400 font-semibold">
                {{ $dbMensaje }}
            </p>

            <p class="text-lg text-blue-600 dark:text-blue-400 font-semibold">
                Hola mundo desde el front
            </p>

            <p id="front-js" class="text-lg text-purple-600 dark:text-purple-400 font-semibold"></p>
        </div>
    </body>
</html>