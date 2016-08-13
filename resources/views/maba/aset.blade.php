<!--
<h4>Data Aset</h4>
-->
		<div class="form-horizontal">
		  <!-- -->
		 <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label"></label>
			<div class="col-sm-10">
				<a href="javascript:void(0)"><img src="asset/img/biodata_.png" width="180"/></a>
				<a href="javascript:void(0)"><img src="asset/img/sekolah_.png" width="180"/></a>
				<a href="javascript:void(0)"><img src="asset/img/orangtua_.png" width="180"/></a>
				<a href="javascript:void(0)"><img src="asset/img/aset.png" width="180"/></a>
			</div>
		  </div>
		  <div class="form-group">
			<label for="jenis_tinggal" class="col-sm-2 control-label">Jenis tinggal</label>
			<div class="col-md-10">
				<select style="width:300px;" id="jenis_tinggal" class="form-control">
					@foreach ($tinggal as $t)
						<option value="{{ $t->id }}" @if($aset->jenis_tinggal==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="luas_rumah" class="col-sm-2 control-label">Luas rumah</label>
			<div class="col-md-10">
				<select style="width:300px;" id="luas_rumah" class="form-control">
					@foreach ($luas as $t)
						<option value="{{ $t->id }}" @if($aset->luas_rumah==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="luas_tanah" class="col-sm-2 control-label">Luas tanah</label>
			<div class="col-md-10">
				<select style="width:300px;" id="luas_tanah" class="form-control">
					@foreach ($tanah as $t)
						<option value="{{ $t->id }}"@if($aset->luas_tanah==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="harga_jual" class="col-sm-2 control-label">Perkiraan harga jual rumah</label>
			<div class="col-md-10">
				<select style="width:300px;" id="harga_jual" class="form-control">
					@foreach ($njop as $t)
						<option value="{{ $t->id }}" @if($aset->harga_jual==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">MCK</label>
			<div class="col-md-10">
				<select style="width:300px;" id="mck" class="form-control">
					@foreach ($mck as $t)
						<option value="{{ $t->id }}" @if($aset->mck==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Bahan atap rumah</label>
			<div class="col-md-10">
				<select style="width:300px;" id="atap" class="form-control">
					@foreach ($atap as $t)
						<option value="{{ $t->id }}" @if($aset->atap==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Bahan lantai rumah</label>
			<div class="col-md-10">
				<select style="width:300px;" id="lantai" class="form-control">
					@foreach ($lantai as $t)
						<option value="{{ $t->id }}" @if($aset->lantai==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Daya listrik</label>
			<div class="col-md-10">
				<select style="width:300px;" id="daya_listrik" class="form-control">
					@foreach ($listrik as $t)
						<option value="{{ $t->id }}" @if($aset->daya_listrik==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Iuran PLN / bulan</label>
			<div class="col-md-10">
				<select style="width:300px;" id="iuran_pln" class="form-control">
					@foreach ($pln as $t)
						<option value="{{ $t->id }}" @if($aset->iuran_pln==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Iuran Telkom / bulan</label>
			<div class="col-md-10">
				<select style="width:300px;" id="iuran_telp" class="form-control">
					@foreach ($telkom as $t)
						<option value="{{ $t->id }}" @if($aset->iuran_telp==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Sumber air</label>
			<div class="col-md-10">
				<select style="width:300px;" id="sumber_air" class="form-control">
					@foreach ($air as $t)
						<option value="{{ $t->id }}" @if($aset->sumber_air==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Jumlah sepeda</label>
			<div class="col-md-10">
				<select style="width:300px;" id="sepeda" class="form-control">
					@foreach ($sepeda as $t)
						<option value="{{ $t->id }}" @if($aset->sepeda==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Jumlah motor</label>
			<div class="col-md-10">
				<select style="width:300px;" id="motor" class="form-control">
					@foreach ($motor as $t)
						<option value="{{ $t->id }}" @if($aset->motor==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Jumlah mobil</label>
			<div class="col-md-10">
				<select style="width:300px;" id="mobil" class="form-control">
					@foreach ($mobil as $t)
						<option value="{{ $t->id }}" @if($aset->mobil==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Hutang orangtua</label>
			<div class="col-md-10">
				<select style="width:300px;" id="hutang" class="form-control">
					@foreach ($hutang as $t)
						<option value="{{ $t->id }}" @if($aset->hutang==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Piutang orangtua</label>
			<div class="col-md-10">
				<select style="width:300px;" id="piutang" class="form-control">
					@foreach ($piutang as $t)
						<option value="{{ $t->id }}" @if($aset->piutang==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		  <!-- -->
		  <div class="form-group">
			<label for="nama_i" class="col-sm-2 control-label">Tabungan orangtua</label>
			<div class="col-md-10">
				<select style="width:300px;" id="tabungan" class="form-control">
					@foreach ($tabungan as $t)
						<option value="{{ $t->id }}" @if($aset->tabungan==$t->id) selected @endif>{{ $t->keterangan }}</option>
					@endforeach
				</select>
			</div>
		  </div>
		 
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <a href="javascript:void(0)" onclick="simpan_aset()" type="submit" class="btn btn-primary">Selesai &rarr;</a>
			</div>
		  </div>
		  
		</div>
<script src="asset/js/select2.js"></script>
<script>
function simpan_aset()
{
	
	var jenis_tinggal=$("#jenis_tinggal").val(),
		luas_rumah=$("#luas_rumah").val(),
		luas_tanah=$("#luas_tanah").val(),
		harga_jual=$("#harga_jual").val(),
		mck=$("#mck").val(),
		daya_listrik=$("#daya_listrik").val(),
		iuran_pln=$("#iuran_pln").val(),
		iuran_telp=$("#iuran_telp").val(),
		sumber_air=$("#sumber_air").val(),
		sepeda=$("#sepeda").val(),
		motor=$("#motor").val(),
		mobil=$("#mobil").val(),
		atap=$("#atap").val(),
		lantai=$("#lantai").val(),
		tabungan=$("#tabungan").val(),
		hutang=$("#hutang").val(),
		piutang=$("#piutang").val();
	var token="{{ csrf_token() }}";
	$.ajax({
	url      : "maba/simpan_aset",
	data     : ({ 	
					_token:token,
					jenis_tinggal:jenis_tinggal,
					luas_rumah:luas_rumah,
					luas_tanah:luas_tanah,
					harga_jual:harga_jual,
					mck:mck,
					daya_listrik:daya_listrik,
					iuran_pln:iuran_pln,
					iuran_telp:iuran_telp,
					sumber_air:sumber_air,
					sepeda:sepeda,
					motor:motor,
					mobil:mobil,
					atap:atap,
					lantai:lantai,
					tabungan:tabungan,
					hutang:hutang,
					piutang:piutang
				}),
	type     : 'POST',
	dataType : 'html',
	success  : function(respon){
		$('#isi').html(respon);
		},
	})	
}
</script>
