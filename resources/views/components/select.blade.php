<div class="mb-4">
  <x-form-label :label="$label" :name="$name" />

  <x-form-error :name="$name" />

<select name="{{ $name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-nightmainbg-light dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    @foreach ($models as $model)
        <option value="{{ $model->id }}">
            {{ $model->name }}
        </option>
    @endforeach
</select>
</div>
