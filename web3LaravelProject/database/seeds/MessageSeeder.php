<?php

use Illuminate\Database\Seeder;
use \App\messages;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(messages::class, 15)->make();
    }
}
