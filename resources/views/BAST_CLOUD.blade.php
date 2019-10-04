<!DOCTYPE html>
<html>
<head>
	<title>contoh surat </title>
	<style>
		.text_content{
			text-indent: 60px;
		}
	</style>
</head>
<body>
<table border="0">
	<tr>
		<td style="width:80">
			<img src="{{ public_path("img/pusintek.jpeg") }}" alt="" style="width: 100px; height: 100px;">
		</td>
	<td><center>
		<font size="4">KEMENTRIAN KEUANGAN REPUBLIK INDONESIA</font><BR>
		<font size="4"><b>SEKRETARIAN JENDRAL</b></font><BR>
		<font size="4"><b>PUSAT SISTEM INFORMASI DAN TEKNOLOGI KEUANGAN</b></font><BR>
		<font size="2">GD.SYAFRUDIN PRAWIRANEGARA LT.1-2, JALAN LAPANGAN BANTENG TIMUR NO.2-4, JAKARTA 10710, KOTAK POS 21 </font><BR>
		<font size="2">TELEPON (021) 3849348, 3846518; FAKSIMILE (021) 3451231; SITUS <U text-color="blue">http://pusintek.kemenkeu.go.id</U></font>
	</center></td>
	</tr>
	<tr>
		<td colspan="2"><hr></td>
	</tr>
</table>

<br>

<table border="0" align="center">
	<tr align="center">
		<td colspan="5">
			<b>
					<font>Berita Acara Serah Terima Layanan Cloud Server</font><br>
					<font>Nomor :  {{$bast->id}}/BAST-CLOUDDEV/IT.5.4/{{date('Y')}}</font>
			</b>
		</td>
	</tr>
</table>
<table>
	<tr>
		<td colspan="5"><p class="text_content">{{$bast->pernyataan}}</p></td>
	</tr>
</table>
<table>
	<tr>
		<td width="5"> I </td>
		<td width="20">Nama</td>
		<td width="5">:</td>
		<td> Fauzi Rahmad </td>
	</tr>
	<tr>
		<td> </td>
		<td>NIP</td>
		<td>:</td>
		<td>198306112010121002</td>
	</tr>
	<tr>
		<td> </td>
		<td>Jabatan</td>
		<td>:</td>
		<td>Kepala Subbidang Operasional Pusat Data</td>
	</tr>
	<tr>
		<td> </td>
		<td>Unit</td>
		<td>:</td>
		<td>Pusintek - Setjen</td>
	</tr>
	<tr>
		<td colspan="5" align="left"><b>Selanjutnya disebut PIHAK PERTAMA</b></td>
	</tr>
	<tr>
		<td> II </td>
		<td>Nama</td>
		<td>:</td>
		<td>{{$bast->nama}}</td>
	</tr>
	<tr>
		<td> </td>
		<td>NIP</td>
		<td>:</td>
		<td>{{$bast->nip}}</td>
	</tr>
	<tr>
		<td> </td>
		<td>Jabatan</td>
		<td>:</td>
		<td>{{$bast->jabatan}}</td>
	</tr>
	<tr>
		<td> </td>
		<td>Unit</td>
		<td>:</td>
		<td>{{$bast->unit}}</td>
	</tr>
	<tr>
		<td colspan="5" align="left"><b>Selanjutnya disebut PIHAK KEDUA</b></td>
	</tr>
</table>
<table>
	<tr>
		<td colspan="5"><p class="text_content">PIHAK PERTAMA telah menyediakan Cloud Server pada area development sesuai permintaan dan diterima dengan baik oleh PIHAK KEDUA dengan spesifikasi sebagai berikut:</p></td>
	</tr>
</table>

<table border="1 solid" width="550">
	<tr style="text-align: center">
		<td>NO.</td>
		<td>Hostname</td>
		<td>IPAddres</td>
		<td>Deskripsi</td>
		<td>OS</td>
		<td>CPU</td>
		<td>Memory</td>
		<td>Storage</td>
	</tr>
	@foreach ($bast->vm as $item)
		<tr style="text-align: center">
			<td>{{$no++}}</td>
			<td>{{$item->hostname}}</td>
			<td>{{$item->ip}}</td>
			<td>{{$item->description}}</td>
			<td>{{$item->sistem_operasi}}</td>
			<td>{{$item->cpu}}</td>
			<td>{{$item->memory}}</td>
			<td>{{$item->disk}}</td>
		</tr>
	@endforeach
</table>
<table border="0" style="text-align:justify">
	<tr>
		<td colspan="8"><p class="text_content">Untuk selanjutnya dalam hal operasional, PIHAK PERTAMA bertanggung jawab atas ketersediaan network dan fasilitas pendukung server. Sedangkan untuk sistem operasi, ketersediaan aplikasi/data dan backup aplikasi/data sepenuhnya menjadi tanggung jawab PIHAK KEDUA.</p></td>
	</tr>
	<tr>
		<td colspan="8"><p class="text_content">PIHAK PERTAMA berhak melakukan audit penggunaan dan utilitas resource cloud server untuk ditindaklanjuti pada kegiatan optimalisasi. Dan apabila di kemudian hari dibutuhkan penambahan / perubahan resource cloud server, PIHAK KEDUA dapat mengajukan permintaan RFC (request for change) melalui Service Desk Pusintek.</p></td>
	</tr>
	<tr>
		<td colspan="8"><p class="text_content">Masa waktu cloud server development adalah 2 (dua) bulan dengan perpanjangan maksimal 2 (dua) bulan. PIHAK PERTAMA berhak melakukan penghapusan Cloud Server dalam waktu 2 (dua) bulan apabila PIHAK KEDUA tidak melakukan permintaan perpanjangan masa Cloud Server Development.</p></td>
	</tr>
	<tr>
		<td colspan="8"><p class="text_content">Demikian Berita Acara ini dibuat untuk dapat digunakan semestinya.</p></td>
	</tr>
</table>

<table border="0" width="600" align="center">
	<tr>
		<td>PIHAK PERTAMA,</td>
		<td>PIHAK KEDUA,</td>
	</tr>
</table>
<br><br><br>
<table border="0" width="600" align="center">
	<tr style="width: 500">
		<td style="width : 30">Nama</td>
		<td style="width : 10">:</td>
		<td style="width : 270">Fauzi Rahmad</td>
		<td style="width : 30">Nama</td>
		<td>:</td>
		<td>{{$bast->nama}}</td>
	</tr>
	<tr style="width: 500">
		<td>NIP</td>
		<td>:</td>
		<td>198306112010121002</td>
		<td>NIP</td>
		<td style="width : 10">:</td>
		<td>{{$bast->nip}}</td>
	</tr>
</table>
</body>
</html>