<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateInOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate_in_order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the migrations in the order specified in the file app/Console/Comands/MigrateInOrder.php \n Drop all the table in db before execute the command.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $migrations = [
            '2022_06_29_101101_create_profiles_table.php',
            '2014_10_12_000000_create_users_table',
            '2014_10_12_100000_create_password_resets_table.php',
            '2019_08_19_000000_create_failed_jobs_table.php',
            '2019_12_14_000001_create_personal_access_tokens_table.php',
            '2022_06_07_052822_create_currencies_table.php',
            '2022_06_07_113932_create_transaction_types_table.php',
            '2022_06_08_074017_create_transaction_limits_table.php',
            '2022_06_25_130005_create_service_types_table.php',
            '2022_06_29_012356_create_services_table.php',
        ];

        foreach($migrations as $migration)
        {
            $basePath = 'database/migrations/';
            $migrationName = trim($migration);
            $path = $basePath.$migrationName;
            $this->call('migrate:refresh', [
                '--path' => $path ,
            ]);
        }
    }
}
