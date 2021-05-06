<?php
session_start();
include 'konek.php';

?>
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

    <header class="header-section ">
        <div class="container ">

            <div class="nav-menu ">
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="home.php">Home</a></li>
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




    <!-- Page Top Recipe Section Begin -->

    <section class="page-top-recipe">
        <center>


            <div class="w3-container  w3-topbar " style="width: 70%;">

                <?php
                include 'konek.php';
                $kategori = "";
                $keyword = "";
                $anggaran = "";
                $waktu = "";
                $orang = "";
                if (isset($_POST['search'])) {
                    $kategori = $_POST['kategori'];
                    $keyword = $_POST['keyword'];
                    $anggaran = $_POST['anggaran'];
                    $waktu = $_POST['waktu'];
                    $orang = $_POST['orang'];
                }
                ?>
                <form action="" method="POST">
                    <div class="w3-section w3-padding-16">

                        <div class="form-group">
                            <select class="form-control w3-select w3-hover-light-grey w3-center" name="kategori" id="kategori" style="width:50%">
                                <option value="">Pilih kategori</option>
                                <option value="Makanan" <?php if ($kategori == "Makanan") {
                                                            echo "selected";
                                                        } ?>>Makanan</option>
                                <option value="Minuman" <?php if ($kategori == "Minuman") {
                                                            echo "selected";
                                                        } ?>>Minuman</option>
                                <option value="Camilan" <?php if ($kategori == "Camilan") {
                                                            echo "selected";
                                                        } ?>>Camilan</option>
                                <option value="Kue" <?php if ($kategori == "Kue") {
                                                        echo "selected";
                                                    } ?>>Kue</option>

                            </select>
                        </div>


                        <input class="w3-input w3-center form-control" placeholder="Masukkan Keyword (Bahan / Judul)" name="keyword" id="keyword" type="text" value="<?php echo $keyword; ?>"><br>

                        <div class="w3-row-padding">
                            <div class="w3-third form-group">

                                <select class="form-control w3-select w3-hover-light-grey" id="waktu" name="waktu">
                                    <option value="">Pilih Waktu</option>
                                    <option value="5-10" <?php if ($waktu == "5-10") {
                                                                echo "selected";
                                                            } ?>>5-10 Menit</option>
                                    <option value="10-15" <?php if ($waktu == "10-15") {
                                                                echo "selected";
                                                            } ?>>10-15 Menit</option>
                                    <option value="15-20" <?php if ($waktu == "15-20") {
                                                                echo "selected";
                                                            } ?>>15-20 Menit</option>
                                    <option value="20-30" <?php if ($waktu == "20-30") {
                                                                echo "selected";
                                                            } ?>>20-30 Menit</option>
                                    <option value="30-40" <?php if ($waktu == "30-40") {
                                                                echo "selected";
                                                            } ?>>30-40 Menit</option>
                                    <option value="40-60" <?php if ($waktu == "40-60") {
                                                                echo "selected";
                                                            } ?>>40-60 Menit</option>
                                    <option value=">60" <?php if ($waktu == ">60") {
                                                            echo "selected";
                                                        } ?>> >60 Menit</option>

                                </select>
                            </div>

                            <div class="w3-third form-group">
                                <select class="form-control w3-select w3-hover-light-grey" id="anggaran" name="anggaran">
                                    <option value="">Pilih anggaran</option>
                                    <option value="5-10" <?php if ($anggaran == "5-10") {
                                                                echo "selected";
                                                            } ?>>5.000-10.000</option>
                                    <option value="10-15" <?php if ($anggaran == "10-15") {
                                                                echo "selected";
                                                            } ?>>10.000-15.000</option>
                                    <option value="15-20" <?php if ($anggaran == "15-20") {
                                                                echo "selected";
                                                            } ?>>15.000-20.000</option>
                                    <option value="20-30" <?php if ($anggaran == "20-30") {
                                                                echo "selected";
                                                            } ?>>20.000-30.000</option>
                                    <option value="30-40" <?php if ($anggaran == "30-40") {
                                                                echo "selected";
                                                            } ?>>30.000-40.000</option>
                                    <option value="40-60" <?php if ($anggaran == "40-60") {
                                                                echo "selected";
                                                            } ?>>40.000-60.000</option>
                                    <option value="80-100" <?php if ($anggaran == "80-100") {
                                                                echo "selected";
                                                            } ?>>80.000-100.000</option>
                                    <option value=">100" <?php if ($anggaran == ">100") {
                                                                echo "selected";
                                                            } ?>>100.000</option>
                                </select>
                            </div>

                            <div class="w3-third form-group">
                                <select class="form-control w3-select w3-hover-light-grey" id="orang" name="orang">
                                    <option value="">Pilih Porsi</option>
                                    <option value="1-3" <?php if ($orang == "1-3") {
                                                            echo "selected";
                                                        } ?>>1-3</option>
                                    <option value="4-7" <?php if ($orang == "4-7") {
                                                            echo "selected";
                                                        } ?>>4-7</option>
                                    <option value="7-10" <?php if ($orang == "7-10") {
                                                                echo "selected";
                                                            } ?>>7-10</option>
                                    <option value=">10" <?php if ($orang == ">10") {
                                                            echo "selected";
                                                        } ?>>>10</option>

                                </select>
                            </div>
                        </div>
                        <button id="search" name="search" class="w3-btn w3-pink">Search</button>


                    </div>

                </form>
            </div>
            <hr>


            <?php
            include 'konek.php';
            $s_kategori = '%' . $kategori . '%';
            $s_keyword = '%' . $keyword . '%';
            $s_waktu = '%' . $waktu . '%';
            $s_anggaran = '%' . $anggaran . '%';
            $s_orang = '%' . $orang . '%';
            $no = 1;
            $query = "SELECT * FROM resep WHERE kategori LIKE ? AND  (judul LIKE ? OR bahan LIKE ?) AND waktu LIKE ? AND anggaran LIKE ? AND orang LIKE ? ORDER BY id_resep DESC";
            $xx = $conn->prepare($query);
            $xx->bind_param('ssssss', $s_kategori, $s_keyword, $s_keyword, $s_waktu, $s_anggaran, $s_orang);
            $xx->execute();
            $res = $xx->get_result(); ?>

            <div class="row">


                <?php
                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        $no++;


                ?>
                        <div class="col-lg-3 col-sm-6 w3-container">
                            <div class="recipe-item w3-panel w3-card w3-hover-pink">
                                <div class="w3-padding">
                                    <a href="resep.php?id=<?= $row['id_resep'] ?>">
                                        <?php
                                        echo "<img  src='img/upload/$row[foto]' width='250px' height='250px'>";
                                        ?>
                                    </a>


                                </div>
                                <br>
                                <div class="">
                                    <h5>
                                        <?php
                                        echo $row['judul'];

                                        //
                                        ?>
                                    </h5>

                                </div>
                                <br>
                            </div>
                        </div>

                    <?php    }
                } else {  ?>
                    <div class="col-lg-3 col-sm-6">
                        <p> Data tidak di temukan !</p>
                    </div>
                <?php } ?>

            </div>



        </center>
        </div>
        </div>
        <!-- Categories Filter Section End -->

    </section>
    <!-- Page Top Recipe Section End -->





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