@if($models->count() > 3)

@routes('search')

<div class="mx-auto w-fit">
    <form name="search">
        <div class="relative">
            <x-text-input type="text" class="form-control" id="search-input" name="search" label="Search" :hideLabel="true"/>
            <div id="search-result" class="hidden min-h-20 z-50 border p-2 shadow rounded -mt-2 absolute w-full bg-gray-100">
            </div>
        </div>
    </form>
</div>

<template id="search-result-template">
    <a data-class="search-result" class="block hover:bg-firstcolor-700 hover:text-white focus:bg-firstcolor-700 focus:text-white rounded px-2 py-2 w-full" tabindex="0"></a>
</template>

<script>
    const models = @json($models);

    const form = document.forms.search;
    const searchInput = document.getElementById('search-input');
    const searchResult = document.getElementById('search-result');

    searchInput.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowDown') {
            e.preventDefault();

            const results = document.querySelectorAll('[data-class="search-result"]');
            if (results.length === 0) {
                return;
            }

            const firstResult = results[0];

            firstResult.focus();
        }
    });

    searchResult.addEventListener('keydown', function (e) {
        if (e.key !== 'ArrowUp' && e.key !== 'ArrowDown') {
            return;
        }

        e.preventDefault();
        const focusedResult = document.querySelector('[data-class="search-result"]:focus');

        if (focusedResult === null) {
            return;
        }

        if (e.key === 'ArrowUp') {
            const previous = focusedResult.previousElementSibling;
            if (previous === null) {
                searchInput.focus();

                return;
            }

            focusedResult.previousElementSibling.focus();

            return;
        }

        if (e.key === 'ArrowDown') {
            const next = focusedResult.nextElementSibling;
            if (next !== null) {
                next.focus();

                return;
            }

            // find first result
            const firstResult = document.querySelector('[data-class="search-result"]');
            if (firstResult !== null) {
                firstResult.focus();

                return;
            }
        }
    });


    searchInput.addEventListener('input', function (e) {
        const search = e.target.value;

        if (search.length < 2) {
            searchResult.classList.add('hidden');

            return;
        }

        const filteredModels = models.filter(model => model.name.toLowerCase().includes(search.toLowerCase()));

        searchResult.innerHTML = '';

        if (filteredModels.length === 0) {
            return;
        }

        const template = document.getElementById('search-result-template');

        filteredModels.forEach(model => {
            const clonedTemplate = template.content.cloneNode(true);
            const a = clonedTemplate.querySelector('a');

            a.innerHTML = model.name;
            a.dataset.id = model.id;
            a.href = route('{{ $routeName }}', model.id);

            searchResult.appendChild(a);

            searchResult.classList.remove('hidden');
        });
    });
</script>

@endif
