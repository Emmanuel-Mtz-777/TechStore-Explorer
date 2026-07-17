<x-app-layout>

<div class="max-w-7xl mx-auto px-4 py-6">
    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

    <div class="flex flex-col md:flex-row gap-6 text-black mt-6">

        <img
            src="{{ $product['images'][0] }}"
            onerror="this.src='https://placehold.co/500x500?text=No+Image'"
            class="rounded-lg"
        >

        <div class="flex flex-col gap-4 w-full">
            <div class=" w-full border-b border-black pb-10 gap-4">
                <h1 class="text-3xl font-extrabold">{{ $product['title'] }}</h1>
                <span >{{ $product['category']['name'] }}</span>
            </div>
            
            <p class="text-5xl font-extrabold mt-4">
                ${{ $product['price'] }}
            </p>

            <p class="mt-4">
                {{ $product['description'] }}
            </p>
            @if($isFavorite)
            <form action="{{ route('wishlist.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <input
                    type="hidden"
                    name="product_id"
                    value="{{ $product['id'] }}"
                >
                <button
                    type="submit"
                    class="bg-red-700 text-white py-2 px-4 rounded-3xl
                        hover:scale-110 hover:bg-red-900
                        transition-transform duration-300
                        w-1/2 sm:w-1/3"
                >
                    Eliminar de favoritos
                </button>
            </form>
            @else
            <form action="{{ route('wishlist.store') }}" method="POST">
                @csrf
                <input
                    type="hidden"
                    name="product_id"
                    value="{{ $product['id'] }}"
                >
                <button
                    type="submit"
                    class="bg-pink-500 text-white py-2 px-4 rounded-3xl
                        hover:scale-110 hover:bg-pink-800
                        transition-transform duration-300
                        w-1/2 sm:w-1/3"
                >
                    Añadir a favoritos
                </button>
            </form>
            @endif
        </div>

    </div>

</div>

</x-app-layout>