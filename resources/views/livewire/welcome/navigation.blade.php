<nav class="-mx-3 flex flex-1 justify-between items-center">

    <a href="{{ url('/') }}" class="text-2xl font-bold text-white">
        TechStore
    </a>

    <div class="flex items-center gap-3">

        @auth

            @if(auth()->user()->role?->name === 'admin')
                <a
                    href="{{ route('dashboard') }}"
                    class="rounded-md px-3 py-2 text-white transition hover:text-black/70"
                >
                    Dashboard
                </a>
            @endif

            <a
                href="{{ route('wishlist') }}"
                class="rounded-md px-3 py-2 text-white transition hover:text-black/70"
            >
                Wishlist
            </a>

            <form method="POST" action="{{ route('logout') }}" class="flex">
                @csrf

                <button
                    type="submit"
                    class="rounded-md px-3 py-2 text-white transition hover:text-black/70"
                >
                    Logout
                </button>
            </form>

        @else

            <a
                href="{{ route('login') }}"
                class="rounded-md px-3 py-2 text-white transition hover:text-black/70"
            >
                Log in
            </a>

            @if(Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="rounded-md px-3 py-2 text-white transition hover:text-black/70"
                >
                    Register
                </a>
            @endif

        @endauth

    </div>

</nav>