<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'age' => 40,
            'phone' => '123213213',
            'address' => '13 asdsads asd',
            'prof_summary' => 'asdas das dsad sadas dsa dsa',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'admin' => true
        ]);

        User::create([
            'first_name' => 'Member 1',
            'last_name' => 'User',
            'age' => 40,
            'phone' => '123213213',
            'address' => '13 asdsads asd',
            'prof_summary' => 'asdas das dsad sadas dsa dsa',
            'email' => 'member1@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'first_name' => 'Member 2',
            'last_name' => 'User',
            'age' => 40,
            'phone' => '123213213',
            'address' => '13 asdsads asd',
            'prof_summary' => 'asdas das dsad sadas dsa dsa',
            'email' => 'member2@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'first_name' => 'Member 3',
            'last_name' => 'User',
            'age' => 40,
            'phone' => '123213213',
            'address' => '13 asdsads asd',
            'prof_summary' => 'asdas das dsad sadas dsa dsa',
            'email' => 'member3@example.com',
            'password' => Hash::make('password'),
        ]);

    }
}
