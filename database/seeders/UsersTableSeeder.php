<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            ['email' => 'luis@minucia.com', 'password' => Hash::make('0000')],
            ['email' => 'gabriel@minucia.com', 'password' => Hash::make('1111')],
            ['email' => 'sergio@minucia.com', 'password' => Hash::make('2222')],
        ]);
    }
}