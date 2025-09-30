<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subtotal',
        'vat',
        'discount',
        'total',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(TransactionItem::class);
    }
}
