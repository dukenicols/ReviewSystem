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
            'name' => 'Nicolas',
            'email' => 'duquenicols@hotmail.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
