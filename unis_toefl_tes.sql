-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2018 pada 09.00
-- Versi Server: 5.5.27
-- Versi PHP: 7.0.30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `unis_toefl_tes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_biodata_peserta`
--

CREATE TABLE IF NOT EXISTS `cbt_biodata_peserta` (
  `nim` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `fakultas` varchar(20) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  `nomorhp` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_jawaban`
--

CREATE TABLE IF NOT EXISTS `cbt_jawaban` (
  `jawaban_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jawaban_soal_id` bigint(20) unsigned NOT NULL,
  `jawaban_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `jawaban_benar` tinyint(1) NOT NULL DEFAULT '0',
  `jawaban_aktif` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`jawaban_id`),
  KEY `p_answer_question_id` (`jawaban_soal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data untuk tabel `cbt_jawaban`
--

INSERT INTO `cbt_jawaban` (`jawaban_id`, `jawaban_soal_id`, `jawaban_detail`, `jawaban_benar`, `jawaban_aktif`) VALUES
(1, 1, '<p style="text-align:justify">A. It was the first time he made a mistake</p>\r\n', 0, 1),
(2, 1, '<p style="text-align:justify">B. He forgot to write his paper</p>\r\n', 0, 1),
(3, 1, '<p style="text-align:justify">C. He turned in the paper in the wrong place</p>\r\n', 0, 1),
(4, 1, '<p style="text-align:justify">D. He didn&rsquo;t remember to submit his assignment</p>\r\n', 1, 1),
(5, 2, '<p>(A) a</p>\r\n', 1, 1),
(6, 2, '<p>(B) &nbsp;at</p>\r\n', 1, 1),
(7, 2, '<p>(C) then</p>\r\n', 0, 1),
(8, 2, '<p>(D) none</p>\r\n', 0, 1),
(9, 3, '<p>(A) than sound waves do</p>\r\n', 1, 1),
(10, 3, '<p>(B) than sound waves are</p>\r\n', 0, 1),
(11, 3, '<p>(C) do sound waves</p>\r\n', 0, 1),
(12, 3, '<p>(D) sound waves</p>\r\n', 0, 1),
(13, 4, '<p>(A) the most are important</p>\r\n', 0, 1),
(14, 4, '<p>(B) are the most important</p>\r\n', 1, 1),
(15, 4, '<p>(C) the most important are</p>\r\n', 0, 1),
(16, 4, '<p>(D) that are the most important</p>\r\n', 0, 1),
(17, 5, '<p>(A) control of</p>\r\n', 0, 1),
(18, 5, '<p>(B) distance from</p>\r\n', 0, 1),
(19, 5, '<p>(C) curiosity about</p>\r\n', 0, 1),
(20, 5, '<p>(D) preference for</p>\r\n', 1, 1),
(21, 6, '<p>(A) parallel</p>\r\n', 0, 1),
(22, 6, '<p>(B) simple</p>\r\n', 0, 1),
(23, 6, '<p>(C) projecting</p>\r\n', 1, 1),
(24, 6, '<p>(D) important</p>\r\n', 0, 1),
(26, 7, '<p>(A) a lock and a key</p>\r\n', 0, 1),
(27, 7, '<p>(B) a book and its cover</p>\r\n', 1, 1),
(28, 7, '<p>(C) a cup and a saucer</p>\r\n', 0, 1),
(29, 7, '<p>(D) a hammer and a nail</p>\r\n', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_modul`
--

CREATE TABLE IF NOT EXISTS `cbt_modul` (
  `modul_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `modul_nama` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `modul_aktif` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`modul_id`),
  UNIQUE KEY `ak_module_name` (`modul_nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `cbt_modul`
--

INSERT INTO `cbt_modul` (`modul_id`, `modul_nama`, `modul_aktif`) VALUES
(9, 'English', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_soal`
--

CREATE TABLE IF NOT EXISTS `cbt_soal` (
  `soal_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `soal_topik_id` bigint(20) unsigned NOT NULL,
  `soal_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `soal_tipe` smallint(3) unsigned NOT NULL DEFAULT '1',
  `soal_difficulty` smallint(6) NOT NULL DEFAULT '1',
  `soal_aktif` tinyint(1) NOT NULL DEFAULT '0',
  `soal_audio` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soal_audio_play` int(11) NOT NULL DEFAULT '0',
  `soal_timer` smallint(10) DEFAULT NULL,
  `soal_inline_answers` tinyint(1) NOT NULL DEFAULT '0',
  `soal_auto_next` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`soal_id`),
  KEY `p_question_subject_id` (`soal_topik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `cbt_soal`
--

INSERT INTO `cbt_soal` (`soal_id`, `soal_topik_id`, `soal_detail`, `soal_tipe`, `soal_difficulty`, `soal_aktif`, `soal_audio`, `soal_audio_play`, `soal_timer`, `soal_inline_answers`, `soal_auto_next`) VALUES
(1, 7, '<p>Listening</p>\r\n\r\n<p>Section 1</p>\r\n', 1, 1, 1, 'listening.mp3', 1, NULL, 0, 0),
(2, 7, '<p>Structure and written expression</p>\r\n\r\n<p>Section 1</p>\r\n\r\n<p>question</p>\r\n\r\n<p>Dairy farming is <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;leading agricultural activity in the United States.</p>\r\n', 1, 1, 1, NULL, 0, NULL, 0, 0),
(3, 7, '<p>Structure and written expression</p>\r\n\r\n<p>Section 2</p>\r\n\r\n<p>Although thunder and lightening are produced at the same time, light waves travel faster <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;, so we see the lightening before we hear the thunder.</p>\r\n', 1, 1, 1, NULL, 0, NULL, 0, 0),
(4, 7, '<p>Structure and written expression</p>\r\n\r\n<p>Section 3</p>\r\n\r\n<p>Beef cattle <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;of all livestock for economic growth in certain geographic regions.</p>\r\n', 1, 1, 1, NULL, 0, NULL, 0, 0),
(5, 7, '<div>\r\n<p style="text-align: justify;">Reading</p>\r\n\r\n<p style="text-align: justify;">Section 1</p>\r\n\r\n<p style="text-align: justify;">The conservatism of the early English colonists in North America, their strong attachment to the English way of doing things, would play a major part in the furniture that was made in New England. The very tools that the first New England furniture makers used were, after all, not much different from those used for centuries &ndash; even millennia: basic hammers, saws, chisels, planes, augers, compasses, and measures. These were the tools used more or less by all people who worked with wood: carpenters, barrel makers, and shipwrights. At most the furniture makers might have had planes with special edges or more delicate chisels, but there could not have been much specialization in the early years of the colonies.</p>\r\n\r\n<p style="text-align: justify;">The furniture makers in those early decades of the 1600&rsquo;s were known as &ldquo;joiners,&rdquo;</p>\r\n\r\n<p style="text-align: justify;">for the primary method of constructing furniture, at least among the English of this time, was that of mortise-and-tenon joinery. The mortise is the hole chiseled and cut into one piece of wood, while the tenon is the tongue or protruding element shaped from another piece of wood so that it fits into the mortise; and another small hole is then drilled (with the auger) through the mortised end and the tenon so that a whittled peg can secure the joint &ndash; thus the term &ldquo;joiner. &rdquo; Panels were fitted into slots on the basic frames. This kind of construction was used for making everything from houses to chests.</p>\r\n\r\n<p style="text-align: justify;">Relatively&nbsp; little hardware was used during this period. Some nails &ndash; forged by</p>\r\n\r\n<p style="text-align: justify;">hand &ndash; were used, but no screws or glue. Hinges were often made of leather, but metal hinges were also used. The cruder varieties were made by blacksmiths in the colonies, but the finer metal elements were imported. Locks and escutcheon plates &ndash; the latter to shield the wood from the metal key &ndash; would often be imported.</p>\r\n\r\n<p style="text-align: justify;">Above all, what the early English colonists imported was their knowledge of, familiarity with, and dedication to the traditional types and designs of furniture they knew in England.</p>\r\n\r\n<p style="text-align: justify;">Question</p>\r\n</div>\r\n\r\n<p>The phrase &ldquo;attachment &nbsp;to&rdquo; in line&nbsp;2 is closest in meaning to</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 1, 1, NULL, 0, NULL, 0, 0),
(6, 7, '<p>Reading</p>\r\n\r\n<p>Section 2</p>\r\n\r\n<p>The conservatism of the early English colonists in North America, their strong attachment to the English way of doing things, would play a major part in the furniture that was made in New England. The very tools that the first New England furniture makers used were, after all, not much different from those used for centuries &ndash; even millennia: basic hammers, saws, chisels, planes, augers, compasses, and measures. These were the tools used more or less by all people who worked with wood: carpenters, barrel makers, and shipwrights. At most the furniture makers might have had planes with special edges or more delicate chisels, but there could not have been much specialization in the early years of the colonies.</p>\r\n\r\n<p>The furniture makers in those early decades of the 1600&rsquo;s were known as &ldquo;joiners,&rdquo;</p>\r\n\r\n<p>for the primary method of constructing furniture, at least among the English of this time, was that of mortise-and-tenon joinery. The mortise is the hole chiseled and cut into one piece of wood, while the tenon is the tongue or protruding element shaped from another piece of wood so that it fits into the mortise; and another small hole is then drilled (with the auger) through the mortised end and the tenon so that a whittled peg can secure the joint &ndash; thus the term &ldquo;joiner. &rdquo; Panels were fitted into slots on the basic frames. This kind of construction was used for making everything from houses to chests.</p>\r\n\r\n<p>Relatively&nbsp; little hardware was used during this period. Some nails &ndash; forged by</p>\r\n\r\n<p>hand &ndash; were used, but no screws or glue. Hinges were often made of leather, but metal hinges were also used. The cruder varieties were made by blacksmiths in the colonies, but the finer metal elements were imported. Locks and escutcheon plates &ndash; the latter to shield the wood from the metal key &ndash; would often be imported.</p>\r\n\r\n<p>Above all, what the early English colonists imported was their knowledge of, familiarity with, and dedication to the traditional types and designs of furniture they knew in England.</p>\r\n\r\n<p>Question</p>\r\n\r\n<p>The word &ldquo;protruding&rdquo; in line 13 is closest in meaning to</p>\r\n', 1, 1, 1, NULL, 0, NULL, 0, 0),
(7, 7, '<p>Reading</p>\r\n\r\n<p>Section 2</p>\r\n\r\n<p>The conservatism of the early English colonists in North America, their strong attachment to the English way of doing things, would play a major part in the furniture that was made in New England. The very tools that the first New England furniture makers used were, after all, not much different from those used for centuries &ndash; even millennia: basic hammers, saws, chisels, planes, augers, compasses, and measures. These were the tools used more or less by all people who worked with wood: carpenters, barrel makers, and shipwrights. At most the furniture makers might have had planes with special edges or more delicate chisels, but there could not have been much specialization in the early years of the colonies.</p>\r\n\r\n<p>The furniture makers in those early decades of the 1600&rsquo;s were known as &ldquo;joiners,&rdquo;</p>\r\n\r\n<p>for the primary method of constructing furniture, at least among the English of this time, was that of mortise-and-tenon joinery. The mortise is the hole chiseled and cut into one piece of wood, while the tenon is the tongue or protruding element shaped from another piece of wood so that it fits into the mortise; and another small hole is then drilled (with the auger) through the mortised end and the tenon so that a whittled peg can secure the joint &ndash; thus the term &ldquo;joiner. &rdquo; Panels were fitted into slots on the basic frames. This kind of construction was used for making everything from houses to chests.</p>\r\n\r\n<p>Relatively&nbsp; little hardware was used during this period. Some nails &ndash; forged by</p>\r\n\r\n<p>hand &ndash; were used, but no screws or glue. Hinges were often made of leather, but metal hinges were also used. The cruder varieties were made by blacksmiths in the colonies, but the finer metal elements were imported. Locks and escutcheon plates &ndash; the latter to shield the wood from the metal key &ndash; would often be imported.</p>\r\n\r\n<p>Above all, what the early English colonists imported was their knowledge of, familiarity with, and dedication to the traditional types and designs of furniture they knew in England.</p>\r\n\r\n<p>Question</p>\r\n\r\n<p>The relationship of a mortise and a tenon is most similar to that of</p>\r\n', 1, 1, 1, NULL, 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tes`
--

CREATE TABLE IF NOT EXISTS `cbt_tes` (
  `tes_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tes_nama` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tes_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `tes_begin_time` datetime DEFAULT NULL,
  `tes_end_time` datetime DEFAULT NULL,
  `tes_duration_time` smallint(10) unsigned NOT NULL DEFAULT '0',
  `tes_ip_range` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '*.*.*.*',
  `tes_results_to_users` tinyint(1) NOT NULL DEFAULT '0',
  `tes_score_right` int(3) DEFAULT NULL,
  `tes_score_wrong` int(3) DEFAULT NULL,
  `tes_score_unanswered` int(3) DEFAULT NULL,
  `tes_max_score` int(3) NOT NULL,
  `tes_token` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tes_id`),
  UNIQUE KEY `ak_test_name` (`tes_nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `cbt_tes`
--

INSERT INTO `cbt_tes` (`tes_id`, `tes_nama`, `tes_detail`, `tes_begin_time`, `tes_end_time`, `tes_duration_time`, `tes_ip_range`, `tes_results_to_users`, `tes_score_right`, `tes_score_wrong`, `tes_score_unanswered`, `tes_max_score`, `tes_token`) VALUES
(11, 'TOEFL', 'Prediction TOEFL', '2018-09-28 13:29:00', '2018-09-29 13:29:00', 30, '*.*.*.*', 1, 1, 0, 0, 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tesgrup`
--

CREATE TABLE IF NOT EXISTS `cbt_tesgrup` (
  `tstgrp_tes_id` bigint(20) unsigned NOT NULL,
  `tstgrp_grup_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`tstgrp_tes_id`,`tstgrp_grup_id`),
  KEY `p_tstgrp_test_id` (`tstgrp_tes_id`),
  KEY `p_tstgrp_group_id` (`tstgrp_grup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cbt_tesgrup`
--

INSERT INTO `cbt_tesgrup` (`tstgrp_tes_id`, `tstgrp_grup_id`) VALUES
(11, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tes_soal`
--

CREATE TABLE IF NOT EXISTS `cbt_tes_soal` (
  `tessoal_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tessoal_tesuser_id` bigint(20) unsigned NOT NULL,
  `tessoal_user_ip` varchar(39) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tessoal_soal_id` bigint(20) unsigned NOT NULL,
  `tessoal_jawaban_text` text COLLATE utf8_unicode_ci,
  `tessoal_nilai` int(3) DEFAULT NULL,
  `tessoal_creation_time` datetime DEFAULT NULL,
  `tessoal_display_time` datetime DEFAULT NULL,
  `tessoal_change_time` datetime DEFAULT NULL,
  `tessoal_reaction_time` bigint(20) unsigned NOT NULL DEFAULT '0',
  `tessoal_order` smallint(6) NOT NULL DEFAULT '1',
  `tessoal_num_answers` smallint(5) unsigned NOT NULL DEFAULT '0',
  `tessoal_comment` text COLLATE utf8_unicode_ci,
  `tessoal_audio_play` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tessoal_id`),
  UNIQUE KEY `ak_testuser_question` (`tessoal_tesuser_id`,`tessoal_soal_id`),
  KEY `p_testlog_question_id` (`tessoal_soal_id`),
  KEY `p_testlog_testuser_id` (`tessoal_tesuser_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tes_soal_jawaban`
--

CREATE TABLE IF NOT EXISTS `cbt_tes_soal_jawaban` (
  `soaljawaban_tessoal_id` bigint(20) unsigned NOT NULL,
  `soaljawaban_jawaban_id` bigint(20) unsigned NOT NULL,
  `soaljawaban_selected` smallint(6) NOT NULL DEFAULT '-1',
  `soaljawaban_order` smallint(6) NOT NULL DEFAULT '1',
  `soaljawaban_position` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`soaljawaban_tessoal_id`,`soaljawaban_jawaban_id`),
  KEY `p_logansw_answer_id` (`soaljawaban_jawaban_id`),
  KEY `p_logansw_testlog_id` (`soaljawaban_tessoal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tes_token`
--

CREATE TABLE IF NOT EXISTS `cbt_tes_token` (
  `token_id` int(11) NOT NULL AUTO_INCREMENT,
  `token_isi` varchar(20) NOT NULL,
  `token_user_id` int(11) NOT NULL,
  `token_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token_aktif` int(11) NOT NULL DEFAULT '1' COMMENT 'Umur Token dalam menit, 1 = 1 hari penuh',
  PRIMARY KEY (`token_id`),
  KEY `token_user_id` (`token_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tes_topik_set`
--

CREATE TABLE IF NOT EXISTS `cbt_tes_topik_set` (
  `tset_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tset_tes_id` bigint(20) unsigned NOT NULL,
  `tset_topik_id` bigint(20) unsigned NOT NULL,
  `tset_tipe` smallint(6) NOT NULL DEFAULT '1',
  `tset_difficulty` smallint(6) NOT NULL DEFAULT '1',
  `tset_jumlah` smallint(6) NOT NULL DEFAULT '1',
  `tset_jawaban` smallint(6) NOT NULL DEFAULT '0',
  `tset_acak_jawaban` int(11) NOT NULL DEFAULT '1',
  `tset_acak_soal` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`tset_id`),
  KEY `p_tsubset_test_id` (`tset_tes_id`),
  KEY `tsubset_subject_id` (`tset_topik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `cbt_tes_topik_set`
--

INSERT INTO `cbt_tes_topik_set` (`tset_id`, `tset_tes_id`, `tset_topik_id`, `tset_tipe`, `tset_difficulty`, `tset_jumlah`, `tset_jawaban`, `tset_acak_jawaban`, `tset_acak_soal`) VALUES
(4, 11, 7, 1, 1, 7, 3, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_tes_user`
--

CREATE TABLE IF NOT EXISTS `cbt_tes_user` (
  `tesuser_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tesuser_tes_id` bigint(20) unsigned NOT NULL,
  `tesuser_user_id` bigint(20) unsigned NOT NULL,
  `tesuser_status` smallint(5) unsigned NOT NULL DEFAULT '0',
  `tesuser_creation_time` datetime NOT NULL,
  `tesuser_comment` text COLLATE utf8_unicode_ci,
  `tesuser_token` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tesuser_id`),
  UNIQUE KEY `ak_testuser` (`tesuser_tes_id`,`tesuser_user_id`,`tesuser_status`),
  KEY `p_testuser_user_id` (`tesuser_user_id`),
  KEY `p_testuser_test_id` (`tesuser_tes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_topik`
--

CREATE TABLE IF NOT EXISTS `cbt_topik` (
  `topik_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `topik_modul_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `topik_nama` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `topik_detail` text COLLATE utf8_unicode_ci,
  `topik_aktif` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`topik_id`),
  UNIQUE KEY `ak_subject_name` (`topik_modul_id`,`topik_nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `cbt_topik`
--

INSERT INTO `cbt_topik` (`topik_id`, `topik_modul_id`, `topik_nama`, `topik_detail`, `topik_aktif`) VALUES
(7, 9, 'TOEFL', 'Test Of English as a Foreign Language', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_user`
--

CREATE TABLE IF NOT EXISTS `cbt_user` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_grup_id` bigint(20) unsigned NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_firstname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_birthdate` date DEFAULT NULL,
  `user_birthplace` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_level` smallint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `ak_user_name` (`user_name`),
  KEY `user_groups_id` (`user_grup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `cbt_user`
--

INSERT INTO `cbt_user` (`user_id`, `user_grup_id`, `user_name`, `user_password`, `user_email`, `user_regdate`, `user_ip`, `user_firstname`, `user_birthdate`, `user_birthplace`, `user_level`) VALUES
(1, 5, 'alex', 'alex17', 'dekyalexander200@gma', '2018-07-26 12:20:53', NULL, 'Deky Alexander', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_user_grup`
--

CREATE TABLE IF NOT EXISTS `cbt_user_grup` (
  `grup_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `grup_nama` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`grup_id`),
  UNIQUE KEY `group_name` (`grup_nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `cbt_user_grup`
--

INSERT INTO `cbt_user_grup` (`grup_id`, `grup_nama`) VALUES
(5, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `opsi1` varchar(75) NOT NULL,
  `opsi2` varchar(75) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `level` varchar(50) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `level` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `opsi1`, `opsi2`, `keterangan`, `level`, `ts`) VALUES
(5, 'alex', '0b6e662c9819676ce3fcb614e1294e7002d6d7df', 'Deky Alexander', '', '', 'admin', 'admin', '2018-07-26 06:49:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akses`
--

CREATE TABLE IF NOT EXISTS `user_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(20) NOT NULL,
  `kode_menu` varchar(20) NOT NULL,
  `add` int(2) NOT NULL DEFAULT '1' COMMENT '0=false, 1=true',
  `edit` int(2) NOT NULL DEFAULT '1' COMMENT '0=false, 1=true',
  PRIMARY KEY (`id`),
  KEY `akses_kode_menu` (`kode_menu`),
  KEY `akses_level` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=308 ;

--
-- Dumping data untuk tabel `user_akses`
--

INSERT INTO `user_akses` (`id`, `level`, `kode_menu`, `add`, `edit`) VALUES
(254, 'operator-soal', 'modul-daftar', 1, 1),
(256, 'operator-soal', 'modul-import', 1, 1),
(257, 'operator-soal', 'modul-soal', 1, 1),
(258, 'operator-soal', 'modul-topik', 1, 1),
(260, 'operator-tes', 'tes-token', 1, 1),
(293, 'admin', 'peserta-biodata', 1, 1),
(295, 'admin', 'peserta-daftar', 1, 1),
(296, 'admin', 'modul-daftar', 1, 1),
(297, 'admin', 'peserta-group', 1, 1),
(298, 'admin', 'tes-daftar', 1, 1),
(299, 'admin', 'tes-hasil', 1, 1),
(300, 'admin', 'modul-import', 1, 1),
(301, 'admin', 'user_atur', 1, 1),
(302, 'admin', 'user_level', 1, 1),
(303, 'admin', 'user_menu', 1, 1),
(304, 'admin', 'modul-soal', 1, 1),
(305, 'admin', 'tes-tambah', 1, 1),
(306, 'admin', 'tes-token', 1, 1),
(307, 'admin', 'modul-topik', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE IF NOT EXISTS `user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(20) NOT NULL,
  `keterangan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `level` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id`, `level`, `keterangan`) VALUES
(1, 'admin', 'Administrator'),
(7, 'operator-soal', 'Operator Soal'),
(8, 'operator-tes', 'Operator Tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `log` varchar(20) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` int(11) NOT NULL DEFAULT '1' COMMENT '0=parent, 1=child',
  `parent` varchar(20) DEFAULT NULL,
  `kode_menu` varchar(20) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `url` varchar(25) NOT NULL DEFAULT '#',
  `icon` varchar(20) NOT NULL DEFAULT 'fa fa-circle-o',
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_menu` (`kode_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `tipe`, `parent`, `kode_menu`, `nama_menu`, `url`, `icon`, `urutan`) VALUES
(1, 0, '', 'user', 'Pengaturan', '#', 'fa fa-user', 20),
(3, 1, 'user', 'user_atur', 'Pengaturan Admin', 'manager/useratur', 'fa fa-circle-o', 5),
(4, 1, 'user', 'user_level', 'Pengaturan Level', 'manager/userlevel', 'fa fa-circle-o', 6),
(5, 1, 'user', 'user_menu', 'Pengaturan Menu', 'manager/usermenu', 'fa fa-circle-o', 7),
(6, 0, '', 'modul', 'Data Modul', '#', 'fa fa-book', 2),
(7, 1, 'modul', 'modul-daftar', 'Daftar Soal', 'manager/modul_daftar', 'fa fa-circle-o', 5),
(8, 1, 'modul', 'modul-topik', 'Topik', 'manager/modul_topik', 'fa fa-circle-o', 2),
(10, 0, '', 'peserta', 'Data Peserta', '#', 'fa fa-users', 1),
(11, 1, 'peserta', 'peserta-daftar', 'Daftar Peserta', 'manager/peserta_daftar', 'fa fa-circle-o', 2),
(12, 1, 'peserta', 'peserta-group', 'Daftar Status', 'manager/peserta_group', 'fa fa-circle-o', 1),
(14, 0, '', 'tes', 'Data Tes', '#', 'fa fa-tasks', 7),
(15, 1, 'tes', 'tes-tambah', 'Tambah Tes', 'manager/tes_tambah', 'fa fa-circle-o', 1),
(16, 1, 'tes', 'tes-daftar', 'Daftar Tes', 'manager/tes_daftar', 'fa fa-circle-o', 2),
(17, 1, 'tes', 'tes-hasil', 'Hasil Tes', 'manager/tes_hasil', 'fa fa-circle-o', 6),
(18, 1, 'modul', 'modul-soal', 'Soal', 'manager/modul_soal', 'fa fa-circle-o', 3),
(19, 1, 'tes', 'tes-token', 'Token', 'manager/tes_token', 'fa fa-circle-o', 7),
(20, 1, 'modul', 'modul-modul', 'Modul', 'manager/modul', 'fa fa-circle-o', 1),
(24, 1, 'modul', 'modul-import', 'Import Soal', 'manager/modul_import', 'fa fa-circle-o', 4),
(30, 0, '', 'tool', 'Tool', '#', 'fa fa-wrench', 5),
(32, 1, 'peserta', 'peserta-biodata', 'Daftar Biodata', 'daftar_biodata', 'fa fa-circle-o', 4);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cbt_jawaban`
--
ALTER TABLE `cbt_jawaban`
  ADD CONSTRAINT `cbt_jawaban_ibfk_1` FOREIGN KEY (`jawaban_soal_id`) REFERENCES `cbt_soal` (`soal_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_soal`
--
ALTER TABLE `cbt_soal`
  ADD CONSTRAINT `cbt_soal_ibfk_1` FOREIGN KEY (`soal_topik_id`) REFERENCES `cbt_topik` (`topik_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_tesgrup`
--
ALTER TABLE `cbt_tesgrup`
  ADD CONSTRAINT `cbt_tesgrup_ibfk_1` FOREIGN KEY (`tstgrp_tes_id`) REFERENCES `cbt_tes` (`tes_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cbt_tesgrup_ibfk_2` FOREIGN KEY (`tstgrp_grup_id`) REFERENCES `cbt_user_grup` (`grup_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_tes_soal`
--
ALTER TABLE `cbt_tes_soal`
  ADD CONSTRAINT `cbt_tes_soal_ibfk_1` FOREIGN KEY (`tessoal_tesuser_id`) REFERENCES `cbt_tes_user` (`tesuser_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cbt_tes_soal_ibfk_2` FOREIGN KEY (`tessoal_soal_id`) REFERENCES `cbt_soal` (`soal_id`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_tes_soal_jawaban`
--
ALTER TABLE `cbt_tes_soal_jawaban`
  ADD CONSTRAINT `cbt_tes_soal_jawaban_ibfk_1` FOREIGN KEY (`soaljawaban_tessoal_id`) REFERENCES `cbt_tes_soal` (`tessoal_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cbt_tes_soal_jawaban_ibfk_2` FOREIGN KEY (`soaljawaban_jawaban_id`) REFERENCES `cbt_jawaban` (`jawaban_id`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_tes_token`
--
ALTER TABLE `cbt_tes_token`
  ADD CONSTRAINT `cbt_tes_token_ibfk_1` FOREIGN KEY (`token_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cbt_tes_topik_set`
--
ALTER TABLE `cbt_tes_topik_set`
  ADD CONSTRAINT `cbt_tes_topik_set_ibfk_1` FOREIGN KEY (`tset_tes_id`) REFERENCES `cbt_tes` (`tes_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cbt_tes_topik_set_ibfk_2` FOREIGN KEY (`tset_topik_id`) REFERENCES `cbt_topik` (`topik_id`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_tes_user`
--
ALTER TABLE `cbt_tes_user`
  ADD CONSTRAINT `cbt_tes_user_ibfk_1` FOREIGN KEY (`tesuser_tes_id`) REFERENCES `cbt_tes` (`tes_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cbt_tes_user_ibfk_2` FOREIGN KEY (`tesuser_user_id`) REFERENCES `cbt_user` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_topik`
--
ALTER TABLE `cbt_topik`
  ADD CONSTRAINT `cbt_topik_ibfk_1` FOREIGN KEY (`topik_modul_id`) REFERENCES `cbt_modul` (`modul_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cbt_user`
--
ALTER TABLE `cbt_user`
  ADD CONSTRAINT `cbt_user_ibfk_1` FOREIGN KEY (`user_grup_id`) REFERENCES `cbt_user_grup` (`grup_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `user_level` (`level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_akses`
--
ALTER TABLE `user_akses`
  ADD CONSTRAINT `user_akses_ibfk_2` FOREIGN KEY (`kode_menu`) REFERENCES `user_menu` (`kode_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_akses_ibfk_3` FOREIGN KEY (`level`) REFERENCES `user_level` (`level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
