<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Fungsi untuk mengubah status to-do menjadi selesai
function ubahStatus($id) {
    global $conn;
    
    // Ubah status to-do menjadi selesai (status = 1)
    $query = "UPDATE todolist SET status = 'selesai' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        return mysqli_affected_rows($conn);
    } else {
        return -1; // Kembalikan nilai -1 jika terjadi kesalahan
    }
}

// Periksa apakah ada parameter id yang diterima melalui URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $result = ubahStatus($id); // Panggil fungsi ubahStatus dengan parameter id

    // Periksa hasil dari pemanggilan fungsi ubahStatus
    if ($result > 0) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>
                alert('Gagal mengubah status');
                window.history.back();
              </script>";
    }
} else {
    // Jika tidak ada parameter id yang diterima, kembali ke halaman sebelumnya
    header("Location: index.php");
    exit;
}
?>
