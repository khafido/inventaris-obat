-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2019 at 08:40 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_obat`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_obat`
-- (See below for the actual view)
--
CREATE TABLE `detail_obat` (
`obat_kode` int(20)
,`obat_nama` varchar(100)
,`obat_tglkedaluwarsa` date
,`obat_jenis` int(11)
,`obat_letak` int(11)
,`obat_satuan` int(11)
,`obat_jumlah` int(11)
,`obat_status` int(11)
,`satuan_nama` varchar(20)
,`letak_nama` varchar(50)
,`jenis_nama` varchar(50)
,`obat_tglinput` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_obatkeluar`
-- (See below for the actual view)
--
CREATE TABLE `detail_obatkeluar` (
`keluar_id` int(11)
,`keluar_rekamid` varchar(14)
,`keluar_obatid` int(11)
,`obat_jumlah` int(11)
,`obat_nama` varchar(100)
,`obat_tglkedaluwarsa` date
,`letak_nama` varchar(50)
,`keluar_status` int(11)
,`satuan_nama` varchar(20)
,`jenis_nama` varchar(50)
,`obat_tglinput` date
,`obat_kode` int(20)
,`rekam_tgl` datetime
,`keluar_jumlah` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_obatstatis`
-- (See below for the actual view)
--
CREATE TABLE `detail_obatstatis` (
`obat_kode` int(20)
,`obat_nama` varchar(100)
,`obat_tglkedaluwarsa` date
,`obat_jenis` int(11)
,`obat_letak` int(11)
,`obat_satuan` int(11)
,`obat_jumlah` int(11)
,`obat_status` int(11)
,`satuan_nama` varchar(20)
,`letak_nama` varchar(50)
,`jenis_nama` varchar(50)
,`obat_tglinput` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_rekam`
-- (See below for the actual view)
--
CREATE TABLE `detail_rekam` (
`rekam_id` varchar(14)
,`rekam_keluhan` varchar(255)
,`rekam_diagnosa` varchar(255)
,`rekam_pegawaiid` int(11)
,`rekam_tgl` datetime
,`rekam_status` int(11)
,`pegawai_nama` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_rekamobat`
-- (See below for the actual view)
--
CREATE TABLE `detail_rekamobat` (
`rekam_id` varchar(14)
,`rekam_keluhan` varchar(255)
,`rekam_diagnosa` varchar(255)
,`rekam_pegawaiid` int(11)
,`rekam_tgl` datetime
,`rekam_status` int(11)
,`pegawai_nama` varchar(100)
,`keluar_id` int(11)
,`keluar_obatid` int(11)
,`obat_nama` varchar(100)
,`letak_nama` varchar(50)
,`obat_tglkedaluwarsa` date
,`keluar_status` int(11)
,`keluar_jumlah` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `obat_kedaluwarsa`
-- (See below for the actual view)
--
CREATE TABLE `obat_kedaluwarsa` (
`obat_kode` int(20)
,`obat_nama` varchar(100)
,`obat_tglkedaluwarsa` date
,`obat_jenis` int(11)
,`obat_letak` int(11)
,`obat_satuan` int(11)
,`obat_jumlah` int(11)
,`obat_status` int(11)
,`satuan_nama` varchar(20)
,`letak_nama` varchar(50)
,`jenis_nama` varchar(50)
,`obat_tglinput` date
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `jenis_id` int(11) NOT NULL,
  `jenis_nama` varchar(50) NOT NULL,
  `jenis_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`jenis_id`, `jenis_nama`, `jenis_status`) VALUES
(1, 'Batuk', 1),
(2, 'Pusing', 1),
(3, 'Pilek', 1),
(4, 'Puyeng', 1),
(5, 'Mantap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_letak`
--

CREATE TABLE `tbl_letak` (
  `letak_id` int(11) NOT NULL,
  `letak_nama` varchar(50) NOT NULL,
  `letak_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_letak`
--

INSERT INTO `tbl_letak` (`letak_id`, `letak_nama`, `letak_status`) VALUES
(1, 'letak', 1),
(2, 'Y', 1),
(3, 'Atas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `obat_kode` int(20) NOT NULL,
  `obat_nama` varchar(100) NOT NULL,
  `obat_tglkedaluwarsa` date NOT NULL,
  `obat_jenis` int(11) NOT NULL,
  `obat_letak` int(11) NOT NULL,
  `obat_satuan` int(11) NOT NULL,
  `obat_jumlah` int(11) NOT NULL DEFAULT '0',
  `obat_tglinput` date NOT NULL,
  `obat_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`obat_kode`, `obat_nama`, `obat_tglkedaluwarsa`, `obat_jenis`, `obat_letak`, `obat_satuan`, `obat_jumlah`, `obat_tglinput`, `obat_status`) VALUES
(2, 'Konidin', '2022-02-02', 3, 1, 1, 198, '2021-09-04', 1),
(3, 'Bodrex', '2023-03-03', 4, 2, 2, 296, '2020-10-02', 1),
(4, 'Pamol', '2019-04-04', 5, 3, 3, 349, '2019-10-04', 1),
(5, 'Tesx', '2021-08-31', 1, 1, 1, 199, '2019-11-25', 1),
(6, 'Bodrex', '2020-01-01', 3, 3, 3, 5, '2019-01-01', 1);

--
-- Triggers `tbl_obat`
--
DELIMITER $$
CREATE TRIGGER `DUPOBAT` AFTER INSERT ON `tbl_obat` FOR EACH ROW BEGIN  
    INSERT INTO tbl_obatstatis select * from tbl_obat where obat_kode = NEW.obat_kode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obatkeluar`
--

CREATE TABLE `tbl_obatkeluar` (
  `keluar_id` int(11) NOT NULL,
  `keluar_rekamid` varchar(14) NOT NULL,
  `keluar_obatid` int(11) NOT NULL,
  `keluar_jumlah` int(11) NOT NULL DEFAULT '0',
  `keluar_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obatkeluar`
--

INSERT INTO `tbl_obatkeluar` (`keluar_id`, `keluar_rekamid`, `keluar_obatid`, `keluar_jumlah`, `keluar_status`) VALUES
(1, '20190822213953', 3, 1, 1),
(2, '20190822213953', 4, 1, 1),
(3, '20190903101341', 2, 2, 1),
(4, '20190903101341', 5, 1, 1),
(5, '20190904174553', 3, 1, 1),
(6, '20190904194215', 3, 1, 1),
(7, '20190905133921', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obatstatis`
--

CREATE TABLE `tbl_obatstatis` (
  `obat_kode` int(20) NOT NULL,
  `obat_nama` varchar(100) NOT NULL,
  `obat_tglkedaluwarsa` date NOT NULL,
  `obat_jenis` int(11) NOT NULL,
  `obat_letak` int(11) NOT NULL,
  `obat_satuan` int(11) NOT NULL,
  `obat_jumlah` int(11) NOT NULL DEFAULT '0',
  `obat_tglinput` date NOT NULL,
  `obat_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obatstatis`
--

INSERT INTO `tbl_obatstatis` (`obat_kode`, `obat_nama`, `obat_tglkedaluwarsa`, `obat_jenis`, `obat_letak`, `obat_satuan`, `obat_jumlah`, `obat_tglinput`, `obat_status`) VALUES
(5, 'Tesx', '2019-08-31', 1, 1, 1, 200, '2019-08-25', 1),
(6, 'Bodrex', '2020-01-01', 3, 3, 3, 5, '2019-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nama` varchar(100) NOT NULL,
  `pegawai_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`pegawai_id`, `pegawai_nama`, `pegawai_status`) VALUES
(1, 'Khafido', 0),
(2, 'mantap', 0),
(4, 'John', 1),
(5, 'Josh', 0),
(7, 'gas', 0),
(9, 'okea', 0),
(11, 'Khaf', 1),
(12, 'Naruti', 1),
(13, 'Ilz', 1),
(14, 'Ind', 1),
(15, 'Gus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekam`
--

CREATE TABLE `tbl_rekam` (
  `rekam_id` varchar(14) NOT NULL,
  `rekam_keluhan` varchar(255) NOT NULL,
  `rekam_diagnosa` varchar(255) NOT NULL,
  `rekam_pegawaiid` int(11) NOT NULL,
  `rekam_tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rekam_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rekam`
--

INSERT INTO `tbl_rekam` (`rekam_id`, `rekam_keluhan`, `rekam_diagnosa`, `rekam_pegawaiid`, `rekam_tgl`, `rekam_status`) VALUES
('20190822213953', 'x', 'y', 11, '2019-08-22 21:39:53', 1),
('20190903101341', 'gg', 'wp', 12, '2019-12-03 10:13:41', 1),
('20190904174553', 'x', 'y', 13, '2019-09-04 17:45:53', 1),
('20190904194215', 'y', 'x', 14, '2019-09-04 19:42:15', 1),
('20190905133921', 'hsja', 'sadsd', 15, '2019-01-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `satuan_id` int(11) NOT NULL,
  `satuan_nama` varchar(20) NOT NULL,
  `satuan_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`satuan_id`, `satuan_nama`, `satuan_status`) VALUES
(1, 'satuan', 1),
(2, 'X', 1),
(3, 'Kaplet', 1);

-- --------------------------------------------------------

--
-- Structure for view `detail_obat`
--
DROP TABLE IF EXISTS `detail_obat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_obat`  AS  select `o`.`obat_kode` AS `obat_kode`,`o`.`obat_nama` AS `obat_nama`,`o`.`obat_tglkedaluwarsa` AS `obat_tglkedaluwarsa`,`o`.`obat_jenis` AS `obat_jenis`,`o`.`obat_letak` AS `obat_letak`,`o`.`obat_satuan` AS `obat_satuan`,`o`.`obat_jumlah` AS `obat_jumlah`,`o`.`obat_status` AS `obat_status`,`s`.`satuan_nama` AS `satuan_nama`,`l`.`letak_nama` AS `letak_nama`,`j`.`jenis_nama` AS `jenis_nama`,`o`.`obat_tglinput` AS `obat_tglinput` from (((`tbl_obat` `o` join `tbl_satuan` `s` on((`o`.`obat_satuan` = `s`.`satuan_id`))) join `tbl_letak` `l` on((`o`.`obat_letak` = `l`.`letak_id`))) join `tbl_jenis` `j` on((`o`.`obat_jenis` = `j`.`jenis_id`))) where (`o`.`obat_tglkedaluwarsa` > now()) order by `o`.`obat_nama`,`o`.`obat_tglkedaluwarsa` ;

-- --------------------------------------------------------

--
-- Structure for view `detail_obatkeluar`
--
DROP TABLE IF EXISTS `detail_obatkeluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_obatkeluar`  AS  select `k`.`keluar_id` AS `keluar_id`,`k`.`keluar_rekamid` AS `keluar_rekamid`,`k`.`keluar_obatid` AS `keluar_obatid`,`k`.`keluar_jumlah` AS `obat_jumlah`,`o`.`obat_nama` AS `obat_nama`,`o`.`obat_tglkedaluwarsa` AS `obat_tglkedaluwarsa`,`j`.`letak_nama` AS `letak_nama`,`k`.`keluar_status` AS `keluar_status`,`s`.`satuan_nama` AS `satuan_nama`,`js`.`jenis_nama` AS `jenis_nama`,`o`.`obat_tglinput` AS `obat_tglinput`,`o`.`obat_kode` AS `obat_kode`,`r`.`rekam_tgl` AS `rekam_tgl`,`k`.`keluar_jumlah` AS `keluar_jumlah` from (((((`tbl_obatkeluar` `k` join `tbl_obat` `o` on((`k`.`keluar_obatid` = `o`.`obat_kode`))) join `tbl_letak` `j` on((`o`.`obat_letak` = `j`.`letak_id`))) join `tbl_satuan` `s` on((`o`.`obat_satuan` = `s`.`satuan_id`))) join `tbl_jenis` `js` on((`o`.`obat_jenis` = `js`.`jenis_id`))) join `tbl_rekam` `r` on((`r`.`rekam_id` = `k`.`keluar_rekamid`))) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_obatstatis`
--
DROP TABLE IF EXISTS `detail_obatstatis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_obatstatis`  AS  select `o`.`obat_kode` AS `obat_kode`,`o`.`obat_nama` AS `obat_nama`,`o`.`obat_tglkedaluwarsa` AS `obat_tglkedaluwarsa`,`o`.`obat_jenis` AS `obat_jenis`,`o`.`obat_letak` AS `obat_letak`,`o`.`obat_satuan` AS `obat_satuan`,`o`.`obat_jumlah` AS `obat_jumlah`,`o`.`obat_status` AS `obat_status`,`s`.`satuan_nama` AS `satuan_nama`,`l`.`letak_nama` AS `letak_nama`,`j`.`jenis_nama` AS `jenis_nama`,`o`.`obat_tglinput` AS `obat_tglinput` from (((`tbl_obatstatis` `o` join `tbl_satuan` `s` on((`o`.`obat_satuan` = `s`.`satuan_id`))) join `tbl_letak` `l` on((`o`.`obat_letak` = `l`.`letak_id`))) join `tbl_jenis` `j` on((`o`.`obat_jenis` = `j`.`jenis_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_rekam`
--
DROP TABLE IF EXISTS `detail_rekam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_rekam`  AS  select `r`.`rekam_id` AS `rekam_id`,`r`.`rekam_keluhan` AS `rekam_keluhan`,`r`.`rekam_diagnosa` AS `rekam_diagnosa`,`r`.`rekam_pegawaiid` AS `rekam_pegawaiid`,`r`.`rekam_tgl` AS `rekam_tgl`,`r`.`rekam_status` AS `rekam_status`,`p`.`pegawai_nama` AS `pegawai_nama` from (`tbl_rekam` `r` join `tbl_pegawai` `p` on((`r`.`rekam_pegawaiid` = `p`.`pegawai_id`))) order by `r`.`rekam_tgl` desc ;

-- --------------------------------------------------------

--
-- Structure for view `detail_rekamobat`
--
DROP TABLE IF EXISTS `detail_rekamobat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_rekamobat`  AS  select `r`.`rekam_id` AS `rekam_id`,`r`.`rekam_keluhan` AS `rekam_keluhan`,`r`.`rekam_diagnosa` AS `rekam_diagnosa`,`r`.`rekam_pegawaiid` AS `rekam_pegawaiid`,`r`.`rekam_tgl` AS `rekam_tgl`,`r`.`rekam_status` AS `rekam_status`,`r`.`pegawai_nama` AS `pegawai_nama`,`k`.`keluar_id` AS `keluar_id`,`k`.`keluar_obatid` AS `keluar_obatid`,`k`.`obat_nama` AS `obat_nama`,`k`.`letak_nama` AS `letak_nama`,`k`.`obat_tglkedaluwarsa` AS `obat_tglkedaluwarsa`,`k`.`keluar_status` AS `keluar_status`,`k`.`keluar_jumlah` AS `keluar_jumlah` from (`detail_rekam` `r` join `detail_obatkeluar` `k` on((`r`.`rekam_id` = `k`.`keluar_rekamid`))) ;

-- --------------------------------------------------------

--
-- Structure for view `obat_kedaluwarsa`
--
DROP TABLE IF EXISTS `obat_kedaluwarsa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `obat_kedaluwarsa`  AS  select `o`.`obat_kode` AS `obat_kode`,`o`.`obat_nama` AS `obat_nama`,`o`.`obat_tglkedaluwarsa` AS `obat_tglkedaluwarsa`,`o`.`obat_jenis` AS `obat_jenis`,`o`.`obat_letak` AS `obat_letak`,`o`.`obat_satuan` AS `obat_satuan`,`o`.`obat_jumlah` AS `obat_jumlah`,`o`.`obat_status` AS `obat_status`,`s`.`satuan_nama` AS `satuan_nama`,`l`.`letak_nama` AS `letak_nama`,`j`.`jenis_nama` AS `jenis_nama`,`o`.`obat_tglinput` AS `obat_tglinput` from (((`tbl_obat` `o` join `tbl_satuan` `s` on((`o`.`obat_satuan` = `s`.`satuan_id`))) join `tbl_letak` `l` on((`o`.`obat_letak` = `l`.`letak_id`))) join `tbl_jenis` `j` on((`o`.`obat_jenis` = `j`.`jenis_id`))) where (`o`.`obat_tglkedaluwarsa` < now()) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`jenis_id`),
  ADD UNIQUE KEY `jenis_nama` (`jenis_nama`);

--
-- Indexes for table `tbl_letak`
--
ALTER TABLE `tbl_letak`
  ADD PRIMARY KEY (`letak_id`),
  ADD UNIQUE KEY `letak_nama` (`letak_nama`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`obat_kode`);

--
-- Indexes for table `tbl_obatkeluar`
--
ALTER TABLE `tbl_obatkeluar`
  ADD PRIMARY KEY (`keluar_id`);

--
-- Indexes for table `tbl_obatstatis`
--
ALTER TABLE `tbl_obatstatis`
  ADD PRIMARY KEY (`obat_kode`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`pegawai_id`),
  ADD UNIQUE KEY `pegawai_nama` (`pegawai_nama`);

--
-- Indexes for table `tbl_rekam`
--
ALTER TABLE `tbl_rekam`
  ADD PRIMARY KEY (`rekam_id`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`satuan_id`),
  ADD UNIQUE KEY `satuan_nama` (`satuan_nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_letak`
--
ALTER TABLE `tbl_letak`
  MODIFY `letak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `obat_kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_obatkeluar`
--
ALTER TABLE `tbl_obatkeluar`
  MODIFY `keluar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_obatstatis`
--
ALTER TABLE `tbl_obatstatis`
  MODIFY `obat_kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
