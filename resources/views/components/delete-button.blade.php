<form name="{{ $name }}" method="POST" action="{{ $action }}" class="">
    @csrf
    @method('DELETE')

    <button class="py-2 px-4 bg-secondcolor-700 hover:bg-secondcolor-900 text-white rounded focus:outline-none focus:shadow-outline cursor-pointer uppercase text-sm" type="submit">
        {{ $label }}
    </button>
</form>

@if ($includeJS ?? true)
    <script>
        const form = document.querySelector('form[name="{{ $name }}"]');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            if (confirm('Confirm deletion?')) {
                this.submit();
            }
        });
    </script>
@endif
