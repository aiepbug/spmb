<style>
.tengah{text-align:center;}
.kiri	{text-align:left;}
.kanan	{text-align:right;}
.kecil	{font-size:0.9em;}
.fkiri	{float:left;}
.atas10	{margin-top:10px;}
body	{font-size:0.7em;font-family:"oswald"}
kabur	{color:#D0D0D0;}
.merah{color:red;}
</style>
<body>
	<table>
	<tr>
<!--
		<td width="100px"><img class="fkiri kiri" src="asset/img/logo.png" width="80px"></td>
-->
		<td>FORMULIR PENDAFTARAN<br>
			SELEKSI PENERIMAAN MAHASISWA BARU TAHUN {{ $profil->tahun }}<br>
			INSTITUT AGAMA ISLAM NEGERI PALU<br>
		</td>
		<td class="kanan kabur">
			<h1>
			{{ 
					$umum->skor_jenis_tinggal+
					$umum->skor_luas_rumah+
					$umum->skor_tanah+
					$umum->skor_njop+
					$umum->skor_mck+
					$umum->skor_daya_listrik+
					$umum->skor_sumber_air+
					$umum->skor_pln+
					$umum->skor_telp+
					$umum->skor_sepeda+
					$umum->skor_motor+
					$umum->skor_mobil+
					$umum->skor_atap+
					$umum->skor_lantai+
					$umum->skor_pbb+
					$umum->skor_hutang+
					$umum->skor_piutang+
					$umum->skor_tabungan
			}}
			/___</h1>
		</td>
	</tr>
	</table>
	<hr>
<table>
<tr><td><h4>A. DATA DIRI</h4></td><td></td></tr>
<tr><td width="30%">JALUR</td><td width="50%">: {{ strtoupper($profil->gelombang) }}</td></tr>
<tr><td>NO UJIAN</td><td>: {{ $profil->no_ujian }}</td></tr>
<tr><td>NAMA</td><td>: {{ strtoupper($profil->nama) }}</td></tr>
<tr><td>TTL</td><td>: {{ strtoupper($profil->tempat_lahir).', '. date('d M Y',strtotime($profil->tanggal_lahir)) }} </td></tr>
<tr><td>JENIS KELAMIN</td><td>: @if($profil->jender=='1') PRIA @else WANITA @endif </td></tr>
<tr><td>ALAMAT</td><td>: {{ strtoupper($profil->alamat) }}</td></tr>
<tr><td>ASAL KAB./KOTA</td><td>: {{ strtoupper($umum->kota) }}</td></tr>
<tr><td>TELP.</td><td>: {{ $profil->hp }}</td></tr>
<tr><td>STATUS MENIKAH</td><td>: @if($profil->nikah==0) LAJANG @elseif($profil->nikah==1) MENIKAH @elseif($profil->nikah=2) DUDA/JANDA @endif</td></tr>
<tr><td><h4>B. DATA SEKOLAH</h4></td><td></td></tr>
<tr><td>NAMA SEKOLAH</td><td>: {{ strtoupper($profil->nama_sekolah) }}</td></tr>
<tr><td>JENIS SEKOLAH</td><td>: {{ $umum->jenis_sekolah }}</td></tr>
<tr><td>JURUSAN</td><td>: {{ strtoupper($umum->jurusan_sekolah) }}</td></tr>
<tr><td>ALAMAT SEKOLAH</td><td>: {{ strtoupper($profil->alamat_sekolah) }}</td></tr>
<tr><td>TANGGAL IJAZAH/SKL</td><td>: {{ date('d M Y',strtotime($profil->tanggal_ijazah)) }}</td></tr>
@if($profil->pesantren==1) 
	<tr><td>PESANTREN</td><td>: {{ strtoupper($profil->nama_pesantren) }}</td></tr> 
	<tr><td>ALAMAT PESANTREN</td><td>: {{ strtoupper($profil->alamat_pesantren) }}</td></tr> 
@endif
<tr><td><h4>C. DATA KELUARGA</h4></td><td></td></tr>
<tr><td>NAMA AYAH</td><td>: {{ strtoupper($profil->ayah_nama) }} @if($profil->ayah_alm==1) (ALMARHUM) @endif</td></tr>
<tr><td>PENDIDIKAN AYAH</td><td>: {{ $umum->ayah_pendidikan }}</td></tr>
<tr><td>PEKERJAAN AYAH</td><td>: {{ strtoupper($umum->ayah_pekerjaan) }}</td></tr>
<tr><td>PENGHASILAN AYAH</td><td>: {{ strtoupper($umum->ayah_penghasilan) }}</td></tr>
<tr><td>NAMA IBU</td><td>: {{ strtoupper($profil->ibu_nama) }} @if($profil->ibu_alm==1) (ALMARHUMAH) @endif</td></tr>
<tr><td>PENDIDIKAN IBU</td><td>: {{ $umum->ibu_pendidikan }}</td></tr>
<tr><td>PEKERJAAN IBU</td><td>: {{ strtoupper($umum->ibu_pekerjaan) }}</td></tr>
<tr><td>PENGHASILAN IBU</td><td>: {{ strtoupper($umum->ibu_penghasilan) }}</td></tr>
<tr><td>JUMLAH SAUDARA</td><td>: {{ $profil->jumlah_saudara }}</td></tr>
<tr><td>ANAK KE</td><td>: {{ $profil->anak_ke }}</td></tr>
<tr><td>TELP. ORTU</td><td>: {{ strtoupper($profil->ortu_hp) }}</td></tr>
<tr><td>ALAMAT ORANG TUA</td><td>: {{ strtoupper($profil->ortu_alamat) }}</td></tr>
<tr><td>KAB./KOTA ORANG TUA</td><td>: {{ strtoupper($umum->ortu_kota) }}</td></tr>
<tr><td><h4>D. LAINNYA</h4></td><td></td></tr>
<tr><td>BAHASA ARAB</td><td>: @if($profil->bahasa_arab==1) BISA @elseif($profil->bahasa_arab==0) TIDAK BISA @endif</td></tr>
<tr><td>BAHASA INGGRIS</td><td>: @if($profil->bahasa_inggris==1) BISA @elseif($profil->bahasa_inggris==0) TIDAK BISA @endif</td></tr>
<tr><td>KOMPUTER</td><td>: @if($profil->komputer==0) TIDAK BISA @elseif($profil->komputer==1) OPERATOR @elseif($profil->komputer==2) PROGRAMER @endif</td></tr>
<tr><td>MENGETAHUI IAIN DARI</td><td>: {{ strtoupper($umum->mengetahui_iain) }}</td></tr>
<tr><td><h4>E. ASET</h4></td><td></td></tr>
<tr><td>JENIS TINGGAL</td><td>: @if(!empty($aset->jenis_tinggal)) {{ strtoupper($aset->jenis_tinggal) }} @endif</td></tr>
<tr><td>LUAS RUMAH</td><td>: @if(!empty($aset->luas_rumah)) {{ $aset->luas_rumah }} @endif</td></tr>
<tr><td>LUAS TANAH</td><td>: @if(!empty($aset->tanah)) {{ $aset->tanah }} @endif</td></tr>
<tr><td>MCK</td><td>: @if(!empty($aset->mck)) {{ strtoupper($aset->mck) }} @endif</td></tr>
<tr><td>BAHAN ATAP</td><td>: @if(!empty($aset->atap)) {{ strtoupper($aset->atap) }} @endif</td></tr>
<tr><td>BAHAN LANTAI</td><td>: @if(!empty($aset->lantai)) {{ strtoupper($aset->lantai) }} @endif</td></tr>
<tr><td>JUMLAH PAJAK BUMI</td><td>: @if(!empty($aset->pbb)) {{ $aset->pbb }} @endif</td></tr>
<tr><td>HARGA JUAL RUMAH</td><td>: @if(!empty($aset->njop)) {{ $aset->njop }} @endif</td></tr>
<tr><td>DAYA LISTRIK</td><td>: @if(!empty($aset->daya_listrik)) {{ strtoupper($aset->daya_listrik) }} @endif</td></tr>
<tr><td>SUMBER AIR</td><td>: @if(!empty($aset->sumber_air)) {{ strtoupper($aset->sumber_air) }} @endif</td></tr>
<tr><td>IURAN LISTRIK</td><td>: @if(!empty($aset->pln)) {{ $aset->pln }} @endif</td></tr>
<tr><td>IURAN TELP</td><td>: @if(!empty($aset->telp)) {{ $aset->telp }} @endif</td></tr>
<tr><td>JUMLAH SEPEDA</td><td>: @if(!empty($aset->sepeda)) {{ $aset->sepeda }} @endif</td></tr>
<tr><td>JUMLAH MOTOR</td><td>: @if(!empty($aset->motor)) {{ $aset->motor }} @endif</td><td width="15%" class="tengah">CALON MAHASISWA</td></tr>
<tr><td>JUMLAH MOBIL</td><td>: @if(!empty($aset->mobil)) {{ $aset->mobil }} @endif</td></tr>
<tr><td>HUTANG ORANGTUA</td><td>: @if(!empty($aset->hutang)) {{ $aset->hutang }} @endif</td></tr>
<tr><td>PIUTANG ORANGTUA</td><td>: @if(!empty($aset->piutang)) {{ $aset->piutang }} @endif</td></tr>
<tr><td>TABUNGAN ORANGTUA</td><td>: @if(!empty($aset->tabungan)) {{ $aset->tabungan }} @endif</td><td width="15%" class="tengah"><u>{{ strtoupper($profil->nama) }}</u></td></tr>
<tr><td></td><td></td><td></td></tr>
<tr><td colspan="3" class="kecil merah">Dengan ini saya menyatakan bahwa data isian di atas adalah benar 
adanya. Apabila dikemudian hari ditemukan bahwa ada data yang tidak benar, saya siap diberi 
sanksi sesuai ketentuan yang berlaku.</td></tr>
</table>
</body>
