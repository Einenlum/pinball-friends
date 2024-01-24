<x-guest-layout>
    <x-breadcrumb />
    <x-header>Add a gig</x-header>

    <x-form name="create-gig" method="POST" :action="route('gigs.store')">
        <x-text-input name="name" label="Gig name" />
        <x-text-input name="additional_info" label="Additional info or address" />

        <x-submit-button text="Add" />
    </x-form>
</x-guest-layout>
