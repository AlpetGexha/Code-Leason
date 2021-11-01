<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }} <br>
                </div>
            @endforeach
        @endif
        <form action="{{ route('post.store') }} " method="POST">
            @csrf
            <label for="">Titulli</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control mb-4" />

            <label for="">Pershkrimi</label>
            <div class="form-floating mb-4">
                <textarea class="form-control" name="pershkrimi" value="{{ old('pershkrimi') }}"
                    id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Pershkrimi</label>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Shto Postimin</button>
        </form>
    </div>
</x-app-layout>
