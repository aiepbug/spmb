<!DOCTYPE html>
<html>
    <head>
        <title>Isi data</title>
    </head>
    <body>
		<div class="container">
			<div class="row">
				<h3>Header</h3>
				<a onclick="logout()" data-target=".bs-example-modal-lg" data-toggle="modal" class="btn btn-danger pull-right" href="javascript:void(0)" > Logout <span class="glyphicon glyphicon-lock"></span></a>
				@yield('konten')
				<h3>Footer</h3>
			</div>
		</div> 
    </body>
</html>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div id="isimodal"></div>
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
		setDate : new Date()
      });
  });
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
</script>


