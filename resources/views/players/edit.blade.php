<x-guest-layout>
    <x-breadcrumb :model="$player" />

    <x-header>
        Edit {{ $player->name }}
    </x-header>

    <x-page>
        <x-form name="edit-player" method="PUT" :action="route('players.update', $player->id)">
            <x-text-input name="name" label="Player name" :value="$player->name" />
            <x-submit-button text="Edit" />
        </x-form>
    </x-page>
</x-guest-layout>
