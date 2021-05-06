<?php
if (!isset($_SESSION['login'])) { ?>
  <script language="javascript">
    alert("Harap Login terlebih dahulu!  Anda akan secara otomatis dialihkan ke halaman login setelah klik OK.");
    window.location = "login.php";
  </script>;
  exit();

<?php } ?>