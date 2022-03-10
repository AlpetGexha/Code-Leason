<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    @stack('push')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <livewire:styles />
    <style>
        html {
            scroll-behavior: smooth
        }

        body {
            font-family: 'Nunito', sans-serif;
            margin: 5rem 0px 5rem 0px;
            background: var(--bs-light);
        }

        h3 {
            font-size: 2.25rem;
            margin-top: 3rem;
            color: #2d3342;
            scroll-margin-top: 4rem;
            font-weight: 800;
            letter-spacing: -.025em;
            border-bottom-width: 1px;
            border-color: #edf2f7;
            font-family: 'Karla', system-ui, -apple-system,
                'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji';
        }

        .red {
            color: brown;
        }

        .blue {
            color: blue;
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        {{ $slot }}
    </div>

    <livewire:scripts />
</body>

</html>
