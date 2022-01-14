<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'id'      => 1,
                'name'    => 'សែម គឹមសាន',
                'gender'  => 'male',
                'email'    => 'keamsan.sem@gmail.com',
                'phone'    => '0969140554',
                'password' => Hash::make(12345678),
                'email_verified_at'  => now(),
                'created_at'  => now(),
                'role_id'     => 1,
                'avatar'  =>  '/images/avatar.png',
            ]
        ]);
    }
}
