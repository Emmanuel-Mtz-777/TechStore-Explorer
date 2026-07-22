<div class="flex flex-col gap-4">

    <h2 class="text-2xl font-bold border-b pb-3">
        Filter Options
    </h2>

    <div>

        <h3 class="font-semibold mb-3">
            Categories
        </h3>

        <div class="flex flex-col gap-3">

            <label class="flex items-start gap-3 cursor-pointer">

                <input
                    type="radio"
                    wire:model.live="selectedCategory"
                    value=""
                    class="h-4 w-4 mt-1 shrink-0"
                >

                <span class="text-sm min-w-0 break-words">
                    Todas las categorías
                </span>

            </label>

            @foreach ($categories as $category)

                <label class="flex items-start gap-3 cursor-pointer">

                    <input
                        type="radio"
                        wire:model.live="selectedCategory"
                        value="{{ $category['id'] }}"
                        class="h-4 w-4 mt-1 shrink-0"
                    >

                    <span class="text-sm min-w-0 break-words">
                        {{ $category['name'] }}
                    </span>

                </label>

            @endforeach

        </div>

    </div>

</div>
