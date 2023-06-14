<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L I F E - Votacion</title>
    @vite('resources/css/app.css')
</head>
<body class="w-screen h-screen bg-pink-200">
    @livewireStyles
    @livewireScripts
    <div class="w-screen h-screen">
        @livewire("paravotar")
    </div>
</body>
</html>