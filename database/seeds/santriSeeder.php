<?php

use Illuminate\Database\Seeder;

class santriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('santris')->insert([
            'nama_lengkap'=>'Adi tes',
            'nama_panggilan'=>'adi',
            'tgl_lahir'=>'2019-06-06',
            'RT'=>9,
            'RW'=>10,
            'no_rumah'=>11,
            'sekolah_id'=>1,
            'tahun_masuk_tpa'=>2019,
            'nama_orang_tua'=>'joko',
            'jenis_kelamin'=>'laki-laki',
            'isActive' => 1,
            'isComplete'=>1,
            'kelas_id'=>1
        ]);
    }
}
