<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['loginadmin']);

?>
<html>
<head><title>Logout</title></head>
<body>
<h1>Anda telah berhasil logout</h1>
Anda akan otomatis kembali ke <a href="login.php">halaman login</a>
<script>
var anu = function() {
    window.location = "login.php";
};
setTimeout(anu,100);
</script>
</body>
</html>