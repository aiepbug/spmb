<?php
function gelombang($x)
{
	if($x=="mandiri1")
	{
		return "Mandiri I";
	}
	if($x=="span")
	{
		return "SPAN";
	}
	if($x=="mandiri2")
	{
		return "Mandiri II";
	}
}
$tanggal=explode("-",$profil->tanggal_lahir);
$t1=$tanggal[2];
$t2=$tanggal[1];
$t3=$tanggal[0];
$tgl=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
$bln=array(1,2,3,4,5,6,7,8,9,10,11,12);
$thn = array_combine(range((date("Y")-15), 1950), range((date("Y")-15), 1950));

?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title">Edit peserta {{ $no_ujian }} </h4>
</div>
<div class="modal-body">
	<form>
		<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label for="exampleInputEmail1">Gelombang *</label>
				<select disabled class="form-control" id="glb"><option>{{ gelombang($profil->gelombang) }}</option></select>
			</div>
			<div class="form-group">
				<label for="">No. Ujian *</label>
				<input disabled type="text" class="form-control" id="no_ujian" placeholder="No. Ujian" value="{{ $no_ujian }}">
			</div>
		</div>
		<div class="col-md-4 tengah">
			<div>&nbsp;</div>
			<img src="asset/img/foto/{{ $no_ujian }}.jpg" width="100px" class="img-rounded">
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="">Nama*</label>
				<input type="text" class="form-control" id="nama" placeholder="Nama" value="{{ $profil->nama }}">
			</div>
			<div class="form-group">
				<label for="">Tempat lahir *</label>
				<input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat lahir" value="{{ $profil->tempat_lahir }}">
			</div>
			<div class="form-group">
				<label for="">Tanggal lahir *</label>
				<div class="form-inline">
					<select style="width:100px;" class="form-control" id="tanggal">
						@foreach($tgl as $t)
							<option @if($t1==$t) selected @endif value="{{ $t }}">{{ $t }}</option>
						@endforeach
					</select>
					<select style="width:100px;" class="form-control" id="bulan">
						@foreach($bln as $b)
							<option @if($t2==$b) selected @endif  value="{{ $b }}">{{ $b }}</option>
						@endforeach
					</select>
					<select style="width:100px;" class="form-control" id="tahun">
						@foreach($thn as $th)
							<option @if($t3==$th) selected @endif   value="{{ $th }}">{{ $th }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="">Pilihan Jurusan *</label>
				<div class="form-inline">
					Pilihan 1 : 
					<select style="width:100px;" class="form-control" id="pilihan1">
						@foreach($prodi as $p)
							<option @if($p->kode_prodi==$profil->pilihan1) selected @endif value="{{ $p->kode_prodi }}">{{ $p->singkatan_prodi }}</option>
						@endforeach
					</select>
					Pilihan 2 : 
					<select style="width:100px;" class="form-control" id="pilihan2">
						@foreach($prodi as $p)
							<option @if($p->kode_prodi==$profil->pilihan2) selected @endif value="{{ $p->kode_prodi }}">{{ $p->singkatan_prodi }}</option>
						@endforeach
					</select>
					Pilihan 3 : 
					<select style="width:100px;" class="form-control" id="pilihan3">
						@foreach($prodi as $p)
							<option @if($p->kode_prodi==$profil->pilihan3) selected @endif value="{{ $p->kode_prodi }}">{{ $p->singkatan_prodi }}</option>
						@endforeach
					</select>
				</div>		
			</div>
		</div>
		</div>
	</form>
	<div class="text-success pull-right" id="status-area"></div>
	<div class="modal-footer">
		<div class="text-alert pull-left">* Wajib</div>
		<button type="button" class="btn btn-default" data-dismiss="modal">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</button>
		<button type="button" onclick="update_peserta()" class="btn btn-primary">Simpan</button>
	</div>
</div>
<script>
function update_peserta()
{
	
	var no_ujian=$("#no_ujian").val(),nama=$("#nama").val(),tempat_lahir=$("#tempat_lahir").val(),
		tanggal=$("#tanggal").val(),bulan=$("#bulan").val(),tahun=$("#tahun").val(),
		pilihan1=$("#pilihan1").val(),pilihan2=$("#pilihan2").val(),pilihan3=$("#pilihan3").val();
	if(nama==""){$("#nama").focus();return false;}
	else if(tempat_lahir==""){$("#tempat_lahir").focus();return false;}
	else
	{

		var token="{{ csrf_token() }}";
		$.ajax({
			url      : "update_peserta",
			data     : ({ _token:token,no_ujian:no_ujian,nama:nama,tempat_lahir:tempat_lahir,
							tanggal:tanggal,bulan:bulan,tahun:tahun,pilihan1:pilihan1,pilihan2:pilihan2
							,pilihan3:pilihan3
				 }),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
				pesan_singkat();
				$("#nama").val('');
				$('#modal').modal('hide');
				},
		})
		var offset="{{ $skip }}";
		var gelombang="{{ session('gelombang') }}";
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
}
function pesan_singkat()
{
    $('#status-area').text("Data tersimpan");
}

</script>
