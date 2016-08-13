<?php
function jawab($j)
{
	if($j==1)
	{
		return 'A';
	}
	else if($j==2)
	{
		return 'B';
	}
	else if($j==3)
	{
		return 'C';
	}
	else if($j==4)
	{
		return 'D';
	}
	else 
	{
		return 'Undifined';
	}
}
?>
<div class="panel-footer"><h2>SOAL <span class="text-muted pull-right">#{{ $soal->no_soal }}</span></h2></div>
<div class="panel-body">
	<p><strong>Kategori : {{ $soal->jenis }}</strong><span class="pull-right">@if($soal->jawaban=='')  @else Anda memilih jawaban {{ jawab($soal->jawaban) }} @endif</span></p>
	<input id="no_soal" type="hidden" value="{{ $soal->no_soal }}">
	<hr>
	<p>{{ $soal->soal }}</p>
	<p><a onclick="jawab(1)" href="javascript::javascript">Jawaban A</a><BR> {{ $soal->jawaban1 }}</p>
	<p><a onclick="jawab(2)" href="javascript::javascript">Jawaban B</a><BR> {{ $soal->jawaban2 }}</p>
	<p><a onclick="jawab(3)" href="javascript::javascript">Jawaban C</a><BR> {{ $soal->jawaban3 }}</p>
	<p><a onclick="jawab(4)" href="javascript::javascript">Jawaban D</a><BR> {{ $soal->jawaban4 }}</p>
</div>

<script>
function jawab(jawaban)
{
	
	var token="{{ csrf_token() }}";
	var no_soal=$("#no_soal").val();
	$.ajax({
				url      : "jawab",
				data     : ({ _token:token,no_soal:no_soal,jawaban:jawaban }),
				type     : 'POST',
				dataType : 'html',
				success  : function(respon){
						$('html, body').animate({ scrollTop: 0 }, 'slow');	
						$('#soal').html(respon);
						navigasi_soal();
						},
			})	
}
</script>
