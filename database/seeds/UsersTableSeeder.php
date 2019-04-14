<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@mail.com',
            'password'=>bcrypt('admin123'),
            'role' => 'admin'
        ]);
        DB::table('users')->insert([
            'name'=>'user1',
            'email'=>'user1@mail.com',
            'password'=>bcrypt('user123'),
            'role' => 'user'
        ]);
    }
}
