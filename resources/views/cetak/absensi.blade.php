<style>
	.tengah{text-align:center;}
	.kiri	{text-align:left;}
	.sedang	{font-size:0.9em;}
	.kecil	{font-size:0.8em;}
	.mini	{font-size:0.6em;}
	.fkiri	{float:left;}
	.atas10	{margin-top:10px;}
	.atas10	{margin-bottom:10px;}
	body	{font-size:0.9em;}
	kabur	{color:#D0D0D0;}
	.tabel {border-collapse: collapse;padding: 2px;}
</style>
<body class="kecil">
	<table>
	<tr>
		<td width="10%"><img class="fkiri kiri" src="asset/img/logo.png" width="40px"></td>
		<td>KEMENTERIAN AGAMA<br>
			SELEKSI PENERIMAAN MAHASISWA BARU JALUR MANDIRI TAHUN {{ date('Y') }}<br>
			INSTITUT AGAMA ISLAM NEGERI PALU<br>
			DAFTAR HADIR PESERTA UJIAN
		</td>
	</tr>
	</table>
	<hr>
	<table>
		<tr><td width="10%">RUANG UJIAN</td><td>: {{ $skip }}</td></tr>
		<tr><td>JENIS UJIAN</td><td>: POTENSI & ACADEMIC ATTITUDE *</td></tr>
		<tr><td></td><td> &nbsp;KEBAHASAAN *</td></tr>
		<tr><td></td><td> &nbsp;KEISLAMAN *</td></tr>
		<tr><td></td><td> &nbsp;IPS *</td></tr>
		<tr><td>WAKTU</td><td>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S.D.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WITA</td></tr>
	</table><br><br>
	<table border="1" class="sedang tabel">
		<tr class="tengah">
			<td width="5%">NO</td>
			<td width="15%">NO. UJIAN</td>
			<td width="30%">NAMA</td>
			<td colspan="2" width="35%">TANDA TANGAN</td>
			<td width="15%">KETERANGAN</td>
		</tr>
		<?php $no=1;foreach($data as $m){ $nomor=$no++;?>
		<tr>
			<td class="garis tengah">{{ $nomor }}</td>
			<td class="garis tengah">{{ strtoupper($m->no_ujian) }}</td>
			<td>{{ strtoupper($m->nama) }}</td>
			<td> @if ($nomor % 2!=0) {{ $nomor }} @endif </td>
			<td> @if ($nomor %2 ==0) {{ $nomor }} @endif </td>
			<td></td>
		</tr>
		<?php }?>
	</table>
		<table>
		<tr><td width="70%" class="kecil">* Coret yang tidak perlu</td><td><br><br>PALU, 15 AGUSTUS 2016</td></tr>
		<tr><td></td><td>PJ.RUANG/ PENGAWAS</td></tr>
		<tr><td><br><br><br><br><small><i>Printed by Sistem Informasi SPMB IAIN Palu</i></small></td><td><br><br><br><br>. . . . . . . . . . . .  . . . . . . . . . . . .</td></tr>
	</table>
</body>
