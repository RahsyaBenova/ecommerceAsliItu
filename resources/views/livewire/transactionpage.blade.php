<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">My Transactions</h1>

    @forelse ($transactions as $transaction)
        <div class="mb-6 p-4 border rounded shadow-sm">
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-700">Transaction #{{ $transaction->id }}</span>
                <span class="text-sm px-2 py-1 rounded bg-gray-200">{{ ucfirst($transaction->status) }}</span>
            </div>

            <p class="text-sm text-gray-600">
                Subtotal: ${{ $transaction->subtotal }} <br>
                VAT: ${{ $transaction->vat }} <br>
                Discount: -${{ $transaction->discount }} <br>
                <strong>Total: ${{ $transaction->total }}</strong>
            </p>

            <h3 class="mt-3 font-semibold">Items:</h3>
            <ul class="list-disc list-inside text-sm text-gray-700">
                @foreach ($transaction->items as $item)
                    <li>
                        {{ $item->product->name }} (x{{ $item->quantity }}) - ${{ $item->price }}
                    </li>
                @endforeach
            </ul>
        </div>
    @empty
        <p class="text-gray-600">You don’t have any transactions yet.</p>
    @endforelse
</div>
