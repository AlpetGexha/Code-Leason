<x-guest-layout>
    Views: {{ $vizits }}



    <form class="mt-2" action="{{ route('hashing') }}">
        <x-primary-button class="ml-4">
            {{ __('hashing') }}
        </x-primary-button>
    </form>

    <form class="mt-2" action="{{ route('blog.index') }}">
        <x-primary-button class="ml-4">
            {{ __('Blog') }}
        </x-primary-button>
    </form>

    <form class="mt-2" action="{{ route('vs') }}">
        <x-primary-button class="ml-4">
            {{ __('Redis vs Model, LazyCollection') }}
        </x-primary-button>
    </form>

    <form class="mt-2" action="{{ route('catching') }}">
        <x-primary-button class="ml-4">
            {{ __('catching') }}
        </x-primary-button>
    </form>

    <form class="mt-2" action="{{ route('cathingvhash') }}">
        <x-primary-button class="ml-4">
            {{ __('cathing VS Hashing') }}
        </x-primary-button>
    </form>

    <form class="mt-2" action="{{ route('acticle') }}">
        <x-primary-button class="ml-4">
            {{ __('Acticle Sortable Set ') }}
        </x-primary-button>
    </form>

    <form class="mt-2" action="{{ route('user.show', ['id' => auth()->id()]) }}">
        <x-primary-button class="ml-4">
            {{ __('User  Auth') }}
        </x-primary-button>
    </form>

    <form class="mt-2" action="{{ route('video.download', ['id' => 1]) }}">
        <x-primary-button class="ml-4">
            {{ __('Video Download') }}
        </x-primary-button>
    </form>

    <form class="mt-2" action="{{ route('queue') }}" method="POST">
        @csrf
        <x-primary-button class="ml-4">
            {{ __('Redis Queue') }}
        </x-primary-button>
    </form>


</x-guest-layout>
