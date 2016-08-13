<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstspmb_profil extends Model
{
    //
    //~ protected $table  = 'mstspmb_profils';
    //~ protected $fillable = ['*'];
    //~ protected $dateFormat = 'd/m/Y';
     
    //~ public function aset()
	//~ {
        //~ return $this->hasMany('App\Mstspmb_aset');
    //~ }
     
    //~ public function ambil_profil($no_ujian)
    //~ {
		 //~ DB::table('mstspmb_profils')
			//~ ->select(
						//~ 'mstspmb_profils.id',
						//~ 'mstspmb_profils.tahun',
						//~ 'mstspmb_profils.gelombang',
						//~ 'mstspmb_profils.no_ujian',
						//~ 'mstspmb_profils.nama',
						//~ 'mstspmb_profils.password',
						//~ 'mstspmb_profils.tempat_lahir',
						//~ 'mstspmb_profils.tanggal_lahir',
						//~ 'mstspmb_profils.pilihan1',
						//~ 'mstspmb_profils.pilihan2',
						//~ 'mstspmb_profils.pilihan3',
						//~ 'mstspmb_profils.jender',
						//~ 'mstspmb_profils.nikah',
						//~ 'mstspmb_profils.provinsi',
						//~ 'mstspmb_profils.kota',
						//~ 'mstspmb_profils.wni',
						//~ 'mstspmb_profils.hp',
						//~ 'mstspmb_profils.jenis_sekolah',
						//~ 'mstspmb_profils.nama_sekolah',
						//~ 'mstspmb_profils.alamat_sekolah',
						//~ 'mstspmb_profils.provinsi_sekolah',
						//~ 'mstspmb_profils.kota_sekolah',
						//~ 'mstspmb_profils.tahun_lulus',
						//~ 'mstspmb_profils.jurusan',
						//~ 'mstspmb_profils.pesantren',
						//~ 'mstspmb_profils.alamat_pesantren',
						//~ 'mstspmb_profils.ayah_nama',
						//~ 'mstspmb_profils.ayah_alm',
						//~ 'mstspmb_profils.ayah_pendidikan',
						//~ 'mstspmb_profils.ayah_pekerjaan',
						//~ 'mstspmb_profils.ayah_penghasilan',
						//~ 'mstspmb_profils.ibu_nama',
						//~ 'mstspmb_profils.ibu_alm',
						//~ 'mstspmb_profils.ibu_pendidikan',
						//~ 'mstspmb_profils.ibu_pekerjaan',
						//~ 'mstspmb_profils.ibu_penghasilan',
						//~ 'mstspmb_profils.ortu_alamat',
						//~ 'mstspmb_profils.ortu_hp',
						//~ 'mstspmb_profils.ortu_kelurahan',
						//~ 'mstspmb_profils.ortu_kota',
						//~ 'mstspmb_profils.ortu_prov',
						//~ 'mstspmb_profils.anak_ke',
						//~ 'mstspmb_profils.jumlah_saudara',
						//~ 'mstspmb_profils.bahasa_arab',
						//~ 'mstspmb_profils.bahasa_ingris',
						//~ 'mstspmb_profils.komputer',
						//~ 'mstspmb_profils.mengetahui_iain',
						//~ 'mstspmb_profils.ruang',
						//~ 'mstspmb_asets.jenis_tinggal',
						//~ 'mstspmb_asets.luas_rumah',
						//~ 'mstspmb_asets.luas_tanah',
						//~ 'mstspmb_asets.harga_jual',
						//~ 'mstspmb_asets.mck',
						//~ 'mstspmb_asets.daya_listrik',
						//~ 'mstspmb_asets.sumber_air',
						//~ 'mstspmb_asets.iuran_pln',
						//~ 'mstspmb_asets.iuran_telp',
						//~ 'mstspmb_asets.sepeda',
						//~ 'mstspmb_asets.motor',
						//~ 'mstspmb_asets.mobil',
						//~ 'mstspmb_asets.atap',
						//~ 'mstspmb_asets.lantai',
						//~ 'mstspmb_asets.pbb',
						//~ 'mstspmb_asets.hutang',
						//~ 'mstspmb_asets.piutang',
						//~ 'mstspmb_asets.tabungan')
           //~ ->join->on('mstspmb_asets', 'mstspmb_profils.no_ujian', '=', 'mstspmb_asets.no_ujian')
           //~ ->where('mstspmb_profils.no_ujian',$no_ujian)
           //~ ->get();
	//~ }
}
