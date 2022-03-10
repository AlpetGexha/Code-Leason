<div x-data="{ data: @js($colors) }">
    Colors:
    <div class="row">
        <template x-for="datas in data">
            <div class="col" x-text="datas"></div>
        </template>
    </div>
</div>
