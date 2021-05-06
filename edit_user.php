<?php

session_start();
include 'konek.php';
$id= $_GET['id'];

$usr1=mysqli_query($conn,"SELECT * FROM user WHERE id_user='$id'");
$usr = mysqli_fetch_array($usr1);


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
    <title>Home Marini</title>

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
    if(!isset($_SESSION['login'])){ ?>
        <script language="javascript">
                      alert ("Harap Login terlebih dahulu!  Anda akan secara otomatis dialihkan ke halaman login setelah klik OK.");
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
                        <li ><a href="home.php">Home</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="upload.php">Upload</a></li>
                        <li><a href="guide.html">Guide</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><i class="fa fa-power-off"></i>
                            <ul class="sub-menu">
                                <li><a href="logout.php">Log out</a></li>
                                <li><a href="daftar.php">Register</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>

            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->


    <!-- Page to Upload -->
    <section class="page-top-recipe">
        <center>
        <div class="w3-container  w3-topbar " style="width: 70%;">
            <br>
            
        </div>
       
        <div class="w3-container w3-border" style="width:70%">
            <h2 style="color:grey"> FORM UPDATE PROFILE</h2>
            <br>
            <form method="POST" action="upgbr_user.php" enctype="multipart/form-data">
                <div class="w3-center">
                    <input type="hidden" name="id" value="<?=$usr["id_user"];?>"> 
                </div>
                <div class="w3-center">
                         <img style="width:200px; height:200px"  src="img/profile/<?php echo $usr['foto_user'] ?>" alt="">
                            <br><br>
                    
                        <input type="file" name="gambar"> 
                </div> 
                <input type="submit" name="submit" value="Update Foto"></input>


            </form>
            <form method="POST" action="edit2.php" enctype="multipart/form-data" >
               
                <div class="w3-container w3-center" >
                <div class="w3-section w3-padding-16">
                <div class="w3-center">
                    <input type="hidden" name="id" value="<?=$usr["id_user"];?>"> 
                </div>
                
                
                
                <div class="container">
                    <div class="w3-row-padding">
                        <div class="w3-container w3-half ">
                                <div class="w3-row">
                                    <div class="w3-col l4 w3-left">Username:</div>
                                    <div class=" w3-col l5"><input class="form-control"  name="username"  type="text" value="<?=$usr["username"];?>"></div>
                                </div>
                                <br>
                                <div class="w3-row">
                                    <div class="w3-col l4 w3-left">Nama:</div>
                                    <div class=" w3-col l5"><input class="form-control"  name="NamaLengkap"  type="text" value="<?=$usr["NamaLengkap"];?>"></div>
                                </div>
                                <br>
                                <div class="w3-row">
                                    <div class="w3-col l4 w3-left">Email:</div>
                                    <div class=" w3-col l5"><input class="form-control"  name="email"  type="text" value="<?=$usr["email"];?>"></div>
                                </div>
                            
                        </div>
                        <div class="w3-container w3-half">
                                <textarea class="form-control" name="keterangan" rows="10" placeholder="Tulis keterangan/biodata Disini !" required><?=$usr["keterangan"];?></textarea>
                        </div>
                        
                </div>
            </div>
            <br>
            <input type="submit" name="submit" value="Update Data"></input>   
            </center>

        </form>
        </div>  
    <br>
    </section>

  
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
                            dan menyimpannya di halaman profil Anda dengan satu kali klik.

                        </p>
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

<?php  } ?>

</html>