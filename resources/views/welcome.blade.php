<x-guest-layout>
    <x-header>Pinball Friends</x-header>

    <x-page>
        <x-link-item href="{{ route('gigs.index') }}">
            Gigs
        </x-link-item>

        <x-link-item href="{{ route('players.index') }}">
            Players
        </x-link-item>
    </x-page>
</x-guest-layout>
