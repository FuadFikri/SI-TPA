<?php

use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sekolahs')->insert([
            'nama'=>'SDN Sinduadi Timur',
            'jenjang'=>'SD'
        ]);
        DB::table('sekolahs')->insert([
            'nama'=>'SDN Purwosari',
            'jenjang'=>'SD'
        ]);
        DB::table('sekolahs')->insert([
            'nama'=>'SDN Pogung Kidul',
            'jenjang'=>'SD'
        ]);
        DB::table('sekolahs')->insert([
            'nama'=>'TK Bina Taruna',
            'jenjang'=>'TK'
        ]);
    }
}
