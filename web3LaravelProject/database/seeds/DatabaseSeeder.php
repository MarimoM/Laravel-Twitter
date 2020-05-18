<?php

use Illuminate\Database\Seeder;
use \database\seeds\messagesSeed;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MessageSeeder::class);
    }
}
