@extends('admin')
@section('konten')
<?php 
function gel($x,$y)
{
	if($x==$y)
	{
		return ' checked ';
	}
}
function gels($x,$y)
{
	if($x==$y)
	{
		return ' active ';
	}
}
?>
<style>
.garis {
    text-decoration: underline;
}
</style>
<div>
	<IFRAME id="hidden-form" style="display:none" name="hidden-form"></IFRAME>

	<hr />
	<h4>Admin</h4>
	<form action="ekspor_excel" method="post" target="hidden-form">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<a onclick="tambah_peserta()" data-target="#modal" data-toggle="modal" class="btn btn-primary" href="javascript:void(0)" > Tambah <i class="fa fa-plus"></i></a>
		<button class="btn btn-success" type="submit"><i class="fa fa-download"></i> <i class="fa fa-file-excel-o"></i></button>
		<span class="dropdown">
			<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<i class="fa fa-print"></i> Cetak
			<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><a onclick="cetak2('absensi')" href="#">Absen</a></li>
				<li><a onclick="cetak2('presensi')" href="#">Presensi</a></li>
				<li><a onclick="cetak2('ruangan')" href="#">Daftar ruangan</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="#">Lainnya</a></li>
			</ul>
		</span>
		<span id="info" class=""></span>
		<div id="pilihan_gelombang" class="btn-group pull-right" data-toggle="buttons">
			@foreach($rule as $r)
				<label class="{{ gels($r->gelombang,session('gelombang')) }} btn btn-default">
					<input {{ gel($r->gelombang,session('gelombang')) }} type="radio" name="gelombang" id="gelombang" autocomplete="off" value="{{ $r->gelombang }}"> {{ $r->deskripsi }}
				</label>
			@endforeach
		</div>
	</form>
	<div>
		<input type="text" style="width:26.5%" class="pull-right form-control" placeholder="Cari..." id="cari">
	</div>
	<br> 
	<br> 
		<div id="tabel" >
		</div>
</div>
<div id="cetak"></div>
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/bootstrap.js"></script>
<script>
$(document).ready(function(){
	var gelombang="{{ session('gelombang') }}";
	var token="{{ csrf_token() }}";
			$.ajax({
				url      : "admins",
				data     : ({ _token:token,gelombang:gelombang }),
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){
						$('#tabel').html(respon);
						},
			})	
})
$("#cari").keypress(function(e) {
    if(e.which == 13) {
			var gelombang="{{ session('gelombang') }}";
        	var token="{{ csrf_token() }}";
        	var kata=$("#cari").val();
			$.ajax({
				url      : "cari",
				data     : ({ _token:token,gelombang:gelombang,kata:kata }),
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){
						$('#tabel').html(respon);
						},
			})
    }
});
function cari()
{
	var gelombang="{{ session('gelombang') }}";
	var token="{{ csrf_token() }}";
	var kata=$("#cari").val();
	$.ajax({
		url      : "cari",
		data     : ({ _token:token,gelombang:gelombang,kata:kata }),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
				$('#tabel').html(respon);
				},
	})
}
function cetak(param)
{
	var halaman=$("#halaman").val();
	var gelombang="{{ session('gelombang') }}";
	var _token="{{ csrf_token() }}";
	
	window.open('cetak_kelas/'+_token+'/'+gelombang+'/'+halaman+'/'+param,'','width=800,height=600');
}
function cetak2(param)
{
	$('#info').html('');
	var halaman=$("#halaman").val();
	var gelombang="{{ session('gelombang') }}";
	var token="{{ csrf_token() }}";
	
	$.ajax({
		url      : "cetak2",
		data     : ({ _token:token,gelombang:gelombang,halaman:halaman,param:param }),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
				if(param=="absensi")
				{
					$('#info').html('Sukses download absensi ruangan '+halaman+' <a class="garis" target="_blank" href="download/'+respon+'.pdf" download="absensi_ruang_'+halaman+'">klik disini</a>');
				}
				else if(param=="presensi")
				{
					$('#info').html('Sukses download presensi ruangan '+halaman+' <a class="garis" target="_blank" href="download/'+respon+'.pdf" download="presensi_ruang_'+halaman+'">klik disini</a>');
				}
				else if(param=="ruangan")
				{
					$('#info').html('Sukses download label ruangan '+halaman+' <a class="garis" target="_blank" href="download/'+respon+'.pdf" download="label_ruangan_'+halaman+'">klik disini</a>');
				}
				else
				{
					return false;
				}
					
			},
	})
}
</script>
@stop
