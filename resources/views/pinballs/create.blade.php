<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-breadcrumb :model="$gig" />
            <x-header>
                Add a pinball
            </x-header>

            <x-page>
                <x-form name="create-pinball" method="POST" :action="route('pinballs.store', $gig->id)">
                    <x-text-input name="name" label="Pinball name" />
                    <x-text-input name="additional_info" label="Additional info (brand or year)" />

                    <x-submit-button text="Add" />
                </x-form>
            </x-page>
        </div>
    </div>
</x-guest-layout>
