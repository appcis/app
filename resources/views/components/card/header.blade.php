<div class="px-4 py-2 border-b flex justify-between items-center">
    <h5>{{ $slot }}</h5>
    @isset($action)
        <div>
            {{ $action }}
        </div>
    @endisset
</div>
