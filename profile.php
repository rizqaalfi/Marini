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

    <?php
    if (!isset($_SESSION['login'])) { ?>
        <script language="javascript">
            alert("Harap Login terlebih dahulu!  Anda akan secara otomatis dialihkan ke halaman login setelah klik OK.");
            window.location = "login.php";
        </script>;
        exit();

    <?php } else { ?>


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
                            <li class="active"><a href="profile.php">Profile</a></li>
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

        <!-- Hero Search Section End -->
        <?php
        $user = mysqli_query($conn, "SELECT * FROM user WHERE username='$_SESSION[login]'");
        $r = mysqli_fetch_array($user);
        ?>
        <!-- About Me Section Begin -->
        <section class="about-me spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="about-left">
                            <center> <?php echo "<img  src='img/profile/$r[foto_user]'>"; ?></center>
                            <div class="about-title">

                                <span> <?php  ?></span>
                                <h2><?php echo $r['NamaLengkap'] ?> </h2>
                                <p><?php echo $r['keterangan'] ?> </p>
                                <center>

                                    <a href="edit_user.php?id=<?= $r['id_user'] ?>" class="w3-bar-item w3-button">Edit</a>
                                </center>

                            </div>

                        </div>
                    </div>

                    <?php

                    ?>
                    <div class="col-lg-4 w3-light-grey w3-padding ">
                        <div class="about-right">
                            </br>
                            <h2><b>Pinned Recipe</b></h2>
                            <br>
                            <?php
                            $pinn = "SELECT * FROM resep
                                inner join pin on resep.id_resep= pin.id_resep where pin.id_user='$r[id_user]'";
                            $sql = mysqli_query($conn, $pinn) or die(mysqli_error($conn));
                            while ($data = mysqli_fetch_array($sql)) { ?>


                                <a href="resep.php?id=<?= $data['id_resep'] ?>">
                                    <div class="w3-card w3-white w3-padding w3-hover-pink" style="width: 85%;">

                                        <div class="w3-row">
                                            <div class="w3-half">

                                                <img src="img/upload/<?php echo $data['foto'] ?>" width="80" height="80">


                                            </div>
                                            <div class="w3-half w3-left">
                                                <h5><b><?= $data['judul'] ?></b></h5>
                                                <div class="w3-small " style="color: pink;"><?= $data['date'] ?></div>
                                            </div>

                                        </div>

                                    </div>
                                </a>
                                <br>




                            <?php      }
                            ?>





                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- About Me Section End -->

        <!-- Similar Recipe Section Begin -->
        <section class="similar-recipe spad">
            <div class="container">

                <h2 class="w3-wide" style="color:white">Resep Saya</h2>
                <br>
                <div class="row">

                    <?php
                    $user = mysqli_query($conn, "SELECT * FROM user WHERE username='$_SESSION[login]'");
                    $r = mysqli_fetch_array($user);

                    $query = "SELECT*FROM resep WHERE resep.id_user='$r[id_user]'";
                    $q = mysqli_query($conn, $query);

                    $no = 0;
                    while ($row = mysqli_fetch_array($q)) {
                        $no++; ?>

                        <div class="w3-panel  col-lg-3 col-md-6 w3-hover-pink">


                            <div class="similar-item">
                                <a href="resep.php?id=<?= $row['id_resep'] ?>">
                                    <?php
                                    echo "<img  src='img/upload/$row[foto]' width='100px' height='100px'>";
                                    ?>
                                </a>
                                <div class="similar-text">

                                    <h6> <?php echo $row['judul']; ?></h6>
                                    <div class="w3-small" style="color:pink"> <?php echo $row['tanggal']; ?> </div>

                                    <div class="container">
                                        <div class="w3-display-left">
                                            <div class="w3-dropdown-hover">
                                                <i class="w3-button w3-dark-grey fa fa-cog w3-opacity" style="color:white"></i>
                                                <div class="w3-dropdown-content w3-bar-block w3-border">
                                                    <a href="delresepuser.php?id=<?= $row['id_resep'] ?>" onclick="return confirm('yakin akan menghapus data?')" class="w3-bar-item w3-button"> Delete</a>
                                                    <a href="editresep.php?id=<?= $row['id_resep'] ?>" class="w3-bar-item w3-button">Edit</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  }  ?>
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
                            <p>Marini merupakan aplikasi rekomendasi masakan, bila anda bingung ingin masak apa maka jangan ragu
                                untuk menggunakan marini. Terima kasih sudah mengunjungi halaman kami, semoga aplikasi web
                                ini bermanfaat bagi anda.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <p>Anda juga bisa mengunjungi akun sosial media kami dibawah ini !</p>
                        <div class="social-links">
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

    <?php  } ?>

</html>