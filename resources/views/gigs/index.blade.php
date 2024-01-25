<x-guest-layout>
    <x-breadcrumb />

    <x-action-list>
        <x-action-button :href="route('gigs.create')">
            Add a gig
        </x-action-button>
    </x-action-list>

    <x-header>Gigs</x-header>

    <x-autocomplete-search :models="$searchableGigs" routeName="gigs.show" />

    <x-page>
        <div class="text-gray-900 dark:text-gray-100">
            @foreach ($gigs as $gig)
                <x-link-item :href="route('gigs.show', $gig->id)">
                    <span class="">{{ $gig->name }}</span>
                    @if ($gig->additional_info)
                        (<span class="italic text-sm">{{ $gig->additional_info }}</span>)
                    @endif
                </x-link-item>
            @endforeach
        </div>
    </x-page>
</x-guest-layout>
