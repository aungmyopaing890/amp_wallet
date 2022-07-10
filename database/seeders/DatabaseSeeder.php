<?php

namespace Database\Seeders;

use App\Models\BankerWallet;
use App\Models\currency;
use App\Models\Profile;
use App\Models\Service;
use App\Models\TransactionLimit;
use App\Models\TransactionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        BankerWallet::create([
            'amount' => 0,
            'description' => '',

        ]);
        User::factory(1)->create();
        Profile::factory(1)->create();
        currency::factory(1)->create();
        $user=User::create([
            'name' => 'merchant',
            'email' => "merchant@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'verified' => 1,
            'role_id' => 4,
        ]);
        $user->profile()->create([
            'fullName' => 'merchant',
            'address' => 'Ygn',
            'nrc' => '9/takana(n)5202455',
            'dob' => '1995-08-13',
            'phoneNumber' => '09969625819',
        ]);
        $user->wallet()->create([
            'currency_id' => 1,
            'balance'=>0,
            'level_id'=>1
        ]);
        $user=User::create([
            'name' => 'customer',
            'email' => "customer@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'verified' => 1,
            'role_id' => 3,
        ]);
        $user->profile()->create([
            'fullName' => 'customer',
            'address' => 'Ygn',
            'nrc' => '9/takana(n)5202455',
            'dob' => '1995-08-13',
            'phoneNumber' => '09969625819',
        ]);
        $user->wallet()->create([
            'currency_id' => 1,
            'balance'=>0,
            'level_id'=>1
        ]);
        TransactionType::create([
            'charge_percentage' => 0,
            'name' => "Deposit",
            'description' => "Deposit",
            'currency_id' => "1",
        ]);
        TransactionType::create([
            'charge_percentage' => 2,
            'name' => "Withdraw",
            'description' => "withdraw",
            'currency_id' => "1",
        ]);
        TransactionType::create([
            'charge_percentage' => 0,
            'name' => "Transfer",
            'description' => "transfer",
            'currency_id' => "1",
        ]);
        TransactionLimit::create([
            'name' => "Level 1 withdraw Limit",
            'daily_amount' => 100000,
            'monthly_amount' => 3000000,
            'level_id' => 1,
            'transaction_type_id' => 2,
            'currency_id' => 1,
            'description' => "Level 1 withdraw Limit",
        ]);
        TransactionLimit::create([
            'name' => "Level 1 transfer Limit",
            'daily_amount' => 100000,
            'monthly_amount' => 3000000,
            'level_id' => 1,
            'transaction_type_id' => 3,
            'currency_id' => 1,
            'description' => "Level 1 transfer Limit",
        ]);
        TransactionLimit::create([
            'name' => "Level 2 withdraw Limit",
            'daily_amount' => 3000000,
            'monthly_amount' =>60000000,
            'level_id' => 2,
            'transaction_type_id' => 2,
            'currency_id' => 1,
            'description' => "Level 2 withdraw Limit",
        ]);
        TransactionLimit::create([
            'name' => "Level 2 transfer Limit",
            'daily_amount' => 3000000,
            'monthly_amount' => 900000000,
            'level_id' => 2,
            'transaction_type_id' => 3,
            'currency_id' => 1,
            'description' => "Level 2 transfer Limit",
        ]);

    }
}
