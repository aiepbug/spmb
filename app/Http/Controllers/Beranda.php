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
use App\Mstspmb_rule;
use PDF;
use Excel; 
class Beranda extends Controller
{
	//~ public function __construct()
	//~ {
		//~ $this->middleware('auth');
	//~ }
	public function index()
	{
		if(session()->get('level')=='admin')
		{
			return $this->menu_admin();
		}
		else if(session()->get('level')=='maba')
		{
			return $this->menu_maba();
		}
		else
		{
			return view('login');
		}
	} 
	public function admins(Request $request)
	{
		$offset=$request->input('offset');
		$limit=20;
		if($offset=='')
		{
			$skip=1;
			$offset=0;
		}
		else
		{
			$skip=$offset;
			$offset=($request->input('offset')-1)*$limit;
			
		}
		session(['gelombang' => $request->input('gelombang')]);
		$data=DB::table('mstspmb_profils')
					->leftJoin('prodi as p1', 'mstspmb_profils.pilihan1', '=', 'p1.kode_prodi')
					->leftJoin('prodi as p2', 'mstspmb_profils.pilihan2', '=', 'p2.kode_prodi')
					->leftJoin('prodi as p3', 'mstspmb_profils.pilihan3', '=', 'p3.kode_prodi')
					->leftJoin('prodi as lulus', 'mstspmb_profils.lulus_prodi', '=', 'lulus.kode_prodi')
					->leftJoin('mstspmb_asets', 'mstspmb_profils.no_ujian', '=', 'mstspmb_asets.no_ujian')
					->leftJoin('ref_aset_jenis_tinggal', 'mstspmb_asets.jenis_tinggal', '=', 'ref_aset_jenis_tinggal.id')
					->leftJoin('ref_aset_luas_rumah', 'mstspmb_asets.luas_rumah', '=', 'ref_aset_luas_rumah.id')
					->leftJoin('ref_aset_tanah', 'mstspmb_asets.luas_tanah', '=', 'ref_aset_tanah.id')
					->leftJoin('ref_aset_njop', 'mstspmb_asets.harga_jual', '=', 'ref_aset_njop.id')
					->leftJoin('ref_aset_mck', 'mstspmb_asets.mck', '=', 'ref_aset_mck.id')
					->leftJoin('ref_aset_daya_listrik', 'mstspmb_asets.daya_listrik', '=', 'ref_aset_daya_listrik.id')
					->leftJoin('ref_aset_sumber_air', 'mstspmb_asets.sumber_air', '=', 'ref_aset_sumber_air.id')
					->leftJoin('ref_aset_iuran_pln', 'mstspmb_asets.iuran_pln', '=', 'ref_aset_iuran_pln.id')
					->leftJoin('ref_aset_iuran_telp', 'mstspmb_asets.iuran_telp', '=', 'ref_aset_iuran_telp.id')
					->leftJoin('ref_aset_kendaraan_sepeda', 'mstspmb_asets.sepeda', '=', 'ref_aset_kendaraan_sepeda.id')
					->leftJoin('ref_aset_kendaraan_motor', 'mstspmb_asets.motor', '=', 'ref_aset_kendaraan_motor.id')
					->leftJoin('ref_aset_kendaraan_mobil', 'mstspmb_asets.mobil', '=', 'ref_aset_kendaraan_mobil.id')
					->leftJoin('ref_aset_atap', 'mstspmb_asets.atap', '=', 'ref_aset_atap.id')
					->leftJoin('ref_aset_lantai', 'mstspmb_asets.lantai', '=', 'ref_aset_lantai.id')
					->leftJoin('ref_aset_pbb', 'mstspmb_asets.pbb', '=', 'ref_aset_pbb.id')
					->leftJoin('ref_aset_hutang', 'mstspmb_asets.hutang', '=', 'ref_aset_hutang.id')
					->leftJoin('ref_aset_piutang', 'mstspmb_asets.piutang', '=', 'ref_aset_piutang.id')
					->leftJoin('ref_aset_tabungan', 'mstspmb_asets.tabungan', '=', 'ref_aset_tabungan.id')
					->select(
							'p1.singkatan_prodi as p1',
							'p2.singkatan_prodi as p2',
							'p3.singkatan_prodi as p3',
							'lulus.singkatan_prodi as lulus',
							'mstspmb_profils.gelombang', 
							'mstspmb_profils.no_ujian', 
							'mstspmb_profils.nama', 
							'mstspmb_profils.ujian', 
							'mstspmb_profils.skor_ujian', 
							'mstspmb_profils.lulus_prodi', 
							'mstspmb_profils.pilihan1', 
							'mstspmb_profils.pilihan2', 
							'mstspmb_profils.pilihan3', 
							'mstspmb_profils.password',
							'ref_aset_jenis_tinggal.keterangan AS jenis_tinggal',
							'ref_aset_luas_rumah.keterangan AS luas_rumah',
							'ref_aset_tanah.keterangan AS tanah',
							'ref_aset_njop.keterangan AS njop',
							'ref_aset_mck.keterangan AS mck',
							'ref_aset_daya_listrik.keterangan AS daya_listrik',
							'ref_aset_sumber_air.keterangan AS sumber_air',
							'ref_aset_iuran_pln.keterangan AS pln',
							'ref_aset_iuran_telp.keterangan AS telp',
							'ref_aset_kendaraan_sepeda.keterangan AS sepeda',
							'ref_aset_kendaraan_motor.keterangan AS motor',
							'ref_aset_kendaraan_mobil.keterangan AS mobil',
							'ref_aset_atap.keterangan AS atap',
							'ref_aset_lantai.keterangan AS lantai',
							'ref_aset_pbb.keterangan AS pbb',
							'ref_aset_hutang.keterangan AS hutang',
							'ref_aset_piutang.keterangan AS piutang',
							'ref_aset_tabungan.keterangan AS tabungan',
							'ref_aset_jenis_tinggal.skor AS skor_jenis_tinggal',
							'ref_aset_luas_rumah.skor AS skor_luas_rumah',
							'ref_aset_tanah.skor AS skor_tanah',
							'ref_aset_njop.skor AS skor_njop',
							'ref_aset_mck.skor AS skor_mck',
							'ref_aset_daya_listrik.skor AS skor_daya_listrik',
							'ref_aset_sumber_air.skor AS skor_sumber_air',
							'ref_aset_iuran_pln.skor AS skor_pln',
							'ref_aset_iuran_telp.skor AS skor_telp',
							'ref_aset_kendaraan_sepeda.skor AS skor_sepeda',
							'ref_aset_kendaraan_motor.skor AS skor_motor',
							'ref_aset_kendaraan_mobil.skor AS skor_mobil',
							'ref_aset_atap.skor AS skor_atap',
							'ref_aset_lantai.skor AS skor_lantai',
							'ref_aset_pbb.skor AS skor_pbb',
							'ref_aset_hutang.skor AS skor_hutang',
							'ref_aset_piutang.skor AS skor_piutang',
							'ref_aset_tabungan.skor AS skor_tabungan' 
							)
					->orderBy('no_ujian')
					->where('gelombang',session()->get('gelombang'))->take($limit)->skip($offset)->get();
		$count=Mstspmb_profil::select('*')->where('gelombang',session()->get('gelombang'))->count();
		$rule=Mstspmb_rule::select('*')->where('gelombang',session()->get('gelombang'))->first();
		$page=ceil($count/$limit);
		$nomor=1;
		return view('admin_data_tabel',compact('data','nomor','page','skip','rule','limit'));
	}
	public function cari(Request $request)
	{
		$offset=$request->input('offset');
		$limit=20;
		if($offset=='')
		{
			$skip=1;
			$offset=0;
		}
		else
		{
			$skip=$offset;
			$offset=($request->input('offset')-1)*$limit;
			
		}
		session(['gelombang' => $request->input('gelombang')]);
		$data=DB::table('mstspmb_profils')
					->leftJoin('prodi as p1', 'mstspmb_profils.pilihan1', '=', 'p1.kode_prodi')
					->leftJoin('prodi as p2', 'mstspmb_profils.pilihan2', '=', 'p2.kode_prodi')
					->leftJoin('prodi as p3', 'mstspmb_profils.pilihan3', '=', 'p3.kode_prodi')
					->leftJoin('prodi as lulus', 'mstspmb_profils.lulus_prodi', '=', 'lulus.kode_prodi')
					->leftJoin('mstspmb_asets', 'mstspmb_profils.no_ujian', '=', 'mstspmb_asets.no_ujian')
					->leftJoin('ref_aset_jenis_tinggal', 'mstspmb_asets.jenis_tinggal', '=', 'ref_aset_jenis_tinggal.id')
					->leftJoin('ref_aset_luas_rumah', 'mstspmb_asets.luas_rumah', '=', 'ref_aset_luas_rumah.id')
					->leftJoin('ref_aset_tanah', 'mstspmb_asets.luas_tanah', '=', 'ref_aset_tanah.id')
					->leftJoin('ref_aset_njop', 'mstspmb_asets.harga_jual', '=', 'ref_aset_njop.id')
					->leftJoin('ref_aset_mck', 'mstspmb_asets.mck', '=', 'ref_aset_mck.id')
					->leftJoin('ref_aset_daya_listrik', 'mstspmb_asets.daya_listrik', '=', 'ref_aset_daya_listrik.id')
					->leftJoin('ref_aset_sumber_air', 'mstspmb_asets.sumber_air', '=', 'ref_aset_sumber_air.id')
					->leftJoin('ref_aset_iuran_pln', 'mstspmb_asets.iuran_pln', '=', 'ref_aset_iuran_pln.id')
					->leftJoin('ref_aset_iuran_telp', 'mstspmb_asets.iuran_telp', '=', 'ref_aset_iuran_telp.id')
					->leftJoin('ref_aset_kendaraan_sepeda', 'mstspmb_asets.sepeda', '=', 'ref_aset_kendaraan_sepeda.id')
					->leftJoin('ref_aset_kendaraan_motor', 'mstspmb_asets.motor', '=', 'ref_aset_kendaraan_motor.id')
					->leftJoin('ref_aset_kendaraan_mobil', 'mstspmb_asets.mobil', '=', 'ref_aset_kendaraan_mobil.id')
					->leftJoin('ref_aset_atap', 'mstspmb_asets.atap', '=', 'ref_aset_atap.id')
					->leftJoin('ref_aset_lantai', 'mstspmb_asets.lantai', '=', 'ref_aset_lantai.id')
					->leftJoin('ref_aset_pbb', 'mstspmb_asets.pbb', '=', 'ref_aset_pbb.id')
					->leftJoin('ref_aset_hutang', 'mstspmb_asets.hutang', '=', 'ref_aset_hutang.id')
					->leftJoin('ref_aset_piutang', 'mstspmb_asets.piutang', '=', 'ref_aset_piutang.id')
					->leftJoin('ref_aset_tabungan', 'mstspmb_asets.tabungan', '=', 'ref_aset_tabungan.id')
					->select(
							'p1.singkatan_prodi as p1',
							'p2.singkatan_prodi as p2',
							'p3.singkatan_prodi as p3',
							'lulus.singkatan_prodi as lulus',
							'mstspmb_profils.gelombang', 
							'mstspmb_profils.no_ujian', 
							'mstspmb_profils.nama', 
							'mstspmb_profils.ujian', 
							'mstspmb_profils.skor_ujian', 
							'mstspmb_profils.lulus_prodi', 
							'mstspmb_profils.pilihan1', 
							'mstspmb_profils.pilihan2', 
							'mstspmb_profils.pilihan3', 
							'mstspmb_profils.password',
							'ref_aset_jenis_tinggal.keterangan AS jenis_tinggal',
							'ref_aset_luas_rumah.keterangan AS luas_rumah',
							'ref_aset_tanah.keterangan AS tanah',
							'ref_aset_njop.keterangan AS njop',
							'ref_aset_mck.keterangan AS mck',
							'ref_aset_daya_listrik.keterangan AS daya_listrik',
							'ref_aset_sumber_air.keterangan AS sumber_air',
							'ref_aset_iuran_pln.keterangan AS pln',
							'ref_aset_iuran_telp.keterangan AS telp',
							'ref_aset_kendaraan_sepeda.keterangan AS sepeda',
							'ref_aset_kendaraan_motor.keterangan AS motor',
							'ref_aset_kendaraan_mobil.keterangan AS mobil',
							'ref_aset_atap.keterangan AS atap',
							'ref_aset_lantai.keterangan AS lantai',
							'ref_aset_pbb.keterangan AS pbb',
							'ref_aset_hutang.keterangan AS hutang',
							'ref_aset_piutang.keterangan AS piutang',
							'ref_aset_tabungan.keterangan AS tabungan',
							'ref_aset_jenis_tinggal.skor AS skor_jenis_tinggal',
							'ref_aset_luas_rumah.skor AS skor_luas_rumah',
							'ref_aset_tanah.skor AS skor_tanah',
							'ref_aset_njop.skor AS skor_njop',
							'ref_aset_mck.skor AS skor_mck',
							'ref_aset_daya_listrik.skor AS skor_daya_listrik',
							'ref_aset_sumber_air.skor AS skor_sumber_air',
							'ref_aset_iuran_pln.skor AS skor_pln',
							'ref_aset_iuran_telp.skor AS skor_telp',
							'ref_aset_kendaraan_sepeda.skor AS skor_sepeda',
							'ref_aset_kendaraan_motor.skor AS skor_motor',
							'ref_aset_kendaraan_mobil.skor AS skor_mobil',
							'ref_aset_atap.skor AS skor_atap',
							'ref_aset_lantai.skor AS skor_lantai',
							'ref_aset_pbb.skor AS skor_pbb',
							'ref_aset_hutang.skor AS skor_hutang',
							'ref_aset_piutang.skor AS skor_piutang',
							'ref_aset_tabungan.skor AS skor_tabungan' 
							 
							)
					->orderBy('no_ujian')
					->where('nama','like','%'.$request->input('kata').'%')->get();
					//~ ->where([['gelombang',session()->get('gelombang')],['nama','like',"'%".$request->input('kata')."%'"],])->take($limit)->skip($offset)->get();
		$count=Mstspmb_profil::select('*')->where('gelombang',session()->get('gelombang'))->count();
		$rule=Mstspmb_rule::select('*')->where('gelombang',session()->get('gelombang'))->first();
		$page=ceil($count/$limit);
		$nomor=1;
		return view('admin_data_tabel',compact('data','nomor','page','skip','rule','limit'));
	}
	public function aktif_ujian(Request $request)
	{
		$no_ujian=$request->input('no_ujian');
		$profil=Mstspmb_profil::select('*')->where('no_ujian',$no_ujian)->first();
		$rule=Mstspmb_rule::where(['tahun'=>$profil->tahun,'gelombang'=>$profil->gelombang])->first();
		if($profil->ujian==1)
		{
			Mstspmb_profil::where('no_ujian', $no_ujian)->update(['ujian' => 0]);
		}
		else if($profil->ujian==0)
		{
			Mstspmb_profil::where('no_ujian', $no_ujian)->update(['ujian' => 1,'waktu_ujian'=>$rule->waktu_ujian]);
		}
		else if($profil->ujian==2)
		{
			return false;
		}
		$offset=$request->input('offset');
		$limit=20;
		$skip=$offset;
		$offset=($request->input('offset')-1)*$limit;
		//~ $data=Mstspmb_profil::select('*')->where('gelombang',session()->get('gelombang'))->take($limit)->skip($offset)->get();
		$data=DB::table('mstspmb_profils')
					->leftJoin('prodi as p1', 'mstspmb_profils.pilihan1', '=', 'p1.kode_prodi')
					->leftJoin('prodi as p2', 'mstspmb_profils.pilihan2', '=', 'p2.kode_prodi')
					->leftJoin('prodi as p3', 'mstspmb_profils.pilihan3', '=', 'p3.kode_prodi')
					->leftJoin('prodi as lulus', 'mstspmb_profils.lulus_prodi', '=', 'lulus.kode_prodi')
					->select(
							'p1.singkatan_prodi as p1',
							'p2.singkatan_prodi as p2',
							'p3.singkatan_prodi as p3',
							'lulus.singkatan_prodi as lulus',
							'mstspmb_profils.no_ujian', 
							'mstspmb_profils.nama', 
							'mstspmb_profils.ujian', 
							'mstspmb_profils.skor_ujian', 
							'mstspmb_profils.lulus_prodi', 
							'mstspmb_profils.gelombang', 
							'mstspmb_profils.pilihan1', 
							'mstspmb_profils.pilihan2', 
							'mstspmb_profils.pilihan3', 
							'mstspmb_profils.password' 
							)
					->orderBy('no_ujian')
					->where('gelombang',session()->get('gelombang'))->take($limit)->skip($offset)->get();
		$count=Mstspmb_profil::select('*')->where('gelombang',session()->get('gelombang'))->count();
		$page=ceil($count/$limit);
		$nomor=1;
		return view('admin_data_tabel',compact('data','nomor','page','skip','rule','limit'));
	}
	public function upload_foto(Request $request)
	{
		$path='asset/img/foto/';
		$no_ujian=$request->input('no_ujian');
		if(file_exists($path.$no_ujian).".jpg"==1)
		{
			unlink($path.$no_ujian.".jpg");
		}
		$fileName = $_FILES['afile']['name'];
		$fileType = $_FILES['afile']['type'];
		$fileContent = file_get_contents($_FILES['afile']['tmp_name']);
		$dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
		move_uploaded_file($_FILES['afile']['tmp_name'], $path.$no_ujian.".jpg");
	}
	public function simpan_lulus(Request $request)
	{
		$no_ujian=$request->input('no_ujian');
		$prodi=$request->input('prodi');
		$profil=Mstspmb_profil::select('*')->where('no_ujian',$no_ujian)->first();
		$rule=Mstspmb_rule::where(['tahun'=>$profil->tahun,'gelombang'=>$profil->gelombang])->first();
		Mstspmb_profil::where('no_ujian', $no_ujian)->update(['lulus_prodi' => $prodi]);
		$offset=$request->input('offset');
		$limit=20;
		$skip=$offset;
		$offset=($request->input('offset')-1)*$limit;
		$data=DB::table('mstspmb_profils')
					->leftJoin('prodi as p1', 'mstspmb_profils.pilihan1', '=', 'p1.kode_prodi')
					->leftJoin('prodi as p2', 'mstspmb_profils.pilihan2', '=', 'p2.kode_prodi')
					->leftJoin('prodi as p3', 'mstspmb_profils.pilihan3', '=', 'p3.kode_prodi')
					->leftJoin('prodi as lulus', 'mstspmb_profils.lulus_prodi', '=', 'lulus.kode_prodi')
					->select(
							'p1.singkatan_prodi as p1',
							'p2.singkatan_prodi as p2',
							'p3.singkatan_prodi as p3',
							'lulus.singkatan_prodi as lulus',
							'mstspmb_profils.no_ujian', 
							'mstspmb_profils.nama', 
							'mstspmb_profils.ujian', 
							'mstspmb_profils.skor_ujian', 
							'mstspmb_profils.lulus_prodi', 
							'mstspmb_profils.pilihan1', 
							'mstspmb_profils.pilihan2', 
							'mstspmb_profils.pilihan3', 
							'mstspmb_profils.password' 
							)
					->orderBy('no_ujian')
					->where('gelombang',session()->get('gelombang'))->take($limit)->skip($offset)->get();
		$count=Mstspmb_profil::select('*')->where('gelombang',session()->get('gelombang'))->count();
		$page=ceil($count/$limit);
		$nomor=1;
		return view('admin_data_tabel',compact('data','nomor','page','skip','rule'));
	}
	
