<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;

class AiProductRecommendation extends Component
{
    public $recommendedProducts = [];

    public function mount()
    {
        if (Auth::check()) {
            // Ambil produk terakhir yang user beli
            $lastBought = TransactionItem::whereHas('transaction', function ($q) {
                    $q->where('user_id', Auth::id());
                })
                ->with('product')
                ->latest()
                ->take(3)
                ->pluck('product_id');

            if ($lastBought->count() > 0) {
                // Cari kategori dari produk terakhir
                $categories = Product::whereIn('id', $lastBought)->pluck('category_id');

                // Ambil produk acak dari kategori yang sama
                $this->recommendedProducts = Product::whereIn('category_id', $categories)
                    ->inRandomOrder()
                    ->take(6)
                    ->get();
            } else {
                // Fallback: random product
                $this->recommendedProducts = Product::inRandomOrder()->take(6)->get();
            }
        } else {
            // Guest → random product
            $this->recommendedProducts = Product::inRandomOrder()->take(6)->get();
        }
    }

    public function render()
    {
        return view('livewire.ai-product-recommendation', [
            'recommendedProducts' => $this->recommendedProducts
        ]);
    }
}
