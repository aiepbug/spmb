<head>
	<title>Ujian SPMB</title>
<link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="asset/css/datepicker.css" rel="stylesheet" type="text/css">
<link href="asset/css/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="asset/css/select2.css" rel="stylesheet" type="text/css">
<link href="asset/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<style>
	.tengah {text-align:center;}
	th {text-align:center;}
	.pendek{width:5%;}
	.tblsoal{width:3.3em;}
	#peringatan_waktu{display:none;color:red;}
</style>
<div class="row">
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<p class="navbar-text">Ujian sebagai <strong>{{ $profil->nama }}</strong> ({{ $profil->no_ujian }})</p>
			<div class="form-group">
				<a onclick="navigasi(parseInt($('#no_soal').val())-1)" href="javascript:void(0)" class="btn btn-primary navbar-btn"><i class="fa fa-arrow-circle-left"></i></a>
				<input type="text" id="nav" readonly class="pendek tengah">
				<a onclick="navigasi(parseInt($('#no_soal').val())+1)" href="javascript:void(0)" class="btn btn-primary navbar-btn"><i class="fa fa-arrow-circle-right"></i></a>
				<p class="navbar-text pull-right">
					Waktu ujian : <span id="time">00:00</span> 
				</p>
				<p id="peringatan_waktu" class="navbar-text text-danger blink pull-right">Waktu ujian akan segera habis</p>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="col-md-8">
			<div class="panel panel-info" id="soal">

			</div>
			<a href="#" onclick="navigasi(parseInt($('#no_soal').val())+1)" class="pull-right btn btn-primary">Soal selanjutnya &rarr;</a>
		</div>
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-footer"><h2>NAVIGASI</h2></div>
				<div class="panel-body" id="navigasi">
				</div>
				<div class="panel-footer">
					<a href="javascript:void(0)" onclick="getServerTime()" class="btn btn-primary">Simpan</a>
					<a href="#" onclick="selesai_ujian()"  data-target=".bs-example-modal-lg" data-toggle="modal" class="pull-right btn btn-success">Selesai</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div id="modals" class="modal-dialog modal-lg">
	<div class="modal-content">
	 <div id="isimodal"></div>
	</div>
  </div>
</div>

<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/bootstrap.js"></script>
<script src="asset/js/select2.js"></script>

<script>
function selesai_ujian()
{
	var token="{{ csrf_token() }}";
	$.ajax({
			url      : "selesai_ujian",
			data     : ({ _token:token }),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
				$('#isimodal').html(respon);
				},
		})
}
function blinker() {
    $('.blink').fadeOut(500);
    $('.blink').fadeIn(500);
}
setInterval(blinker, 1000);
function getServerTime()
{
	setInterval(function() {
			var token="{{ csrf_token() }}";
			$.ajax({
				url      : "simpan_waktu",
				data     : ({ _token:token }),
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){
						var size=2;
						var minutes = Math.floor(respon / 60);
						var seconds = respon - minutes * 60;
						var sm='00'+minutes;
						var sd='00'+seconds;
						var menit=sm.substr(sm.length-size);
						var detik=sd.substr(sd.length-size);
						$('#time').text(menit+':'+detik);
						if(menit<=5)
						{
							$("#peringatan_waktu").css("display","block")
						}
						else
						{
							$("#peringatan_waktu").css("display","none")
						}
					},
				error: function(){
						$('#time').text('Server error');
					}
			})
		},1000);
}
$(document).ready(function(){
	ambil_soal(1);
	$('#nav').val('1'+'/'+{{ $rule->jumlah_soal }});
	getServerTime();
})
function ambil_soal(no_soal)
{
	var token="{{ csrf_token() }}";
		$.ajax({
			url      : "ambil_soal",
			data     : ({ _token:token,no_soal:no_soal }),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
					$('#soal').html(respon);
					$('#nav').val(no_soal+'/'+{{ $rule->jumlah_soal }});
					navigasi_soal()
					},
		})	
}
function navigasi(no_soal)
{
	var token="{{ csrf_token() }}";
		$.ajax({
			url      : "ambil_soal",
			data     : ({ _token:token,no_soal:no_soal }),
			type     : 'POST',
			dataType : 'html',
			success  : function(respon){
					$('#soal').html(respon);
					$('#nav').val(no_soal+'/'+{{ $rule->jumlah_soal }});
					},
		})	
}
function navigasi_soal()
{
	var token="{{ csrf_token() }}";
	$.ajax({
		url      : "navigasi_soal",
		data     : ({ _token:token }),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
				$('#navigasi').html(respon);
				},
	})
}
</script>
