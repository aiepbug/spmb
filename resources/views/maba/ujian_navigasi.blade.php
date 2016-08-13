@foreach($ujian as $u)
	@if($u->jawaban!='')
		<a onclick="navigasi({{ $u->no_soal }})" class="btn btn-primary btn-lg tblsoal" href="javascript:void(0)">{{ $u->no_soal }}</a>
	@else
		<a onclick="navigasi({{ $u->no_soal }})" class="btn btn-danger btn-lg tblsoal" href="javascript:void(0)">{{ $u->no_soal }}</a>
	@endif
@endforeach
