<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\usertest;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $i=14;
       while($i!=0){
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
        $i--;
       }

    }
}
