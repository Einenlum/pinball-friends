<x-guest-layout>
    <x-breadcrumb :model="$pinball" />

    <x-header>
        Edit {{ $pinball->name }}
    </x-header>

    <x-page>
        <x-form name="edit-pinball" method="PUT" action="{{ route('pinballs.update', $pinball->id) }}">
            <x-text-input name="name" label="Pinball name" value="{{ $pinball->name }}" />
            <x-text-input name="additional_info" label="Additional info" value="{{ $pinball->additional_info }}" />
            <x-submit-button text="Edit" />
        </x-form>
    </x-page>
</x-guest-layout>
