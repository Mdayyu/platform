<?php
require'functions.php';

// ambil data di URL
$id = $_GET["id"];


// query data mahasiswa bedasarkan id
$mhs= query("SELECT* FROM todolist WHERE id = $id")[0];



//koneksi ke database
$conn = mysqli_connect("localhost", "root","","phpdasar");

//cek tombol submit sudah ditekan atau belum
if(isset ($_POST["submit"])){

    //cek apakah data berhasil diubah atau tidak
  if(update($_POST)> 0 ){
    echo "
    <script>
        alert('Data berhasil di update')
        document.location.href= 'index.php'; 
    </script>
    ";
  } else{   
    echo "<script>
        alert('Data gagal di update')
        document.location.href= 'index.php'; 
    </script>
    ";
  }}


 ?> 
<!DOCTYPE html>
<html>
<head>
    <title>update </title>
</head>
<body>
    <h1>Update Data Mahasiswa</h1>
    <form action= "" method = "post">
        <input type="hidden" name="id" value="<?= $mhs["id"];?>">
        <ul>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" required
                value="<?= $mhs["nama"]?>">
            </li>
            <li>
                <label for="nrp">NRP: </label>
                <input type="text" name="nrp" id="nrp" required
                value="<?= $mhs["nrp"]?>">
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" required
                value="<?= $mhs["email"]?>">
            </li>
            <li>
                <label for="jurusan">Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan" required
                value="<?= $mhs["jurusan"]?>">
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input type="text" name="gambar" id="gambar" required
                value="<?= $mhs["gambar"]?>">
            </li>
            <li>
                <button type= "submit" name="submit">Update Data</button>
            </li>
        </ul>
    </form>
    
</body>
</html>