<?php

session_start();
include 'konek.php';
$id= $_GET['id'];

$rsp1=mysqli_query($conn,"SELECT * FROM resep WHERE id_resep='$id'");
$rsp = mysqli_fetch_array($rsp1);



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
       
        <div class="w3-container w3-border w3-padding-64 " style="width:70%">
            <h2 style="color:grey"> FORM UPDATE RESEP</h2>
            <br>
            <div class="w3-row">
                <div class="w3-col l4">
                    <form method="POST" action="updategbr_rsp.php" enctype="multipart/form-data">
                        <div class="w3-center">
                            <input type="hidden" name="id" value="<?=$rsp["id_resep"];?>"> 
                        </div>
                         <div class="w3-center">
                            <img style="width:200px; height:200px"  src="img/upload/<?php echo $rsp['foto'] ?>" alt="">
                             <br><br>
                            <input type="file" name="gambar"> 
                        </div> 
                        <input type="submit" name="submit" value="Update Foto"></input>
                    </form>
                </div>

            <div class="w3-col l8">
                 <form method="POST" action="edit.php" enctype="multipart/form-data" >
               
                <div class="w3-container w3-left" >
                <div class="w3-section w3-padding-16">
                <div class="w3-center">
                    <input type="hidden" name="id" value="<?=$rsp["id_resep"];?>"> 
                </div>
                    <span class="w3-left">Judul:</span> 
                    <input class="form-control" name="judul"  type="text" value="<?=$rsp["judul"];?>"><br>
                    
                        <div class="w3-row-padding">
                            <div class="w3-half">
                                <select class="form-control w3-select w3-hover-light-grey"  name="waktu" >
                                    
                                    <option value="<?=$rsp["waktu"];?>" > Waktu ( Menit ) : <?=$rsp["waktu"];?></option>
                                    <option value="5-10">5-10</option>
                                    <option value="10-15">10-15</option>
                                    <option value="15-20">15-20</option>
                                    <option value="20-30">20-30</option>
                                    <option value="30-40">30-40</option>
                                    <option value="40-60">40-60</option>
                                    <option value=">60">>60</option> 
                                </select>
                            </div>
    
                            <div class="w3-half">
                                <select class="form-control w3-select w3-hover-light-grey"  name="anggaran" >
                                   
                                    <option value="<?=$rsp["anggaran"];?>"> Anggaran ( Ribu Rupiah ) : <?=$rsp["anggaran"];?></option>
                                    <option value="5-10">5-10</option>
                                    <option value="10-15">10-15</option>
                                    <option value="15-20">15-20</option>
                                    <option value="20-30">20-30</option>
                                    <option value="30-40">30-40</option>
                                    <option value="40-60">40-60</option>
                                    <option value="60-80">60-80</option> 
                                    <option value="80-100">80-100</option>
                                    <option value=">100">>100</option>
                                </select>
                            </div>

                        </div>
                        
                        <div class="w3-row-padding">
                            <div class="w3-half">
                               <select class="form-control w3-select w3-hover-light-grey"  name="kategori"  >
                                    
                                    <option value="<?=$rsp["kategori"];?>">Kategori Resep : <?=$rsp["kategori"];?></option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                    <option value="Camilan">Camilan(Makanan Ringan)</option>
                                    <option value="Kue">Kue</option>
                                </select>
                            </div>
    
                            <div class="w3-half">
                                <select class="form-control w3-select w3-hover-light-grey"  name="orang" >
                                   <option value="<?=$rsp["orang"];?>"> Porsi : <?=$rsp["orang"];?> </option>
                                   <option value="1-3">1-3</option>
                                   <option value="4-7">4-7</option>
                                   <option value="7-10">7-10</option>
                                   <option value=">10">>10</option>
                               </select>
                            </div>

                        </div>

                        
                </div>
                </div>
                
                
                
                <div class="container">
                    <div class="w3-row-padding">
                        
                    <textarea class="form-control " name="bahan"  rows="15" placeholder="Tulis Bahan Resep Disini !" required><?=$rsp["bahan"];?></textarea>
                </div>
                <br>
                <div class="w3-container">
                    <textarea class="form-control " name="cara"  rows="15" placeholder="Tulis Cara Membuat disini !" required><?=$rsp["cara"];?></textarea>
                </div>
            </div>
            <br>
            <input type="submit" name="submit" value="Update Data"></input>   
            </center>

        </form>
                </div>
            </div>
           
           
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