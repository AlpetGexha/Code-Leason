<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        @if (Session::has('success'))
            <div class="alert alert-info">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <form action="{{ route('uploud.action') }} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-4">
                <input type="file" name="fotoja" class="form-control" id="inputGroupFile04"
                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button type="submit" class="btn btn-outline-secondary" id="inputGroupFileAddon04">Upload</button>
            </div>
        </form>
        @if (Session::has('filename'))
            <img src="{{ asset('upload/' . Session::get('filename')) }}" alt="" height="200px">
        @endif
    </div>

</body>

</html>
