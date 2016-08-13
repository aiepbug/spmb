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
@for($x=1;$x<3;$x++)
<body>
	<table>
	<tr>
		<td width="100px"><img class="fkiri kiri" src="asset/img/logo.png" width="60px"></td>
		<td>KEMENTERIAN AGAMA<br>
			SELEKSI PENERIMAAN MAHASISWA BARU<br>
			INSTITUT AGAMA ISLAM NEGERI PALU<br>
			KARTU PESERTA UJIAN
		</td>
	</tr>
	</table>
<!--
	<p><hr class="bawah10"></p>
--><br><br>
	<table class="kecil atas10">
		<tr><td width="18%">NO UJIAN</td><td width="30%">: {{ $profil->no_ujian }}</td><td width="7%"></td><td width="55%">TANGGAL UJIAN : {{ strtoupper(hari(date('l',strtotime($rule->tanggal_ujian)))) }}, {{ strtoupper(bulan(date('d',strtotime($rule->tanggal_ujian)))) }} {{ bulan(date('F',strtotime($rule->tanggal_ujian))) }} {{ date('Y',strtotime($rule->tanggal_ujian)) }}</td></tr>
		<tr><td>NAMA</td><td>: {{ strtoupper($profil->nama) }}</td><td></td><td>1. Validasi Peserta (08.00-08.30 WITA)</td></tr>
		<tr><td>TTL</td><td>: {{ strtoupper($profil->tempat_lahir) }}, {{ date('d/m/Y',strtotime($profil->tanggal_lahir)) }}</td><td></td><td>2. Potensi & Academic Attitude (08.30-09.30 WITA)</td></tr>
		<tr><td>PILIHAN 1</td><td class="kecil">: {{ $profil->p1 }}</td><td></td><td>3. Istirahat (09.30-09.45 WITA)</td></tr>
		<tr><td>PILIHAN 2</td><td class="kecil">: {{ $profil->p2 }}</td><td></td><td>4. Kebahasaan (09.45-10.45 WITA)</td></tr>
		<tr><td>PILIHAN 3</td><td class="kecil">: {{ $profil->p3 }}</td><td></td><td>5. Istirahat (10.45-11.00 WITA)</td></tr>
		<tr><td>TEMPAT UJIAN</td><td>: KAMPUS IAIN PALU</td><td></td><td>6. Keislaman (11.00-12.00 WITA)</td></tr>
		<tr><td>RUANG UJIAN</td><td>: {{ $profil->ruang }}</td><td></td><td>7. IPS (12.00-13.00 WITA)</td></tr>
		<tr><td>PASSWORD</td><td>: {{ $profil->password }}</td><td></td><td></td></tr>
	</table>
	<br><br>
	<table class="kecil">
	<tr>
		<td width="33%">TANDA TANGAN PESERTA,</td>
		<td width="33%"></td>
		<td width="33%">PALU, {{ date('d/m/Y') }}</td>
	</tr>
	<tr>
		<td>(dihadapan petugas validasi)</td>
		<td>
		<?php $path="asset/img/foto/".$profil->no_ujian.".jpg";?>
		@if(file_exists($path)==1)
		<img src="asset/img/foto/{{ $profil->no_ujian }}.jpg" width="70px">
		@else
		<br><br><br><p>Foto</p>
		@endif
		</td>
		<td>PETUGAS,</td>
	</tr>
	<tr>
		<td><u>{{ strtoupper($profil->nama) }}</u></td><td></td><td><u>{{ strtoupper($rule->ttd) }}</u></td>
	</tr>
	</table>
	<p><small>Catatan : <br>
	Harap hadir dikampus tanggal {{ date('d/m/Y',strtotime($rule->tanggal_hadir)) }} untuk pengarahan<br>
	Saat ujian membawa : 1. Kartu ujian; 2. Kartu Identitas (KTP/SIM/Fotokopi KK/Kartu pelajar/Identitas lainnya)<br>
	3. Ijazah/SKL asli/Legalisir sekolah; 4. Perlengkapan alat tulis termasuk pensil 2B dan penghapus.
	</small></p>
	<hr>
@endfor
</body>
