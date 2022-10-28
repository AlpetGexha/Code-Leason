<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="font-sans text-gray-900 antialiased container mx-auto pt-16">
        @foreach ($post as $p)
            <a href="{{ route('single', ['id' => $p->id]) }}">
                <h1 style="font-size: 4rem">{{ $p->title }}</h1>
                <hr>
                <p>{{ $p->body }}</p>
            </a>
            <br><br>
        @endforeach
    </div>
</body>

</html>
