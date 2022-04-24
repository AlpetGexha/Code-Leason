<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('One-To-One') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <pre>
                        One-To-One
                        Një postim ka një Commnet
                        morphOne -> Post Model
                        morphTo -> Commet Model
                        commentable_id ->Idja e Post ose Staff ne  Rastin tonë
                        commentable_type -> App\Model\Post ose App\Model\Staff
                    </pre>
                    <h1>Postimet</h1>
                    @foreach ($post as $p)
                        Ky është posti {{ $p->title }} <br>
                        Me Komentin: {{ $p->comments->body }}
                        {{-- <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            href="{{ route('one-to-one.delete', ['id' => $p->id]) }}">Delete</a> --}}
                        <br> <br>
                    @endforeach

                    <h1>Stafi</h1>

                    @foreach ($staff as $p)
                        Ky është posti {{ $p->name }} <br>
                        Me Komentin: {{ $p->comments->body }}
                        <br> <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
