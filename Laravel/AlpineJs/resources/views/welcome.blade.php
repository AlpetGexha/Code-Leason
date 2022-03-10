<x-base>

    <h3>#x-data</h3>
    <pre>
        x-data perdoret gjithmonë për ne fillim, nenkupton se ai "div" i perket një componenti apo elementi te  AlpineJs-ti
        Ne rastin tone open është variable dhe flase eshte vlera ($open = false)
    </pre>
    <div x-data="{ open:false }">
        <button @click="open =! open "> Toggle Conttent </button>
        <div x-show="open">
            Hello Man
        </div>
    </div>
    <h3>#x-data me x-text</h3>
    <pre>
        x-data mund edhe të rishkruhet mbrenda componentint
        x-text - tregon vlerën e variables
    </pre>

    <div x-data="{ foo: 'Alpet' }">
        <span x-text="foo"></span>
        <div x-data="{foo: 'AlpetGexha'}">
            <span x-text="foo"></span>

        </div>
        <div x-data="{foo: 'AlpetGexha 2 de'}">
            <span x-text="foo"></span>
        </div>

        <div x-data="{foo: 'AlpetGexha 3 pra'}">
            <span x-text="foo"></span>
        </div>
    </div>

    <button x-data="{ open: true }" @click="open = false" x-show="open">
        Hide Me Single Component
    </button>

    <h3>#x-data me funksion</h3>

    <div x-data="{ open: false,
        toggle() { this.open = ! this.open },
        isOpen() { return this.open }
    }">
        <button @click="toggle()">toggle me</button>

        <div x-show="isOpen"> Hello Open Function</div>
    </div>

    <h3>#x-init</h3>
    <pre>
        Direktiva x-initju lejon të futeni në fazën e inicializimit të çdo elementi në Alpine.
        Mund te perdoret brenda dhe jasht componentit x-data
        Dhe mund të përdoret si funksion : init() {}
    </pre>

    <div x-init="console.log('AlpetGexha Ktu')"></div>
    {{-- <div x-init="alert('Alert pra')"></div> --}}

    {{-- <div x-data="{ posts: ['alpet','gexha','17','gjakovë'] }" x-init="posts = await (await fetch('/posts')).json()"> --}}

    <div x-init="$nextTick(() => { console.log('Alpet Ktu  pra') })">

    </div>

    <h3>#x-bind</h3>
    <pre>
        x-bind perdoret per të shtuar atribute
        x-bind mund te thirret  edhe me ":"
    </pre>

    <div x-data="{name:'Alpet Gexha'}">
        <input type="text" x-bind:placeholder="name">
        <input type="text" :placeholder="name">
    </div>

    <div x-data="{ open: false }">
        <button @click="open = !open" :class="open ? 'blue' : 'red'" x-text="open ? 'mshele' : 'qele'"></button>

        <div x-show="open">A jom i kuq a i kaltert</div>
        <div :style="{ color: '#aa23aa', display: 'flex',  }">Test</div>
    </div>

    <h3>#x-on</h3>

    <button x-on:click="alert('x-on:click')">#x-on:click</button>

    <button @click="alert('dasd')">@click</button>

    <input type="text" @keyup.enter="alert('Submitted!')">

    <h3>#x-text</h3>
    <div x-data="{msg: 'alpet'}" x-text="msg"></div>

    <h3>#x-html</h3>

    <div x-data="{ html: '<strong> Hello x-html </strong>' }">

        span: <span x-html="html"> </span>

    </div>

    <h3> #x-model </h3>
    <div x-data="{ model: ''}">
        Apline:
        <input x-model="model" type="text">
        <span x-text='model'></span>
    </div>

    <livewire:alpine />

    <div class="mb-3" x-data="{ model: ''}">
        <input x-model="model" type="text">
        <button @click="model = 'A u ndru teksti po' "> click to change </button> <br>
        <span x-text='model'></span>
    </div>


    <div x-data="{framework: ''}">
        <input type="radio" value="Apline" x-model="framework">
        <input type="radio" value="Laravel" x-model="framework">
        <input type="radio" value="Livewire" x-model="framework">

        <p>framework: <span x-text="framework"></span></p>
    </div>

    <h5 style="margin-right: 3rem;">Modifiers</h5>

    <div x-data="{ emri: '' }">
        .lazy:
        <input type="text" x-model.lazy="emri">
        <span x-text='emri'></span> <br>
        <span class="text-danger" x-show="emri.length > 20">Emri eshte shume i gjatë</span>
    </div>

    Alpine:
    <div x-data="{ number: 5 }">
        <div x-data="{ count: 0 }" x-modelable="count" x-model="number">
            <button @click="count++">Count +++</button>
        </div>

        Some Number: <span x-text="number"></span>
    </div>

    <livewire:apline-count />
    <h3>Livewire</h3>

    <h3>@ js</h3>
    @php
        $posts = ['alpet', 'gexha', '16', '155'];
    @endphp

    <div x-data="{posts : @js($posts)}">
        <p x-text='posts'></p>
    </div>


    <h3>@ entangle</h3>

    <livewire:dropdown />

    <h3>#x-for</h3>
    <ul x-data="{datas: ['e kuqe','e kaltert', 'limon', 'lelja']}">
        <template x-for="data in datas">
            <li x-text="data"></li>
        </template>
    </ul>
    <pre>
        foreach loop.
        duhet te perdoret nje < template > apo cfare do lloj tagi tjeter per ta perdorur x-for
        Perdoret p.sh variable dhe vlera e array(datas)
    </pre>
    <h4>with key</h4>

    <ul x-data="{ colors: [
        { id: 1, label: 'Red' },
        { id: 2, label: 'Orange' },
        { id: 3, label: 'Yellow' },
    ]}">
        <template x-for="color in colors" :key="color.id">
            <li x-text="color.label"></li>
        </template>
    </ul>

    <pre>
        For loop na mundeson edhe thirren e indexit, apo donje array tjeter
        For loop me index
    </pre>
    <ul x-data="{ colors: ['Red', 'Orange', 'Yellow'] }">
        <template x-for="(color, index) in colors">
            <li>
                <span x-text="index + ': '"></span>
                <span x-text="color"></span>
            </li>
        </template>
    </ul>

    <h3>#x-transition</h3>

    <div x-data="{ open: false }">
        <button @click="open = !open">Smooth je a</button>
        <div x-show="open" x-transition.scale.origin.top>
            Drejt kallco a jom smoth a jo
            <ul>
                <li>test pra</li>
                <li>test pra</li>
                <li>test pra</li>
                <li>test pra</li>
                <li>test pra</li>
                <li>test pra</li>
                <li>test pra</li>
                <li>test pra</li>
                <li>test pra</li>
            </ul>
        </div>
    </div>
    <h3># x-effect</h3>
    <pre>
        x-effect një direktivë e dobishme për rivlerësimin e një shprehjeje kur ndryshon një nga
        varësitë e saj. Ju mund ta mendoni atë si një vëzhgues ku nuk duhet të specifikoni se çfarë prone të
        shikoni, ai do të shikojë të gjitha pronat e përdorura brenda tij.
    </pre>

    <div x-init="console.log('Ktu jom une hej: ')"></div>

    <div x-data="{count: 0,emri: ' Alpet '}" x-effect="console.log(count + emri)">
        <button @click="count++, emri +='Ndrysho'">Më kliko dhe shiko consolen</button>
    </div>
    <h3># x-ignore</h3>

    <div x-data="{ label: 'From Alpine' }">
        <div x-ignore>
            <span x-text="label"></span>
        </div>
    </div>

    <h3></h3>

    <pre>
        x-refnë kombinim me $refsështë një mjet i dobishëm për aksesin e lehtë të elementeve DOM drejtpërdrejt.
         Është më e dobishme si një zëvendësim për API si getElementByIddhe querySelector.
    </pre>


    <div x-data="{open: false }">
        <button @click="open = !open">click</button>

        <div x-show="open" x-transition>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.

            Why do we use it?
            It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
            letters, as opposed to using 'Content here, content here', making it look like readable English. Many
            desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a
            search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved
            over the years, sometimes by accident, sometimes on purpose (injected humour and the like).


            Where does it come from?
            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
            Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
            Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem
            Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable
            source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes
            of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular
            during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in
            section 1.10.32.

            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections
            1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact
            original form, accompanied by English versions from the 1914 translation by H. Rackham.

            Where can I get some?
        </div>
    </div>
    <h2>Plugins</h2>
    <!-- Alpine Plugins -->
   @push('push')
   <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>   
   <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
   @endpush
    <div x-data="{ count: $persist(0).using(sessionStorage) }">
        <button x-on:click="count++">Increment</button>

        <span x-text="count"></span>
    </div>
</x-base>
