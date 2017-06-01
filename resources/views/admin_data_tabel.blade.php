<?php
function stt($s,$u)
{
	if(count($s))
	{
		return '<button onclick=download("'.$u.'","biodata") type="submit" title="Cetak biodata" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> OK</button>';
	}
	else
	{
		return '<button onclick=download("'.$u.'","biodata") type="submit" title="Cetak biodata" class="btn btn-danger btn-xs"><i class="fa fa-user"></i> Belum</button>';
	}
} 
?>
<input type="hidden" id="halaman" value="{{ $skip }}">
<table class="table table-condensed table-bordered">
<tr class="tengah"><th width="5%">No</th><th width="19%">No Ujian</th><th width="12%">Password</th>
					<th width="30%">(s) Nama</th><th width="4%" colspan="2">Biodata / Foto</th><th width="10%">Cetak</th>
					<th width="10%">Ujian</th><th width="10%">Lulus</th></tr>
	@foreach($data as $m)
	<?php $stt=App\Mstspmb_aset::where('no_ujian',$m->no_ujian)->first()?>
		<tr>
			<td class="tengah">{{ ($nomor++)+(($skip-1)*$limit) }}</td>
			<td class="tengah">{{ strtoupper($m->gelombang) }} - {{ $m->no_ujian }}
				<small><a href="javascript:void(0)" onclick="edit_peserta('{{ $m->no_ujian }}')" data-target="#modal" data-toggle="modal">edit</a></small></td>
			<td class="tengah"><small class="text-muted">{{ $m->password }}</small></td>
			<td><small class="text-muted">({{ 
				$m->skor_jenis_tinggal+
				$m->skor_luas_rumah+
				$m->skor_tanah+
				$m->skor_njop+
				$m->skor_mck+
				$m->skor_daya_listrik+
				$m->skor_sumber_air+
				$m->skor_pln+
				$m->skor_telp+
				$m->skor_sepeda+
				$m->skor_motor+
				$m->skor_mobil+
				$m->skor_atap+
				$m->skor_lantai+
				$m->skor_pbb+
				$m->skor_hutang+
				$m->skor_piutang+
				$m->skor_tabungan
				 }})</small> {{ strtoupper($m->nama) }}</td>
			<td class="tengah">
<!--
				<form action="cetak_biodata" method="post" target="hideform">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="no_ujian" value="{{ $m->no_ujian }}">
				{!! stt($stt,$m->no_ujian) !!}
				</form>
-->
				{!! stt($stt,$m->no_ujian) !!}
			</td>
			<td class="tengah_gambar">
				<div class="tbl_upload_foto"><input onchange="upload_foto({{ $m->no_ujian }})" class="form-control" id="foto{{ $m->no_ujian }}" type="file" /></div>
			</td>
			<td class="tengah">
				<button onclick="download({{ $m->no_ujian }},'kartu_ujian')" class="btn btn-primary btn-xs"><i class="fa fa-credit-card"></i></button>
<!--
				<form action="cetak_kartu" method="post" target="hideform">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="no_ujian" value="{{ $m->no_ujian }}">
					<button onclick="showhiddenform()" class="btn btn-primary btn-xs" type="submit"><i class="fa fa-credit-card"></i></button>
				</form>
-->
			</td>
			<td class="tengah"><a href="javascript:void(0)" onclick="aktif_ujian({{ $m->no_ujian }})">@if($m->ujian==1) <i class="fa fa-lg fa-check-square-o"></i> @elseif($m->ujian==2) <span class="badge">{{ ($m->skor_ujian/$rule->jumlah_soal)*100 }}%</span> @else <i class="fa fa-lg fa-square-o"></i> @endif</a></td>
			<td class="tengah">
				<select onchange="simpan_lulus('{{ $m->no_ujian }}',this.value)" 
					@if($m->ujian!=2) disabled @endif
					class="form-control" id="lulus">
						<option></option>
						@if(!empty($m->lulus_prodi)) 
							<option selected value="{{ $m->lulus_prodi }}">{{ $m->lulus }}</option>
						@endif
						<option value="{{ $m->pilihan1 }}">1 : {{ $m->p1 }}</option>
						<option value="{{ $m->pilihan2 }}">2 : {{ $m->p2 }}</option>
						<option value="{{ $m->pilihan3 }}">3 : {{ $m->p3 }}</option>
						<option value="0">Gagal</option>
				</select></td>
		</tr>
