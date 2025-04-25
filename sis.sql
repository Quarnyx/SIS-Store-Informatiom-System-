/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : 127.0.0.1:3306
 Source Schema         : sis

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 25/04/2025 23:22:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for akun
-- ----------------------------
DROP TABLE IF EXISTS `akun`;
CREATE TABLE `akun`  (
  `id_akun` int NOT NULL AUTO_INCREMENT,
  `nama_akun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_akun` enum('Aktiva Lancar','Aktiva Tetap','Modal','Utang Lancar','Pendapatan','Beban','Pengeluaran','Kewajiban','Harga Pokok Penjualan','Penyusutan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `wajib` tinyint(1) NULL DEFAULT NULL,
  `kode_akun` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_akun`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of akun
-- ----------------------------
INSERT INTO `akun` VALUES (2, 'Modal A', 'Modal', 0, '00002');
INSERT INTO `akun` VALUES (3, 'Persediaan', 'Aktiva Lancar', 1, '00003');
INSERT INTO `akun` VALUES (4, 'Kas', 'Aktiva Lancar', 1, '00001');
INSERT INTO `akun` VALUES (5, 'Pendapatan', 'Pendapatan', 1, '00004');
INSERT INTO `akun` VALUES (6, 'Harga Pokok Penjualan', 'Harga Pokok Penjualan', 1, '00005');
INSERT INTO `akun` VALUES (7, 'Bangunan', 'Aktiva Tetap', 0, '00006');

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_beli` decimal(10, 2) NOT NULL,
  `harga_jual` decimal(10, 2) NOT NULL,
  `kode_barang` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `satuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (1, 'Indomie', 'aaaaaaaaa', 2400.00, 5000.00, 'PCS-001', 'PCS', 'PCS-001.png');
INSERT INTO `barang` VALUES (3, 'Pepsodent', 'adasdasdasdasdada', 5000.00, 6000.00, 'PCS-002', 'PCS', 'PCS-002.png');

-- ----------------------------
-- Table structure for keranjang
-- ----------------------------
DROP TABLE IF EXISTS `keranjang`;
CREATE TABLE `keranjang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_penjualan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_barang` int NULL DEFAULT NULL,
  `tanggal_transaksi` date NULL DEFAULT NULL,
  `harga_jual` decimal(10, 2) NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `total` decimal(10, 2) NULL DEFAULT NULL,
  `harga_beli` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_barang`(`id_barang` ASC) USING BTREE,
  CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of keranjang
-- ----------------------------
INSERT INTO `keranjang` VALUES (1, 'INV-001', 1, '2025-04-25', 5000.00, 50, 250000.00, 2400.00);
INSERT INTO `keranjang` VALUES (5, 'INV-002', 3, '2025-04-25', 6000.00, 2, 12000.00, 5000.00);
INSERT INTO `keranjang` VALUES (6, 'INV-002', 1, '2025-04-25', 5000.00, 1, 5000.00, 2400.00);

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `id_pembelian` int NOT NULL AUTO_INCREMENT,
  `id_barang` int NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `kode_pembelian` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_pengguna` int NOT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `harga_beli` decimal(10, 2) NULL DEFAULT NULL,
  `id_supplier` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`) USING BTREE,
  INDEX `id_produk`(`id_barang` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  INDEX `id_supplier`(`id_supplier` ASC) USING BTREE,
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES (2, 1, '2025-04-23', 'PBL-001', 5, 1000, 2400.00, 1);
INSERT INTO `pembelian` VALUES (3, 3, '2025-04-25', 'PBL-002', 5, 1000, 5000.00, 1);

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `id_pengguna` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES (5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin');

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_penjualan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total` decimal(10, 2) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `id_pengguna` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES (1, 'INV-001', 250000.00, '2025-04-25', 5);
INSERT INTO `penjualan` VALUES (3, 'INV-002', 17000.00, '2025-04-25', 5);

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `id_supplier` int NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kontak_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id_supplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (1, 'Wings Food', '0898983232', 'adsadsadasdasdsadsadsadsdsda');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_transaksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total` decimal(10, 2) NOT NULL,
  `id_akun_debit` int NOT NULL,
  `id_akun_kredit` int NOT NULL,
  `tanggal_transaksi` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE,
  INDEX `id_akun_debit`(`id_akun_debit` ASC) USING BTREE,
  INDEX `id_akun_kredit`(`id_akun_kredit` ASC) USING BTREE,
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_akun_debit`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_akun_kredit`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES (2, 'PembelianPBL-001', 'PBL-001', 2400000.00, 3, 4, '2025-04-23');
INSERT INTO `transaksi` VALUES (4, 'HPP dari penjualan INV-001', 'INV-001', 120000.00, 6, 3, '2025-04-25');
INSERT INTO `transaksi` VALUES (5, 'Penjualan dari kode INV-001', 'INV-001', 250000.00, 4, 5, '2025-04-25');
INSERT INTO `transaksi` VALUES (6, 'PembelianPBL-002', 'PBL-002', 5000000.00, 3, 4, '2025-04-25');
INSERT INTO `transaksi` VALUES (9, 'HPP dari penjualan INV-002', 'INV-002', 12400.00, 6, 3, '2025-04-25');
INSERT INTO `transaksi` VALUES (10, 'Penjualan dari kode INV-002', 'INV-002', 17000.00, 4, 5, '2025-04-25');
INSERT INTO `transaksi` VALUES (11, 'sdadasdsdsdcaa', 'JRNL20250425145827', 2000000.00, 4, 2, '2025-04-01');
INSERT INTO `transaksi` VALUES (12, 'Kas Awal', 'JRNL20250425150019', 25000000.00, 4, 2, '2025-04-02');

-- ----------------------------
-- View structure for jurnal
-- ----------------------------
DROP VIEW IF EXISTS `jurnal`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `jurnal` AS select `t`.`tanggal_transaksi` AS `tanggal_transaksi`,`t`.`deskripsi` AS `deskripsi`,`t`.`kode_transaksi` AS `kode_transaksi`,`a1`.`id_akun` AS `id_akun`,`a1`.`nama_akun` AS `nama_akun`,`a1`.`jenis_akun` AS `jenis_akun`,`t`.`id_transaksi` AS `id_transaksi`,(case when (`t`.`id_akun_debit` = `a1`.`id_akun`) then `t`.`total` else 0 end) AS `debit`,(case when (`t`.`id_akun_kredit` = `a1`.`id_akun`) then `t`.`total` else 0 end) AS `kredit` from (`transaksi` `t` join `akun` `a1` on(((`t`.`id_akun_debit` = `a1`.`id_akun`) or (`t`.`id_akun_kredit` = `a1`.`id_akun`)))) order by `t`.`tanggal_transaksi`;

-- ----------------------------
-- View structure for stok
-- ----------------------------
DROP VIEW IF EXISTS `stok`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `stok` AS select `p`.`id_barang` AS `id`,`p`.`nama_barang` AS `nama_barang`,ifnull(`pur`.`total_purchased`,0) AS `total_beli`,ifnull(`sal`.`total_sold`,0) AS `total_terjual`,(ifnull(`pur`.`total_purchased`,0) - ifnull(`sal`.`total_sold`,0)) AS `stok`,`p`.`harga_beli` AS `harga_beli`,`p`.`harga_jual` AS `harga_jual` from ((`barang` `p` left join (select `pembelian`.`id_barang` AS `id_barang`,sum(`pembelian`.`jumlah`) AS `total_purchased` from `pembelian` group by `pembelian`.`id_barang`) `pur` on((`p`.`id_barang` = `pur`.`id_barang`))) left join (select `keranjang`.`id_barang` AS `id_barang`,sum(`keranjang`.`qty`) AS `total_sold` from `keranjang` group by `keranjang`.`id_barang`) `sal` on((`p`.`id_barang` = `sal`.`id_barang`)));

-- ----------------------------
-- View structure for v_keranjang
-- ----------------------------
DROP VIEW IF EXISTS `v_keranjang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_keranjang` AS select `keranjang`.`id` AS `id`,`keranjang`.`kode_penjualan` AS `kode_penjualan`,`keranjang`.`id_barang` AS `id_barang`,`keranjang`.`tanggal_transaksi` AS `tanggal_transaksi`,`keranjang`.`harga_jual` AS `harga_jual`,`keranjang`.`qty` AS `qty`,`keranjang`.`total` AS `total`,`barang`.`nama_barang` AS `nama_barang`,`keranjang`.`harga_beli` AS `harga_beli` from (`keranjang` join `barang` on((`keranjang`.`id_barang` = `barang`.`id_barang`)));

-- ----------------------------
-- View structure for v_pembelian
-- ----------------------------
DROP VIEW IF EXISTS `v_pembelian`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_pembelian` AS select `pembelian`.`id_pembelian` AS `id_pembelian`,`pembelian`.`id_barang` AS `id_barang`,`pembelian`.`tanggal_masuk` AS `tanggal_masuk`,`pembelian`.`kode_pembelian` AS `kode_pembelian`,`pembelian`.`id_pengguna` AS `id_pengguna`,`pembelian`.`jumlah` AS `jumlah`,`pembelian`.`harga_beli` AS `harga_beli`,`pembelian`.`id_supplier` AS `id_supplier`,`barang`.`nama_barang` AS `nama_barang`,`supplier`.`nama_supplier` AS `nama_supplier`,`barang`.`kode_barang` AS `kode_barang`,`barang`.`satuan` AS `satuan` from ((`pembelian` join `barang` on((`pembelian`.`id_barang` = `barang`.`id_barang`))) join `supplier` on((`pembelian`.`id_supplier` = `supplier`.`id_supplier`)));

-- ----------------------------
-- View structure for v_supplier
-- ----------------------------
DROP VIEW IF EXISTS `v_supplier`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_supplier` AS select `pembelian`.`id_pembelian` AS `id_pembelian`,`pembelian`.`id_produk` AS `id_produk`,`pembelian`.`tanggal_masuk` AS `tanggal_masuk`,`pembelian`.`tanggal_kadaluarsa` AS `tanggal_kadaluarsa`,`pembelian`.`kode_pembelian` AS `kode_pembelian`,`pembelian`.`id_pengguna` AS `id_pengguna`,`pembelian`.`jumlah` AS `jumlah`,`pembelian`.`harga_beli` AS `harga_beli`,`pembelian`.`id_supplier` AS `id_supplier`,`supplier`.`nama_supplier` AS `nama_supplier`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`kode_produk` AS `kode_produk` from ((`supplier` join `pembelian` on((`supplier`.`id_supplier` = `pembelian`.`id_supplier`))) join `produk` on((`pembelian`.`id_produk` = `produk`.`id_produk`)));

SET FOREIGN_KEY_CHECKS = 1;