	public function menu_admin()
	{
		if(session()->get('level')=='admin' && session()->get('login')=='true' && session()->get('kunci')=='spmb141n')
		{
			$rule=DB::table('mstspmb_rule')->select('*')->get();
			$prodi=DB::table('prodi')->select('*')->where('kode_jenjang','C');
			return view('admin_data',compact('rule','prodi'));
		}
		else
		{
			Session::flash('message', 'Access denied'); 
			Session::flash('alert-class', 'alert-danger'); 
			return view('login');
		}
	}
	public function menu_maba()
	{
		if(session()->get('level')=='maba' && session()->get('login')=='true' && session()->get('kunci')=='spmb141n')
		{
			$data=DB::table('mstspmb_profils')->select('*')->where('no_ujian',session()->get('userid'))->first();
			if($data->ujian == 1)
			{
				return $this->menu_ujian();
			}
			else if($data->ujian == 0)
			{
				$bangsa=DB::table('ref_bangsa')->select('*')->get();
				$kota=DB::table('ref_kabupatenkota')->select('*')->get();
				$mengetahui_iain=DB::table('ref_mengetahui_iain')->select('*')->get();
				$prodi=DB::table('prodi')->select('*')->where('kode_jenjang','C')
					->orderBy('kode_fakultas','asc')
					->orderBy('kode_prodi','asc')
					->get();
				return view('isidata_bio',compact('data','prodi','kota','bangsa','mengetahui_iain'));
			}
		}
		else
		{
			Session::flash('message', 'Access denied'); 
			Session::flash('alert-class', 'alert-danger'); 
			return view('login');
		}
	}
	function menu_ujian()
	{
		if(session()->get('level')=='maba' && session()->get('login')=='true' && session()->get('kunci')=='spmb141n')
		{
			$soal=Mstspmb_ujian::where('no_ujian',session()->get('userid'))->first();
			$profil=Mstspmb_profil::where('no_ujian',session()->get('userid'))->first();
			$rule=Mstspmb_rule::where(['tahun'=>$profil->tahun,'gelombang'=>$profil->gelombang])->first();
			if(is_null($soal))
			{
				$jumlah_soal=$rule->jumlah_soal;
				$ambil_soal=DB::table('mstspmb_ujian_soal')->select('id')->
							where('aktif',1)->orderBy(DB::raw('RAND()'))->take($jumlah_soal)->get();
				$b=json_decode(json_encode($ambil_soal), True);
				$keys = array_keys(json_decode(json_encode($ambil_soal), True));
				for($i =0; $i < count($b); $i++) {
					foreach($b[$keys[$i]] as $key => $value) {
						$ujian = new Mstspmb_ujian;
						$ujian->no_ujian = session()->get('userid');
						$ujian->no_soal = $i+1;
						$ujian->id_soal = $value;
						$ujian->save();
					}
				}
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
				return view('maba/ujian',compact('ujian','profil','rule'));
			}
			else
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
				return view('maba/ujian',compact('ujian','profil','rule'));
			}
		}
		else 
		{
			Session::flash('message', 'Access denied'); 
			Session::flash('alert-class', 'alert-danger'); 
			return view('login');
		}
	}
	public function masuk(Request $request)
	{	
			$userid = $request->input('userid');
			$password = $request->input('password');
			$admin = $request->input('admin');
			
			if($admin==true)
			{
				$login = Mstspmb_user::where(['userid'=>$userid,'password'=>$password])->first();
				if(is_null($login))
				{
					Session::flash('message', 'Salah userid atau password'); 
					Session::flash('alert-class', 'alert-danger'); 
					return view('login');
				}
				else
				{
					session(['login' => 'true','kunci' => 'spmb141n','userid' => $userid,'level' => 'admin','gelombang'=>'mandiri1']);
					return $this->menu_admin();
				}
			}
			else
			{
				$login = Mstspmb_profil::where(['no_ujian'=>$userid,'password'=>$password])->first();
				if(is_null($login))
				{
					Session::flash('message', 'Salah userid atau password'); 
					Session::flash('alert-class', 'alert-danger'); 
					return view('login');
				}
				else
				{
					session(['login' => 'true','kunci' => 'spmb141n','userid' => $userid,'level' => 'maba']);
					if($login->ujian==0)
					{
						//~ redirect()->route('/');
						return $this->menu_maba();
					}
					else if($login->ujian==1)
					{
						return $this->menu_ujian();
					}
					else if($login->ujian==2)
					{
						session()->flush();
						return view('maba/ujian_tutup');
					}
				}
				
				
			}
	} 
	public function ambil_prof($no_ujian)
	{
		DB::table('mstspmb_profils')->select('*')->where('no_ujian',$no_ujian)->get();
	}
	public function ambil_aset($no_ujian)
	{
		DB::table('mstspmb_asets')->select('*')->where('no_ujian',$no_ujian)->get();
	}
	public function logout()
	{
		return view('logout');
	}
	public function selesai_ujian()
	{
		return view('maba/ujian_selesai');
	}
	public function tutup_ujian()
	{
		$ujian=DB::table('mstspmb_ujian')->where('no_ujian',session()->get('userid'))->get();
		$skor=0;
		foreach($ujian as $u)
		{
			$benar=DB::table('mstspmb_ujian_soal')->where(['id'=>$u->id_soal,'jawaban_benar'=>$u->jawaban])->first();
			if(!empty($benar))
			{
				$skor+=1;
			}
		}
		Mstspmb_profil::where('no_ujian',session()->get('userid'))->update(['skor_ujian'=>$skor,'ujian'=>'2']);
		$this->hapus_session();
		return redirect()->guest('/');
	}
	public function hapus_session()
	{
		session()->flush();
		return redirect()->guest('/')->with('global', 'Your session has expired. Please try logging in again.');
	}
	
	public function tambah_peserta()
	{
		$prodi=DB::table('prodi')->select('*')->where('kode_jenjang','C')
			->orderBy('kode_fakultas','asc')
			->orderBy('kode_prodi','asc')
			->get();
		return view('modal_tambah_peserta',compact('prodi'));
	}
	public function simpan_peserta(Request $request)
	{
		$rule=DB::table('mstspmb_rule')->select('*')->where('gelombang',$request->input('gelombang'))->get();
		$urut=DB::table('mstspmb_profils')
			->select(DB::raw('count(*) as total'))
			->where('gelombang',$request->input('gelombang'))
			->get();
		if($urut[0]->total==0)
		{
			$urut=1;
		}
		else
		{
			$urut=$urut[0]->total+1;
		}
		$profil = new Mstspmb_profil;
        $profil->gelombang = $request->input('gelombang');
        $profil->nama = $request->input('nama');
        $profil->tempat_lahir = $request->input('tempat_lahir');
        $profil->tanggal_lahir = $request->input('tahun').'-'.$request->input('bulan').'-'.$request->input('tanggal');
        $profil->pilihan1 = $request->input('pilihan1');
        $profil->pilihan2 = $request->input('pilihan2');
        $profil->pilihan3 = $request->input('pilihan3');
        $profil->no_ujian=$rule[0]->no_awal_kartu.$rule[0]->tahun.str_pad($urut,3,'0', STR_PAD_LEFT);
        $profil->tahun = $rule[0]->tahun;
        $profil->ruang = ceil($urut/20);
        //~ $profil->created_at = date('Y-m-d h:i:s');
        $profil->password = substr(md5($rule[0]->no_awal_kartu.$rule[0]->tahun.str_pad($urut,3,'0', STR_PAD_LEFT)),5,5);
        $profil->save();
		return $this->menu_admin();
	}
	public function cetak_kartu(Request $request)
	{
		$no_ujian=$request->input('no_ujian');
		$profil =	DB::table('mstspmb_profils')
					->leftJoin('prodi as p1', 'mstspmb_profils.pilihan1', '=', 'p1.kode_prodi')
					->leftJoin('prodi as p2', 'mstspmb_profils.pilihan2', '=', 'p2.kode_prodi')
					->leftJoin('prodi as p3', 'mstspmb_profils.pilihan3', '=', 'p3.kode_prodi')
					->select(
							'p1.nama_prodi as p1',
							'p2.nama_prodi as p2',
							'p3.nama_prodi as p3',
							'mstspmb_profils.no_ujian',
							'mstspmb_profils.gelombang',
							'mstspmb_profils.password',
							'mstspmb_profils.nama', 
							'mstspmb_profils.ruang', 
							'mstspmb_profils.tempat_lahir', 
							'mstspmb_profils.tanggal_lahir' 
							)
					->where('mstspmb_profils.no_ujian',$no_ujian)
					->first();
		$rule=DB::table('mstspmb_rule')->select('*')->where('gelombang',$profil->gelombang)->first();
		//~ return PDF::view('cetak/kartu',compact('profil','rule'));
		//~ return PDF::writeHTML(view('cetak/kartu',compact('profil','rule'))->render());
		PDF::SetTitle($profil->nama.' ('.$profil->nama.')');
		PDF::AddPage();
		PDF::writeHTML(view('cetak/kartu',compact('profil','rule')), true, false, false, false, '');
		PDF::Output("kartu.pdf","I");

	}
	public function download($_token,$no_ujian, $param)
	{
		if($param=="kartu_ujian")
		{
			$profil =	DB::table('mstspmb_profils')
						->leftJoin('prodi as p1', 'mstspmb_profils.pilihan1', '=', 'p1.kode_prodi')
						->leftJoin('prodi as p2', 'mstspmb_profils.pilihan2', '=', 'p2.kode_prodi')
						->leftJoin('prodi as p3', 'mstspmb_profils.pilihan3', '=', 'p3.kode_prodi')
						->select(
								'p1.nama_prodi as p1',
								'p2.nama_prodi as p2',
								'p3.nama_prodi as p3',
								'mstspmb_profils.no_ujian',
								'mstspmb_profils.gelombang',
								'mstspmb_profils.password',
								'mstspmb_profils.nama', 
								'mstspmb_profils.ruang', 
								'mstspmb_profils.tempat_lahir', 
								'mstspmb_profils.tanggal_lahir' 
								)
						->where('mstspmb_profils.no_ujian',$no_ujian)
						->first();
			$rule=DB::table('mstspmb_rule')->select('*')->where('gelombang',$profil->gelombang)->first();
			PDF::SetTitle($profil->nama.' ('.$profil->nama.')');
			PDF::AddPage();
			PDF::writeHTML(view('cetak/kartu',compact('profil','rule')), true, false, false, false, '');
			PDF::Output("kartu_".$no_ujian.".pdf","I");
		}
		if($param=="biodata")
		{
			$profil = Mstspmb_profil::where(['no_ujian'=>$no_ujian])->first();
			$umum =	DB::table('mstspmb_profils')
						->leftJoin('prodi as p1', 'mstspmb_profils.pilihan1', '=', 'p1.kode_prodi')
						->leftJoin('prodi as p2', 'mstspmb_profils.pilihan2', '=', 'p2.kode_prodi')
						->leftJoin('prodi as p3', 'mstspmb_profils.pilihan3', '=', 'p3.kode_prodi')
						->leftJoin('ref_jenis_sekolah', 'mstspmb_profils.jenis_sekolah', '=', 'ref_jenis_sekolah.kode')
						->leftJoin('ref_jurusan_sekolah', 'mstspmb_profils.jurusan', '=', 'ref_jurusan_sekolah.kode')
						->leftJoin('ref_kabupatenkota as kab1', 'mstspmb_profils.kota', '=', 'kab1.indeks')
						->leftJoin('ref_pendidikan as pend1', 'mstspmb_profils.ayah_pendidikan', '=', 'pend1.kode')
						->leftJoin('ref_pekerjaan as pek1', 'mstspmb_profils.ayah_pekerjaan', '=', 'pek1.kode')
						->leftJoin('ref_gaji as gaji1', 'mstspmb_profils.ayah_penghasilan', '=', 'gaji1.kode')
						->leftJoin('ref_pendidikan as pend2', 'mstspmb_profils.ibu_pendidikan', '=', 'pend2.kode')
						->leftJoin('ref_pekerjaan as pek2', 'mstspmb_profils.ibu_pekerjaan', '=', 'pek2.kode')
						->leftJoin('ref_gaji as gaji2', 'mstspmb_profils.ibu_penghasilan', '=', 'gaji2.kode')
						->leftJoin('ref_kabupatenkota as kab2', 'mstspmb_profils.ortu_kota', '=', 'kab2.indeks')
						->leftJoin('ref_mengetahui_iain', 'mstspmb_profils.mengetahui_iain', '=', 'ref_mengetahui_iain.kode')
						->leftJoin('mstspmb_asets', 'mstspmb_profils.no_ujian', '=', 'mstspmb_asets.no_ujian')
						->leftJoin('ref_aset_jenis_tinggal', 'mstspmb_asets.jenis_tinggal', '=', 'ref_aset_jenis_tinggal.id')
						->leftJoin('ref_aset_luas_rumah', 'mstspmb_asets.luas_rumah', '=', 'ref_aset_luas_rumah.id')
						->leftJoin('ref_aset_tanah', 'mstspmb_asets.luas_tanah', '=', 'ref_aset_tanah.id')
						->leftJoin('ref_aset_njop', 'mstspmb_asets.harga_jual', '=', 'ref_aset_njop.id')
						->leftJoin('ref_aset_mck', 'mstspmb_asets.mck', '=', 'ref_aset_mck.id')
						->leftJoin('ref_aset_daya_listrik', 'mstspmb_asets.daya_listrik', '=', 'ref_aset_daya_listrik.id')
						->leftJoin('ref_aset_sumber_air', 'mstspmb_asets.sumber_air', '=', 'ref_aset_sumber_air.id')
						->leftJoin('ref_aset_iuran_pln', 'mstspmb_asets.iuran_pln', '=', 'ref_aset_iuran_pln.id')
						->leftJoin('ref_aset_iuran_telp', 'mstspmb_asets.iuran_telp', '=', 'ref_aset_iuran_telp.id')
						->leftJoin('ref_aset_kendaraan_sepeda', 'mstspmb_asets.sepeda', '=', 'ref_aset_kendaraan_sepeda.id')
						->leftJoin('ref_aset_kendaraan_motor', 'mstspmb_asets.motor', '=', 'ref_aset_kendaraan_motor.id')
						->leftJoin('ref_aset_kendaraan_mobil', 'mstspmb_asets.mobil', '=', 'ref_aset_kendaraan_mobil.id')
						->leftJoin('ref_aset_atap', 'mstspmb_asets.atap', '=', 'ref_aset_atap.id')
						->leftJoin('ref_aset_lantai', 'mstspmb_asets.lantai', '=', 'ref_aset_lantai.id')
						->leftJoin('ref_aset_pbb', 'mstspmb_asets.pbb', '=', 'ref_aset_pbb.id')
						->leftJoin('ref_aset_hutang', 'mstspmb_asets.hutang', '=', 'ref_aset_hutang.id')
						->leftJoin('ref_aset_piutang', 'mstspmb_asets.piutang', '=', 'ref_aset_piutang.id')
						->leftJoin('ref_aset_tabungan', 'mstspmb_asets.tabungan', '=', 'ref_aset_tabungan.id')
						->select(
								'p1.nama_prodi as p1',
								'p2.nama_prodi as p2',
								'p3.nama_prodi as p3',
								'mstspmb_profils.no_ujian',
								'mstspmb_profils.gelombang',
								'mstspmb_profils.password',
								'mstspmb_profils.nama', 
								'mstspmb_profils.ruang', 
								'mstspmb_profils.tempat_lahir', 
								'mstspmb_profils.tanggal_lahir', 
								'ref_jenis_sekolah.keterangan AS jenis_sekolah',
								'ref_jurusan_sekolah.keterangan AS jurusan_sekolah',
								'pend1.keterangan AS ayah_pendidikan',
								'pek1.keterangan AS ayah_pekerjaan',
								'gaji1.keterangan AS ayah_penghasilan',
								'pend2.keterangan AS ibu_pendidikan',
								'pek2.keterangan AS ibu_pekerjaan',
								'gaji2.keterangan AS ibu_penghasilan',
								'kab1.nama_kab as kota',
								'kab2.nama_kab as ortu_kota',
								'ref_mengetahui_iain.keterangan as mengetahui_iain',
								'ref_aset_jenis_tinggal.keterangan AS jenis_tinggal',
								'ref_aset_luas_rumah.keterangan AS luas_rumah',
								'ref_aset_tanah.keterangan AS tanah',
								'ref_aset_njop.keterangan AS njop',
								'ref_aset_mck.keterangan AS mck',
								'ref_aset_daya_listrik.keterangan AS daya_listrik',
								'ref_aset_sumber_air.keterangan AS sumber_air',
								'ref_aset_iuran_pln.keterangan AS pln',
								'ref_aset_iuran_telp.keterangan AS telp',
								'ref_aset_kendaraan_sepeda.keterangan AS sepeda',
								'ref_aset_kendaraan_motor.keterangan AS motor',
								'ref_aset_kendaraan_mobil.keterangan AS mobil',
								'ref_aset_atap.keterangan AS atap',
								'ref_aset_lantai.keterangan AS lantai',
								'ref_aset_pbb.keterangan AS pbb',
								'ref_aset_hutang.keterangan AS hutang',
								'ref_aset_piutang.keterangan AS piutang',
								'ref_aset_tabungan.keterangan AS tabungan',
								'ref_aset_jenis_tinggal.skor AS skor_jenis_tinggal',
								'ref_aset_luas_rumah.skor AS skor_luas_rumah',
								'ref_aset_tanah.skor AS skor_tanah',
								'ref_aset_njop.skor AS skor_njop',
								'ref_aset_mck.skor AS skor_mck',
								'ref_aset_daya_listrik.skor AS skor_daya_listrik',
								'ref_aset_sumber_air.skor AS skor_sumber_air',
								'ref_aset_iuran_pln.skor AS skor_pln',
								'ref_aset_iuran_telp.skor AS skor_telp',
								'ref_aset_kendaraan_sepeda.skor AS skor_sepeda',
								'ref_aset_kendaraan_motor.skor AS skor_motor',
								'ref_aset_kendaraan_mobil.skor AS skor_mobil',
								'ref_aset_atap.skor AS skor_atap',
								'ref_aset_lantai.skor AS skor_lantai',
								'ref_aset_pbb.skor AS skor_pbb',
								'ref_aset_hutang.skor AS skor_hutang',
								'ref_aset_piutang.skor AS skor_piutang',
								'ref_aset_tabungan.skor AS skor_tabungan'
								)
						->where('mstspmb_profils.no_ujian',$no_ujian)
						->first();
			$aset =	DB::table('mstspmb_asets')
						->leftJoin('ref_aset_jenis_tinggal', 'mstspmb_asets.jenis_tinggal', '=', 'ref_aset_jenis_tinggal.id')
						->leftJoin('ref_aset_luas_rumah', 'mstspmb_asets.luas_rumah', '=', 'ref_aset_luas_rumah.id')
						->leftJoin('ref_aset_tanah', 'mstspmb_asets.luas_tanah', '=', 'ref_aset_tanah.id')
						->leftJoin('ref_aset_njop', 'mstspmb_asets.harga_jual', '=', 'ref_aset_njop.id')
						->leftJoin('ref_aset_mck', 'mstspmb_asets.mck', '=', 'ref_aset_mck.id')
						->leftJoin('ref_aset_daya_listrik', 'mstspmb_asets.daya_listrik', '=', 'ref_aset_daya_listrik.id')
						->leftJoin('ref_aset_sumber_air', 'mstspmb_asets.sumber_air', '=', 'ref_aset_sumber_air.id')
						->leftJoin('ref_aset_iuran_pln', 'mstspmb_asets.iuran_pln', '=', 'ref_aset_iuran_pln.id')
						->leftJoin('ref_aset_iuran_telp', 'mstspmb_asets.iuran_telp', '=', 'ref_aset_iuran_telp.id')
						->leftJoin('ref_aset_kendaraan_sepeda', 'mstspmb_asets.sepeda', '=', 'ref_aset_kendaraan_sepeda.id')
						->leftJoin('ref_aset_kendaraan_motor', 'mstspmb_asets.motor', '=', 'ref_aset_kendaraan_motor.id')
						->leftJoin('ref_aset_kendaraan_mobil', 'mstspmb_asets.mobil', '=', 'ref_aset_kendaraan_mobil.id')
						->leftJoin('ref_aset_atap', 'mstspmb_asets.atap', '=', 'ref_aset_atap.id')
						->leftJoin('ref_aset_lantai', 'mstspmb_asets.lantai', '=', 'ref_aset_lantai.id')
						->leftJoin('ref_aset_pbb', 'mstspmb_asets.pbb', '=', 'ref_aset_pbb.id')
						->leftJoin('ref_aset_hutang', 'mstspmb_asets.hutang', '=', 'ref_aset_hutang.id')
						->leftJoin('ref_aset_piutang', 'mstspmb_asets.piutang', '=', 'ref_aset_piutang.id')
						->leftJoin('ref_aset_tabungan', 'mstspmb_asets.tabungan', '=', 'ref_aset_tabungan.id')
						->select(
								'ref_aset_jenis_tinggal.keterangan AS jenis_tinggal',
								'ref_aset_luas_rumah.keterangan AS luas_rumah',
								'ref_aset_tanah.keterangan AS tanah',
								'ref_aset_njop.keterangan AS njop',
								'ref_aset_mck.keterangan AS mck',
								'ref_aset_daya_listrik.keterangan AS daya_listrik',
								'ref_aset_sumber_air.keterangan AS sumber_air',
								'ref_aset_iuran_pln.keterangan AS pln',
								'ref_aset_iuran_telp.keterangan AS telp',
								'ref_aset_kendaraan_sepeda.keterangan AS sepeda',
								'ref_aset_kendaraan_motor.keterangan AS motor',
								'ref_aset_kendaraan_mobil.keterangan AS mobil',
								'ref_aset_atap.keterangan AS atap',
								'ref_aset_lantai.keterangan AS lantai',
								'ref_aset_pbb.keterangan AS pbb',
								'ref_aset_hutang.keterangan AS hutang',
								'ref_aset_piutang.keterangan AS piutang',
								'ref_aset_tabungan.keterangan AS tabungan'
								)
						->where('mstspmb_asets.no_ujian',$no_ujian)
						->first();
			$rule=DB::table('mstspmb_rule')->select('*')->where('gelombang',$profil->gelombang)->first();
			//~ return PDF::view('cetak/kartu',compact('profil','rule'));
			//~ return PDF::writeHTML(view('cetak/kartu',compact('profil','rule'))->render());
			PDF::SetTitle($profil->nama.' ('.$profil->no_ujian.')');
			PDF::AddPage();
			PDF::writeHTML(view('cetak/formulir',compact('profil','rule','umum','aset')), true, false, false, false, '');
			PDF::Output("biodata_".$no_ujian.".pdf","I");
		}
		else
		{
			return false;
		}

	}
	public function cetak_kelas(Request $a,$_token,$gelombang,$halaman,$param)
	{
		$gelombang=session()->get('gelombang');
		$limit=20;
		$skip=$halaman;
		$offset=(($halaman)-1)*$limit;
		$data=DB::table('mstspmb_profils')
					->leftJoin('prodi as p1', 'mstspmb_profils.pilihan1', '=', 'p1.kode_prodi')
					->leftJoin('prodi as p2', 'mstspmb_profils.pilihan2', '=', 'p2.kode_prodi')
					->leftJoin('prodi as p3', 'mstspmb_profils.pilihan3', '=', 'p3.kode_prodi')
					->leftJoin('prodi as lulus', 'mstspmb_profils.lulus_prodi', '=', 'lulus.kode_prodi')
					->select(
							'p1.singkatan_prodi as p1',
							'p2.singkatan_prodi as p2',
							'p3.singkatan_prodi as p3',
							'lulus.singkatan_prodi as lulus',
							'mstspmb_profils.no_ujian', 
							'mstspmb_profils.nama', 
							'mstspmb_profils.ujian', 
							'mstspmb_profils.skor_ujian', 
							'mstspmb_profils.lulus_prodi', 
							'mstspmb_profils.pilihan1', 
							'mstspmb_profils.pilihan2', 
							'mstspmb_profils.pilihan3', 
							'mstspmb_profils.password' 
							)
					->orderBy('no_ujian')
					->where('gelombang',session()->get('gelombang'))->take($limit)->skip($offset)->get();
		if($param=='absensi')
		{
			PDF::AddPage('L');
			//~ PDF::SetMargins(10, 5, 5, 5, true);
			PDF::SetAutoPageBreak(TRUE, 0);
			PDF::setPrintFooter(false);
			PDF::SetFooterMargin(0);
			PDF::setPrintHeader(false);
			
			PDF::writeHTML(view('cetak/absensi',compact('data','skip')), true, false, false, false, '');
			PDF::Output("absensi.pdf","I");
		}	
		else if($param=='presensi')
		{
			PDF::AddPage('L');
			PDF::writeHTML(view('cetak/presensi',compact('data','skip')), true, false, false, false, '');
			PDF::Output("presensi.pdf","I");
		}
		else if($param=='ruangan')
		{
			PDF::AddPage();
			PDF::writeHTML(view('cetak/ruang',compact('data','skip')), true, false, false, false, '');
			PDF::Output("ruangan.pdf","I");
		}
	}
	public function cetak2(Request $request)
	{
		$halaman=$request->input('halaman');
		$param=$request->input('param');
		$gelombang=$request->input('gelombang');
		$gelombang=session()->get('gelombang');
		$limit=20;
		$skip=$halaman;
		$offset=(($halaman)-1)*$limit;
		$file=md5($param.date('Ymdhis'));
		$data=DB::table('mstspmb_profils')
					->leftJoin('prodi as p1', 'mstspmb_profils.pilihan1', '=', 'p1.kode_prodi')
					->leftJoin('prodi as p2', 'mstspmb_profils.pilihan2', '=', 'p2.kode_prodi')
					->leftJoin('prodi as p3', 'mstspmb_profils.pilihan3', '=', 'p3.kode_prodi')
					->leftJoin('prodi as lulus', 'mstspmb_profils.lulus_prodi', '=', 'lulus.kode_prodi')
					->select(
							'p1.singkatan_prodi as p1',
							'p2.singkatan_prodi as p2',
							'p3.singkatan_prodi as p3',
							'lulus.singkatan_prodi as lulus',
							'mstspmb_profils.no_ujian', 
							'mstspmb_profils.nama', 
							'mstspmb_profils.ujian', 
							'mstspmb_profils.skor_ujian', 
							'mstspmb_profils.lulus_prodi', 
							'mstspmb_profils.pilihan1', 
							'mstspmb_profils.pilihan2', 
							'mstspmb_profils.pilihan3', 
							'mstspmb_profils.password' 
							)
					->orderBy('no_ujian')
					->where('gelombang',session()->get('gelombang'))->take($limit)->skip($offset)->get();
		if($param=='absensi')
		{
			PDF::AddPage('L');
			//~ PDF::SetMargins(10, 5, 5, 5, true);
			PDF::SetAutoPageBreak(TRUE, 0);
			PDF::setPrintFooter(false);
			PDF::SetFooterMargin(0);
			PDF::setPrintHeader(false);
			PDF::writeHTML(view('cetak/absensi',compact('data','skip')), true, false, false, false, '');
			PDF::Output($_SERVER['DOCUMENT_ROOT']."spmb/public/download/".$file.".pdf","F");
			echo $file;
		}	
		else if($param=='presensi')
		{
			PDF::AddPage('L');
			PDF::writeHTML(view('cetak/presensi',compact('data','skip')), true, false, false, false, '');
			PDF::Output($_SERVER['DOCUMENT_ROOT']."spmb/public/download/".$file.".pdf","F");
			echo $file;
		}
		else if($param=='ruangan')
		{
			PDF::AddPage();
			PDF::writeHTML(view('cetak/ruang',compact('data','skip')), true, false, false, false, '');
			PDF::Output($_SERVER['DOCUMENT_ROOT']."spmb/public/download/".$file.".pdf","F");
			echo $file;
		}
		else
		{
			return false;
		}
	}
	public function ekspor_excel(Request $request)
	{
		$gelombang=session()->get('gelombang');
		$rule=DB::table('mstspmb_rule')->select('*')->where('gelombang',$gelombang)->get();
		$data = Mstspmb_profil::where('gelombang', $gelombang)
					->select(
					'mstspmb_profils.no_ujian',
					'mstspmb_profils.nama',
					'mstspmb_profils.tempat_lahir',
					'mstspmb_profils.tanggal_lahir',
					'mstspmb_profils.jender',
					'mstspmb_profils.hp',
					'mstspmb_profils.ruang',
					'p1.singkatan_prodi AS P1',
					'p2.singkatan_prodi AS P2',
					'p3.singkatan_prodi AS P3',
					'ref_aset_jenis_tinggal.keterangan AS jenis_tinggal',
					'ref_aset_luas_rumah.keterangan AS luas_rumah',
					'ref_aset_tanah.keterangan AS tanah',
					'ref_aset_njop.keterangan AS njop',
					'ref_aset_mck.keterangan AS mck',
					'ref_aset_daya_listrik.keterangan AS daya_listrik',
					'ref_aset_sumber_air.keterangan AS sumber_air',
					'ref_aset_iuran_pln.keterangan AS pln',
					'ref_aset_iuran_telp.keterangan AS telp',
					'ref_aset_kendaraan_sepeda.keterangan AS sepeda',
					'ref_aset_kendaraan_motor.keterangan AS motor',
					'ref_aset_kendaraan_mobil.keterangan AS mobil',
					'ref_aset_atap.keterangan AS atap',
					'ref_aset_lantai.keterangan AS lantai',
					'ref_aset_pbb.keterangan AS pbb',
					'ref_aset_hutang.keterangan AS hutang',
					'ref_aset_piutang.keterangan AS piutang',
					'ref_aset_tabungan.keterangan AS tabungan',
					'ref_aset_jenis_tinggal.skor AS skor_jenis_tinggal',
					'ref_aset_luas_rumah.skor AS skor_luas_rumah',
					'ref_aset_tanah.skor AS skor_tanah',
					'ref_aset_njop.skor AS skor_njop',
					'ref_aset_mck.skor AS skor_mck',
					'ref_aset_daya_listrik.skor AS skor_daya_listrik',
					'ref_aset_sumber_air.skor AS skor_sumber_air',
					'ref_aset_iuran_pln.skor AS skor_pln',
					'ref_aset_iuran_telp.skor AS skor_telp',
					'ref_aset_kendaraan_sepeda.skor AS skor_sepeda',
					'ref_aset_kendaraan_motor.skor AS skor_motor',
					'ref_aset_kendaraan_mobil.skor AS skor_mobil',
					'ref_aset_atap.skor AS skor_atap',
					'ref_aset_lantai.skor AS skor_lantai',
					'ref_aset_pbb.skor AS skor_pbb',
					'ref_aset_hutang.skor AS skor_hutang',
					'ref_aset_piutang.skor AS skor_piutang',
					'ref_aset_tabungan.skor AS skor_tabungan'
					)
					->leftJoin('prodi as p1', 'mstspmb_profils.pilihan1', '=', 'p1.kode_prodi')
					->leftJoin('prodi as p2', 'mstspmb_profils.pilihan2', '=', 'p2.kode_prodi')
					->leftJoin('prodi as p3', 'mstspmb_profils.pilihan3', '=', 'p3.kode_prodi')
					->leftJoin('mstspmb_asets', 'mstspmb_profils.no_ujian', '=', 'mstspmb_asets.no_ujian')
					->leftJoin('ref_aset_jenis_tinggal', 'mstspmb_asets.jenis_tinggal', '=', 'ref_aset_jenis_tinggal.id')
					->leftJoin('ref_aset_luas_rumah', 'mstspmb_asets.luas_rumah', '=', 'ref_aset_luas_rumah.id')
					->leftJoin('ref_aset_tanah', 'mstspmb_asets.luas_tanah', '=', 'ref_aset_tanah.id')
					->leftJoin('ref_aset_njop', 'mstspmb_asets.harga_jual', '=', 'ref_aset_njop.id')
					->leftJoin('ref_aset_mck', 'mstspmb_asets.mck', '=', 'ref_aset_mck.id')
					->leftJoin('ref_aset_daya_listrik', 'mstspmb_asets.daya_listrik', '=', 'ref_aset_daya_listrik.id')
					->leftJoin('ref_aset_sumber_air', 'mstspmb_asets.sumber_air', '=', 'ref_aset_sumber_air.id')
					->leftJoin('ref_aset_iuran_pln', 'mstspmb_asets.iuran_pln', '=', 'ref_aset_iuran_pln.id')
					->leftJoin('ref_aset_iuran_telp', 'mstspmb_asets.iuran_telp', '=', 'ref_aset_iuran_telp.id')
					->leftJoin('ref_aset_kendaraan_sepeda', 'mstspmb_asets.sepeda', '=', 'ref_aset_kendaraan_sepeda.id')
					->leftJoin('ref_aset_kendaraan_motor', 'mstspmb_asets.motor', '=', 'ref_aset_kendaraan_motor.id')
					->leftJoin('ref_aset_kendaraan_mobil', 'mstspmb_asets.mobil', '=', 'ref_aset_kendaraan_mobil.id')
					->leftJoin('ref_aset_atap', 'mstspmb_asets.atap', '=', 'ref_aset_atap.id')
					->leftJoin('ref_aset_lantai', 'mstspmb_asets.lantai', '=', 'ref_aset_lantai.id')
					->leftJoin('ref_aset_pbb', 'mstspmb_asets.pbb', '=', 'ref_aset_pbb.id')
					->leftJoin('ref_aset_hutang', 'mstspmb_asets.hutang', '=', 'ref_aset_hutang.id')
					->leftJoin('ref_aset_piutang', 'mstspmb_asets.piutang', '=', 'ref_aset_piutang.id')
					->leftJoin('ref_aset_tabungan', 'mstspmb_asets.tabungan', '=', 'ref_aset_tabungan.id')
					->orderBy('mstspmb_profils.nama', 'asc')
					->take(1000)
					->get();
		Excel::create('SPMB'.$rule[0]->tahun, function($excel) use($data,$gelombang) {
		$excel->sheet($gelombang, function($sheet) use($data,$gelombang) {
			$sheet->with($data);
			});
		})->export('xls');		
	}
	public function cetak_biodata(Request $request)
	{
		$no_ujian=$request->input('no_ujian');
		$profil = Mstspmb_profil::where(['no_ujian'=>$no_ujian])->first();
		$umum =	DB::table('mstspmb_profils')
					->leftJoin('prodi as p1', 'mstspmb_profils.pilihan1', '=', 'p1.kode_prodi')
					->leftJoin('prodi as p2', 'mstspmb_profils.pilihan2', '=', 'p2.kode_prodi')
					->leftJoin('prodi as p3', 'mstspmb_profils.pilihan3', '=', 'p3.kode_prodi')
					->leftJoin('ref_jenis_sekolah', 'mstspmb_profils.jenis_sekolah', '=', 'ref_jenis_sekolah.kode')
					->leftJoin('ref_jurusan_sekolah', 'mstspmb_profils.jurusan', '=', 'ref_jurusan_sekolah.kode')
					->leftJoin('ref_kabupatenkota as kab1', 'mstspmb_profils.kota', '=', 'kab1.indeks')
					->leftJoin('ref_pendidikan as pend1', 'mstspmb_profils.ayah_pendidikan', '=', 'pend1.kode')
					->leftJoin('ref_pekerjaan as pek1', 'mstspmb_profils.ayah_pekerjaan', '=', 'pek1.kode')
					->leftJoin('ref_gaji as gaji1', 'mstspmb_profils.ayah_penghasilan', '=', 'gaji1.kode')
					->leftJoin('ref_pendidikan as pend2', 'mstspmb_profils.ibu_pendidikan', '=', 'pend2.kode')
					->leftJoin('ref_pekerjaan as pek2', 'mstspmb_profils.ibu_pekerjaan', '=', 'pek2.kode')
					->leftJoin('ref_gaji as gaji2', 'mstspmb_profils.ibu_penghasilan', '=', 'gaji2.kode')
					->leftJoin('ref_kabupatenkota as kab2', 'mstspmb_profils.ortu_kota', '=', 'kab2.indeks')
					->leftJoin('ref_mengetahui_iain', 'mstspmb_profils.mengetahui_iain', '=', 'ref_mengetahui_iain.kode')
					->leftJoin('mstspmb_asets', 'mstspmb_profils.no_ujian', '=', 'mstspmb_asets.no_ujian')
					->leftJoin('ref_aset_jenis_tinggal', 'mstspmb_asets.jenis_tinggal', '=', 'ref_aset_jenis_tinggal.id')
					->leftJoin('ref_aset_luas_rumah', 'mstspmb_asets.luas_rumah', '=', 'ref_aset_luas_rumah.id')
					->leftJoin('ref_aset_tanah', 'mstspmb_asets.luas_tanah', '=', 'ref_aset_tanah.id')
					->leftJoin('ref_aset_njop', 'mstspmb_asets.harga_jual', '=', 'ref_aset_njop.id')
					->leftJoin('ref_aset_mck', 'mstspmb_asets.mck', '=', 'ref_aset_mck.id')
					->leftJoin('ref_aset_daya_listrik', 'mstspmb_asets.daya_listrik', '=', 'ref_aset_daya_listrik.id')
					->leftJoin('ref_aset_sumber_air', 'mstspmb_asets.sumber_air', '=', 'ref_aset_sumber_air.id')
					->leftJoin('ref_aset_iuran_pln', 'mstspmb_asets.iuran_pln', '=', 'ref_aset_iuran_pln.id')
					->leftJoin('ref_aset_iuran_telp', 'mstspmb_asets.iuran_telp', '=', 'ref_aset_iuran_telp.id')
					->leftJoin('ref_aset_kendaraan_sepeda', 'mstspmb_asets.sepeda', '=', 'ref_aset_kendaraan_sepeda.id')
					->leftJoin('ref_aset_kendaraan_motor', 'mstspmb_asets.motor', '=', 'ref_aset_kendaraan_motor.id')
					->leftJoin('ref_aset_kendaraan_mobil', 'mstspmb_asets.mobil', '=', 'ref_aset_kendaraan_mobil.id')
					->leftJoin('ref_aset_atap', 'mstspmb_asets.atap', '=', 'ref_aset_atap.id')
					->leftJoin('ref_aset_lantai', 'mstspmb_asets.lantai', '=', 'ref_aset_lantai.id')
					->leftJoin('ref_aset_pbb', 'mstspmb_asets.pbb', '=', 'ref_aset_pbb.id')
					->leftJoin('ref_aset_hutang', 'mstspmb_asets.hutang', '=', 'ref_aset_hutang.id')
					->leftJoin('ref_aset_piutang', 'mstspmb_asets.piutang', '=', 'ref_aset_piutang.id')
					->leftJoin('ref_aset_tabungan', 'mstspmb_asets.tabungan', '=', 'ref_aset_tabungan.id')
					->select(
							'p1.nama_prodi as p1',
							'p2.nama_prodi as p2',
							'p3.nama_prodi as p3',
							'mstspmb_profils.no_ujian',
							'mstspmb_profils.gelombang',
							'mstspmb_profils.password',
							'mstspmb_profils.nama', 
							'mstspmb_profils.ruang', 
							'mstspmb_profils.tempat_lahir', 
							'mstspmb_profils.tanggal_lahir', 
							'ref_jenis_sekolah.keterangan AS jenis_sekolah',
							'ref_jurusan_sekolah.keterangan AS jurusan_sekolah',
							'pend1.keterangan AS ayah_pendidikan',
							'pek1.keterangan AS ayah_pekerjaan',
							'gaji1.keterangan AS ayah_penghasilan',
							'pend2.keterangan AS ibu_pendidikan',
							'pek2.keterangan AS ibu_pekerjaan',
							'gaji2.keterangan AS ibu_penghasilan',
							'kab1.nama_kab as kota',
							'kab2.nama_kab as ortu_kota',
							'ref_mengetahui_iain.keterangan as mengetahui_iain',
							'ref_aset_jenis_tinggal.keterangan AS jenis_tinggal',
							'ref_aset_luas_rumah.keterangan AS luas_rumah',
							'ref_aset_tanah.keterangan AS tanah',
							'ref_aset_njop.keterangan AS njop',
							'ref_aset_mck.keterangan AS mck',
							'ref_aset_daya_listrik.keterangan AS daya_listrik',
							'ref_aset_sumber_air.keterangan AS sumber_air',
							'ref_aset_iuran_pln.keterangan AS pln',
							'ref_aset_iuran_telp.keterangan AS telp',
							'ref_aset_kendaraan_sepeda.keterangan AS sepeda',
							'ref_aset_kendaraan_motor.keterangan AS motor',
							'ref_aset_kendaraan_mobil.keterangan AS mobil',
							'ref_aset_atap.keterangan AS atap',
							'ref_aset_lantai.keterangan AS lantai',
							'ref_aset_pbb.keterangan AS pbb',
							'ref_aset_hutang.keterangan AS hutang',
							'ref_aset_piutang.keterangan AS piutang',
							'ref_aset_tabungan.keterangan AS tabungan',
							'ref_aset_jenis_tinggal.skor AS skor_jenis_tinggal',
							'ref_aset_luas_rumah.skor AS skor_luas_rumah',
							'ref_aset_tanah.skor AS skor_tanah',
							'ref_aset_njop.skor AS skor_njop',
							'ref_aset_mck.skor AS skor_mck',
							'ref_aset_daya_listrik.skor AS skor_daya_listrik',
							'ref_aset_sumber_air.skor AS skor_sumber_air',
							'ref_aset_iuran_pln.skor AS skor_pln',
							'ref_aset_iuran_telp.skor AS skor_telp',
							'ref_aset_kendaraan_sepeda.skor AS skor_sepeda',
							'ref_aset_kendaraan_motor.skor AS skor_motor',
							'ref_aset_kendaraan_mobil.skor AS skor_mobil',
							'ref_aset_atap.skor AS skor_atap',
							'ref_aset_lantai.skor AS skor_lantai',
							'ref_aset_pbb.skor AS skor_pbb',
							'ref_aset_hutang.skor AS skor_hutang',
							'ref_aset_piutang.skor AS skor_piutang',
							'ref_aset_tabungan.skor AS skor_tabungan'
							)
					->where('mstspmb_profils.no_ujian',$no_ujian)
					->first();
		$aset =	DB::table('mstspmb_asets')
					->leftJoin('ref_aset_jenis_tinggal', 'mstspmb_asets.jenis_tinggal', '=', 'ref_aset_jenis_tinggal.id')
					->leftJoin('ref_aset_luas_rumah', 'mstspmb_asets.luas_rumah', '=', 'ref_aset_luas_rumah.id')
					->leftJoin('ref_aset_tanah', 'mstspmb_asets.luas_tanah', '=', 'ref_aset_tanah.id')
					->leftJoin('ref_aset_njop', 'mstspmb_asets.harga_jual', '=', 'ref_aset_njop.id')
					->leftJoin('ref_aset_mck', 'mstspmb_asets.mck', '=', 'ref_aset_mck.id')
					->leftJoin('ref_aset_daya_listrik', 'mstspmb_asets.daya_listrik', '=', 'ref_aset_daya_listrik.id')
					->leftJoin('ref_aset_sumber_air', 'mstspmb_asets.sumber_air', '=', 'ref_aset_sumber_air.id')
					->leftJoin('ref_aset_iuran_pln', 'mstspmb_asets.iuran_pln', '=', 'ref_aset_iuran_pln.id')
					->leftJoin('ref_aset_iuran_telp', 'mstspmb_asets.iuran_telp', '=', 'ref_aset_iuran_telp.id')
					->leftJoin('ref_aset_kendaraan_sepeda', 'mstspmb_asets.sepeda', '=', 'ref_aset_kendaraan_sepeda.id')
					->leftJoin('ref_aset_kendaraan_motor', 'mstspmb_asets.motor', '=', 'ref_aset_kendaraan_motor.id')
					->leftJoin('ref_aset_kendaraan_mobil', 'mstspmb_asets.mobil', '=', 'ref_aset_kendaraan_mobil.id')
					->leftJoin('ref_aset_atap', 'mstspmb_asets.atap', '=', 'ref_aset_atap.id')
					->leftJoin('ref_aset_lantai', 'mstspmb_asets.lantai', '=', 'ref_aset_lantai.id')
					->leftJoin('ref_aset_pbb', 'mstspmb_asets.pbb', '=', 'ref_aset_pbb.id')
					->leftJoin('ref_aset_hutang', 'mstspmb_asets.hutang', '=', 'ref_aset_hutang.id')
					->leftJoin('ref_aset_piutang', 'mstspmb_asets.piutang', '=', 'ref_aset_piutang.id')
					->leftJoin('ref_aset_tabungan', 'mstspmb_asets.tabungan', '=', 'ref_aset_tabungan.id')
					->select(
							'ref_aset_jenis_tinggal.keterangan AS jenis_tinggal',
							'ref_aset_luas_rumah.keterangan AS luas_rumah',
							'ref_aset_tanah.keterangan AS tanah',
							'ref_aset_njop.keterangan AS njop',
							'ref_aset_mck.keterangan AS mck',
							'ref_aset_daya_listrik.keterangan AS daya_listrik',
							'ref_aset_sumber_air.keterangan AS sumber_air',
							'ref_aset_iuran_pln.keterangan AS pln',
							'ref_aset_iuran_telp.keterangan AS telp',
							'ref_aset_kendaraan_sepeda.keterangan AS sepeda',
							'ref_aset_kendaraan_motor.keterangan AS motor',
							'ref_aset_kendaraan_mobil.keterangan AS mobil',
							'ref_aset_atap.keterangan AS atap',
							'ref_aset_lantai.keterangan AS lantai',
							'ref_aset_pbb.keterangan AS pbb',
							'ref_aset_hutang.keterangan AS hutang',
							'ref_aset_piutang.keterangan AS piutang',
							'ref_aset_tabungan.keterangan AS tabungan'
							)
					->where('mstspmb_asets.no_ujian',$no_ujian)
					->first();
		$rule=DB::table('mstspmb_rule')->select('*')->where('gelombang',$profil->gelombang)->first();
		//~ return PDF::view('cetak/kartu',compact('profil','rule'));
		//~ return PDF::writeHTML(view('cetak/kartu',compact('profil','rule'))->render());
		PDF::SetTitle($profil->nama.' ('.$profil->no_ujian.')');
		PDF::AddPage();
		PDF::writeHTML(view('cetak/formulir',compact('profil','rule','umum','aset')), true, false, false, false, '');
		PDF::Output("kartu.pdf","I");

	}
}
