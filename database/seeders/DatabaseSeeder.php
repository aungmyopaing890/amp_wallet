<?php

namespace Database\Seeders;

use App\Models\currency;
use App\Models\Profile;
use App\Models\Service;
use App\Models\TransactionLimit;
use App\Models\TransactionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Profile::factory(1)->create();
        currency::factory(1)->create();
        Service::factory(1)->create();
        Service::factory(1)->create();
        TransactionType::factory(1)->create();
        TransactionLimit::factory(1)->create();
    }
}
