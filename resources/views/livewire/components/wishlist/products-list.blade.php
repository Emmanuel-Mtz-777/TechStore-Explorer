<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @forelse($wishlistItems as $item)

        <div class="border rounded-lg p-4 flex flex-col h-full">

            <img
                src="{{ $item->product_image }}"
                onerror="this.onerror=null;this.src='https://picsum.photos/seed/{{ $item->product_id }}/500/500';"
                class="w-20 h-20 object-cover rounded"
            >

            <div class="flex flex-col flex-1">
                <h2 class="font-bold mt-3">
                    {{ $item->product_name }}
                </h2>

                <p class="text-gray-500">
                    {{ $item->category_name }}
                </p>

                <p class="font-bold text-xl">
                    ${{ $item->product_price }}
                </p>

                <button
                    wire:click="remove('{{ $item->product_id }}')"
                    class=" mt-4 w-1/2 py-2 bg-red-700 text-white px-4 rounded-3xl
                        hover:bg-red-900 hover:scale-110
                        transition duration-300"
                >
                    Eliminar de favoritos
                </button>
            </div>

        </div>

    @empty

        <p>No tienes productos en tu wishlist.</p>

    @endforelse
</div>