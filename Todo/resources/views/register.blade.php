
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('july.jpg'); 
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7); /* Hitam dengan tingkat transparansi 0.7 */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 300px;
            color: white;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #fff;
        }

        form ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        form div {
            margin-bottom: 15px;
            padding: 0 10px; /* Menambahkan padding ke elemen div */
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #fff;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 10px);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            color: black !important; /* Menetapkan warna teks menjadi hitam */
        }


        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3; /* Mengubah warna latar belakang tombol saat digerakkan */
        }

        .link-registration a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s; /* Efek hover untuk tautan */
        }

        .link-registration a:hover {
            color: #ffc107; /* Mengubah warna tautan saat digerakkan */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>REGISTER</h1>

        <form action="" method= "post">
            <ul>
                <div style="text-align: left;">
                    <label for="username">Username: </label>
                    <input type="text" name="username" id="username"  required>   
                </div>
                <div style="text-align: left;">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" required>   
                </div>
                <div style="text-align: left;">
                    <label for="password2">Confirm Password: </label>
                    <input type="password" name="password2" id="password2" required>   
                </div>
                <div>
                    <button type="submit" name="register">Register</button>
                </div>
                <div class="link-registration" style="cursor: pointer;">
                    <a href='login.php'>Already have an account? Login here.</a>
                </div>
            </ul>
        </form>
    </div>
</body>
</html>
