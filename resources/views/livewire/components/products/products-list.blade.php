
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-6">

    @forelse ($products as $product)
        <a href="{{ route('products.show', $product['id']) }}" class="border rounded-lg p-4 shadow">

            <img
                src="{{ $product['images'][0] }}"
                onerror="this.onerror=null;this.src='https://picsum.photos/seed/{{ $product['id'] }}/500/500';"
                alt="{{ $product['title'] }}"
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

        </a>
    @empty
        <p>No hay productos.</p>
    @endforelse

</div>