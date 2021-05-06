<?php

session_start();
include 'konek.php';

if(isset($_POST['submit'])){

// Ambil Data yang Dikirim dari Form
$user=$_POST['username'];
$id = $_POST['id'];
$nama=$_POST['NamaLengkap'];
$email =$_POST['email'];
$keterangan=$_POST['keterangan'];


$query = "UPDATE user SET  username ='$user',
        NamaLengkap='$nama',email ='$email', keterangan='$keterangan' WHERE id_user='$id'";
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
