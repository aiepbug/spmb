<style>
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
	<table>
	<tr>
		<td width="100px"><img class="fkiri kiri" src="asset/img/logo.png" width="60px"></td>
		<td>KEMENTERIAN AGAMA<br>
			SELEKSI PENERIMAAN MAHASISWA BARU JALUR MANDIRI TAHUN {{ date('Y') }}<br>
			INSTITUT AGAMA ISLAM NEGERI PALU<br>
			DAFTAR PRESENSI PESERTA UJIAN
		</td>
	</tr>
	</table>
	<hr>
	<table>
		<tr><td width="10%">RUANG UJIAN</td><td>: {{ $skip }}</td></tr>
	</table>
	<table border="1">
		<tr class="tengah kecil">
			<td rowspan="2" width="5%">NO</td>
			<td rowspan="2" width="12%">NO. UJIAN</td>
			<td rowspan="2" width="20%">NAMA</td>
			<td colspan="2" width="10%">KESESUAIAN IDENTITAS (SIM/KTP)</td>
			<td colspan="3" width="13%">IJAZAH</td>
			<td colspan="2" width="10%">FOTO</td>
			<td colspan="2" width="10%">KESESUAIAN TANDA TANGAN</td>
			<td rowspan="2" width="10%">TANDA TANGAN PESERTA </td>
			<td rowspan="2" width="10%">KET. </td>
		</tr>
		<tr class="tengah kecil">
			<td>Sesuai</td>
			<td>Tidak</td>
			<td>Sesuai</td>
			<td>Tidak</td>
			<td>Tahun</td>
			<td>Sesuai</td>
			<td>Tidak</td>
			<td>Sesuai</td>
			<td>Tidak</td>
		</tr>
		<?php $no=1;?>
		@foreach($data as $m)
		<tr>
			<td class="tengah">{{ $no++ }}</td>
			<td class="tengah">{{ $m->no_ujian }}</td>
			<td>{{ $m->nama }}</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		@endforeach
	</table>
	<br>
	<table>
		<tr><td width="70%"></td><td><br><br>PALU, 15 AGUSTUS 2016</td></tr>
		<tr><td></td><td>PJ.RUANG/ PENGAWAS<br><br></td></tr>
		<tr><td><small><i>Printed by Sistem Informasi SPMB IAIN Palu</i></small></td><td>_____________________</td></tr>
	</table>
</body>
