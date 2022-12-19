<x-jet-validation-errors class="mb-4" />

@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 font-medium text-sm text-red-600">
        {{ session('error') }}
    </div>
@endif
