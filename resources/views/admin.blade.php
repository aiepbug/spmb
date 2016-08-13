<!DOCTYPE html>
<html>
    <head>
        <title>Beranda admin</title>

        <link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="asset/css/datepicker.css" rel="stylesheet" type="text/css">
        <link href="asset/css/jquery-ui.css" rel="stylesheet" type="text/css">
        <link href="asset/css/select2.css" rel="stylesheet" type="text/css">
        <link href="asset/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <style>
			.tengah {text-align:center;}
			th {text-align:center;}
        </style>
    </head>
    <body>
		<div class="container">
			<div class="row">
				<h3>Admin SPMB IAIN Palu</h3>
				<a onclick="logout()" data-target=".bs-example-modal-lg" data-toggle="modal" class="btn btn-danger pull-right" href="javascript:void(0)" > Logout <span class="fa fa-sign-out"></span></a>
				@yield('konten')
				<h5>Pusat teknologi informasi dan data IAIN Palu @ {{ date('Y') }}</h5>
			</div>
		</div> 
    </body>
	<div id="modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div id="modals" class="modal-dialog modal-lg">
		<div class="modal-content">
		 <div id="isimodal"></div>
		</div>
	  </div>
	</div>
    
    
</html>
<script>
$(document).ready(function(){
	//~ $(function() {
    //~ $("[id^=tanggal]").datepicker({
		//~ changeMonth: true,
		//~ changeYear: true,
		//~ dateFormat: "dd-mm-yy"
      //~ });
  //~ });
  $(function(){
      // turn the element to select2 select style
      $('#kota').select2();
      $('#bangsa').select2();
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
  
});
function tambah_peserta()
{
var token="{{ csrf_token() }}";
$.ajax({
		url      : "tambah_peserta",
		data     : ({ _token:token }),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#isimodal').html(respon);
			},
	})	
}
function logout()
{
var token="{{ csrf_token() }}";
$.ajax({
		url      : "logout",
		data     : ({ _token:token }),
		type     : 'POST',
		dataType : 'html',
		success  : function(respon){
			$('#isimodal').html(respon);
			},
	})	
}
$('#pilihan_gelombang input').on('change', function() {
	var gelombang = $('input[name="gelombang"]:checked', '#pilihan_gelombang').val(); 
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
});
</script>
<script src="asset/js/select2.js"></script>

