<div class="border rounded-lg">
    <form name="{{ $name }}" method="POST" action="{{ $action }}" class="m-4">
        @if ($method ?? null)
            @method($method)
        @endif

        @csrf

        {{ $slot }}
    </form>
</div>
