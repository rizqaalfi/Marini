<?php
session_start();
unset($_SESSION['login']);
?>

<?php


$username="";
$usernameErr="";
$email="";
$emailErr="";
$password="";
$passwordErr="";
$valpassword="";
$valid_pass=true;
$valid_pass_msg="";

// Cek form sudah di klik submit/belum
if(isset($_POST['submit'])){
    
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $valpassword= trim($_POST['valpassword']);
    

// Cek input kosong

if(empty($username)){
    $usernameErr = "Isikan Username<br>";
}
if(empty($password)){
    $passErr = "isikan Password<br>";
}
if(empty($email)){
    $emailErr = "isikan E-mail<br>";
}

// cek konfirmasi password sama atau tidak
if($password != $valpassword){
    $valid_pass = false;
    $valid_pass_msg= "Password konfirmasi tidak sama.<br>";
}

if( !empty($username) and !empty($email) and !empty($password) and $valid_pass){

    
    function terima(){
        include 'konek.php';
        
        $username = $_REQUEST['username'];
        $email=$_REQUEST['email'];
        $password=$_REQUEST['password'];
        $level=$_REQUEST['level'];
        
            //insert data on datakaryawan table 
            $input ="INSERT INTO user (username, email, password,level) 
            VALUES('$username','$email','$password','$level')";
        
        //check insert table
        if($conn->query($input)===true){
        
            echo '<script language="javascript">
                      alert ("new data created Successfully!");
                      window.location="login.php";
                      </script>';
                      exit();
        }else{
        echo "Error". $input . "<br>" . $conn->connect_error;
        }
        
        }
   terima();

}

}


?>

<html>
<head>
<title>Halaman Sign Up</title>

<style>
*{
    margin: 0;
    padding: 0;
    outline: 0;
    font-family: 'Open Sans', sans-serif;
}
body{
    height: 100vh;
    min-height:200px;
     background-image: url(backg.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.container{
    position: absolute;
    left: 75%;
    top: 50%;
    transform: translate(-50%,-50%);
    padding: 60px 25px;
    width: 30%;
    min-height:200px;
    background-color: rgba(0,0,0,.7);
    box-shadow: 0 0 10px rgba(255,255,255,.3);
}
.container h1{
    text-align: center;
    color: #fafafa;
    margin-bottom: 30px;
    text-transform: uppercase;
    border-bottom: 4px solid yellow;
}
.container label{
    text-align: left;
    color: white;
}
.container form input{
    width: calc(100% - 20px);
    padding: 8px 10px;
    margin-bottom: 15px;
    border: none;
    background-color: transparent;
    border-bottom: 2px solid yellow;
    color: #fff;
    font-size: 20px;
    
}
.container form button{
    width: 100%;
    padding: 5px 0;
    border: none;
    background-color:yellow;
    font-size: 18px;
    font-collor: black;
}

</style>
</head>

<body>
<br></br>

        <div class="container ">
	<h1>Sign Up</h1>
	<form method="post" action="daftar.php">
	<label>User Name</label><br>
                <input type="text" name="username" value="<?php echo $username ?>"><br>
                <?php echo $usernameErr?>
	<label>Email</label><br>
                <input type="email" name="email" value="<?php echo $email?>"><br>
                <?php echo $emailErr ?>
    <label>Password</label><br>
                <input type="password" name="password" value="<?php echo $password?>"><br>
                <?php echo $passwordErr?>
	 <label>Verification Pass</label><br>
                <input type="password" name="valpassword"><br>
                <?php echo $valid_pass_msg?>
    <input type="hidden" name="level" value="user">
            <button type="submit" name="submit" value="submit">Sign Up</button>
     </form>
    
     <div style="color:white">
         <br>
     <p >sudah memiliki akun ?<span style="color:yellow"><a href="login.php">Login</a></span></p>
        </div>
        </div>
        
            
    </body>
</html>