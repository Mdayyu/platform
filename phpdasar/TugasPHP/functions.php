<?php 
//koneksi ke dtabase
$conn = mysqli_connect("localhost", "root","","phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn , $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;

}
return $rows;
}
function tambah($data) {
    global $conn;
     // ambil data dari tiap elemen dalam form
    $user_id =htmlspecialchars($data["user_id"]);
    $kegiatan =htmlspecialchars($data["kegiatan"]);
    $status=htmlspecialchars($data["status"]);

     // query insert data
     $query= "INSERT INTO todolist
     VALUES('','$user_id','$kegiatan', '$status')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    
}

function hapus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM todolist WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function update($data){
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $user_id =htmlspecialchars($data["user_id"]);
    $kegiatan =htmlspecialchars($data["kegiatan"]);
    $status =htmlspecialchars($data["status"]);;

    // query update data
    $query = "UPDATE todolist SET
              user_id = '$user_id', 
              kegiatan = '$kegiatan',
              status = '$status',
              WHERE id = $id";     

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function registrasi($data){
    global $conn;

    $username = strtolower (stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    
    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username= '$username'");
    if(mysqli_fetch_assoc($result)){
        echo"<script>
        alert('username sudah terdaftar!');
        </script>";

        return false;
    }
    //cek konfirmasi pw
    if($password !== $password2){
        echo"<script>
        alert('konfirmasi password tidak sesuai!');
        </script>";
    
    return false;
    }
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query( $conn,"INSERT INTO user VALUES('', '$username','$password')");

    return mysqli_affected_rows($conn);

}

?>