<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // para llamar al seeder
        $this->call(UserTableSeeder::class);
        // \App\Models\User::factory(10)->create();
        //php artisan migrate:refresh --seed
    }
}