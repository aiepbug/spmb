<div class="modal-body">
	<span class="form-inline">
		<h2>Akan logout?</h2>
		<button type="button" class="btn btn-default" data-dismiss="modal">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</button>
		<a onclick="hapus_session()" class="btn btn-danger">Logout</a>
	</span>
</div>
<script>
function hapus_session()
{
	var token="{{ csrf_token() }}";
	$.ajax({
		url      : "hapus_session",
		data     : ({ _token:token }),
		type     : 'POST',
		dataType : 'html',
		success	 : function(respon){
				$('body').html(respon);
			},
	})
}
</script>
