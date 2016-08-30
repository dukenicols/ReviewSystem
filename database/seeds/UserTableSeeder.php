<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'User',
            'last_name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('12345'),
            'username' => 'user',
            'verified'  => 1,
            'role'  => 'user'
        ]);
        DB::table('users')->insert([
            'first_name' => 'User',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345'),
            'username' => 'admin',
            'verified'  => 1,
            'role'  => 'admin'
        ]);

    }
}
