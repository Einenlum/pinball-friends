<x-guest-layout>
    <x-breadcrumb />
        <x-action-list>
            <x-action-button href="{{ route('players.create') }}">
                Add a player
            </x-action-button>
        </x-action-list>

        <x-header>Players</x-header>

        <x-page>
            @foreach ($players as $player)
            <x-link-item href="{{ route('players.show', $player->id) }}">
                {{ $player->name }}
            </x-link-item>
            @endforeach
        </x-page>
</x-guest-layout>
