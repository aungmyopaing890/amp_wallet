<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'currency_id',
        'balance',
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}