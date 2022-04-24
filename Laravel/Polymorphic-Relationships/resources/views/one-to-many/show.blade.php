<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('One-To-Many') }}
        </h2>
    </x-slot>
    <style>
        :target {
            -webkit-animation: target-fade 2s 1;
            -moz-animation: target-fade 2s 1;
        }

        @-webkit-keyframes target-fade {
            0% {
                background-color: rgba(186, 186, 186, 1);
            }

            100% {
                background-color: rgba(255, 255, 0, 0);
            }
        }

    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <pre>
                        One-To-Many
                        Një postim ka disa Category
                        morphMany -> Post Model
                        morphTo -> Category Model
                        categoryable_id ->Idja e Post ose Drejtimi ne  Rastin tonë
                        categoryable_type -> App\Model\Post ose App\Model\Drejtimi
                    </pre>

                    <ul class="mb-4  mt-2 text-cyan-300">
                        <li><a href="#KrijoPostimet">KrijoPostimet</a></li>
                        <li><a href="#getPost">getPost</a></li>
                        <li><a href="#getDrejtimet">getDrejtimet</a></li>
                        <li><a href="#getCategoryTabel">getCategoryTabel</a></li>
                        <li><a href="#withQuery">withQuery</a></li>
                    </ul>

                    <section id="KrijoPostimet">
                        <form action="{{ route('one-to-many.store') }}" method="POST">
                            @csrf
                            <p>Krijo Postimet:</p>
                            Titulli:
                            <x-input type="text" name="title" />
                            Categorit:
                            <select name="category[]" multiple id="">
                                @foreach ($postCategorys as $p)
                                    <option value="{{ $p->categoryable_id }}">{{ $p->title }}</option>
                                @endforeach
                            </select>
                            <x-button>Krijo</x-button>

                        </form>
                    </section>

                    <section id="getPost">
                        @foreach ($posts as $post)
                            <h1 class="">Titulli: {{ $post->title }}</h1>
                            <p class="text-xs">Categorit:
                                @foreach ($post->category as $c)
                                    {{ $c->title }},
                                @endforeach
                            </p> <br><br>
                        @endforeach
                    </section>

                    <section id="getDrejtimet">
                        @foreach ($drejtimet as $d)
                            <h1>Drejtimi: {{ $d->title }}</h1>
                            <p class="text-xs">Categorit:
                                @foreach ($d->category as $c)
                                    {{ $c->title }},
                                @endforeach
                            </p> <br><br>
                        @endforeach
                    </section>

                    <br><br><br>

                    <section id="withRealecion">
                        <h1>With, WhereHas</h1>
                        @foreach ($postsWith as $post)
                            <h1 class="">Titulli: {{ $post->title }}</h1>
                            <p class="text-xs">Categorit:
                                @foreach ($post->category as $c)
                                    {{ $c->title }},
                                @endforeach
                            </p> <br><br>
                        @endforeach
                    </section>


                    <section id="getCategoryTabel">
                        @foreach ($categorysTable as $ez)
                            {{ $ez->categoryable->getTable() }} <br>
                            {{ $ez->categoryable->title }} <br><br>
                        @endforeach
                    </section>

                    <br><br><br>

                    <section id="withQuery">
                        @foreach ($catgorysQuery as $q)
                            {{ $q->categoryable->getTable() }} <br>
                            {{ $q->categoryable->title }} <br><br>
                        @endforeach
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
