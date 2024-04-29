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
    <h1>Tambah</h1>
    <form action= "" method = "post">
        <ul>
            
            <li>
                <label for="todolist">To Do: </label>
                <input type="text" name="todolist" id="todolist" required>
            </li>
            <li>
                <label for="kegiatan"> Kegiatan: </label>
                <input type="text" name="kegiatan" id="kegiatan" required>
            </li>
    
            <li>
                <button type= "submit" name="submit">Tamabah Data</button>
            </li>
        </ul>
    </form>
    
</body>
</html>