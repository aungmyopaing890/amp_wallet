<?php

use App\Models\TransactionType;
use Illuminate\Support\Facades\DB;

if (! function_exists('store_image')) {
    function store_image($data,$folder,$name)
    {
        $dir="public/".$folder;
        $file = $data->file($name);
        $newName = uniqid()."_".$file->getClientOriginalExtension();
        $data->file($name)->storeAs($dir,$newName);
        return $folder."/".$newName;
    }
}

if (! function_exists('user_transaction_amount')) {
    function user_transaction_amount($wallet,$transactionType_id,$created_at)
    {
        $userDailyAmount=DB::table('transactions')
            ->where('transactionType_id',$transactionType_id)
            ->where('from',$wallet->id)
            ->where('currency_id',$wallet->currency_id)
            ->where('created_at',date($created_at))
            ->sum('total');
        return $userDailyAmount;
    }
}

if (! function_exists('charge_amount')) {
    function charge_amount($amount,$transactionType_id)
    {
        $transactionType=TransactionType::where('id',$transactionType_id)->first();
        return ($amount/100)*$transactionType->charge_percentage;
    }
}
