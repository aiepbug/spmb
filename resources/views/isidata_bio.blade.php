@extends('isidata')
@section('konten')
<?php $saudara=array(1,2,3,4,5,6,7,8,9,10); ?>
<hr />
        <link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="asset/css/datepicker.css" rel="stylesheet" type="text/css">
        <link href="asset/css/jquery-ui.css" rel="stylesheet" type="text/css">
        <link href="asset/css/select2.css" rel="stylesheet" type="text/css">
        <link href="asset/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <style>
			img{margin-bottom:10px}
        </style>
<div id="isi">
		<div class="form-horizontal">
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label"></label>
			<div class="col-sm-10">
				<a href="javascript:void(0)"><img src="asset/img/biodata.png" width="180"/></a>
				<a href="javascript:void(0)"><img src="asset/img/sekolah_.png" width="180"/></a>
				<a href="javascript:void(0)"><img src="asset/img/orangtua_.png" width="180"/></a>
				<a href="javascript:void(0)"><img src="asset/img/aset_.png" width="180"/></a>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Nomor ujian</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" readonly id="no_ujian" value="{{ $data->no_ujian }}">
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Nama lengkap</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="nama" placeholder="Sesuai ijazah" value="{{ $data->nama }}">
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Tempat lahir</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" data-trigger="focus" data-placement="top" data-content="Tidak boleh kosong" id="tempat_lahir" placeholder="Sesuai ijazah" value="{{ $data->tempat_lahir }}">
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Tanggal lahir</label>
			<div class="col-sm-10">
			  <input class="form-control" data-trigger="focus" data-placement="top" data-content="Tidak boleh kosong" id="tanggal_lahir" required placeholder="dd-mm-yyyy" value="{{ date('d-m-Y',strtotime($data->tanggal_lahir)) }}">
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Jenis kelamin</label>
			<div class="col-sm-10">
			  <input type="radio" id="jender" name="jender" value="0" checked> Perempuan
			  <input type="radio" id="jender" name="jender" value="1" @if($data->jender=='1') checked @endif > Laki-laki
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Alamat </label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" data-trigger="focus" data-placement="top" data-content="Tidak boleh kosong" id="alamat" placeholder="Alamat tinggal di Palu atau sekitarnya" value="{{ $data->alamat }}">
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Nomor Identitas</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" data-trigger="focus" data-placement="top" data-content="Tidak boleh kosong" id="ktp" placeholder="KTP Sendiri/KTP Ibu/KTP Ayah" value="{{ $data->ktp }}">
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Status nikah</label>
			<div class="col-sm-10">
			  <input type="radio" id="nikah" name="nikah" value="0" checked> Belum menikah
			  <input type="radio" id="nikah" name="nikah" value="1" @if($data->nikah=='1') checked @endif > Menikah
			  <input type="radio" id="nikah" name="nikah" value="2" @if($data->nikah=='2') checked @endif > Duda/janda
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Jumlah saudara</label>
			<div class="col-sm-10">
				<select style="width:100px" id="jumlah_saudara" class="form-control">
					@foreach($saudara as $s)
						<option value="{{ $s }}" @if($data->jumlah_saudara==$s) selected @endif >{{ $s }}</option>
					@endforeach
					<option value="0">Tidak ada</option>
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Anak ke-</label>
			<div class="col-sm-10">
				<select style="width:100px" id="anak_ke" class="form-control">
					@foreach($saudara as $s)
						<option value="{{ $s }}" @if($data->anak_ke==$s) selected @endif >{{ $s }}</option>
					@endforeach
				</select>
			</div>
		  </div>
	<!--
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Jurusan Pilihan I/II/III</label>
			<div class="col-sm-3">
				<select id="pilihan1" class="col-sm-3 form-control">
					@foreach ($prodi as $pro)
						<option value="{{ $pro->kode_prodi }}">{{ $pro->nama_prodi }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-sm-3">
				<select id="pilihan2" class="col-sm-3 form-control">
					@foreach ($prodi as $pro)
						<option value="{{ $pro->kode_prodi }}">{{ $pro->nama_prodi }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-sm-3">
				<select id="pilihan3" class="col-sm-3 form-control">
					@foreach ($prodi as $pro)
						<option value="{{ $pro->kode_prodi }}">{{ $pro->nama_prodi }}</option>
					@endforeach
				</select>
			</div>
		  </div>
	-->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Asal Kabupaten</label>
			<div class="col-md-10">
				<select style="width:300px;" id="kota" class="">
					@foreach ($kota as $k)
						<option value="{{ $k->indeks }}">{{ $k->nama_kab }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Kebangsaan</label>
			<div class="col-md-10">
				<select style="width:300px;" id="bangsa" class="">
					@foreach ($bangsa as $b)
						<option value="{{ $b->kode }}">{{ $b->bangsa }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Handphone</label>
			<div class="col-sm-10">
			  <input data-trigger="focus" data-placement="top" data-content="Tidak boleh kosong" type="text" class="form-control" id="hp" placeholder="Nomor HP" value="{{ $data->hp }}">
			</div>
		  </div>
		<div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Mengetahui IAIN dari</label>
			<div class="col-md-10">
				<select style="width:300px;" id="mengetahui_iain" class="form-control">
					@foreach($mengetahui_iain as $m)
						<option value="{{ $m->kode }}" @if($data->mengetahui_iain==$m->kode) selected @endif> {{ $m->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <a href="javascript:void(0)" onclick="simpan_biodata()" type="submit" class="btn btn-primary">Selanjutnya &rarr;</a>
			</div>
		  </div>
		</div>
</div>
	<hr />
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/bootstrap.js"></script>
<script src="asset/js/jquery-ui.js"></script>
<script src="asset/js/select2.js"></script>
<script>
var kota="{{ $data->kota }}";
if(kota=='')
{
	$("#kota").select2().select2('val','1');
}
else
{
	$("#kota").select2().select2('val','{{ $data->kota }}');
}
var wni="{{ $data->kota }}";
if(kota=='')
{
	$("#kota").select2().select2('val','1');
}
else
{
	$("#kota").select2().select2('val','{{ $data->kota }}');
}
var tanggal_lahir="{{ $data->tanggal_lahir }}";
if(tanggal_lahir != '0000-00-00' || tanggal_lahir == null)
{
	$('#tanggal_lahir').val("{{ date('d-m-Y',strtotime($data->tanggal_lahir)) }}");
} 
else 
{
	$('#tanggal_lahir').val("{{ date('d-m-Y') }}");
}
function simpan_biodata()
{

	var nama=$("#nama").val(),tempat_lahir=$("#tempat_lahir").val(),tanggal_lahir=$("#tanggal_lahir").val(),
		jumlah_saudara=$("#jumlah_saudara").val(),anak_ke=$("#anak_ke").val(),alamat=$("#alamat").val(),
		kota=$("#kota").val(),bangsa=$("#bangsa").val(),hp=$("#hp").val(),mengetahui_iain=$("#mengetahui_iain").val(),
		ktp=$("#ktp").val();
	var jender = $('input[name=jender]:checked').val();
	var nikah = $('input[name=nikah]:checked').val();
	if(nama.length < 3){$("#nama").focus();$("#nama").popover('show');return false;}
	else if(tempat_lahir.length < 3){$("#tempat_lahir").focus();$("#tempat_lahir").popover('show');return false;}
	else if(tanggal_lahir.length < 3){$("#tanggal_lahir").focus();$("#tanggal_lahir").popover('show');return false;}
	else if(alamat.length < 3){$("#alamat").focus();$("#alamat").popover('show');return false;}
	else if(ktp.length < 3){$("#ktp").focus();$("#ktp").popover('show');return false;}
	else if(hp.length < 3){$("#hp").focus();$("#hp").popover('show');return false;}
	else
	{
		var token="{{ csrf_token() }}";
		$.ajax({
		url      : "maba/simpan_bio",
		data     : ({ _token:token,tempat_lahir:tempat_lahir,tanggal_lahir:tanggal_lahir,jender:jender,
						nikah:nikah,kota:kota,wni:bangsa,hp:hp,jumlah_saudara:jumlah_saudara,anak_ke:anak_ke,
						mengetahui_iain:mengetahui_iain,alamat:alamat,nama:nama,ktp:ktp			
			 }),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#isi').html(respon);
			},
		})	
	}
}
</script>
@stop
