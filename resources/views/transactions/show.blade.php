<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel App') }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen">
        {{-- Navbar sederhana --}}
        <nav class="bg-white shadow mb-6">
            <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between">
                <a href="/" class="font-bold text-lg">My Shop</a>
                <a href="{{ route('transactions.index') }}" class="text-sm text-gray-700 hover:underline">
                    My Transactions
                </a>
            </div>
        </nav>

        {{-- Konten utama --}}
        <main class="max-w-7xl mx-auto px-4">
            @yield('content')
            <div class="max-w-3xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Transaction Detail</h1>

    <div class="bg-white shadow rounded p-4">
        <p><strong>ID:</strong> {{ $transaction->id }}</p>
        <p><strong>Total:</strong> ${{ $transaction->total }}</p>
        <p><strong>Status:</strong> {{ $transaction->status }}</p>
    </div>

    <h2 class="text-xl font-semibold mt-6 mb-2">Items</h2>
    <ul class="space-y-2">
        @foreach ($transaction->items as $item)
            <li class="flex justify-between border-b pb-1">
                <span>{{ $item->product->name }} (x{{ $item->quantity }})</span>
                <span>${{ $item->price * $item->quantity }}</span>
            </li>
        @endforeach
    </ul>
</div>
        </main>
    </div>

    @livewireScripts
</body>
</html>
