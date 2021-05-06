<?php

session_start();
include 'konek.php';

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
                        <li><a href="home.php">Home</a></li>
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


    <!-- Resep-->
    <?php

    $resep = mysqli_query($conn, "SELECT * FROM resep WHERE id_resep='$_GET[id]'");
    $r = mysqli_fetch_array($resep);

    $u = mysqli_query($conn, "SELECT * FROM user WHERE user.id_user='$r[id_user]'");
    $c = mysqli_fetch_array($u);
    ?>


    <!-- Single Recipe Section Begin -->
    <section class="single-page-recipe spad">

        <div class="recipe-top">

            <div class="container-fluid">
                <div class="recipe-title">
                    <h2><?php echo $r['judul']; ?></h2>
                    <hr>
                </div>
                <center>
                    <img src="img/upload/<?php echo $r['foto'] ?>" alt="">
                </center>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="ingredients-item">
                        <div class="intro-item">
                            <img src="img/profile/<?php echo $c['foto_user'] ?>" alt="foto <?php echo $c['NamaLengkap'] ?>">
                            <h2><?php echo $c['NamaLengkap'] ?></h2>

                            <div class="reviews"><?php echo $c['keterangan'] ?></div>
                            <div class="recipe-time">
                                <ul>

                                </ul>
                            </div>
                        </div>
                        <div class="ingredient-list">
                            <div class="recipe-btn">
                                <a href="" class="black-btn" onclick="window.print()">Print Recipe</a>

                                <?php if (isset($_SESSION['login'])) { ?>

                                    <script type="text/javascript">
                                        function unpin() {
                                            var ans = confirm("Are You sure You want to Unpin!!");
                                            if (ans == true) {
                                                return true;
                                            } else {
                                                return false;
                                            }
                                            return false;
                                        }

                                        function pin() {
                                            var ans = confirm("Are You sure You want to Pin !!");
                                            if (ans == true) {
                                                return true;
                                            } else {
                                                return false;
                                            }
                                            return false;
                                        }

                                        function notLogin() {

                                            alert("Harap Login terlebih dahulu!  Anda akan secara otomatis dialihkan ke halaman login setelah klik OK.");
                                            window.location = "login.php";

                                            exit();

                                        }
                                    </script>


                                    <?php    //user yang login
                                    $userlogin = mysqli_query($conn, "SELECT * FROM user WHERE username='$_SESSION[login]'");
                                    $ul = mysqli_fetch_array($userlogin);

                                    //id resep pin yang sama dengan yang diakses saat ini
                                    //$pin = mysqli_query($conn, "SELECT * FROM pin WHERE pin.id_user = '$ul[id_user]' ");;
                                    $liat = true;

                                    $values = array();
                                    if ($stmt = $conn->query("SELECT * FROM pin WHERE pin.id_user = '$ul[id_user]' ")) {
                                        while ($rpin = $stmt->fetch_array(MYSQLI_ASSOC)) {
                                            $values[] = $rpin['id_resep'];
                                        }
                                    }

                                    if (in_array($r['id_resep'], $values)) { ?>
                                        <a class="black-btn" type="btn" href="update.php?id=<?php echo $ul['id_user']; ?>&idresep=<?php echo $r['id_resep']; ?>&status=<?php echo $r['status']; ?>" onclick="return unpin();"><?php echo "Unpin" ?></a></td>
                                    <?php } else { ?>
                                        <a class="black-btn" type="btn" href="update.php?id=<?php echo $ul['id_user']; ?>&idresep=<?php echo $r['id_resep']; ?>" onclick="return pin();"><?php echo "Pin" ?></a></td>

                                    <?php } ?>

                                <?php  } else { ?>


                                    <a href="pinNotLogin.php" id="pin" type="button" class="black-btn">Pin Recipe</a>

                                <?php } ?>




                            </div>
                        </div>
                    </div>
                    <div class="nutrition-fact">
                        <div class="nutri-title">
                            <h6>Kategori : <?php echo $r['kategori'] ?></h6>

                        </div>
                        <ul>
                            <li>Waktu: <span><?php echo $r['waktu'] ?> menit</span> </li>
                            <li>Budget: <span><?php echo $r['anggaran'] ?> ribu</span></li>
                            <li>Porsi : <span><?php echo $r['orang'] ?> orang</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="recipe-right">
                        <div class="recipe-desc w3-panel  w3-padding-large w3-border ">
                            <h3>Bahan-bahan :</h3>

                            <div><?php echo nl2br(str_replace('', '', htmlspecialchars($r['bahan']))); ?></div>

                        </div>
                        <div class="instruction-list w3-panel  w3-padding-large w3-border">
                            <h3>Cara Membuat :</h3>
                            <div><?php echo nl2br(str_replace('', '', htmlspecialchars($r['cara']))); ?></div>
                        </div>

                        <div class="panel w3-border w3-padding ">
                            <?php
                            $komen = mysqli_query($conn, "SELECT * FROM komen WHERE komen.id_resep = '$r[id_resep]'");

                            $h = 0;
                            while ($result = mysqli_fetch_assoc($komen)) {

                                $h++; ?>

                                <div class="w3-row">
                                    <div class="w3-col m9 l10">
                                        <p>
                                        <h5 style="font-weight: bold;"> <?php echo $result['nama']  ?></h5>


                                        <p> <?php echo nl2br(str_replace('', '', htmlspecialchars($result['konten']))); ?></p>
                                        <h6 style="color:blue; font-size:xx-small"><?php echo $result['tanggal'] ?></h6>

                                        </p>
                                    </div>
                                    <div class="w3-col m1 l1">
                                        <br><br>
                                        <script>
                                            function myx() {
                                                var $email = prompt("Masukkan email anda :");
                                                if (email != null) {
                                                    <?php
                                                    mysqli_query($conn, "DELETE FROM komen WHERE komen.email='$email'") ?>


                                                }
                                                if (email == null) {
                                                    alert("masukkan email anda!");
                                                }
                                            }
                                        </script>
                                        <a onclick="myx()"><i class="fa fa-trash w3-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>

                                <hr>

                            <?php
                            }
                            ?>

                        </div>
                        <div class="panel-heading">
                            <h4 class="panel-title w3-pink w3-padding">Tinggalkan Komentar</h4>
                        </div>
                        <div class="panel panel-primary  w3-border w3-padding">
                            <div class="panel-body">

                                <form method="POST" action="komen.php?id=<?= $r['id_resep'] ?>" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Nama </label>
                                        <input class="form-control" type="text" name="nama"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" name="email"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Komentar </label>
                                        <textarea class="form-control" type="text" name="komentar"></textarea>
                                    </div>
                                    <div class="form-group">

                                        <button class="w3-btn w3-pink" type="submit" name="submit" value="Kirim">Kirim</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </section>
    <!-- Single Recipe Section End -->

    <!-- Similar Recipe Section Begin -->
    <section class="similar-recipe spad">
        <div class="container">

            <h2 class="w3-wide" style="color:white">Resep Sejenis</h2>
            <br>
            <div class="row">

                <?php

                $query = mysqli_query($conn, "SELECT * FROM resep WHERE kategori='$r[kategori]'");

                $no = 0;
                while ($s = mysqli_fetch_array($query)) {
                    $no++;

                ?>

                    <div class="col-lg-3 col-md-6 w3-hover-pink">
                        <div class="similar-item">
                            <a href="resep.php?id=<?= $s['id_resep'] ?>">
                                <?php
                                echo "<img  src='img/upload/$s[foto]' width='100px' height='100px'>";
                                ?>
                            </a>
                            <div class="similar-text">
                                <h6> <?php echo $s['judul']; ?></h6>
                                <div class="w3-small" style="color:pink"> <?php echo $s['tanggal']; ?></div>

                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- Similar Recipe Section End -->





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
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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

</html>