<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <a href="{{ route('blog.index') }}"> < BACK </a>
    {{-- show the title --}}
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

</x-guest-layout>
