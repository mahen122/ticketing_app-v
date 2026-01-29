<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex flex-col justify-center items-center">
    <div class="w-full max-w-md mt-10 p-6 bg-white rounded shadow-md">
        {{ $slot }}
    </div>
</body>

</html>