<!--
<h4>Sekolah</h4>
-->
		<div class="form-horizontal">
		<div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label"></label>
			<div class="col-sm-10">
				<a href="javascript:void(0)"><img src="asset/img/biodata_.png" width="180"/></a>
				<a href="javascript:void(0)"><img src="asset/img/sekolah.png" width="180"/></a>
				<a href="javascript:void(0)"><img src="asset/img/orangtua_.png" width="180"/></a>
				<a href="javascript:void(0)"><img src="asset/img/aset_.png" width="180"/></a>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Nama sekolah</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" data-trigger="focus" data-placement="top" data-content="Tidak boleh kosong" id="nama_sekolah" placeholder="Nama sekolah" value="{{ $data->nama_sekolah }}">
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Asal Kabupaten sekolah</label>
			<div class="col-md-10">
				<select style="width:300px;" id="kota_sekolah" class="">
					@foreach ($kota as $k)
						<option value="{{ $k->indeks }}">{{ $k->nama_kab }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Jenis sekolah</label>
			<div class="col-md-10">
				@foreach ($sekolah as $s)
					<input type="radio" id="jenis_sekolah" name="jenis_sekolah" value="{{ $s->kode }}" @if($data->jenis_sekolah==$s->kode) checked @endif > {{ $s->keterangan }}
				@endforeach
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Jurusan sekolah</label>
			<div class="col-md-10">
				@foreach ($jurusan as $s)
					<input type="radio" id="jurusan" name="jurusan" value="{{ $s->kode }}" @if($data->jurusan==$s->kode) checked @endif > {{ $s->keterangan }}
				@endforeach
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Alamat sekolah</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" data-trigger="focus" data-placement="top" data-content="Tidak boleh kosong" id="alamat_sekolah" placeholder="Jalan/Desa/Kelurahan, Kecamatan" value="{{ $data->alamat_sekolah }}">
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Tanggal ijazah/SKL</label>
			<div class="col-sm-10">
			  <input class="form-control" data-trigger="focus" data-placement="top" data-content="Tidak boleh kosong" id="tanggal_ijazah" required placeholder="dd-mm-yyyy">
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Pernah pondok pesantren</label>
			<div class="col-sm-10">
			  <input type="radio" id="ponpes0" name="ponpes" value="0" checked> Tidak
			  <input type="radio" id="ponpes1" name="ponpes" value="1" @if($data->pesantren=='1') checked @endif > Ya
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Nama Ponpes</label>
			<div class="col-sm-10">
			  <input data-trigger="focus" disabled data-placement="top" data-content="Tidak boleh kosong" type="text" class="form-control" id="nama_ponpes" placeholder="Nama pondok pesantren" value="{{ $data->nama_pesantren }}">
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Alamat Ponpes</label>
			<div class="col-sm-10">
			  <input data-trigger="focus" disabled data-placement="top" data-content="Tidak boleh kosong" type="text" class="form-control" id="alamat_ponpes" placeholder="Alamat pondok pesantren" value="{{ $data->alamat_pesantren }}">
			</div>
		  </div>
		<div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Bahasa arab</label>
			<div class="col-sm-10">
			  <input type="radio" id="bahasa_arab" name="bahasa_arab" value="0" checked> Tidak
			  <input type="radio" id="bahasa_arab" name="bahasa_arab" value="1" @if($data->bahasa_arab=='1') checked @endif > Bisa
			</div>
		  </div>
		<div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Bahasa inggris</label>
			<div class="col-sm-10">
			  <input type="radio" id="bahasa_inggris" name="bahasa_inggris" value="0" checked> Tidak
			  <input type="radio" id="bahasa_inggris" name="bahasa_inggris" value="1" @if($data->bahasa_inggris=='1') checked @endif > Bisa
			</div>
		  </div>
		<div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Komputer</label>
			<div class="col-sm-10">
			  <input type="radio" id="komputer" name="komputer" value="0" checked> Tidak
			  <input type="radio" id="komputer" name="komputer" value="1" @if($data->komputer=='1') checked @endif > Operator
			  <input type="radio" id="komputer" name="komputer" value="2" @if($data->komputer=='2') checked @endif > Progamer
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <a href="javascript:void(0)" onclick="simpan_sekolah()" type="submit" class="btn btn-primary">Selanjutnya &rarr;</a>
			</div>
		  </div>
		</div>
<script>
$(document).ready(function(){
	$(function() {
    $("[id^=tanggal]").datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: "dd-mm-yy",
		setDate : {{ date('d-m-Y') }}
      });
  });
  $(function(){
      // turn the element to select2 select style
      $('#kota_sekolah').select2();
      var tanggal_ijazah="{{ date('d-m-Y',strtotime($data->tanggal_ijazah)) }}";
		if(tanggal_ijazah == '0000-00-00')
		{
			$('#tanggal_ijazah').val("{{ date('d-m-Y') }}");
		} 
		else if (tanggal_ijazah == '01-01-1970')
		{
			$('#tanggal_ijazah').val("{{ date('d-m-Y') }}");
		}
		else
		{
			alert
			$('#tanggal_ijazah').val(tanggal_ijazah);
		}
    });
   $("#tanggal").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
	$('#ponpes0').click(function() {
		$('#alamat_ponpes').val('');
		$('#alamat_ponpes').attr('disabled','disabled');
	});
	$('#ponpes0').click(function() {
		$('#nama_ponpes').val('');
		$('#nama_ponpes').attr('disabled','disabled');
	});

	$('#ponpes1').click(function() {
		$('#alamat_ponpes').removeAttr('disabled');
	});
	$('#ponpes1').click(function() {
		$('#nama_ponpes').removeAttr('disabled');
	});
	
	var ponpes ="{{ $data->pesantren}}";
	if(ponpes =='1')
	{
		$('#alamat_ponpes').removeAttr('disabled');
		$('#nama_ponpes').removeAttr('disabled');
	}
	else
	{ 
		return false;
	}
	$("#kota_sekolah").select2().select2('val','{{ $data->kota_sekolah }}');
});
function simpan_sekolah()
{
	var nama_sekolah=$("#nama_sekolah").val(),kota_sekolah=$("#kota_sekolah").val(),
		alamat_sekolah=$("#alamat_sekolah").val(),tanggal_ijazah=$("#tanggal_ijazah").val(),
		alamat_ponpes=$("#alamat_ponpes").val();
		nama_ponpes=$("#nama_ponpes").val();
	var ponpes = $('input[name=ponpes]:checked').val();
	var jenis_sekolah = $('input[name=jenis_sekolah]:checked').val();
	var jurusan = $('input[name=jurusan]:checked').val();
	var bahasa_arab = $('input[name=bahasa_arab]:checked').val();
	var bahasa_inggris = $('input[name=bahasa_inggris]:checked').val();
	var komputer = $('input[name=komputer]:checked').val();
	if(nama_sekolah.length < 3){$("#nama_sekolah").focus();$("#nama_sekolah").popover('show');return false;}
	else if(alamat_sekolah.length < 3){$("#alamat_sekolah").focus();$("#alamat_sekolah").popover('show');return false;}
	else if(tanggal_ijazah.length < 3){$("#tanggal_ijazah").focus();$("#tanggal_ijazah").popover('show');return false;}
	else
	{
		var token="{{ csrf_token() }}";
		$.ajax({
		url      : "maba/simpan_sekolah",
		data     : ({ 	
						_token:token,
						nama_sekolah:nama_sekolah,
						kota_sekolah:kota_sekolah,
						jenis_sekolah:jenis_sekolah,
						jurusan:jurusan,
						alamat_sekolah:alamat_sekolah,
						tanggal_ijazah:tanggal_ijazah,
						ponpes:ponpes,
						nama_ponpes:nama_ponpes,
						alamat_ponpes:alamat_ponpes,
						bahasa_arab:bahasa_arab,
						bahasa_inggris:bahasa_inggris,
						komputer:komputer
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
