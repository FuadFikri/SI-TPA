<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSantrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->date('tgl_lahir');
            $table->integer('RT');
            $table->integer('RW');
            $table->string('no_rumah')->nullable();
            $table->string('url_foto')->nullable();
            $table->integer('sekolah_id')->unsigned()->nullable();
            $table->integer('tahun_masuk_tpa');
            $table->string('nama_orang_tua');
            $table->string('jenis_kelamin');
            $table->integer('isActive')->nullable();
            $table->string('added_by')->nullable();
            $table->integer('kelas_id')->unsigned()->nullable();
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
            $table->foreign('sekolah_id')->references('id')->on('sekolahs')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santris');
    }
}
