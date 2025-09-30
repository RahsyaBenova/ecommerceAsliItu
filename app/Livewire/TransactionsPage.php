<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionsPage extends Component
{
    public $transactions;

    public function mount()
    {
        $this->transactions = Transaction::with('items.product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.transactions-page');
    }
}
