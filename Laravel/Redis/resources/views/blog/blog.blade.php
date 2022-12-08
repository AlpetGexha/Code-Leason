<x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>


    <h1 class="font-semibold text-xl text-gray-800 leading-tight">
        Reading
    </h1>

    @foreach ($onRead as $read)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('blog.show', ['id' => $read->id]) }}"
                        class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $read->title }}
                    </a>
                    <p class="text-gray-600">{{ $read->content }}</p>
                </div>
            </div>
        </div>
    @endforeach

    <h1 class="font-semibold text-xl text-gray-800 leading-tight">
        Article
    </h1>

    @foreach ($articles as $article)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('blog.show', ['id' => $article->id]) }}"
                        class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $article->title }}
                    </a>
                    <p class="text-gray-600">{{ $article->content }}</p>
                </div>
            </div>
        </div>
    @endforeach

</x-guest-layout>
