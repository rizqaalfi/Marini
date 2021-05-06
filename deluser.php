<?php
include "konek.php";

mysqli_query($conn, "DELETE FROM user WHERE id_user='$_GET[id]'")or die(mysqli_error($conn));
  echo '<script language="javascript">
                      alert ("Data User berhasil terhapus !");
                      window.location="admin.php";
                      </script>';
                      exit();


?>

