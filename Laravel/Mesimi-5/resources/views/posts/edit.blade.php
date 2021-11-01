<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        @if ($errors->any())
            @foreach ($errors as $error)
                <div class="alert alert-danger">
                    {{ $error->get() }}
                </div>
            @endforeach
        @endif
        <form action="{{ route('post.update', ['post' => $post->id]) }} " method="POST">
            @csrf
            @method('PUT')
            <label for="">Titulli</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control mb-4" />

            <label for="">Pershkrimi</label>
            <div class="form-floating mb-4">
                <textarea class="form-control" name="pershkrimi" value="{{ $post->body }}" id="floatingTextarea2"
                    style="height: 100px">{{ $post->body }}</textarea>
                <label for="floatingTextarea2">Pershkrimias</label>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Ndrysho Postimin</button>
        </form>
    </div>
</x-app-layout>
