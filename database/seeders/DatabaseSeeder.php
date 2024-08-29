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
            'first_name' => 'Lewis',
            'last_name' => 'Brown',
            'age' => 40,
            'phone' => '1230986',
            'address' => '55 Brown St',
            'prof_summary' => 'Information',
            'email' => 'member1@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'first_name' => 'Jacob',
            'last_name' => 'White',
            'age' => 40,
            'phone' => '12321321222',
            'address' => '2 High St',
            'prof_summary' => 'Info',
            'email' => 'member2@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'first_name' => 'Jhon',
            'last_name' => 'Smith',
            'age' => 40,
            'phone' => '123213213',
            'address' => '25 Brown St',
            'prof_summary' => 'info',
            'email' => 'member3@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'first_name' => 'Luis',
            'last_name' => 'Smith',
            'age' => 40,
            'phone' => '123213213',
            'address' => '13 Stirling St',
            'prof_summary' => 'Information',
            'email' => 'member4@example.com',
            'password' => Hash::make('password'),
        ]);

    }
}
