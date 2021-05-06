-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 03:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `komen`
--

CREATE TABLE `komen` (
  `id_komen` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `konten` varchar(300) NOT NULL,
  `id_resep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komen`
--

INSERT INTO `komen` (`id_komen`, `nama`, `email`, `tanggal`, `konten`, `id_resep`) VALUES
(1, NULL, NULL, NULL, 'jb', NULL),
(2, 'Rizqa Alfiani', 'rizqaalfiani7@gmail.com', '2021-01-27', 'jbd', 30),
(3, 'intan', 'intan@gmail.com', '2021-01-27', 'jbcub', 30),
(4, 'Naiya', 'msdn', '2021-01-27', 'msn d', 30),
(5, 'Naiya', 'jd', '2021-01-27', 'jsdj', 30),
(6, 'jd', 'ksnd', '2021-01-27', 'ks', 28),
(7, 'Naiya', 'ksd', '2021-01-27', 'ms', 28),
(8, 'Naiya', 'knv', '2021-01-27', 'mjdfn', 28),
(9, 'Rizqa Alfiani', 'mxc', '2021-01-27', 'jsd', 28),
(10, 'jds', 'jnds', '2021-01-27', 'snd', 28),
(11, 'lili', 'rizqaalfiani7@gmail.com', '2021-01-27', 'kjds', 28),
(12, 'jds', 'nsd', '2021-01-27', 'nsd', 28),
(13, 'jds', 'nsd', '2021-01-27', 'nsd', 28),
(14, 'jds', 'nsd', '2021-01-27', 'nsd', 28),
(15, 'jds', 'nsd', '2021-01-27', 'nsd', 28),
(16, 'jbsd', 'jnds', '2021-01-27', 'jnds', 28),
(17, 'jn', 'kd', '2021-01-27', 'jd', 28),
(18, 'jn', 'kd', '2021-01-27', 'jd', 28),
(19, 'Rizqa Alfiani', 'mxc', '2021-01-27', 'jd', 28),
(20, 'Rizqa Alfiani', 'rizqaalfiani7@gmail.com', '2021-01-27', 'Ulala.. enak banget nih bunn', 30),
(21, 'Naiya', 'ndf', '2021-01-27', 'mmmmmm\r\nkomksdnfn', 30),
(22, 'Rizqa Alfiani', 'rizqaalfiani7@gmail.com', '2021-01-30', 'alalalla', 27);

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `id_pin` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pin`
--

INSERT INTO `pin` (`id_pin`, `id_resep`, `id_user`, `date`) VALUES
(63, 30, 1, '2021-02-03'),
(65, 28, 1, '2021-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `tipe_foto` varchar(20) NOT NULL,
  `ukuran_foto` int(15) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `waktu` varchar(15) NOT NULL,
  `bahan` varchar(500) NOT NULL,
  `cara` varchar(1000) NOT NULL,
  `orang` varchar(10) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `anggaran` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `foto`, `tipe_foto`, `ukuran_foto`, `judul`, `waktu`, `bahan`, `cara`, `orang`, `kategori`, `anggaran`, `tanggal`, `id_user`, `status`) VALUES
(15, 'cakwe.jpg', 'image/jpeg', 78186, 'Cakwe Goreng renyah', '5-10', '* 250 gram tepung terigu protein sedang\r\n* 185 ml air\r\n* 1/2 sendok teh garam\r\n* 1/2 sendok teh amoniak bubuk\r\n* 1 3/4 sendok teh baking powder\r\n* minyak untuk menggoreng\r\n', '1. larutkan garam dan amoniak bubuk dalam 85 ml air. Sisihkan. \r\n2. Larutkan baking powder dalam sisa air. Sisihkan.\r\n 3. Ayak tepung terigu. Tambahkan larutan amoniak dan baking powder sedikit – sedikit sambil diuleni sampai kalis. Diamkan 20 menit. \r\n4. Uleni adonan sampai elastis. Tutup plastik, diamkan selama 6 jam. \r\n 5. Giling adonan setebal 1/2 cm di atas meja yang ditabur sedikit tepung\r\n 6. Potong panjang 10 cm lebar 2 cm. Tumpuk. Rekatkan dengan air. Tekan tengahnya dengan sumpit.\r\n 7. Menjelang digoreng, tarik sedikit adonan agar memanjang. \r\n8. Goreng dengan minyak yang sudah dipanaskan.\r\n\r\n', '4-7', 'Camilan', '10-15', '2020-12-28', 3, 0),
(26, 'ayam crispi pedas.jpg', 'image/jpeg', 122304, 'Ayam Krispi Pedas', '40-60', 'Bahan:\r\n\r\n1 kg ayam\r\nBahan Bumbu halus:\r\n\r\n8 siung bawang putih\r\n4 siung bawang merah\r\n6 buah cabai merah besar\r\n15 buah cabai rawit\r\nBumbu lain:\r\n\r\n1 sdt gula merah sisir\r\n1 sdt ketumbar bubuk\r\n1,5 sdt merica bubuk\r\n1 sdt kecap manis\r\n3 cm jahe, geprek\r\n5 cm lengkuas, geprek\r\n4 lembar daun jeruk\r\n2 lembar daun salam\r\ngaram secukupnya\r\nkaldu bubuk secukupnya', 'Cara memasak:\r\n\r\n* Kukus bahan bumbu halus, kemudian haluskan dengan ulekan atau blender\r\n* Potong ayam lalu cuci.\r\n* Kemudian beri perasan air jeruk nipis, garam, dan merica.\r\n* Diamkan 15 menit lalu goreng sebentar.\r\n* Tumis bumbu halus bersama jahe, lengkuas, daun jeruk, dan daun salam.\r\n* Beri air secukupnya, beri ketumbar bubuk, merica, gula merah, kecap manis, garam, dan kaldu bubuk.\r\n* Masukkan potongan ayam\r\n* kecilkan api masak hingga kuah menyusut.\r\n* Koreksi rasa\r\nSiap disajikan', '4-7', 'Makanan', '30-40', '2021-01-03', 3, 0),
(27, '727020846_6dd416d3-3c38-4bb2-8eac-a86f0ee372a5_471_471.jpg', 'image/jpeg', 55468, 'Boba', '20-30', 'Bahan kering\r\n250 gr tapioka\r\n20 gr cacao powder (bisa diganti nutrijel)\r\n\r\nBahan basah\r\n140 ml air\r\n10 gr tapioka\r\n60 gr palm sugar\r\n\r\nBahan pengental\r\n100 ml air\r\n70 gr palm sugar', 'Langkah\r\n1. Siapkan bahan. Campur bahan kering. Di wadah terpisah (panci) campur bahan basah, didihkan. Campurkan bahan kering dan basah\r\n\r\n2. Uleni hingga kalis. Bagi menjadi beberapa bagian. Bentuk panjang, lalu potong-potong atau langsung dibentuk bulat kecil\r\n\r\n3. Didihkan air dipanci untuk merebus. Setelah semua adonan selasai dibentuk. Masukan ke air mendidih\r\n\r\n4. Rebus di air mendidih hingga terapung. Lalu matikan api dan tutup panci. Diamkan selama 30 menit\r\n\r\n5. Setelah 30 menit, buka tutup panci, lalu tiriskan\r\n\r\n6. Siapkan bahan pengental di panci lain. Panaskan lalu aduk hingga larut. Masukan boba yang sudah ditiriskan. Aduk selama 5 menit hingga mengental. Lalu matikan api\r\n\r\nBoba siap disajikan. Bisa untuk pelengkap minuman lainnya\r\n', '>10', 'Minuman', '15-20', '2021-01-03', 1, 0),
(28, '18509512_707a2349-7d8b-498c-beb5-9d3675771249_1181_1365.png', 'image/png', 644230, 'Brownies Ekonomis ', '30-40', '70 gram tepung mocaf\r\n1/4 sdt baking powder\r\n10 gram coklat bubuk\r\n20 gram susu bubuk coklat\r\n40 gram dark cooking coklat lelehkan\r\n75 gram margarin lelehkan\r\n2 butir telur ukuran kecil\r\n100 gram gula pasir\r\n\r\nTopping : (Optional)\r\nKeju cheddar diparut kasar', '1. Siapkan bahan : Tim dark cooking coklat dan margarine (double boiler). Campur semua bahan kering (tepung mocaf, susu bubuk coklat, coklat bubuk, baking powder, aduk rata). Kocok telur dan gula hingga larut dengan whisk. masukkan lelehan dark cooking coklat dan margarine. Aduk rata terus.\r\n\r\n2. Tambahkan campuran tepung mocaf tadi sedikit demi sedikit sambil diaduk rata. Adonan memang agak lengket dan kental. aduk hingga rata saja, jangan overmix\r\n\r\n3. Masukkan adonan ke dalam loyang brownies yang sudah diberi alas kertas roti dan dioleh margarine. Taburi toppingnya, panggang hingga matang selama kurang lebih 45 menit (sesuaikan oven masing²). Setelah dingin. Baru dikeluarkan dan dipotong-potong sesuai selera\r\n', '>10', 'Kue', '30-40', '2021-01-09', 1, 0),
(30, 'Resep-Nasi-bakar-ikan-tongkol.jpg', 'image/jpeg', 293138, 'Nasi Bakar Tuna', '40-60', 'seprempat nasi uduk\r\n800 g ikan tuna\r\n8 cabe rawit\r\n10 cabe kriting\r\n4 bawang putih\r\n4 bawang merah\r\nsere\r\ndaun salam, daun jeruk\r\nsecukupnya gula garam', '1. Kukus ikan tuna 10mnit kemudin suir\"\r\n2. Haluskan bumbu\". kemudian tumis. masukan ikan dan kemangi tumis sebentr\r\n3. Susun di atas daun pisang, nasi, tuna, nasi lagi. gulung. bakar secukupnya di teflon\r\n', '4-7', 'Makanan', '60-80', '2021-01-03', 1, 0),
(36, 'nilapopon-20200514-151522-0-e9ed0be9c2f947c363ce16714986af10.jpg', 'image/jpeg', 269291, 'Es Jelly Mangga Mantap', '10-15', '- 1 saset Nutrijell mangga\r\n- Gula pasir secukupnya\r\n- 1 kaleng susu kental manis\r\n- 1,5 liter air\r\n- 2 buah mangga manis\r\n- 3 saset Nutrisari mangga\r\n- 2 saset Nutrisari jeruk manis', '1. Bikin Nutrijell sesuai petunjuk pemakaian di belakang kemasannya, lalu biarkan mengeras dan potong-potong dadu kecil\r\n2.  Kupas mangga lalu cuci bersih, potong kotak kecil seperti Nutrijell\r\n3. Campur susu kental manis, air dan gula, didihkan hingga gula larut, angkat dan biarkan hangat\r\n4.  jika sudah hangat masukkan Nutrisari, aduk rata, biarkan suhu ruang, jika sudah suhu ruang, masukkan jelly dan potongan mangga, siap di sajikan.', '>10', 'Minuman', '10-15', '2021-01-09', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `NamaLengkap` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto_user` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `NamaLengkap`, `email`, `password`, `id_user`, `foto_user`, `keterangan`, `level`) VALUES
('Rizqazain', 'Rizqa Alfiani sahaja', 'rizqaalfi@gmail.com', '123', 1, '7e377cdb8d7349174a4a316ba2e1a866.jpg', 'Resep yang saya tulis, sebgain besar merupakan resep turun temurun. jika ada ingin bertanya silahkan', 'user'),
('admin', '', 'llois@gmail.com', 'qwert', 2, '', '', 'admin'),
('lois', '', 'lois@gmail.com', 'qwerty', 3, '', '', 'user'),
('IndahSari', '', 'iin@gmail.com', 'asd', 9, '', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`id_komen`),
  ADD KEY `id_resep` (`id_resep`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`id_pin`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_resep` (`id_resep`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `resep_ibfk_1` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komen`
--
ALTER TABLE `komen`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
  MODIFY `id_pin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komen`
--
ALTER TABLE `komen`
  ADD CONSTRAINT `komen_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pin`
--
ALTER TABLE `pin`
  ADD CONSTRAINT `pin_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pin_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
