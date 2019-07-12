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

 Date: 29/06/2019 09:08:28
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
  INDEX `fk_ekskul_ke_absensi`(`id_ekskul`) USING BTREE
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
  `id_guru` int(11) NOT NULL,
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
  INDEX `fk_wali_kelas`(`id_guru`) USING BTREE,
  CONSTRAINT `fk_semester_ke_kelas` FOREIGN KEY (`id_semester`) REFERENCES `tbl_sys_semester` (`id_semester`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_wali_kelas` FOREIGN KEY (`id_guru`) REFERENCES `tbl_master_guru` (`id_guru`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_mapel_grup
-- ----------------------------
INSERT INTO `tbl_mapel_grup` VALUES (1, 'JSFxI', 1, 'Kelompok Wajib', '', '2019-06-22 20:03:33', NULL, 1);
INSERT INTO `tbl_mapel_grup` VALUES (2, 'QETaU', 1, 'Kelompok Muatan Lokal', '', '2019-06-22 20:03:41', NULL, 1);
INSERT INTO `tbl_mapel_grup` VALUES (3, 'RrCZq', 1, 'Kelompok Khusus', '', '2019-06-22 23:07:47', NULL, 1);

-- ----------------------------
-- Table structure for tbl_mapel_jadwal
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mapel_jadwal`;
CREATE TABLE `tbl_mapel_jadwal`  (
  `id_mapel_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_jadwal_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_mapel` int(11) NULL DEFAULT NULL,
  `id_guru` int(11) NULL DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `jadwal_hari` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jadwal_jampel` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_mapel_jadwal`) USING BTREE,
  INDEX `fk_guru_ke_jadwal`(`id_guru`) USING BTREE,
  INDEX `fk_kelas_ke_jadwal`(`id_kelas`) USING BTREE,
  INDEX `fk_mapel_ke_jadwal`(`id_mapel`) USING BTREE,
  CONSTRAINT `fk_guru_ke_jadwal` FOREIGN KEY (`id_guru`) REFERENCES `tbl_master_guru` (`id_guru`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_kelas_ke_jadwal` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_mapel_ke_jadwal` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_master_mapel` (`id_mapel`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tbl_mapel_kurikulum
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mapel_kurikulum`;
CREATE TABLE `tbl_mapel_kurikulum`  (
  `id_mapel_kurikulum` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_kurikulum_url` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kurikulum_nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kurikulum_deskripsi` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_mapel_kurikulum`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_mapel_kurikulum
-- ----------------------------
INSERT INTO `tbl_mapel_kurikulum` VALUES (1, 'ST092', 'KTSP 2006', 'Kurikulum tahun 2006', '2019-06-22 19:59:10', NULL, 1);
INSERT INTO `tbl_mapel_kurikulum` VALUES (2, 'tox4V', 'K13', 'Kurikulum tahun 2013', '2019-06-22 22:55:59', NULL, 1);

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
  `guru_no_hp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_agama` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guru_password` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_guru`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_master_guru
-- ----------------------------
INSERT INTO `tbl_master_guru` VALUES (1, 'bgA9Hx7Hsl', 'AHMAD MUCHLISIN', '110038', NULL, 'Ir.', 'S.Kom., M.MT', '1970-10-01', 'Pasuruan', 'L', '085230230202', 'muchlisin@isku.com', 'islam', 'muchlisin@isku.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2019-06-15 19:50:41', NULL, 1);
INSERT INTO `tbl_master_guru` VALUES (2, 'cEO6lNf3W0', 'ENDRO SUHARDI', '110037', NULL, NULL, 'S.Pd., M.Pd.', '1978-10-10', 'Malang', 'L', '089650691537', 'endros@isku.com', 'Islam', 'endros@isku.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2019-06-15 19:53:31', NULL, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_master_mapel
-- ----------------------------
INSERT INTO `tbl_master_mapel` VALUES (1, 'Pb9pdCcJwGRio1q8VYmz', 1, 2, 'Bahasa Jawa', 70, '2019-06-22 21:31:32', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (2, 'txKX2G3TjSA9dkl8N5PF', 1, 1, 'Bahasa Indonesia', 70, '2019-06-23 09:09:48', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (3, 'sqKJjOnb14CHZBvactVM', 1, 1, 'Bahasa Inggris', 70, '2019-06-23 09:11:11', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (4, 'cbTiAxYUEveRhk05Gdgo', 1, 1, 'Matematika', 75, '2019-06-23 09:11:22', NULL, 1);
INSERT INTO `tbl_master_mapel` VALUES (5, 'RGvfym2McAWz4dgeQnCs', 1, 3, 'Kesenian', 65, '2019-06-23 09:11:41', NULL, 1);

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
  `id_siswa_ortu` int(11) NULL DEFAULT NULL,
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
  INDEX `fk_siswa_ortu`(`id_siswa_ortu`) USING BTREE,
  INDEX `fk_tapel_ke_siswa`(`id_tapel`) USING BTREE,
  CONSTRAINT `fk_siswa_ortu` FOREIGN KEY (`id_siswa_ortu`) REFERENCES `tbl_siswa_ortu` (`id_siswa_ortu`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_tapel_ke_siswa` FOREIGN KEY (`id_tapel`) REFERENCES `tbl_sys_tapel` (`id_tapel`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_master_siswa
-- ----------------------------
INSERT INTO `tbl_master_siswa` VALUES (3, '9MA8Sd5tqY', NULL, 1, 'AUNUL GHARIB', '3818066482', '88907-2151', '1998-02-02', 'Malang', 'L', 'Malang', '085106460306', 'ainulg@gmail.com', 'islam', NULL, NULL, 1, '2019-06-28 19:31:18', NULL, 1);
INSERT INTO `tbl_master_siswa` VALUES (7, 'YLXpE3jSZh', NULL, 1, 'MUHAMMAD BIMA INDRA KUSUMA', '2302259442', '75566-9642', '1970-01-01', 'Malang', 'L', 'Jl. Wijaya Barat 108 RT 03 RW 03, Pagentan, Singosari', '089650691537', '161111070@mhs.stiki.ac.id', 'islam', NULL, NULL, 1, '2019-06-28 20:16:32', NULL, 1);

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
  `sb_un_ing` int(11) NULL DEFAULT NULL,
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
  `id_tapel` int(11) NULL DEFAULT NULL,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_siswa_mutasi_url` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
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
-- Table structure for tbl_sys_semester
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sys_semester`;
CREATE TABLE `tbl_sys_semester`  (
  `id_semester` int(11) NOT NULL AUTO_INCREMENT,
  `id_tapel` int(11) NULL DEFAULT NULL,
  `id_semester_url` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `semester_nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `semester_aktif` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `modified_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_semester`) USING BTREE,
  INDEX `fk_tapel_ke_semester`(`id_tapel`) USING BTREE,
  CONSTRAINT `fk_tapel_ke_semester` FOREIGN KEY (`id_tapel`) REFERENCES `tbl_sys_tapel` (`id_tapel`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_sys_tapel
-- ----------------------------
INSERT INTO `tbl_sys_tapel` VALUES (1, 'USWG1tuGJ7', '2017/2018', '2017', 1, '2019-06-28 18:16:54', NULL, 1);
INSERT INTO `tbl_sys_tapel` VALUES (2, 'VQ0nnIBiwH', '2018/2019', '2018', 0, '2019-06-28 18:17:20', NULL, 1);
INSERT INTO `tbl_sys_tapel` VALUES (3, '3SM8ccRfEN', '2019/2020', '2019', 0, '2019-06-28 18:17:48', NULL, 1);

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
