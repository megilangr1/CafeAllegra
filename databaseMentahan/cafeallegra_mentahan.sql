-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Jul 2019 pada 04.04
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `h_beli`
--

CREATE TABLE `h_beli` (
  `FNO_BELI` char(7) NOT NULL,
  `FTGL_BELI` date DEFAULT NULL,
  `FK_SUP` char(3) NOT NULL,
  `FHC` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `h_beli`
--

INSERT INTO `h_beli` (`FNO_BELI`, `FTGL_BELI`, `FK_SUP`, `FHC`) VALUES
('1900001', '2019-06-19', '002', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `h_kas`
--

CREATE TABLE `h_kas` (
  `FNO_KAS` char(7) NOT NULL,
  `FTGL_KAS` date DEFAULT NULL,
  `FMUTASI` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `h_kas`
--

INSERT INTO `h_kas` (`FNO_KAS`, `FTGL_KAS`, `FMUTASI`) VALUES
('1900001', '2019-06-05', 'D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_brg`
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
-- Struktur dari tabel `m_mat`
--

CREATE TABLE `m_mat` (
  `FK_MAT` char(6) NOT NULL,
  `FN_MAT` varchar(50) DEFAULT NULL,
  `FSAT` varchar(6) DEFAULT NULL,
  `FSTOK_MIN` decimal(18,0) DEFAULT NULL,
  `FSTOK_MAX` decimal(18,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_mat`
--

INSERT INTO `m_mat` (`FK_MAT`, `FN_MAT`, `FSAT`, `FSTOK_MIN`, `FSTOK_MAX`) VALUES
('001201', 'Test material', 'PCS', '2', '2'),
('001202', 'TEST MATERIAL 01', 'PCS', '10', '40'),
('001203', 'material 3', 'PCS', '10', '10'),
('003404', 'TEST MATERIAL 04', 'PCS', '200', '400');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_perk`
--

CREATE TABLE `m_perk` (
  `FK_PERK` char(8) NOT NULL,
  `FN_PERK` varchar(50) DEFAULT NULL,
  `FSALDO_NORMAL` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_perk`
--

INSERT INTO `m_perk` (`FK_PERK`, `FN_PERK`, `FSALDO_NORMAL`) VALUES
('55555555', 'TEST PERIKIRAAN', 'K'),
('66666666', 'TEST PERKIRAAN DUA', 'D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pr`
--

CREATE TABLE `m_pr` (
  `FK_BPR` char(6) NOT NULL,
  `FN_BPR` varchar(50) DEFAULT NULL,
  `FSAT` varchar(6) DEFAULT NULL,
  `FHARGA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pr`
--

INSERT INTO `m_pr` (`FK_BPR`, `FN_BPR`, `FSAT`, `FHARGA`) VALUES
('F01101', 'COBA EDIT', 'PORSI', 7000),
('F01202', 'TESTT', 'PORSI', 5000),
('F02101', 'KOPI TORAJA NO 1', 'PCS', 50000),
('F02102', 'KOPI TORAJA 2', 'KG', 55000),
('F02103', 'TEST KOPI TORAJA', 'PCS', 200000),
('F023', 'TEST', 'PCS', 2000),
('F02301', 'TEST KOPI LUWAK 01', 'PCS', 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_sup`
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
-- Dumping data untuk tabel `m_sup`
--

INSERT INTO `m_sup` (`FK_SUP`, `FNA_SUP`, `FALAMAT`, `FKOTA`, `FTEL`, `FCP`, `FLAMA_BAYAR`, `FPENERIMA`, `FBANK`, `FNO_ACC`) VALUES
('001', 'CV PRIMA A', 'JL PADJADJARAN', 'SUKABUMI', '0987654321', 'BUDI ARIYADI', 30, 'BUDI', 'BCA', '001002'),
('002', 'CV INDAH', 'JL AHMAD YANI', 'BANDUNG', '022 2345678', 'FATHIAN', 30, 'FATHIAN', 'MANDIRI', '001003'),
('003', 'CV TEST', 'JL PERJUANGAN', 'SUKABUMI', '0987654322', 'ARI', 30, 'ARI', 'MANDIRI', '002003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_gmat1`
--

CREATE TABLE `ref_gmat1` (
  `FK_GMAT1` char(3) NOT NULL,
  `FN_GMAT1` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_gmat1`
--

INSERT INTO `ref_gmat1` (`FK_GMAT1`, `FN_GMAT1`) VALUES
('001', 'TEST'),
('002', 'TEST02'),
('003', 'TEST03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_gmat2`
--

CREATE TABLE `ref_gmat2` (
  `FK_GMAT1` char(3) NOT NULL,
  `FK_GMAT2` char(1) NOT NULL,
  `FN_GMAT2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_gmat2`
--

INSERT INTO `ref_gmat2` (`FK_GMAT1`, `FK_GMAT2`, `FN_GMAT2`) VALUES
('001', '1', 'TEST NO 1'),
('001', '2', 'TEST NO 2'),
('003', '3', 'TEST MAT TIGA'),
('003', '4', 'TEST MAT DUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_gpr1`
--

CREATE TABLE `ref_gpr1` (
  `FK_GPR1` char(3) NOT NULL,
  `FN_GPR1` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_gpr1`
--

INSERT INTO `ref_gpr1` (`FK_GPR1`, `FN_GPR1`) VALUES
('F01', 'NASI'),
('F02', 'KOPI'),
('F03', 'TEH'),
('F04', 'SOP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_gpr2`
--

CREATE TABLE `ref_gpr2` (
  `FK_GPR1` char(3) NOT NULL,
  `FK_GPR2` char(1) NOT NULL,
  `FN_GPR2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_gpr2`
--

INSERT INTO `ref_gpr2` (`FK_GPR1`, `FK_GPR2`, `FN_GPR2`) VALUES
('F01', '1', 'NASI GORENG SPESIAL'),
('F01', '2', 'NASI PUTIH NO 1'),
('F01', '3', 'TEST'),
('F01', '4', 'TEST NASI 01'),
('F02', '1', 'KOPI TORAJA'),
('F02', '2', 'KOPI JAWA'),
('F02', '3', 'KOPI LUWAK'),
('F03', '1', 'TEH SARIWANGI'),
('F03', '2', 'TEH MELATI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rls_mat_sup`
--

CREATE TABLE `rls_mat_sup` (
  `FK_SUP` char(3) NOT NULL,
  `FK_MAT` char(6) NOT NULL,
  `FHARGA` decimal(7,2) DEFAULT NULL,
  `FN_MAT_SUP` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rls_mat_sup`
--

INSERT INTO `rls_mat_sup` (`FK_SUP`, `FK_MAT`, `FHARGA`, `FN_MAT_SUP`) VALUES
('001', '001201', '3000.00', 'test'),
('001', '001203', '4000.00', 'material 3 A'),
('001', '003404', '25000.00', 'MATERIAL TEST 04'),
('002', '001201', '20000.00', 'test'),
('003', '001201', '90000.00', 'testtttt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_beli`
--

CREATE TABLE `t_beli` (
  `FNO_BELI` char(7) NOT NULL,
  `FK_MAT` char(6) NOT NULL,
  `FQTY` decimal(18,0) DEFAULT NULL,
  `FHARGA` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_beli`
--

INSERT INTO `t_beli` (`FNO_BELI`, `FK_MAT`, `FQTY`, `FHARGA`) VALUES
('1900001', '001201', '10', '20000.00'),
('1900001', '003404', '10', '25000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_hd`
--

CREATE TABLE `t_hd` (
  `FNO_BELI` char(7) NOT NULL,
  `FK_SUP` char(3) NOT NULL,
  `FJML` decimal(15,2) DEFAULT NULL,
  `FBAYAR` decimal(15,2) DEFAULT NULL,
  `FTGL_BAYAR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_hd`
--

INSERT INTO `t_hd` (`FNO_BELI`, `FK_SUP`, `FJML`, `FBAYAR`, `FTGL_BAYAR`) VALUES
('1900001', '002', '450000.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kas`
--

CREATE TABLE `t_kas` (
  `FNO_KAS` char(7) NOT NULL,
  `FKET` varchar(50) DEFAULT NULL,
  `FK_PERK` char(8) NOT NULL,
  `FJML` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kas`
--

INSERT INTO `t_kas` (`FNO_KAS`, `FKET`, `FK_PERK`, `FJML`) VALUES
('1900001', 'test', '66666666', '300000.00');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
