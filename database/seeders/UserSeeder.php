<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'              => 'Vadim Zuev',
            'email'             => 'borashek88@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('22222222'),
            'remember_token'    => Str::random(10),
        ]);
        $user->assignRole([
            'user'
        ]);
    }
}
