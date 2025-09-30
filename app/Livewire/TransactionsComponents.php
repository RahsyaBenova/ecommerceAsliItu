<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;      // ✅ BENAR
use App\Models\TransactionItem;  // kalau dipakai juga

use Illuminate\Support\Facades\Auth;

class TransactionsComponents extends Component
{
     public $transactions;

/*************  ✨ Windsurf Command ⭐  *************/
/**
 * Ambil semua transaksi milik user yang login
 *
 * @return void
 */
/*******  a6eaa514-57df-4c11-aa48-4946a62c0095  *******/    public function mount()
    {
        // Ambil semua transaksi milik user yang login
        $this->transactions = Transaction::with('items.product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.transaction');
    }
}
