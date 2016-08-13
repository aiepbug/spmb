<?php
function sek($x)
{
	if($x=='2')
	{
		return 'checked';
	}
}
?>
<!--
	<h4>Data Orangtua</h4>
-->
		<div class="form-horizontal">
		<div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label"></label>
			<div class="col-sm-10">
				<a href="javascript:void(0)"><img src="asset/img/biodata_.png" width="180"/></a>
				<a href="javascript:void(0)"><img src="asset/img/sekolah_.png" width="180"/></a>
				<a href="javascript:void(0)"><img src="asset/img/orangtua.png" width="180"/></a>
				<a href="javascript:void(0)"><img src="asset/img/aset_.png" width="180"/></a>
			</div>
		  </div>
			
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Nama Ayah</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" data-trigger="focus" data-placement="top" data-content="Tidak boleh kosong" id="ayah_nama" placeholder="Nama Ayah" value="{{ $data->ayah_nama }}">
			</div>
			<div class="col-sm-3">
				<input name="ayah_alm" id="ayah_alm" type="checkbox" value="1" @if($data->ayah_alm=='1') checked @endif> Almarhum</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Pendidikan Ayah</label>
			<div class="col-md-10">
				<select style="width:300px;" id="ayah_pendidikan" class="form-control">
					@foreach ($pendidikan as $k)
						<option value="{{ $k->kode }}" @if($data->ayah_pendidikan==$k->kode) selected @endif>{{ $k->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Pekerjaan Ayah</label>
			<div class="col-md-10">
				<select style="width:300px;" id="ayah_pekerjaan" class="form-control">
					@foreach ($pekerjaan as $k)
						<option value="{{ $k->kode }}" @if($data->ayah_pekerjaan==$k->kode) selected @endif>{{ $k->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Penghasilan Ayah</label>
			<div class="col-md-10">
				<select style="width:300px;" id="ayah_penghasilan" class="form-control">
					@foreach ($gaji as $k)
						<option value="{{ $k->kode }}" @if($data->ayah_penghasilan==$k->kode) selected @endif>{{ $k->keterangan }}</option>
					@endforeach
				</select>
				<span class="help-block">Rata-rata penghasilan perbulan.</span>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Nama Ibu</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" data-trigger="focus" data-placement="top" data-content="Tidak boleh kosong" id="ibu_nama" placeholder="Nama Ibu" value="{{ $data->ibu_nama }}">
			</div>
			<div class="col-sm-3">
				<input name="ibu_alm" id="ibu_alm" type="checkbox" value="1" @if($data->ibu_alm=='1') checked @endif> Almarhumah</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Pendidikan Ibu</label>
			<div class="col-md-10">
				<select style="width:300px;" id="ibu_pendidikan" class="form-control">
					@foreach ($pendidikan as $k)
						<option value="{{ $k->kode }}"@if($data->ibu_pendidikan==$k->kode) selected @endif>{{ $k->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Pekerjaan Ibu</label>
			<div class="col-md-10">
				<select style="width:300px;" id="ibu_pekerjaan" class="form-control">
					@foreach ($pekerjaan as $k)
						<option value="{{ $k->kode }}" @if($data->ibu_pekerjaan==$k->kode) selected @endif>{{ $k->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Penghasilan Ibu</label>
			<div class="col-md-10">
				<select style="width:300px;" id="ibu_penghasilan" class="form-control">
					@foreach ($gaji as $k)
						<option value="{{ $k->kode }}" @if($data->ibu_penghasilan==$k->kode) selected @endif>{{ $k->keterangan }}</option>
					@endforeach
				</select><span class="help-block">Rata-rata penghasilan perbulan.</span>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Alamat Orangtua</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" data-trigger="focus" data-placement="top" data-content="Tidak boleh kosong" id="ortu_alamat" placeholder="Jalan / Kelurahan / Desa, Kecamatan" value="{{ $data->ortu_alamat }}">
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Kab/Kota Orangtua</label>
			<div class="col-md-10">
				<select style="width:300px;" id="ortu_kota" class="">
					@foreach ($kota as $k)
						<option value="{{ $k->indeks }}" @if($data->ortu_kota==$k->indeks) selected @endif>{{ $k->nama_kab }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">HP Orangtua</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" data-trigger="focus" data-placement="top" data-content="Tidak boleh kosong" id="ortu_hp" placeholder="HP Orangtua" value="{{ $data->ortu_hp }}">
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <a href="javascript:void(0)" onclick="simpan_ortu()" type="submit" class="btn btn-primary">Selanjutnya &rarr;</a>
			</div>
		  </div>
		  
		</div>
<script src="asset/js/select2.js"></script>
<script>
$(document).ready(function(){
	$(function() {
    $("[id^=tanggal]").datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: "dd-mm-yy"
      });
  });
  $(function(){
      // turn the element to select2 select style
      $('#ortu_kota').select2();
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
   $("#ortu_kota").select2().select2('val','{{ $data->ortu_kota }}');
});
function simpan_ortu()
{
	
	var ayah_nama=$("#ayah_nama").val(),
		ayah_pendidikan=$("#ayah_pendidikan").val(),ayah_pekerjaan=$("#ayah_pekerjaan").val(),
		ayah_penghasilan=$("#ayah_penghasilan").val(),
		ibu_nama=$("#ibu_nama").val(),
		ibu_pendidikan=$("#ibu_pendidikan").val(),ibu_pekerjaan=$("#ibu_pekerjaan").val(),
		ibu_penghasilan=$("#ibu_penghasilan").val(),
		ortu_alamat=$("#ortu_alamat").val(),ortu_kota=$("#ortu_kota").val(),ortu_hp=$("#ortu_hp").val();
	if ($('input[name=ayah_alm]:checked').length > 0)
		{
			var ayah_alm='1';
		}
		else
		{
			var ayah_al='0';
		}
	if ($('input[name=ibu_alm]:checked').length > 0)
		{
			var ibu_alm='1';
		}
		else
		{
			var ibu_alm='0';
		}

	if(ayah_nama.length < 3){$("#ayah_nama").focus();$("#ayah_nama").popover('show');return false;}
	else if(ibu_nama.length < 3){$("#ibu_nama").focus();$("#ibu_nama").popover('show');return false;}
	else if(ortu_alamat.length < 3){$("#ortu_alamat").focus();$("#ortu_alamat").popover('show');return false;}
	else if(ortu_hp.length < 3){$("#ortu_hp").focus();$("#ortu_hp").popover('show');return false;}
	else
	{
		var token="{{ csrf_token() }}";
		$.ajax({
		url      : "maba/simpan_ortu",
		data     : ({ 	
						_token:token,
						ayah_nama:ayah_nama,
						ayah_pendidikan:ayah_pendidikan,
						ayah_pekerjaan:ayah_pekerjaan,
						ayah_penghasilan:ayah_penghasilan,
						ibu_nama:ibu_nama,
						ibu_pendidikan:ibu_pendidikan,
						ibu_pekerjaan:ibu_pekerjaan,
						ibu_penghasilan:ibu_penghasilan,
						ortu_alamat:ortu_alamat,
						ortu_kota:ortu_kota,
						ortu_hp:ortu_hp,
						ayah_alm:ayah_alm,
						ibu_alm:ibu_alm
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
