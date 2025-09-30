<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShoppingCart;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;

class ShoppingCartComponent extends Component
{
    public $cartItems = [];
    public $subtotal;
    public $vat;
    public $discount;
    public $total;

    protected $listeners = [
        'cartUpdated' => 'render',
    ];

    public function mount()
    {
        $this->cartItems = $this->getCartItems();
        $this->calculateTotals();
    }

    // Hitung total belanja
    public function calculateTotals()
    {
        $this->subtotal = $this->cartItems->sum(fn($item) =>
            $item->quantity * $item->product->price
        );

        $this->vat = $this->subtotal * 0.1; // contoh 10% VAT
        $this->discount = 5; // bisa buat logic diskon
        $this->total = $this->subtotal + $this->vat - $this->discount;
    }

    // Ambil keranjang user
    public function getCartItems()
    {
        return ShoppingCart::with('product')
            ->where('user_id', Auth::id())
            ->get();
    }

    // Tambah ke keranjang
    public function addToCart($productId)
    {
        $cartItem = ShoppingCart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            ShoppingCart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        $this->dispatch('cartUpdated');
    }

    // Update jumlah item
    public function updateQuantity($cartItemId, $quantity)
    {
        $cartItem = ShoppingCart::find($cartItemId);
        if ($cartItem) {
            $cartItem->update(['quantity' => $quantity]);
            $this->dispatch('cartUpdated');
        }
    }

    // Hapus item dari cart
    public function removeItem($cartItemId)
    {
        $cartItem = ShoppingCart::find($cartItemId);
        if ($cartItem) {
            $cartItem->delete();
            $this->dispatch('cartUpdated');
        }
    }

    // Checkout
    public function checkout()
    {
        $transaction = Transaction::create([
            'user_id'  => Auth::id(),
            'subtotal' => $this->subtotal,
            'vat'      => $this->vat,
            'discount' => $this->discount,
            'total'    => $this->total,
            'status'   => 'pending',
        ]);

        foreach ($this->cartItems as $item) {
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_id'     => $item->product_id,
                'quantity'       => $item->quantity,
                'price'          => $item->product->price,
            ]);
        }

        // Kosongkan cart
        ShoppingCart::where('user_id', Auth::id())->delete();

        session()->flash('success', 'Transaction successfully created!');
        return redirect()->route('transactions.show', $transaction->id);
    }

    public function render()
    {
        $this->cartItems = $this->getCartItems();
        $this->calculateTotals();

        return view('livewire.shopping-cart-component', [
            'cartItems' => $this->cartItems,
        ])->title('E-commerce | Shopping Cart');
    }
}
