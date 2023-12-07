<!DOCTYPE html>
<html>
<head>
  <title>Aplikasi CRUD dengan PHP</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    h1, h2 {
      text-align: center;
    }
    table {
      width: 80%;
      margin: 20px auto;
      border-collapse: collapse;
      background-color: #fff;
    }
    table, th, td {
      border: 1px solid #ddd;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
      text-align: left;
    }
    td {
      vertical-align: middle;
    }
    .button-container {
      float: left;
      margin: 50px 100px;
    }
    .button-container button {
      background-color: #007bff;
      border: none;
      color: white;
      padding: 8px 16px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin-right: 8px;
      cursor: pointer;
      border-radius: 5px;
    }
    .button-container a {
      text-decoration: none;
      color: white;
    }
    .button-container a:hover {
      color: white;
    }
    .button-container button.edit {
      background-color: #28a745;
    }
    .button-container button.delete {
      background-color: #dc3545;
    }
  </style>
</head>
<body>
  <h2><center>Data Siswa</center></h2>
  <h1><center>UNIVERSITAS PERANGKAT LUNAK</center></h1>

<div class="container">
  <div class="button-container">
    <nav>
      <button id="button">
        <a href="form_simpan.html">Tambah Data</a>
      </button>
    </nav>
  </div>
</div>

  <table border="1" width="100%">
  <tr>
    <th><center>NIS</center></th>
    <th><center>Nama</center></th>
    <th><center>Jenis Kelamin</center></th>
    <th><center>Telepon</center></th>
    <th><center>Alamat</center></th>
    <th colspan="2"><center>Aksi</center></th>
  </tr>
  <?php
  // Load file koneksi.php
  include "koneksi.php";
  // Buat query untuk menampilkan semua data siswa
  $sql = $pdo->prepare("SELECT * FROM siswa");
  $sql->execute(); // Eksekusi querynya
  while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$data['nis']."</td>";
    echo "<td>".$data['nama']."</td>";
    echo "<td>".$data['jenis_kelamin']."</td>";
    echo "<td>".$data['telp']."</td>";
    echo "<td>".$data['alamat']."</td>";
    echo "<td><a href='form_ubah.php?id=".$data['id']."'><button class='edit'>Ubah</button></a></td>";
    echo "<td><a href='proses_hapus.php?id=".$data['id']."'><button class='delete'>Hapus</button></a></td>";
    echo "</tr>";
  }
  ?>
  </table>
</body>
</html>