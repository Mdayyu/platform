<?php 

$host = "localhost";
$user = "root";
$pass = "";
$database = "phpdasar";

//koneksi ke dtabase
$conn = mysqli_connect($host, $user, $pass, $database);

function query($query) {
    global $conn;
    $result = mysqli_query($conn , $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;

}
return $rows;
}
function tambah($kegiatan, $id) {
    global $conn;
    $kegiatan = mysqli_real_escape_string($conn, $kegiatan);
    $query = "INSERT INTO todolist (user_id, kegiatan) VALUES ('$id', '$kegiatan')";
    if (mysqli_query($conn , $query)) {
        return mysqli_affected_rows($conn);
    } else {
        // Tangani error
        echo "Error: " . mysqli_error($conn);
        return false;
    }

// Tambahkan todo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kegiatan'])) {
    // Memeriksa apakah form telah diisi
    if (empty($_POST['kegiatan'])) {
        echo "<script>alert('Form harus diisi terlebih dahulu.');</script>";
    } else {
        $kegiatan = $_POST["kegiatan"];
        $status = "";

        // Memeriksa apakah todo yang sama sudah ada
        $check_sql = "SELECT * FROM todolist WHERE kegiatan = '$kegiatan'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            echo "<script>alert('Todo yang sama sudah ada.');</script>";
        } else {
            // Menjalankan query untuk menambahkan todo baru jika semua syarat terpenuhi
            $sql = "INSERT INTO todolist (kegiatan, status, user_id) VALUES ('$kegiatan', '$status')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Todo berhasil ditambahkan.');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }}
    }
}

// Fungsi untuk mengubah status item to-do menjadi 'selesai'
function ubahStatus($id) {
    global $conn;
    $query = "UPDATE todolist SET status = 'Selesai' WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM todolist WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    
    // Periksa koneksi sebelum menjalankan query
    if (!mysqli_ping($conn)) {
        echo "<script>alert('Koneksi ke server MySQL terputus');</script>";
        return false;
    }

    // Query untuk memeriksa keberadaan username
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (!$result) {
        echo "<script>alert('Query tidak dapat dieksekusi');</script>";
        return false;
    }

    // Periksa apakah username sudah terdaftar
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah terdaftar');</script>";
        return false;
    }

    // Periksa kesesuaian password
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru ke database
    $query = "INSERT INTO user VALUES('', '$username', '$password')";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        return mysqli_affected_rows($conn);
    } else {
        echo "<script>alert('Registrasi gagal');</script>";
        return false;
    }
}


?>