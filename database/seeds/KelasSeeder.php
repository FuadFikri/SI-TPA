<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            'nama'=>'Hamzah',
            'ketentuan'=>'Belum sekolah'
        ]);
        DB::table('kelas')->insert([
            'nama'=>'Alif',
            'ketentuan'=>'TK'
        ]);
        DB::table('kelas')->insert([
            'nama'=>'Wustho',
            'ketentuan'=>'SD kelas 1-4'
        ]);
        DB::table('kelas')->insert([
            'nama'=>'Kibar',
            'ketentuan'=>'SD kelas 5 - 6'
        ]);
    }
}
