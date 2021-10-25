<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
//1:51:37
    <div class="container mt-5">
        @if($todos)
            <table class="table table-striped">

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulli</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                </tr>

                @foreach ($todos as $todo)
                    <tr>
                        <th scope="row">{{ $todo->id }}</th>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->completed }}</td>
                        <td>{{ $todo->created_at }}</td>
                    </tr>
                @endforeach

            </table>
        @else
            <div class="alert alert-info">
                Yout todos table is empty
            </div>
        @endif
    </div>
</body>

</html>
