<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf">
    <title>Document</title>
</head>

<body>
    {{-- Laravel 8 --}}
    {{ Str::of('Alpet Gexha Laravel 9')->slug() }} <br />

    {{-- Laravel 9 --}}
    {{ str('Alpet Gexha Laravel 9')->slug() }}
    {{ str()->slug('Alpet Gexha Laravel 9') }}

</body>

</html>
