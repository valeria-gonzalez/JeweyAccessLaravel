<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => ' Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin'),
            'is_admin' => true,
            'email_verified_at' => '2021-01-01 00:00:00',
        ]);

        $this->call([
            ClientSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
