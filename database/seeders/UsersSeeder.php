<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'adminku',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345')
        ]);
        DB::table('users')->insert([
            'name' => 'Roni',
            'role' => 'customer',
            'email' => 'roni@gmail.com',
            'password' => bcrypt('12345')
        ]);
        DB::table('users')->insert([
            'name' => 'Budi',
            'role' => 'customer ',
            'email' => 'budi@gmail.com',
            'password' => bcrypt('12345')
        ]);
    }
}
