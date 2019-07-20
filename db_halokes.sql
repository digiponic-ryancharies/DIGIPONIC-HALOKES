/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : db_halokes_ver1.0

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 20/07/2019 11:41:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_ekskul_absensi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ekskul_absensi`;
CREATE TABLE `tbl_ekskul_absensi`  (
  `id_ekskul_absensi` int(11) NOT NULL AUTO_INCREMENT,
  `id_ekskul_absensi_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_ekskul` int(10) NULL DEFAULT NULL,
  `eks_abs_topik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `eks_abs_tanggal` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_ekskul_absensi`) USING BTREE,
  INDEX `fk_ekskul_ke_absensi`(`id_ekskul`) USING BTREE,
  CONSTRAINT `fk_ekskul_absensi` FOREIGN KEY (`id_ekskul`) REFERENCES `tbl_master_ekskul` (`id_ekskul`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_ekskul_absensi_detail
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ekskul_absensi_detail`;
CREATE TABLE `tbl_ekskul_absensi_detail`  (
  `id_ekskul_absensi_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_ekskul_absensi_detail_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_ekskul_absensi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_ekskul_absensi_detail`) USING BTREE,
  INDEX `fk_tbl_ekskul_absensi_detail`(`id_siswa`) USING BTREE,
  INDEX `id_ekskul_absensi`(`id_ekskul_absensi`) USING BTREE,
  CONSTRAINT `fk_tbl_ekskul_absensi_detail` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_master_siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_ekskul_absensi_detail_ibfk_1` FOREIGN KEY (`id_ekskul_absensi`) REFERENCES `tbl_ekskul_absensi` (`id_ekskul_absensi`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_ekskul_pembina
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ekskul_pembina`;
CREATE TABLE `tbl_ekskul_pembina`  (
  `id_ekskul_pembina` int(11) NOT NULL,
  `id_ekskul_pembina_url` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_guru` int(11) NULL DEFAULT NULL,
  `pembina_nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pembina_tgl_mulai` date NULL DEFAULT NULL,
  `pembina_tgl_selesai` date NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_ekskul_pembina`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_guru_jadwal_piket
-- ----------------------------
DROP TABLE IF EXISTS `tbl_guru_jadwal_piket`;
CREATE TABLE `tbl_guru_jadwal_piket`  (
  `id_jdw_guru_piket` int(11) NOT NULL AUTO_INCREMENT,
  `id_tapel` int(11) NULL DEFAULT NULL,
  `id_guru` int(11) NULL DEFAULT NULL,
  `id_jdw_guru_piket_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `piket_hari` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_jdw_guru_piket`) USING BTREE,
  INDEX `fk_guru_jadwal_piket`(`id_guru`) USING BTREE,
  INDEX `fk_tapel_jadwal`(`id_tapel`) USING BTREE,
  CONSTRAINT `fk_guru_jadwal_piket` FOREIGN KEY (`id_guru`) REFERENCES `tbl_master_guru` (`id_guru`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tapel_jadwal` FOREIGN KEY (`id_tapel`) REFERENCES `tbl_sys_tapel` (`id_tapel`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_guru_rpp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_guru_rpp`;
CREATE TABLE `tbl_guru_rpp`  (
  `id_rpp` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_jadwal` int(11) NULL DEFAULT NULL,
  `id_rpp_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kompetensi_dasar` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `alokasi_waktu` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `kompetensi_inti` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tujuan_pembelajaran` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `materi_pembelajaran` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `media_pembelajaran` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `sumber_belajar` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `langkah_pembelajaran` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `penilaian_hasil_pembelajaran` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_rpp`) USING BTREE,
  INDEX `fk_mapel_ke_rpp`(`id_mapel_jadwal`) USING BTREE,
  CONSTRAINT `fk_mapel_ke_rpp` FOREIGN KEY (`id_mapel_jadwal`) REFERENCES `tbl_mapel_jadwal` (`id_mapel_jadwal`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_info_kalender
-- ----------------------------
DROP TABLE IF EXISTS `tbl_info_kalender`;
CREATE TABLE `tbl_info_kalender`  (
  `id_kalendar` int(11) NOT NULL AUTO_INCREMENT,
  `id_kalendar_url` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kalender_nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kalendar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_kalender_detail
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kalender_detail`;
CREATE TABLE `tbl_kalender_detail`  (
  `id_kalendar_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_kalendar_detail_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kalendar` int(11) NOT NULL,
  `id_tapel` int(11) NOT NULL,
  `kalendar_kegiatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kalendar_tggl_awal` date NULL DEFAULT NULL,
  `kalendar_tggl_akhir` date NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kalendar_detail`) USING BTREE,
  INDEX `fk_tbl_kalender_detail`(`id_kalendar`) USING BTREE,
  INDEX `fk_tbl_kalender_detail2`(`id_tapel`) USING BTREE,
  CONSTRAINT `fk_tbl_kalender_detail` FOREIGN KEY (`id_kalendar`) REFERENCES `tbl_info_kalender` (`id_kalendar`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tbl_kalender_detail2` FOREIGN KEY (`id_tapel`) REFERENCES `tbl_sys_tapel` (`id_tapel`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_kelas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kelas`;
CREATE TABLE `tbl_kelas`  (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_semester` int(11) NULL DEFAULT NULL,
  `kelas_tingkat` int(11) NULL DEFAULT NULL,
  `kelas_abjad` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelas_ruang` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelas_jumlah_nilai` int(11) NULL DEFAULT NULL,
  `kelas_rata_rata_nilai` decimal(10, 0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas`) USING BTREE,
  INDEX `fk_semester_ke_kelas`(`id_semester`) USING BTREE,
  CONSTRAINT `fk_semester_ke_kelas` FOREIGN KEY (`id_semester`) REFERENCES `tbl_sys_semester` (`id_semester`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_kelas
-- ----------------------------
INSERT INTO `tbl_kelas` VALUES (1, 'WGO70WcmLbD26fOzwsvk', 1, 7, 'A', 'R.200', NULL, NULL, '2019-06-30 17:50:39', NULL, 1);
INSERT INTO `tbl_kelas` VALUES (2, '1LBexuHhnoYiDyad6QXd', 1, 7, 'B', 'R.201', NULL, NULL, '2019-06-30 17:51:01', NULL, 1);
INSERT INTO `tbl_kelas` VALUES (3, 'HpvZVtJoUFAzbzDgqzie', 1, 7, 'C', 'R.202', NULL, NULL, '2019-06-30 17:51:18', NULL, 1);
INSERT INTO `tbl_kelas` VALUES (4, 'MySXEBKs6w3gpQGq1tOQ', 1, 7, 'D', 'R.203', NULL, NULL, '2019-06-30 17:51:43', NULL, 1);
INSERT INTO `tbl_kelas` VALUES (5, 'B11mRafpItX5ebBQLayo', 1, 8, 'A', 'R.100', NULL, NULL, '2019-06-30 17:52:03', NULL, 1);
INSERT INTO `tbl_kelas` VALUES (6, 'XdpanMM8gv6mM5Z6MmON', 1, 8, 'B', 'R.101', NULL, NULL, '2019-06-30 17:52:17', NULL, 1);
INSERT INTO `tbl_kelas` VALUES (7, 'n7IqR5IRx6VaJ0XaJPC3', 1, 8, 'C', 'R.102', NULL, NULL, '2019-06-30 17:52:33', NULL, 1);
INSERT INTO `tbl_kelas` VALUES (8, 'F9ZtBA3wc8XEhvxdp6HY', 1, 8, 'D', 'R.103', NULL, NULL, '2019-07-05 22:39:43', NULL, 1);
INSERT INTO `tbl_kelas` VALUES (9, '57bCvE4wsgGSu9LQzOHe', 1, 9, 'A', 'R.211', NULL, NULL, '2019-07-13 16:27:17', NULL, 1);
INSERT INTO `tbl_kelas` VALUES (10, 'IpblsOLDHrimoKf9Ja82', 1, 9, 'B', 'R.212', NULL, NULL, '2019-07-13 16:27:30', NULL, 1);
INSERT INTO `tbl_kelas` VALUES (11, 'i2RtEnULbxpjKJ5Yg1rQ', 1, 9, 'C', 'R.213', NULL, NULL, '2019-07-13 16:27:42', NULL, 1);
INSERT INTO `tbl_kelas` VALUES (12, 'Jydup6WLNmCA2ZfozSXM', 1, 9, 'D', 'R.214', NULL, NULL, '2019-07-13 16:27:56', NULL, 1);

-- ----------------------------
-- Table structure for tbl_kelas_detail
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kelas_detail`;
CREATE TABLE `tbl_kelas_detail`  (
  `id_kelas_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas_detail_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas_detail`) USING BTREE,
  INDEX `fk_tbl_kelas_detail`(`id_kelas`) USING BTREE,
  INDEX `fk_tbl_kelas_detail2`(`id_siswa`) USING BTREE,
  CONSTRAINT `fk_tbl_kelas_detail` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tbl_kelas_detail2` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_master_siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_kelas_tugas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kelas_tugas`;
CREATE TABLE `tbl_kelas_tugas`  (
  `id_kelas_tugas` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_jadwal` int(11) NULL DEFAULT NULL,
  `id_kelas_tugas_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tugas_judul` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tugas_deskripsi` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tugas_created` datetime(0) NULL DEFAULT NULL,
  `tugas_deadline` datetime(0) NULL DEFAULT NULL,
  `tugas_lampiran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas_tugas`) USING BTREE,
  INDEX `fk_jadwal_ke_tugas`(`id_mapel_jadwal`) USING BTREE,
  CONSTRAINT `fk_jadwal_ke_tugas` FOREIGN KEY (`id_mapel_jadwal`) REFERENCES `tbl_mapel_jadwal` (`id_mapel_jadwal`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_kelas_wali
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kelas_wali`;
CREATE TABLE `tbl_kelas_wali`  (
  `id_wali_kelas` int(11) NOT NULL,
  `id_wali_kelas_url` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_guru` int(11) NULL DEFAULT NULL,
  `periode_awal` date NULL DEFAULT NULL,
  `periode_akhir` date NULL DEFAULT NULL,
  `status_wali` int(1) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_wali_kelas`) USING BTREE,
  INDEX `fk_kelas_wali`(`id_kelas`) USING BTREE,
  INDEX `fk_guru_wali`(`id_guru`) USING BTREE,
  CONSTRAINT `fk_guru_wali` FOREIGN KEY (`id_guru`) REFERENCES `tbl_master_guru` (`id_guru`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_kelas_wali` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_kelas_wali
-- ----------------------------
INSERT INTO `tbl_kelas_wali` VALUES (1, 'UqFcDw9riduPCWs', 1, 12, '2019-07-13', NULL, 1, '2019-07-13 22:37:07', NULL, 1);
INSERT INTO `tbl_kelas_wali` VALUES (2, '3oWmRuPbZFqfEc6', 2, 11, '2019-07-13', NULL, 1, '2019-07-13 22:38:33', NULL, 1);
INSERT INTO `tbl_kelas_wali` VALUES (3, 'VTzcWLp5UgxZI0M', 3, 8, '2019-07-13', NULL, 1, '2019-07-13 22:38:46', NULL, 1);
INSERT INTO `tbl_kelas_wali` VALUES (4, 'LrMWt5UzEu0heID', 4, 16, '2019-07-13', NULL, 1, '2019-07-13 22:38:54', NULL, 1);
INSERT INTO `tbl_kelas_wali` VALUES (5, 'oBTCwKGHpFOqltg', 5, 6, '2019-07-13', NULL, 1, '2019-07-13 22:39:04', NULL, 1);
INSERT INTO `tbl_kelas_wali` VALUES (6, 'A4skHpiP35feQhC', 6, 5, '2019-07-13', NULL, 1, '2019-07-13 22:39:14', NULL, 1);
INSERT INTO `tbl_kelas_wali` VALUES (7, '5rIFfsy1tbDSOhw', 7, 9, '2019-07-13', NULL, 1, '2019-07-13 22:39:26', NULL, 1);
INSERT INTO `tbl_kelas_wali` VALUES (8, 'eBjTVSutPWALqvH', 8, 15, '2019-07-13', NULL, 1, '2019-07-13 22:39:40', NULL, 1);
INSERT INTO `tbl_kelas_wali` VALUES (9, '5RICjP4HEXorSQm', 9, 13, '2019-07-13', NULL, 1, '2019-07-13 22:39:53', NULL, 1);
INSERT INTO `tbl_kelas_wali` VALUES (10, 'xEHuayPwdgmsWeL', 10, 4, '2019-07-13', NULL, 1, '2019-07-13 22:40:02', NULL, 1);
INSERT INTO `tbl_kelas_wali` VALUES (11, 'ikCfeKbULpQodch', 11, 10, '2019-07-13', NULL, 1, '2019-07-13 22:40:17', NULL, 1);
INSERT INTO `tbl_kelas_wali` VALUES (12, 'phsuaCqb7TwPHIt', 12, 14, '2019-07-13', NULL, 1, '2019-07-13 22:40:27', NULL, 1);

-- ----------------------------
-- Table structure for tbl_mapel_grup
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mapel_grup`;
CREATE TABLE `tbl_mapel_grup`  (
  `id_mapel_grup` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_grup_url` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_mapel_kurikulum` int(11) NULL DEFAULT NULL,
  `mapel_grup_nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mapel_grup_deskripsi` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_mapel_grup`) USING BTREE,
  INDEX `mapelgrup_kurikulum`(`id_mapel_kurikulum`) USING BTREE,
  CONSTRAINT `mapelgrup_kurikulum` FOREIGN KEY (`id_mapel_kurikulum`) REFERENCES `tbl_mapel_kurikulum` (`id_mapel_kurikulum`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_mapel_grup
-- ----------------------------
INSERT INTO `tbl_mapel_grup` VALUES (4, '42sqW', 2, 'Kelompok A', 'Kelompok A', '2019-07-13 21:59:10', NULL, 1);
INSERT INTO `tbl_mapel_grup` VALUES (5, 'R5ctW', 2, 'Kelompok B', 'Kelompok B', '2019-07-13 21:59:26', NULL, 1);
INSERT INTO `tbl_mapel_grup` VALUES (6, 'CpQ79', 2, 'Muatan Lokal', 'Muatan Lokal', '2019-07-13 21:59:40', NULL, 1);
INSERT INTO `tbl_mapel_grup` VALUES (7, 'znbtO', 2, 'Pengembangan Diri', 'Pengembangan Diri', '2019-07-13 21:59:55', NULL, 1);

-- ----------------------------
-- Table structure for tbl_mapel_jadwal
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mapel_jadwal`;
CREATE TABLE `tbl_mapel_jadwal`  (
  `id_mapel_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_jadwal_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_semester` int(11) NULL DEFAULT NULL,
  `id_mapel` int(11) NULL DEFAULT NULL,
  `id_guru` int(11) NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_mapel_jadwal`) USING BTREE,
  INDEX `fk_guru_ke_jadwal`(`id_guru`) USING BTREE,
  INDEX `fk_kelas_ke_jadwal`(`id_kelas`) USING BTREE,
  INDEX `fk_mapel_ke_jadwal`(`id_mapel`) USING BTREE,
  INDEX `fk_semester_ke_jadwal`(`id_semester`) USING BTREE,
  CONSTRAINT `fk_guru_ke_jadwal` FOREIGN KEY (`id_guru`) REFERENCES `tbl_master_guru` (`id_guru`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_kelas_ke_jadwal` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_mapel_ke_jadwal` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_master_mapel` (`id_mapel`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_semester_ke_jadwal` FOREIGN KEY (`id_semester`) REFERENCES `tbl_sys_semester` (`id_semester`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_mapel_jadwal
-- ----------------------------
INSERT INTO `tbl_mapel_jadwal` VALUES (1, '2GUmYMQPwlW61qIAVgT5', 1, 3, 24, 1, '2019-07-13 22:41:47', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (2, 'AeC0Yzf4GItsx3gHnUVW', 1, 1, 3, 1, '2019-07-13 22:43:02', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (3, 'uPfvDodHmWql06Orw2QY', 1, 13, 13, 1, '2019-07-14 12:35:41', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (4, 'MXCUIhWHYNPE17cS90Gs', 1, 24, 12, 1, '2019-07-14 12:37:34', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (5, 'FTwtk5HmeisfBg0ChXxA', 1, 4, 22, 1, '2019-07-14 12:54:50', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (6, 'NdH65qo0KxnJghFYGEpz', 1, 5, 23, 1, '2019-07-14 12:55:45', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (7, '8rPyon93wNxQhRLDIUlf', 1, 19, 4, 1, '2019-07-14 12:56:22', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (8, 'Dhv2kUABOP3JcSWQIyM4', 1, 17, 23, 1, '2019-07-14 13:53:57', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (9, 'gIUsOAzvEhSpRXtHM1Zw', 1, 23, 21, 1, '2019-07-14 13:59:20', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (10, 'bU09sXBAv4IoNwqcahP1', 1, 15, 18, 1, '2019-07-14 13:59:55', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (11, 'JcQewSRsmaXvMNPEgzCk', 1, 2, 11, 1, '2019-07-14 14:00:28', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (12, '9bzrG7RlJYcxDCmdWuK4', 1, 20, 9, 1, '2019-07-14 14:05:14', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (13, 'RZcslgamUfwMD205xt3z', 1, 16, 20, 1, '2019-07-14 14:05:49', NULL, 1);
INSERT INTO `tbl_mapel_jadwal` VALUES (14, 'daqgxLEebsmj0zrB6lCH', 1, 6, 10, 1, '2019-07-14 14:06:31', NULL, 1);

-- ----------------------------
-- Table structure for tbl_mapel_jadwal_detail
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mapel_jadwal_detail`;
CREATE TABLE `tbl_mapel_jadwal_detail`  (
  `id_mapel_jadwal_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_jadwal_detail_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_mapel_jadwal` int(11) NULL DEFAULT NULL,
  `jadwal_hari` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jadwal_jampel_awal` int(2) NULL DEFAULT NULL,
  `jadwal_jampel_akhir` int(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_mapel_jadwal_detail`) USING BTREE,
  INDEX `mapel_detail`(`id_mapel_jadwal`) USING BTREE,
  CONSTRAINT `mapel_detail` FOREIGN KEY (`id_mapel_jadwal`) REFERENCES `tbl_mapel_jadwal` (`id_mapel_jadwal`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_mapel_jadwal_detail
-- ----------------------------
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (1, 'dANV562iQfzkXIc7v04y', 1, 'senin', 1, 2, '2019-07-14 21:19:51', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (2, '90ou1xcH2Q6N7GyYSfMd', 1, 'selasa', 7, 8, '2019-07-14 21:20:47', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (3, '6taRWHzl8gemTpXOin0Q', 1, 'jumat', 1, 2, '2019-07-14 21:22:00', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (4, 'kL8mAlYGs0NcugHMSwrU', 2, 'senin', 3, 3, '2019-07-14 21:29:17', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (5, 'LOd4qbjB0HmQneMVECKk', 2, 'kamis', 9, 10, '2019-07-14 21:38:09', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (6, 'BeRDAi1X7hHWSP8rNOVM', 3, 'senin', 4, 5, '2019-07-14 21:38:46', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (7, 'iAe87tPX9LSx5DosgrOE', 3, 'rabu', 1, 2, '2019-07-14 21:39:04', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (8, 'SzC63vlj5nBD78egk4sA', 4, 'senin', 6, 7, '2019-07-14 21:40:16', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (9, 'Os8LidyN2GIon1lXuBrv', 4, 'kamis', 5, 6, '2019-07-14 21:40:38', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (10, 'sTjMWUVN74kLnpyq0Rxh', 5, 'senin', 8, 9, '2019-07-14 21:41:01', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (11, 'ouZpghCyjHU8nR9lT6Yq', 5, 'selasa', 3, 4, '2019-07-14 21:41:26', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (12, 'cQ7HuYyWfUkijqMdeONz', 5, 'kamis', 1, 2, '2019-07-14 21:41:48', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (13, 'VW26vG8zAmgNLBkys5dR', 6, 'selasa', 1, 2, '2019-07-14 21:46:59', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (14, 'TcWMQHASN1g0dJiEoDF8', 6, 'jumat', 3, 3, '2019-07-14 21:47:28', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (15, 'IzwyJaokt6Ohp3qjnXFf', 7, 'selasa', 5, 6, '2019-07-14 21:48:10', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (16, 'W6vpsmV87reUc9XRCFZD', 8, 'selasa', 9, 10, '2019-07-14 21:58:15', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (17, 'rQek583CqPiNMRUnpty7', 9, 'rabu', 3, 5, '2019-07-14 21:58:41', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (18, 'hxJGUOI7QfuYNMaWsP9S', 10, 'rabu', 6, 6, '2019-07-14 21:58:59', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (19, 'MNnRxci6FTA4aBgzYoO2', 11, 'rabu', 7, 9, '2019-07-14 21:59:17', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (20, 'X2lk9LOzBfN4AFi05VKc', 12, 'kamis', 3, 4, '2019-07-14 21:59:37', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (21, 'tfrZ8yFNTQ2YS0PWzhs9', 13, 'kamis', 7, 8, '2019-07-14 21:59:55', NULL, NULL);
INSERT INTO `tbl_mapel_jadwal_detail` VALUES (22, 'KkRBYCxLeIv3Nc9U7niq', 14, 'jumat', 5, 6, '2019-07-14 22:00:09', NULL, NULL);

-- ----------------------------
-- Table structure for tbl_mapel_kurikulum
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mapel_kurikulum`;
CREATE TABLE `tbl_mapel_kurikulum`  (
  `id_mapel_kurikulum` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_kurikulum_url` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kurikulum_nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kurikulum_deskripsi` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `kurikulum_aktif` int(1) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_mapel_kurikulum`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_mapel_kurikulum
-- ----------------------------
INSERT INTO `tbl_mapel_kurikulum` VALUES (1, 'ST092', 'KTSP 2006', 'Kurikulum tahun 2006', 0, '2019-06-22 19:59:10', NULL, 1);
INSERT INTO `tbl_mapel_kurikulum` VALUES (2, 'tox4V', 'K13', 'Kurikulum tahun 2013', 1, '2019-06-22 22:55:59', NULL, 1);

-- ----------------------------
-- Table structure for tbl_master_ekskul
-- ----------------------------
DROP TABLE IF EXISTS `tbl_master_ekskul`;
CREATE TABLE `tbl_master_ekskul`  (
  `id_ekskul` int(10) NOT NULL AUTO_INCREMENT,
  `id_ekskul_url` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ekskul_nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ekskul_deskripsi` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ekskul_jadwal` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_ekskul`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_master_ekskul
-- ----------------------------
INSERT INTO `tbl_master_ekskul` VALUES (1, 'dPyuFrxxHZ', 'Pramuka', NULL, 'rabu, sabtu', '2019-06-21 21:28:29', NULL, 1);
INSERT INTO `tbl_master_ekskul` VALUES (2, 'Aj9Di5H4n6', 'Sepak Bola', NULL, 'senin', '2019-06-21 22:00:10', NULL, 1);
INSERT INTO `tbl_master_ekskul` VALUES (3, 'rHWj1Rbvie', 'Basket', 'Olahraga basket', 'selasa', '2019-06-21 23:08:40', NULL, 1);
INSERT INTO `tbl_master_ekskul` VALUES (4, '5g739VKHYo', 'Musik', '', 'selasa, sabtu', '2019-06-22 04:22:33', NULL, 1);

-- ----------------------------
-- Table structure for tbl_master_guru
-- ----------------------------
DROP TABLE IF EXISTS `tbl_master_guru`;
CREATE TABLE `tbl_master_guru`  (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru_url` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_nip` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_nign` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_gelar_depan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_gelar_belakang` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_tgl_lahir` date NULL DEFAULT NULL,
  `guru_tempat_lahir` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_jkel` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_alamat` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `guru_no_hp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_agama` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_password` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_guru`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_master_guru
-- ----------------------------
INSERT INTO `tbl_master_guru` VALUES (1, 'gevua5VLQS', 'Priyadi Suprapto', '010010', NULL, NULL, 'S.Pd', '1980-01-01', 'Malang', 'L', 'Malang', NULL, 'priyadis@halokes.edu', NULL, 'priyadisupra', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 16:34:20', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (2, 'I0DfwXp2sz', 'Darussalam', '010011', NULL, NULL, 'S.Pd', '1981-08-07', 'Malang', 'L', 'Malang', NULL, 'salamdarus@halokes.edu', NULL, 'darussalam', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 16:39:07', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (3, 'lIL6nwHgMU', 'Syahroni', '010012', NULL, 'Drs. H.', NULL, '1980-07-03', 'Lumajang', 'L', 'Malang', NULL, 'syahroni@halokes.edu', NULL, 'syahroni09', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 16:41:03', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (4, 'o1Jx0LuD9t', 'Bambang Syaifudin', '010013', NULL, NULL, 'S.Ag', '1976-09-02', 'Malang', 'L', 'Malang', NULL, 'bambangs@halokes.edu', NULL, 'bambangsss', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 16:44:15', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (5, '10Qwt4RMZf', 'Siti Marzuqoh', '010014', NULL, NULL, 'S.Pd', '1980-09-10', 'Probolinggo', 'P', 'Malang', NULL, 'sitimarzuq@halokes.edu', NULL, 'sitimar00', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 16:51:14', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (6, 'MlP6nN1eVJ', 'Burhanudin', '010015', NULL, NULL, 'S.Pd', '1988-08-23', 'Malang', 'L', 'Malang', NULL, 'burhanudin@halokes.edu', NULL, 'burhanudindin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 16:55:23', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (7, 'TMkoA2hnUY', 'Takhril', '010016', NULL, 'Drs. H.', NULL, '1970-12-12', 'Malang', 'L', 'Malang', NULL, 'takhril@hakoles.edu', NULL, 'takhril70', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 16:56:16', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (8, 'kop6vqZQCJ', 'M. Sahdi Rosidi', '010017', NULL, NULL, 'S.Pd', '1981-09-09', 'Malang', 'L', 'Malang', NULL, 'sahdiros@halokes.edu', NULL, 'sahdiros01', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 16:57:12', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (9, 'z5o9CYjuc0', 'Kamali', '010018', NULL, 'Drs.', NULL, '1980-01-01', 'Malang', 'L', 'Malang', NULL, 'kamali@halokes.edu', NULL, 'kamali982', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 17:16:02', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (10, '1EVqAx2FHi', 'Sudalmanto', '010019', NULL, NULL, 'S.Pd.Si', '1976-09-05', 'Banyuwangi', 'L', 'Malang', NULL, 'sudalto@halokes.edu', NULL, 'sudalm4nt0', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 17:17:06', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (11, 'YIi30zKbVT', 'Sri Suprihati', '010020', NULL, 'Dra. Hj.', NULL, '1960-01-09', 'Malang', 'P', 'Malang', NULL, 'suprihatisri@halokes.edu', NULL, 'srisuprihati', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 21:15:51', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (12, 'RrozmbMEOu', 'Lies Erning R', '010021', NULL, 'Dra. Hj.', NULL, '1965-08-30', 'Yogyakarta', 'P', 'Malang', NULL, 'lieserning@halokes.edu', NULL, 'lieserning', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 21:16:44', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (13, 'HE3oMkYtL9', 'Kasmaboti', '010022', NULL, NULL, 'S.Ag', '1985-12-01', 'Madiun', 'L', 'Malang', NULL, 'kasmaboti@halokes.edu', NULL, 'kasmaboti009', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 21:19:21', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (14, 'Bz69pAd14E', 'Dedeh Kurniasih', '010023', NULL, NULL, 'S.E', '1981-02-02', 'Malang', 'P', 'Malang', NULL, 'kurniasihde@halokes.edu', NULL, 'dedehkurniasih', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 21:20:09', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (15, 'e5oAxNlKjY', 'Diding Tajuddin', '010024', NULL, 'Drs.', NULL, '1976-01-30', 'Malang', 'L', 'Malang', NULL, 'didingtajud@halokes.edu', NULL, 'didingtajuddin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 21:21:28', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (16, 'YEI8bKXajS', 'Iden Sujana', '010025', NULL, 'Drs.', NULL, '1977-07-31', 'Malang', 'L', 'Malang', NULL, 'idensujana@halokes.edu', NULL, 'idensujana', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 21:22:29', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (17, 'MW2jTQ0IKG', 'Ahmad Faridi', '010026', NULL, NULL, 'S.Pd', '1980-08-08', 'Malang', 'L', 'Malang', NULL, 'ahmadfaridi@halokes.edu', NULL, 'ahmadfaridiii', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 22:16:49', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (18, 'OsjMeAWD3S', 'Diki Hernandi', '010027', NULL, NULL, 'S.Pd', '1979-06-30', 'Malang', 'L', 'Malang', NULL, 'dikihernandi@halokes.edu', NULL, 'dikihernanan', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 22:17:39', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (19, 'pmrMcEJ5Wy', 'Muhammad Hatta', '010028', NULL, NULL, 'S.Pd. BK', '1984-12-15', 'Surabaya', 'L', 'Malang', NULL, 'hattamuh@halokes.edu', NULL, 'hattamuhammad', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 22:18:45', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (20, '5PXaSyI0JM', 'Agus Singgih', '010029', NULL, NULL, 'S.Sn', '1987-02-28', 'Malang', 'L', 'Malang', NULL, 'singgihgus@halokes.edu', NULL, 'singgihag03s', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 22:20:32', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (21, '4HMiJCDtUq', 'Testiwati', '010030', NULL, NULL, 'S.Ag', '1976-08-09', 'Lumajang', 'P', 'Malang', NULL, 'testiwati@halokes.edu', NULL, 'testiwat111', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 22:21:21', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (22, 'QOYRCxA8Se', 'M. Arifin', '010031', NULL, NULL, 'S.Pd', '1988-08-08', 'Malang', 'L', 'Malang', NULL, 'arifinm@halokes.edu', NULL, 'ar1f1nmuhammad', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 22:22:06', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (23, 'vhRiLAytb1', 'Dwi Astuti', '010032', '', '', 'S.Pd', '1980-11-23', 'Malang', 'P', 'Malang', '', 'dwiastuti@halokes.edu', '', 'dwi4stut1', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 22:33:02', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (24, 'C8OTGgLhyQ', 'Fitriani', '010033', '', '', 'S.Pd', '1985-04-23', 'Malang', 'P', 'Malang', '', 'fitriani@halokes.edu', '', 'fitrianiii', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 22:33:54', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (25, 'ZPX0tRu57s', 'Fauziah', '010034', '', '', 'S.Pd', '1985-02-19', 'Pasuruan', 'P', 'Malang', '', 'fauziah@halokes.edu', '', 'fauzi4h213', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 22:34:39', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (26, 'SRzCQ24rPt', 'Suhaemi Haryani', '010035', '', '', 'S.Pd', '1980-02-03', 'Malang', 'P', 'Malang', '', 'suhaemih@halokes.edu', '', 'suhaem111', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 22:35:26', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (27, 'P0lYwHaKxM', 'Teguh Prasetyo', '010036', '', '', '', '1986-10-28', 'Pasuruan', 'L', 'Malang', '', 'teguhpras@halokes.edu', '', 'tegusprazz', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', '2019-07-13 22:36:01', NULL, 1);

-- ----------------------------
-- Table structure for tbl_master_mapel
-- ----------------------------
DROP TABLE IF EXISTS `tbl_master_mapel`;
CREATE TABLE `tbl_master_mapel`  (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_mapel_kurikulum` int(11) NULL DEFAULT NULL,
  `id_mapel_grup` int(11) NULL DEFAULT NULL,
  `mapel_nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mapel_kkm` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_mapel`) USING BTREE,
  INDEX `fk_grup_ke_mapel`(`id_mapel_grup`) USING BTREE,
  INDEX `fk_kurikulum_ke_mapel`(`id_mapel_kurikulum`) USING BTREE,
  CONSTRAINT `fk_grup_ke_mapel` FOREIGN KEY (`id_mapel_grup`) REFERENCES `tbl_mapel_grup` (`id_mapel_grup`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_kurikulum_ke_mapel` FOREIGN KEY (`id_mapel_kurikulum`) REFERENCES `tbl_mapel_kurikulum` (`id_mapel_kurikulum`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_master_mapel
-- ----------------------------
INSERT INTO `tbl_master_mapel` VALUES (1, 'aC73WG2BVzuEdR98TSgf', 2, 4, 'Pendidikan Agama', 70, '2019-07-13 22:02:19', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (2, 'jX6y0w97g3PUZ84rzf1c', 2, 4, 'PKN', 70, '2019-07-13 22:02:31', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (3, 'JTEyVFLnIRN4D9cvKZPg', 2, 4, 'Bahasa Indonesia', 70, '2019-07-13 22:02:42', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (4, 'Z7AuqIVaNQhPxMdY3fso', 2, 4, 'Matematika', 70, '2019-07-13 22:02:57', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (5, 'yXohKqBvarJxA3OPbdj8', 2, 4, 'Fisika', 70, '2019-07-13 22:03:11', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (6, 'bF2KcLZrqjwg4TMCxSv3', 2, 4, 'Biologi', 70, '2019-07-13 22:03:27', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (7, 'EaYZIjHSsLbTKrDAm51c', 2, 4, 'IPS Terpadu', 70, '2019-07-13 22:03:50', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (13, '1hB2uXpVab3FDYGRineH', 2, 4, 'Geografi', 70, '2019-07-13 22:06:42', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (14, 'KwRritkhPJn2CaWDYjyo', 2, 4, 'Sejarah', 70, '2019-07-13 22:06:56', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (15, 'y57D6nNcsU2HedqMlaKW', 2, 5, 'KTK (Seni Rupa)', 70, '2019-07-13 22:08:04', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (16, 'BRYvwzrupVTa2O4nCMFX', 2, 5, 'Seni Budaya (Musik)', 70, '2019-07-13 22:08:23', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (17, 'mfRg7socZ03jIOJSVze5', 2, 5, 'Prakarya', 70, '2019-07-13 22:08:51', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (18, '2OcuTmFgDI5BaAd8bqxJ', 2, 6, 'PLKJ', 70, '2019-07-13 22:09:08', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (19, 'ZJ8YnXR1AIPmwvMuzi2r', 2, 6, 'Bahasa Arab', 70, '2019-07-13 22:09:37', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (20, 'MfsCvP9GZV6ljo1DcuJ0', 2, 5, 'Pendidikan Jasmani', 70, '2019-07-13 22:09:56', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (21, 'NlE752AozLPpjIYX3BgK', 2, 5, 'TIK', 70, '2019-07-13 22:10:55', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (22, 'jLxikyzPM0qS3RgUEXr2', 2, 7, 'Bimbingan Konseling', 70, '2019-07-13 22:11:27', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (23, 'O6buQSTgDo8xjwnAUNMW', 2, 6, 'Al-Qur\'an / Tahfiz', 70, '2019-07-13 22:12:09', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (24, 'G2H49UyBvgaZwLdSfp1X', 2, 4, 'Bahasa Inggris', 70, '2019-07-14 12:36:38', NULL, 1);

-- ----------------------------
-- Table structure for tbl_master_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `tbl_master_pegawai`;
CREATE TABLE `tbl_master_pegawai`  (
  `id_pegawai` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai_url` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pegawai_nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pegawai_username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pegawai_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_master_pegawai
-- ----------------------------
INSERT INTO `tbl_master_pegawai` VALUES (1, 'B8oE5367yX', 'Pegawai', 'pegawai', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2019-06-29 05:02:19', NULL, 1);

-- ----------------------------
-- Table structure for tbl_master_sanksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_master_sanksi`;
CREATE TABLE `tbl_master_sanksi`  (
  `id_sanksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_sanksi_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sanksi_nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sanksi_jenis` int(11) NULL DEFAULT NULL,
  `sanksi_poin` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_sanksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_master_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tbl_master_siswa`;
CREATE TABLE `tbl_master_siswa`  (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_tapel` int(11) NULL DEFAULT NULL,
  `siswa_nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_nisn` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_nis` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_tgl_lahir` date NULL DEFAULT NULL,
  `siswa_tempat_lahir` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_jkel` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_alamat` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `siswa_no_hp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_agama` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `siswa_status` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`) USING BTREE,
  INDEX `fk_tapel_ke_siswa`(`id_tapel`) USING BTREE,
  CONSTRAINT `fk_tapel_ke_siswa` FOREIGN KEY (`id_tapel`) REFERENCES `tbl_sys_tapel` (`id_tapel`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_master_siswa
-- ----------------------------
INSERT INTO `tbl_master_siswa` VALUES (7, 'YLXpE3jSZh', 1, 'MUHAMMAD BIMA INDRA KUSUMA', '2302259442', '75566-9642', '1970-01-01', 'Malang', 'L', 'Jl. Wijaya Barat 108 RT 03 RW 03, Pagentan, Singosari', '089650691537', '161111070@mhs.stiki.ac.id', 'islam', NULL, NULL, 1, '2019-06-28 20:16:32', NULL, 1);

-- ----------------------------
-- Table structure for tbl_nilai_kelas
-- ----------------------------
DROP TABLE IF EXISTS `tbl_nilai_kelas`;
CREATE TABLE `tbl_nilai_kelas`  (
  `id_nilai_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_jadwal` int(11) NULL DEFAULT NULL,
  `id_nilai_topik` int(11) NULL DEFAULT NULL,
  `id_nilai_kelas_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai_keterangan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai_status` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai_kelas`) USING BTREE,
  INDEX `fk_jadwal_ke_nilai`(`id_mapel_jadwal`) USING BTREE,
  INDEX `fk_topik_ke_kelas`(`id_nilai_topik`) USING BTREE,
  CONSTRAINT `fk_jadwal_ke_nilai` FOREIGN KEY (`id_mapel_jadwal`) REFERENCES `tbl_mapel_jadwal` (`id_mapel_jadwal`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_topik_ke_kelas` FOREIGN KEY (`id_nilai_topik`) REFERENCES `tbl_nilai_topik` (`id_nilai_topik`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_nilai_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tbl_nilai_siswa`;
CREATE TABLE `tbl_nilai_siswa`  (
  `id_nilai_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_nilai_siswa_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_nilai_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai_siswa`) USING BTREE,
  INDEX `fk_tbl_nilai_siswa`(`id_nilai_kelas`) USING BTREE,
  INDEX `fk_tbl_nilai_siswa2`(`id_siswa`) USING BTREE,
  CONSTRAINT `fk_tbl_nilai_siswa` FOREIGN KEY (`id_nilai_kelas`) REFERENCES `tbl_nilai_kelas` (`id_nilai_kelas`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tbl_nilai_siswa2` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_master_siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_nilai_topik
-- ----------------------------
DROP TABLE IF EXISTS `tbl_nilai_topik`;
CREATE TABLE `tbl_nilai_topik`  (
  `id_nilai_topik` int(11) NOT NULL AUTO_INCREMENT,
  `id_nilai_topik_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai_topik` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `persentase` decimal(10, 0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai_topik`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_siswa_absensi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_siswa_absensi`;
CREATE TABLE `tbl_siswa_absensi`  (
  `id_siswa_absensi` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_mapel_jadwal` int(11) NULL DEFAULT NULL,
  `id_siswa_absensi_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `absensi_ket` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `absensi_alasan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa_absensi`) USING BTREE,
  INDEX `fk_jadwal_ke_absen`(`id_mapel_jadwal`) USING BTREE,
  INDEX `fk_siswa_ke_absen`(`id_siswa`) USING BTREE,
  CONSTRAINT `fk_jadwal_ke_absen` FOREIGN KEY (`id_mapel_jadwal`) REFERENCES `tbl_mapel_jadwal` (`id_mapel_jadwal`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_siswa_ke_absen` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_master_siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_siswa_baru
-- ----------------------------
DROP TABLE IF EXISTS `tbl_siswa_baru`;
CREATE TABLE `tbl_siswa_baru`  (
  `id_siswa_baru` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_siswa_baru_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sb_asal_sekolah` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sb_un_indo` int(11) NULL DEFAULT NULL,
  `sb_un_mat` int(11) NULL DEFAULT NULL,
  `sb_un_ipa` int(11) NULL DEFAULT NULL,
  `sb_ijazah` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sb_skhun` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa_baru`) USING BTREE,
  INDEX `fk_siswa_ke_sb`(`id_siswa`) USING BTREE,
  CONSTRAINT `fk_siswa_ke_sb` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_master_siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_siswa_mutasi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_siswa_mutasi`;
CREATE TABLE `tbl_siswa_mutasi`  (
  `id_siswa_mutasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa_mutasi_url` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_tapel` int(11) NULL DEFAULT NULL,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `mutasi_tanggal` date NULL DEFAULT NULL,
  `mutasi_alasan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mutasi_keterangan` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa_mutasi`) USING BTREE,
  INDEX `fk_siswa_ke_mutasi`(`id_siswa`) USING BTREE,
  INDEX `fk_tapel_ke_mutasi`(`id_tapel`) USING BTREE,
  CONSTRAINT `fk_siswa_ke_mutasi` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_master_siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tapel_ke_mutasi` FOREIGN KEY (`id_tapel`) REFERENCES `tbl_sys_tapel` (`id_tapel`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_siswa_ortu
-- ----------------------------
DROP TABLE IF EXISTS `tbl_siswa_ortu`;
CREATE TABLE `tbl_siswa_ortu`  (
  `id_siswa_ortu` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa_ortu_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_ayah` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_hp_ayah` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_ibu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_hp_ibu` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_wali` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_hp_wali` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ortu_username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ortu_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa_ortu`) USING BTREE,
  INDEX `fk_siswa_ortu2`(`id_siswa`) USING BTREE,
  CONSTRAINT `fk_siswa_ortu2` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_master_siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_siswa_prestasi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_siswa_prestasi`;
CREATE TABLE `tbl_siswa_prestasi`  (
  `id_siswa_prestasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa_prestasi_url` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `prestasi_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `prestasi_lokasi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `prestasi_penyelenggara` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `prestasi_tingkat` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `prestasi_tggl_awal` date NULL DEFAULT NULL,
  `prestasi_tggl_akhir` date NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa_prestasi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_siswa_prestasi_detail
-- ----------------------------
DROP TABLE IF EXISTS `tbl_siswa_prestasi_detail`;
CREATE TABLE `tbl_siswa_prestasi_detail`  (
  `id_siswa_prestasi_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa_prestasi_detail_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_siswa_prestasi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `prestasi_juara` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `prestasi_lampiran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa_prestasi_detail`) USING BTREE,
  INDEX `fk_tbl_siswa_prestasi_detail`(`id_siswa_prestasi`) USING BTREE,
  INDEX `fk_tbl_siswa_prestasi_detail2`(`id_siswa`) USING BTREE,
  CONSTRAINT `fk_tbl_siswa_prestasi_detail` FOREIGN KEY (`id_siswa_prestasi`) REFERENCES `tbl_siswa_prestasi` (`id_siswa_prestasi`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tbl_siswa_prestasi_detail2` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_master_siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_siswa_sanksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_siswa_sanksi`;
CREATE TABLE `tbl_siswa_sanksi`  (
  `id_siswa_sanksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa_sanksi_url` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_sanksi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa_sanksi`) USING BTREE,
  INDEX `fk_tbl_siswa_sanksi`(`id_sanksi`) USING BTREE,
  INDEX `fk_tbl_siswa_sanksi2`(`id_siswa`) USING BTREE,
  CONSTRAINT `fk_tbl_siswa_sanksi` FOREIGN KEY (`id_sanksi`) REFERENCES `tbl_master_sanksi` (`id_sanksi`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tbl_siswa_sanksi2` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_master_siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_super_admin
-- ----------------------------
DROP TABLE IF EXISTS `tbl_super_admin`;
CREATE TABLE `tbl_super_admin`  (
  `id_sadmin` int(11) NOT NULL,
  `id_sadmin_url` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sadmin_nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sadmin_username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sadmin_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_sadmin`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_super_admin
-- ----------------------------
INSERT INTO `tbl_super_admin` VALUES (1, 'jlr8BuTlh4', 'User Demo', 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91');

-- ----------------------------
-- Table structure for tbl_sys_semester
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sys_semester`;
CREATE TABLE `tbl_sys_semester`  (
  `id_semester` int(11) NOT NULL AUTO_INCREMENT,
  `id_semester_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_tapel` int(11) NULL DEFAULT NULL,
  `semester_nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `semester_aktif` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_semester`) USING BTREE,
  INDEX `fk_tapel_ke_semester`(`id_tapel`) USING BTREE,
  CONSTRAINT `fk_tapel_ke_semester` FOREIGN KEY (`id_tapel`) REFERENCES `tbl_sys_tapel` (`id_tapel`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_sys_semester
-- ----------------------------
INSERT INTO `tbl_sys_semester` VALUES (1, 'PUUQK3XPfACIEgbIvjtx', 1, 'Ganjil', 1, '2019-06-30 17:39:14', NULL, 1);

-- ----------------------------
-- Table structure for tbl_sys_tapel
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sys_tapel`;
CREATE TABLE `tbl_sys_tapel`  (
  `id_tapel` int(11) NOT NULL AUTO_INCREMENT,
  `id_tapel_url` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tapel_nama` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tapel_tahun` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tapel_aktif` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tapel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_sys_tapel
-- ----------------------------
INSERT INTO `tbl_sys_tapel` VALUES (1, 'USWG1tuGJ7', '2017/2018', '2017', 1, '2019-06-28 18:16:54', NULL, 1);

-- ----------------------------
-- Table structure for tbl_ujian_jadwal
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ujian_jadwal`;
CREATE TABLE `tbl_ujian_jadwal`  (
  `id_ujian_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_ujian_jadwal_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `ujian_jadwal_hari` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ujian_jadwal_jam_awal` time(0) NULL DEFAULT NULL,
  `ujian_jadwal_jam_akhir` time(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_ujian_jadwal`) USING BTREE,
  INDEX `fk_kelas_ke_jadwal_ujian`(`id_kelas`) USING BTREE,
  CONSTRAINT `fk_kelas_ke_jadwal_ujian` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
