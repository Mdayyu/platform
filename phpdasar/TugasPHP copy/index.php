<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Proses tambah tugas
if (isset($_POST['tambah'])) {
    $kegiatan = $_POST['kegiatan'];
    $i = $_GET["ID"];
    tambah($kegiatan, $i);
    header("Location: index.php?ID=$i");
    exit;
}

// Proses tanda selesai tugas
if (isset($_GET['selesai'])) {
    $id = $_GET['selesai'];
    ubahStatus($id);
    header("Location: index.php");
    exit;
}

// Proses hapus tugas
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    hapus($id);
    header("Location: index.php");
    exit;
}

// Ambil semua tugas
$todos = mysqli_query($conn, "SELECT * FROM todolist");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
            font-family: Arial, sans-serif;
            background-image: url('foto1.jpg'); 
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Menjadikan konten menjadi satu kolom */
            height: 100vh;
        }


.container {
    background-color: rgba(0, 0, 0, 0.7);
    padding: 20px;
    color: black;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 400px; /* Lebar kontainer diperbesar agar muat dengan konten */
    text-align: center;
    margin-top: 60px;
}

h1 {
    margin-bottom: 20px;
    color: white;
}

input[type="text"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin: 5px 0 20px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: calc(50% - 11px); /* Lebar tombol disesuaikan agar dua tombol berada dalam satu baris */
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

.task-container {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.task-container input[type="text"] {
    flex: 1;
    margin-right: 10px;
}

.task-container button[type="submit"] {
    width: auto;
}

.task-list {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 10px;
    border-radius: 8px;
    margin-top: 20px;
    width: 100%;
}

.task-item {
    list-style: none;
    margin-bottom: 10px;
}

.task-actions a {
    color: black;
    text-decoration: none;
    margin: 0 5px; 
    padding: 5px 10px; 
    border-radius: 5px; 
    transition: background-color 0.3s ease;
}

.task-actions a:hover {
    background-color: rgba(255, 255, 255, 0.3); 
}

.task-actions a:nth-child(2) {
    margin-left: 0; 
}
.task-input {
    background-color: rgba(255, 255, 255, 0.8); /* Latar belakang untuk input */
    padding: 5px;
    border-radius: 4px;
    margin-bottom: 5px;
}

.task-buttons {
    background-color: rgba(0, 0, 0, 0.8); /* Latar belakang untuk tombol 'Selesai' dan 'Hapus' */
    padding: 5px;
    border-radius: 4px;
}

.task-buttons a {
    color: #fff; /* Warna teks tombol */
    text-decoration: none;
    margin-right: 5px; /* Memberikan jarak antara tombol */
}

    </style>
</head>
<body>
    <div class="container">
        <h1>ToDo List</h1>
        <form action="" method="post">
            <div class="task-container">
                <input style="margin-bottom: 10px;" type="text" name="kegiatan" placeholder="Tambah tugas" required>
                <button type="submit" name="tambah">Tambah</button>
            </div>
        </form>

    <ul class="task-list">
        <?php while ($row = mysqli_fetch_assoc($todos)) : ?>
            <li class="task-item">
            <div class="task-actions">
                <div class="task-input">
                <?php if ($row['status'] == "Aktif") { ?>
                    <?php echo $row['kegiatan']; ?>
                <?php } else { ?>
                    <s><?php echo $row['kegiatan']; ?></s>
                </div>
                <?php } ?>
                <div class="task-buttons">
                    <a href="?selesai=<?php echo $row['id']; ?>">Selesai</a>
                    <a href="?hapus=<?php echo $row['id']; ?>">Hapus</a>
                </div>
             </li>
        <?php endwhile; ?>
        <ul>
        <a href="logout.php">logout</a>
        </ul>
        
    </ul>
</body>
</html>
