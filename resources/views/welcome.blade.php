<x-app-layout>

    <div
        class="w-full h-64 flex items-center justify-center text-white flex-col gap-2"
        style="
            background-color: #191a1a;
            background-image:
                linear-gradient(0deg, transparent 24%, rgba(114,114,114,0.3) 25%, rgba(114,114,114,0.3) 26%, transparent 27%, transparent 74%, rgba(114,114,114,0.3) 75%, rgba(114,114,114,0.3) 76%, transparent 77%, transparent),
                linear-gradient(90deg, transparent 24%, rgba(114,114,114,0.3) 25%, rgba(114,114,114,0.3) 26%, transparent 27%, transparent 74%, rgba(114,114,114,0.3) 75%, rgba(114,114,114,0.3) 76%, transparent 77%, transparent);
            background-size: 55px 55px;
        "
    >
    <h1 class="text-4xl font-bold text-center">TechStore Explorer</h1>
    <span>Home/Catalog</span>
    </div>
    <div class="flex gap-4 w-full justify-between mt-6 min-h-screen">
        <div class="min-h-screen px-4 py-2">
            <livewire:components.products.category-filter />
        </div>
        <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6 min-h-screen flex flex-col">
            <div class="flex-1">
                <livewire:components.products.products-list />
            </div>
            <div class="pt-6">
                <livewire:components.products.pagination />
            </div>
        </section>

    </div>
    
</x-app-layout>