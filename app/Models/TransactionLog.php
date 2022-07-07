<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'wallet_id',
        'amount',
        'transactionType_id',
        'staff_id',
        'status',
    ];
}
