<x-guest-layout>
    <x-breadcrumb />
    <x-header>
        Add a player
    </x-header>

    <x-form name="create-player" method="POST" action="{{ route('players.store') }}">
        <x-text-input name="name" label="Player name" />

        <x-submit-button name="add-player" text="Add player" />
    </x-form>
</x-guest-layout>
