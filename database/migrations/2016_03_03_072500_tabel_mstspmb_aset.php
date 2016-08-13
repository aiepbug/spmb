<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelMstspmbAset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstspmb_asets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_ujian',40);
            $table->string('jenis_tinggal',100);
            $table->string('luas_rumah',100);
            $table->string('luas_tanah',100);
            $table->string('harga_jual',100);
            $table->string('mck',100);
            $table->string('daya_listrik',100);
            $table->string('sumber_air',100);
            $table->string('iuran_pln',100);
            $table->string('iuran_telp',100);
            $table->string('sepeda',100);
            $table->string('motor',100);
            $table->string('mobil',100);
            $table->string('atap',100);
            $table->string('lantai',100);
            $table->string('pbb',100);
            $table->string('hutang',100);
            $table->string('piutang',100);
            $table->string('tabungan',100);
            //~ $table->string('iuran_pln',100);
            //~ $table->string('iuran_pln',100);
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
        Schema::drop('mstspmb_asets');
    }
}
