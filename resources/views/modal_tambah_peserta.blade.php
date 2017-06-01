<?php
$tgl=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
$bln=array(1,2,3,4,5,6,7,8,9,10,11,12);
$thn = array_combine(range((date("Y")-15), 1950), range((date("Y")-15), 1950));
?>
<div id="modal1">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title">Tambah peserta</h4>
</div>
<div class="modal-body">
<form>
	<div class="form-group">
		<label for="exampleInputEmail1">Gelombang *</label>
		<select style="width:200px;" class="form-control" id="glb">
			<option disabled value="umptkin">UM PTKIN</option>
			<option selected value="mandiri1">Mandiri I</option>
			<option disabled value="mandiri2">Mandiri II</option>
		</select>
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Nama *</label>
		<input type="text" class="form-control" id="nama" placeholder="Nama sesuai ijazah">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Tempat lahir *</label>
		<input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat lahir sesuai ijazah">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Tanggal lahir *</label>
			<div class="form-inline">

				<select style="width:100px;" class="form-control" id="tanggal">
					@foreach($tgl as $t)
						<option <?php if($t=='31'){ echo ' selected ';}?> value="{{ $t }}">{{ $t }}</option>
					@endforeach
				</select>
				<select style="width:100px;" class="form-control" id="bulan">
					@foreach($bln as $b)
						<option <?php if($b==12){ echo ' selected ';}?> value="{{ $b }}">{{ $b }}</option>
					@endforeach
				</select>
				<select style="width:100px;" class="form-control" id="tahun">
					@foreach($thn as $th)
						<option <?php if($th=='1996'){ echo ' selected ';}?>  value="{{ $th }}">{{ $th }}</option>
					@endforeach
				</select>


			</div>
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Pilihan jurusan *</label>
			<div class="form-inline">
				Pilihan 1 : 
				<select style="width:100px;" class="form-control" id="pilihan1">
					@foreach($prodi as $p)
						<option value="{{ $p->kode_prodi }}">{{ $p->singkatan_prodi }}</option>
					@endforeach
				</select>
				Pilihan 2 : 
				<select style="width:100px;" class="form-control" id="pilihan2">
					@foreach($prodi as $p)
						<option value="{{ $p->kode_prodi }}">{{ $p->singkatan_prodi }}</option>
					@endforeach
				</select>
				Pilihan 3 : 
				<select style="width:100px;" class="form-control" id="pilihan3">
					@foreach($prodi as $p)
						<option value="{{ $p->kode_prodi }}">{{ $p->singkatan_prodi }}</option>
					@endforeach
				</select>
			</div>
	</div>
</form>
<div class="text-success pull-right" id="status-area"></div>
</div>
<div class="modal-footer">
	<div class="text-alert pull-left">* Wajib</div>
	<button type="button" class="btn btn-default" data-dismiss="modal">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</button>
	<button type="button" onclick="simpan_peserta()" class="btn btn-primary">Simpan</button>
</div>
</div>
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/bootstrap.js"></script>
<script>
	(function($) {
    $.fn.flash_message = function(options) {
      
      options = $.extend({
        text: 'Done',
        time: 2000,
        how: 'before',
        class_name: ''
      }, options);
      
      return $(this).each(function() {
        if( $(this).parent().find('.flash_message').get(0) )
          return;
        
        var message = $('<span />', {
          'class': 'flash_message ' + options.class_name,
          text: options.text
        }).hide().fadeIn('fast');
        
        $(this)[options.how](message);
        
        message.delay(options.time).fadeOut('normal', function() {
          $(this).remove();
        });
        
      });
    };
})(jQuery);

function pesan_singkat()
{

    $('#status-area').flash_message({
        text: ' Data tersimpan! ',
        how: 'append'
    });
}
function simpan_peserta()
{
	
	var gelombang=$("#glb").val(),nama=$("#nama").val(),tempat_lahir=$("#tempat_lahir").val(),
		tanggal=$("#tanggal").val(),bulan=$("#bulan").val(),tahun=$("#tahun").val(),
		pilihan1=$("#pilihan1").val(),pilihan2=$("#pilihan2").val(),pilihan3=$("#pilihan3").val();
	if(nama==""){$("#nama").focus();return false;}
	else if(tempat_lahir==""){$("#tempat_lahir").focus();return false;}
	else
	{

		var token="{{ csrf_token() }}";
		$.ajax({
			url      : "simpan_peserta",
			data     : ({ _token:token,gelombang:gelombang,nama:nama,tempat_lahir:tempat_lahir,
							tanggal:tanggal,bulan:bulan,tahun:tahun,pilihan1:pilihan1,pilihan2:pilihan2
							,pilihan3:pilihan3
				 }),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
				pesan_singkat();
				$("#nama").val('');
				$("#tempat_lahir").val('');
				$("#tanggal").val('31');
				$("#bulan").val('12');
				$("#tahun").val('1990');
				$('#tabel').html(respon);
				$('#modal').modal('hide');
				},
		})
	}
}
</script>
