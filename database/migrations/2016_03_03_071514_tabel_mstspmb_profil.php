<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelMstspmbProfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstspmb_profils', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tahun');
            $table->string('gelombang',20);
            $table->string('no_ujian',40);
            $table->string('nama',100);
            $table->string('password',100);
            $table->string('tempat_lahir',100);
            $table->date('tanggal_lahir');
            $table->string('pilihan1',4);
            $table->string('pilihan2',4)->nullable();
            $table->string('pilihan3',4)->nullable();
            $table->string('jender',1)->nullable();
            $table->string('nikah',1)->nullable();
            $table->string('provinsi',5)->nullable();
            $table->string('kota',5)->nullable();
            $table->string('wni',1)->nullable();
            $table->string('hp',20)->nullable();
            $table->string('jenis_sekolah',2)->nullable();
            $table->string('nama_sekolah',100)->nullable();
            $table->text('alamat_sekolah')->nullable();
            $table->string('provinsi_sekolah',5)->nullable();
            $table->string('kota_sekolah',5)->nullable();
            $table->date('tanggal_ijazah')->nullable();
            $table->string('jurusan',2)->nullable();
            //~ $table->string('nilai_ijazah',40);
            //~ $table->string('jumlah_pelajaran',40);
            $table->string('pesantren',100)->nullable();
            $table->text('alamat_pesantren')->nullable();
            $table->string('ayah_nama',100)->nullable();
            $table->string('ayah_alm',1)->nullable();
            $table->string('ayah_pendidikan',5)->nullable();
            $table->string('ayah_pekerjaan',5)->nullable();
            $table->string('ayah_penghasilan',5)->nullable();
            $table->string('ibu_nama',100)->nullable();
            $table->string('ibu_alm',1)->nullable();
            $table->string('ibu_pendidikan',5)->nullable();
            $table->string('ibu_pekerjaan',5)->nullable();
            $table->string('ibu_penghasilan',5)->nullable();
            $table->text('ortu_alamat')->nullable();
            $table->string('ortu_hp',20)->nullable();
            $table->string('ortu_kelurahan',5->nullable();
            $table->string('ortu_kota',5)->nullable();
            $table->string('ortu_prov',5)->nullable();
            $table->string('anak_ke',5)->nullable();
            $table->string('jumlah_saudara',5)->nullable();
            $table->string('bahasa_arab',5)->nullable();
            $table->string('bahasa_inggris',5)->nullable();
            $table->string('komputer',5)->nullable();
            $table->string('mengetahui_iain',20)->nullable();
            $table->string('ruang',5)->nullable();
            $table->integer('ujian',1)->nullable();
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
        Schema::drop('mstspmb_profils');
    }
}
