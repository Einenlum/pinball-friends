<x-guest-layout>
    <x-breadcrumb :model="$gig" />

    <x-action-list>
        <x-action-button href="{{ route('gigs.edit', $gig->id) }}">
            Edit gig
        </x-action-button>

        <x-action-button href="{{ route('pinballs.create', $gig->id) }}">
            Add pinball
        </x-action-button>

        <x-delete-button action="{{ route('gigs.destroy', $gig->id) }}" name="delete-gig" label="Delete gig" />
    </x-action-list>

    <x-header additionalInfo="{{ $gig->additional_info }}">
        {{ $gig->name }}
    </x-header>

    <x-page>
        @if ($gig->pinballs->count() > 0)
            <x-header-2>
                <span class="mx-2 i-game-icons-pinball-flipper text-secondcolor-500"></span>
                Pinballs
                <span class="mx-2 i-game-icons-pinball-flipper text-secondcolor-500"></span>
            </x-header-2>

            @foreach ($gig->pinballs as $pinball)
                <x-link-item href="{{ route('pinballs.show', $pinball->id) }}">
                    {{ $pinball->name }}
                    @if ($bestScore = $pinball->bestScore())
                        <span class="text-sm text-gray-500 dark:text-gray-300 group-hover:text-gray-200">({{ humanize_value(app()->getLocale(), $bestScore->value) }} by {{ $bestScore->player->name }}) </span>
                    @endif
                </x-link-item>
            @endforeach
        @else
            <p class="dark:text-white">
                No pinballs yet
            </p>
        @endif
    </x-page>


</x-guest-layout>
