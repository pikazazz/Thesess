<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class usertest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => Str::random(10),
            'lname' => Str::random(10),
            'username' => Str::random(10),
            'tel' => '',
            'role' => 'student',
            'group' => null,
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
