<?php

include "konek.php";


$komentar = $_REQUEST['komentar'];
$nama = $_REQUEST['nama'];
$email = $_REQUEST['email'];
$id = $_GET['id'];
$tanggal = date("Y-m-d");

$query = mysqli_query($conn, "INSERT INTO komen ( konten , nama, email, id_resep, tanggal) VALUES ( '$komentar', '$nama', '$email', '$id', '$tanggal' )");

if ($query) {
  // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  $resep = mysqli_query($conn, "SELECT * FROM resep WHERE resep.id_resep='$_GET[id]'");
  $r = mysqli_fetch_array($resep);
?>

  <script>
    var anu = function() {
      window.location = "resep.php?id=<?= $r['id_resep'] ?>";
    };
    setTimeout(anu, 100);
  </script>
<?php


  /*echo '<script language="javascript">
        alert ("Upload Successfully!");
        window.location="resep.php?id=<?=$r[id_resep]?>=";
        </script>';
  exit();
  // Redirectke halaman upload.php
} else {
  // Jika Gagal, Lakukan :
  /*echo '<script language="javascript">
        alert ("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database");
        window.location="komen.php";
        </script>';
  
  exit();*/
}

?>