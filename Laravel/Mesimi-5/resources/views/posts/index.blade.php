<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if (session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg container">
                <a class="btn btn-primary mt-4" href="{{ route('post.create') }}">krijo postime</a>
                @if (count($posts))
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
                        @foreach ($posts as $post)
                            <div class="col d-flex align-items-start justify-content-center">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-body">
                                        <h3 class="card-title"> {{ $post->title }} </h3>
                                        <p>
                                            {{ $post->body }}
                                        </p>
                                        <div class="btn-group m-auto d-flex justify-content-center" role="group"
                                            aria-label="Basic example">
                                            <a class="btn btn-outline-primary">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            {{-- $post u marr nga foreachi (PostController $post) --}}
                                            @can('update', $post)
                                                <a href="{{ route('post.edit', ['post' => $post->id]) }}"
                                                    class="btn btn-outline-info">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('delete-post', $post)
                                                <form action="{{ route('post.destroy', ['post' => $post->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a>
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            onsubmit="return alert('A jeni i sigurt')"> <i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </a>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                            <p class="font-bold">Nuk ka Postime</p>
                        </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
