<div class="flex flex-col gap-3 px-4">

    <h2 class="font-bold text-2xl border-b border-black pb-2 mb-2">
        Filter Options
    </h2>

    <h3 class="font-bold text-xl">Categories</h3>

    <label class="flex items-center gap-2 cursor-pointer">
        <input
            type="radio"
            wire:model.live="selectedCategory"
            value=""
            class="h-4 w-4"
        >

        <span>
            Todas las categorías
        </span>
    </label>


    @foreach ($categories as $category)

        <label class="flex items-center gap-2 cursor-pointer">
            <input
                type="radio"
                wire:model.live="selectedCategory"
                value="{{ $category['id'] }}"
                class="h-4 w-4"
            >

            <span>
                {{ $category['name'] }}
            </span>
        </label>

    @endforeach

</div>