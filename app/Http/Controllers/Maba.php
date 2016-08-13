<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Http\Requests;
use App\Mstspmb_profil;
use App\Mstspmb_aset;
use App\Mstspmb_user;
use App\Mstspmb_ujian;
use App\Mstspmb_ujian_soal;

class Maba extends Controller
{
    public function simpan_bio(Request $request)
	{
        DB::table('mstspmb_profils')
            ->where('no_ujian', session('userid'))
            ->update([
						'nama' => $request->input('nama'),
						'tempat_lahir' => $request->input('tempat_lahir'),
						'tanggal_lahir' => date('Y-m-d',strtotime($request->input('tanggal_lahir'))),
						'jender' => $request->input('jender'),
						'nikah' => $request->input('nikah'),
						'kota' => $request->input('kota'),
						'wni' => $request->input('wni'),
						'hp' => $request->input('hp'),
						'alamat' => $request->input('alamat'),
						'jumlah_saudara' => $request->input('jumlah_saudara'),
						'anak_ke' => $request->input('anak_ke'),
						'mengetahui_iain' => $request->input('mengetahui_iain'),
						'ktp' => $request->input('ktp')
					]);
		$data=DB::table('mstspmb_profils')->select('*')->where('no_ujian',session()->get('userid'))->first();
		$kota=DB::table('ref_kabupatenkota')->select('*')->get();
		$sekolah=DB::table('ref_jenis_sekolah')->select('*')->get();
		$jurusan=DB::table('ref_jurusan_sekolah')->select('*')->get();
		return view('maba/sekolah',compact('data','kota','sekolah','jurusan'));
	} 
    public function simpan_sekolah(Request $request)
	{
        DB::table('mstspmb_profils')
            ->where('no_ujian', session('userid'))
            ->update([
						'nama_sekolah' => $request->input('nama_sekolah'),
						'kota_sekolah' => $request->input('kota_sekolah'),
						'jenis_sekolah' => $request->input('jenis_sekolah'),
						'jurusan' => $request->input('jurusan'),
						'alamat_sekolah' => $request->input('alamat_sekolah'),
						'tanggal_ijazah' => date('Y-m-d',strtotime($request->input('tanggal_ijazah'))),
						'pesantren' => $request->input('ponpes'),
						'nama_pesantren' => $request->input('nama_ponpes'),
						'alamat_pesantren' => $request->input('alamat_ponpes'),
						'bahasa_arab' => $request->input('bahasa_arab'),
						'bahasa_inggris' => $request->input('bahasa_inggris'),
						'komputer' => $request->input('komputer')
					]);     
		$data=DB::table('mstspmb_profils')->select('*')->where('no_ujian',session()->get('userid'))->first();
		$kota=DB::table('ref_kabupatenkota')->select('*')->get();
		$gaji=DB::table('ref_gaji')->select('*')->get();
		$pekerjaan=DB::table('ref_pekerjaan')->select('*')->get();
		$pendidikan=DB::table('ref_pendidikan')->select('*')->get();
		return view('maba/ortu',compact('data','kota','gaji','pekerjaan','pendidikan'));
	} 
    public function simpan_aset(Request $request)
	{
        DB::table('mstspmb_asets')
            ->where('no_ujian', session('userid'))
            ->update([
						'jenis_tinggal' => $request->input('jenis_tinggal'),
						'luas_rumah' => $request->input('luas_rumah'),
						'luas_tanah' => $request->input('luas_tanah'),
						'harga_jual' => $request->input('harga_jual'),
						'mck' => $request->input('mck'),
						'atap' => $request->input('atap'),
						'lantai' => $request->input('lantai'),
						'daya_listrik' => $request->input('daya_listrik'),
						'iuran_pln' => $request->input('iuran_pln'),
						'iuran_telp' => $request->input('iuran_telp'),
						'sumber_air' => $request->input('sumber_air'),
						'sepeda' => $request->input('sepeda'),
						'motor' => $request->input('motor'),
						'mobil' => $request->input('mobil'),
						'hutang' => $request->input('hutang'),
						'piutang' => $request->input('piutang'),
						'tabungan' => $request->input('tabungan')
					]);     
		$data=DB::table('mstspmb_profils')->select('*')->where('no_ujian',session()->get('userid'))->first();
		$aset=DB::table('mstspmb_asets')->select('*')->where('no_ujian',session()->get('userid'))->first();
		return '<p class="bg-warning jumbotron">Terima kasih</p>';
	} 
    public function simpan_ortu(Request $request)
	{
        DB::table('mstspmb_profils')
            ->where('no_ujian', session('userid'))
            ->update([
						'ayah_alm' => $request->input('ayah_alm'),
						'ibu_alm' => $request->input('ibu_alm'),
						'ayah_nama' => $request->input('ayah_nama'),
						'ayah_pendidikan' => $request->input('ayah_pendidikan'),
						'ayah_pekerjaan' => $request->input('ayah_pekerjaan'),
						'ayah_penghasilan' => $request->input('ayah_penghasilan'),
						'ibu_nama' => $request->input('ibu_nama'),
						'ibu_pendidikan' => $request->input('ibu_pendidikan'),
						'ibu_pekerjaan' => $request->input('ibu_pekerjaan'),
						'ibu_penghasilan' => $request->input('ibu_penghasilan'),
						'ortu_alamat' => $request->input('ortu_alamat'),
						'ortu_kota' => $request->input('ortu_kota'),
						'ortu_hp' => $request->input('ortu_hp')
					]);     
		$data=DB::table('mstspmb_profils')->select('*')->where('no_ujian',session()->get('userid'))->first();
		$aset=DB::table('mstspmb_asets')->select('*')->where('no_ujian',session()->get('userid'))->first();
		$atap=DB::table('ref_aset_atap')->select('*')->orderBy('id', 'desc')->get();
		$listrik=DB::table('ref_aset_daya_listrik')->select('*')->get();
		$pln=DB::table('ref_aset_iuran_pln')->select('*')->get();
		$telkom=DB::table('ref_aset_iuran_telp')->select('*')->get();
		$tinggal=DB::table('ref_aset_jenis_tinggal')->select('*')->get();
		$lantai=DB::table('ref_aset_lantai')->select('*')->orderBy('id', 'desc')->get();
		$luas=DB::table('ref_aset_luas_rumah')->select('*')->get();
		$mck=DB::table('ref_aset_mck')->select('*')->get();
		$pbb=DB::table('ref_aset_pbb')->select('*')->get();
		$air=DB::table('ref_aset_sumber_air')->select('*')->orderBy('id', 'desc')->get();
		$tabungan=DB::table('ref_aset_tabungan')->select('*')->get();
		$tanah=DB::table('ref_aset_tanah')->select('*')->get();
		$hutang=DB::table('ref_aset_hutang')->select('*')->get();
		$piutang=DB::table('ref_aset_piutang')->select('*')->get();
		$njop=DB::table('ref_aset_njop')->select('*')->get();
		$sepeda=DB::table('ref_aset_kendaraan_sepeda')->select('*')->get();
		$motor=DB::table('ref_aset_kendaraan_motor')->select('*')->get();
		$mobil=DB::table('ref_aset_kendaraan_mobil')->select('*')->get();
		$cek=DB::table('mstspmb_asets')->select('*')->where('no_ujian',session('userid'))->get();
		if(empty($cek))
		{ 
			$aset = new Mstspmb_aset;
			$aset->no_ujian = session('userid');
			$aset->created_at = date('Y-m-d h:i:s');
			$aset->save();
		}
		return view('maba/aset',compact(
										'data',
										'aset',
										'atap',
										'listrik',
										'pln',
										'telkom',
										'tinggal',
										'lantai',
										'luas',
										'mck',
										'pbb',
										'air',
										'tabungan',
										'tanah',
										'njop',
										'sepeda',
										'motor',
										'mobil',
										'piutang',
										'hutang'
										));
	} 
	function simpan_waktu()
	{
		$profil = Mstspmb_profil::where(['no_ujian'=>session()->get('userid')])->first();
		$kurang=$profil->waktu_ujian-1;
		Mstspmb_profil::where('no_ujian',session()->get('userid'))->update(['waktu_ujian'=>$kurang]);
		$profil = Mstspmb_profil::where(['no_ujian'=>session()->get('userid')])->first();
		return $profil->waktu_ujian;
	}
	function ambil_soal(Request $request)
	{
		$no_soal=$request->input('no_soal');
		$soal =DB::table('mstspmb_ujian')
					->leftJoin('mstspmb_ujian_soal', 'mstspmb_ujian.id_soal', '=', 'mstspmb_ujian_soal.id')
					->select(
							'mstspmb_ujian.id',
							'mstspmb_ujian.no_soal',
							'mstspmb_ujian.id_soal',
							'mstspmb_ujian.jawaban',
							'mstspmb_ujian.sesi_ujian',
							'mstspmb_ujian.tanggal_ujian',
							'mstspmb_ujian.prodi_lulus',
							'mstspmb_ujian.admin',
							'mstspmb_ujian.created_at',
							'mstspmb_ujian.updated_at',
							'mstspmb_ujian_soal.jenis',
							'mstspmb_ujian_soal.soal',
							'mstspmb_ujian_soal.jawaban1',
							'mstspmb_ujian_soal.jawaban2',
							'mstspmb_ujian_soal.jawaban3',
							'mstspmb_ujian_soal.jawaban4',
							'mstspmb_ujian_soal.jawaban_benar',
							'mstspmb_ujian_soal.pembuat',
							'mstspmb_ujian_soal.tanggal_buat',
							'mstspmb_ujian_soal.tanggal_update'
							)
					->where(['no_soal'=>$no_soal,'no_ujian'=>session()->get('userid')])
					->first();
		return view('maba/ujian_soal',compact('soal'));
	}
	function navigasi_soal(Request $request)
	{
		$ujian =DB::table('mstspmb_ujian')
					->leftJoin('mstspmb_ujian_soal', 'mstspmb_ujian.id_soal', '=', 'mstspmb_ujian_soal.id')
					->select(
							'mstspmb_ujian.id',
							'mstspmb_ujian.no_soal',
							'mstspmb_ujian.id_soal',
							'mstspmb_ujian.jawaban',
							'mstspmb_ujian.sesi_ujian',
							'mstspmb_ujian.tanggal_ujian',
							'mstspmb_ujian.prodi_lulus',
							'mstspmb_ujian.admin',
							'mstspmb_ujian.created_at',
							'mstspmb_ujian.updated_at',
							'mstspmb_ujian_soal.jenis',
							'mstspmb_ujian_soal.soal',
							'mstspmb_ujian_soal.jawaban1',
							'mstspmb_ujian_soal.jawaban2',
							'mstspmb_ujian_soal.jawaban3',
							'mstspmb_ujian_soal.jawaban4',
							'mstspmb_ujian_soal.jawaban_benar',
							'mstspmb_ujian_soal.pembuat',
							'mstspmb_ujian_soal.tanggal_buat',
							'mstspmb_ujian_soal.tanggal_update'
							)
					->where('mstspmb_ujian.no_ujian',session()->get('userid'))
					->get();
			return view('maba/ujian_navigasi',compact('ujian'));
	}
	function jawab(Request $request)
	{
		$no_soal=$request->input('no_soal');
		$jawaban=$request->input('jawaban');
		Mstspmb_ujian::where(['no_ujian'=>session()->get('userid'),'no_soal'=>$no_soal])->update(['jawaban'=>$jawaban]);
		$soal =DB::table('mstspmb_ujian')
					->leftJoin('mstspmb_ujian_soal', 'mstspmb_ujian.id_soal', '=', 'mstspmb_ujian_soal.id')
					->select(
							'mstspmb_ujian.id',
							'mstspmb_ujian.no_soal',
							'mstspmb_ujian.id_soal',
							'mstspmb_ujian.jawaban',
							'mstspmb_ujian.sesi_ujian',
							'mstspmb_ujian.tanggal_ujian',
							'mstspmb_ujian.prodi_lulus',
							'mstspmb_ujian.admin',
							'mstspmb_ujian.created_at',
							'mstspmb_ujian.updated_at',
							'mstspmb_ujian_soal.jenis',
							'mstspmb_ujian_soal.soal',
							'mstspmb_ujian_soal.jawaban1',
							'mstspmb_ujian_soal.jawaban2',
							'mstspmb_ujian_soal.jawaban3',
							'mstspmb_ujian_soal.jawaban4',
							'mstspmb_ujian_soal.jawaban_benar',
							'mstspmb_ujian_soal.pembuat',
							'mstspmb_ujian_soal.tanggal_buat',
							'mstspmb_ujian_soal.tanggal_update'
							)
					->where(['no_soal'=>$no_soal,'no_ujian'=>session()->get('userid')])
					->first();
		return view('maba/ujian_soal',compact('soal'));
	}
}
