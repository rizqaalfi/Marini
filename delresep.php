<?php
require "konek.php";

mysqli_query($conn, "DELETE FROM resep WHERE id_resep='$_GET[id]'")or die(mysqli_error($conn));
echo '<script language="javascript">
                      alert ("Data Resep berhasil terhapus !");
                      window.location="admin2.php";
                      </script>';
                      exit();
?>

