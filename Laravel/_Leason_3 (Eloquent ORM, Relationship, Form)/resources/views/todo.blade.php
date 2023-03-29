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

    <div class="container mt-5">
        {{ $todos = DB::table('todos')->simplePaginate(15) }}
        {{-- <ul>
            <li>Done {{ $done }}</li>
            <li>Done {{ $notDone }}</li>
        </ul> --}}
        @if (count($todos))
            <table class="table table-striped">

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulli</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                    <th scope="col"> </th>
                </tr>

                @foreach ($todos as $i => $todo)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->completed }}</td>
                        <td>{{ $todo->created_at }}</td>
                        <td>

                            @if ($todo->completed)
                                <span class="badge badge-sm bg-success">Completed</span>
                            @else
                                <span class="badge badge-sm bg-danger">UnCompleted</span>
                            @endif
                        </td>
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
