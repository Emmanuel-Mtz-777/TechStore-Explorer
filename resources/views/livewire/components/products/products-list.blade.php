
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">

    @forelse ($products as $product)
        <div class="border rounded-lg p-4 shadow">

            <img
                src="{{ $product['images'][0] }}"
                alt="{{ $product['title'] }}"
                onerror="this.src='https://placehold.co/300x300?text=No+Image'"
                class="w-full h-48 object-cover rounded"
            >

            <h2 class="mt-3 font-semibold">
                {{ $product['title'] }}
            </h2>

            <p class="text-gray-600">
                ${{ $product['price'] }}
            </p>

            <p class="text-sm text-gray-500">
                {{ $product['category']['name'] }}
            </p>

        </div>
    @empty
        <p>No hay productos.</p>
    @endforelse

</div>