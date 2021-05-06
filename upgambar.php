<?php
session_start();

include "konek.php";

// Ambil Data yang Dikirim dari Form
$judul=$_REQUEST['judul'];
$waktu=$_REQUEST['waktu'];
$anggaran =$_REQUEST['anggaran'];
$kategori=$_REQUEST['kategori'];
$orang =$_REQUEST['orang'];
$bahan=$_REQUEST['bahan'];
$cara=$_REQUEST['cara'];
$nama_file = $_FILES['gambar']['name'];
$tipe_file = $_FILES['gambar']['type'];
$ukuran_file = $_FILES['gambar']['size'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$tanggal=date("Y-m-d");
$user=mysqli_query($conn,"SELECT * FROM user WHERE username='$_SESSION[login]'");
$r= mysqli_fetch_array($user);





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
      $query = "INSERT INTO resep(foto, tipe_foto, ukuran_foto, judul, waktu,anggaran, kategori,orang,bahan,cara,tanggal,id_user)
       VALUES('".$nama_file."','".$tipe_file."','".$ukuran_file."','$judul','$waktu','$anggaran','$kategori','$orang','$bahan','$cara','$tanggal', $r[id_user])";
      $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
      
      if($sql){
        // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        
        echo '<script language="javascript">
            alert ("Upload Successfully!");
            window.location="upload.php";
            </script>';
        exit();
         // Redirectke halaman upload.php
      }else{
        // Jika Gagal, Lakukan :
      /* echo '<script language="javascript">
            alert ("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database");
            window.location="upload.php";
            </script>';
        exit(); */
      
      }
    }else{
      // Jika gambar gagal diupload, Lakukan :
      echo '<script language="javascript">
            alert ("Maaf, Gambar gagal untuk diupload");
            window.location="upload.html";
            </script>';
        exit();
     
    }
  }else{
    // Jika ukuran file lebih dari 1MB, lakukan :
    echo '<script language="javascript">
            alert ("Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB");
            window.location="upload.html";
            </script>';
        exit();
    
  }
}else{
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
  echo '<script language="javascript">
            alert ("Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG");
            window.location="upload.html";
            </script>';
        exit();

}
?>
