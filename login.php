<?php

$username = "";
$usernameErr = "";
$password = "";
$passErr = "";


// Cek form sudah di klik submit/belum
if (isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
}

if (!empty($username)) {

    function ya()
    {
        include 'konek.php';
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];



        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $login = mysqli_query($conn, $query);
        $cek = mysqli_num_rows($login);

        if ($cek > 0) {

            session_start();

            $data = mysqli_fetch_assoc($login);

            // cek jika user login sebagai admin
            if ($data['level'] == "admin") {

                // buat session login dan username
                $_SESSION['loginadmin'] = $username;
                $_SESSION['level'] = "admin";
                // alihkan ke halaman dashboard admin
                header("location:admin.php");

                // cek jika user login sebagai pegawai
            } else if ($data['level'] == "user") {
                // buat session login dan username
                $_SESSION['login'] = $username;
                $_SESSION['level'] = "user";
                // alihkan ke halaman dashboard pegawai
                header("location:home.php");
            } else {

                // alihkan ke halaman login kembali
                echo '<script language="javascript">
                      alert ("Data not found!");
                      window.location="login.php";
                      </script>';
                exit();
            }
        } else {
            echo '<script language="javascript">
                      alert ("Data not found!");
                      window.location="login.php";
                      </script>';
            exit();
        }
    }
    ya();
}





?>

<html>

<head>
    <title>Halaman Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            outline: 0;
            font-family: 'Open Sans', sans-serif;
        }

        body {
            height: 100vh;
            min-height: 200px;
            background-image: url(backg.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            position: absolute;
            left: 75%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 70px 25px;
            width: 30%;
            min-height: 200px;
            background-color: rgba(0, 0, 0, .7);
            box-shadow: 0 0 10px rgba(255, 255, 255, .3);
        }

        .container h1 {
            text-align: center;
            color: #fafafa;
            margin-bottom: 30px;
            text-transform: uppercase;
            border-bottom: 4px solid yellow;
        }

        .container label {
            text-align: left;
            color: white;
        }

        .container form input {
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin-bottom: 15px;
            border: none;
            background-color: transparent;
            border-bottom: 2px solid yellow;
            color: #fff;
            font-size: 20px;
        }

        .container form button {
            width: 100%;
            padding: 5px 0;
            border: none;
            background-color: yellow;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="login.php">
            <label>Username</label><br>
            <input type="text" name="username" value="<?php echo $username ?>"><br>

            <label>Password</label><br>
            <input type="password" name="password" value="<?php echo $password ?>"><br>

            <button type="submit" name="submit" value="submit">Log in</button>
        </form>

        <br>
        <p style="color:white">Belum memiliki akun ?<span style="color:yellow"><a href="daftar.php">Sign Up</a></span></p>
    </div>
</body>

</html>