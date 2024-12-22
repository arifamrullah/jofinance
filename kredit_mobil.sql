-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2015 at 01:19 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kredit_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar_cicilan`
--

CREATE TABLE IF NOT EXISTS `bayar_cicilan` (
  `kode_cicilan` int(10) NOT NULL AUTO_INCREMENT,
  `kode_kredit` int(10) DEFAULT NULL,
  `tgl_cicilan` date DEFAULT NULL,
  `jumlah_cicilan` int(11) DEFAULT NULL,
  `cicilan_ke` int(11) DEFAULT NULL,
  `cicilan_sisa_ke` int(11) DEFAULT NULL,
  `cicilan_sisa_harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_cicilan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `bayar_cicilan`
--

INSERT INTO `bayar_cicilan` (`kode_cicilan`, `kode_kredit`, `tgl_cicilan`, `jumlah_cicilan`, `cicilan_ke`, `cicilan_sisa_ke`, `cicilan_sisa_harga`) VALUES
(14, 22, '2015-03-12', 275990000, 0, 11, 275990000);

-- --------------------------------------------------------

--
-- Table structure for table `beli_cash`
--

CREATE TABLE IF NOT EXISTS `beli_cash` (
  `kode_cash` int(10) NOT NULL AUTO_INCREMENT,
  `KTP` varchar(20) DEFAULT NULL,
  `kode_mobil` varchar(10) DEFAULT NULL,
  `cash_tgl` date DEFAULT NULL,
  `cash_bayar` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_cash`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `beli_cash`
--

INSERT INTO `beli_cash` (`kode_cash`, `KTP`, `kode_mobil`, `cash_tgl`, `cash_bayar`) VALUES
(3, '3173020106880001', 'KM_1001', '2015-03-04', 372000000),
(4, '3273043012960006', 'KM_1003', '2015-03-04', 665200000),
(5, '3273043012960006', 'KM_1001', '2015-03-04', 372000000),
(6, '0963020511647554', 'KM_1001', '2015-03-04', 372000000),
(7, '3273200209970002', 'KM_1003', '2015-03-07', 665200000),
(8, '3275036108900025', 'KM_3002', '2015-03-11', 226500000),
(9, '143613462524', 'KM_1003', '2015-03-12', 665200000);

-- --------------------------------------------------------

--
-- Table structure for table `kredit`
--

CREATE TABLE IF NOT EXISTS `kredit` (
  `kode_kredit` int(10) NOT NULL AUTO_INCREMENT,
  `KTP` varchar(20) DEFAULT NULL,
  `kode_paket` varchar(10) DEFAULT NULL,
  `kode_mobil` varchar(10) DEFAULT NULL,
  `tgl_kredit` date DEFAULT NULL,
  `fotokopi_ktp` varchar(10) DEFAULT NULL,
  `fotokopi_kk` varchar(10) DEFAULT NULL,
  `fotokopi_slip_gaji` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kode_kredit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `kredit`
--

INSERT INTO `kredit` (`kode_kredit`, `KTP`, `kode_paket`, `kode_mobil`, `tgl_kredit`, `fotokopi_ktp`, `fotokopi_kk`, `fotokopi_slip_gaji`) VALUES
(22, '3273043012960006', 'TC_3011', 'KM_1001', '2015-03-12', 'Ada', 'Ada', 'Tidak Ada');

--
-- Triggers `kredit`
--
DROP TRIGGER IF EXISTS `auto_insert_bayar_cicilan`;
DELIMITER //
CREATE TRIGGER `auto_insert_bayar_cicilan` AFTER INSERT ON `kredit`
 FOR EACH ROW begin
declare v_kd_kredit int;
declare v_tgl date;
declare v_jumcil int;
declare v_kd_paket varchar(10);
declare v_cilsiske int;
declare v_sishar int;
select kode_kredit, kode_paket, tgl_kredit into v_kd_kredit, v_kd_paket, v_tgl from kredit where kode_kredit=new.kode_kredit;
select (harga_paket - uang_muka), paket_jumlah_cicilan, (harga_paket - uang_muka) into v_jumcil, v_cilsiske, v_sishar from paket_kredit where kode_paket=v_kd_paket;
insert into bayar_cicilan (kode_kredit, kode_paket, tgl_cicilan, jumlah_cicilan, cicilan_ke, cicilan_sisa_ke, cicilan_sisa_harga) values (v_kd_kredit, v_kd_paket, v_tgl, v_jumcil, 0, v_cilsiske, v_sishar);
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `auto_delete_bayar_cicilan`;
DELIMITER //
CREATE TRIGGER `auto_delete_bayar_cicilan` BEFORE DELETE ON `kredit`
 FOR EACH ROW begin
    declare v_kode_kredit int;
    select kode_kredit into v_kode_kredit from kredit where kode_kredit=old.kode_kredit;
    delete from bayar_cicilan where kode_kredit=v_kode_kredit;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(20) NOT NULL,
  `login_terakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logout_terakhir` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `login_terakhir`, `logout_terakhir`) VALUES
('admin', '2015-03-03 03:28:06', '0000-00-00 00:00:00'),
('arif', '2015-03-03 03:39:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
  `kode_mobil` varchar(10) NOT NULL,
  `merk` varchar(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `harga_mobil` bigint(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`kode_mobil`, `merk`, `type`, `warna`, `harga_mobil`, `gambar`) VALUES
('KM_1001', 'Toyota', 'COROLLA ALTIS 1.8 G M/T', 'Super White', 372000000, 'corolla-altis.jpg'),
('KM_1002', 'Toyota', 'NEW AVANZA 1.3 E M/T', 'Black Metallic', 164150000, 'black-metallic.png'),
('KM_1003', 'Toyota', 'FT 86 MANUAL', 'Velocity Orange', 665200000, '16u8g-toyota-86-gts-auto-2193-hero-940x529.jpg'),
('KM_2001', 'Daihatsu', 'AYLA D M/T MI', 'Black Metallic', 79950000, 'daihatsu-ayla.jpg'),
('KM_3001', 'Honda', 'I-VTEC 2,0L M/T', 'White', 387000000, 'hero01.png'),
('KM_3002', 'Honda', 'A I-VTEC 1,5L AT', 'Dark Brown Metallic', 226500000, 'honda-city-default-image.jpg'),
('KM_4001', 'Suzuki', 'ARENA SGX 1.5 M/T', 'Dark Purple Metallic', 171200000, 'apv-arena.jpg'),
('KM_4002', 'Suzuki', 'KARIMUN WAGON R DILAGO', 'Light Green', 105700000, 'SUZUKI-KARIMUN-WAGON-R.png'),
('KM_5001', 'Ford', 'NEW FIESTA 1.5L SPORT MT', 'Super White', 243300000, 'CAC40FOC221B022007.jpg'),
('KM_5002', 'Ford', 'Ranger RAS XL 2.2L 4x4 MT', 'Velocity Orange', 317200000, '1248893181901.jpg');

--
-- Triggers `mobil`
--
DROP TRIGGER IF EXISTS `auto_insert_paket_kredit`;
DELIMITER //
CREATE TRIGGER `auto_insert_paket_kredit` AFTER INSERT ON `mobil`
 FOR EACH ROW begin
    declare v_kode_mobil varchar(10);
    declare v_harga_mobil int;
    declare v_uang_muka int;
    declare v_tampung_11 int;
    declare v_nilai_cicilan_11 int;
    declare v_harga_paket_11 int;
    declare v_tampung_23 int;
    declare v_nilai_cicilan_23 int;
    declare v_harga_paket_23 int;
    select kode_mobil, harga_mobil into v_kode_mobil, v_harga_mobil from mobil where kode_mobil=new.kode_mobil;

    set v_uang_muka = (v_harga_mobil * 0.3);
    set v_tampung_11 = ((v_harga_mobil - v_uang_muka) / 11);
    set v_nilai_cicilan_11 = (v_tampung_11 * 0.06) + v_tampung_11;
    set v_harga_paket_11 = (v_nilai_cicilan_11 * 11) + v_uang_muka;
    set v_tampung_23 = ((v_harga_mobil - v_uang_muka) / 23);
    set v_nilai_cicilan_23 = (v_tampung_23 * 0.07) + v_tampung_23;
    set v_harga_paket_23 = (v_nilai_cicilan_23 * 23) + v_uang_muka;

    insert into paket_kredit values ("AA_0011", v_kode_mobil, v_harga_paket_11, v_uang_muka, 11, 0.06, v_nilai_cicilan_11),
("AA_0023", v_kode_mobil, v_harga_paket_23, v_uang_muka, 23, 0.07, v_nilai_cicilan_23);
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `auto_delete_paket_kredit`;
DELIMITER //
CREATE TRIGGER `auto_delete_paket_kredit` BEFORE DELETE ON `mobil`
 FOR EACH ROW begin
    declare v_kode_mobil varchar(10);
    select kode_mobil into v_kode_mobil from mobil where kode_mobil=old.kode_mobil;
    delete from paket_kredit where kode_mobil=v_kode_mobil;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `paket_kredit`
--

CREATE TABLE IF NOT EXISTS `paket_kredit` (
  `kode_paket` varchar(10) NOT NULL,
  `kode_mobil` varchar(10) NOT NULL,
  `harga_paket` int(11) DEFAULT NULL,
  `uang_muka` int(11) DEFAULT NULL,
  `paket_jumlah_cicilan` int(11) DEFAULT NULL,
  `bunga` decimal(4,2) DEFAULT NULL,
  `nilai_cicilan` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_kredit`
--

INSERT INTO `paket_kredit` (`kode_paket`, `kode_mobil`, `harga_paket`, `uang_muka`, `paket_jumlah_cicilan`, `bunga`, `nilai_cicilan`) VALUES
('DA_3011', 'KM_2001', 83165000, 23985000, 11, '0.06', 5380000),
('DA_3023', 'KM_2001', 83785000, 23985000, 23, '0.07', 2600000),
('FN_3011', 'KM_5001', 253390000, 72990000, 11, '0.06', 16400000),
('FN_3023', 'KM_5001', 254920000, 72990000, 23, '0.07', 7910000),
('FR_3011', 'KM_5002', 330450000, 95160000, 11, '0.06', 21390000),
('FR_3023', 'KM_5002', 332520000, 95160000, 23, '0.07', 10320000),
('HA_3011', 'KM_3002', 235920000, 67950000, 11, '0.06', 15270000),
('HA_3023', 'KM_3002', 237460000, 67950000, 23, '0.07', 7370000),
('HI_3011', 'KM_3001', 403090000, 116100000, 11, '0.06', 26090000),
('HI_3023', 'KM_3001', 405670000, 116100000, 23, '0.07', 12590000),
('SA_3011', 'KM_4001', 178300000, 51360000, 11, '0.06', 11540000),
('SA_3023', 'KM_4001', 179470000, 51360000, 23, '0.07', 5570000),
('SK_3011', 'KM_4002', 110030000, 31710000, 11, '0.06', 7120000),
('SK_3023', 'KM_4002', 110600000, 31710000, 23, '0.07', 3430000),
('TC_3011', 'KM_1001', 387590000, 111600000, 11, '0.06', 25090000),
('TC_3023', 'KM_1001', 390130000, 111600000, 23, '0.07', 12110000),
('TF_3011', 'KM_1003', 693020000, 199560000, 11, '0.06', 44860000),
('TF_3023', 'KM_1003', 697510000, 199560000, 23, '0.07', 21650000),
('TN_3011', 'KM_1002', 170905000, 49245000, 11, '0.06', 11060000),
('TN_3023', 'KM_1002', 172295000, 49245000, 23, '0.07', 5350000);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE IF NOT EXISTS `pembeli` (
  `KTP` varchar(20) NOT NULL,
  `nama_pembeli` varchar(50) DEFAULT NULL,
  `alamat_pembeli` text,
  `telp_pembeli` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`KTP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`KTP`, `nama_pembeli`, `alamat_pembeli`, `telp_pembeli`) VALUES
('0963020511647554', 'Sri Daniati', 'Jl. Dukuh Karangrejo', '087832246774'),
('143613462524', 'Siapa saja', 'Jl. Kalong', '0899977675467'),
('3173020106880001', 'Erik Supriatna', 'Jl. Sukajaya III no. 11', '083821546322'),
('3273043012960006', 'Arif Amrullah', 'Jl. Sukamulya, Gg. Sukamulya no. 25', '089505887522'),
('3273200209970002', 'Adnan Fadhillah', 'Jl. Kawali', '081313143377'),
('3275010308630024', 'Sunarno', 'Jl. Perum Permata Bekasi II 1/32', '087862334523'),
('3275036108900025', 'Gustina Dewi', 'Jl. Pesona Anggrek Blok C7 no. 17', '089656353582'),
('3329170103840004', 'Ading Setia', 'Jl. Dukuh Beber', '081322171394'),
('3374132309520001', 'Eko Prayitno', 'Jl. Sriwibowo Dalam VI/115', '08997651213'),
('3374152701630002', 'Andaru Anfasi', 'Jl. Sriwidodo Utara', '082128821774'),
('3578101502930004', 'Moch Sugiharto', 'Jl. Bronggalan Sawah 5/38', '081322171387'),
('3603021709910001', 'Jhon David Albertsius', 'Jl. Taman Cikande Blok C-04/23', '085721546642');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `hak_akses` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama_lengkap`, `hak_akses`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Rendi Raharjo', 'Administrator'),
('adnan', 'd1a0a9e9391af09e978c4c3d11711e75', 'Adnan Fadhillah', 'Leasing'),
('arif', '0ff6c3ace16359e41e37d40b8301d67f', 'Arif Amrullah', 'Manajer'),
('budi', '00dfc53ee86af02e742515cdcf075ed3', 'Budi Budidi', 'Manajer'),
('yoan', '69cafcac96c06e71ed19d6664d6c0294', 'Yoan Wiguna', 'Petugas');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
