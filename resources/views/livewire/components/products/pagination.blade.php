<div class="flex justify-center gap-4 mt-6">
    <button
        wire:click="previous"
        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 disabled:opacity-50"
        @disabled($offset === 0)
    >
        Anterior
    </button>

    <button
        wire:click="next"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
    >
        Siguiente
    </button>
</div>