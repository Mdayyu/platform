<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require'functions.php';

//koneksi ke database
$conn = mysqli_connect("localhost", "root","","phpdasar");

//cek tombol submit sudah ditekan atau belum
if(isset ($_POST["submit"])){

    //cek apakah data berhasil ditambahan atau tidak
  if(tambah($_POST)> 0 ){
    echo "
    <script>
        alert('Data berhasil ditambahkan')
        document.location.href= 'index.php'; 
    </script>
    ";
  } else{   
    echo "<script>
        alert('Data gagal ditambahkan')
        document.location.href= 'index.php'; 
    </script>
    ";
  }}
 ?> 
<!DOCTYPE html>
<html>
<head>
    <title>Tambah </title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action= "" method = "post">
        <ul>
            
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="nrp">NRP: </label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan">Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input type="text" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type= "submit" name="submit">Tamabah Data</button>
            </li>
        </ul>
    </form>
    
</body>
</html>