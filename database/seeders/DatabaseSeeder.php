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
        $this->call([
            MovieSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'first_name' => 'admin',
            'last_name' => 'keren',
            'email' => 'admin@gmail.com',
            'phone_number' => '0812345678',
            'address' => 'Jalan Anggur',
            'is_admin' => 1
        ]);

        \App\Models\User::factory()->create([
            'first_name' => 'john',
            'last_name' => 'doe',
            'email' => 'johndoe@gmail.com',
            'phone_number' => '0887654321',
            'address' => 'Jalan Jeruk',
            'is_admin' => 0
        ]);
    }
}
