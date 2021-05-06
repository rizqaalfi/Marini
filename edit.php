<?php

session_start();
include 'konek.php';

if(isset($_POST['submit'])){

// Ambil Data yang Dikirim dari Form
$judul=$_POST['judul'];
$id = $_POST['id'];
$waktu=$_POST['waktu'];
$anggaran =$_POST['anggaran'];
$kategori=$_POST['kategori'];
$orang =$_POST['orang'];
$bahan=$_POST['bahan'];
$cara=$_POST['cara'];




$query = "UPDATE resep SET  judul ='$judul',
       waktu ='$waktu',anggaran ='$anggaran', kategori='$kategori',orang='$orang',bahan='$bahan',cara='$cara'
       WHERE id_resep=$id";
      $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
      
      if($sql){
        // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        
        echo '<script language="javascript">
            alert ("update Successfully!");
            window.location="profile.php";
            </script>';
        exit();
         // Redirectke halaman upload.php
      }else{
        // Jika Gagal, Lakukan :
      echo '<script language="javascript">
            alert ("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database");
            window.location="editresep.php";
            </script>';
        exit(); 
      
      }



    }

?>