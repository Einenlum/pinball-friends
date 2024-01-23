<x-guest-layout>
    <x-breadcrumb :model="$pinball" />

    <x-action-list>
        <x-action-button href="{{ route('pinballs.edit', $pinball->id) }}">
            Edit pinball
        </x-action-button>
        <x-delete-button name="delete-pinball" action="{{ route('pinballs.destroy', $pinball->id) }}" label="Delete Pinball">
        </x-delete-button>
    </x-action-list>

    <x-header additionalInfo="{{ $pinball->additional_info }}">
        {{ $pinball->name }}
    </x-header>

    <x-page>
        <div class="mb-12">
            <x-header-2>

            <span class="mx-2 i-game-icons-rank-3 text-secondcolor-500 pt-2"></span>
                Scores
            <span class="mx-2 i-game-icons-rank-3 text-secondcolor-500"></span>
    </x-header-2>

            <div class="text-lg text-gray-900 dark:text-gray-100">
                @foreach ($pinball->scores as $score)
                    <x-ordered-item position="{{ $loop->iteration }}">
                        {{humanize_value(config('app.locale'), $score->value) }} by <span class="normal-case font-bold">{{$score->player->name}}</span>
                    </x-ordered-item>

                    @if ($loop->first)
                        <div class="text-center mx-auto">
                            ---
                        </div>
                    @endif
                @endforeach
            </div>
        </div>


        <x-form name="create-score" method="POST" action="{{ route('scores.store', $pinball->id) }}">
            <x-form-header text="Add a score" />
            <div class="dark:text-white text-sm w-4/5 text-center mx-auto my-2">
                <span class="text-secondcolor-500 i-lucide-message-circle-warning"></span>
                This score will replace previous score by the same player.
            </div>

            <x-text-input name="value" label="Score" />

            <x-checkbox type="checkbox" name="in_millions" label="Score in millions (x 1 000 000)" checked />

            <x-select :models="$players" name="player_id" label="Player" />

            <x-submit-button text="Submit"/>
        </x-form>
    </x-page>
</x-guest-layout>
