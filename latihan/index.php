<?php 
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'koneksi.php';

$mahasiswa =query("SELECT * FROM mahasiswa");

if(isset($_POST["cari"])){
  $mahasiswa=cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
</head>
<body>
  <a href="logout.php">Logout</a>
  <h1>Data Mahasiswa</h1>
  <a href="tambah.php">Tambah Data</a>
  <br><br>
  <form action="" method="POST">
  <input type="text" name="keyword" autofocus autocomplete placeholder="Masukkan pencarian disini.." size="45">
  <button type="submit" name="cari">Cari</button>
  </form>
  <table border="1" cellpadding="10" cellspacing="0";>
    <tr>
      <th>No</th>
      <th>Aksi</th>
      <th>Foto</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Jurusan</th>
      <th>Email</th>
    </tr>
    <?php $i=1; ?>
    <?php foreach ($mahasiswa as $row): ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><a href="ubah.php?id=<?= $row["id"];?>">Ubah</a> | 
      <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin Hapus Data?');">Hapus</a>
      </td>
      <td><img src="images/<?=$row["gambar"];?>" width="50"></td>
      <td><?= $row["nim"]; ?></td>
      <td><?= $row["nama"]; ?></td>
      <td><?= $row["email"]; ?></td>
      <td><?= $row["jurusan"]; ?></td>
    </tr>
    <?php $i++ ?>
    <?php endforeach; ?>
  </table>
</body>
</html>