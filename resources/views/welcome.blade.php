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
        <h1 class="text-4xl font-bold text-center">
            TechStore Explorer
        </h1>

        <span>
            Home / Catalog
        </span>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-8">

        <div class="flex flex-col lg:flex-row gap-8">

            {{-- Sidebar --}}
            <aside class="w-full lg:w-72 lg:flex-shrink-0">
                <div class="bg-white rounded-xl shadow p-5 lg:sticky lg:top-6">
                    <livewire:components.products.category-filter />
                </div>
            </aside>

            {{-- Productos --}}
            <main class="flex-1 min-w-0">

                <livewire:components.products.products-list />

                <div class="mt-8">
                    <livewire:components.products.pagination />
                </div>

            </main>

        </div>

    </div>

</x-app-layout>