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
    <div> live time {{ now() }} </div>
    @livewire('search.query')
<br><br>
<h3>Flash SMS</h3>
@livewire('flash.flash')

    @livewireScripts
</body>

</html>
