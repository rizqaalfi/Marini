<?php
session_start();
include "konek.php";
$resep = "SELECT * FROM user
inner join resep on user.id_user= resep.id_user"; 
$keyword="";

if(isset($_POST["cari"])){
     $resep = cari($_POST["keyword"]);
     $keyword=$_REQUEST['keyword'];
}



function cari ($keyword){
    $query = "SELECT * FROM user
    inner join resep on user.id_user= resep.id_user 
     WHERE 
     username LIKE '%$keyword%' OR
     judul LIKE '%$keyword%'
    ";

    return ($query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Marini</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

<?php
    if(!isset($_SESSION['loginadmin'])){ ?>
        <script language="javascript">
                      alert ("Harap Login sebagai admin terlebih dahulu!  Anda akan secara otomatis dialihkan ke halaman login setelah klik OK.");
                      window.location="login.php";
                      </script>;
                      exit();
       
    <?php }  else { ?>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->

    <div class="hero-search set-bg" data-setbg="img/logo/bagtop.png">
        <div class="container">
             <div class="logo w3-center w3-padding-16">
                 <img src="img/logo/marin.png">
                
            </div>
        </div>
    </div>
    <header class="header-section">
        <div class="container">
           
            <div class="nav-menu ">
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li><a href="admin.php">User</a></li>
                        <li><a href="admin2.php">Resep</a></li>
                        <li><i class="fa fa-power-off"></i>
                            <ul class="sub-menu">
                                <li><a href="logout.php">Log out</a></li>
                                
                            </ul>
                    </ul>
                </nav>

            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->
<div>  <center>  
<h1>Data Resep</h1>
<br></br>
<form action="" method="post" >
    <input type="text" name="keyword" size="40" 
    placeholder="Masukkan keyword" autocomplate="off" value="<?php echo $keyword?>">
    <button type="submit" class="w3-button w3-khaki w3-round" name="cari">Cari</button>
  
</form>
<div class="w3-table w3-striped w3-hoverable ">    
  <table width="75%" class="w3-card"> 
  <tr align="center" class="w3-light-green">
    <th>no</th>
    <th>id_user</th>
    <th>Username</th>
    <th>Foto</th>
    <th>Resep</th>
    <th>Opsi</th>
  </tr>
  <br></br>
</div>
</div>
<br></br>
     
<?php
$no=1;

$sql = mysqli_query($conn, $resep) or die (mysqli_eror($conn));
while ($data = mysqli_fetch_array($sql)){ ?>
<tr align="center">
<td><?=$no++?>.</td>
<td><?=$data['id_user']?></td>
<td><?=$data['username']?></td>
<td>
    <img src="img/upload/<?php echo $data['foto']?>" width="80" height="80">
</td>
<td><?=$data['judul']?></td>
<td>
    <a href="delresep.php?id=<?=$data['id_resep']?>" onclick="return confirm('yakin akan menghapus data?')"  class="btn fa fa-trash"></a>
</td>
</tr>

<?php
}
?>

</table>
<br></br>
    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="fs-left">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/footer-logo.png" alt="">
                            </a>
                        </div>
                        <p>Aplikasi Marini memudahkan Anda untuk mecari berbagai resep masakan, 
                            Anda juga bisa berbagi resep dengan rekan rekan baru Anda.
                            Karena aplikasi ini memdukung pencarian resep dalam satu halaman,
                            dan menyimpannya di halaman profil Anda dengan satu kali klik.</p>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <p>Anda juga bisa mengunjungi akun sosial media kami dibawah ini !</p>
                    <div class="social-links" id="contact">
                        <a href="#"><i class="fa fa-instagram"></i><span>Instagram</span></a>
                        <a href="#"><i class="fa fa-pinterest"></i><span>Pinterest</span></a>
                        <a href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                        <a href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                        <a href="#"><i class="fa fa-youtube"></i><span>Youtube</span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>
</body>

<?php } ?>

</html>