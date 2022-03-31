<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '1job',
            'email' => 'usuario@1job.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1j0b#2022'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