@endforeach
</table>
<nav>
  <ul class="pagination">
    @for($i=1;$i<=$page;$i++)
		<li @if($i==$skip) class="active" @endif><a href="javascript:void(0)" onclick="halaman({{ $i }})">{{ $i }}</a></li>
	@endfor
  </ul>
</nav>
<iframe style="display:none" id="hideform" name="hideform"></iframe>
<script>
function aktif_ujian(no_ujian)
{
	var offset="{{ $skip }}";
	var token ="{{ csrf_token() }}";
			$.ajax({
				url      : "aktif_ujian",
				data     : ({ _token:token,no_ujian:no_ujian,offset:offset }),
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){
						//~ $('html, body').animate({ scrollTop: 0 }, 'slow');	
						$('#tabel').html(respon);
						},
			})	
}
function showhiddenform()	
{
	//~ $("#hideform").css("display","block");
}
function download(no_ujian,param)
{
	var _token="{{ csrf_token() }}";
	window.open('download/'+_token+'/'+no_ujian+'/'+param,'','width=800,height=600');
}
function halaman(offset)
{
	$('#info').html('');
	var gelombang="{{ session('gelombang') }}";
	var token="{{ csrf_token() }}";
			$.ajax({
				url      : "admins",
				data     : ({ _token:token,gelombang:gelombang,offset:offset }),
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){
						$('html, body').animate({ scrollTop: 0 }, 'slow');	
						$('#tabel').html(respon);
						},
			})	
}
function simpan_lulus(no_ujian,prodi)
{
	var offset="{{ $skip }}";
	var token="{{ csrf_token() }}";
			$.ajax({
				url      : "simpan_lulus",
				data     : ({ _token:token,no_ujian:no_ujian,prodi:prodi,offset:offset }),
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){
						$('#tabel').html(respon);
						},
			})	
}
function upload_foto(no_ujian)
{
	var file = $("#foto"+no_ujian)[0].files[0];
	var ext = $('#foto'+no_ujian).val().split('.').pop().toLowerCase();
	if(file.size > 550000) 
	{
		alert("Ukuran foto tidak boleh lebih dari 500 Kb");
		$("#foto"+no_ujian).val("");
		return false;
	}		
	else if($.inArray(ext, ['jpg','jpeg']) == -1) 
	{
		alert('Type foto harus jpg bukan '+ext);
		$("#foto"+no_ujian).val("");
		return false;
	}
	else
	{
		var token="{{ csrf_token() }}";
		var file = $("#foto"+no_ujian)[0].files[0];
		var fd = new FormData();
		fd.append("afile", file);
		fd.append("no_ujian", no_ujian);
		fd.append("_token", token);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "upload_foto", true);
		xhr.send(fd);
	}
}
function edit_peserta(no_ujian)
{
	var skip="{{ $skip }}";
	var token="{{ csrf_token() }}";
	$('#isimodal').html('');
	$.ajax({
		url      : "edit_peserta",
		data     : ({ _token:token,no_ujian:no_ujian,skip:skip }),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#isimodal').html(respon);
			},
	})	
}
</script>

<style>
.tbl_upload_foto,
.tbl_upload_foto input {
   background: transparent url(asset/img/icon_foto.png) left top no-repeat;
   width:"10px";
}

.tbl_upload_foto {
   background: transparent url(asset/img/icon_foto.png) left top no-repeat;
   	display: block;
    margin-left: auto;
    margin-right: auto
}

.tbl_upload_foto input {
   opacity: 0;
}
</style>
