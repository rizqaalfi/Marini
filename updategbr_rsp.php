<?php

include 'konek.php';
session_start();



if(isset($_POST['submit'])){

$id = $_POST['id'];
$nama_file = $_FILES['gambar']['name'];
$tipe_file = $_FILES['gambar']['type'];
$ukuran_file = $_FILES['gambar']['size'];
$tmp_file = $_FILES['gambar']['tmp_name'];

// Set path folder tempat menyimpan gambarnya
$path = "img/upload/".$nama_file;

if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ 
// Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
  if($ukuran_file <= 1000000){
     // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
    // Proses upload
    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :  
      // Proses simpan ke Database
      $query = "UPDATE resep SET foto ='".$nama_file."', tipe_foto = '".$tipe_file."', ukuran_foto = '".$ukuran_file."'
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
    }else{
      // Jika gambar gagal diupload, Lakukan :
     echo '<script language="javascript">
            alert ("Maaf, Gambar gagal untuk diupload");
            window.location="editresep.php";
            </script>';
        exit(); 
     
    }
  }else{
    // Jika ukuran file lebih dari 1MB, lakukan :
    echo '<script language="javascript">
            alert ("Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB");
            window.location="editresep.php";
            </script>';
        exit(); 
    
  }
}else{
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
  echo '<script language="javascript">
            alert ("Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG");
            window.location="editresep.php";
            </script>';
        exit(); 

}



}

?>
