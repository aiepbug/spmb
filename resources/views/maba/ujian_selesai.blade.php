<div class="modal-body">
	<span class="form-inline">
		<h2>Yakin selesai ujian?</h2>
		<button type="button" class="btn btn-default" data-dismiss="modal">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</button>
		<a onclick="tutup_ujian()" class="btn btn-danger">Logout</a>
	</span>
</div>
<script>
function tutup_ujian()
{
	var token="{{ csrf_token() }}";
	$.ajax({
		url      : "tutup_ujian",
		data     : ({ _token:token }),
		type     : 'POST',
		dataType : 'html',
		success	 : function(respon){
				$('body').html(respon);
			},
	})
}
</script>
