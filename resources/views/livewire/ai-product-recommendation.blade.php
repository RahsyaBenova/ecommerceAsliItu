<section class="max-w-7xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6">✨ Recommended for You</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
        @forelse ($recommendedProducts as $product)
            <div class="bg-white rounded shadow p-3 flex flex-col items-center">
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-24 h-24 object-cover mb-2">
                <h3 class="text-sm font-semibold text-gray-700">{{ $product->name }}</h3>
                <p class="text-xs text-gray-500">${{ number_format($product->price, 2) }}</p>
                <button wire:click="$dispatch('addToCart', {{ $product->id }})" class="mt-2 px-3 py-1 bg-indigo-600 text-white text-xs rounded hover:bg-indigo-500">
                    Add to Cart
                </button>
            </div>
        @empty
            <p class="text-gray-500 col-span-full">No recommendations yet.</p>
        @endforelse
    </div>
</section>
