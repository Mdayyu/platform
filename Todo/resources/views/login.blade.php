<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('download.jpg'); 
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
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin-top: 60px;
        }
        .profile-info {
            position: absolute; /* Tempatkan di pojok kiri atas */
            top: 20px;
            left: 20px;
            color: white; /* Ubah warna teks menjadi putih */
            display: flex; /* Mengelompokkan foto dan nama dalam satu baris */
            align-items: center; /* Memusatkan vertikal foto dan nama */
        }
        .profile-info img {
            width: 50px;
            border-radius: 100%;
            margin-right: 10px; /* Memberikan jarak antara foto dan nama */
        }
        h1 {
            margin-bottom: 20px;
        }
        .user-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button[type="button"] {
            background-color: #28a745;
        }
        button[type="submit"] {
            background-color: #007bff;
        }
        button[type="button"]:hover,
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            font-style: italic;
            margin-bottom: 10px;
        }
        .link-registration {
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="profile-info">
            <img src="images/aku2.jpg" alt="Foto Profil"> 
            <div>Ni Made Ayu S. / 225314021</div> 
        </div>
    <div class="container ">
        <h1><i class="fas fa-user user-icon"></i></h1>

        <?php if(isset($error)): ?>
            <p class="error-message">Username atau password salah</p>
        <?php endif; ?>

        <form action="" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div style="display: flex; align-items: center;">
                <label for="remember" style="margin-right: 10px;">Remember me</label>
                <input type="checkbox" name="remember" id="remember">
            </div>
            <div>
                <button type="submit" name="login"><i class="fas fa-lock"></i>Login</button>
            </div>
            <div class="link-registration">
                <a href='registrasi.php'>Create an account</a>
            </div>
        </form>
    </div>
</body>
</html>