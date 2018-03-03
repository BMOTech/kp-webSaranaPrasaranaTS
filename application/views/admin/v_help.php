<!DOCTYPE html>
<html>
<head>
	<title>Bantuan</title>
	<style type="text/css">
		li
		{
			display: block;
		}
	</style>
</head>
<body>
	<h1 class="text-center">Bantuan</h1>
	<br>
	<ul><li><h3>Penjelasan Menu-Menu Sidebar</h3></li></ul>
	<ul class="list-group">
		<li class="list-group-item"><b>1. Input Data Barang Masuk</b><br><p>Digunakan untuk memasukan data barang yang baru masuk. Dengan anda menginput data barang masuk maka jumlah dari id barang yang bersangkutan akan bertambah</p></li>
		<li class="list-group-item"><b>2. Data Barang</b><br><p>Digunakan untuk melihat data-data barang yang tersedia. Untuk mengisi jumlah data barang dengan id barang tertentu maka anda harus memasukan barang masuk terlebih dahulu.</p></li>
		<li class="list-group-item"><b>3. Data Barang Masuk</b><br><p>Digunakan untuk melihat data barang yang sudah masuk.</p></li>
		<li class="list-group-item"><b>4. Data Barang Keluar</b><br><p>Digunakan untuk melihat data barang yang keluar. Contoh: Dipinjam, Rusak, dan Hilang.</p></li>
		<li class="list-group-item"><b>5. Data Barang yang Hilang</b><br><p>Digunakan untuk melihat data barang yang hilang.</p></li>
		<li class="list-group-item"><b>6. Data Barang yang Rusak</b><br><p>Digunakan untuk melihat data barang yang rusak.</p></li>
		<li class="list-group-item"><b>7. Pinjam Barang</b><br><p>Digunakan untuk mengisi form peminjaman barang.</p></li>
		<li class="list-group-item"><b>8. Data Peminjaman</b><br><p>Digunakan untuk melihat data barang yang sudah dipinjam.</p></li>
		<li class="list-group-item"><b>9. Histori Peminjaman</b><br><p>Digunakan untuk melihat histori barang-barang yang sudah dipinjam.</p></li>
		<li class="list-group-item"><b>10. Pengembalian</b><br><p>Digunakan untuk mengisi form pengembalian. Pada menu ini anda bisa melakukan pengembalian barang, pengembalian barang hilang, dan pengembalian barang rusak.</p></li>
		<li class="list-group-item"><b>11. Data Pengembalian</b><br><p>Digunakan untuk melihat data-data yang dikembalikan.</p></li>
		<li class="list-group-item"><b>12. Ganti Rugi</b><br><p>Digunakan untuk mengganti rugi barang yang telah hilang dan rusak</p></li>
		<li class="list-group-item"><b>13. Data Ganti Rugi</b><br><p>Digunakan untuk melihat data-data request ganti rugi dari user.</p></li>
		<li class="list-group-item"><b>14. Manage</b><br><p>Dalam menu manage anda bisa memanajemen user dan ruang.</p></li>
	</ul>
	<ul><li><h3>Penjelasan Simbol</h3></li></ul>
	<ul>
		<li class="list-group-item"><i class="glyphicon glyphicon-edit"></i>: Simbol Edit<br>Digunakan untuk keperluan pengeditan data.</li>
		<li class="list-group-item"><i class="glyphicon glyphicon-info-sign">:Simbol Detail/Info</i><br>Digunakan untuk melihat informasi detail data/barang.</li>
		<li class="list-group-item"><i class="glyphicon glyphicon-trash"></i>: Simbol Hapus<br>Digunakan untuk menghapus data/barang.</li>
	</ul>
	<ul><li><h3>Cara Memasukan Data Barang</h3></li></ul>
	<ul>
		<li class="list-group-item">Input Data Barang terlebih dahulu di menu Data Barang untuk menginputkan daftar barang apa saja yang ada di SMK Telkom.<br><img src="<?php echo base_url('assets/img/db.png'); ?>"> => <img src="<?php echo base_url('assets/img/idb.png') ?>"></li>
		<li class="list-group-item">Kemudian klik Input data barang masuk, untuk menambah data, dengan catatan ada barang baru yang masuk. Dalam menginput data barang masuk maka akan ada field id barang, nah field id barang tersebut merupakan jenis barang yang ada di SMK Telkom. Sebagai contoh:<br>
		<img src="<?php echo base_url('assets/img/vhelp1.png') ?>"><br>Gambar diatas berarti barang Monitor memiliki id barang AA001</li>
		<li class="list-group-item">Setelah anda berhasil menginputkan barang masuk, maka data barang yang id barangnya bersangkutan jumlahnya akan bertambah.</li>
	</ul>
	<ul><li><h3>Cara Melakukan Peminjaman</h3></li></ul>
	<ul>
		<li class="list-group-item">Klik menu Pinjam Barang.<br><img src="<?php echo base_url('assets/img/pb.png') ?>"></li>
		<li class="list-group-item">Isikan form peminjaman</li>
		<li class="list-group-item">Klik tombol Get disamping field id barang keluar dan id peminjaman untuk mendapatkan id barang keluar dan id peminjaman.<br><img src="<?php echo base_url('assets/img/ibkid.png') ?>"></li>
		<li class="list-group-item">Pilih jenis barang mana yang akan anda pinjam dengan memilih id barangnya.<br><img src="<?php echo base_url('assets/img/idbrang.png') ?>"></li>
		<li class="list-group-item">Isikan semua form yang ada dan klik submit.<br></li>
		<li class="list-group-item">Kemudian klik Terima untuk mengkonfirmasi peminjaman.<br></li>
	</ul>
	<ul><li><h3>Cara Melakukan Pengembalian</h3></li></ul>
	<ul>
		<li class="list-group-item">Klik menu Pengembalian.<br><img src="<?php echo base_url('assets/img/mnukmbli.png') ?>"></li>
		<li class="list-group-item">Ketika klik menu Pengembalian maka akan muncul 3 sub pengembalian, yaitu: Pengembalian Barang, Pengembalian Barang Hilang, dan Pengembalian Barang Rusak.<br><br><img src="<?php echo base_url('assets/img/subkmbli.png') ?>"><br><br>Keterangan:<br>
		Sub Pengembalian Barang: Digunakan untuk mengembalikan barang secara normal. Dengan artian barang yang dikembalikan tidak rusak maupun hilang.<br>
		Sub Pengembalian Barang Hilang: Digunakan untuk mengembalikan barang yang hilang. Sebagai contoh, ketika anda meminjam barang, tiba-tiba barang tersebut hilang.<br>
		Sub Pengembalian Barang Rusak: Digunakan untuk mengembalikan barang rusak. Sebagai contoh, ketika anda meminjam barang, tiba-tiba barang tersebut rusak.</li>
		<li class="list-group-item">Isikan ID Peminjaman dan ID Barang Keluar sesuai dengan ID Peminjaman dan ID Barang keluar yang telah anda pinjam. Untuk lebih jelasnya bisa di cek di Data Peminjaman</li>
		<li class="list-group-item">Pilih jenis barang mana yang akan anda pinjam dengan memilih id barangnya.<br><br><img src="<?php echo base_url('assets/img/idbrang.png') ?>"></li>
		<li class="list-group-item">Isikan penanggung jawab dengan mengisi Atas Nama dan ID Penanggung Jawab jika yang bertanggung jawab bukan admin. Sebagai contoh kasusnya seperti ini: Seorang user ingin mengembalikan barang lewat admin. Tetapi jika yang meminjam adalah admin sendiri maka centang "Gunakan penanggung jawab sebagai admin".<br></li>
		<li class="list-group-item">Pastikan semua field terisi. Jika semua field telah terisi silahkan klik submit.<br></li>
		<li class="list-group-item">Klik Terima pada modal konfirmasi pengembalian.<br></li>
	</ul>
	<ul><li><h3>Cara Melakukan Ganti Rugi</h3></li></ul>
	<ul>
		<li class="list-group-item">Klik menu Ganti Rugi.<br><img src="<?php echo base_url('assets/img/gr1.png') ?>"></li>
		<li class="list-group-item">Isikan semua form Ganti. </li>
		<li class="list-group-item">Pada form "Mengganti Rugi Barang yang:" Pilih Hilang jika ingin mengganti rugi barang yang hilang, dan pilih rusak jika ingin mengganti rugi barang yang rusak.</li>
		<li class="list-group-item">Isikan ID Barang Keluar dengan ID Barang Keluar yang akan anda ganti rugi. Misalnya anda ingin mengganti barang yang hilang maka isikan id barang keluar dengan id barang keluar yang bisa anda cek di menu "Data Barang yang Hilang". Begitu juga ketika ingin mengembalikan barang yang rusak.</li>
		<li class="list-group-item">Setelah ID Barang Keluar dan ID Barang telah diisi, maka otomatis total harga akan muncul.<br></li>
		<li class="list-group-item">Isikan tanggal ganti rugi sesuai dengan tanggal anda mengganti rugi.<br></li>
		<li class="list-group-item">Isikan penanggung jawab dengan mengisi Atas Nama dan ID Penanggung Jawab jika yang bertanggung jawab bukan admin. Sebagai contoh kasusnya seperti ini: Seorang user ingin mengembalikan barang lewat admin. Tetapi jika yang meminjam adalah admin sendiri maka centang "Gunakan penanggung jawab sebagai admin".<br></li>
		<li class="list-group-item">Klik Submit, dan klik terima pada modal konfirmasi.</li>
		<li class="list-group-item">Setelah semuanya selesai, silahkan temui admin kami untuk proses konfirmasi dan pembayaran ganti rugi, atau bisa hubungi kontak admin.</li>
	</ul>
	<ul><li><h3>Hal yang harus dilakukan ketika ada request ganti rugi dari user</h3></li></ul>
	<ul>
		<li class="list-group-item">Klik menu Data Ganti Rugi untuk melihat apakah ada request ganti rugi dari user.<br><img src="<?php echo base_url('assets/img/dgr1.png') ?>"></li>
		<li class="list-group-item">Jika ada, maka tunggu user tersebut menemui anda untuk membayarkan tagihan ganti rugi. </li>
		<li class="list-group-item">Setelah transaksi berhasil klik menu Data Barang Hilang jika tadi yang di ganti rugi adalah barang hilang dan jika yang di ganti barang rusak maka klik menu Data Barang Rusak.</li>
		<li class="list-group-item">Hapus data barang yang id barang keluarnya sama dengan id barang keluar yang tadi mengganti rugi.</li>
		<li class="list-group-item">Edit jumlah data barang masuk pada menu barang masuk. Jika jumlah data barang masuk 0 maka hapus data barang masuk yang id barangnya bersangkutan.</li>
	</ul>
</body>
</html>