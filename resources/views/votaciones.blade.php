<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L I F E</title>
    @vite('resources/css/app.css')
</head>
<body class="box-border w-screen h-screen">
    @livewireStyles
    @livewireScripts
    @livewire('votations')
</body>
</html>