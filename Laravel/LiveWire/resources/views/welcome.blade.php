<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Stajlli per livewire --}}
    @livewireStyles
    <title>LiveWire</title>
</head>

<body>
    <div>
        {{ now() }} <br>
    </div>

    @livewire('hello-world')

    <br><br><br><br>
    @livewire('start.lifecycle',['name' => 'AlpetG'])
    <br><br><br><br>

    @livewire('start.nesting')



    {{-- Scripti per livewire --}}
    @livewireScripts

</body>

</html>
