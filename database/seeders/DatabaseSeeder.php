<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\UserAddress::factory(3)->create();
        \App\Models\Blog::factory(3)->create();
        // \App\Models\Company::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'email' => 'test@example.com',
        // ]);
    }
}
