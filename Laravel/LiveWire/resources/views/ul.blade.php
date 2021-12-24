<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
</head>

<body>
    live time : {{ now() }}
    @livewire('ul.loading')
    <br>
    @livewire('ul.polling')
    <br>
    @livewire('ul.prefetch')
    <br>
    @livewire('ul.offline')

    @livewireScripts
</body>

</html>
