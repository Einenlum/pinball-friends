<x-guest-layout>
    <x-breadcrumb :model="$player" />

    <x-action-list>
        <x-action-button :href="route('players.edit', $player->id)">Edit Player</x-action-button>
        <x-delete-button :action="route('players.destroy', $player->id)" name="delete-player" label="Delete player" />
    </x-action-list>

    <x-header>
        {{ $player->name }}
    </x-header>

    <x-page>
    @if ($player->scores->count() > 0)
        <x-header-2>
            Pinballs
        </x-header-2>

        <div class="mx-auto text-center w-fit mb-8">
            <div class="dark:text-white text-center flex text-center gap-x-2">
                <x-position-circle position=" " class="block"/>
                <p class="font-bold">=</p>
                <p>Player's position for this pinball</p>
            </div>
        </div>

        @foreach ($player->bestScores() as $score)
            <x-ordered-item :position="$score->position" :href="route('pinballs.show', $score->pinball->id)">
                {{ $score->pinball->name }} ({{ $score->pinball->gig->name }}) -
                {{humanize_value(app()->getLocale(), $score->value) }}
            </x-ordered-item>
        @endforeach
    @else
        <p class="dark:text-white">
            No score yet
        </p>
    @endif
    </x-page>

</x-guest-layout>
