<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLimit extends Model
{
    use HasFactory;
    public function currency(){
        return $this->belongsTo(currency::class,"currency_id");
    }
    public function level(){
        return $this->belongsTo(Level::class,"level_id");
    }
    public function transactionType(){
        return $this->belongsTo(TransactionType::class,"transaction_type_id");
    }
    protected $fillable = [
        'name',
        'daily_amount',
        'monthly_amount',
        'level_id',
        'transaction_type_id',
        'currency_id',
        'description',
    ];
}

