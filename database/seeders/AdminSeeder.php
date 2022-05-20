<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'              => 'Nataly Zueva',
            'email'             => 'borashek@inbox.ru',
            'email_verified_at' => now(),
            'password'          => Hash::make('11111111'),
            'remember_token'    => Str::random(10),
        ]);
        $user->assignRole([
            'user',
            'admin',
            'writer'
        ]);
    }
}
