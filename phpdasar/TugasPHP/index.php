<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require'functions.php';
$todo= query("SELECT * FROM todolist");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO LIST</title>
    <style>
        /* Gaya CSS untuk tata letak */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="logout.php">logout</a>
        <h1>To Do List</h1>
        <a href = "tambah.php"> Tambah</a>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>To Do List</th>
                    <th>Kegiatan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($todo as $row): ?>
                <tr>
                    <td><?php $i; ?></td>
                    
                    <td><?=$row["user_id"]?></td>
                    <td><?=$row["kegiatan"]?></td>
                    <td>
                        <a href = "update.php?id= <?=$row["id"]?>">Update</a>
                        <a href = "hapus.php?id= <?=$row["id"]?>" onclick="return confirm('apakah yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
               
                <!-- Tambahkan baris-baris data mahasiswa lainnya sesuai kebutuhan -->
            </tbody>
        </table>
    </div>
</body>
</html>
