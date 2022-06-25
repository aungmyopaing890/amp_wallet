<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    use HasFactory;
    public function currency(){
        return $this->belongsTo(currency::class,"currency_id");
    }
    protected $fillable = [
        'name',
        'currency_id',
        'description',
        'charge_percentage'
    ];
}
