<x-guest-layout>
        <x-breadcrumb :model="$gig"/>
        <x-header>Edit {{ $gig->name }}</x-header>

        <x-page>
            <x-form name="create-gig" method="PUT" :action="route('gigs.update', $gig->id)">
                <x-text-input name="name" label="Gig's name" :value="$gig->name" />
                <x-text-input name="additional_info" label="Additional info (address...)" :value="$gig->additional_info" />

                <x-submit-button text="Edit" />
            </x-form>
        </x-page>
</x-guest-layout>
