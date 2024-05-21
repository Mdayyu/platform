<?php

session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
function hapus($id) {
    global $conn;
    $sql = "DELETE FROM tasks WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
 ?>