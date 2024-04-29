<?php
session_start();

//cek cookie
if (isset($_COOKIE['id'])&& isset($_COOKIE['key'])){
    $id= $_COOKIE['id'];
    $key= $_COOKIE['key'];

    //mengambil username berdasarkan id
    $result= mysqli_query($con,"SELECT username FROM user WHERE id =$id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if($key === hash('sha256', $row['username'])){
        $_SESSION['login']= true;
    }
} 

if (isset($_SESSION["login"]) ){
    header("Location: index.php");
    exit;
}

require'functions.php';

if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1){

        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            //cek session
            $_SESSION["login"] = true;

            //cek remember me
            if (isset($_POST["remember"])){
                //buat cookie
                setcookie('id', $row['id'], time()+60);
                setcookie('key',hash('sha256', $row['username']), time()+ 60);
            }
            header("Location: index.php");
            exit;
        }
    }
    $error = true;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1>

    <?php if(isset($error) ): ?>
        <p style="color: red; font-style: italic;"> username / password salah</p>
        <?php endif; ?>


    <form action="" method="post">
        <ul>
            <li>
                <label for="username"> Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password"> Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember :</label>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>