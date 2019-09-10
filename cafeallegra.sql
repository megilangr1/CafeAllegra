-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2019 at 10:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeallegra`
--

-- --------------------------------------------------------

--
-- Table structure for table `h_beli`
--

CREATE TABLE `h_beli` (
  `FNO_BELI` char(7) NOT NULL,
  `FTGL_BELI` date DEFAULT NULL,
  `FK_SUP` char(3) NOT NULL,
  `FHC` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_beli`
--

INSERT INTO `h_beli` (`FNO_BELI`, `FTGL_BELI`, `FK_SUP`, `FHC`) VALUES
('3100001', '2019-08-31', '001', '1'),
('3100001', '2019-08-31', '002', '0');

-- --------------------------------------------------------

--
-- Table structure for table `h_kas`
--

CREATE TABLE `h_kas` (
  `FNO_KAS` char(7) NOT NULL,
  `FTGL_KAS` date DEFAULT NULL,
  `FMUTASI` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_brg`
--

CREATE TABLE `m_brg` (
  `FK_BRG` char(6) NOT NULL,
  `FN_BRG` varchar(50) DEFAULT NULL,
  `FSAT` varchar(6) DEFAULT NULL,
  `FSTOK_MIN` decimal(18,0) DEFAULT NULL,
  `FSTOK_MAX` decimal(18,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_mat`
--

CREATE TABLE `m_mat` (
  `FK_MAT` char(6) NOT NULL,
  `FN_MAT` varchar(50) DEFAULT NULL,
  `FSAT` varchar(6) DEFAULT NULL,
  `FSTOK_MIN` decimal(18,0) DEFAULT NULL,
  `FSTOK_MAX` decimal(18,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_mat`
--

INSERT INTO `m_mat` (`FK_MAT`, `FN_MAT`, `FSAT`, `FSTOK_MIN`, `FSTOK_MAX`) VALUES
('001101', 'Test 1.1.1', 'PCS', '10', '50'),
('001102', 'Test 1.1.2', 'PCS', '10', '20'),
('001201', 'Test 1.2.1', 'PCS', '10', '15'),
('001202', 'Test 1.2.2', 'PCS', '5', '10'),
('001301', 'Test 1.3.1', 'PCS', '20', '25'),
('001302', 'Test 1.3.2', 'PCS', '3', '15'),
('001401', 'Test 1.4.1', 'PCS', '20', '25'),
('001402', 'Test 1.4.2', 'PCS', '5', '25'),
('002101', 'Test 2.1.1', 'PCS', '8', '20'),
('002102', 'Test 2.1.2', 'PCS', '5', '30'),
('002201', 'Test 2.2.1', 'PCS', '20', '30'),
('002202', 'Test 2.2.2', 'PCS', '1', '10'),
('002301', 'Test 2.3.1', 'PCS', '10', '20'),
('002302', 'Test 2.3.2', 'PCS', '10', '20'),
('002401', 'Test 2.4.1', 'PCS', '5', '15'),
('002402', 'Test 2.4.2', 'PCS', '5', '20');

-- --------------------------------------------------------

--
-- Table structure for table `m_perk`
--

CREATE TABLE `m_perk` (
  `FK_PERK` char(8) NOT NULL,
  `FN_PERK` varchar(50) DEFAULT NULL,
  `FSALDO_NORMAL` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_pr`
--

CREATE TABLE `m_pr` (
  `FK_BPR` char(6) NOT NULL,
  `FN_BPR` varchar(50) DEFAULT NULL,
  `FSAT` varchar(6) DEFAULT NULL,
  `FHARGA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pr`
--

INSERT INTO `m_pr` (`FK_BPR`, `FN_BPR`, `FSAT`, `FHARGA`) VALUES
('F01101', 'Test Produk 1.1.1', 'PCS', 5000),
('F01102', 'Test Produk 1.1.2', 'PCS', 8000),
('F01201', 'Test Produk 1.2.1', 'PCS', 8000),
('F01202', 'Test Produk 1.2.2', 'PCS', 12000),
('F02101', 'Test Produk 2.1.1', 'PCS', 15000),
('F02102', 'Test Produk 2.1.2', 'PCS', 5500);

-- --------------------------------------------------------

--
-- Table structure for table `m_sup`
--

CREATE TABLE `m_sup` (
  `FK_SUP` char(3) NOT NULL,
  `FNA_SUP` varchar(20) DEFAULT NULL,
  `FALAMAT` varchar(100) DEFAULT NULL,
  `FKOTA` varchar(30) DEFAULT NULL,
  `FTEL` varchar(12) DEFAULT NULL,
  `FCP` varchar(20) DEFAULT NULL,
  `FLAMA_BAYAR` int(11) DEFAULT NULL,
  `FPENERIMA` varchar(40) DEFAULT NULL,
  `FBANK` varchar(20) DEFAULT NULL,
  `FNO_ACC` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_sup`
--

INSERT INTO `m_sup` (`FK_SUP`, `FNA_SUP`, `FALAMAT`, `FKOTA`, `FTEL`, `FCP`, `FLAMA_BAYAR`, `FPENERIMA`, `FBANK`, `FNO_ACC`) VALUES
('001', 'Supplier Test 1', 'Test 1', 'Test 1', '085551222', 'Test 1', 10, 'Test 1', 'Test 1', '100'),
('002', 'Supplier Test 2', 'Test 2', 'Test 2', '082221222', 'Test 2', 30, 'Test 2', 'Test 2', '200');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `uid` char(6) NOT NULL,
  `nama_pegawai` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`uid`, `nama_pegawai`, `username`, `password`, `level`, `aktif`) VALUES
('ADM001', 'Gilang Romadlona', 'megilangr', '23ec0c6d5a70d368c71c1b649e8f506dd9191e98', 1, 1),
('ADM002', 'Test', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ref_gmat1`
--

CREATE TABLE `ref_gmat1` (
  `FK_GMAT1` char(3) NOT NULL,
  `FN_GMAT1` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_gmat1`
--

INSERT INTO `ref_gmat1` (`FK_GMAT1`, `FN_GMAT1`) VALUES
('001', 'Test 1'),
('002', 'Test 2'),
('003', 'Test 3'),
('004', 'Test 4');

-- --------------------------------------------------------

--
-- Table structure for table `ref_gmat2`
--

CREATE TABLE `ref_gmat2` (
  `FK_GMAT1` char(3) NOT NULL,
  `FK_GMAT2` char(1) NOT NULL,
  `FN_GMAT2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_gmat2`
--

INSERT INTO `ref_gmat2` (`FK_GMAT1`, `FK_GMAT2`, `FN_GMAT2`) VALUES
('001', '1', 'Test 1.1'),
('001', '2', 'Test 1.2'),
('001', '3', 'Test 1.3'),
('001', '4', 'Test 1.4'),
('002', '1', 'Test 2.1'),
('002', '2', 'Test 2.2'),
('002', '3', 'Test 2.3'),
('002', '4', 'Test 2.4'),
('003', '1', 'Test 3.1'),
('003', '2', 'Test 3.2'),
('003', '3', 'Test 3.3'),
('003', '4', 'Test 3.4'),
('004', '1', 'Test 4.1'),
('004', '2', 'Test 4.2'),
('004', '3', 'Test 4.3'),
('004', '4', 'Test 4.4');

-- --------------------------------------------------------

--
-- Table structure for table `ref_gpr1`
--

CREATE TABLE `ref_gpr1` (
  `FK_GPR1` char(3) NOT NULL,
  `FN_GPR1` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_gpr1`
--

INSERT INTO `ref_gpr1` (`FK_GPR1`, `FN_GPR1`) VALUES
('F01', 'Test Produk 1'),
('F02', 'Test Produk 2'),
('F03', 'Test Produk 3'),
('F04', 'Test Produk 4');

-- --------------------------------------------------------

--
-- Table structure for table `ref_gpr2`
--

CREATE TABLE `ref_gpr2` (
  `FK_GPR1` char(3) NOT NULL,
  `FK_GPR2` char(1) NOT NULL,
  `FN_GPR2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_gpr2`
--

INSERT INTO `ref_gpr2` (`FK_GPR1`, `FK_GPR2`, `FN_GPR2`) VALUES
('F01', '1', 'Test Produk 1.1'),
('F01', '2', 'Test Produk 1.2'),
('F01', '3', 'Test Produk 1.3'),
('F01', '4', 'Test Produk 1.4'),
('F02', '1', 'Test Produk 2.1'),
('F02', '2', 'Test Produk 2.2'),
('F02', '3', 'Test Produk 2.3'),
('F02', '4', 'Test Produk 2.4'),
('F03', '1', 'Test Produk 3.1'),
('F03', '2', 'Test Produk 3.2'),
('F03', '3', 'Test Produk 3.3'),
('F03', '4', 'Test Produk 3.4'),
('F04', '1', 'Test Produk 4.1'),
('F04', '2', 'Test Produk 4.2'),
('F04', '3', 'Test Produk 4.3'),
('F04', '4', 'Test Produk 4.4');

-- --------------------------------------------------------

--
-- Table structure for table `rls_mat_sup`
--

CREATE TABLE `rls_mat_sup` (
  `FK_SUP` char(3) NOT NULL,
  `FK_MAT` char(6) NOT NULL,
  `FHARGA` decimal(7,2) DEFAULT NULL,
  `FN_MAT_SUP` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rls_mat_sup`
--

INSERT INTO `rls_mat_sup` (`FK_SUP`, `FK_MAT`, `FHARGA`, `FN_MAT_SUP`) VALUES
('001', '001101', '20000.00', 'Test 1.1'),
('001', '001102', '15600.00', 'Test 1.2'),
('001', '001201', '50000.00', 'Test 2.1'),
('001', '001202', '13000.00', 'Test 2.2'),
('001', '001301', '10000.00', 'Test 3.1'),
('001', '001302', '18500.00', 'Test 3.2'),
('002', '002101', '15000.00', 'Test 1.1'),
('002', '002102', '5600.00', 'Test 2.2'),
('002', '002201', '15000.00', 'Test 2.1'),
('002', '002202', '18500.00', 'Test 2.2');

-- --------------------------------------------------------

--
-- Table structure for table `t_beli`
--

CREATE TABLE `t_beli` (
  `FNO_BELI` char(7) NOT NULL,
  `FK_MAT` char(6) NOT NULL,
  `FQTY` decimal(18,0) DEFAULT NULL,
  `FHARGA` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_beli`
--

INSERT INTO `t_beli` (`FNO_BELI`, `FK_MAT`, `FQTY`, `FHARGA`) VALUES
('3100001', '001101', '5', '20000.00'),
('3100001', '001102', '10', '15600.00'),
('3100001', '002101', '10', '15000.00'),
('3100001', '002102', '30', '5600.00');

-- --------------------------------------------------------

--
-- Table structure for table `t_hd`
--

CREATE TABLE `t_hd` (
  `FNO_BELI` char(7) NOT NULL,
  `FK_SUP` char(3) NOT NULL,
  `FJML` decimal(15,2) DEFAULT NULL,
  `FBAYAR` decimal(15,2) DEFAULT NULL,
  `FTGL_BAYAR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_hd`
--

INSERT INTO `t_hd` (`FNO_BELI`, `FK_SUP`, `FJML`, `FBAYAR`, `FTGL_BAYAR`) VALUES
('3100001', '002', '2.00', '318000.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_kas`
--

CREATE TABLE `t_kas` (
  `FNO_KAS` char(7) NOT NULL,
  `FKET` varchar(50) DEFAULT NULL,
  `FK_PERK` char(8) NOT NULL,
  `FJML` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_beli`
-- (See below for the actual view)
--
CREATE TABLE `v_beli` (
`FNO_BELI` char(7)
,`FTGL_BELI` date
,`FK_SUP` char(3)
,`FNA_SUP` varchar(20)
,`FALAMAT` varchar(100)
,`FKOTA` varchar(30)
,`FTEL` varchar(12)
,`FCP` varchar(20)
,`FLAMA_BAYAR` int(11)
,`FPENERIMA` varchar(40)
,`FBANK` varchar(20)
,`FNO_ACC` varchar(15)
,`FHC` char(1)
,`FK_MAT` char(6)
,`FN_MAT` varchar(50)
,`FSAT` varchar(6)
,`FSTOK_MIN` decimal(18,0)
,`FSTOK_MAX` decimal(18,0)
,`FQTY` decimal(18,0)
,`FHARGA` decimal(7,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_gmat2`
-- (See below for the actual view)
--
CREATE TABLE `v_gmat2` (
`FK_GMAT1` char(3)
,`FN_GMAT1` varchar(20)
,`FK_GMAT2` char(1)
,`FN_GMAT2` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_gpr2`
-- (See below for the actual view)
--
CREATE TABLE `v_gpr2` (
`FK_GPR1` char(3)
,`FN_GPR1` varchar(20)
,`FK_GPR2` char(1)
,`FN_GPR2` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rls_mat_sup`
-- (See below for the actual view)
--
CREATE TABLE `v_rls_mat_sup` (
`FK_SUP` char(3)
,`FK_MAT` char(6)
,`FN_MAT` varchar(50)
,`FSAT` varchar(6)
,`FSTOK_MIN` decimal(18,0)
,`FSTOK_MAX` decimal(18,0)
,`FHARGA` decimal(7,2)
,`FN_MAT_SUP` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_beli`
--
DROP TABLE IF EXISTS `v_beli`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_beli`  AS  select `h_beli`.`FNO_BELI` AS `FNO_BELI`,`h_beli`.`FTGL_BELI` AS `FTGL_BELI`,`h_beli`.`FK_SUP` AS `FK_SUP`,`m_sup`.`FNA_SUP` AS `FNA_SUP`,`m_sup`.`FALAMAT` AS `FALAMAT`,`m_sup`.`FKOTA` AS `FKOTA`,`m_sup`.`FTEL` AS `FTEL`,`m_sup`.`FCP` AS `FCP`,`m_sup`.`FLAMA_BAYAR` AS `FLAMA_BAYAR`,`m_sup`.`FPENERIMA` AS `FPENERIMA`,`m_sup`.`FBANK` AS `FBANK`,`m_sup`.`FNO_ACC` AS `FNO_ACC`,`h_beli`.`FHC` AS `FHC`,`t_beli`.`FK_MAT` AS `FK_MAT`,`m_mat`.`FN_MAT` AS `FN_MAT`,`m_mat`.`FSAT` AS `FSAT`,`m_mat`.`FSTOK_MIN` AS `FSTOK_MIN`,`m_mat`.`FSTOK_MAX` AS `FSTOK_MAX`,`t_beli`.`FQTY` AS `FQTY`,`t_beli`.`FHARGA` AS `FHARGA` from (((`h_beli` join `m_sup` on((`m_sup`.`FK_SUP` = `h_beli`.`FK_SUP`))) join `t_beli` on((`t_beli`.`FNO_BELI` = `h_beli`.`FNO_BELI`))) join `m_mat` on((`m_mat`.`FK_MAT` = `t_beli`.`FK_MAT`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_gmat2`
--
DROP TABLE IF EXISTS `v_gmat2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_gmat2`  AS  select `ref_gmat2`.`FK_GMAT1` AS `FK_GMAT1`,`ref_gmat1`.`FN_GMAT1` AS `FN_GMAT1`,`ref_gmat2`.`FK_GMAT2` AS `FK_GMAT2`,`ref_gmat2`.`FN_GMAT2` AS `FN_GMAT2` from (`ref_gmat2` join `ref_gmat1` on((`ref_gmat1`.`FK_GMAT1` = `ref_gmat2`.`FK_GMAT1`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_gpr2`
--
DROP TABLE IF EXISTS `v_gpr2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_gpr2`  AS  select `ref_gpr2`.`FK_GPR1` AS `FK_GPR1`,`ref_gpr1`.`FN_GPR1` AS `FN_GPR1`,`ref_gpr2`.`FK_GPR2` AS `FK_GPR2`,`ref_gpr2`.`FN_GPR2` AS `FN_GPR2` from (`ref_gpr2` join `ref_gpr1` on((`ref_gpr1`.`FK_GPR1` = `ref_gpr2`.`FK_GPR1`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_rls_mat_sup`
--
DROP TABLE IF EXISTS `v_rls_mat_sup`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rls_mat_sup`  AS  select `rls_mat_sup`.`FK_SUP` AS `FK_SUP`,`rls_mat_sup`.`FK_MAT` AS `FK_MAT`,`m_mat`.`FN_MAT` AS `FN_MAT`,`m_mat`.`FSAT` AS `FSAT`,`m_mat`.`FSTOK_MIN` AS `FSTOK_MIN`,`m_mat`.`FSTOK_MAX` AS `FSTOK_MAX`,`rls_mat_sup`.`FHARGA` AS `FHARGA`,`rls_mat_sup`.`FN_MAT_SUP` AS `FN_MAT_SUP` from (`rls_mat_sup` join `m_mat` on((`m_mat`.`FK_MAT` = `rls_mat_sup`.`FK_MAT`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `h_beli`
--
ALTER TABLE `h_beli`
  ADD PRIMARY KEY (`FNO_BELI`,`FK_SUP`);

--
-- Indexes for table `h_kas`
--
ALTER TABLE `h_kas`
  ADD PRIMARY KEY (`FNO_KAS`);

--
-- Indexes for table `m_brg`
--
ALTER TABLE `m_brg`
  ADD PRIMARY KEY (`FK_BRG`);

--
-- Indexes for table `m_mat`
--
ALTER TABLE `m_mat`
  ADD PRIMARY KEY (`FK_MAT`);

--
-- Indexes for table `m_perk`
--
ALTER TABLE `m_perk`
  ADD PRIMARY KEY (`FK_PERK`);

--
-- Indexes for table `m_pr`
--
ALTER TABLE `m_pr`
  ADD PRIMARY KEY (`FK_BPR`);

--
-- Indexes for table `m_sup`
--
ALTER TABLE `m_sup`
  ADD PRIMARY KEY (`FK_SUP`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `ref_gmat1`
--
ALTER TABLE `ref_gmat1`
  ADD PRIMARY KEY (`FK_GMAT1`);

--
-- Indexes for table `ref_gmat2`
--
ALTER TABLE `ref_gmat2`
  ADD PRIMARY KEY (`FK_GMAT1`,`FK_GMAT2`);

--
-- Indexes for table `ref_gpr1`
--
ALTER TABLE `ref_gpr1`
  ADD PRIMARY KEY (`FK_GPR1`);

--
-- Indexes for table `ref_gpr2`
--
ALTER TABLE `ref_gpr2`
  ADD PRIMARY KEY (`FK_GPR1`,`FK_GPR2`);

--
-- Indexes for table `rls_mat_sup`
--
ALTER TABLE `rls_mat_sup`
  ADD PRIMARY KEY (`FK_SUP`,`FK_MAT`);

--
-- Indexes for table `t_beli`
--
ALTER TABLE `t_beli`
  ADD PRIMARY KEY (`FNO_BELI`,`FK_MAT`);

--
-- Indexes for table `t_hd`
--
ALTER TABLE `t_hd`
  ADD PRIMARY KEY (`FNO_BELI`,`FK_SUP`);

--
-- Indexes for table `t_kas`
--
ALTER TABLE `t_kas`
  ADD PRIMARY KEY (`FNO_KAS`,`FK_PERK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
