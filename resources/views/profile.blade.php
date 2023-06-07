<!DOCTYPE html>
<html lang="en" class="w-screen h-screen">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-900 w-screen h-screen flex justify-center items-center border-solid border-black border-spacing-2 box-border bg-[url(https://64.media.tumblr.com/70ebd1f6d3a29d019de127909e8ed94f/tumblr_oya8gndrCI1qeyvpto1_500.gifv)]">
    @livewireStyles
    @livewireScripts
    @livewire("user-profile")
</body>
</html>