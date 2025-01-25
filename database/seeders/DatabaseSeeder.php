<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Genereer 10 gebruikers
        \App\Models\User::factory(10)->create();
    }
}
