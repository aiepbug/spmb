<style>
	table{font-size:1.5em}
	.tengah{text-align:center;}
	.kiri	{text-align:left;}
	.kecil	{font-size:0.8em;}
	.mini	{font-size:0.6em;}
	.fkiri	{float:left;}
	.atas10	{margin-top:10px;}
	.atas10	{margin-bottom:10px;}
	body	{font-size:0.9em;}
	kabur	{color:#D0D0D0;}
</style>
<body>
	<h2 class="tengah">RUANG UJIAN : {{ $skip }}</h2>
	<table border="1">
		<tr class="tengah"><td width="10%">NO</td><td width="25%">NO. UJIAN</td><td width="65%">NAMA</td></tr>
		<?php $no=1;?>
		@foreach($data as $m)
		<tr>
			<td class="tengah">{{ $no++ }}</td>
			<td class="tengah">{{ $m->no_ujian }}</td>
			<td>{{ strtoupper($m->nama) }}</td>
		</tr>
		@endforeach
	</table>
	<small><i>Printed by Sistem Informasi SPMB IAIN Palu</i></small>
</body>
