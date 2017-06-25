-- phpMyAdmin SQL Dump
-- version 4.2.3
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost:3306
-- Létrehozás ideje: 2014. Nov 07. 11:44
-- Szerver verzió: 5.5.38-0+wheezy1
-- PHP verzió: 5.4.4-14+deb7u14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `haziorvos`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
`id` int(11) NOT NULL,
  `item` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `id_orvos` int(11) DEFAULT NULL,
  `lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=402 ;

--
-- A tábla adatainak kiíratása `config`
--

INSERT INTO `config` (`id`, `item`, `value`, `type`, `label`, `category`, `id_orvos`, `lastmod`) VALUES
(1, 'oldalnev', 'OK', 'text', 'Oldal név', 'Oldal', 1, '2014-09-08 17:33:08'),
(2, 'domain', 'szeiffer.hazi-orvosok.hu', 'text', 'Domain név', 'Oldal', 1, '2014-04-11 14:47:18'),
(3, 'image_logo', '', 'upload', 'Logó', 'Oldal', 1, '0000-00-00 00:00:00'),
(4, 'favicon_logo', '', 'file', 'Ikon (favicon)', 'Oldal', 1, '0000-00-00 00:00:00'),
(5, 'telefonszam', '253-03-40', 'text', 'Telefonszám', 'Oldal', 1, '0000-00-00 00:00:00'),
(6, 'fax', '', 'text', 'Fax', 'Oldal', 1, '0000-00-00 00:00:00'),
(7, 'irszam', '1171', 'text', 'Irányítószám', 'Cím adatok', 1, '0000-00-00 00:00:00'),
(8, 'varos', 'Budapest', 'text', 'Település', 'Cím adatok', 1, '0000-00-00 00:00:00'),
(9, 'cim', 'Péceli út 190.', 'text', 'Utca, házszám', 'Cím adatok', 1, '0000-00-00 00:00:00'),
(10, 'posta_irszam', '1171', 'text', 'Irányítószám (postázási cím)', 'Cím adatok', 1, '0000-00-00 00:00:00'),
(11, 'posta_varos', 'Budapest', 'text', 'Település (postázási cím)', 'Cím adatok', 1, '0000-00-00 00:00:00'),
(12, 'posta_cim', 'Péceli út 190. I. em', 'text', 'Utca, házszám (postázási cím)', 'Cím adatok', 1, '0000-00-00 00:00:00'),
(13, 'email_admin', 'info@ddstandard.hu', 'text', 'Adminisztrátor email címe (értesítésekhez)', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(14, 'email_dev', 'dg@hazi-orvosok.hu', 'text', 'Fejlesztő email címe (teszteléshez)', 'Email beállítások', 1, '2014-04-11 14:48:37'),
(15, 'email_oldal', 'szeiffert@hazi-orvosok.hu', 'text', 'Weboldal email címe (kimenő levelek feladója)', 'Email beállítások', 1, '2014-04-11 14:49:15'),
(16, 'email_oldal_nev', '', 'text', 'Weboldal email megjelenítendő név', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(17, 'smtp_szerver', '', 'text', 'SMTP szerver', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(18, 'smtp_port', '', 'text', 'SMTP port', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(19, 'smtp_auth', '', 'checkbox', 'SMTP autentikáció', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(20, 'smtp_felhasznalo', '', 'text', 'SMTP felhasználói név', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(21, 'smtp_jelszo', '', 'text', 'SMTP jelszó', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(22, 'animacio', '1', 'checkbox', 'Animációk bekapcsolása az adminisztrációs felületen', 'Oldal beállítások', 1, '0000-00-00 00:00:00'),
(23, 'szerviz', '', 'checkbox', 'Szeviz üzemmód (a honlap elérhetetlenné válik a felhasználók számára!)', 'Oldal beállítások', 1, '0000-00-00 00:00:00'),
(149, 'oldalnev', NULL, 'text', NULL, 'Oldal', 2, '0000-00-00 00:00:00'),
(150, 'domain', NULL, 'text', NULL, 'Oldal', 2, '0000-00-00 00:00:00'),
(151, 'image_logo', NULL, 'upload', NULL, 'Oldal', 2, '0000-00-00 00:00:00'),
(152, 'favicon_logo', NULL, 'file', NULL, 'Oldal', 2, '0000-00-00 00:00:00'),
(153, 'telefonszam', '253-03-41 ', 'text', NULL, 'Oldal', 2, '0000-00-00 00:00:00'),
(154, 'fax', NULL, 'text', NULL, 'Oldal', 2, '0000-00-00 00:00:00'),
(155, 'irszam', '1171', 'text', NULL, 'Cím adatok', 2, '0000-00-00 00:00:00'),
(156, 'varos', 'Bp.,', 'text', NULL, 'Cím adatok', 2, '0000-00-00 00:00:00'),
(157, 'cim', 'Péceli út 190.', 'text', NULL, 'Cím adatok', 2, '0000-00-00 00:00:00'),
(158, 'posta_irszam', NULL, 'text', NULL, 'Cím adatok', 2, '0000-00-00 00:00:00'),
(159, 'posta_varos', NULL, 'text', NULL, 'Cím adatok', 2, '0000-00-00 00:00:00'),
(160, 'posta_cim', NULL, 'text', NULL, 'Cím adatok', 2, '0000-00-00 00:00:00'),
(161, 'email_admin', NULL, 'text', NULL, 'Email beállítások', 2, '0000-00-00 00:00:00'),
(162, 'email_dev', NULL, 'text', NULL, 'Email beállítások', 2, '0000-00-00 00:00:00'),
(163, 'email_oldal', NULL, 'text', NULL, 'Email beállítások', 2, '0000-00-00 00:00:00'),
(164, 'email_oldal_nev', NULL, 'text', NULL, 'Email beállítások', 2, '0000-00-00 00:00:00'),
(165, 'smtp_szerver', NULL, 'text', NULL, 'Email beállítások', 2, '0000-00-00 00:00:00'),
(166, 'smtp_port', NULL, 'text', NULL, 'Email beállítások', 2, '0000-00-00 00:00:00'),
(167, 'smtp_auth', NULL, 'checkbox', NULL, 'Email beállítások', 2, '0000-00-00 00:00:00'),
(168, 'smtp_felhasznalo', NULL, 'text', NULL, 'Email beállítások', 2, '0000-00-00 00:00:00'),
(169, 'smtp_jelszo', NULL, 'text', NULL, 'Email beállítások', 2, '0000-00-00 00:00:00'),
(170, 'animacio', NULL, 'checkbox', NULL, 'Oldal beállítások', 2, '0000-00-00 00:00:00'),
(171, 'szerviz', NULL, 'checkbox', NULL, 'Oldal beállítások', 2, '0000-00-00 00:00:00'),
(172, 'oldalnev', NULL, 'text', NULL, 'Oldal', 3, '0000-00-00 00:00:00'),
(173, 'domain', NULL, 'text', NULL, 'Oldal', 3, '0000-00-00 00:00:00'),
(174, 'image_logo', NULL, 'upload', NULL, 'Oldal', 3, '0000-00-00 00:00:00'),
(175, 'favicon_logo', NULL, 'file', NULL, 'Oldal', 3, '0000-00-00 00:00:00'),
(176, 'telefonszam', '257-59-00 ', 'text', NULL, 'Oldal', 3, '0000-00-00 00:00:00'),
(177, 'fax', NULL, 'text', NULL, 'Oldal', 3, '0000-00-00 00:00:00'),
(178, 'irszam', '1171', 'text', NULL, 'Cím adatok', 3, '0000-00-00 00:00:00'),
(179, 'varos', 'Bp.,', 'text', NULL, 'Cím adatok', 3, '0000-00-00 00:00:00'),
(180, 'cim', 'Péceli út 190.', 'text', NULL, 'Cím adatok', 3, '0000-00-00 00:00:00'),
(181, 'posta_irszam', NULL, 'text', NULL, 'Cím adatok', 3, '0000-00-00 00:00:00'),
(182, 'posta_varos', NULL, 'text', NULL, 'Cím adatok', 3, '0000-00-00 00:00:00'),
(183, 'posta_cim', NULL, 'text', NULL, 'Cím adatok', 3, '0000-00-00 00:00:00'),
(184, 'email_admin', NULL, 'text', NULL, 'Email beállítások', 3, '0000-00-00 00:00:00'),
(185, 'email_dev', NULL, 'text', NULL, 'Email beállítások', 3, '0000-00-00 00:00:00'),
(186, 'email_oldal', NULL, 'text', NULL, 'Email beállítások', 3, '0000-00-00 00:00:00'),
(187, 'email_oldal_nev', NULL, 'text', NULL, 'Email beállítások', 3, '0000-00-00 00:00:00'),
(188, 'smtp_szerver', NULL, 'text', NULL, 'Email beállítások', 3, '0000-00-00 00:00:00'),
(189, 'smtp_port', NULL, 'text', NULL, 'Email beállítások', 3, '0000-00-00 00:00:00'),
(190, 'smtp_auth', NULL, 'checkbox', NULL, 'Email beállítások', 3, '0000-00-00 00:00:00'),
(191, 'smtp_felhasznalo', NULL, 'text', NULL, 'Email beállítások', 3, '0000-00-00 00:00:00'),
(192, 'smtp_jelszo', NULL, 'text', NULL, 'Email beállítások', 3, '0000-00-00 00:00:00'),
(193, 'animacio', NULL, 'checkbox', NULL, 'Oldal beállítások', 3, '0000-00-00 00:00:00'),
(194, 'szerviz', NULL, 'checkbox', NULL, 'Oldal beállítások', 3, '0000-00-00 00:00:00'),
(195, 'oldalnev', NULL, 'text', NULL, 'Oldal', 4, '0000-00-00 00:00:00'),
(196, 'domain', NULL, 'text', NULL, 'Oldal', 4, '0000-00-00 00:00:00'),
(197, 'image_logo', NULL, 'upload', NULL, 'Oldal', 4, '0000-00-00 00:00:00'),
(198, 'favicon_logo', NULL, 'file', NULL, 'Oldal', 4, '0000-00-00 00:00:00'),
(199, 'telefonszam', '258-51-84 ', 'text', NULL, 'Oldal', 4, '0000-00-00 00:00:00'),
(200, 'fax', NULL, 'text', NULL, 'Oldal', 4, '0000-00-00 00:00:00'),
(201, 'irszam', '1171', 'text', NULL, 'Cím adatok', 4, '0000-00-00 00:00:00'),
(202, 'varos', 'Bp.,', 'text', NULL, 'Cím adatok', 4, '0000-00-00 00:00:00'),
(203, 'cim', 'Péceli út 190.', 'text', NULL, 'Cím adatok', 4, '0000-00-00 00:00:00'),
(204, 'posta_irszam', NULL, 'text', NULL, 'Cím adatok', 4, '0000-00-00 00:00:00'),
(205, 'posta_varos', NULL, 'text', NULL, 'Cím adatok', 4, '0000-00-00 00:00:00'),
(206, 'posta_cim', NULL, 'text', NULL, 'Cím adatok', 4, '0000-00-00 00:00:00'),
(207, 'email_admin', NULL, 'text', NULL, 'Email beállítások', 4, '0000-00-00 00:00:00'),
(208, 'email_dev', NULL, 'text', NULL, 'Email beállítások', 4, '0000-00-00 00:00:00'),
(209, 'email_oldal', NULL, 'text', NULL, 'Email beállítások', 4, '0000-00-00 00:00:00'),
(210, 'email_oldal_nev', NULL, 'text', NULL, 'Email beállítások', 4, '0000-00-00 00:00:00'),
(211, 'smtp_szerver', NULL, 'text', NULL, 'Email beállítások', 4, '0000-00-00 00:00:00'),
(212, 'smtp_port', NULL, 'text', NULL, 'Email beállítások', 4, '0000-00-00 00:00:00'),
(213, 'smtp_auth', NULL, 'checkbox', NULL, 'Email beállítások', 4, '0000-00-00 00:00:00'),
(214, 'smtp_felhasznalo', NULL, 'text', NULL, 'Email beállítások', 4, '0000-00-00 00:00:00'),
(215, 'smtp_jelszo', NULL, 'text', NULL, 'Email beállítások', 4, '0000-00-00 00:00:00'),
(216, 'animacio', NULL, 'checkbox', NULL, 'Oldal beállítások', 4, '0000-00-00 00:00:00'),
(217, 'szerviz', NULL, 'checkbox', NULL, 'Oldal beállítások', 4, '0000-00-00 00:00:00'),
(218, 'oldalnev', NULL, 'text', NULL, 'Oldal', 6, '0000-00-00 00:00:00'),
(219, 'domain', NULL, 'text', NULL, 'Oldal', 6, '0000-00-00 00:00:00'),
(220, 'image_logo', NULL, 'upload', NULL, 'Oldal', 6, '0000-00-00 00:00:00'),
(221, 'favicon_logo', NULL, 'file', NULL, 'Oldal', 6, '0000-00-00 00:00:00'),
(222, 'telefonszam', '258-19-72 ', 'text', NULL, 'Oldal', 6, '0000-00-00 00:00:00'),
(223, 'fax', NULL, 'text', NULL, 'Oldal', 6, '0000-00-00 00:00:00'),
(224, 'irszam', '1173', 'text', NULL, 'Cím adatok', 6, '0000-00-00 00:00:00'),
(225, 'varos', 'Bp.,', 'text', NULL, 'Cím adatok', 6, '0000-00-00 00:00:00'),
(226, 'cim', '525. tér', 'text', NULL, 'Cím adatok', 6, '0000-00-00 00:00:00'),
(227, 'posta_irszam', NULL, 'text', NULL, 'Cím adatok', 6, '0000-00-00 00:00:00'),
(228, 'posta_varos', NULL, 'text', NULL, 'Cím adatok', 6, '0000-00-00 00:00:00'),
(229, 'posta_cim', NULL, 'text', NULL, 'Cím adatok', 6, '0000-00-00 00:00:00'),
(230, 'email_admin', NULL, 'text', NULL, 'Email beállítások', 6, '0000-00-00 00:00:00'),
(231, 'email_dev', NULL, 'text', NULL, 'Email beállítások', 6, '0000-00-00 00:00:00'),
(232, 'email_oldal', NULL, 'text', NULL, 'Email beállítások', 6, '0000-00-00 00:00:00'),
(233, 'email_oldal_nev', NULL, 'text', NULL, 'Email beállítások', 6, '0000-00-00 00:00:00'),
(234, 'smtp_szerver', NULL, 'text', NULL, 'Email beállítások', 6, '0000-00-00 00:00:00'),
(235, 'smtp_port', NULL, 'text', NULL, 'Email beállítások', 6, '0000-00-00 00:00:00'),
(236, 'smtp_auth', NULL, 'checkbox', NULL, 'Email beállítások', 6, '0000-00-00 00:00:00'),
(237, 'smtp_felhasznalo', NULL, 'text', NULL, 'Email beállítások', 6, '0000-00-00 00:00:00'),
(238, 'smtp_jelszo', NULL, 'text', NULL, 'Email beállítások', 6, '0000-00-00 00:00:00'),
(239, 'animacio', NULL, 'checkbox', NULL, 'Oldal beállítások', 6, '0000-00-00 00:00:00'),
(240, 'szerviz', NULL, 'checkbox', NULL, 'Oldal beállítások', 6, '0000-00-00 00:00:00'),
(241, 'oldalnev', NULL, 'text', NULL, 'Oldal', 7, '0000-00-00 00:00:00'),
(242, 'domain', NULL, 'text', NULL, 'Oldal', 7, '0000-00-00 00:00:00'),
(243, 'image_logo', NULL, 'upload', NULL, 'Oldal', 7, '0000-00-00 00:00:00'),
(244, 'favicon_logo', NULL, 'file', NULL, 'Oldal', 7, '0000-00-00 00:00:00'),
(245, 'telefonszam', '259-19-72 ', 'text', NULL, 'Oldal', 7, '0000-00-00 00:00:00'),
(246, 'fax', NULL, 'text', NULL, 'Oldal', 7, '0000-00-00 00:00:00'),
(247, 'irszam', '1173', 'text', NULL, 'Cím adatok', 7, '0000-00-00 00:00:00'),
(248, 'varos', 'Bp.,', 'text', NULL, 'Cím adatok', 7, '0000-00-00 00:00:00'),
(249, 'cim', '525. tér', 'text', NULL, 'Cím adatok', 7, '0000-00-00 00:00:00'),
(250, 'posta_irszam', NULL, 'text', NULL, 'Cím adatok', 7, '0000-00-00 00:00:00'),
(251, 'posta_varos', NULL, 'text', NULL, 'Cím adatok', 7, '0000-00-00 00:00:00'),
(252, 'posta_cim', NULL, 'text', NULL, 'Cím adatok', 7, '0000-00-00 00:00:00'),
(253, 'email_admin', NULL, 'text', NULL, 'Email beállítások', 7, '0000-00-00 00:00:00'),
(254, 'email_dev', NULL, 'text', NULL, 'Email beállítások', 7, '0000-00-00 00:00:00'),
(255, 'email_oldal', NULL, 'text', NULL, 'Email beállítások', 7, '0000-00-00 00:00:00'),
(256, 'email_oldal_nev', NULL, 'text', NULL, 'Email beállítások', 7, '0000-00-00 00:00:00'),
(257, 'smtp_szerver', NULL, 'text', NULL, 'Email beállítások', 7, '0000-00-00 00:00:00'),
(258, 'smtp_port', NULL, 'text', NULL, 'Email beállítások', 7, '0000-00-00 00:00:00'),
(259, 'smtp_auth', NULL, 'checkbox', NULL, 'Email beállítások', 7, '0000-00-00 00:00:00'),
(260, 'smtp_felhasznalo', NULL, 'text', NULL, 'Email beállítások', 7, '0000-00-00 00:00:00'),
(261, 'smtp_jelszo', NULL, 'text', NULL, 'Email beállítások', 7, '0000-00-00 00:00:00'),
(262, 'animacio', NULL, 'checkbox', NULL, 'Oldal beállítások', 7, '0000-00-00 00:00:00'),
(263, 'szerviz', NULL, 'checkbox', NULL, 'Oldal beállítások', 7, '0000-00-00 00:00:00'),
(264, 'oldalnev', NULL, 'text', NULL, 'Oldal', 8, '0000-00-00 00:00:00'),
(265, 'domain', NULL, 'text', NULL, 'Oldal', 8, '0000-00-00 00:00:00'),
(266, 'image_logo', NULL, 'upload', NULL, 'Oldal', 8, '0000-00-00 00:00:00'),
(267, 'favicon_logo', NULL, 'file', NULL, 'Oldal', 8, '0000-00-00 00:00:00'),
(268, 'telefonszam', '258-19-72 ', 'text', NULL, 'Oldal', 8, '0000-00-00 00:00:00'),
(269, 'fax', NULL, 'text', NULL, 'Oldal', 8, '0000-00-00 00:00:00'),
(270, 'irszam', '1173', 'text', NULL, 'Cím adatok', 8, '0000-00-00 00:00:00'),
(271, 'varos', 'Bp.,', 'text', NULL, 'Cím adatok', 8, '0000-00-00 00:00:00'),
(272, 'cim', '525. tér', 'text', NULL, 'Cím adatok', 8, '0000-00-00 00:00:00'),
(273, 'posta_irszam', NULL, 'text', NULL, 'Cím adatok', 8, '0000-00-00 00:00:00'),
(274, 'posta_varos', NULL, 'text', NULL, 'Cím adatok', 8, '0000-00-00 00:00:00'),
(275, 'posta_cim', NULL, 'text', NULL, 'Cím adatok', 8, '0000-00-00 00:00:00'),
(276, 'email_admin', NULL, 'text', NULL, 'Email beállítások', 8, '0000-00-00 00:00:00'),
(277, 'email_dev', NULL, 'text', NULL, 'Email beállítások', 8, '0000-00-00 00:00:00'),
(278, 'email_oldal', NULL, 'text', NULL, 'Email beállítások', 8, '0000-00-00 00:00:00'),
(279, 'email_oldal_nev', NULL, 'text', NULL, 'Email beállítások', 8, '0000-00-00 00:00:00'),
(280, 'smtp_szerver', NULL, 'text', NULL, 'Email beállítások', 8, '0000-00-00 00:00:00'),
(281, 'smtp_port', NULL, 'text', NULL, 'Email beállítások', 8, '0000-00-00 00:00:00'),
(282, 'smtp_auth', NULL, 'checkbox', NULL, 'Email beállítások', 8, '0000-00-00 00:00:00'),
(283, 'smtp_felhasznalo', NULL, 'text', NULL, 'Email beállítások', 8, '0000-00-00 00:00:00'),
(284, 'smtp_jelszo', NULL, 'text', NULL, 'Email beállítások', 8, '0000-00-00 00:00:00'),
(285, 'animacio', NULL, 'checkbox', NULL, 'Oldal beállítások', 8, '0000-00-00 00:00:00'),
(286, 'szerviz', NULL, 'checkbox', NULL, 'Oldal beállítások', 8, '0000-00-00 00:00:00'),
(287, 'oldalnev', NULL, 'text', NULL, 'Oldal', 9, '0000-00-00 00:00:00'),
(288, 'domain', NULL, 'text', NULL, 'Oldal', 9, '0000-00-00 00:00:00'),
(289, 'image_logo', NULL, 'upload', NULL, 'Oldal', 9, '0000-00-00 00:00:00'),
(290, 'favicon_logo', NULL, 'file', NULL, 'Oldal', 9, '0000-00-00 00:00:00'),
(291, 'telefonszam', '259-19-72 ', 'text', NULL, 'Oldal', 9, '0000-00-00 00:00:00'),
(292, 'fax', NULL, 'text', NULL, 'Oldal', 9, '0000-00-00 00:00:00'),
(293, 'irszam', '1173', 'text', NULL, 'Cím adatok', 9, '0000-00-00 00:00:00'),
(294, 'varos', 'Bp.,', 'text', NULL, 'Cím adatok', 9, '0000-00-00 00:00:00'),
(295, 'cim', '525. tér', 'text', NULL, 'Cím adatok', 9, '0000-00-00 00:00:00'),
(296, 'posta_irszam', NULL, 'text', NULL, 'Cím adatok', 9, '0000-00-00 00:00:00'),
(297, 'posta_varos', NULL, 'text', NULL, 'Cím adatok', 9, '0000-00-00 00:00:00'),
(298, 'posta_cim', NULL, 'text', NULL, 'Cím adatok', 9, '0000-00-00 00:00:00'),
(299, 'email_admin', NULL, 'text', NULL, 'Email beállítások', 9, '0000-00-00 00:00:00'),
(300, 'email_dev', NULL, 'text', NULL, 'Email beállítások', 9, '0000-00-00 00:00:00'),
(301, 'email_oldal', NULL, 'text', NULL, 'Email beállítások', 9, '0000-00-00 00:00:00'),
(302, 'email_oldal_nev', NULL, 'text', NULL, 'Email beállítások', 9, '0000-00-00 00:00:00'),
(303, 'smtp_szerver', NULL, 'text', NULL, 'Email beállítások', 9, '0000-00-00 00:00:00'),
(304, 'smtp_port', NULL, 'text', NULL, 'Email beállítások', 9, '0000-00-00 00:00:00'),
(305, 'smtp_auth', NULL, 'checkbox', NULL, 'Email beállítások', 9, '0000-00-00 00:00:00'),
(306, 'smtp_felhasznalo', NULL, 'text', NULL, 'Email beállítások', 9, '0000-00-00 00:00:00'),
(307, 'smtp_jelszo', NULL, 'text', NULL, 'Email beállítások', 9, '0000-00-00 00:00:00'),
(308, 'animacio', NULL, 'checkbox', NULL, 'Oldal beállítások', 9, '0000-00-00 00:00:00'),
(309, 'szerviz', NULL, 'checkbox', NULL, 'Oldal beállítások', 9, '0000-00-00 00:00:00'),
(310, 'oldalnev', NULL, 'text', NULL, 'Oldal', 10, '0000-00-00 00:00:00'),
(311, 'domain', NULL, 'text', NULL, 'Oldal', 10, '0000-00-00 00:00:00'),
(312, 'image_logo', NULL, 'upload', NULL, 'Oldal', 10, '0000-00-00 00:00:00'),
(313, 'favicon_logo', NULL, 'file', NULL, 'Oldal', 10, '0000-00-00 00:00:00'),
(314, 'telefonszam', '258-19-72 ', 'text', NULL, 'Oldal', 10, '0000-00-00 00:00:00'),
(315, 'fax', NULL, 'text', NULL, 'Oldal', 10, '0000-00-00 00:00:00'),
(316, 'irszam', '1173', 'text', NULL, 'Cím adatok', 10, '0000-00-00 00:00:00'),
(317, 'varos', 'Bp.,', 'text', NULL, 'Cím adatok', 10, '0000-00-00 00:00:00'),
(318, 'cim', '525. tér', 'text', NULL, 'Cím adatok', 10, '0000-00-00 00:00:00'),
(319, 'posta_irszam', NULL, 'text', NULL, 'Cím adatok', 10, '0000-00-00 00:00:00'),
(320, 'posta_varos', NULL, 'text', NULL, 'Cím adatok', 10, '0000-00-00 00:00:00'),
(321, 'posta_cim', NULL, 'text', NULL, 'Cím adatok', 10, '0000-00-00 00:00:00'),
(322, 'email_admin', NULL, 'text', NULL, 'Email beállítások', 10, '0000-00-00 00:00:00'),
(323, 'email_dev', NULL, 'text', NULL, 'Email beállítások', 10, '0000-00-00 00:00:00'),
(324, 'email_oldal', '', 'text', NULL, 'Email beállítások', 10, '0000-00-00 00:00:00'),
(325, 'email_oldal_nev', NULL, 'text', NULL, 'Email beállítások', 10, '0000-00-00 00:00:00'),
(326, 'smtp_szerver', NULL, 'text', NULL, 'Email beállítások', 10, '0000-00-00 00:00:00'),
(327, 'smtp_port', NULL, 'text', NULL, 'Email beállítások', 10, '0000-00-00 00:00:00'),
(328, 'smtp_auth', NULL, 'checkbox', NULL, 'Email beállítások', 10, '0000-00-00 00:00:00'),
(329, 'smtp_felhasznalo', NULL, 'text', NULL, 'Email beállítások', 10, '0000-00-00 00:00:00'),
(330, 'smtp_jelszo', NULL, 'text', NULL, 'Email beállítások', 10, '0000-00-00 00:00:00'),
(331, 'animacio', NULL, 'checkbox', NULL, 'Oldal beállítások', 10, '0000-00-00 00:00:00'),
(332, 'szerviz', NULL, 'checkbox', NULL, 'Oldal beállítások', 10, '0000-00-00 00:00:00'),
(333, 'oldalnev', NULL, 'text', NULL, 'Oldal', 11, '0000-00-00 00:00:00'),
(334, 'domain', NULL, 'text', NULL, 'Oldal', 11, '0000-00-00 00:00:00'),
(335, 'image_logo', NULL, 'upload', NULL, 'Oldal', 11, '0000-00-00 00:00:00'),
(336, 'favicon_logo', NULL, 'file', NULL, 'Oldal', 11, '0000-00-00 00:00:00'),
(337, 'telefonszam', '259-19-72 ', 'text', NULL, 'Oldal', 11, '0000-00-00 00:00:00'),
(338, 'fax', NULL, 'text', NULL, 'Oldal', 11, '0000-00-00 00:00:00'),
(339, 'irszam', '1173', 'text', NULL, 'Cím adatok', 11, '0000-00-00 00:00:00'),
(340, 'varos', 'Bp.,', 'text', NULL, 'Cím adatok', 11, '0000-00-00 00:00:00'),
(341, 'cim', '525. tér', 'text', NULL, 'Cím adatok', 11, '0000-00-00 00:00:00'),
(342, 'posta_irszam', NULL, 'text', NULL, 'Cím adatok', 11, '0000-00-00 00:00:00'),
(343, 'posta_varos', NULL, 'text', NULL, 'Cím adatok', 11, '0000-00-00 00:00:00'),
(344, 'posta_cim', NULL, 'text', NULL, 'Cím adatok', 11, '0000-00-00 00:00:00'),
(345, 'email_admin', NULL, 'text', NULL, 'Email beállítások', 11, '0000-00-00 00:00:00'),
(346, 'email_dev', NULL, 'text', NULL, 'Email beállítások', 11, '0000-00-00 00:00:00'),
(347, 'email_oldal', NULL, 'text', NULL, 'Email beállítások', 11, '0000-00-00 00:00:00'),
(348, 'email_oldal_nev', NULL, 'text', NULL, 'Email beállítások', 11, '0000-00-00 00:00:00'),
(349, 'smtp_szerver', NULL, 'text', NULL, 'Email beállítások', 11, '0000-00-00 00:00:00'),
(350, 'smtp_port', NULL, 'text', NULL, 'Email beállítások', 11, '0000-00-00 00:00:00'),
(351, 'smtp_auth', NULL, 'checkbox', NULL, 'Email beállítások', 11, '0000-00-00 00:00:00'),
(352, 'smtp_felhasznalo', NULL, 'text', NULL, 'Email beállítások', 11, '0000-00-00 00:00:00'),
(353, 'smtp_jelszo', NULL, 'text', NULL, 'Email beállítások', 11, '0000-00-00 00:00:00'),
(354, 'animacio', NULL, 'checkbox', NULL, 'Oldal beállítások', 11, '0000-00-00 00:00:00'),
(355, 'szerviz', NULL, 'checkbox', NULL, 'Oldal beállítások', 11, '0000-00-00 00:00:00'),
(356, 'oldalnev', NULL, 'text', NULL, 'Oldal', 12, '0000-00-00 00:00:00'),
(357, 'domain', NULL, 'text', NULL, 'Oldal', 12, '0000-00-00 00:00:00'),
(358, 'image_logo', NULL, 'upload', NULL, 'Oldal', 12, '0000-00-00 00:00:00'),
(359, 'favicon_logo', NULL, 'file', NULL, 'Oldal', 12, '0000-00-00 00:00:00'),
(360, 'telefonszam', '1111-1111-1111', 'text', NULL, 'Oldal', 12, '0000-00-00 00:00:00'),
(361, 'fax', NULL, 'text', NULL, 'Oldal', 12, '0000-00-00 00:00:00'),
(362, 'irszam', '0000', 'text', NULL, 'Cím adatok', 12, '0000-00-00 00:00:00'),
(363, 'varos', 'Bp.,', 'text', NULL, 'Cím adatok', 12, '0000-00-00 00:00:00'),
(364, 'cim', 'Próba. tér 133.', 'text', NULL, 'Cím adatok', 12, '0000-00-00 00:00:00'),
(365, 'posta_irszam', NULL, 'text', NULL, 'Cím adatok', 12, '0000-00-00 00:00:00'),
(366, 'posta_varos', NULL, 'text', NULL, 'Cím adatok', 12, '0000-00-00 00:00:00'),
(367, 'posta_cim', NULL, 'text', NULL, 'Cím adatok', 12, '0000-00-00 00:00:00'),
(368, 'email_admin', NULL, 'text', NULL, 'Email beállítások', 12, '0000-00-00 00:00:00'),
(369, 'email_dev', NULL, 'text', NULL, 'Email beállítások', 12, '0000-00-00 00:00:00'),
(370, 'email_oldal', NULL, 'text', NULL, 'Email beállítások', 12, '0000-00-00 00:00:00'),
(371, 'email_oldal_nev', NULL, 'text', NULL, 'Email beállítások', 12, '0000-00-00 00:00:00'),
(372, 'smtp_szerver', NULL, 'text', NULL, 'Email beállítások', 12, '0000-00-00 00:00:00'),
(373, 'smtp_port', NULL, 'text', NULL, 'Email beállítások', 12, '0000-00-00 00:00:00'),
(374, 'smtp_auth', NULL, 'checkbox', NULL, 'Email beállítások', 12, '0000-00-00 00:00:00'),
(375, 'smtp_felhasznalo', NULL, 'text', NULL, 'Email beállítások', 12, '0000-00-00 00:00:00'),
(376, 'smtp_jelszo', NULL, 'text', NULL, 'Email beállítások', 12, '0000-00-00 00:00:00'),
(377, 'animacio', NULL, 'checkbox', NULL, 'Oldal beállítások', 12, '0000-00-00 00:00:00'),
(378, 'szerviz', NULL, 'checkbox', NULL, 'Oldal beállítások', 12, '0000-00-00 00:00:00'),
(379, 'oldalnev', NULL, 'text', NULL, 'Oldal', 0, '0000-00-00 00:00:00'),
(380, 'domain', NULL, 'text', NULL, 'Oldal', 0, '0000-00-00 00:00:00'),
(381, 'image_logo', NULL, 'upload', NULL, 'Oldal', 0, '0000-00-00 00:00:00'),
(382, 'favicon_logo', NULL, 'file', NULL, 'Oldal', 0, '0000-00-00 00:00:00'),
(383, 'telefonszam', '1111-1111-1111', 'text', NULL, 'Oldal', 0, '0000-00-00 00:00:00'),
(384, 'fax', NULL, 'text', NULL, 'Oldal', 0, '0000-00-00 00:00:00'),
(385, 'irszam', '0000', 'text', NULL, 'Cím adatok', 0, '0000-00-00 00:00:00'),
(386, 'varos', 'Bp.,', 'text', NULL, 'Cím adatok', 0, '0000-00-00 00:00:00'),
(387, 'cim', 'Próba. tér 133.', 'text', NULL, 'Cím adatok', 0, '0000-00-00 00:00:00'),
(388, 'posta_irszam', NULL, 'text', NULL, 'Cím adatok', 0, '0000-00-00 00:00:00'),
(389, 'posta_varos', NULL, 'text', NULL, 'Cím adatok', 0, '0000-00-00 00:00:00'),
(390, 'posta_cim', NULL, 'text', NULL, 'Cím adatok', 0, '0000-00-00 00:00:00'),
(391, 'email_admin', NULL, 'text', NULL, 'Email beállítások', 0, '0000-00-00 00:00:00'),
(392, 'email_dev', NULL, 'text', NULL, 'Email beállítások', 0, '0000-00-00 00:00:00'),
(393, 'email_oldal', NULL, 'text', NULL, 'Email beállítások', 0, '0000-00-00 00:00:00'),
(394, 'email_oldal_nev', NULL, 'text', NULL, 'Email beállítások', 0, '0000-00-00 00:00:00'),
(395, 'smtp_szerver', NULL, 'text', NULL, 'Email beállítások', 0, '0000-00-00 00:00:00'),
(396, 'smtp_port', NULL, 'text', NULL, 'Email beállítások', 0, '0000-00-00 00:00:00'),
(397, 'smtp_auth', NULL, 'checkbox', NULL, 'Email beállítások', 0, '0000-00-00 00:00:00'),
(398, 'smtp_felhasznalo', NULL, 'text', NULL, 'Email beállítások', 0, '0000-00-00 00:00:00'),
(399, 'smtp_jelszo', NULL, 'text', NULL, 'Email beállítások', 0, '0000-00-00 00:00:00'),
(400, 'animacio', NULL, 'checkbox', NULL, 'Oldal beállítások', 0, '0000-00-00 00:00:00'),
(401, 'szerviz', NULL, 'checkbox', NULL, 'Oldal beállítások', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `config0`
--

DROP TABLE IF EXISTS `config0`;
CREATE TABLE IF NOT EXISTS `config0` (
`id` int(11) NOT NULL,
  `item` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `id_orvos` int(11) DEFAULT NULL,
  `lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=24 ;

--
-- A tábla adatainak kiíratása `config0`
--

INSERT INTO `config0` (`id`, `item`, `value`, `type`, `label`, `category`, `id_orvos`, `lastmod`) VALUES
(1, 'oldalnev', '', 'text', 'Oldal név', 'Oldal', 1, '0000-00-00 00:00:00'),
(2, 'domain', 'szeiffer.ddstandard.hu', 'text', 'Domain név', 'Oldal', 1, '0000-00-00 00:00:00'),
(3, 'image_logo', '', 'upload', 'Logó', 'Oldal', 1, '0000-00-00 00:00:00'),
(4, 'favicon_logo', '', 'file', 'Ikon (favicon)', 'Oldal', 1, '0000-00-00 00:00:00'),
(5, 'telefonszam', '253-03-40\n', 'text', 'Telefonszám', 'Oldal', 1, '0000-00-00 00:00:00'),
(6, 'fax', '', 'text', 'Fax', 'Oldal', 1, '0000-00-00 00:00:00'),
(7, 'irszam', '1171', 'text', 'Irányítószám', 'Cím adatok', 1, '0000-00-00 00:00:00'),
(8, 'varos', 'Budapest', 'text', 'Település', 'Cím adatok', 1, '0000-00-00 00:00:00'),
(9, 'cim', 'Péceli út 190.', 'text', 'Utca, házszám', 'Cím adatok', 1, '0000-00-00 00:00:00'),
(10, 'posta_irszam', '1171', 'text', 'Irányítószám (postázási cím)', 'Cím adatok', 1, '0000-00-00 00:00:00'),
(11, 'posta_varos', 'Budapest', 'text', 'Település (postázási cím)', 'Cím adatok', 1, '0000-00-00 00:00:00'),
(12, 'posta_cim', 'Péceli út 190. I. em', 'text', 'Utca, házszám (postázási cím)', 'Cím adatok', 1, '0000-00-00 00:00:00'),
(13, 'email_admin', 'info@ddstandard.hu', 'text', 'Adminisztrátor email címe (értesítésekhez)', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(14, 'email_dev', 'dg@ddstandard.hu', 'text', 'Fejlesztő email címe (teszteléshez)', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(15, 'email_oldal', 'szeiffer@ddstandard.hu', 'text', 'Weboldal email címe (kimenő levelek feladója)', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(16, 'email_oldal_nev', '', 'text', 'Weboldal email megjelenítendő név', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(17, 'smtp_szerver', '', 'text', 'SMTP szerver', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(18, 'smtp_port', '', 'text', 'SMTP port', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(19, 'smtp_auth', '', 'checkbox', 'SMTP autentikáció', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(20, 'smtp_felhasznalo', '', 'text', 'SMTP felhasználói név', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(21, 'smtp_jelszo', '', 'text', 'SMTP jelszó', 'Email beállítások', 1, '0000-00-00 00:00:00'),
(22, 'animacio', '', 'checkbox', 'Animációk bekapcsolása az adminisztrációs felületen', 'Oldal beállítások', 1, '0000-00-00 00:00:00'),
(23, 'szerviz', '', 'checkbox', 'Szeviz üzemmód (a honlap elérhetetlenné válik a felhasználók számára!)', 'Oldal beállítások', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `body` text COLLATE utf8_hungarian_ci NOT NULL,
  `id_orvos` int(11) DEFAULT NULL,
  `lastmod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `descrption` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `content` text COLLATE utf8_hungarian_ci,
  `noindex` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `contact_finish` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `id_orvos` int(11) NOT NULL,
  `szak_megnevezes` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=286 ;

--
-- A tábla adatainak kiíratása `content`
--

INSERT INTO `content` (`id`, `name`, `title`, `descrption`, `content`, `noindex`, `is_active`, `contact_finish`, `url`, `id_orvos`, `szak_megnevezes`, `lastmod`) VALUES
(1, 'home', 'Dr. Szeiffert Gábor háziorvos honlapja', 'háziorvos, körzeti orvos, orvosi rendelő', '<p><strong>&Uuml;dv&ouml;zl&ouml;m!</strong></p>\r\n\r\n<p>Dr. Szeiffert G&aacute;bor h&aacute;ziorvos vagyok, honlapommal az &Ouml;n&ouml;k kapcsolattart&aacute;s&aacute;t szeretn&eacute;m moderniz&aacute;lni, időben kiterjeszteni.</p>\r\n\r\n<p>A rendel&eacute;si időt ide kattintva n&eacute;zhetik meg: <a href="/1/rendelesiido/rendelesiido">/1/rendelesiido/rendelesiido</a></p>\r\n\r\n<p>A k&ouml;rzethat&aacute;rokat itt ellenőrizhetik: <a href="/1/korzet/index">/1/korzet/index</a></p>\r\n\r\n<p>&Uuml;gyeleti inform&aacute;ci&oacute;kat &eacute;s egy&eacute;b t&aacute;j&eacute;koztat&aacute;sokat itt olvashat: <a href="/1/felvilagosit/index">//1/felvilagosit/index</a></p>\r\n\r\n<p>A rendelő oldal&aacute;t itt tekintheti meg: <a href="/1/rendelo/index">/1/rendelo/index</a></p>\r\n', 0, 1, '1', NULL, 1, 'háziorvos', '2014-04-28 19:47:41'),
(2, 'rendelesiido/rendelesiido', 'Rendelési idő', 'rendelési idő, rendelesi ido, opening', '<p><strong><span style="color:#FF0000">Figyelem, ennek a sornak (rekordnak) a tartalm&aacute;t tilos megv&aacute;ltoztatni!!</span></strong></p>\r\n', 0, 0, '1', NULL, 1, 'háziorvos', '2014-04-28 19:47:41'),
(3, 'beteghirado', 'Egy 60 éve gyakorló beteg tapasztalatai', 'jótanácsok saját tapasztalatok alapján', '<p><strong>Tisztelt Eg&eacute;szs&eacute;ges &eacute;s Beteg T&aacute;rsaim!</strong></p>\r\n\r\n<p>Az al&aacute;bbiakban eg&eacute;szs&eacute;ggel &eacute;s a saj&aacute;t betegs&eacute;geimmel kapcsolatos tapasztalataimat szeretn&eacute;m megosztani 15 pontban.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Előbb vagy ut&oacute;bb, de tudom&aacute;sul kell venn&uuml;nk, hogy <strong>mindny&aacute;jan egy &eacute;let nevű hal&aacute;los betegs&eacute;gben szenved&uuml;nk! <img alt="smiley" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="smiley" /> <img alt="sad" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/sad_smile.gif" style="height:20px; width:20px" title="sad" /></strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Nem csak az &eacute;let&uuml;nk egyedi, megism&eacute;telhetetlen &eacute;s &ndash; az esetleges neh&eacute;zs&eacute;ge vagy kil&aacute;t&aacute;stalans&aacute;ga ellen&eacute;re &ndash; <strong>igen &eacute;rt&eacute;kes, hanem a testi &eacute;s lelki eg&eacute;szs&eacute;g&uuml;nk is az,</strong> ez&eacute;rt c&eacute;lszerű d&ouml;nt&eacute;seinkn&eacute;l a hossz&uacute; t&aacute;v&uacute; eg&eacute;szs&eacute;gi kock&aacute;zatokat figyelembe venni &eacute;s eg&eacute;szs&eacute;g&uuml;nkre vigy&aacute;zni.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g szem&eacute;lyre szabott &eacute;s <strong>magunkhoz viszony&iacute;tva is relat&iacute;v!</strong> (Egy k&eacute;z vagy l&aacute;b n&eacute;lk&uuml;li ember &ndash; ha nem beteg &eacute;s megtal&aacute;lja az &eacute;letc&eacute;lj&aacute;t &eacute;s emberi kapcsolatait - <strong>b&aacute;r nehezebb k&ouml;r&uuml;lm&eacute;nyek k&ouml;z&ouml;tt &eacute;l, de az&eacute;rt eg&eacute;szs&eacute;ges!</strong> l&aacute;sd a k&ouml;vetkező vide&oacute;t:&nbsp;<a href="http://www.youtube.com/watch?v=WmMenUD0pf8">http://www.youtube.com/watch?v=WmMenUD0pf8</a> )</p>\r\n	</li>\r\n	<li>\r\n	<p>Gyakran nem tudatosul benn&uuml;nk, hogy a felnőtt ember eg&eacute;szs&eacute;ges &eacute;letm&oacute;dja napi &aacute;tlagosan m&aacute;sf&eacute;l &oacute;ra intenz&iacute;v gyalogl&aacute;st vagy ezzel egyen&eacute;rt&eacute;kű mozg&aacute;smennyis&eacute;get ig&eacute;nyel. Term&eacute;szetesen ettől el lehet t&eacute;rni, <strong>de a mozg&aacute;shi&aacute;ny hossz&uacute;t&aacute;von eg&eacute;szs&eacute;g&uuml;nk rov&aacute;s&aacute;ra megy.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Fiatal korban nem el&eacute;g a k&aacute;ros szenved&eacute;lyektől (doh&aacute;nyz&aacute;s, alkohol, drog, j&aacute;t&eacute;kszenved&eacute;ly, sex) tart&oacute;zkodni, hanem<strong> hasznos szenved&eacute;lyek m&eacute;rt&eacute;kletes rendszeress&eacute;g&eacute;re (sport, kir&aacute;ndul&aacute;s, zene, stb. hobbi) kell t&ouml;rekedni.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Ismerni &eacute;s figyelni kell &ouml;nmagunkat (mindig tudjuk, hogy mikor ett&uuml;nk &eacute;s ittunk utolj&aacute;ra, mitől lesz szorul&aacute;sunk vagy hasmen&eacute;s&uuml;nk, stb.)</p>\r\n	</li>\r\n	<li>\r\n	<p>Ha t&ouml;bb&eacute;-kev&eacute;sb&eacute; ismerj&uuml;k magunkat, akkor nagyobb es&eacute;llyel tudjuk megk&uuml;l&ouml;nb&ouml;ztetni egy &aacute;tlagos h&aacute;ny&aacute;s, hasmen&eacute;ses betegs&eacute;get (amelyen ak&aacute;r &eacute;vente t&ouml;bbsz&ouml;r, minden k&ouml;vetkezm&eacute;ny n&eacute;lk&uuml;l &aacute;teshet&uuml;nk &eacute;s nem sz&uuml;ks&eacute;gszerű, hogy orvos megvizsg&aacute;ljon) egy ak&aacute;r &eacute;letvesz&eacute;lyes k&ouml;vetkezm&eacute;nnyel j&aacute;r&oacute; betegs&eacute;gtől. A mi szemsz&ouml;g&uuml;nkből a kettő k&ouml;z&ouml;tt egy l&eacute;nyeges k&uuml;l&ouml;nbs&eacute;g van: az ut&oacute;bbi esetben mielőbb menj&uuml;nk el az orvoshoz. Ha ezt nem tessz&uuml;k meg k&eacute;sőbb erős f&aacute;jdalmaink &eacute;s / vagy magas l&aacute;zunk lesz &eacute;s &eacute;letben marad&aacute;si es&eacute;ly&uuml;nk cs&ouml;kken. Ha orvoshoz megy&uuml;nk memoriz&aacute;ljuk vagy &iacute;rjuk fel a l&eacute;nyeges t&uuml;neteket &eacute;s <strong>pr&oacute;b&aacute;ljuk meg mindent &eacute;s l&eacute;nyegret&ouml;rően elmondani</strong>.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g fontos eleme az alv&aacute;s, ha ezzel probl&eacute;ma van f&aacute;rad&eacute;konyabbak lesz&uuml;nk, cs&ouml;kken a munkahelyi &eacute;s otthoni teljes&iacute;tm&eacute;ny&uuml;nk, romlik az &eacute;letminős&eacute;g&uuml;nk. Ez&eacute;rt ezt a probl&eacute;m&aacute;t ki kell vizsg&aacute;ltatni. Gyakori ok lehet a horkol&aacute;s, amely s&uacute;lyos estben a k&ouml;zelben alv&oacute;k alv&aacute;s&aacute;t nehez&iacute;ti &eacute;s a horkol&oacute; v&eacute;rnyom&aacute;s&aacute;t időszakosan k&aacute;ros m&eacute;rt&eacute;kben megemeli. <strong>Maguk &eacute;s hozz&aacute;tartoz&oacute;ik &eacute;rdek&eacute;ben a horkol&oacute;k </strong>k&eacute;rjenek beutal&oacute;t az alv&aacute;scentrumba &eacute;s vizsg&aacute;ltass&aacute;k ki magukat: <a href="http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html">http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Volt szerencs&eacute;m megismerkedni a l&aacute;gy&eacute;ks&eacute;rvvel is (alhasi f&aacute;jdalom, esetleg kitapinthat&oacute; dudor), amellyel norm&aacute;l esetben nem t&uacute;l f&aacute;jdalmas &eacute;s a műt&eacute;t is rutinnak sz&aacute;m&iacute;t, ha időben orvoshoz megy&uuml;nk!</p>\r\n	</li>\r\n	<li>\r\n	<p>A gerincprobl&eacute;m&aacute;k szint&eacute;n sokat &eacute;rinthetnek, lumb&aacute;g&oacute; &ouml;r&ouml;meit m&aacute;r a huszon&eacute;vesek is &eacute;lvezhetik. Ez orvosi szempontb&oacute;l egy j&oacute; betegs&eacute;g, hiszen aki igaz&aacute;n elkapja, az a f&aacute;jdalmai miatt igen nagy val&oacute;sz&iacute;nűs&eacute;ggel orvoshoz fog fordulni. Tal&aacute;n kev&eacute;sb&eacute; ismert, hogy nem sz&uuml;ks&eacute;gszerű a visszaes&eacute;s, mert rendszeres gy&oacute;gytorn&aacute;val &eacute;s kellő k&ouml;r&uuml;ltekint&eacute;ssel (az &eacute;rz&eacute;keny ter&uuml;let hidegtől &eacute;s huzatt&oacute;l val&oacute; v&eacute;d&eacute;ssel, a rossz &eacute;s hirtelen mozdulatok ker&uuml;l&eacute;s&eacute;vel) a visszat&eacute;r&eacute;s val&oacute;sz&iacute;nűs&eacute;ge jelentősen cs&ouml;kkenthető.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban az idősebbek &eacute;let&eacute;t keser&iacute;tik meg a gerincs&eacute;rv &eacute;s a meszesed&eacute;s. Mindkettőre j&oacute; hat&aacute;ssal lehet a gy&oacute;gytorn&aacute;sz &aacute;ltal megtan&iacute;tott gy&oacute;gytorna, amelyet ezut&aacute;n c&eacute;lszerű heti t&ouml;bb alkalommal otthon, &eacute;let&uuml;nk v&eacute;g&eacute;ig elv&eacute;gezni. Gerinc s&eacute;rv eset&eacute;ben nem csak a kock&aacute;zatos műt&eacute;tet ker&uuml;lhetj&uuml;k el, hanem es&eacute;ly&uuml;nk lehet a f&aacute;jdalom mentes vagy csak időszakosan enyhe vagy elviselhető f&aacute;jdalommal b&iacute;r&oacute; &eacute;letre.</p>\r\n	</li>\r\n	<li>\r\n	<p>Sokakat &eacute;rinthet a reflux (gyomorsav t&uacute;ltermel&eacute;s, nyelőcső kimar&oacute;d&aacute;s &eacute;s gyullad&aacute;s), amely tart&oacute;s rossz k&ouml;z&eacute;rzethez vezet &eacute;s v&aacute;ltoz&oacute; t&uuml;netekkel j&aacute;rhat. &Eacute;n magam f&eacute;l&eacute;vig &eacute;lveztem t&aacute;rsas&aacute;g&aacute;t &eacute;s b&aacute;r t&ouml;bb gy&oacute;gyint&eacute;zm&eacute;nyben t&ouml;bb orvosnak panaszkodtam, de nem ker&uuml;lt behat&aacute;rol&aacute;sra az ok. V&eacute;g&uuml;l taktik&aacute;t v&aacute;ltoztattam &eacute;s panaszkod&aacute;s helyett ezt k&eacute;rdeztem: Mondja doktor &uacute;r norm&aacute;lis az, hogy f&eacute;l&eacute;ve rossz a k&ouml;z&eacute;rzetem? A nemleges v&aacute;lasz ut&aacute;n r&eacute;szletesen kik&eacute;rdezett &eacute;s ut&aacute;na fel&iacute;rt egy gy&oacute;gyszert, amely hat&aacute;s&aacute;ra harmadnapra elm&uacute;ltak a panaszaim. Tanuls&aacute;g: panaszkod&oacute; t&uuml;netfelsorol&aacute;s helyett <strong>egy j&oacute;l megfogalmazott k&eacute;rd&eacute;s n&eacute;ha c&eacute;lravezetőbb lehet.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>M&aacute;r csak egy &aacute;ltalam kipr&oacute;b&aacute;lt n&eacute;pbetegs&eacute;g maradt h&aacute;tra: a stroke. Nekem az agyi infarktusos v&aacute;ltozat (agyl&aacute;gyul&aacute;s) jutott oszt&aacute;lyr&eacute;sz&uuml;l. Ez egy nagy falat, ennek r&eacute;szletez&eacute;s&eacute;t szakemberekre hagyom, aki a saj&aacute;t esetemre k&iacute;v&aacute;ncsi itt elolvashatja: <a href="http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23">http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Boldog nyugd&iacute;jask&eacute;nt hetente t&ouml;bb alkalommal cs&aacute;b&iacute;tanak ingyenes eg&eacute;szs&eacute;gfelm&eacute;r&eacute;snek &aacute;lc&aacute;zott term&eacute;kbemutat&oacute;kra. N&eacute;h&aacute;nyra elmentem &eacute;s az interneten is ut&aacute;nan&eacute;ztem a t&eacute;m&aacute;nak ezek ut&aacute;n <strong>az &aacute;ltal&aacute;nos jellemzők az al&aacute;bbiak:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Minimum m&aacute;sf&eacute;l &oacute;r&aacute;s &ndash;<strong> k&ouml;telezően v&eacute;gighallgatand&oacute;</strong> - v&aacute;ltoz&oacute; sz&iacute;nvonal&uacute; &eacute;s erősen h&eacute;zagos igazs&aacute;gtartalm&uacute; előad&aacute;s, amelyben <strong>t&ouml;bbsz&ouml;r megk&eacute;rdőjelezik a modern gy&oacute;gyszerek sz&uuml;ks&eacute;gess&eacute;g&eacute;t</strong>, szidj&aacute;k a kapzsi gy&oacute;gyszergy&aacute;rt&oacute;kat &eacute;s ezzel tulajdonk&eacute;ppen<strong> azok fel&iacute;r&oacute;it is negat&iacute;van &iacute;t&eacute;lik meg.</strong> L&eacute;nyeg az &aacute;ltaluk bemutatott az eg&eacute;szs&eacute;ges &eacute;lethez - szerint&uuml;k n&eacute;lk&uuml;l&ouml;zhetetlen - csodaterm&eacute;kek (v&aacute;ltozatos sk&aacute;la: v&iacute;zszűrő, csodaturmixg&eacute;p, csodaporsz&iacute;v&oacute;, amelyik m&eacute;g az atk&aacute;kkal is elb&aacute;nik, gőz&aacute;gy&uacute;, m&aacute;gneses massz&iacute;roz&oacute; szuper-&aacute;gy, stb.).</p>\r\n	</li>\r\n	<li>\r\n	<p>A be&iacute;g&eacute;rt ingyenes vizsg&aacute;lat (hőkamer&aacute;s felv&eacute;tel, k&eacute;tb&uuml;tyk&ouml;s magnetorezonanci&aacute;s &aacute;lműszer, stb.) eredm&eacute;nye haszn&aacute;lhatatlan, &eacute;s/vagy ellenőrizhetetlen m&oacute;don sz&aacute;m&iacute;t&oacute;g&eacute;p adja az eredm&eacute;nyt, amely semmitmond&oacute; &eacute;s a val&oacute;s&aacute;ghoz semmi k&ouml;ze.</p>\r\n	</li>\r\n	<li>\r\n	<p>A cs&uacute;cspont a &bdquo;k&ouml;zpontb&oacute;l&rdquo; j&ouml;vő l&aacute;tv&aacute;nyosan felbontott extra &aacute;r kedvezm&eacute;nyek, amelyeket gyakran gyomorforgat&oacute; m&oacute;don kisorsolnak vagy jobb esetben majdnem mindenki megkap. A l&eacute;nyeg: a kedvezm&eacute;nyes &aacute;ron &aacute;rult k&eacute;sz&uuml;l&eacute;khez a bolti &aacute;r kb. t&iacute;zszeres&eacute;&eacute;rt juthatunk hozz&aacute;, de ez cs&uacute;csminős&eacute;g, ezzel szemben azonnal kell d&ouml;nteni &eacute;s d&ouml;nt&eacute;s&uuml;nket k&eacute;sőbb nem lesz m&oacute;dunk visszavonni!!! <strong>Rem&eacute;lem &ouml;sszefoglal&oacute;m kellően elrettentő &eacute;s sokakat megk&iacute;m&eacute;lek a felesleges bosszankod&aacute;st&oacute;l.</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<ol start="15">\r\n	<li>\r\n	<p><strong>V&eacute;gezet&uuml;l az &ouml;sszegzett j&oacute; tan&aacute;csok:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Pr&oacute;b&aacute;lj megb&iacute;zni a kezelőorvosodban, (ez azt is jelenti, hogy az igazat mondom, &eacute;s a mulaszt&aacute;somat sem hallgatom el!)</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban <strong>haszn&aacute;l, ha a gy&oacute;gyszereket (az &ouml;sszeset!)&nbsp; az elő&iacute;r&aacute;snak megfelelően beszedi az ember.</strong><img alt="smiley" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="smiley" /></p>\r\n	</li>\r\n	<li>\r\n	<p>Kr&oacute;nikus betegs&eacute;gek eset&eacute;n &eacute;s idős korban n&ouml;vekszik a beszedendő gy&oacute;gyszerek sz&aacute;ma, &iacute;gy egyre nagyobb odafigyel&eacute;st k&ouml;vetel az elő&iacute;r&aacute;sok betart&aacute;sa.</p>\r\n	</li>\r\n	<li>\r\n	<p>Egyes betegs&eacute;gek &eacute;letm&oacute;dv&aacute;lt&aacute;st k&ouml;vetelnek: di&eacute;t&aacute;t, rendszeres &eacute;s behat&aacute;rolt mozg&aacute;st, gy&oacute;gytorn&aacute;t. Ha ezeket elhanyagoljuk &eacute;letes&eacute;ly&uuml;nket / &eacute;letminős&eacute;g&uuml;nket cs&ouml;kkentj&uuml;k, esetleg m&aacute;sokra elker&uuml;lhető terheket rakunk.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Budapest, 2014.01.17. id. Darvas G&aacute;bor (legal&aacute;bb 60 &eacute;ve gyakorl&oacute; beteg)</p>\r\n\r\n<ol start="14">\r\n</ol>\r\n', 0, 1, '', NULL, 1, 'háziorvos', '2014-04-28 19:47:41'),
(4, 'bemutatkozas', 'Bemutatkozás', 'Dr Szeiffert Gábor, háziorvos,életrajz, bemutatkozás', '<p><img alt="" src="/images/1/DSC_1397.jpg" style="float:left; height:320px; margin:10px; width:180px" /></p>\r\n\r\n<p><strong>1983-ban </strong>&ndash; &Eacute;retts&eacute;gi Bizony&iacute;tv&aacute;nyt szereztem a Mad&aacute;ch Imre Gimn&aacute;ziumban.</p>\r\n\r\n<p><strong>1990-ben</strong> &ndash; &Aacute;ltal&aacute;nos Orvosi Diplom&aacute;t kaptam a SOTE &Aacute;ltal&aacute;nos Orvosi Kar&aacute;n.</p>\r\n\r\n<p><strong>1987-től</strong> &ndash; Az egyetemi &eacute;vek alatt megkezdett Tudom&aacute;nyos Di&aacute;kk&ouml;ri oktat&oacute;-kutat&oacute; munk&aacute;t a diploma megszerz&eacute;se ut&aacute;n is folytattam a SOTE II. Anat&oacute;miai, majd egy n&eacute;vv&aacute;ltoztat&aacute;st k&ouml;vetően a Hum&aacute;nmorfol&oacute;giai &eacute;s Fejlőd&eacute;sbiol&oacute;giai Int&eacute;zet&eacute;ben. Kezdetben, mint orvosgyakornok, majd tan&aacute;rseg&eacute;d, gy&oacute;gyszer&eacute;sz- &eacute;s orvostanhallgat&oacute;kat oktattam magyar &eacute;s angol nyelven. E tev&eacute;kenys&eacute;gemet &oacute;raad&oacute; tan&aacute;rk&eacute;nt jelenleg is folytatom.</p>\r\n\r\n<p><strong>1991-től</strong> &ndash; Az egyetemi munk&aacute;m mellett a XVII. ker&uuml;leti Felnőtt &Uuml;gyeleti Szolg&aacute;lat orvosak&eacute;nt dolgoztam 2003-ig.</p>\r\n\r\n<p><strong>1994-től</strong> &ndash; Bekapcsol&oacute;dtam a SOTE Csal&aacute;dorvosi Tansz&eacute;k h&aacute;ziorvosi rezidens k&eacute;pző programj&aacute;ba. Mentorom, dr. Kozma G&aacute;bor rendelőj&eacute;ben t&ouml;lt&ouml;ttem gyakorlataimat. Bajcsy-Zsilinszky K&oacute;rh&aacute;z IV.Belgy&oacute;gy&aacute;szat, K&ouml;zponti Intenz&iacute;v R&eacute;szleg, XVII.ker.Szakrendelő &ndash; Seb&eacute;szet; Uzsoki K&oacute;rh&aacute;z &ndash; Nőgy&oacute;gy&aacute;szat; Szt.J&aacute;nos K&oacute;rh&aacute;z &ndash; Neurol&oacute;gia; I.Gyermekklinika; jelzik k&oacute;rh&aacute;zi gyakorlataim főbb &aacute;llom&aacute;sait.</p>\r\n\r\n<p><strong>1996-ban</strong> &ndash; Sikeres licenc vizsg&aacute;t tettem. Ezt k&ouml;vetően t&ouml;bb h&aacute;ziorvosi rendelőben dolgoztam helyettes orvosk&eacute;nt.</p>\r\n\r\n<p><strong>1999-ben</strong> &ndash; H&aacute;ziorvosi Szakvizsg&aacute;t szereztem.</p>\r\n\r\n<p><strong>1999-től</strong> &ndash; Az ELTE Jogi Tov&aacute;bbk&eacute;pző Int&eacute;zete Jogi Szakokleveles Orvos-k&eacute;pz&eacute;s&eacute;nek hallgat&oacute;ja voltam.</p>\r\n\r\n<p><strong>2001-től</strong> &ndash; &ouml;n&aacute;ll&oacute; h&aacute;ziorvosi praxist vezetek a XVII. ker. egyik r&aacute;koscsabai rendelőj&eacute;ben.</p>\r\n\r\n<p><strong>2008-t&oacute;l </strong>2012-ig Budapest XVII. ker&uuml;lete Felnőtt H&aacute;ziorvos Szakfel&uuml;gyelő Főorvosi feladatokat l&aacute;ttam el.</p>\r\n\r\n<p><span style="color:#0000CD"><strong>2012 szeptember&eacute;től </strong>rendelőnket az Eg&eacute;szs&eacute;g&uuml;gyi Enged&eacute;lyez&eacute;si &eacute;s K&ouml;zigazgat&aacute;si Hivatal a H&aacute;ziorvostan szakir&aacute;nyra szakk&eacute;pző helly&eacute; minős&iacute;tette!</span></p>\r\n\r\n<p>Jelenlegi szakmai tev&eacute;kenys&eacute;gemet teh&aacute;t a h&aacute;ziorvosi munk&aacute;m min&eacute;l pontosabb ell&aacute;t&aacute;sa &eacute;s az orvosk&eacute;pz&eacute;sben val&oacute; akt&iacute;v r&eacute;szv&eacute;tel (a Semmelweis Egyetem Hum&aacute;nmorfol&oacute;giai Tansz&eacute;k&eacute;n &eacute;s Csal&aacute;dorvosi Tansz&eacute;k&eacute;n folytatott oktat&oacute;i munka) jellemzi.</p>\r\n\r\n<p>Munk&aacute;m mindk&eacute;t r&eacute;sze igen időig&eacute;nyes, &iacute;gy csak egy szerető, meg&eacute;rtő csal&aacute;di h&aacute;tt&eacute;rrel lehetek sikeres. Feles&eacute;gem, l&aacute;nyom &eacute;s fiam komoly t&aacute;maszt ny&uacute;jtanak h&eacute;tk&ouml;znapjaimban.</p>\r\n', 0, 0, '0', NULL, 1, 'háziorvos', '2014-04-28 19:47:41'),
(5, 'rendido', 'Általános tudnivalók:', 'rendelés, ismertető, rendelési információk', '<ul>\r\n	<li>Beteghez h&iacute;v&aacute;s d&eacute;lelőtt 8 - 12 &oacute;ra k&ouml;z&ouml;tt. D&eacute;lelőtti rendel&eacute;s eset&eacute;n a 253-03-40, d&eacute;lut&aacute;ni rendel&eacute;s eset&eacute;n a&nbsp; 253-03-41&nbsp; vagy a&nbsp; 257-59-00 telefonon.</li>\r\n	<li>Csak recept vagy beutal&oacute;&nbsp; ig&eacute;nyl&eacute;se eset&eacute;n k&eacute;rem, hogy a nőv&eacute;rn&eacute;l &aacute;lljanak sorba, ahol<strong> sorsz&aacute;m n&eacute;lk&uuml;l &eacute;s gyorsabban </strong>t&ouml;rt&eacute;nik ezek teljes&iacute;t&eacute;se!</li>\r\n	<li>Az orvos - rendk&iacute;v&uuml;li esetek kiv&eacute;tel&eacute;vel - az &eacute;rkez&eacute;skor h&uacute;zott sorsz&aacute;m alapj&aacute;n fogadja a p&aacute;cienseket,</li>\r\n	<li>20 darab sorsz&aacute;mozott k&aacute;rtya h&uacute;zhat&oacute;,&nbsp; ha elfogytak, tov&aacute;bbi p&aacute;cienseket nem tudok fogadni,</li>\r\n	<li>A rendel&eacute;si idő utols&oacute; &oacute;r&aacute;ja az - előzetesen időpontot foglalt betegek sz&aacute;m&aacute;ra van fenntartva.</li>\r\n	<li>Az alapos vizsg&aacute;lat &eacute;rdek&eacute;ben &oacute;r&aacute;nk&eacute;nt &aacute;tlagosan 4 - 7 beteget tudok fogadni.</li>\r\n	<li>Sajnos az egyes vizsg&aacute;lati idő - az igen elt&eacute;rő vizsg&aacute;latok &eacute;s a v&aacute;ratlanul befut&oacute; telefonh&iacute;v&aacute;sok miatt - <strong>igen v&aacute;ltoz&oacute; lehet, ez&eacute;rt a kedves p&aacute;cienseim sz&iacute;ves t&uuml;relm&eacute;t k&eacute;rem!</strong></li>\r\n	<li>Nem s&uuml;rgős esetekben mindenkinek javaslom -<strong> a r&ouml;videbb v&aacute;rakoz&aacute;si idő miatt - a telefonon vagy az interneten t&ouml;rt&eacute;nő időpont foglal&aacute;st!</strong></li>\r\n</ul>\r\n\r\n<p>&Uuml;dv&ouml;zlettel</p>\r\n\r\n<p>Dr. Szeiffert G&aacute;bor h&aacute;ziorvos</p>\r\n', 0, 1, '', 'Figyelem, a rekord name mező tartalmának megváltoztatása a rendelési idő oldal hibáját eredményezheti!!!', 1, 'háziorvos', '2014-04-28 19:47:41'),
(24, 'home', 'Dr. Szakács Andrea  háziorvos honlapja', 'háziorvos, körzeti orvos, orvosi rendelő', '<p>&Uuml;dv&ouml;zl&ouml;m!<br />\r\nDr. Szak&aacute;cs Andrea h&aacute;ziorvos vagyok, honlapommal az &Ouml;n&ouml;k kapcsolattart&aacute;s&aacute;t szeretn&eacute;m moderniz&aacute;lni, időben kiterjeszteni.</p>\r\n\r\n<p>A rendel&eacute;si időt ide kattintva n&eacute;zhetik meg: <a href="/3/rendelesiido/rendelesiido">/3/rendelesiido/rendelesiido</a></p>\r\n\r\n<p>A k&ouml;rzethat&aacute;rokat itt ellenőrizhetik: <a href="/3/korzet/index">/3/korzet/index</a></p>\r\n\r\n<p>&Uuml;gyeleti inform&aacute;ci&oacute;kat &eacute;s egy&eacute;b t&aacute;j&eacute;koztat&aacute;sokat itt olvashat: <a href="/3/felvilagosit/index">/3/felvilagosit/index</a></p>\r\n\r\n<p>A rendelő oldal&aacute;t itt tekintheti meg: <a href="/3/rendelo/index">/3/rendelo/index</a></p>\r\n', 0, 1, '1', '', 3, 'háziorvos', '2014-04-28 19:47:41'),
(25, 'rendelesiido/rendelesiido', 'Rendelési idő', 'rendelési idő, rendelesi ido, opening', '<p><strong><span style="color:#FF0000">Figyelem, ennek a sornak (rekordnak) a tartalm&aacute;t tilos megv&aacute;ltoztatni!!</span></strong></p>\r\n', 0, 0, '1', NULL, 3, 'háziorvos', '2014-04-28 19:47:41'),
(26, 'beteghirado', 'Egy 60 éve gyakorló beteg tapasztalatai', 'Jótanácsok saját  tapasztalatok alapján', '<p><strong>Tisztelt Eg&eacute;szs&eacute;ges &eacute;s Beteg T&aacute;rsaim!</strong></p>\r\n\r\n<p>Az al&aacute;bbiakban eg&eacute;szs&eacute;ggel &eacute;s a saj&aacute;t betegs&eacute;geimmel kapcsolatos tapasztalataimat szeretn&eacute;m megosztani 15 pontban.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Előbb vagy ut&oacute;bb, de tudom&aacute;sul kell venn&uuml;nk, hogy <strong>mindny&aacute;jan egy &eacute;let nevű hal&aacute;los betegs&eacute;gben szenved&uuml;nk! <img alt="smiley" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="smiley" /> <img alt="sad" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/sad_smile.gif" style="height:20px; width:20px" title="sad" /></strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Nem csak az &eacute;let&uuml;nk egyedi, megism&eacute;telhetetlen &eacute;s &ndash; az estleges neh&eacute;zs&eacute;ge vagy kil&aacute;t&aacute;stalans&aacute;ga ellen&eacute;re &ndash; <strong>igen &eacute;rt&eacute;kes, hanem a testi &eacute;s lelki eg&eacute;szs&eacute;g&uuml;nk is az,</strong> ez&eacute;rt c&eacute;lszerű d&ouml;nt&eacute;seinkn&eacute;l a hossz&uacute; t&aacute;v&uacute; eg&eacute;szs&eacute;gi kock&aacute;zatokat figyelembe venni &eacute;s eg&eacute;szs&eacute;g&uuml;nkre vigy&aacute;zni.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g szem&eacute;lyre szabott &eacute;s <strong>magunkhoz viszony&iacute;tva is relat&iacute;v!</strong> (Egy k&eacute;z vagy l&aacute;b n&eacute;lk&uuml;li ember &ndash; ha nem beteg &eacute;s megtal&aacute;lja az &eacute;letc&eacute;lj&aacute;t &eacute;s emberi kapcsolatait - <strong>b&aacute;r nehezebb k&ouml;r&uuml;lm&eacute;nyek k&ouml;z&ouml;tt &eacute;l, de az&eacute;rt eg&eacute;szs&eacute;ges!</strong> l&aacute;sda k&ouml;vetkező vide&oacute;t:&nbsp;<a href="http://www.youtube.com/watch?v=WmMenUD0pf8">http://www.youtube.com/watch?v=WmMenUD0pf8</a> )</p>\r\n	</li>\r\n	<li>\r\n	<p>Gyakran nem tudatosul benn&uuml;nk, hogy a felnőtt ember eg&eacute;szs&eacute;ges &eacute;letm&oacute;dja napi &aacute;tlagosan m&aacute;sf&eacute;l &oacute;ra intenz&iacute;v gyalogl&aacute;st vagy ezzel egyen&eacute;rt&eacute;kű mozg&aacute;smennyis&eacute;get ig&eacute;nyel. Term&eacute;szetesen ettől el lehet t&eacute;rni, <strong>de a mozg&aacute;shi&aacute;ny hossz&uacute;t&aacute;von eg&eacute;szs&eacute;g&uuml;nk rov&aacute;s&aacute;ra megy.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Fiatal korban nem el&eacute;g a k&aacute;ros szenved&eacute;lyektől (doh&aacute;nyz&aacute;s, alkohol, drog, j&aacute;t&eacute;kszenved&eacute;ly, sex) tart&oacute;zkodni, hanem<strong> hasznos szenved&eacute;lyek m&eacute;rt&eacute;kletes rendszeress&eacute;g&eacute;re (sport, kir&aacute;ndul&aacute;s, zene, stb. hobbi) kell t&ouml;rekedni.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Ismerni &eacute;s figyelni kell &ouml;nmagunkat (mindig tudjuk, hogy mikor ett&uuml;nk &eacute;s ittunk utolj&aacute;ra, mitől lesz szorul&aacute;sunk vagy hasmen&eacute;s&uuml;nk, stb.)</p>\r\n	</li>\r\n	<li>\r\n	<p>Ha t&ouml;bb&eacute;-kev&eacute;sb&eacute; ismerj&uuml;k magunkat, akkor nagyobb es&eacute;llyel tudjuk megk&uuml;l&ouml;nb&ouml;ztetni egy &aacute;tlagos h&aacute;ny&aacute;s, hasmen&eacute;ses betegs&eacute;get (amelyen ak&aacute;r &eacute;vente t&ouml;bbsz&ouml;r, minden k&ouml;vetkezm&eacute;ny n&eacute;lk&uuml;l &aacute;teshet&uuml;nk &eacute;s nem sz&uuml;ks&eacute;gszerű, hogy orvos megvizsg&aacute;ljon) egy ak&aacute;r &eacute;letvesz&eacute;lyes k&ouml;vetkezm&eacute;nnyel j&aacute;r&oacute; betegs&eacute;gtől. A mi szemsz&ouml;g&uuml;nkből a kettő k&ouml;z&ouml;tt egy l&eacute;nyeges k&uuml;l&ouml;nbs&eacute;g van: az ut&oacute;bbi esetben mielőbb menj&uuml;nk el az orvoshoz. Ha ezt nem tessz&uuml;k meg k&eacute;sőbb erős f&aacute;jdalmaink &eacute;s / vagy magas l&aacute;zunk lesz &eacute;s &eacute;letben marad&aacute;si es&eacute;ly&uuml;nk cs&ouml;kken. Ha orvoshoz megy&uuml;nk memoriz&aacute;ljuk vagy &iacute;rjuk fel a l&eacute;nyeges t&uuml;neteket &eacute;s <strong>pr&oacute;b&aacute;ljuk meg mindet &eacute;s l&eacute;nyegret&ouml;rően elmondani</strong>.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g fontos eleme az alv&aacute;s, ha ezzel probl&eacute;ma van f&aacute;rad&eacute;konyabbak lesz&uuml;nk, cs&ouml;kken a munkahelyi &eacute;s otthoni teljes&iacute;tm&eacute;ny&uuml;nk, romlik az &eacute;letminős&eacute;g&uuml;nk. Ez&eacute;rt ezt a probl&eacute;m&aacute;t ki kell vizsg&aacute;ltatni. Gyakori ok lehet a horkol&aacute;s, amely s&uacute;lyos estben a k&ouml;zelben alv&oacute;k alv&aacute;s&aacute;t nehez&iacute;ti &eacute;s a horkol&oacute; v&eacute;rnyom&aacute;s&aacute;t időszakosan k&aacute;ros m&eacute;rt&eacute;kben megemeli. <strong>Magunk &eacute;s hozz&aacute;nk tartoz&oacute;ik &eacute;rdek&eacute;ben a horkol&oacute;k </strong>k&eacute;rjenek beutal&oacute;t az alv&aacute;scenrtumba &eacute;s vizsg&aacute;ltass&aacute;k ki magukat: <a href="http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html">http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Volt szerencs&eacute;m megismerkedni a l&aacute;gy&eacute;ks&eacute;rvvel is (alhasi f&aacute;jdalom, esetleg kitapinthat&oacute; dudor), amellyel norm&aacute;l esetben nem t&uacute;l f&aacute;jdalmas &eacute;s a műt&eacute;t is rutinnak sz&aacute;m&iacute;t, ha időben orvoshoz megy&uuml;nk!</p>\r\n	</li>\r\n	<li>\r\n	<p>A gerincprobl&eacute;m&aacute;k szint&eacute;n sokat &eacute;rinthetnek, lumb&aacute;g&oacute; &ouml;r&ouml;meit m&aacute;r a huszon&eacute;vesek is &eacute;lvezhetik. Ez orvosi szempontb&oacute;l egy j&oacute; betegs&eacute;g, hiszen aki igaz&aacute;n elkapja, az a f&aacute;jdalmai miatt igen nagy val&oacute;sz&iacute;nűs&eacute;ggel orvoshoz fog fordulni. Tal&aacute;n kev&eacute;sb&eacute; ismert, hogy nem sz&uuml;ks&eacute;gszerű a visszaes&eacute;s, mert rendszeres gy&oacute;gytorn&aacute;val &eacute;s kellő k&ouml;r&uuml;ltekint&eacute;ssel (az &eacute;rz&eacute;keny ter&uuml;let hidegtől &eacute;s huzatt&oacute;l val&oacute; v&eacute;d&eacute;ssel, a rossz &eacute;s hirtelen mozdulatok ker&uuml;l&eacute;s&eacute;vel) a visszat&eacute;r&eacute;s val&oacute;sz&iacute;nűs&eacute;ge jelentősen cs&ouml;kkenthető.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban az idősebbek &eacute;let&eacute;t keser&iacute;tik meg a gerincs&eacute;rv &eacute;s a meszesed&eacute;s. Mindkettőre j&oacute; hat&aacute;ssal lehet a gy&oacute;gytorn&aacute;sz &aacute;ltal megtan&iacute;tott gy&oacute;gytorna, amelyet ezut&aacute;n c&eacute;lszerű heti t&ouml;bb alkalommal otthon, &eacute;let&uuml;nk v&eacute;g&eacute;ig elv&eacute;gezni. Gerinc s&eacute;rv eset&eacute;ben nem csak a kock&aacute;zatos műt&eacute;tet ker&uuml;lhetj&uuml;k el, hanem es&eacute;ly&uuml;nk lehet a f&aacute;jdalom mentes vagy csak időszakosan enyhe vagy elviselhető f&aacute;jdalommal b&iacute;r&oacute; &eacute;letre.</p>\r\n	</li>\r\n	<li>\r\n	<p>Sokakat &eacute;rinthet a reflux (gyomorsav t&uacute;ltermel&eacute;s, nyelőcső kimar&oacute;d&aacute;s &eacute;s gyullad&aacute;s), amely tart&oacute;s rossz k&ouml;z&eacute;rzethez vezet &eacute;s v&aacute;ltoz&oacute; t&uuml;netekkel j&aacute;rhat. &Eacute;n magam f&eacute;l&eacute;vig &eacute;lveztem t&aacute;rsas&aacute;g&aacute;t &eacute;s b&aacute;r t&ouml;bb gy&oacute;gyint&eacute;zm&eacute;nyben t&ouml;bb orvosnak panaszkodtam, de nem ker&uuml;lt behat&aacute;rol&aacute;sra az ok. V&eacute;g&uuml;l taktik&aacute;t v&aacute;ltoztattam &eacute;s panaszkod&aacute;s helyett ezt k&eacute;rdeztem: Mondja doktor &uacute;r norm&aacute;lis az, hogy f&eacute;l&eacute;ve rossz a k&ouml;z&eacute;rzetem? A nemleges v&aacute;lasz ut&aacute;n r&eacute;szletesen kik&eacute;rdezett &eacute;s ut&aacute;na fel&iacute;rt egy gy&oacute;gyszert, amely hat&aacute;s&aacute;ra harmadnapra elm&uacute;ltak a panaszaim. Tanuls&aacute;g: panaszkod&oacute; t&uuml;netfelsorol&aacute;s helyett <strong>egy j&oacute;l megfogalmazott k&eacute;rd&eacute;s n&eacute;ha c&eacute;lravezetőbb lehet.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>M&aacute;r csak egy &aacute;ltalam kipr&oacute;b&aacute;lt n&eacute;pbetegs&eacute;g maradt h&aacute;tra: a stroke. Nekem az agyi infarktusos v&aacute;ltozat (agyl&aacute;gyul&aacute;s) jutott oszt&aacute;lyr&eacute;sz&uuml;l. Ez egy nagy falat, ennek r&eacute;szletez&eacute;s&eacute;t szakemberekre hagyom, aki a saj&aacute;t esetemre k&iacute;v&aacute;ncsi itt elolvashatja: <a href="http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23">http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Boldog nyugd&iacute;jask&eacute;nt hetente t&ouml;bb alkalommal cs&aacute;b&iacute;tanak ingyenes eg&eacute;szs&eacute;gfelm&eacute;r&eacute;snek &aacute;lc&aacute;zott term&eacute;kbemutat&oacute;kra. N&eacute;h&aacute;nyra elmentem &eacute;s az interneten is ut&aacute;nan&eacute;ztem a t&eacute;m&aacute;nak ezek ut&aacute;n <strong>az &aacute;ltal&aacute;nos jellemzők az al&aacute;bbiak:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Minimum m&aacute;sf&eacute;l &oacute;r&aacute;s &ndash;<strong> k&ouml;telezően v&eacute;gighallgatand&oacute;</strong> - v&aacute;ltoz&oacute; sz&iacute;nvonal&uacute; &eacute;s erősen h&eacute;zagos igazs&aacute;gtartalm&uacute; előad&aacute;s, amelyben <strong>t&ouml;bbsz&ouml;r megk&eacute;rdőjelezik a modern gy&oacute;gyszerek sz&uuml;ks&eacute;gess&eacute;g&eacute;t</strong>, szidj&aacute;k a kapzsi gy&oacute;gyszergy&aacute;rt&oacute;kat &eacute;s ezzel tulajdonk&eacute;ppen<strong> azok fel&iacute;r&oacute;it is negat&iacute;van &iacute;t&eacute;lik meg.</strong> L&eacute;nyeg az &aacute;ltaluk bemutatott az eg&eacute;szs&eacute;ges &eacute;lethez - szerint&uuml;k n&eacute;lk&uuml;l&ouml;zhetetlen - csodaterm&eacute;kek (v&aacute;ltozatos sk&aacute;la: v&iacute;zszűrő, csodaturmixg&eacute;p, csodaporsz&iacute;v&oacute;, amelyik m&eacute;g az atk&aacute;kkal is elb&aacute;nik, gőz&aacute;gy&uacute;, m&aacute;gneses massz&iacute;roz&oacute; szuper-&aacute;gy, stb.).</p>\r\n	</li>\r\n	<li>\r\n	<p>A be&iacute;g&eacute;rt ingyenes vizsg&aacute;lat (hőkamer&aacute;s felv&eacute;tel, k&eacute;tb&uuml;tyk&ouml;s magnetorezonanci&aacute;s &aacute;lműszer, stb. eredm&eacute;nye haszn&aacute;lhatatlan, &eacute;s/vagy ellenőrizhetetlen m&oacute;don sz&aacute;m&iacute;t&oacute;g&eacute;p adja az eredm&eacute;nyt, amely semmit mond&oacute; &eacute;s a val&oacute;s&aacute;ghoz semmi k&ouml;ze.</p>\r\n	</li>\r\n	<li>\r\n	<p>A cs&uacute;cspont a &bdquo;k&ouml;zpontb&oacute;l&rdquo; j&ouml;vő l&aacute;tv&aacute;nyosan felbontott extra &aacute;r kedvezm&eacute;nyek, amelyeket gyakran gyomorforgat&oacute; m&oacute;don kisorsolnak vagy jobb esetben majdnem mindenki megkap. A l&eacute;nyeg: a kedvezm&eacute;nyes &aacute;ron &aacute;rult k&eacute;sz&uuml;l&eacute;khez a bolti &aacute;r kb. t&iacute;zszeres&eacute;&eacute;rt juthatunk hozz&aacute;, de ez cs&uacute;csminős&eacute;g, ezzel szemben azonnal kell d&ouml;nteni &eacute;s d&ouml;nt&eacute;s&uuml;nket k&eacute;sőbb nem lesz m&oacute;dunk visszavonni!!! <strong>Rem&eacute;lem &ouml;sszefoglal&oacute;m kellőn elrettentő &eacute;s sokakat megk&iacute;m&eacute;lek a felesleges bosszankod&aacute;st&oacute;l.</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<ol start="15">\r\n	<li>\r\n	<p><strong>V&eacute;gezet&uuml;l az &ouml;sszegzett j&oacute; tan&aacute;csok:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Pr&oacute;b&aacute;lj megb&iacute;zni a kezelőorvosodban, (ez azt is jelenti, hogy az igazat mondom, &eacute;s a mulaszt&aacute;somat sem hallgatom el!)</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban <strong>haszn&aacute;l, ha a gy&oacute;gyszereket (az &ouml;sszeset!) &eacute; az elő&iacute;r&aacute;snak megfelelően beszedi az ember.</strong><img alt="smiley" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="smiley" /></p>\r\n	</li>\r\n	<li>\r\n	<p>Kr&oacute;nikus betegs&eacute;gek eset&eacute;n &eacute;s idős korban n&ouml;vekszik a beszedendő gy&oacute;gyszerek sz&aacute;ma, &iacute;gy egyre nagyobb odafigyel&eacute;st k&ouml;vetel az elő&iacute;r&aacute;sok betart&aacute;sa.</p>\r\n	</li>\r\n	<li>\r\n	<p>Egyes betegs&eacute;gek &eacute;letm&oacute;dv&aacute;lt&aacute;st k&ouml;vetelnek: di&eacute;t&aacute;t, rendszeres &eacute;s behat&aacute;rolt mozg&aacute;st, gy&oacute;gytorn&aacute;t. Ha ezeket elhanyagoljuk &eacute;letes&eacute;ly&uuml;nket / &eacute;letminős&eacute;g&uuml;nket cs&ouml;kkentj&uuml;k, esetleg m&aacute;sokra elker&uuml;lhető terheket rakunk.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Budapest, 2014.01.17. id. Darvas G&aacute;bor (legal&aacute;bb 60 &eacute;ve gyakorl&oacute; beteg)</p>\r\n\r\n<ol start="14">\r\n</ol>\r\n', 0, 1, '', '', 3, 'háziorvos', '2014-04-28 19:47:41'),
(27, 'bemutatkozas', 'Bemutatkozás', 'Dr. Szakács Andrea , háziorvos,életrajz', '<p><img alt="" src="/ho/images/abris2.JPG" style="float:left; margin:5px 10px; width:100px" />Saj&aacute;t f&eacute;nyk&eacute;p</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nsz&uuml;let&eacute;si &eacute;v, hely<br />\r\nSpeci&aacute;lis tanulm&aacute;nyok<br />\r\nMi&eacute;rt lettem h&aacute;ziorvos<br />\r\nCsal&aacute;d<br />\r\nHobbi</p>\r\n', 0, 0, '0', '', 3, 'háziorvos', '2014-04-28 19:47:41'),
(28, 'rendido', 'Általános tudnivalók:', 'rendelés, ismertető, rendelési információk', '<p><span style="color:#FF0000"><span style="font-size:14px"><strong>V&eacute;rv&eacute;tel:</strong></span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="color:#000000"><span style="font-size:12px">Kedd &eacute;s cs&uuml;t&ouml;rt&ouml;ki napokon rendel&eacute;s előtt, előzetes bejelent&eacute;s alapj&aacute;n.</span></span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="font-size:12px"><span style="color:#006400"><strong><span style="font-size:14px">H&iacute;v&aacute;s bejelent&eacute;se:</span></strong></span></span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="font-size:12px"><span style="font-size:14px"><span style="font-size:12px"><span style="color:#000000">Rendel&eacute;si időben 11 &oacute;r&aacute;ig&nbsp; <strong>257-59-00&nbsp; </strong>vagy rendel&eacute;si időn k&iacute;v&uuml;l <strong>253-03-40&nbsp; </strong>telefonsz&aacute;mon.</span></span></span></span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="font-size:12px"><span style="font-size:14px"><span style="font-size:12px"><span style="color:#000000"><strong><span style="font-size:14px">Orvosi &uuml;gyelet:</span></strong></span></span></span></span></span></p>\r\n\r\n<p><span style="font-size:14px"><span style="font-size:12px"><span style="font-size:14px"><span style="font-size:12px"><span style="color:#000000"><span style="font-size:14px"><span style="font-size:12px">Rendel&eacute;si időn k&iacute;v&uuml;l, XVII. Eg&eacute;szs&eacute;gh&aacute;z u. 3. Telefon: <strong>256-62-53</strong></span></span></span></span></span></span></span></p>\r\n\r\n<p><strong><span style="font-size:14px"><span style="font-size:12px"><span style="font-size:14px"><span style="font-size:12px"><span style="font-size:14px"><span style="font-size:12px"><span style="font-size:14px"><span style="color:#FF0000">Figyelem!</span></span></span></span></span></span></span></span></strong></p>\r\n\r\n<p><span style="color:#000000">A rendel&eacute;sek utols&oacute; &oacute;r&aacute;j&aacute;ban csak előzetesen bejelentett beteget fogadunk. (az akut ell&aacute;t&aacute;s folyamatos)</span></p>\r\n\r\n<p><span style="color:#000000">&Uuml;dv&ouml;zlettel</span></p>\r\n\r\n<p><span style="color:#000000">Dr. Szak&aacute;cs Andrea h&aacute;ziorvos</span></p>\r\n', 0, 1, '', '<span class="red">Figyelem, a rekord name mező tartalmának <b>[rendido]</b> megváltoztatása a rendelési idő oldal hibáját eredményezheti!!!</span>', 3, 'háziorvos', '2014-04-28 19:47:41'),
(29, 'home', 'Dr. Szászi Andrea  háziorvos honlapja', 'háziorvos, körzeti orvos, orvosi rendelő', '<p>&Uuml;dv&ouml;zl&ouml;m!<br />\r\nDr. Sz&aacute;szi Andrea h&aacute;ziorvos vagyok, honlapommal az &Ouml;n&ouml;k kapcsolattart&aacute;s&aacute;t szeretn&eacute;m moderniz&aacute;lni, időben kiterjeszteni.</p>\r\n\r\n<p>A rendel&eacute;si időt ide kattintva n&eacute;zhetik meg: <a href="/4/rendelesiido/rendelesiido">/4/rendelesiido/rendelesiido</a></p>\r\n\r\n<p>A k&ouml;rzethat&aacute;rokat itt ellenőrizhetik: <a href="/4/korzet/index">/4/korzet/index</a></p>\r\n\r\n<p>&Uuml;gyeleti inform&aacute;ci&oacute;kat &eacute;s egy&eacute;b t&aacute;j&eacute;koztat&aacute;sokat itt olvashat: <a href="/4/felvilagosit/index">/4/felvilagosit/index</a></p>\r\n\r\n<p>A rendelő oldal&aacute;t itt tekintheti meg: <a href="/4/rendelo/index">/4/rendelo/index</a></p>\r\n', 0, 1, '1', '', 4, 'háziorvos', '2014-04-28 19:47:41'),
(30, 'rendelesiido/rendelesiido', 'Rendelési idő', 'rendelési idő, rendelesi ido, opening', '<p><strong><span style="color:#FF0000">Figyelem, ennek a sornak (rekordnak) a tartalm&aacute;t tilos megv&aacute;ltoztatni!!</span></strong></p>\r\n', 0, 0, '1', NULL, 4, 'háziorvos', '2014-04-28 19:47:41');
INSERT INTO `content` (`id`, `name`, `title`, `descrption`, `content`, `noindex`, `is_active`, `contact_finish`, `url`, `id_orvos`, `szak_megnevezes`, `lastmod`) VALUES
(31, 'beteghirado', 'Egy 60 éve gyakorló beteg tapasztalatai', 'Jótanácsok saját  tapasztalatok alapján', '<p><strong>Tisztelt Eg&eacute;szs&eacute;ges &eacute;s Beteg T&aacute;rsaim!</strong></p>\r\n\r\n<p>Az al&aacute;bbiakban eg&eacute;szs&eacute;ggel &eacute;s a saj&aacute;t betegs&eacute;geimmel kapcsolatos tapasztalataimat szeretn&eacute;m megosztani 15 pontban.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Előbb vagy ut&oacute;bb, de tudom&aacute;sul kell venn&uuml;nk, hogy <strong>mindny&aacute;jan egy &eacute;let nevű hal&aacute;los betegs&eacute;gben szenved&uuml;nk! <img alt="smiley" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="smiley" /> <img alt="sad" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/sad_smile.gif" style="height:20px; width:20px" title="sad" /></strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Nem csak az &eacute;let&uuml;nk egyedi, megism&eacute;telhetetlen &eacute;s &ndash; az estleges neh&eacute;zs&eacute;ge vagy kil&aacute;t&aacute;stalans&aacute;ga ellen&eacute;re &ndash; <strong>igen &eacute;rt&eacute;kes, hanem a testi &eacute;s lelki eg&eacute;szs&eacute;g&uuml;nk is az,</strong> ez&eacute;rt c&eacute;lszerű d&ouml;nt&eacute;seinkn&eacute;l a hossz&uacute; t&aacute;v&uacute; eg&eacute;szs&eacute;gi kock&aacute;zatokat figyelembe venni &eacute;s eg&eacute;szs&eacute;g&uuml;nkre vigy&aacute;zni.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g szem&eacute;lyre szabott &eacute;s <strong>magunkhoz viszony&iacute;tva is relat&iacute;v!</strong> (Egy k&eacute;z vagy l&aacute;b n&eacute;lk&uuml;li ember &ndash; ha nem beteg &eacute;s megtal&aacute;lja az &eacute;letc&eacute;lj&aacute;t &eacute;s emberi kapcsolatait - <strong>b&aacute;r nehezebb k&ouml;r&uuml;lm&eacute;nyek k&ouml;z&ouml;tt &eacute;l, de az&eacute;rt eg&eacute;szs&eacute;ges!</strong> l&aacute;sda k&ouml;vetkező vide&oacute;t:&nbsp;<a href="http://www.youtube.com/watch?v=WmMenUD0pf8">http://www.youtube.com/watch?v=WmMenUD0pf8</a> )</p>\r\n	</li>\r\n	<li>\r\n	<p>Gyakran nem tudatosul benn&uuml;nk, hogy a felnőtt ember eg&eacute;szs&eacute;ges &eacute;letm&oacute;dja napi &aacute;tlagosan m&aacute;sf&eacute;l &oacute;ra intenz&iacute;v gyalogl&aacute;st vagy ezzel egyen&eacute;rt&eacute;kű mozg&aacute;smennyis&eacute;get ig&eacute;nyel. Term&eacute;szetesen ettől el lehet t&eacute;rni, <strong>de a mozg&aacute;shi&aacute;ny hossz&uacute;t&aacute;von eg&eacute;szs&eacute;g&uuml;nk rov&aacute;s&aacute;ra megy.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Fiatal korban nem el&eacute;g a k&aacute;ros szenved&eacute;lyektől (doh&aacute;nyz&aacute;s, alkohol, drog, j&aacute;t&eacute;kszenved&eacute;ly, sex) tart&oacute;zkodni, hanem<strong> hasznos szenved&eacute;lyek m&eacute;rt&eacute;kletes rendszeress&eacute;g&eacute;re (sport, kir&aacute;ndul&aacute;s, zene, stb. hobbi) kell t&ouml;rekedni.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Ismerni &eacute;s figyelni kell &ouml;nmagunkat (mindig tudjuk, hogy mikor ett&uuml;nk &eacute;s ittunk utolj&aacute;ra, mitől lesz szorul&aacute;sunk vagy hasmen&eacute;s&uuml;nk, stb.)</p>\r\n	</li>\r\n	<li>\r\n	<p>Ha t&ouml;bb&eacute;-kev&eacute;sb&eacute; ismerj&uuml;k magunkat, akkor nagyobb es&eacute;llyel tudjuk megk&uuml;l&ouml;nb&ouml;ztetni egy &aacute;tlagos h&aacute;ny&aacute;s, hasmen&eacute;ses betegs&eacute;get (amelyen ak&aacute;r &eacute;vente t&ouml;bbsz&ouml;r, minden k&ouml;vetkezm&eacute;ny n&eacute;lk&uuml;l &aacute;teshet&uuml;nk &eacute;s nem sz&uuml;ks&eacute;gszerű, hogy orvos megvizsg&aacute;ljon) egy ak&aacute;r &eacute;letvesz&eacute;lyes k&ouml;vetkezm&eacute;nnyel j&aacute;r&oacute; betegs&eacute;gtől. A mi szemsz&ouml;g&uuml;nkből a kettő k&ouml;z&ouml;tt egy l&eacute;nyeges k&uuml;l&ouml;nbs&eacute;g van: az ut&oacute;bbi esetben mielőbb menj&uuml;nk el az orvoshoz. Ha ezt nem tessz&uuml;k meg k&eacute;sőbb erős f&aacute;jdalmaink &eacute;s / vagy magas l&aacute;zunk lesz &eacute;s &eacute;letben marad&aacute;si es&eacute;ly&uuml;nk cs&ouml;kken. Ha orvoshoz megy&uuml;nk memoriz&aacute;ljuk vagy &iacute;rjuk fel a l&eacute;nyeges t&uuml;neteket &eacute;s <strong>pr&oacute;b&aacute;ljuk meg mindet &eacute;s l&eacute;nyegret&ouml;rően elmondani</strong>.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g fontos eleme az alv&aacute;s, ha ezzel probl&eacute;ma van f&aacute;rad&eacute;konyabbak lesz&uuml;nk, cs&ouml;kken a munkahelyi &eacute;s otthoni teljes&iacute;tm&eacute;ny&uuml;nk, romlik az &eacute;letminős&eacute;g&uuml;nk. Ez&eacute;rt ezt a probl&eacute;m&aacute;t ki kell vizsg&aacute;ltatni. Gyakori ok lehet a horkol&aacute;s, amely s&uacute;lyos estben a k&ouml;zelben alv&oacute;k alv&aacute;s&aacute;t nehez&iacute;ti &eacute;s a horkol&oacute; v&eacute;rnyom&aacute;s&aacute;t időszakosan k&aacute;ros m&eacute;rt&eacute;kben megemeli. <strong>Magunk &eacute;s hozz&aacute;nk tartoz&oacute;ik &eacute;rdek&eacute;ben a horkol&oacute;k </strong>k&eacute;rjenek beutal&oacute;t az alv&aacute;scenrtumba &eacute;s vizsg&aacute;ltass&aacute;k ki magukat: <a href="http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html">http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Volt szerencs&eacute;m megismerkedni a l&aacute;gy&eacute;ks&eacute;rvvel is (alhasi f&aacute;jdalom, esetleg kitapinthat&oacute; dudor), amellyel norm&aacute;l esetben nem t&uacute;l f&aacute;jdalmas &eacute;s a műt&eacute;t is rutinnak sz&aacute;m&iacute;t, ha időben orvoshoz megy&uuml;nk!</p>\r\n	</li>\r\n	<li>\r\n	<p>A gerincprobl&eacute;m&aacute;k szint&eacute;n sokat &eacute;rinthetnek, lumb&aacute;g&oacute; &ouml;r&ouml;meit m&aacute;r a huszon&eacute;vesek is &eacute;lvezhetik. Ez orvosi szempontb&oacute;l egy j&oacute; betegs&eacute;g, hiszen aki igaz&aacute;n elkapja, az a f&aacute;jdalmai miatt igen nagy val&oacute;sz&iacute;nűs&eacute;ggel orvoshoz fog fordulni. Tal&aacute;n kev&eacute;sb&eacute; ismert, hogy nem sz&uuml;ks&eacute;gszerű a visszaes&eacute;s, mert rendszeres gy&oacute;gytorn&aacute;val &eacute;s kellő k&ouml;r&uuml;ltekint&eacute;ssel (az &eacute;rz&eacute;keny ter&uuml;let hidegtől &eacute;s huzatt&oacute;l val&oacute; v&eacute;d&eacute;ssel, a rossz &eacute;s hirtelen mozdulatok ker&uuml;l&eacute;s&eacute;vel) a visszat&eacute;r&eacute;s val&oacute;sz&iacute;nűs&eacute;ge jelentősen cs&ouml;kkenthető.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban az idősebbek &eacute;let&eacute;t keser&iacute;tik meg a gerincs&eacute;rv &eacute;s a meszesed&eacute;s. Mindkettőre j&oacute; hat&aacute;ssal lehet a gy&oacute;gytorn&aacute;sz &aacute;ltal megtan&iacute;tott gy&oacute;gytorna, amelyet ezut&aacute;n c&eacute;lszerű heti t&ouml;bb alkalommal otthon, &eacute;let&uuml;nk v&eacute;g&eacute;ig elv&eacute;gezni. Gerinc s&eacute;rv eset&eacute;ben nem csak a kock&aacute;zatos műt&eacute;tet ker&uuml;lhetj&uuml;k el, hanem es&eacute;ly&uuml;nk lehet a f&aacute;jdalom mentes vagy csak időszakosan enyhe vagy elviselhető f&aacute;jdalommal b&iacute;r&oacute; &eacute;letre.</p>\r\n	</li>\r\n	<li>\r\n	<p>Sokakat &eacute;rinthet a reflux (gyomorsav t&uacute;ltermel&eacute;s, nyelőcső kimar&oacute;d&aacute;s &eacute;s gyullad&aacute;s), amely tart&oacute;s rossz k&ouml;z&eacute;rzethez vezet &eacute;s v&aacute;ltoz&oacute; t&uuml;netekkel j&aacute;rhat. &Eacute;n magam f&eacute;l&eacute;vig &eacute;lveztem t&aacute;rsas&aacute;g&aacute;t &eacute;s b&aacute;r t&ouml;bb gy&oacute;gyint&eacute;zm&eacute;nyben t&ouml;bb orvosnak panaszkodtam, de nem ker&uuml;lt behat&aacute;rol&aacute;sra az ok. V&eacute;g&uuml;l taktik&aacute;t v&aacute;ltoztattam &eacute;s panaszkod&aacute;s helyett ezt k&eacute;rdeztem: Mondja doktor &uacute;r norm&aacute;lis az, hogy f&eacute;l&eacute;ve rossz a k&ouml;z&eacute;rzetem? A nemleges v&aacute;lasz ut&aacute;n r&eacute;szletesen kik&eacute;rdezett &eacute;s ut&aacute;na fel&iacute;rt egy gy&oacute;gyszert, amely hat&aacute;s&aacute;ra harmadnapra elm&uacute;ltak a panaszaim. Tanuls&aacute;g: panaszkod&oacute; t&uuml;netfelsorol&aacute;s helyett <strong>egy j&oacute;l megfogalmazott k&eacute;rd&eacute;s n&eacute;ha c&eacute;lravezetőbb lehet.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>M&aacute;r csak egy &aacute;ltalam kipr&oacute;b&aacute;lt n&eacute;pbetegs&eacute;g maradt h&aacute;tra: a stroke. Nekem az agyi infarktusos v&aacute;ltozat (agyl&aacute;gyul&aacute;s) jutott oszt&aacute;lyr&eacute;sz&uuml;l. Ez egy nagy falat, ennek r&eacute;szletez&eacute;s&eacute;t szakemberekre hagyom, aki a saj&aacute;t esetemre k&iacute;v&aacute;ncsi itt elolvashatja: <a href="http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23">http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Boldog nyugd&iacute;jask&eacute;nt hetente t&ouml;bb alkalommal cs&aacute;b&iacute;tanak ingyenes eg&eacute;szs&eacute;gfelm&eacute;r&eacute;snek &aacute;lc&aacute;zott term&eacute;kbemutat&oacute;kra. N&eacute;h&aacute;nyra elmentem &eacute;s az interneten is ut&aacute;nan&eacute;ztem a t&eacute;m&aacute;nak ezek ut&aacute;n <strong>az &aacute;ltal&aacute;nos jellemzők az al&aacute;bbiak:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Minimum m&aacute;sf&eacute;l &oacute;r&aacute;s &ndash;<strong> k&ouml;telezően v&eacute;gighallgatand&oacute;</strong> - v&aacute;ltoz&oacute; sz&iacute;nvonal&uacute; &eacute;s erősen h&eacute;zagos igazs&aacute;gtartalm&uacute; előad&aacute;s, amelyben <strong>t&ouml;bbsz&ouml;r megk&eacute;rdőjelezik a modern gy&oacute;gyszerek sz&uuml;ks&eacute;gess&eacute;g&eacute;t</strong>, szidj&aacute;k a kapzsi gy&oacute;gyszergy&aacute;rt&oacute;kat &eacute;s ezzel tulajdonk&eacute;ppen<strong> azok fel&iacute;r&oacute;it is negat&iacute;van &iacute;t&eacute;lik meg.</strong> L&eacute;nyeg az &aacute;ltaluk bemutatott az eg&eacute;szs&eacute;ges &eacute;lethez - szerint&uuml;k n&eacute;lk&uuml;l&ouml;zhetetlen - csodaterm&eacute;kek (v&aacute;ltozatos sk&aacute;la: v&iacute;zszűrő, csodaturmixg&eacute;p, csodaporsz&iacute;v&oacute;, amelyik m&eacute;g az atk&aacute;kkal is elb&aacute;nik, gőz&aacute;gy&uacute;, m&aacute;gneses massz&iacute;roz&oacute; szuper-&aacute;gy, stb.).</p>\r\n	</li>\r\n	<li>\r\n	<p>A be&iacute;g&eacute;rt ingyenes vizsg&aacute;lat (hőkamer&aacute;s felv&eacute;tel, k&eacute;tb&uuml;tyk&ouml;s magnetorezonanci&aacute;s &aacute;lműszer, stb. eredm&eacute;nye haszn&aacute;lhatatlan, &eacute;s/vagy ellenőrizhetetlen m&oacute;don sz&aacute;m&iacute;t&oacute;g&eacute;p adja az eredm&eacute;nyt, amely semmit mond&oacute; &eacute;s a val&oacute;s&aacute;ghoz semmi k&ouml;ze.</p>\r\n	</li>\r\n	<li>\r\n	<p>A cs&uacute;cspont a &bdquo;k&ouml;zpontb&oacute;l&rdquo; j&ouml;vő l&aacute;tv&aacute;nyosan felbontott extra &aacute;r kedvezm&eacute;nyek, amelyeket gyakran gyomorforgat&oacute; m&oacute;don kisorsolnak vagy jobb esetben majdnem mindenki megkap. A l&eacute;nyeg: a kedvezm&eacute;nyes &aacute;ron &aacute;rult k&eacute;sz&uuml;l&eacute;khez a bolti &aacute;r kb. t&iacute;zszeres&eacute;&eacute;rt juthatunk hozz&aacute;, de ez cs&uacute;csminős&eacute;g, ezzel szemben azonnal kell d&ouml;nteni &eacute;s d&ouml;nt&eacute;s&uuml;nket k&eacute;sőbb nem lesz m&oacute;dunk visszavonni!!! <strong>Rem&eacute;lem &ouml;sszefoglal&oacute;m kellőn elrettentő &eacute;s sokakat megk&iacute;m&eacute;lek a felesleges bosszankod&aacute;st&oacute;l.</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<ol start="15">\r\n	<li>\r\n	<p><strong>V&eacute;gezet&uuml;l az &ouml;sszegzett j&oacute; tan&aacute;csok:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Pr&oacute;b&aacute;lj megb&iacute;zni a kezelőorvosodban, (ez azt is jelenti, hogy az igazat mondom, &eacute;s a mulaszt&aacute;somat sem hallgatom el!)</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban <strong>haszn&aacute;l, ha a gy&oacute;gyszereket (az &ouml;sszeset!) &eacute; az elő&iacute;r&aacute;snak megfelelően beszedi az ember.</strong><img alt="smiley" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="smiley" /></p>\r\n	</li>\r\n	<li>\r\n	<p>Kr&oacute;nikus betegs&eacute;gek eset&eacute;n &eacute;s idős korban n&ouml;vekszik a beszedendő gy&oacute;gyszerek sz&aacute;ma, &iacute;gy egyre nagyobb odafigyel&eacute;st k&ouml;vetel az elő&iacute;r&aacute;sok betart&aacute;sa.</p>\r\n	</li>\r\n	<li>\r\n	<p>Egyes betegs&eacute;gek &eacute;letm&oacute;dv&aacute;lt&aacute;st k&ouml;vetelnek: di&eacute;t&aacute;t, rendszeres &eacute;s behat&aacute;rolt mozg&aacute;st, gy&oacute;gytorn&aacute;t. Ha ezeket elhanyagoljuk &eacute;letes&eacute;ly&uuml;nket / &eacute;letminős&eacute;g&uuml;nket cs&ouml;kkentj&uuml;k, esetleg m&aacute;sokra elker&uuml;lhető terheket rakunk.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Budapest, 2014.01.17. id. Darvas G&aacute;bor (legal&aacute;bb 60 &eacute;ve gyakorl&oacute; beteg)</p>\r\n\r\n<ol start="14">\r\n</ol>\r\n', 0, 1, '', '', 4, 'háziorvos', '2014-04-28 19:47:41'),
(32, 'bemutatkozas', 'Bemutatkozás', 'Dr. Szászi Andrea , háziorvos,életrajz', '<p><img alt="" src="/ho/images/abris2.JPG" style="float:left; margin:5px 10px; width:100px" />Saj&aacute;t f&eacute;nyk&eacute;p</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nsz&uuml;let&eacute;si &eacute;v, hely<br />\r\nSpeci&aacute;lis tanulm&aacute;nyok<br />\r\nMi&eacute;rt lettem h&aacute;ziorvos<br />\r\nCsal&aacute;d<br />\r\nHobbi</p>\r\n', 0, 0, '0', '', 4, 'háziorvos', '2014-04-28 19:47:41'),
(33, 'rendido', 'Általános tudnivalók:', 'rendelés, ismertető, rendelési információk', '<h3>Kedves Betegeink!</h3>\r\n\r\n<ul>\r\n	<li><span style="color:#000000"><span style="font-size:16px">Az &eacute;rv&eacute;nyben l&eacute;vő korm&aacute;nyrendelet &eacute;rtelm&eacute;ben lehetős&eacute;g&uuml;k van a telefonon val&oacute; bejelentkez&eacute;sre, amit a rendel&eacute;si időben tehetnek meg.</span></span></li>\r\n	<li><span style="color:#000000"><span style="font-size:16px">A rendel&eacute;si idő utols&oacute; 1 &oacute;r&aacute;ja az előjegyzett betegeknek van fenntartva.</span></span></li>\r\n	<li><span style="color:#000000"><span style="font-size:16px">Febru&aacute;r h&oacute;napt&oacute;l a h&iacute;v&aacute;sokat a d&eacute;lut&aacute;nos rendel&eacute;sek napjain a 253-03-41-es telefonsz&aacute;mon adhatj&aacute;k le d&eacute;lelőtt 10 &oacute;r&aacute;ig.</span></span></li>\r\n	<li><span style="color:#000000"><span style="font-size:16px">Saj&aacute;t telefonsz&aacute;mom nem v&aacute;ltozott: 258-51-84.</span></span></li>\r\n</ul>\r\n\r\n<p><span style="color:#000000"><span style="font-size:16px">Meg&eacute;rt&eacute;s&uuml;ket megk&ouml;sz&ouml;nve</span></span></p>\r\n\r\n<p><span style="color:#000000"><span style="font-size:16px">Dr. Sz&aacute;szi Andrea h&aacute;ziorvos</span></span></p>\r\n', 0, 1, '', '<span class="red">Figyelem, a rekord name mező tartalmának <b>[rendido]</b> megváltoztatása a rendelési idő oldal hibáját eredményezheti!!!</span>', 4, 'háziorvos', '2014-04-28 19:47:41'),
(34, 'home', 'Dr. Miklós Márta  háziorvos honlapja', 'háziorvos, körzeti orvos, orvosi rendelő', '<p>&Uuml;dv&ouml;zl&ouml;m!<br />\r\nDr. Mikl&oacute;s M&aacute;rta h&aacute;ziorvos vagyok, honlapommal az &Ouml;n&ouml;k kapcsolattart&aacute;s&aacute;t szeretn&eacute;m moderniz&aacute;lni, időben kiterjeszteni.</p>\r\n\r\n<p>A rendel&eacute;si időt ide kattintva n&eacute;zhetik meg: <a href="/2/rendelesiido/rendelesiido">/2/rendelesiido/rendelesiido</a></p>\r\n\r\n<p>A k&ouml;rzethat&aacute;rokat itt ellenőrizhetik: <a href="/2/korzet/index">/2/korzet/index</a></p>\r\n\r\n<p>&Uuml;gyeleti inform&aacute;ci&oacute;kat &eacute;s egy&eacute;b t&aacute;j&eacute;koztat&aacute;sokat itt olvashat: <a href="/2/felvilagosit/index">/2/felvilagosit/index</a></p>\r\n\r\n<p>A rendelő oldal&aacute;t itt tekintheti meg: <a href="/2/rendelo/index">/2/rendelo/index</a></p>\r\n', 0, 1, '1', '', 2, 'háziorvos', '2014-04-28 19:47:41'),
(35, 'rendelesiido/rendelesiido', 'Rendelési idő', 'rendelési idő, rendelesi ido, opening', '<p><strong><span style="color:#FF0000">Figyelem, ennek a sornak (rekordnak) a tartalm&aacute;t tilos megv&aacute;ltoztatni!!</span></strong></p>\r\n', 0, 0, '1', NULL, 2, 'háziorvos', '2014-04-28 19:47:41'),
(36, 'beteghirado', 'Egy 60 éve gyakorló beteg tapasztalatai', 'Jótanácsok saját  tapasztalatok alapján', '<p><strong>Tisztelt Eg&eacute;szs&eacute;ges &eacute;s Beteg T&aacute;rsaim!</strong></p>\r\n\r\n<p>Az al&aacute;bbiakban eg&eacute;szs&eacute;ggel &eacute;s a saj&aacute;t betegs&eacute;geimmel kapcsolatos tapasztalataimat szeretn&eacute;m megosztani 15 pontban.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Előbb vagy ut&oacute;bb, de tudom&aacute;sul kell venn&uuml;nk, hogy <strong>mindny&aacute;jan egy &eacute;let nevű hal&aacute;los betegs&eacute;gben szenved&uuml;nk! <img alt="smiley" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="smiley" /> <img alt="sad" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/sad_smile.gif" style="height:20px; width:20px" title="sad" /></strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Nem csak az &eacute;let&uuml;nk egyedi, megism&eacute;telhetetlen &eacute;s &ndash; az estleges neh&eacute;zs&eacute;ge vagy kil&aacute;t&aacute;stalans&aacute;ga ellen&eacute;re &ndash; <strong>igen &eacute;rt&eacute;kes, hanem a testi &eacute;s lelki eg&eacute;szs&eacute;g&uuml;nk is az,</strong> ez&eacute;rt c&eacute;lszerű d&ouml;nt&eacute;seinkn&eacute;l a hossz&uacute; t&aacute;v&uacute; eg&eacute;szs&eacute;gi kock&aacute;zatokat figyelembe venni &eacute;s eg&eacute;szs&eacute;g&uuml;nkre vigy&aacute;zni.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g szem&eacute;lyre szabott &eacute;s <strong>magunkhoz viszony&iacute;tva is relat&iacute;v!</strong> (Egy k&eacute;z vagy l&aacute;b n&eacute;lk&uuml;li ember &ndash; ha nem beteg &eacute;s megtal&aacute;lja az &eacute;letc&eacute;lj&aacute;t &eacute;s emberi kapcsolatait - <strong>b&aacute;r nehezebb k&ouml;r&uuml;lm&eacute;nyek k&ouml;z&ouml;tt &eacute;l, de az&eacute;rt eg&eacute;szs&eacute;ges!</strong> l&aacute;sda k&ouml;vetkező vide&oacute;t:&nbsp;<a href="http://www.youtube.com/watch?v=WmMenUD0pf8">http://www.youtube.com/watch?v=WmMenUD0pf8</a> )</p>\r\n	</li>\r\n	<li>\r\n	<p>Gyakran nem tudatosul benn&uuml;nk, hogy a felnőtt ember eg&eacute;szs&eacute;ges &eacute;letm&oacute;dja napi &aacute;tlagosan m&aacute;sf&eacute;l &oacute;ra intenz&iacute;v gyalogl&aacute;st vagy ezzel egyen&eacute;rt&eacute;kű mozg&aacute;smennyis&eacute;get ig&eacute;nyel. Term&eacute;szetesen ettől el lehet t&eacute;rni, <strong>de a mozg&aacute;shi&aacute;ny hossz&uacute;t&aacute;von eg&eacute;szs&eacute;g&uuml;nk rov&aacute;s&aacute;ra megy.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Fiatal korban nem el&eacute;g a k&aacute;ros szenved&eacute;lyektől (doh&aacute;nyz&aacute;s, alkohol, drog, j&aacute;t&eacute;kszenved&eacute;ly, sex) tart&oacute;zkodni, hanem<strong> hasznos szenved&eacute;lyek m&eacute;rt&eacute;kletes rendszeress&eacute;g&eacute;re (sport, kir&aacute;ndul&aacute;s, zene, stb. hobbi) kell t&ouml;rekedni.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Ismerni &eacute;s figyelni kell &ouml;nmagunkat (mindig tudjuk, hogy mikor ett&uuml;nk &eacute;s ittunk utolj&aacute;ra, mitől lesz szorul&aacute;sunk vagy hasmen&eacute;s&uuml;nk, stb.)</p>\r\n	</li>\r\n	<li>\r\n	<p>Ha t&ouml;bb&eacute;-kev&eacute;sb&eacute; ismerj&uuml;k magunkat, akkor nagyobb es&eacute;llyel tudjuk megk&uuml;l&ouml;nb&ouml;ztetni egy &aacute;tlagos h&aacute;ny&aacute;s, hasmen&eacute;ses betegs&eacute;get (amelyen ak&aacute;r &eacute;vente t&ouml;bbsz&ouml;r, minden k&ouml;vetkezm&eacute;ny n&eacute;lk&uuml;l &aacute;teshet&uuml;nk &eacute;s nem sz&uuml;ks&eacute;gszerű, hogy orvos megvizsg&aacute;ljon) egy ak&aacute;r &eacute;letvesz&eacute;lyes k&ouml;vetkezm&eacute;nnyel j&aacute;r&oacute; betegs&eacute;gtől. A mi szemsz&ouml;g&uuml;nkből a kettő k&ouml;z&ouml;tt egy l&eacute;nyeges k&uuml;l&ouml;nbs&eacute;g van: az ut&oacute;bbi esetben mielőbb menj&uuml;nk el az orvoshoz. Ha ezt nem tessz&uuml;k meg k&eacute;sőbb erős f&aacute;jdalmaink &eacute;s / vagy magas l&aacute;zunk lesz &eacute;s &eacute;letben marad&aacute;si es&eacute;ly&uuml;nk cs&ouml;kken. Ha orvoshoz megy&uuml;nk memoriz&aacute;ljuk vagy &iacute;rjuk fel a l&eacute;nyeges t&uuml;neteket &eacute;s <strong>pr&oacute;b&aacute;ljuk meg mindet &eacute;s l&eacute;nyegret&ouml;rően elmondani</strong>.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g fontos eleme az alv&aacute;s, ha ezzel probl&eacute;ma van f&aacute;rad&eacute;konyabbak lesz&uuml;nk, cs&ouml;kken a munkahelyi &eacute;s otthoni teljes&iacute;tm&eacute;ny&uuml;nk, romlik az &eacute;letminős&eacute;g&uuml;nk. Ez&eacute;rt ezt a probl&eacute;m&aacute;t ki kell vizsg&aacute;ltatni. Gyakori ok lehet a horkol&aacute;s, amely s&uacute;lyos estben a k&ouml;zelben alv&oacute;k alv&aacute;s&aacute;t nehez&iacute;ti &eacute;s a horkol&oacute; v&eacute;rnyom&aacute;s&aacute;t időszakosan k&aacute;ros m&eacute;rt&eacute;kben megemeli. <strong>Magunk &eacute;s hozz&aacute;nk tartoz&oacute;ik &eacute;rdek&eacute;ben a horkol&oacute;k </strong>k&eacute;rjenek beutal&oacute;t az alv&aacute;scenrtumba &eacute;s vizsg&aacute;ltass&aacute;k ki magukat: <a href="http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html">http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Volt szerencs&eacute;m megismerkedni a l&aacute;gy&eacute;ks&eacute;rvvel is (alhasi f&aacute;jdalom, esetleg kitapinthat&oacute; dudor), amellyel norm&aacute;l esetben nem t&uacute;l f&aacute;jdalmas &eacute;s a műt&eacute;t is rutinnak sz&aacute;m&iacute;t, ha időben orvoshoz megy&uuml;nk!</p>\r\n	</li>\r\n	<li>\r\n	<p>A gerincprobl&eacute;m&aacute;k szint&eacute;n sokat &eacute;rinthetnek, lumb&aacute;g&oacute; &ouml;r&ouml;meit m&aacute;r a huszon&eacute;vesek is &eacute;lvezhetik. Ez orvosi szempontb&oacute;l egy j&oacute; betegs&eacute;g, hiszen aki igaz&aacute;n elkapja, az a f&aacute;jdalmai miatt igen nagy val&oacute;sz&iacute;nűs&eacute;ggel orvoshoz fog fordulni. Tal&aacute;n kev&eacute;sb&eacute; ismert, hogy nem sz&uuml;ks&eacute;gszerű a visszaes&eacute;s, mert rendszeres gy&oacute;gytorn&aacute;val &eacute;s kellő k&ouml;r&uuml;ltekint&eacute;ssel (az &eacute;rz&eacute;keny ter&uuml;let hidegtől &eacute;s huzatt&oacute;l val&oacute; v&eacute;d&eacute;ssel, a rossz &eacute;s hirtelen mozdulatok ker&uuml;l&eacute;s&eacute;vel) a visszat&eacute;r&eacute;s val&oacute;sz&iacute;nűs&eacute;ge jelentősen cs&ouml;kkenthető.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban az idősebbek &eacute;let&eacute;t keser&iacute;tik meg a gerincs&eacute;rv &eacute;s a meszesed&eacute;s. Mindkettőre j&oacute; hat&aacute;ssal lehet a gy&oacute;gytorn&aacute;sz &aacute;ltal megtan&iacute;tott gy&oacute;gytorna, amelyet ezut&aacute;n c&eacute;lszerű heti t&ouml;bb alkalommal otthon, &eacute;let&uuml;nk v&eacute;g&eacute;ig elv&eacute;gezni. Gerinc s&eacute;rv eset&eacute;ben nem csak a kock&aacute;zatos műt&eacute;tet ker&uuml;lhetj&uuml;k el, hanem es&eacute;ly&uuml;nk lehet a f&aacute;jdalom mentes vagy csak időszakosan enyhe vagy elviselhető f&aacute;jdalommal b&iacute;r&oacute; &eacute;letre.</p>\r\n	</li>\r\n	<li>\r\n	<p>Sokakat &eacute;rinthet a reflux (gyomorsav t&uacute;ltermel&eacute;s, nyelőcső kimar&oacute;d&aacute;s &eacute;s gyullad&aacute;s), amely tart&oacute;s rossz k&ouml;z&eacute;rzethez vezet &eacute;s v&aacute;ltoz&oacute; t&uuml;netekkel j&aacute;rhat. &Eacute;n magam f&eacute;l&eacute;vig &eacute;lveztem t&aacute;rsas&aacute;g&aacute;t &eacute;s b&aacute;r t&ouml;bb gy&oacute;gyint&eacute;zm&eacute;nyben t&ouml;bb orvosnak panaszkodtam, de nem ker&uuml;lt behat&aacute;rol&aacute;sra az ok. V&eacute;g&uuml;l taktik&aacute;t v&aacute;ltoztattam &eacute;s panaszkod&aacute;s helyett ezt k&eacute;rdeztem: Mondja doktor &uacute;r norm&aacute;lis az, hogy f&eacute;l&eacute;ve rossz a k&ouml;z&eacute;rzetem? A nemleges v&aacute;lasz ut&aacute;n r&eacute;szletesen kik&eacute;rdezett &eacute;s ut&aacute;na fel&iacute;rt egy gy&oacute;gyszert, amely hat&aacute;s&aacute;ra harmadnapra elm&uacute;ltak a panaszaim. Tanuls&aacute;g: panaszkod&oacute; t&uuml;netfelsorol&aacute;s helyett <strong>egy j&oacute;l megfogalmazott k&eacute;rd&eacute;s n&eacute;ha c&eacute;lravezetőbb lehet.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>M&aacute;r csak egy &aacute;ltalam kipr&oacute;b&aacute;lt n&eacute;pbetegs&eacute;g maradt h&aacute;tra: a stroke. Nekem az agyi infarktusos v&aacute;ltozat (agyl&aacute;gyul&aacute;s) jutott oszt&aacute;lyr&eacute;sz&uuml;l. Ez egy nagy falat, ennek r&eacute;szletez&eacute;s&eacute;t szakemberekre hagyom, aki a saj&aacute;t esetemre k&iacute;v&aacute;ncsi itt elolvashatja: <a href="http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23">http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Boldog nyugd&iacute;jask&eacute;nt hetente t&ouml;bb alkalommal cs&aacute;b&iacute;tanak ingyenes eg&eacute;szs&eacute;gfelm&eacute;r&eacute;snek &aacute;lc&aacute;zott term&eacute;kbemutat&oacute;kra. N&eacute;h&aacute;nyra elmentem &eacute;s az interneten is ut&aacute;nan&eacute;ztem a t&eacute;m&aacute;nak ezek ut&aacute;n <strong>az &aacute;ltal&aacute;nos jellemzők az al&aacute;bbiak:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Minimum m&aacute;sf&eacute;l &oacute;r&aacute;s &ndash;<strong> k&ouml;telezően v&eacute;gighallgatand&oacute;</strong> - v&aacute;ltoz&oacute; sz&iacute;nvonal&uacute; &eacute;s erősen h&eacute;zagos igazs&aacute;gtartalm&uacute; előad&aacute;s, amelyben <strong>t&ouml;bbsz&ouml;r megk&eacute;rdőjelezik a modern gy&oacute;gyszerek sz&uuml;ks&eacute;gess&eacute;g&eacute;t</strong>, szidj&aacute;k a kapzsi gy&oacute;gyszergy&aacute;rt&oacute;kat &eacute;s ezzel tulajdonk&eacute;ppen<strong> azok fel&iacute;r&oacute;it is negat&iacute;van &iacute;t&eacute;lik meg.</strong> L&eacute;nyeg az &aacute;ltaluk bemutatott az eg&eacute;szs&eacute;ges &eacute;lethez - szerint&uuml;k n&eacute;lk&uuml;l&ouml;zhetetlen - csodaterm&eacute;kek (v&aacute;ltozatos sk&aacute;la: v&iacute;zszűrő, csodaturmixg&eacute;p, csodaporsz&iacute;v&oacute;, amelyik m&eacute;g az atk&aacute;kkal is elb&aacute;nik, gőz&aacute;gy&uacute;, m&aacute;gneses massz&iacute;roz&oacute; szuper-&aacute;gy, stb.).</p>\r\n	</li>\r\n	<li>\r\n	<p>A be&iacute;g&eacute;rt ingyenes vizsg&aacute;lat (hőkamer&aacute;s felv&eacute;tel, k&eacute;tb&uuml;tyk&ouml;s magnetorezonanci&aacute;s &aacute;lműszer, stb. eredm&eacute;nye haszn&aacute;lhatatlan, &eacute;s/vagy ellenőrizhetetlen m&oacute;don sz&aacute;m&iacute;t&oacute;g&eacute;p adja az eredm&eacute;nyt, amely semmit mond&oacute; &eacute;s a val&oacute;s&aacute;ghoz semmi k&ouml;ze.</p>\r\n	</li>\r\n	<li>\r\n	<p>A cs&uacute;cspont a &bdquo;k&ouml;zpontb&oacute;l&rdquo; j&ouml;vő l&aacute;tv&aacute;nyosan felbontott extra &aacute;r kedvezm&eacute;nyek, amelyeket gyakran gyomorforgat&oacute; m&oacute;don kisorsolnak vagy jobb esetben majdnem mindenki megkap. A l&eacute;nyeg: a kedvezm&eacute;nyes &aacute;ron &aacute;rult k&eacute;sz&uuml;l&eacute;khez a bolti &aacute;r kb. t&iacute;zszeres&eacute;&eacute;rt juthatunk hozz&aacute;, de ez cs&uacute;csminős&eacute;g, ezzel szemben azonnal kell d&ouml;nteni &eacute;s d&ouml;nt&eacute;s&uuml;nket k&eacute;sőbb nem lesz m&oacute;dunk visszavonni!!! <strong>Rem&eacute;lem &ouml;sszefoglal&oacute;m kellőn elrettentő &eacute;s sokakat megk&iacute;m&eacute;lek a felesleges bosszankod&aacute;st&oacute;l.</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<ol start="15">\r\n	<li>\r\n	<p><strong>V&eacute;gezet&uuml;l az &ouml;sszegzett j&oacute; tan&aacute;csok:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Pr&oacute;b&aacute;lj megb&iacute;zni a kezelőorvosodban, (ez azt is jelenti, hogy az igazat mondom, &eacute;s a mulaszt&aacute;somat sem hallgatom el!)</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban <strong>haszn&aacute;l, ha a gy&oacute;gyszereket (az &ouml;sszeset!) &eacute; az elő&iacute;r&aacute;snak megfelelően beszedi az ember.</strong><img alt="smiley" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="smiley" /></p>\r\n	</li>\r\n	<li>\r\n	<p>Kr&oacute;nikus betegs&eacute;gek eset&eacute;n &eacute;s idős korban n&ouml;vekszik a beszedendő gy&oacute;gyszerek sz&aacute;ma, &iacute;gy egyre nagyobb odafigyel&eacute;st k&ouml;vetel az elő&iacute;r&aacute;sok betart&aacute;sa.</p>\r\n	</li>\r\n	<li>\r\n	<p>Egyes betegs&eacute;gek &eacute;letm&oacute;dv&aacute;lt&aacute;st k&ouml;vetelnek: di&eacute;t&aacute;t, rendszeres &eacute;s behat&aacute;rolt mozg&aacute;st, gy&oacute;gytorn&aacute;t. Ha ezeket elhanyagoljuk &eacute;letes&eacute;ly&uuml;nket / &eacute;letminős&eacute;g&uuml;nket cs&ouml;kkentj&uuml;k, esetleg m&aacute;sokra elker&uuml;lhető terheket rakunk.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Budapest, 2014.01.17. id. Darvas G&aacute;bor (legal&aacute;bb 60 &eacute;ve gyakorl&oacute; beteg)</p>\r\n\r\n<ol start="14">\r\n</ol>\r\n', 0, 1, '', '', 2, 'háziorvos', '2014-04-28 19:47:41'),
(37, 'bemutatkozas', 'Bemutatkozás', 'Dr. Miklós Márta , háziorvos,életrajz', '<p><img alt="" src="/ho/images/abris2.JPG" style="float:left; margin:5px 10px; width:100px" />Saj&aacute;t f&eacute;nyk&eacute;p</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nsz&uuml;let&eacute;si &eacute;v, hely<br />\r\nSpeci&aacute;lis tanulm&aacute;nyok<br />\r\nMi&eacute;rt lettem h&aacute;ziorvos<br />\r\nCsal&aacute;d<br />\r\nHobbi</p>\r\n', 0, 0, '0', '', 2, 'háziorvos', '2014-04-28 19:47:41'),
(38, 'rendido', 'Általános tudnivalók:', 'rendelés, ismertető, rendelési információk', '<ul>\r\n	<li>Csak recept vagy beutal&oacute; k&eacute;r&eacute;se eset&eacute;n k&eacute;rem, hogy a nőv&eacute;rn&eacute;l &aacute;lljanak sorba, ahol<strong> sorsz&aacute;m n&eacute;lk&uuml;l &eacute;s gyorsabban </strong>t&ouml;rt&eacute;nik a k&eacute;r&eacute;sek teljes&iacute;t&eacute;se!</li>\r\n	<li>Az orvos - rendk&iacute;v&uuml;li esetek kiv&eacute;tel&eacute;vel - az &eacute;rkez&eacute;skor h&uacute;zott sorsz&aacute;m alapj&aacute;n fogadja a p&aacute;cienseket,</li>\r\n	<li>20 darab sorsz&aacute;mozott k&aacute;rtya h&uacute;zhat&oacute;, ennek elfogy&aacute;sa eset&eacute;n tov&aacute;bbi p&aacute;cienseket nem tudok fogadni,</li>\r\n	<li>A rendel&eacute;si idő utols&oacute; &oacute;r&aacute;ja az - előzetesen időpontot foglalt betegek sz&aacute;m&aacute;ra van fenntartva.</li>\r\n	<li>Az alapos vizsg&aacute;lat &eacute;rdek&eacute;ben &oacute;r&aacute;nk&eacute;nt &aacute;tlagosan 4 - 7 beteget tudok vizsg&aacute;lni.</li>\r\n	<li>Sajnos az egyes vizsg&aacute;lati idő - az igen elt&eacute;rő vizsg&aacute;latok &eacute;s a v&aacute;ratlanul befut&oacute; telefonh&iacute;v&aacute;sok miatt - <strong>igen v&aacute;ltoz&oacute; lehet, ez&eacute;rt a kedves p&aacute;cienseim sz&iacute;ves t&uuml;relm&eacute;t k&eacute;rem!</strong></li>\r\n	<li>Nem sűrgős esetekben mindenkinek javaslom -<strong> a r&ouml;videbb v&aacute;rakoz&aacute;si idő miatt - a telefonon vagy az interneten t&ouml;rt&eacute;nő időpont foglal&aacute;st!</strong></li>\r\n</ul>\r\n\r\n<p>&Uuml;dv&ouml;zlettel</p>\r\n\r\n<p>Dr. Mikl&oacute;s M&aacute;rta h&aacute;ziorvos</p>\r\n', 0, 1, '', '<span class="red">Figyelem, a rekord name mező tartalmának <b>[rendido]</b> megváltoztatása a rendelési idő oldal hibáját eredményezheti!!!</span>', 2, 'háziorvos', '2014-04-28 19:47:41'),
(39, 'peceli_ut', '1171 Péceli út 190. I. emelet', 'Háziorvosi rendelő, háziorvosok, körzet', '<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:900px">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt="Rendelő kívülről" src="/images/1/IMG_8018.JPG" style="height:193px; width:290px" /></td>\r\n			<td><img alt="Váró tér" src="/images/1/IMG_8006.JPG" style="height:193px; width:290px" /></td>\r\n			<td><img alt="Rendelő a Péceli út túloldalártól" src="/images/1/IMG_8019.JPG" style="height:193px; width:290px" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Rendelőnk a Csabavez&eacute;r t&eacute;r k&ouml;zvetlen&nbsp; k&ouml;zel&eacute;ben van, mellette &eacute;s m&ouml;g&ouml;tte parkol&oacute; helyek tal&aacute;lhat&oacute;k.</p>\r\n\r\n<p>A k&ouml;rny&eacute;k betegeit&nbsp; <a href="/2/home">Dr Mikl&oacute;s M&aacute;rta,</a>&nbsp; <a href="/3/home">Dr. Szak&aacute;cs Andrea,</a>&nbsp; <a href="/4/home">Dr. Sz&aacute;szi Andrea</a> &eacute;s <a href="/1/home">Dr. Szeiffert G&aacute;bor&nbsp;</a> h&aacute;ziorvosok l&aacute;tj&aacute;k el.</p>\r\n\r\n<p>A legk&ouml;zelebbi gy&oacute;gyszert&aacute;r a rendelő melletti telken&nbsp; (Clemantis Gy&oacute;gyszert&aacute;r, P&eacute;celi &uacute;t 188. tel: 06-1-253-0137) helyezkedik el. A ker&uuml;let t&ouml;bbi patik&aacute;j&aacute;t&nbsp;<a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Gyogyszertarak.aspx" name="itt" target="_blank"> itt </a>tekintheti meg.</p>\r\n\r\n<p>Ha nem tudja, hogy melyik h&aacute;ziorvoshoz tartozik, akkor k&eacute;rj&uuml;k &iacute;rja be a lakc&iacute;m&eacute;nek utca nev&eacute;t az al&aacute;bbi keresőbe:</p>\r\n', 0, 0, '', NULL, 1, 'háziorvos', '2014-04-28 19:47:41'),
(43, 'Péceli út 190.', '1171 Bp., Péceli út 190.', 'Háziorvosi rendelő, ', 'Rendelőnk ... található. Parkolási lehetőség .... <br>A környék betegeit <a href="/ho/1/home">Dr. Szeiffert Gábor</a>  &nbsp;<a href="/ho/2/home">Dr. Miklós Márta </a>  &nbsp;<a href="/ho/3/home">Dr. Szakács Andrea </a>  &nbsp;<a href="/ho/4/home">Dr. Szászi Andrea </a>  &nbsp; háziorvosok látják el.<br>A legközelebbi gyógyszertás .... található.', 0, 0, '', '', 1, 'háziorvos', '2014-04-28 19:47:41'),
(67, 'unnepi', 'Ünnepi rendelés és ügyeleti helyszín változás', 'ünnepi rendelés, ügyeleti helyszín, változás', '<p style="text-align:center">Ferln&ouml;tt alapell&aacute;t&aacute;s decemberi, janu&aacute;r elejei rendje</p>\r\n\r\n<table border="2" cellpadding="1" cellspacing="1" style="width:930px">\r\n	<thead>\r\n		<tr>\r\n			<th scope="col" style="text-align: center;"><span style="color:#0000CD">h&eacute;tfő</span></th>\r\n			<th scope="col" style="text-align: center;"><span style="color:#0000CD">kedd</span></th>\r\n			<th scope="col" style="text-align: center;"><span style="color:#0000CD">szerda</span></th>\r\n			<th scope="col" style="text-align: center;"><span style="color:#0000CD">cs&uuml;t&ouml;rt&ouml;k</span></th>\r\n			<th scope="col" style="text-align: center;"><span style="color:#0000CD">p&eacute;ntek</span></th>\r\n			<th scope="col" style="text-align: center;"><span style="color:#0000CD">szombat</span></th>\r\n			<th scope="col" style="text-align: center;"><span style="color:#0000CD">vas&aacute;rnap</span></th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>9</td>\r\n			<td>10</td>\r\n			<td>11</td>\r\n			<td>12</td>\r\n			<td>13</td>\r\n			<td>14</td>\r\n			<td><span style="color:#FF0000"><span style="background-color:#00FFFF">15</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>16</td>\r\n			<td>17</td>\r\n			<td>18</td>\r\n			<td>19</td>\r\n			<td>20</td>\r\n			<td>21</td>\r\n			<td><span style="color:#FF0000"><span style="background-color:#00FFFF">22</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>23</td>\r\n			<td><span style="color:#FF0000"><span style="background-color:#00FFFF">24</span></span></td>\r\n			<td><span style="color:#FF0000"><span style="background-color:#00FFFF">25</span></span></td>\r\n			<td><span style="color:#FF0000"><span style="background-color:#00FFFF">25</span></span></td>\r\n			<td><span style="color:#FF0000"><span style="background-color:#00FFFF">27</span></span></td>\r\n			<td><span style="color:#FF0000"><span style="background-color:#00FFFF">28</span></span></td>\r\n			<td><span style="color:#FF0000"><span style="background-color:#00FFFF">29</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>30</td>\r\n			<td>31</td>\r\n			<td><span style="color:#FF0000"><span style="background-color:#00FFFF">2014 janu&aacute;r 1</span></span></td>\r\n			<td>2</td>\r\n			<td>3</td>\r\n			<td><span style="color:#FF0000"><span style="background-color:#00FFFF">4</span></span></td>\r\n			<td><span style="color:#FF0000"><span style="background-color:#00FFFF">5</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><span style="color:#FF0000">A piros sz&iacute;nnel kiemelt napokon kiz&aacute;r&oacute;lag az &uuml;gyeleti szolg&aacute;lat el&eacute;rhető!</span></p>\r\n\r\n<p><span style="color:#008000">December 30.-&aacute;n d&eacute;lelőtt Dr. Sz&aacute;szi Andrea rendel!</span></p>\r\n\r\n<p><span style="color:#00FF00">Janu&aacute;r 2.-&aacute;n d&eacute;lut&aacute;n Dr. Szeiffert G&aacute;bor rendel!</span></p>\r\n\r\n<p style="text-align:center"><span style="color:#FF0000">V&aacute;ltozik az &uuml;gyelet helysz&iacute;ne!!!</span></p>\r\n\r\n<p style="text-align:center">Előrel&aacute;that&oacute;lag december 9.-&eacute;től december 19.-&eacute;ig az &uuml;gyelt helysz&iacute;ne</p>\r\n\r\n<p style="text-align:center">a XVIIker&uuml;leti Szakrendelő &eacute;p&uuml;let&eacute;ben ( Ferihegyi &uacute;t 95.) lesz.</p>\r\n\r\n<p style="text-align:center">A telefonsz&aacute;n v&aacute;ltozatlan: <strong>06 1 256 62 72</strong></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n', 0, 1, '', NULL, 1, 'háziorvos', '2014-04-28 19:47:41');
INSERT INTO `content` (`id`, `name`, `title`, `descrption`, `content`, `noindex`, `is_active`, `contact_finish`, `url`, `id_orvos`, `szak_megnevezes`, `lastmod`) VALUES
(79, 'lepesrol', 'Lépésről - lépesre', 'saját adatok beállítása', '<address>Tisztelt H&aacute;ziorvos!</address>\r\n\r\n<p>K&ouml;sz&ouml;n&ouml;m, hogy megtisztelt &eacute;rdeklőd&eacute;s&eacute;vel &eacute;s id&aacute;ig eljutott. Ez azt is jelentheti, hogy &aacute;ttekintette a honlapj&aacute;t &eacute;s sikeresen bejelentkezett az adminisztr&aacute;tori fel&uuml;letre.</p>\r\n\r\n<p>K&eacute;rem ellenőrizze, hogy a bal felső sarokban a DDS H&aacute;ziorvos: ut&aacute;n az &Ouml;n neve &iacute;r&oacute;dik ki. Ha a ki&iacute;r&aacute;s helyes, akkor az al&aacute;bbiakban ismertetett l&eacute;p&eacute;sek seg&iacute;ts&eacute;g&eacute;vel l&eacute;p&eacute;sről, l&eacute;p&eacute;sre aktualiz&aacute;lhatja a honlapj&aacute;t, hiszen a rendel&eacute;si idő nem biztos, hogy helyes, vagy a p&eacute;ntekenk&eacute;nti v&aacute;ltoz&oacute; ki&iacute;r&aacute;s helyett esetleg a p&aacute;ros &eacute;s p&aacute;ratlan heti rendel&eacute;s megjelen&iacute;t&eacute;s&eacute;t szeretn&eacute;. Szinte biztos, hogy a rendel&eacute;si idő alatt l&eacute;vő t&aacute;j&eacute;koztat&oacute; nem fedi az &Ouml;n rendel&eacute;si gyakorlat&aacute;t, ez&eacute;rt ezt is m&oacute;dos&iacute;tani c&eacute;lszerű. A kapcsolat oldal adatai is hi&aacute;nyosak, ez is kieg&eacute;sz&iacute;t&eacute;sre szorul. Ugyan ez vonatkozik a bemutatkoz&oacute; oldalra is. Val&oacute;sz&iacute;nűnek tartom, hogy a k&ouml;rzet utc&aacute;i is bevitelre szorulnak. &Ouml;n v&aacute;laszthat, hogy az előbb ismertetett tev&eacute;kenys&eacute;geket az al&aacute;bbi ismertető seg&iacute;ts&eacute;g&eacute;vel &Ouml;n vagy egy seg&iacute;tője v&eacute;gzi el, vagy e-mailben (vagy m&aacute;s m&oacute;don pap&iacute;r alapon) elk&uuml;ldi azokat &eacute;s c&eacute;g&uuml;nk elv&eacute;gzi a sz&uuml;ks&eacute;ges tev&eacute;kenys&eacute;geket.</p>\r\n\r\n<p>Ha a saj&aacute;t bevitel megold&aacute;s mellett d&ouml;nt&ouml;tt, akkor c&eacute;lszerű az al&aacute;bbiak szerint elj&aacute;rni:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>k&uuml;l&ouml;n ablakban nyissa meg a l&aacute;togat&oacute; &aacute;ltal l&aacute;tott honlapj&aacute;t,</p>\r\n	</li>\r\n	<li>\r\n	<p>az adott l&eacute;p&eacute;sn&eacute;l le&iacute;rt adatokat &iacute;rja &ouml;ssze,</p>\r\n	</li>\r\n	<li>\r\n	<p>az adott l&eacute;p&eacute;sn&eacute;l t&ouml;ltse ki az &uuml;res mezőt vagy a megadott linkre kattintson &eacute;s az &uacute;j oldalon vigye be az elők&eacute;sz&iacute;tett adatokat,</p>\r\n	</li>\r\n	<li>\r\n	<p>pap&iacute;ron vagy sz&ouml;veges f&aacute;jlban vezesse az elv&eacute;gzett tev&eacute;kenys&eacute;get,</p>\r\n	</li>\r\n	<li>\r\n	<p>l&eacute;pjen a l&aacute;togat&oacute;i oldalra &eacute;s ha az eredm&eacute;ny hib&aacute;s, &uacute;jra kattintson az előbbi linkre &eacute;s v&eacute;gezze el a jav&iacute;t&aacute;st,</p>\r\n	</li>\r\n	<li>\r\n	<p>ha az eredm&eacute;ny megfelelő j&ouml;het a k&ouml;vetkező l&eacute;p&eacute;s.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Az egyszerűbb feladatokt&oacute;l az &ouml;sszetettebb fel&eacute; fogunk haladni.</p>\r\n\r\n<p><input name="Tovább lépés " type="button" value="/ho/1/admin/lepesrol/lep2" /></p>\r\n\r\n<div style="page-break-after: always;"><span style="display:none">&nbsp;</span></div>\r\n\r\n<ol>\r\n	<li>\r\n	<p>l&eacute;p&eacute;s: Jelsz&oacute; m&oacute;dos&iacute;t&aacute;s</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Mivel a jelszavak megegyeznek a felhaszn&aacute;l&oacute;i n&eacute;vvel, ez&eacute;rt az első &eacute;s legfontosabb feladat a jelsz&oacute; megv&aacute;ltoztat&aacute;sa. Ezt k&ouml;nnyen megteheti ha az eg&eacute;rmutat&oacute;t a be&aacute;ll&iacute;t&aacute;sok (jobb felső sarokban) feliratra viszi &eacute;s r&aacute;kattint a Jelsz&oacute;m&oacute;dos&iacute;t&aacute;sra. A jelsz&oacute; legal&aacute;bb 6-8 karakteres legyen, tartalmazzon sz&aacute;mokat, kis- &eacute;s nagybetűket.</p>\r\n\r\n<p>K&eacute;rem, hogy a jelsz&oacute;t biztons&aacute;gos helyen őrizze &eacute;s sikeres m&oacute;dos&iacute;t&aacute;s ut&aacute;n ki- &eacute;s bel&eacute;p&eacute;ssel ellenőrizze le. Javasoljuk, hogy a b&ouml;ng&eacute;szőben a jelsz&oacute; megjegyz&eacute;st ne enged&eacute;lyezze.</p>\r\n\r\n<p>Ha a jelsz&oacute;t elfelejtette, akkor a <a href="mailto:dg@ddstandard.hu" name="Levélküldés">lev&eacute;lk&uuml;ld&eacute;s</a> c&iacute;mre &iacute;rjon, levele ellenőrz&eacute;se ut&aacute;n &aacute;tmeneti jelsz&oacute;t k&uuml;ld&ouml;k.</p>\r\n\r\n<ol start="2">\r\n	<li>\r\n	<p>l&eacute;p&eacute;s: Alapadatok be&aacute;ll&iacute;t&aacute;sa</p>\r\n	</li>\r\n</ol>\r\n\r\n<form action="http://lepesrol/" enctype="text/plain" method="POST" name="config" target="_self">\r\n<p>K&eacute;rem ide &iacute;rja be az e-mail c&iacute;m&eacute;t, ha az a Kapcsolat oldalon nem l&aacute;tsz&oacute;dik: <input maxlength="64" name="E-mail cím:" style="height:0.77cm; width:7.25cm" type="TEXT" value="\\&lt;?php echo $_POST[''config''][''email''];?\\&gt;" /></p>\r\n\r\n<p>Ellenőrizze a rendelő ir&aacute;ny&iacute;t&oacute; sz&aacute;m&aacute;t, &eacute;s ha sz&uuml;ks&eacute;ges jav&iacute;tsa ki azt: <input maxlength="120" name="cim" style="height:0.77cm; width:14.4cm" type="TEXT" value="&lt;?php echo $_POST[''config''][''cim''];?&gt;" /></p>\r\n\r\n<p>Ellenőrizze a v&aacute;rosnev&eacute;t: <input maxlength="60" name="varos" style="height:0.77cm; width:7.25cm" type="TEXT" /></p>\r\n\r\n<p>Ellenőrizze a rendelő utca c&iacute;m&eacute;t: <input maxlength="60" name="utca" style="height:0.77cm; width:7.25cm" type="TEXT" /></p>\r\n\r\n<p>Ellenőrizze a rendelői telefonsz&aacute;m&aacute;t &eacute;s sz&uuml;ks&eacute;g eset&eacute;n jav&iacute;tsa ki: <input maxlength="30" name="telefon" style="height:0.77cm; width:7.25cm" type="TEXT" value="&lt;?php echo $_POST[''config''][''telefon''];?&gt;" /></p>\r\n\r\n<p><input name="Küldés" style="height:0.98cm; width:2.01cm" type="SUBMIT" value="SUBMIT" /></p>\r\n</form>\r\n\r\n<p>K&eacute;rem a k&uuml;ld&eacute;s ut&aacute;n ellenőrizze a Kapcsolat oldalt, hogy l&aacute;tsz&oacute;dik az e-mail c&iacute;m? (Lehet, hogy t&ouml;bbsz&ouml;ri &uacute;jrat&ouml;lt&eacute;s sz&uuml;ks&eacute;ges!)</p>\r\n\r\n<ol start="2">\r\n	<li>\r\n	<p>l&eacute;p&eacute;s Magamr&oacute;l oldal meg&iacute;r&aacute;sa</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Az első feladat egy nem t&uacute;l r&eacute;gen k&eacute;sz&uuml;lt, lehetőleg jpg kiterjeszt&eacute;sű saj&aacute;t f&eacute;nyk&eacute;p keres&eacute;se vagy k&eacute;sz&iacute;t&eacute;se. A f&eacute;nyk&eacute;pnek felesleges nagy felbont&aacute;s&uacute;nak lennie, mivel a jelenlegi k&eacute;pernyők felbont&aacute;sa &aacute;ltal&aacute;ban 100 dpi alatt van. A felbont&aacute;sra utalhat a k&eacute;p m&eacute;rete, mindenk&eacute;pp 1 Mbyte alatti k&eacute;pet keress&uuml;nk vagy k&eacute;pszerkesztővel (pl. InfranView ) cs&ouml;kkents&uuml;k a felbont&aacute;st. &Uuml;gyelj&uuml;nk arra, hogy a k&eacute;p f&aacute;jl neve ne tartalmazzon sz&oacute;k&ouml;zt &eacute;s &eacute;kezetes betűket &eacute;s jegyezz&uuml;k meg a k&eacute;p k&ouml;nyvt&aacute;r&aacute;t &eacute;s nev&eacute;t.</p>\r\n\r\n<p>Ekkor k&ouml;vetkezhet a k&eacute;p felt&ouml;lt&eacute;s, ehhez kattintson a k&ouml;vetkező linkre: <a href="http://localhost/ho/1/admin/kepek/create" target="_blank">/ho/1/admin/kepek/create</a></p>\r\n\r\n<p>Ha a k&eacute;t l&eacute;p&eacute;sben t&ouml;rt&eacute;nő felt&ouml;lt&eacute;s siker&uuml;lt, akkor az &uacute;j ablak bez&aacute;rhat&oacute;.</p>\r\n\r\n<p>Ekkor k&ouml;vetkezhet pap&iacute;ron vagy sz&ouml;vegszerkesztővel az oldal tartalm&aacute;nak a meg&iacute;r&aacute;sa, ehhez adhat mank&oacute;t az oldalon jelenleg olvashat&oacute; c&iacute;mszavak.</p>\r\n\r\n<p>Ha k&eacute;szen &aacute;ll a bevitelre, akkor k&eacute;rem kattintson a k&ouml;vetkező linkre: <a href="http://localhost/ho/1/admin/content/update/4" target="_blank">/ho/1/admin/content/update/4</a></p>\r\n\r\n<p>Elsőnek javaslom a f&eacute;nyk&eacute;p beilleszt&eacute;s&eacute;t, majd ezt k&ouml;vetően a sz&ouml;veg beilleszt&eacute;s&eacute;t vagy bevitel&eacute;t. A sz&ouml;vegszerkesztő sz&eacute;les lehetős&eacute;get biztos&iacute;t a kiemel&eacute;sre &eacute;s form&aacute;z&aacute;sra.</p>\r\n\r\n<p>Ha elk&eacute;sz&uuml;lt, akkor k&eacute;rem ellenőrizze a l&aacute;togat&oacute;i fel&uuml;leten a Magamr&oacute;l oldalt &eacute;s ha jav&iacute;tani val&oacute;t tal&aacute;l megint kattintson az előbbi linkre.</p>\r\n\r\n<p>Most m&aacute;r k&eacute;t oldal elnyerte a v&eacute;gső form&aacute;j&aacute;t. Persze az &uacute;gynevezett statikus oldalakat (kezdőlap, magamr&oacute;l, rendel&eacute;si idő alatti t&aacute;j&eacute;koztat&oacute; sz&ouml;veg, sőt saj&aacute;t k&eacute;sz&iacute;t&eacute;sű &uacute;j oldal) b&aacute;rmikor m&oacute;dos&iacute;thatunk, &iacute;rhatunk a Tartalmi oldalak moduln&eacute;vn&eacute;l minden megk&ouml;t&eacute;s n&eacute;lk&uuml;l.</p>\r\n\r\n<ol start="3">\r\n	<li>\r\n	<p>l&eacute;p&eacute;s Kezdőlap m&oacute;dos&iacute;t&aacute;sa</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>A m&oacute;dos&iacute;t&aacute;s k&ouml;vetkező linkre kattintva t&ouml;rt&eacute;nik: <a href="http://localhost/ho/1/admin/content/update/1">/ho/1/admin/content/update/1</a></p>\r\n\r\n<p>Ha f&eacute;nyk&eacute;pet szeretne beilleszteni, akkor azt előbb a k&eacute;pfelt&ouml;lt&eacute;s modullal kell k&uuml;l&ouml;n felvinnie, majd az előző l&eacute;p&eacute;sben t&ouml;rt&eacute;nt m&oacute;don kell megh&iacute;vni.</p>\r\n\r\n<p>Ha &uacute;j linket szeretne bevinni, akkor meg kell keresni a c&iacute;m&eacute;t (saj&aacute;t oldaln&aacute;l vigye az egeret a k&iacute;v&aacute;nt men&uuml;pontra &eacute;s &iacute;rja fel a b&ouml;ng&eacute;sző bal als&oacute; sark&aacute;ban megjelenő c&iacute;met, majd kattintson a hivatkoz&aacute;s beilleszt&eacute;se ikonra. A hivatkoz&aacute;s tulajdons&aacute;gainak megad&aacute;s&aacute;n&aacute;l seg&iacute;ts&eacute;get jelenthet, ha az eg&eacute;r mutat&oacute;t egy megl&eacute;vő hivatkoz&aacute;sra viszi, majd a jobb gombot megnyomva megn&eacute;zi annak tulajdons&aacute;gait.</p>\r\n\r\n<p>Ment&eacute;s ut&aacute;n az eredm&eacute;ny term&eacute;szetesen a kezdőoldal &uacute;jrat&ouml;lt&eacute;s&eacute;vel ellenőrizendő.</p>\r\n\r\n<ol start="4">\r\n	<li>\r\n	<p>l&eacute;p&eacute;s&nbsp; Rendel&eacute;si idő &eacute;s a t&aacute;j&eacute;koztat&oacute; m&oacute;dos&iacute;t&aacute;sa</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Elsőnek c&eacute;lszerű a rendel&eacute;si idő t&aacute;bl&aacute;t kieg&eacute;sz&iacute;teni, ha sz&uuml;ks&eacute;ges: <a href="http://localhost/ho/1/admin/rendido">/ho/1/admin/rendido</a></p>\r\n\r\n<p>Ha a be&iacute;rt adatok helyesek, de p&eacute;ntekenk&eacute;nt v&aacute;ltoz&oacute; a rendel&eacute;s, akkor kattintson&nbsp; a p&eacute;ntek d&eacute;lelőtti sor Műveletek oszlopban l&eacute;vő ceruza ikonra &eacute;s be&iacute;rhatja a d&eacute;lelőtti rendel&eacute;s kezdő &eacute;s befejez&eacute;si idej&eacute;t, majd a megjegyz&eacute;s rovatba &iacute;rja be: <u>p&aacute;ros h&eacute;ten:</u> vagy p&aacute;ratlan h&eacute;ten: Fontos hogy a megjegyz&eacute;sbe &iacute;rt sz&ouml;vegek az al&aacute;h&uacute;zott sz&ouml;vegekkel megegyezzenek &eacute;s a kettős pontot is tartalmazz&aacute;k!</p>\r\n\r\n<p>Ha egy&eacute;b jav&iacute;tani val&oacute; nincs ez az ablak bez&aacute;rhat&oacute;. Term&eacute;szetesen mielőbb tov&aacute;bbl&eacute;pne c&eacute;lszerű a Rendel&eacute;si idő-t bet&ouml;lteni &eacute;s a m&oacute;dos&iacute;t&aacute;st ellenőrizni.</p>\r\n\r\n<p>A rendel&eacute;si idővel kapcsolatos t&aacute;j&eacute;koztat&oacute;t itt m&oacute;dos&iacute;thatja: <a href="http://localhost/ho/1/admin/content/update/5" target="_blank">/ho/1/admin/content/update/5</a></p>\r\n\r\n<p>Az ellenőrz&eacute;sről itt se feledkezz&uuml;nk meg!</p>\r\n\r\n<ol start="5">\r\n	<li>\r\n	<p>l&eacute;p&eacute;s K&ouml;rzet hat&aacute;rok bevitele</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Ha rendelkez&eacute;s&eacute;re &aacute;ll a k&ouml;rzet&eacute;hez tartoz&oacute; utc&aacute;k list&aacute;ja, akkor m&aacute;ris kezdheti a bevitelt: <a href="http://localhost/ho/1/admin/korzet/create" target="_blank">/ho/1/admin/korzet/create</a></p>\r\n\r\n<p>A bevitel szab&aacute;lyai az oldalon felsorol&aacute;sra ker&uuml;ltek, az adatokat utc&aacute;nk&eacute;nt kell bevinni (ah&aacute;ny utca annyi &uacute;j bevitel). Ez lesz a felt&ouml;lt&eacute;s legunalmasabb r&eacute;sze, de a p&aacute;cienseinknek lehetős&eacute;get kell biztos&iacute;tani a k&ouml;nnyű &eacute;s gyors t&aacute;j&eacute;koz&oacute;d&aacute;sra.</p>\r\n\r\n<p>Enn&eacute;l a feladatn&aacute;l elegendő a sz&uacute;r&oacute;pr&oacute;ba szerű ellenőrz&eacute;s.</p>\r\n\r\n<p>Ha id&aacute;ig eljutott, akkor a honlapja k&eacute;sznek nyilv&aacute;n&iacute;that&oacute;, hiszen minden oldal aktualiz&aacute;lva &eacute;s ellenőrizve lett. Term&eacute;szetesen minden honlap tov&aacute;bbfejleszthető &eacute;s a t&ouml;bbi pontban ismertetj&uuml;k a tov&aacute;bbi lehetős&eacute;geket.</p>\r\n\r\n<ol start="6">\r\n	<li>\r\n	<p>l&eacute;p&eacute;s Rendelői oldal be&aacute;ll&iacute;t&aacute;sa</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Mivel &aacute;ltal&aacute;ban egy rendelőben t&ouml;bb h&aacute;ziorvos dolgozik, de ennek az oldalnak a karbantart&aacute;s&aacute;t, jav&iacute;t&aacute;s&aacute;t egy embernek c&eacute;lszerű v&eacute;gezni, ez&eacute;rt ezt csak egyik&uuml;k v&eacute;gezheti, A gener&aacute;l&aacute;s sor&aacute;n a rendelői oldal a rendelő első orvos&aacute;hoz rendelődik, de k&eacute;r&eacute;sre ez k&ouml;nnyen megv&aacute;ltoztathat&oacute;.</p>\r\n\r\n<p>Ha az al&aacute;bbi linkre kattintva piros hiba&uuml;zenet jelenik meg, akkor nem &Ouml;n a jelenleg erre jogosult orvos: <a href="http://localhost/ho/1/admin/content/update/43" target="_blank">/ho/1/admin/content/update/43</a></p>\r\n\r\n<p>A rendelői oldal egy egysoros h&aacute;rom oszlopos t&aacute;bl&aacute;zattal kezdődik, amelybe a rendelő k&uuml;lső &eacute;s/vagy belső k&eacute;peit c&eacute;lszerű beilleszteni. H&aacute;rom f&eacute;nyk&eacute;p eset&eacute;n az elhelyez&eacute;s egy&eacute;rtelmű, kettő a k&eacute;t sz&eacute;lső, egy f&eacute;nyk&eacute;p a k&ouml;z&eacute;pső oszlopba helyezendő.</p>\r\n\r\n<p>Az egy&eacute;b t&aacute;j&eacute;koztat&oacute; sz&ouml;vegre utal&aacute;s t&ouml;rt&eacute;nik, a rendel&eacute;shez tartoz&oacute; orvosok neve &eacute;s linkje automatikusan rendelkez&eacute;sre &aacute;ll (ennek a sornak a t&ouml;rl&eacute;se nem javasolt).</p>\r\n\r\n<p>A kereső csak a rendelőh&ouml;z tartoz&oacute; orvosok k&ouml;rzeteiben keres, helyes műk&ouml;d&eacute;s&eacute;nek az a felt&eacute;tele, hogy az &ouml;sszes orvos k&ouml;rzet adatai felt&ouml;lt&eacute;sre ker&uuml;ljenek.</p>\r\n\r\n<ol start="7">\r\n	<li>\r\n	<p>l&eacute;p&eacute;s Hat&aacute;ridős &uuml;zenetek ki&iacute;rat&aacute;sa</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>A honlap egyszerű &eacute;s k&ouml;nnyű lehetős&eacute;get biztost r&ouml;vid figyelem felh&iacute;v&oacute; &uuml;zenetek megjelen&iacute;t&eacute;s&eacute;re &eacute;s hat&aacute;ridőh&ouml;z k&ouml;t&ouml;tt &ndash; automatikus - lev&eacute;tel&eacute;re. Ennek szabads&aacute;gol&aacute;s, helyettes&iacute;t&eacute;s, &uuml;nnep miatti rendel&eacute;si idő m&oacute;dosul&aacute;s vagy &eacute;ppen v&eacute;dőolt&aacute;sra t&ouml;rt&eacute;nő felh&iacute;v&aacute;sn&aacute;l van jelentős&eacute;ge.</p>\r\n\r\n<p>Az ilyen &uuml;zenetek minden oldal m&aacute;sodik sor&aacute;ban piros sz&iacute;nnel jelennek meg, eg&eacute;szen a be&aacute;ll&iacute;tott hat&aacute;rnapig.</p>\r\n\r\n<p>Az &uuml;zenet bevitel kipr&oacute;b&aacute;l&aacute;shoz ide kattintson: <a href="http://localhost/ho/1/admin/uzenet/create">/ho/1/admin/uzenet/create</a></p>\r\n\r\n<ol start="8">\r\n	<li>\r\n	<p>l&eacute;p&eacute;s T&aacute;j&eacute;koztat&oacute;k</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Sajnos az internet hemzseg a k&uuml;l&ouml;nb&ouml;ző eg&eacute;szs&eacute;g&uuml;gyi &eacute;s betegs&eacute;ggel kapcsolatos inform&aacute;ci&oacute;kt&oacute;l, amelyek hiteless&eacute;ge nehezen ellenőrizhető. T&aacute;j&eacute;koztat&oacute; rovatnak az&eacute;rt tulajdon&iacute;tunk jelentős&eacute;get, mert &Ouml;n&ouml;knek lehetős&eacute;get biztos&iacute;t, a j&oacute; &eacute;s hasznos oldalak linkjeinek be&eacute;p&iacute;t&eacute;s&eacute;re, saj&aacute;t tud&aacute;suk le&iacute;r&aacute;s&aacute;ra &eacute;s nem utols&oacute; sorban az erőforr&aacute;sok takar&eacute;kos felhaszn&aacute;l&aacute;s&aacute;ra, amennyiben hajland&oacute;k linkjeik, &iacute;r&aacute;saik megoszt&aacute;s&aacute;ra.</p>\r\n\r\n<p>Honlapjukon az első k&eacute;t t&aacute;j&eacute;koztat&oacute; a ker&uuml;leti &uuml;gyelettel &eacute;s a szakrendel&eacute;sekkel foglalkozik, hasznoss&aacute;gukhoz nem f&eacute;r k&eacute;ts&eacute;g.</p>\r\n\r\n<p>A harmadik a &bdquo;Betegh&iacute;rad&oacute;&rdquo; gy&ouml;nge k&iacute;s&eacute;rlet a letagadhatatlan betegek k&ouml;z&ouml;tti kommunik&aacute;ci&oacute;nak pozit&iacute;vv&aacute; t&eacute;tel&eacute;re. Ha a k&iacute;s&eacute;rlet nem tetszik p&aacute;r m&aacute;sodperces tev&eacute;kenys&eacute;ggel t&ouml;r&ouml;lhetik ezt a rekordot (adatb&aacute;zis sort) &eacute;s ezzel azonnal eltűnik az oldalukr&oacute;l.</p>\r\n\r\n<p>Az influenza ismertető oldal az ANTSZ oldal&aacute;n tal&aacute;lhat&oacute;.</p>\r\n\r\n<p>A tov&aacute;bbi k&eacute;t bejegyz&eacute;s &uuml;res, ezek kit&ouml;lt&eacute;se vagy t&ouml;rl&eacute;se &Ouml;nre v&aacute;r.</p>\r\n\r\n<p>A t&aacute;j&eacute;koztat&oacute;khoz itt linket nem mell&eacute;kel&uuml;nk, az admin oldal Modulok men&uuml;ben a &bdquo;T&aacute;j&eacute;koztat&oacute;k&rdquo; pontra kell kattintani &eacute;s ott megtekinthető, m&oacute;dos&iacute;that&oacute;k &eacute;s t&ouml;r&ouml;lhetők az egyes sorok.</p>\r\n\r\n<p>A m&oacute;dos&iacute;t&aacute;skor illetve az &uacute;j sor l&eacute;trehoz&aacute;sakor r&eacute;szletes &uacute;tmutat&aacute;st tal&aacute;l az egyes mezők</p>\r\n\r\n<p>kit&ouml;lt&eacute;s&eacute;hez.</p>\r\n\r\n<p>Amennyiben &uacute;j sort hoznak l&eacute;tre, akkor a ment&eacute;s ut&aacute;n a felhaszn&aacute;l&oacute;i oldalon megjelenik a leg&ouml;rd&uuml;lő men&uuml;ben az &uacute;j elem. K&eacute;rem ne feledj&eacute;k kipr&oacute;b&aacute;lni az &uacute;j elemet, a linkek k&ouml;nnyen hib&aacute;sak lehetnek!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ha saj&aacute;t t&aacute;j&eacute;koztat&aacute;st szeretn&eacute;nek l&eacute;trehozni, akkor ezt a &bdquo;Modulok&rdquo; &bdquo;Tartalmi oldalak&rdquo; men&uuml;pontj&aacute;ban kell megval&oacute;s&iacute;taniuk, majd annak a n&eacute;v (url) mezőnek a tartalm&aacute;t kell az ezt megjelen&iacute;tő T&aacute;j&eacute;koztat&oacute; sor &bdquo;url&rdquo; mezőj&eacute;be &aacute;tm&aacute;solni.</p>\r\n\r\n<p>Konkr&eacute;t p&eacute;ld&aacute;n ismertetve: A jogos&iacute;tv&aacute;n t&aacute;j&eacute;koztat&oacute; haszn&aacute;lhat&oacute;s&aacute;g&aacute;hoz az al&aacute;bbi l&eacute;p&eacute;sek sz&uuml;ks&eacute;gesek:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Bel&eacute;p a Tartalmi oldalak modulra,</p>\r\n	</li>\r\n	<li>\r\n	<p>R&aacute;kattint az &Uacute;j tartalom feliratra,</p>\r\n	</li>\r\n	<li>\r\n	<p>Elkezdi kit&ouml;lteni az űrlapot,</p>\r\n	</li>\r\n	<li>\r\n	<p>url mezőbe be&iacute;rja: jogsi,</p>\r\n	</li>\r\n	<li>\r\n	<p>c&iacute;m mezőbe: &Aacute;ltal&aacute;nos tudnival&oacute;k a jogos&iacute;tv&aacute;ny kiad&aacute;s&aacute;r&oacute;l vagy ehhez hasonl&oacute; sz&ouml;veget &iacute;rjon be,</p>\r\n	</li>\r\n	<li>\r\n	<p>Tartalom mezőbe: le&iacute;rja az &aacute;rat &eacute;s egy&eacute;b tudnival&oacute;kat,</p>\r\n	</li>\r\n	<li>\r\n	<p>a kereső robot tilt&aacute;sa &eacute;s akt&iacute;v kock&aacute;kat nem pip&aacute;lja ki,</p>\r\n	</li>\r\n	<li>\r\n	<p>&bdquo;Kapcsolat c&eacute;loldal (men&uuml;pont c&iacute;me)&rdquo; mezőt &uuml;resen kell hagyni, k&uuml;l&ouml;nben az mező c&iacute;me megjelenik a v&iacute;zszintes men&uuml;sorban!</p>\r\n	</li>\r\n	<li>\r\n	<p>Ha minden hib&aacute;tlan r&aacute;kattint a Ment&eacute;s gombra.</p>\r\n	</li>\r\n	<li>\r\n	<p>Ezut&aacute;n &bdquo;T&aacute;j&eacute;koztat&oacute;&rdquo; modul men&uuml;re kell kattintani,</p>\r\n	</li>\r\n	<li>\r\n	<p>Megkeresi a jogos&iacute;tv&aacute;ny sort &eacute;s a sorv&eacute;g&eacute;n a szerkeszt&eacute;st jel&ouml;lő ceruz&aacute;ra kattint:</p>\r\n	</li>\r\n	<li>\r\n	<p>A link mezőbe be&iacute;rja: jogsi (vagy m&eacute;g jobb, ha Ctrl C &eacute;s Ctrl V seg&iacute;ts&eacute;g&eacute;vel &aacute;tm&aacute;solja a tartalmat!);</p>\r\n	</li>\r\n	<li>\r\n	<p>a &bdquo;Hosszu&rdquo; mezőbe egy &ouml;sszegző r&ouml;videbb ismertet&eacute;st &iacute;r,</p>\r\n	</li>\r\n	<li>\r\n	<p>A megjegyz&eacute;s tartalm&aacute;t kit&ouml;rli, vagy saj&aacute;t maga sz&aacute;m&aacute;ra &iacute;r bele eml&eacute;keztetőt,</p>\r\n	</li>\r\n	<li>\r\n	<p>v&eacute;g&uuml;l a ment&eacute;s gombra kattintva elmenti a tartalmat.</p>\r\n	</li>\r\n	<li>\r\n	<p>V&eacute;g&uuml;l a felhaszn&aacute;l&oacute;i oldalon ellenőrzi az eredm&eacute;nyt.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>M&aacute;s belső oldalak k&eacute;sz&iacute;t&eacute;s&eacute;n&eacute;l is hasonl&oacute;an kell elj&aacute;rni.</p>\r\n\r\n<p>A k&uuml;lső hivatkoz&aacute;sok bevitele sokkal egyszerűbb, ott csak a hivatkoz&aacute;si c&iacute;m hib&aacute;tlans&aacute;g&aacute;ra kell figyelni (ez&eacute;rt &eacute;rdemes ezt is m&aacute;solni) &eacute;s a megnevez&eacute;st &eacute;s r&ouml;vid ismertet&eacute;st bevinni.</p>\r\n\r\n<p>Ezzel a honlapunk alap lehetős&eacute;geit kihaszn&aacute;ltuk &eacute;s haszn&aacute;latra k&eacute;sz.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol start="9">\r\n	<li>\r\n	<p>l&eacute;p&eacute;s &Uacute;j statikus oldal k&eacute;sz&iacute;t&eacute;se</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Erről m&aacute;r tulajdonk&eacute;ppen az előző l&eacute;p&eacute;sn&eacute; volt sz&oacute;, de tegy&uuml;k fel, hogy fontosnak &eacute;rez egy olyan t&eacute;m&aacute;t, amelyet a v&iacute;zszintes men&uuml;sorban szeretne l&aacute;tni.</p>\r\n\r\n<p>Erre szolg&aacute;l a &bdquo;Tartalmi oldalak&rdquo; modul &bdquo;&Uacute;j tartalom hozz&aacute;ad&aacute;sa&rdquo; funkci&oacute;ja.</p>\r\n\r\n<p>Ha a &bdquo;Kapcsolat c&eacute;loldal (men&uuml;pont c&iacute;me)&rdquo; mezőt kit&ouml;lti, akkor a ment&eacute;s ut&aacute;n a v&iacute;zszintes men&uuml;sor ezzel bőv&uuml;l, ha erre kattintanak, akkor a tartalom fog a men&uuml;sor alatt megjelenni.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol start="10">\r\n	<li>\r\n	<p>l&eacute;p&eacute;s Visszajelz&eacute;s</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Megk&ouml;sz&ouml;nn&eacute;m, ha p&aacute;rpercet sz&aacute;nna az al&aacute;bbi mezők kit&ouml;lt&eacute;s&eacute;re &eacute;s ezzel is seg&iacute;tenie a honlap jobb&aacute; t&eacute;tel&eacute;hez.</p>\r\n\r\n<p>K&eacute;rj&uuml;k &eacute;rt&eacute;kelje a jelen ismertető hasznoss&aacute;g&aacute;t (1-5 k&ouml;z&ouml;tti sz&aacute;mmal):</p>\r\n\r\n<p>K&eacute;rj&uuml;k &eacute;rt&eacute;kelje a jelen ismertető &eacute;rthetős&eacute;g&eacute;t (1-5):</p>\r\n\r\n<p>K&eacute;rj&uuml;k &eacute;rt&eacute;kelje a honlapj&aacute;nak c&eacute;lszerűs&eacute;g&eacute;t (1-5):</p>\r\n\r\n<p>Mit hi&aacute;nyol a honlapj&aacute;b&oacute;l:</p>\r\n\r\n<p>Mi tetszik legink&aacute;bb a honlapon:</p>\r\n\r\n<p>Mi az ami kimaradt a megval&oacute;s&iacute;t&aacute;sb&oacute;l:</p>\r\n\r\n<p>Van-e felesleges eleme (oldala) a honlapj&aacute;nak:</p>\r\n\r\n<p>k&uuml;ld</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<ol start="11">\r\n	<li>\r\n	<p>l&eacute;p&eacute;s Admin fel&uuml;let bez&aacute;r&aacute;sa</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Ez egy fontos biztons&aacute;gi l&eacute;p&eacute;s, b&aacute;r a bez&aacute;r&aacute;s egy idő ut&aacute;n automatikusan megt&ouml;rt&eacute;nik, de addig mag&aacute;ban hordozza a nem k&iacute;v&aacute;nt beavatkoz&aacute;s vesz&eacute;ly&eacute;t. Ez&eacute;rt, ha a sz&aacute;m&iacute;t&oacute;g&eacute;pes munk&aacute;t időlegesen f&eacute;lbe kell hagynunk, ne feledje a bal felső sarokban l&eacute;vő kikapcsol&aacute;s (kijelentkez&eacute;s) ikonra kattintani!</p>\r\n\r\n<p>Honlapj&aacute;hoz eredm&eacute;nyes haszn&aacute;latot k&iacute;v&aacute;nok!</p>\r\n\r\n<p>&Uuml;dv&ouml;zlettel</p>\r\n\r\n<p>Budapest, 2014.01.06. id. Darvas G&aacute;bor</p>\r\n\r\n<p>DD Standard Kft.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 1, '', NULL, 0, 'háziorvos', '2014-04-28 19:47:41'),
(80, 'home', 'Dr. Demo Demeter háziorvosi honlap bemutató oldal', 'háziorvos, körzeti orvos, orvosi rendelő', '<p><span style="font-family:times new roman,times,serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:16px">&Uuml;dv&ouml;z&ouml;lj&uuml;k a h&aacute;ziorvosok haszn&aacute;tat&aacute;ra k&eacute;sz&uuml;lt honlap bemutal&oacute; oldal&aacute;n!</span></span></span></p>\r\n\r\n<p><span style="font-family:times new roman,times,serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:16px">Ez a honlap mind a l&aacute;togat&oacute;k, mind a h&aacute;ziorvosok sz&aacute;m&aacute;ra bemutat&oacute; jellegű!!!!</span></span></span></p>\r\n\r\n<p><span style="font-family:times new roman,times,serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:16px">A honalon tal&aacute;lhat&oacute; inform&aacute;ci&oacute;k nem val&oacute;sak, k&eacute;rj&uuml;k a tov&aacute;bbiakban ezt a t&eacute;nyt fokozottan vegy&eacute;k figyelembe.</span></span></span></p>\r\n\r\n<p><span style="font-family:times new roman,times,serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:16px">B&aacute;rmilyen k&eacute;rd&eacute;s eset&eacute;n a minden oldal alj&aacute;n megjelenő DD Standard Kft linkre kattinva tudnak a fejlesztő &eacute;s forgalmaz&oacute; sz&aacute;m&aacute;ra &uuml;zenetet k&uuml;ldeni.</span></span></span></p>\r\n\r\n<p><span style="font-family:times new roman,times,serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:16px">Minden &eacute;szrev&eacute;telt k&ouml;sz&ouml;nettel fogadunk.</span></span></span></p>\r\n', 0, 0, '', NULL, 12, 'háziorvos', '2014-04-28 19:47:41'),
(81, 'rendelesiido/rendelesiido', 'Rendelési idő', 'rendelesi ido, rendelési idő, rendelés', '<h1><span style="color:#FF0000">Figyelem ennek a sornak atartalm&aacute;t megv&aacute;ltoztatni tilos!</span></h1>\r\n', 0, 0, '1', NULL, 12, 'háziorvos', '2014-04-28 19:47:41'),
(82, 'rendido', 'Rendeléshez kapcsolódó információk', '', '<h2><span style="color:#0000FF">Itt lehet felsorolni a legfontosabb tudnival&oacute;kat:</span></h2>\r\n\r\n<ul>\r\n	<li><span style="color:#0000FF">...</span></li>\r\n	<li><span style="color:#0000FF">...</span></li>\r\n</ul>\r\n', 0, 0, '', NULL, 12, 'háziorvos', '2014-04-28 19:47:41'),
(83, 'bemutatkozas', 'Magamról', 'önéletrajz, tanulmányok, hobbi', '<p>F&eacute;nyk&eacute;p helye</p>\r\n\r\n<p>iskolai, egyetemi tanulm&aacute;nyok,</p>\r\n\r\n<p>Mi&eacute;rt lettem h&aacute;ziorvos,</p>\r\n\r\n<p>Csal&aacute;d,</p>\r\n\r\n<p>hobbi.</p>\r\n', 0, 0, '1', NULL, 12, 'háziorvos', '2014-04-28 19:47:41'),
(84, 'beteghirado', 'Egy 60 éve gyakorló beteg tapasztalatai', 'jótanácsok saját tapasztalatok alapján', '<p><strong>Tisztelt Eg&eacute;szs&eacute;ges &eacute;s Beteg T&aacute;rsaim!</strong></p>\r\n\r\n<p>Az al&aacute;bbiakban eg&eacute;szs&eacute;ggel &eacute;s a saj&aacute;t betegs&eacute;geimmel kapcsolatos tapasztalataimat szeretn&eacute;m megosztani 15 pontban.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Előbb vagy ut&oacute;bb, de tudom&aacute;sul kell venn&uuml;nk, hogy <strong>mindny&aacute;jan egy &eacute;let nevű hal&aacute;los betegs&eacute;gben szenved&uuml;nk! <img alt="smiley" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="smiley" /> <img alt="sad" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/sad_smile.gif" style="height:20px; width:20px" title="sad" /></strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Nem csak az &eacute;let&uuml;nk egyedi, megism&eacute;telhetetlen &eacute;s &ndash; az estleges neh&eacute;zs&eacute;ge vagy kil&aacute;t&aacute;stalans&aacute;ga ellen&eacute;re &ndash; <strong>igen &eacute;rt&eacute;kes, hanem a testi &eacute;s lelki eg&eacute;szs&eacute;g&uuml;nk is az,</strong> ez&eacute;rt c&eacute;lszerű d&ouml;nt&eacute;seinkn&eacute;l a hossz&uacute; t&aacute;v&uacute; eg&eacute;szs&eacute;gi kock&aacute;zatokat figyelembe venni &eacute;s eg&eacute;szs&eacute;g&uuml;nkre vigy&aacute;zni.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g szem&eacute;lyre szabott &eacute;s <strong>magunkhoz viszony&iacute;tva is relat&iacute;v!</strong> (Egy k&eacute;z vagy l&aacute;b n&eacute;lk&uuml;li ember &ndash; ha nem beteg &eacute;s megtal&aacute;lja az &eacute;letc&eacute;lj&aacute;t &eacute;s emberi kapcsolatait - <strong>b&aacute;r nehezebb k&ouml;r&uuml;lm&eacute;nyek k&ouml;z&ouml;tt &eacute;l, de az&eacute;rt eg&eacute;szs&eacute;ges!</strong> l&aacute;sda k&ouml;vetkező vide&oacute;t:&nbsp;<a href="http://www.youtube.com/watch?v=WmMenUD0pf8">http://www.youtube.com/watch?v=WmMenUD0pf8</a> )</p>\r\n	</li>\r\n	<li>\r\n	<p>Gyakran nem tudatosul benn&uuml;nk, hogy a felnőtt ember eg&eacute;szs&eacute;ges &eacute;letm&oacute;dja napi &aacute;tlagosan m&aacute;sf&eacute;l &oacute;ra intenz&iacute;v gyalogl&aacute;st vagy ezzel egyen&eacute;rt&eacute;kű mozg&aacute;smennyis&eacute;get ig&eacute;nyel. Term&eacute;szetesen ettől el lehet t&eacute;rni, <strong>de a mozg&aacute;shi&aacute;ny hossz&uacute;t&aacute;von eg&eacute;szs&eacute;g&uuml;nk rov&aacute;s&aacute;ra megy.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Fiatal korban nem el&eacute;g a k&aacute;ros szenved&eacute;lyektől (doh&aacute;nyz&aacute;s, alkohol, drog, j&aacute;t&eacute;kszenved&eacute;ly, sex) tart&oacute;zkodni, hanem<strong> hasznos szenved&eacute;lyek m&eacute;rt&eacute;kletes rendszeress&eacute;g&eacute;re (sport, kir&aacute;ndul&aacute;s, zene, stb. hobbi) kell t&ouml;rekedni.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Ismerni &eacute;s figyelni kell &ouml;nmagunkat (mindig tudjuk, hogy mikor ett&uuml;nk &eacute;s ittunk utolj&aacute;ra, mitől lesz szorul&aacute;sunk vagy hasmen&eacute;s&uuml;nk, stb.)</p>\r\n	</li>\r\n	<li>\r\n	<p>Ha t&ouml;bb&eacute;-kev&eacute;sb&eacute; ismerj&uuml;k magunkat, akkor nagyobb es&eacute;llyel tudjuk megk&uuml;l&ouml;nb&ouml;ztetni egy &aacute;tlagos h&aacute;ny&aacute;s, hasmen&eacute;ses betegs&eacute;get (amelyen ak&aacute;r &eacute;vente t&ouml;bbsz&ouml;r, minden k&ouml;vetkezm&eacute;ny n&eacute;lk&uuml;l &aacute;teshet&uuml;nk &eacute;s nem sz&uuml;ks&eacute;gszerű, hogy orvos megvizsg&aacute;ljon) egy ak&aacute;r &eacute;letvesz&eacute;lyes k&ouml;vetkezm&eacute;nnyel j&aacute;r&oacute; betegs&eacute;gtől. A mi szemsz&ouml;g&uuml;nkből a kettő k&ouml;z&ouml;tt egy l&eacute;nyeges k&uuml;l&ouml;nbs&eacute;g van: az ut&oacute;bbi esetben mielőbb menj&uuml;nk el az orvoshoz. Ha ezt nem tessz&uuml;k meg k&eacute;sőbb erős f&aacute;jdalmaink &eacute;s / vagy magas l&aacute;zunk lesz &eacute;s &eacute;letben marad&aacute;si es&eacute;ly&uuml;nk cs&ouml;kken. Ha orvoshoz megy&uuml;nk memoriz&aacute;ljuk vagy &iacute;rjuk fel a l&eacute;nyeges t&uuml;neteket &eacute;s <strong>pr&oacute;b&aacute;ljuk meg mindet &eacute;s l&eacute;nyegret&ouml;rően elmondani</strong>.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g fontos eleme az alv&aacute;s, ha ezzel probl&eacute;ma van f&aacute;rad&eacute;konyabbak lesz&uuml;nk, cs&ouml;kken a munkahelyi &eacute;s otthoni teljes&iacute;tm&eacute;ny&uuml;nk, romlik az &eacute;letminős&eacute;g&uuml;nk. Ez&eacute;rt ezt a probl&eacute;m&aacute;t ki kell vizsg&aacute;ltatni. Gyakori ok lehet a horkol&aacute;s, amely s&uacute;lyos estben a k&ouml;zelben alv&oacute;k alv&aacute;s&aacute;t nehez&iacute;ti &eacute;s a horkol&oacute; v&eacute;rnyom&aacute;s&aacute;t időszakosan k&aacute;ros m&eacute;rt&eacute;kben megemeli. <strong>Magunk &eacute;s hozz&aacute;nk tartoz&oacute;ik &eacute;rdek&eacute;ben a horkol&oacute;k </strong>k&eacute;rjenek beutal&oacute;t az alv&aacute;scenrtumba &eacute;s vizsg&aacute;ltass&aacute;k ki magukat: <a href="http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html">http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Volt szerencs&eacute;m megismerkedni a l&aacute;gy&eacute;ks&eacute;rvvel is (alhasi f&aacute;jdalom, esetleg kitapinthat&oacute; dudor), amellyel norm&aacute;l esetben nem t&uacute;l f&aacute;jdalmas &eacute;s a műt&eacute;t is rutinnak sz&aacute;m&iacute;t, ha időben orvoshoz megy&uuml;nk!</p>\r\n	</li>\r\n	<li>\r\n	<p>A gerincprobl&eacute;m&aacute;k szint&eacute;n sokat &eacute;rinthetnek, lumb&aacute;g&oacute; &ouml;r&ouml;meit m&aacute;r a huszon&eacute;vesek is &eacute;lvezhetik. Ez orvosi szempontb&oacute;l egy j&oacute; betegs&eacute;g, hiszen aki igaz&aacute;n elkapja, az a f&aacute;jdalmai miatt igen nagy val&oacute;sz&iacute;nűs&eacute;ggel orvoshoz fog fordulni. Tal&aacute;n kev&eacute;sb&eacute; ismert, hogy nem sz&uuml;ks&eacute;gszerű a visszaes&eacute;s, mert rendszeres gy&oacute;gytorn&aacute;val &eacute;s kellő k&ouml;r&uuml;ltekint&eacute;ssel (az &eacute;rz&eacute;keny ter&uuml;let hidegtől &eacute;s huzatt&oacute;l val&oacute; v&eacute;d&eacute;ssel, a rossz &eacute;s hirtelen mozdulatok ker&uuml;l&eacute;s&eacute;vel) a visszat&eacute;r&eacute;s val&oacute;sz&iacute;nűs&eacute;ge jelentősen cs&ouml;kkenthető.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban az idősebbek &eacute;let&eacute;t keser&iacute;tik meg a gerincs&eacute;rv &eacute;s a meszesed&eacute;s. Mindkettőre j&oacute; hat&aacute;ssal lehet a gy&oacute;gytorn&aacute;sz &aacute;ltal megtan&iacute;tott gy&oacute;gytorna, amelyet ezut&aacute;n c&eacute;lszerű heti t&ouml;bb alkalommal otthon, &eacute;let&uuml;nk v&eacute;g&eacute;ig elv&eacute;gezni. Gerinc s&eacute;rv eset&eacute;ben nem csak a kock&aacute;zatos műt&eacute;tet ker&uuml;lhetj&uuml;k el, hanem es&eacute;ly&uuml;nk lehet a f&aacute;jdalom mentes vagy csak időszakosan enyhe vagy elviselhető f&aacute;jdalommal b&iacute;r&oacute; &eacute;letre.</p>\r\n	</li>\r\n	<li>\r\n	<p>Sokakat &eacute;rinthet a reflux (gyomorsav t&uacute;ltermel&eacute;s, nyelőcső kimar&oacute;d&aacute;s &eacute;s gyullad&aacute;s), amely tart&oacute;s rossz k&ouml;z&eacute;rzethez vezet &eacute;s v&aacute;ltoz&oacute; t&uuml;netekkel j&aacute;rhat. &Eacute;n magam f&eacute;l&eacute;vig &eacute;lveztem t&aacute;rsas&aacute;g&aacute;t &eacute;s b&aacute;r t&ouml;bb gy&oacute;gyint&eacute;zm&eacute;nyben t&ouml;bb orvosnak panaszkodtam, de nem ker&uuml;lt behat&aacute;rol&aacute;sra az ok. V&eacute;g&uuml;l taktik&aacute;t v&aacute;ltoztattam &eacute;s panaszkod&aacute;s helyett ezt k&eacute;rdeztem: Mondja doktor &uacute;r norm&aacute;lis az, hogy f&eacute;l&eacute;ve rossz a k&ouml;z&eacute;rzetem? A nemleges v&aacute;lasz ut&aacute;n r&eacute;szletesen kik&eacute;rdezett &eacute;s ut&aacute;na fel&iacute;rt egy gy&oacute;gyszert, amely hat&aacute;s&aacute;ra harmadnapra elm&uacute;ltak a panaszaim. Tanuls&aacute;g: panaszkod&oacute; t&uuml;netfelsorol&aacute;s helyett <strong>egy j&oacute;l megfogalmazott k&eacute;rd&eacute;s n&eacute;ha c&eacute;lravezetőbb lehet.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>M&aacute;r csak egy &aacute;ltalam kipr&oacute;b&aacute;lt n&eacute;pbetegs&eacute;g maradt h&aacute;tra: a stroke. Nekem az agyi infarktusos v&aacute;ltozat (agyl&aacute;gyul&aacute;s) jutott oszt&aacute;lyr&eacute;sz&uuml;l. Ez egy nagy falat, ennek r&eacute;szletez&eacute;s&eacute;t szakemberekre hagyom, aki a saj&aacute;t esetemre k&iacute;v&aacute;ncsi itt elolvashatja: <a href="http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23">http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Boldog nyugd&iacute;jask&eacute;nt hetente t&ouml;bb alkalommal cs&aacute;b&iacute;tanak ingyenes eg&eacute;szs&eacute;gfelm&eacute;r&eacute;snek &aacute;lc&aacute;zott term&eacute;kbemutat&oacute;kra. N&eacute;h&aacute;nyra elmentem &eacute;s az interneten is ut&aacute;nan&eacute;ztem a t&eacute;m&aacute;nak ezek ut&aacute;n <strong>az &aacute;ltal&aacute;nos jellemzők az al&aacute;bbiak:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Minimum m&aacute;sf&eacute;l &oacute;r&aacute;s &ndash;<strong> k&ouml;telezően v&eacute;gighallgatand&oacute;</strong> - v&aacute;ltoz&oacute; sz&iacute;nvonal&uacute; &eacute;s erősen h&eacute;zagos igazs&aacute;gtartalm&uacute; előad&aacute;s, amelyben <strong>t&ouml;bbsz&ouml;r megk&eacute;rdőjelezik a modern gy&oacute;gyszerek sz&uuml;ks&eacute;gess&eacute;g&eacute;t</strong>, szidj&aacute;k a kapzsi gy&oacute;gyszergy&aacute;rt&oacute;kat &eacute;s ezzel tulajdonk&eacute;ppen<strong> azok fel&iacute;r&oacute;it is negat&iacute;van &iacute;t&eacute;lik meg.</strong> L&eacute;nyeg az &aacute;ltaluk bemutatott az eg&eacute;szs&eacute;ges &eacute;lethez - szerint&uuml;k n&eacute;lk&uuml;l&ouml;zhetetlen - csodaterm&eacute;kek (v&aacute;ltozatos sk&aacute;la: v&iacute;zszűrő, csodaturmixg&eacute;p, csodaporsz&iacute;v&oacute;, amelyik m&eacute;g az atk&aacute;kkal is elb&aacute;nik, gőz&aacute;gy&uacute;, m&aacute;gneses massz&iacute;roz&oacute; szuper-&aacute;gy, stb.).</p>\r\n	</li>\r\n	<li>\r\n	<p>A be&iacute;g&eacute;rt ingyenes vizsg&aacute;lat (hőkamer&aacute;s felv&eacute;tel, k&eacute;tb&uuml;tyk&ouml;s magnetorezonanci&aacute;s &aacute;lműszer, stb. eredm&eacute;nye haszn&aacute;lhatatlan, &eacute;s/vagy ellenőrizhetetlen m&oacute;don sz&aacute;m&iacute;t&oacute;g&eacute;p adja az eredm&eacute;nyt, amely semmit mond&oacute; &eacute;s a val&oacute;s&aacute;ghoz semmi k&ouml;ze.</p>\r\n	</li>\r\n	<li>\r\n	<p>A cs&uacute;cspont a &bdquo;k&ouml;zpontb&oacute;l&rdquo; j&ouml;vő l&aacute;tv&aacute;nyosan felbontott extra &aacute;r kedvezm&eacute;nyek, amelyeket gyakran gyomorforgat&oacute; m&oacute;don kisorsolnak vagy jobb esetben majdnem mindenki megkap. A l&eacute;nyeg: a kedvezm&eacute;nyes &aacute;ron &aacute;rult k&eacute;sz&uuml;l&eacute;khez a bolti &aacute;r kb. t&iacute;zszeres&eacute;&eacute;rt juthatunk hozz&aacute;, de ez cs&uacute;csminős&eacute;g, ezzel szemben azonnal kell d&ouml;nteni &eacute;s d&ouml;nt&eacute;s&uuml;nket k&eacute;sőbb nem lesz m&oacute;dunk visszavonni!!! <strong>Rem&eacute;lem &ouml;sszefoglal&oacute;m kellőn elrettentő &eacute;s sokakat megk&iacute;m&eacute;lek a felesleges bosszankod&aacute;st&oacute;l.</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<ol start="15">\r\n	<li>\r\n	<p><strong>V&eacute;gezet&uuml;l az &ouml;sszegzett j&oacute; tan&aacute;csok:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Pr&oacute;b&aacute;lj megb&iacute;zni a kezelőorvosodban, (ez azt is jelenti, hogy az igazat mondom, &eacute;s a mulaszt&aacute;somat sem hallgatom el!)</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban <strong>haszn&aacute;l, ha a gy&oacute;gyszereket (az &ouml;sszeset!) &eacute; az elő&iacute;r&aacute;snak megfelelően beszedi az ember.</strong><img alt="smiley" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="smiley" /></p>\r\n	</li>\r\n	<li>\r\n	<p>Kr&oacute;nikus betegs&eacute;gek eset&eacute;n &eacute;s idős korban n&ouml;vekszik a beszedendő gy&oacute;gyszerek sz&aacute;ma, &iacute;gy egyre nagyobb odafigyel&eacute;st k&ouml;vetel az elő&iacute;r&aacute;sok betart&aacute;sa.</p>\r\n	</li>\r\n	<li>\r\n	<p>Egyes betegs&eacute;gek &eacute;letm&oacute;dv&aacute;lt&aacute;st k&ouml;vetelnek: di&eacute;t&aacute;t, rendszeres &eacute;s behat&aacute;rolt mozg&aacute;st, gy&oacute;gytorn&aacute;t. Ha ezeket elhanyagoljuk &eacute;letes&eacute;ly&uuml;nket / &eacute;letminős&eacute;g&uuml;nket cs&ouml;kkentj&uuml;k, esetleg m&aacute;sokra elker&uuml;lhető terheket rakunk.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Budapest, 2014.01.17. id. Darvas G&aacute;bor (legal&aacute;bb 60 &eacute;ve gyakorl&oacute; beteg)</p>\r\n', 0, 0, '', NULL, 12, 'háziorvos', '2014-04-28 19:47:41'),
(85, 'jogsi', 'Jogosítvány tájékoztató', 'jogosítvány, jogsi, vezetői engedély', '<p><span style="color:#0000CD"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:18px">Az oldal szerkeszt&eacute;s altt &aacute;ll!</span></span></span></p>\r\n\r\n<p><span style="color:#0000CD"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:18px">T&uuml;relm&eacute;t k&eacute;rem itt majd a vezetői enged&eacute;lyekkel kapcsolatos inform&aacute;ci&oacute;kat olvashatja.</span></span></span></p>\r\n', 0, 1, '', NULL, 12, 'háziorvos', '2014-04-28 19:47:41'),
(86, 'fejlesztes', 'Az oldal fejlesztés alatt áll!', '', '<p><strong><span style="color:#0000FF"><span style="font-size:14px">Sz&iacute;ves t&uuml;relm&eacute;t k&eacute;rj&uuml;k, l&aacute;togasson vissza k&eacute;sőbb.</span></span></strong></p>\r\n', 0, 0, '', NULL, 3, 'háziorvos', '2014-04-28 19:47:41'),
(87, 'home', 'Dr. Demo Demeter háziorvosi honlap bemutató oldal', 'háziorvos, körzeti orvos, orvosi rendelő', '<p><span style="font-family:times new roman,times,serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:16px">&Uuml;dv&ouml;z&ouml;lj&uuml;k a h&aacute;ziorvosok haszn&aacute;tat&aacute;ra k&eacute;sz&uuml;lt honlap bemutal&oacute; oldal&aacute;n!</span></span></span></p>\r\n\r\n<p><span style="font-family:times new roman,times,serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:16px">Ez a honlap mind a l&aacute;togat&oacute;k, mind a h&aacute;ziorvosok sz&aacute;m&aacute;ra bemutat&oacute; jellegű!!!!</span></span></span></p>\r\n\r\n<p><span style="font-family:times new roman,times,serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:16px">A honalon tal&aacute;lhat&oacute; inform&aacute;ci&oacute;k nem val&oacute;sak, k&eacute;rj&uuml;k a tov&aacute;bbiakban ezt a t&eacute;nyt fokozottan vegy&eacute;k figyelembe.</span></span></span></p>\r\n\r\n<p><span style="font-family:times new roman,times,serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:16px">B&aacute;rmilyen k&eacute;rd&eacute;s eset&eacute;n a minden oldal alj&aacute;n megjelenő DD Standard Kft linkre kattinva tudnak a fejlesztő &eacute;s forgalmaz&oacute; sz&aacute;m&aacute;ra &uuml;zenetet k&uuml;ldeni.</span></span></span></p>\r\n\r\n<p><span style="font-family:times new roman,times,serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:16px">Minden &eacute;szrev&eacute;telt k&ouml;sz&ouml;nettel fogadunk.</span></span></span></p>\r\n', 0, 0, '', NULL, 0, 'háziorvos', '2014-04-28 19:47:41'),
(88, 'rendelesiido/rendelesiido', 'Rendelési idő', 'rendelesi ido, rendelési idő, rendelés', '<h1><span style="color:#FF0000">Figyelem ennek a sornak atartalm&aacute;t megv&aacute;ltoztatni tilos!</span></h1>\r\n', 0, 0, '1', NULL, 0, 'háziorvos', '2014-04-28 19:47:41'),
(89, 'rendido', 'Rendeléshez kapcsolódó információk', '', '<h2><span style="color:#0000FF">Itt lehet felsorolni a legfontosabb tudnival&oacute;kat:</span></h2>\r\n\r\n<ul>\r\n	<li><span style="color:#0000FF">...</span></li>\r\n	<li><span style="color:#0000FF">...</span></li>\r\n</ul>\r\n', 0, 0, '', NULL, 0, 'háziorvos', '2014-04-28 19:47:41'),
(90, 'bemutatkozas', 'Magamról', 'önéletrajz, tanulmányok, hobbi', '<p>F&eacute;nyk&eacute;p helye</p>\r\n\r\n<p>iskolai, egyetemi tanulm&aacute;nyok,</p>\r\n\r\n<p>Mi&eacute;rt lettem h&aacute;ziorvos,</p>\r\n\r\n<p>Csal&aacute;d,</p>\r\n\r\n<p>hobbi.</p>\r\n', 0, 0, '1', NULL, 0, 'háziorvos', '2014-04-28 19:47:41');
INSERT INTO `content` (`id`, `name`, `title`, `descrption`, `content`, `noindex`, `is_active`, `contact_finish`, `url`, `id_orvos`, `szak_megnevezes`, `lastmod`) VALUES
(91, 'beteghirado', 'Egy 60 éve gyakorló beteg tapasztalatai', 'jótanácsok saját tapasztalatok alapján', '<p><strong>Tisztelt Eg&eacute;szs&eacute;ges &eacute;s Beteg T&aacute;rsaim!</strong></p>\r\n\r\n<p>Az al&aacute;bbiakban eg&eacute;szs&eacute;ggel &eacute;s a saj&aacute;t betegs&eacute;geimmel kapcsolatos tapasztalataimat szeretn&eacute;m megosztani 15 pontban.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Előbb vagy ut&oacute;bb, de tudom&aacute;sul kell venn&uuml;nk, hogy <strong>mindny&aacute;jan egy &eacute;let nevű hal&aacute;los betegs&eacute;gben szenved&uuml;nk! <img alt="smiley" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="smiley" /> <img alt="sad" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/sad_smile.gif" style="height:20px; width:20px" title="sad" /></strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Nem csak az &eacute;let&uuml;nk egyedi, megism&eacute;telhetetlen &eacute;s &ndash; az estleges neh&eacute;zs&eacute;ge vagy kil&aacute;t&aacute;stalans&aacute;ga ellen&eacute;re &ndash; <strong>igen &eacute;rt&eacute;kes, hanem a testi &eacute;s lelki eg&eacute;szs&eacute;g&uuml;nk is az,</strong> ez&eacute;rt c&eacute;lszerű d&ouml;nt&eacute;seinkn&eacute;l a hossz&uacute; t&aacute;v&uacute; eg&eacute;szs&eacute;gi kock&aacute;zatokat figyelembe venni &eacute;s eg&eacute;szs&eacute;g&uuml;nkre vigy&aacute;zni.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g szem&eacute;lyre szabott &eacute;s <strong>magunkhoz viszony&iacute;tva is relat&iacute;v!</strong> (Egy k&eacute;z vagy l&aacute;b n&eacute;lk&uuml;li ember &ndash; ha nem beteg &eacute;s megtal&aacute;lja az &eacute;letc&eacute;lj&aacute;t &eacute;s emberi kapcsolatait - <strong>b&aacute;r nehezebb k&ouml;r&uuml;lm&eacute;nyek k&ouml;z&ouml;tt &eacute;l, de az&eacute;rt eg&eacute;szs&eacute;ges!</strong> l&aacute;sda k&ouml;vetkező vide&oacute;t:&nbsp;<a href="http://www.youtube.com/watch?v=WmMenUD0pf8">http://www.youtube.com/watch?v=WmMenUD0pf8</a> )</p>\r\n	</li>\r\n	<li>\r\n	<p>Gyakran nem tudatosul benn&uuml;nk, hogy a felnőtt ember eg&eacute;szs&eacute;ges &eacute;letm&oacute;dja napi &aacute;tlagosan m&aacute;sf&eacute;l &oacute;ra intenz&iacute;v gyalogl&aacute;st vagy ezzel egyen&eacute;rt&eacute;kű mozg&aacute;smennyis&eacute;get ig&eacute;nyel. Term&eacute;szetesen ettől el lehet t&eacute;rni, <strong>de a mozg&aacute;shi&aacute;ny hossz&uacute;t&aacute;von eg&eacute;szs&eacute;g&uuml;nk rov&aacute;s&aacute;ra megy.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Fiatal korban nem el&eacute;g a k&aacute;ros szenved&eacute;lyektől (doh&aacute;nyz&aacute;s, alkohol, drog, j&aacute;t&eacute;kszenved&eacute;ly, sex) tart&oacute;zkodni, hanem<strong> hasznos szenved&eacute;lyek m&eacute;rt&eacute;kletes rendszeress&eacute;g&eacute;re (sport, kir&aacute;ndul&aacute;s, zene, stb. hobbi) kell t&ouml;rekedni.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Ismerni &eacute;s figyelni kell &ouml;nmagunkat (mindig tudjuk, hogy mikor ett&uuml;nk &eacute;s ittunk utolj&aacute;ra, mitől lesz szorul&aacute;sunk vagy hasmen&eacute;s&uuml;nk, stb.)</p>\r\n	</li>\r\n	<li>\r\n	<p>Ha t&ouml;bb&eacute;-kev&eacute;sb&eacute; ismerj&uuml;k magunkat, akkor nagyobb es&eacute;llyel tudjuk megk&uuml;l&ouml;nb&ouml;ztetni egy &aacute;tlagos h&aacute;ny&aacute;s, hasmen&eacute;ses betegs&eacute;get (amelyen ak&aacute;r &eacute;vente t&ouml;bbsz&ouml;r, minden k&ouml;vetkezm&eacute;ny n&eacute;lk&uuml;l &aacute;teshet&uuml;nk &eacute;s nem sz&uuml;ks&eacute;gszerű, hogy orvos megvizsg&aacute;ljon) egy ak&aacute;r &eacute;letvesz&eacute;lyes k&ouml;vetkezm&eacute;nnyel j&aacute;r&oacute; betegs&eacute;gtől. A mi szemsz&ouml;g&uuml;nkből a kettő k&ouml;z&ouml;tt egy l&eacute;nyeges k&uuml;l&ouml;nbs&eacute;g van: az ut&oacute;bbi esetben mielőbb menj&uuml;nk el az orvoshoz. Ha ezt nem tessz&uuml;k meg k&eacute;sőbb erős f&aacute;jdalmaink &eacute;s / vagy magas l&aacute;zunk lesz &eacute;s &eacute;letben marad&aacute;si es&eacute;ly&uuml;nk cs&ouml;kken. Ha orvoshoz megy&uuml;nk memoriz&aacute;ljuk vagy &iacute;rjuk fel a l&eacute;nyeges t&uuml;neteket &eacute;s <strong>pr&oacute;b&aacute;ljuk meg mindet &eacute;s l&eacute;nyegret&ouml;rően elmondani</strong>.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g fontos eleme az alv&aacute;s, ha ezzel probl&eacute;ma van f&aacute;rad&eacute;konyabbak lesz&uuml;nk, cs&ouml;kken a munkahelyi &eacute;s otthoni teljes&iacute;tm&eacute;ny&uuml;nk, romlik az &eacute;letminős&eacute;g&uuml;nk. Ez&eacute;rt ezt a probl&eacute;m&aacute;t ki kell vizsg&aacute;ltatni. Gyakori ok lehet a horkol&aacute;s, amely s&uacute;lyos estben a k&ouml;zelben alv&oacute;k alv&aacute;s&aacute;t nehez&iacute;ti &eacute;s a horkol&oacute; v&eacute;rnyom&aacute;s&aacute;t időszakosan k&aacute;ros m&eacute;rt&eacute;kben megemeli. <strong>Magunk &eacute;s hozz&aacute;nk tartoz&oacute;ik &eacute;rdek&eacute;ben a horkol&oacute;k </strong>k&eacute;rjenek beutal&oacute;t az alv&aacute;scenrtumba &eacute;s vizsg&aacute;ltass&aacute;k ki magukat: <a href="http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html">http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Volt szerencs&eacute;m megismerkedni a l&aacute;gy&eacute;ks&eacute;rvvel is (alhasi f&aacute;jdalom, esetleg kitapinthat&oacute; dudor), amellyel norm&aacute;l esetben nem t&uacute;l f&aacute;jdalmas &eacute;s a műt&eacute;t is rutinnak sz&aacute;m&iacute;t, ha időben orvoshoz megy&uuml;nk!</p>\r\n	</li>\r\n	<li>\r\n	<p>A gerincprobl&eacute;m&aacute;k szint&eacute;n sokat &eacute;rinthetnek, lumb&aacute;g&oacute; &ouml;r&ouml;meit m&aacute;r a huszon&eacute;vesek is &eacute;lvezhetik. Ez orvosi szempontb&oacute;l egy j&oacute; betegs&eacute;g, hiszen aki igaz&aacute;n elkapja, az a f&aacute;jdalmai miatt igen nagy val&oacute;sz&iacute;nűs&eacute;ggel orvoshoz fog fordulni. Tal&aacute;n kev&eacute;sb&eacute; ismert, hogy nem sz&uuml;ks&eacute;gszerű a visszaes&eacute;s, mert rendszeres gy&oacute;gytorn&aacute;val &eacute;s kellő k&ouml;r&uuml;ltekint&eacute;ssel (az &eacute;rz&eacute;keny ter&uuml;let hidegtől &eacute;s huzatt&oacute;l val&oacute; v&eacute;d&eacute;ssel, a rossz &eacute;s hirtelen mozdulatok ker&uuml;l&eacute;s&eacute;vel) a visszat&eacute;r&eacute;s val&oacute;sz&iacute;nűs&eacute;ge jelentősen cs&ouml;kkenthető.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban az idősebbek &eacute;let&eacute;t keser&iacute;tik meg a gerincs&eacute;rv &eacute;s a meszesed&eacute;s. Mindkettőre j&oacute; hat&aacute;ssal lehet a gy&oacute;gytorn&aacute;sz &aacute;ltal megtan&iacute;tott gy&oacute;gytorna, amelyet ezut&aacute;n c&eacute;lszerű heti t&ouml;bb alkalommal otthon, &eacute;let&uuml;nk v&eacute;g&eacute;ig elv&eacute;gezni. Gerinc s&eacute;rv eset&eacute;ben nem csak a kock&aacute;zatos műt&eacute;tet ker&uuml;lhetj&uuml;k el, hanem es&eacute;ly&uuml;nk lehet a f&aacute;jdalom mentes vagy csak időszakosan enyhe vagy elviselhető f&aacute;jdalommal b&iacute;r&oacute; &eacute;letre.</p>\r\n	</li>\r\n	<li>\r\n	<p>Sokakat &eacute;rinthet a reflux (gyomorsav t&uacute;ltermel&eacute;s, nyelőcső kimar&oacute;d&aacute;s &eacute;s gyullad&aacute;s), amely tart&oacute;s rossz k&ouml;z&eacute;rzethez vezet &eacute;s v&aacute;ltoz&oacute; t&uuml;netekkel j&aacute;rhat. &Eacute;n magam f&eacute;l&eacute;vig &eacute;lveztem t&aacute;rsas&aacute;g&aacute;t &eacute;s b&aacute;r t&ouml;bb gy&oacute;gyint&eacute;zm&eacute;nyben t&ouml;bb orvosnak panaszkodtam, de nem ker&uuml;lt behat&aacute;rol&aacute;sra az ok. V&eacute;g&uuml;l taktik&aacute;t v&aacute;ltoztattam &eacute;s panaszkod&aacute;s helyett ezt k&eacute;rdeztem: Mondja doktor &uacute;r norm&aacute;lis az, hogy f&eacute;l&eacute;ve rossz a k&ouml;z&eacute;rzetem? A nemleges v&aacute;lasz ut&aacute;n r&eacute;szletesen kik&eacute;rdezett &eacute;s ut&aacute;na fel&iacute;rt egy gy&oacute;gyszert, amely hat&aacute;s&aacute;ra harmadnapra elm&uacute;ltak a panaszaim. Tanuls&aacute;g: panaszkod&oacute; t&uuml;netfelsorol&aacute;s helyett <strong>egy j&oacute;l megfogalmazott k&eacute;rd&eacute;s n&eacute;ha c&eacute;lravezetőbb lehet.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>M&aacute;r csak egy &aacute;ltalam kipr&oacute;b&aacute;lt n&eacute;pbetegs&eacute;g maradt h&aacute;tra: a stroke. Nekem az agyi infarktusos v&aacute;ltozat (agyl&aacute;gyul&aacute;s) jutott oszt&aacute;lyr&eacute;sz&uuml;l. Ez egy nagy falat, ennek r&eacute;szletez&eacute;s&eacute;t szakemberekre hagyom, aki a saj&aacute;t esetemre k&iacute;v&aacute;ncsi itt elolvashatja: <a href="http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23">http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Boldog nyugd&iacute;jask&eacute;nt hetente t&ouml;bb alkalommal cs&aacute;b&iacute;tanak ingyenes eg&eacute;szs&eacute;gfelm&eacute;r&eacute;snek &aacute;lc&aacute;zott term&eacute;kbemutat&oacute;kra. N&eacute;h&aacute;nyra elmentem &eacute;s az interneten is ut&aacute;nan&eacute;ztem a t&eacute;m&aacute;nak ezek ut&aacute;n <strong>az &aacute;ltal&aacute;nos jellemzők az al&aacute;bbiak:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Minimum m&aacute;sf&eacute;l &oacute;r&aacute;s &ndash;<strong> k&ouml;telezően v&eacute;gighallgatand&oacute;</strong> - v&aacute;ltoz&oacute; sz&iacute;nvonal&uacute; &eacute;s erősen h&eacute;zagos igazs&aacute;gtartalm&uacute; előad&aacute;s, amelyben <strong>t&ouml;bbsz&ouml;r megk&eacute;rdőjelezik a modern gy&oacute;gyszerek sz&uuml;ks&eacute;gess&eacute;g&eacute;t</strong>, szidj&aacute;k a kapzsi gy&oacute;gyszergy&aacute;rt&oacute;kat &eacute;s ezzel tulajdonk&eacute;ppen<strong> azok fel&iacute;r&oacute;it is negat&iacute;van &iacute;t&eacute;lik meg.</strong> L&eacute;nyeg az &aacute;ltaluk bemutatott az eg&eacute;szs&eacute;ges &eacute;lethez - szerint&uuml;k n&eacute;lk&uuml;l&ouml;zhetetlen - csodaterm&eacute;kek (v&aacute;ltozatos sk&aacute;la: v&iacute;zszűrő, csodaturmixg&eacute;p, csodaporsz&iacute;v&oacute;, amelyik m&eacute;g az atk&aacute;kkal is elb&aacute;nik, gőz&aacute;gy&uacute;, m&aacute;gneses massz&iacute;roz&oacute; szuper-&aacute;gy, stb.).</p>\r\n	</li>\r\n	<li>\r\n	<p>A be&iacute;g&eacute;rt ingyenes vizsg&aacute;lat (hőkamer&aacute;s felv&eacute;tel, k&eacute;tb&uuml;tyk&ouml;s magnetorezonanci&aacute;s &aacute;lműszer, stb. eredm&eacute;nye haszn&aacute;lhatatlan, &eacute;s/vagy ellenőrizhetetlen m&oacute;don sz&aacute;m&iacute;t&oacute;g&eacute;p adja az eredm&eacute;nyt, amely semmit mond&oacute; &eacute;s a val&oacute;s&aacute;ghoz semmi k&ouml;ze.</p>\r\n	</li>\r\n	<li>\r\n	<p>A cs&uacute;cspont a &bdquo;k&ouml;zpontb&oacute;l&rdquo; j&ouml;vő l&aacute;tv&aacute;nyosan felbontott extra &aacute;r kedvezm&eacute;nyek, amelyeket gyakran gyomorforgat&oacute; m&oacute;don kisorsolnak vagy jobb esetben majdnem mindenki megkap. A l&eacute;nyeg: a kedvezm&eacute;nyes &aacute;ron &aacute;rult k&eacute;sz&uuml;l&eacute;khez a bolti &aacute;r kb. t&iacute;zszeres&eacute;&eacute;rt juthatunk hozz&aacute;, de ez cs&uacute;csminős&eacute;g, ezzel szemben azonnal kell d&ouml;nteni &eacute;s d&ouml;nt&eacute;s&uuml;nket k&eacute;sőbb nem lesz m&oacute;dunk visszavonni!!! <strong>Rem&eacute;lem &ouml;sszefoglal&oacute;m kellőn elrettentő &eacute;s sokakat megk&iacute;m&eacute;lek a felesleges bosszankod&aacute;st&oacute;l.</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<ol start="15">\r\n	<li>\r\n	<p><strong>V&eacute;gezet&uuml;l az &ouml;sszegzett j&oacute; tan&aacute;csok:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Pr&oacute;b&aacute;lj megb&iacute;zni a kezelőorvosodban, (ez azt is jelenti, hogy az igazat mondom, &eacute;s a mulaszt&aacute;somat sem hallgatom el!)</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban <strong>haszn&aacute;l, ha a gy&oacute;gyszereket (az &ouml;sszeset!) &eacute; az elő&iacute;r&aacute;snak megfelelően beszedi az ember.</strong><img alt="smiley" src="http://localhost/ho/js/ckeditor/plugins/smiley/images/regular_smile.gif" style="height:20px; width:20px" title="smiley" /></p>\r\n	</li>\r\n	<li>\r\n	<p>Kr&oacute;nikus betegs&eacute;gek eset&eacute;n &eacute;s idős korban n&ouml;vekszik a beszedendő gy&oacute;gyszerek sz&aacute;ma, &iacute;gy egyre nagyobb odafigyel&eacute;st k&ouml;vetel az elő&iacute;r&aacute;sok betart&aacute;sa.</p>\r\n	</li>\r\n	<li>\r\n	<p>Egyes betegs&eacute;gek &eacute;letm&oacute;dv&aacute;lt&aacute;st k&ouml;vetelnek: di&eacute;t&aacute;t, rendszeres &eacute;s behat&aacute;rolt mozg&aacute;st, gy&oacute;gytorn&aacute;t. Ha ezeket elhanyagoljuk &eacute;letes&eacute;ly&uuml;nket / &eacute;letminős&eacute;g&uuml;nket cs&ouml;kkentj&uuml;k, esetleg m&aacute;sokra elker&uuml;lhető terheket rakunk.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Budapest, 2014.01.17. id. Darvas G&aacute;bor (legal&aacute;bb 60 &eacute;ve gyakorl&oacute; beteg)</p>\r\n', 0, 0, '', NULL, 0, 'háziorvos', '2014-04-28 19:47:41'),
(92, 'jogsi', 'Jogosítvány tájékoztató', 'jogosítvány, jogsi, vezetői engedély', '<p><span style="color:#0000CD"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:18px">Az oldal szerkeszt&eacute;s altt &aacute;ll!</span></span></span></p>\r\n\r\n<p><span style="color:#0000CD"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:18px">T&uuml;relm&eacute;t k&eacute;rem itt majd a vezetői enged&eacute;lyekkel kapcsolatos inform&aacute;ci&oacute;kat olvashatja.</span></span></span></p>\r\n', 0, 1, '', NULL, 0, 'háziorvos', '2014-04-28 19:47:41'),
(283, 'klap', 'Házi- és gyermekorvosok', 'háziorvos, háziorvosok, gyerekorvos , gyerekorvosok', '<div id="fejlec"><a href="http://www.ddstandard.hu" id="logo"><img alt="DD Standard logo" src="http://www.ddstandard.hu/images/ddstandard_logo.png" /></a><a href="http://www.ddstandard.hu" id="felirat"><img alt="DD Standard Kft." src="http://www.ddstandard.hu/images/ddstandard_felirat.png" /></a></div>\r\n\r\n<h2 style="text-align:center"><span style="color:#0000CD">&Uuml;dv&ouml;z&ouml;lj&uuml;k a h&aacute;zi- &eacute;s gyermekorvosok honlaprendszer&eacute;n!</span></h2>\r\n\r\n<p><span style="font-size:16px"><span style="color:#000000">Fejleszt&eacute;s&uuml;nk eredm&eacute;nyek&eacute;nt, b&aacute;rmelyik h&aacute;zi- vagy gyermekorvos gyorsan, olcs&oacute;n &eacute;s</span><span style="color:#FF0000"><strong> p&aacute;r &oacute;rai</strong></span><span style="color:#000000"> r&aacute;ford&iacute;t&aacute;ssal saj&aacute;t honlaphoz juthat, &iacute;gy ki tudja haszn&aacute;lni a p&aacute;ciensek kapcsolattart&aacute;s&aacute;ban az internet ny&uacute;jtotta lehetős&eacute;geket. </span></span></p>\r\n\r\n<p><span style="font-size:16px"><span style="color:#000000">Mi nem &aacute;rulunk zs&aacute;kba macsk&aacute;t! A dem&oacute; honlapunkat megn&eacute;zheti, annak admin fel&uuml;let&eacute;t is kipr&oacute;b&aacute;lhatja itt: <a href="/12/home" target="_blank">Dem&oacute; honlap </a></span></span><span style="color:#000000">, </span><span style="font-size:16px"><span style="color:#000000">sőt a saj&aacute;t honlapj&aacute;t m&aacute;r az aj&aacute;nlat elk&uuml;ld&eacute;sekor l&aacute;thatja, kipr&oacute;b&aacute;lhatja &eacute;s a tartalm&aacute;t v&eacute;gleges&iacute;theti!<br />\r\nOrvosok az egy&eacute;b r&eacute;szletekről itt t&aacute;j&eacute;koz&oacute;dhatnak: </span><a href="/200/orvosok"><span style="color:#000000">/200/orvosok</span></a></span></p>\r\n\r\n<p><span style="font-size:16px"><span style="color:#000000">A p&aacute;ciensek visszajelz&eacute;s&eacute;t is &ouml;r&ouml;mmel fogadjuk, jelenleg ezt a kapcsolat oldalon kereszt&uuml;l a vagy k&ouml;vetkező e-mail c&iacute;men tehetik meg:&nbsp;<a href="mailto://dg@ddstandard.hu">mailto://dg@ddstandard.hu </a></span></span></p>\r\n\r\n<p><span style="color:#000000"><span style="font-size:16px">V&eacute;g&uuml;l egy kis magyar&aacute;zat a st&aacute;tusz &eacute;rtelmez&eacute;s&eacute;hez: <strong>OK</strong> = k&eacute;sz honlap, <strong>aj&aacute;nlati f&aacute;zis</strong> = a leendő felhaszn&aacute;l&oacute;nak aj&aacute;nlat k&uuml;ldve, <strong>elők&eacute;sz&iacute;tve</strong> = a honlap nyilv&aacute;nos adatok alapj&aacute;n felhaszn&aacute;l&aacute;sra elők&eacute;sz&iacute;t&eacute;sre ker&uuml;lt (a ker&uuml;leti jellemzőket figyelembe vett&uuml;k), <strong>Dem&oacute;</strong> = bemutat&oacute; oldal főleg a felhaszn&aacute;l&oacute;k sz&aacute;m&aacute;ra, itt az adminisztr&aacute;ci&oacute;s fel&uuml;let is kipr&oacute;b&aacute;lhat&oacute;!</span></span></p>\r\n\r\n<p><span style="color:#000000"><span style="font-size:16px">&Uuml;dv&ouml;zlettel</span></span></p>\r\n\r\n<p><span style="color:#000000"><span style="font-size:16px">id.Darvas G&aacute;bor</span></span></p>\r\n', 0, 0, '1', NULL, 200, '', '2014-03-10 17:27:54'),
(284, 'orvosok', 'Orvosok', 'háziorvos, háziorvosok, gyerekorvos, gyermekorvos, gyerekorvosok, gyermekorvosok', '<h3><span style="color:#0000CD"><strong>Tartalomjegyz&eacute;k</strong></span></h3>\r\n\r\n<p><strong><a href="#kelle">Sz&uuml;ks&eacute;g van-e a h&aacute;zi- &eacute;s gyermekorvosi honlapra?</a></strong><br />\r\n<strong><a href="#jellemzo">A hazi-orvosok.hu jellemzői&nbsp; </a></strong><br />\r\n<strong><a href="#Honlapmenet">Honlaphoz jut&aacute;s menete</a></strong><br />\r\n<strong><a href="#demo">Dem&oacute; oldal haszn&aacute;lata </a></strong><br />\r\n<strong><a href="#GYIK">Gyakran Ism&eacute;telt k&eacute;rd&eacute;sek</a></strong></p>\r\n\r\n<address><a name="kelle"></a> <span style="color:#0000CD"><strong>Sz&uuml;ks&eacute;g van-e a h&aacute;zi- &eacute;s gyermekorvosnak honlapra?</strong></span></address>\r\n\r\n<p>K&ouml;r&uuml;lbel&uuml;l k&eacute;t &eacute;ve folyamatosan figyelem a h&aacute;ziorvosok honlapjait, nehezen &eacute;rtettem meg, hogy mi&eacute;rt van ilyen kev&eacute;s belől&uuml;k. A magam r&eacute;sz&eacute;ről sz&aacute;mtalan előny&eacute;t l&aacute;tom az h&aacute;zi- &eacute;s gyermekorvosi honlapnak, ez&eacute;rt fektettem bele sok munk&aacute;t. Csak n&eacute;h&aacute;nyat emelek ki k&ouml;z&uuml;l&uuml;k:</p>\r\n\r\n<ul>\r\n	<li>Egyre feljebb tol&oacute;dik az a koroszt&aacute;lyszint, akik m&aacute;r mindent elsőnek az interneten keresnek. <strong>Fokozottan igaz ez a gyermekorvosokra, akikn&eacute;l a p&aacute;ciensek 100%-a akt&iacute;v internet haszn&aacute;l&oacute;!</strong></li>\r\n	<li>A telefonon t&ouml;rt&eacute;nő időpontfoglal&aacute;s &ndash;időh&ouml;z k&ouml;t&ouml;tts&eacute;ge miatt &ndash; neh&eacute;zkes, nem el&eacute;g p&aacute;ciensbar&aacute;t. A vend&eacute;gl&aacute;t&aacute;sban az internetes helyfoglal&aacute;s elterjedt &eacute;s hasznos. <strong>Mi&eacute;rt ne lehetne ugyanezt az orvosi rendel&eacute;si időpontfoglal&aacute;sra alkalmazni?</strong></li>\r\n	<li>Az interneten tall&oacute;zva t&ouml;bb olyan utal&aacute;st tal&aacute;lunk, amely k&eacute;rdő&iacute;ves betegs&eacute;gfelismer&eacute;si lehetős&eacute;get ismertet. (&Iacute;me egy p&eacute;lda: <u><a class="western" href="http://mno.hu/betegszoba/interneten-is-diagnosztizalhato-az-alzheimer-kor-1132040" target="_blank">http://mno.hu/betegszoba/interneten-is-diagnosztizalhato-az-alzheimer-kor-1132040</a></u> ). A k&ouml;zelj&ouml;vőben ezt az olcs&oacute; elj&aacute;r&aacute;st egyre gyakrabban &eacute;s egyre t&ouml;bb ter&uuml;leten fogj&aacute;k alkalmazni.</li>\r\n	<li>K&ouml;zismert, hogy korm&aacute;nyrendelet k&ouml;telezi a h&aacute;ziorvost, hogy az elő&iacute;rt időtartamon bel&uuml;l meg nem jelent p&aacute;cienseket vizsg&aacute;lj&aacute;k meg. Az elv j&oacute;, a megval&oacute;s&iacute;t&aacute;s k&eacute;rd&eacute;ses. Ahogy az is k&eacute;rd&eacute;ses, hogy egy lev&eacute;l hat&aacute;s&aacute;ra a rendelő felkeres&eacute;s&eacute;re felk&eacute;rt p&aacute;ciensek h&aacute;ny sz&aacute;zal&eacute;ka fog megjelenni? Tekintettel arra, hogy az előbbi kateg&oacute;ri&aacute;ba főleg a fiatalok ker&uuml;lnek be, ez&eacute;rt egy k&eacute;rdő&iacute;vet sokkal nagyobb es&eacute;llyel t&ouml;ltenek ki az interneten. Ha ez a k&eacute;rdő&iacute;v a tests&uacute;lyt, testmagass&aacute;got &eacute;s a hask&ouml;rfogatot, az alapvető &eacute;letviteli &eacute;s eg&eacute;szs&eacute;g&uuml;gyi k&eacute;rd&eacute;seket bek&eacute;ri (lassan a v&eacute;rnyom&aacute;sra is r&aacute; lehet k&eacute;rdezni, hiszen v&eacute;rnyom&aacute;sm&eacute;rő otthoni haszn&aacute;lata elterjed, ill. egyre t&ouml;bb patik&aacute;ban ingyenesen megm&eacute;rik), akkor az első szűr&eacute;s ak&aacute;r programmal is elv&eacute;gezhető &eacute;s dokument&aacute;lhat&oacute;, t&eacute;nyleges vizsg&aacute;lat csak t&uacute;ls&uacute;ly vagy egy&eacute;b kock&aacute;zat eset&eacute;n sz&uuml;ks&eacute;ges.</li>\r\n	<li>A megelőz&eacute;s &eacute;s t&aacute;j&eacute;koztat&aacute;s fontoss&aacute;g&aacute;hoz nem f&eacute;r k&eacute;ts&eacute;g, az m&aacute;r m&aacute;s k&eacute;rd&eacute;s, hogy mikor &eacute;s mit tud tenni &Ouml;n ennek &eacute;rdek&eacute;ben? Az internet &eacute;s a saj&aacute;t honlap ebben seg&iacute;t, a gyakran ism&eacute;tlődő k&eacute;rd&eacute;sekre a v&aacute;laszt egyszer kell meg&iacute;rni (vagy megkeresni az interneten, &eacute;s ha az korrekt, akkor el&eacute;g a hivatkoz&aacute;si c&iacute;met be&iacute;rni). Az idősp&oacute;rol&aacute;s tov&aacute;bb fokozhat&oacute;, ha &Ouml;n&ouml;k &ouml;ssze tudnak fogni, &eacute;s ezt a munk&aacute;t szakter&uuml;let, &eacute;rdeklőd&eacute;s, stb. ment&eacute;n felosztj&aacute;k maguk k&ouml;z&ouml;tt. A k&ouml;z&ouml;s programoz&aacute;s ter&uuml;let&eacute;n t&ouml;bbf&eacute;le igen j&oacute; gyakorlat &eacute;s f&oacute;rum alakult ki. Ennek egyik j&oacute; p&eacute;ld&aacute;ja a Stack Owerflow honlap, amelynek c&eacute;lja a sz&aacute;m&iacute;t&oacute;g&eacute;pes programoz&aacute;s k&ouml;zben felmer&uuml;lt k&eacute;rd&eacute;sek feltev&eacute;se &eacute;s megv&aacute;laszol&aacute;sa. A 2008-ban l&eacute;trehozott speci&aacute;lis blog 5 &eacute;v m&uacute;lva, m&aacute;r t&ouml;bb mint 1 900 000 regisztr&aacute;lt felhaszn&aacute;l&oacute;val rendelkezett &eacute;s t&ouml;bb mint 5,5 milli&oacute; k&eacute;rd&eacute;st tettek fel rajta (erről angol nyelvű ismertet&eacute;s itt olvashat&oacute;: <u><a class="western" href="http://en.wikipedia.org/wiki/Stack_Overflow_(website">http://en.wikipedia.org/wiki/Stack_Overflow_(website</a></u>)). Ez egy p&eacute;lda arra, hogy az internet seg&iacute;ts&eacute;g&eacute;vel t&eacute;rben &eacute;s időben elosztva, hogyan lehet k&ouml;z&ouml;sen egy speci&aacute;lis ter&uuml;leten egym&aacute;snak seg&iacute;teni. Ha &Ouml;n&ouml;k megfogalmazz&aacute;k ig&eacute;nyeiket, &uacute;gy a megval&oacute;s&iacute;t&aacute;st &eacute;s d&iacute;jtalan &uuml;zemeltet&eacute;s&eacute;t c&eacute;g&uuml;nk - kellő sz&aacute;m&uacute; honlap megrendel&eacute;s eset&eacute;n &ndash; sz&iacute;vesen elv&eacute;gzi.</li>\r\n</ul>\r\n\r\n<address><a name="jellemzo"></a> <strong>A hazi-orvosok.hu jellemzői</strong></address>\r\n\r\n<p>C&eacute;g&uuml;nk fejlesztői munk&aacute;ja nyom&aacute;n elk&eacute;sz&uuml;lt az &aacute;ltal&aacute;nos orvosi honlap, amely az al&aacute;bbi k&uuml;l&ouml;nlegess&eacute;gekkel rendelkezik:</p>\r\n\r\n<ul>\r\n	<li>Egyszerű fel&eacute;p&iacute;t&eacute;s, minden oldal tetej&eacute;n a rendel&eacute;sre vonatkoz&oacute; aktu&aacute;lis inform&aacute;ci&oacute;s sorral, amely naponta h&aacute;romszor m&aacute;s form&aacute;t mutat, &eacute;s a foly&oacute; vagy a legk&ouml;zelebbi rendel&eacute;sről ny&uacute;jt inform&aacute;ci&oacute;t, ez a sor elrejthető.</li>\r\n	<li>K&ouml;nnyen felrakhat&oacute; a be&aacute;ll&iacute;tott v&eacute;ghat&aacute;ridőig piros sz&iacute;nnel ki&iacute;rt figyelemfelh&iacute;v&oacute; &uuml;zenet (c&eacute;lszerűen: szabads&aacute;g, helyettes&iacute;t&eacute;s, stb.), amely minden oldal m&aacute;sodik sor&aacute;ban jelenhet meg.</li>\r\n	<li>K&ouml;z&ouml;s forr&aacute;sk&oacute;d, amely jelentősen k&ouml;nny&iacute;ti a tov&aacute;bbfejleszt&eacute;st, &eacute;s olcs&oacute; b&eacute;rl&eacute;si lehetős&eacute;get biztos&iacute;t, ugyanakkor lehetőv&eacute; teszi az egyedi megjelen&eacute;st.</li>\r\n	<li>A honlap t&aacute;mogatja a mobilalkalmaz&aacute;sokat, &iacute;gy az okos telefonokon is j&oacute;l haszn&aacute;lhat&oacute;.</li>\r\n	<li>&Aacute;ttekinthető adminisztr&aacute;ci&oacute;s fel&uuml;let, amely seg&iacute;ts&eacute;g&eacute;vel kieg&eacute;sz&iacute;theti, bőv&iacute;theti honlapj&aacute;t.</li>\r\n	<li>Az adminisztr&aacute;ci&oacute;s fel&uuml;leten tal&aacute;lhat&oacute; &bdquo;L&eacute;p&eacute;sről &ndash; l&eacute;p&eacute;sre&rdquo; t&aacute;j&eacute;koztat&oacute; oldalsor, amely seg&iacute;ts&eacute;g&eacute;vel a f&eacute;lk&eacute;sz honlap gyorsan &eacute;s egyszerűen befejezhető.</li>\r\n	<li>Term&eacute;szetesen c&eacute;g&uuml;nk rendelkez&eacute;sre &aacute;ll &ndash; megrendel&eacute;s eset&eacute;n - a honlap v&eacute;gleges&iacute;t&eacute;s elv&eacute;gz&eacute;s&eacute;re is.</li>\r\n	<li>A honlaprendszer folyamatos fejleszt&eacute;s&eacute;re &eacute;s az &Ouml;n&ouml;k t&aacute;j&eacute;koztat&oacute; munk&aacute;j&aacute;nak &ouml;sszehangol&aacute;s&aacute;ra t&ouml;reksz&uuml;nk,</li>\r\n	<li>Rugalmas &eacute;s v&aacute;laszthat&oacute; fizet&eacute;si felt&eacute;telek mellett igyekezt&uuml;nk a szerződ&eacute;si felt&eacute;teleket egyszerűs&iacute;teni, a megrendel&eacute;s lehetős&eacute;ge mellett a r&aacute;utal&oacute; magatart&aacute;st is figyelembe vessz&uuml;k.</li>\r\n	<li>Ebben az &eacute;vben a k&ouml;vetkező tov&aacute;bbfejleszt&eacute;st tervezz&uuml;k: az ig&eacute;nyek alapj&aacute;n: k&eacute;rdő&iacute;v vagy időpont foglal&aacute;si oldal.</li>\r\n</ul>\r\n\r\n<p>Terveink szerint minden &eacute;v november v&eacute;g&eacute;ig k&ouml;zz&eacute;tessz&uuml;k - az orvosok ig&eacute;nye alapj&aacute;n kialak&iacute;tott k&ouml;vetkező &eacute;vi fejleszt&eacute;si tervet.</p>\r\n\r\n<address><a name="Honlapmenet"></a> <strong>Honlaphoz jut&aacute;s menete</strong></address>\r\n\r\n<p>Jelenleg Budapesten ker&uuml;letenk&eacute;nt haladunk előre, egy-egy ker&uuml;let adatait felt&ouml;ltj&uuml;k, ezut&aacute;n a honlapokat fel&eacute;p&iacute;tj&uuml;k, ellenőrz&eacute;s ut&aacute;n k&ouml;vetkezik az aj&aacute;nlat &eacute;s a szerződ&eacute;stervezet elk&uuml;ld&eacute;se. A k&eacute;zhez kap&aacute;st&oacute;l sz&aacute;m&iacute;tva 45 nap &aacute;ll az orvos sz&aacute;m&aacute;ra, hogy ellenőrizze, kipr&oacute;b&aacute;lja &eacute;s d&ouml;nts&ouml;n. Ebben az időszakban jelentős &aacute;rkedvezm&eacute;ny &eacute;rhető el.</p>\r\n\r\n<p>A hazi-orvosok.hu c&iacute;men a v&eacute;gleges &eacute;s az aj&aacute;nlatra kik&uuml;ld&eacute;sre elk&eacute;sz&uuml;lt oldalak tal&aacute;lhat&oacute;k, de ezzel p&aacute;rhuzamosan enn&eacute;l t&ouml;bb elők&eacute;sz&iacute;tett oldal l&aacute;that&oacute; a szeiffert.ddstandard.hu c&iacute;men. Ez ut&oacute;bbi c&iacute;m szolg&aacute;l a folyamatos fejleszt&eacute;s internetes ellenőrz&eacute;s&eacute;re, illetve egyelőre a k&eacute;t oldal arra is lehetős&eacute;get biztos&iacute;t, hogy az aj&aacute;nlati szakaszban a leendő megrendelő k&eacute;t arculat k&ouml;z&uuml;l v&aacute;laszthasson.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<address><a name="demo"></a> <strong>Dem&oacute; oldal haszn&aacute;lata</strong></address>\r\n\r\n<p>A dem&oacute; oldal felhaszn&aacute;l&oacute;i fel&uuml;lete mindenkinek rendelkez&eacute;sre &aacute;ll az al&aacute;bbi linken: <u><a class="western" href="http://szeiffert.ddstandard.hu/12/home">http://szeiffert.ddstandard.hu/12/home</a></u>.</p>\r\n\r\n<p>Az adminisztr&aacute;tori fel&uuml;letet azonban csak a leendő megrendelők (h&aacute;zi- &eacute;s gyermekorvosok) &eacute;rhetik el. Ehhez az al&aacute;bbi linkre kattintva kell emailt k&uuml;ldeni:&nbsp;<u><a class="western" href="mailto:dg@ddstandard.hu?subject=admin%20hozzáférés%20kérés&amp;body=Tisztelt%20Szolgáltató!%0AKérem%20a%20a%20demó%20oldal%20admin%20felületéhez%20szükséges%20adatokat%20megküldeni.%0ANevem%3A.....................%0ARendelőm%20címe%3A...............................%0Atelefon%3A...............................%0AÜdvözlettel%0A.">dg@ddstandard.hu </a></u>Az email elk&uuml;ld&eacute;se előtt k&eacute;rj&uuml;k a kipontozott r&eacute;szeket kit&ouml;lteni. Az elker&uuml;lhetetlen ellenőrz&eacute;s ut&aacute;n eljuttatjuk &Ouml;nh&ouml;z a bel&eacute;p&eacute;shez sz&uuml;ks&eacute;ges adatokat.</p>\r\n\r\n<p>&Ouml;n - az internetes szab&aacute;lyokat betartva - szabadon m&oacute;dos&iacute;thatja a dem&oacute; oldal tartalm&aacute;t, de az al&aacute;bbi megk&ouml;t&eacute;seket figyelembe kell vennie:</p>\r\n\r\n<ul>\r\n	<li>Mivel egy dem&oacute; oldal van, &eacute;s nem kiz&aacute;rhat&oacute; a t&ouml;bb felhaszn&aacute;l&oacute;jel&ouml;lt egyidejű bel&eacute;p&eacute;se, ez&eacute;rt a tartalmak fel&uuml;l&iacute;r&oacute;dhatnak!\r\n	</li>\r\n	<li>A dem&oacute; oldalon a jelsz&oacute;v&aacute;ltoztat&aacute;s letilt&aacute;sra ker&uuml;lt!\r\n	</li>\r\n	<li>Naponta egyszer az eredeti tartalom vissza&aacute;ll&iacute;t&aacute;sra ker&uuml;l!\r\n	</li>\r\n</ul>\r\n\r\n<p>Javasoljuk, hogy az ismerked&eacute;st a Honlapbe&aacute;ll&iacute;t&aacute;s men&uuml;vel kezdje, itt r&eacute;szletes le&iacute;r&aacute;st tal&aacute;l a be&aacute;ll&iacute;t&aacute;s c&eacute;lszerű sorrendj&eacute;ről, &eacute;s tal&aacute;l egy visszajelző oldalt is, amelynek kit&ouml;lt&eacute;s&eacute;vel seg&iacute;teni tudja munk&aacute;nkat.</p>\r\n\r\n<p>J&oacute; pr&oacute;b&aacute;lgat&aacute;st k&iacute;v&aacute;nunk!</p>\r\n\r\n<address><a name="GYIK"></a> <strong>Gyakran</strong> <strong>ism&eacute;telt k&eacute;rd&eacute;sek</strong></address>\r\n\r\n<p>V&aacute;rjuk a k&eacute;rd&eacute;seket, amelyekre adott v&aacute;laszunkat itt is megjelentetj&uuml;k.</p>\r\n', 0, 1, '0', NULL, 200, '', '2014-07-20 19:50:01'),
(285, 'paciens', 'Páciensek', 'paciens, páciens, páciensek, beteg, betegek', '<h1><span style="color:#0000CD">Mi a p&aacute;ciensekre is gondolunk!</span></h1>\r\n\r\n<p><span style="font-size:16px"><span style="color:#000000">Szeretn&eacute;nk k&uuml;l&ouml;nb&ouml;ző lehetős&eacute;get biztos&iacute;tani &Ouml;n&ouml;knek, ehhez v&aacute;rjuk visszajelz&eacute;s&uuml;ket, k&eacute;rd&eacute;seiket az al&aacute;bbi e-mailen: <a href="mailto:dg@ddstandard.hu?subject=javaslat">dg@ddstandard.hu</a></span></span>.</p>\r\n\r\n<p><span style="font-size:16px"><span style="color:#000000">Hamarosan k&eacute;rdő&iacute;ves felm&eacute;r&eacute;st tesz&uuml;nk k&ouml;zz&eacute;.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 0, '0', NULL, 200, '', '2014-02-23 18:28:35');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `content0`
--

DROP TABLE IF EXISTS `content0`;
CREATE TABLE IF NOT EXISTS `content0` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `descrption` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `content` text COLLATE utf8_hungarian_ci,
  `noindex` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `contact_finish` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `id_orvos` int(11) DEFAULT NULL,
  `lastmod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=6 ;

--
-- A tábla adatainak kiíratása `content0`
--

INSERT INTO `content0` (`id`, `name`, `title`, `descrption`, `content`, `noindex`, `is_active`, `contact_finish`, `url`, `id_orvos`, `lastmod`) VALUES
(1, 'home', '$orvosnev háziorvos honlapja', 'háziorvos, körzeti orvos, orvosi rendelő', '<p>&Uuml;dv&ouml;zl&ouml;m!<br />\r\n$orvosnev h&aacute;ziorvos vagyok, honlapommal az &Ouml;n&ouml;k kapcsolattart&aacute;s&aacute;t szeretn&eacute;m moderniz&aacute;lni, időben kiterjeszteni.</p>\r\n\r\n<p>A rendel&eacute;si időt ide kattintva n&eacute;zhetik meg: <a href="/ho/$id_orvos/rendelesiido/rendelesiido">/ho/$id_orvos/rendelesiido/rendelesiido</a></p>\r\n\r\n<p>A k&ouml;rzethat&aacute;rokat itt ellenőrizhetik: <a href="/ho/$id_orvos/korzet/index">/ho/$id_orvos/korzet/index</a></p>\r\n\r\n<p>&Uuml;gyeleti inform&aacute;ci&oacute;kat &eacute;s egy&eacute;b t&aacute;j&eacute;koztat&aacute;sokat itt olvashat: <a href="/ho/$id_orvos/felvilagosit/index">/ho/$id_orvos/felvilagosit/index</a></p>\r\n', 0, 1, '1', '', 1, '0000-00-00 00:00:00'),
(2, 'rendelesiido/rendelesiido', 'Rendelési idő', 'rendelési idő, rendelesi ido, opening', '<p><strong><span style="color:#FF0000">Figyelem, ennek a sornak (rekordnak) a tartalm&aacute;t tilos megv&aacute;ltoztatni!!</span></strong></p>\r\n', 0, 0, '1', NULL, 1, '0000-00-00 00:00:00'),
(3, 'beteghirado', 'Beteghíradó', 'Jótanácsok saját  tapasztalatok alapján', '<p><strong>Tisztelt Eg&eacute;szs&eacute;ges &eacute;s Beteg T&aacute;rsaim!</strong></p>\r\n\r\n<p>Az al&aacute;bbiakban eg&eacute;szs&eacute;ggel &eacute;s a saj&aacute;t betegs&eacute;geimmel kapcsolatos tapasztalataimat szeretn&eacute;m megosztani 15 pontban.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Tudom&aacute;sul kell venn&uuml;nk, hogy <strong>mindny&aacute;jan egy &eacute;let nevű hal&aacute;los betegs&eacute;gben szenved&uuml;nk!</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Nem csak az &eacute;let&uuml;nk egyedi, megism&eacute;telhetetlen &eacute;s &ndash; az estleges neh&eacute;zs&eacute;ge vagy kil&aacute;t&aacute;stalans&aacute;ga ellen&eacute;re &ndash; <strong>igen &eacute;rt&eacute;kes, hanem a testi &eacute;s lelki eg&eacute;szs&eacute;g&uuml;nk is az,</strong> ez&eacute;rt c&eacute;lszerű d&ouml;nt&eacute;seinkn&eacute;l a hossz&uacute; t&aacute;v&uacute; eg&eacute;szs&eacute;gi kock&aacute;zatokat figyelembe venni &eacute;s eg&eacute;szs&eacute;g&uuml;nkre vigy&aacute;zni.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g szem&eacute;lyre szabott &eacute;s magunkhoz viszony&iacute;tva is relat&iacute;v! (Egy k&eacute;z vagy l&aacute;b n&eacute;lk&uuml;li ember &ndash; ha nem beteg &eacute;s megtal&aacute;lja az &eacute;letc&eacute;lj&aacute;t &eacute;s emberi kapcsolatait - b&aacute;r nehezebb k&ouml;r&uuml;lm&eacute;nyek k&ouml;z&ouml;tt &eacute;l, de az&eacute;rt eg&eacute;szs&eacute;ges!)</p>\r\n	</li>\r\n	<li>\r\n	<p>Gyakran nem tudatosul benn&uuml;nk, hogy a felnőtt ember eg&eacute;szs&eacute;ges &eacute;letm&oacute;dja napi &aacute;tlagosan m&aacute;sf&eacute;l &oacute;ra intenz&iacute;v gyalogl&aacute;st vagy ezzel egyen&eacute;rt&eacute;kű mozg&aacute;smennyis&eacute;get ig&eacute;nyel. Term&eacute;szetesen ettől el lehet t&eacute;rni, <strong>de a mozg&aacute;shi&aacute;ny hossz&uacute;t&aacute;von eg&eacute;szs&eacute;g&uuml;nk rov&aacute;s&aacute;ra megy.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>Fiatal korban nem el&eacute;g a k&aacute;ros szenved&eacute;lyektől (doh&aacute;nyz&aacute;s, alkohol, drog, j&aacute;t&eacute;kszenved&eacute;ly, sex) tart&oacute;zkodni, hanem hasznos szenved&eacute;lyek m&eacute;rt&eacute;kletes rendszeress&eacute;g&eacute;re (sport, kir&aacute;ndul&aacute;s, zene, stb. hobbi) kell t&ouml;rekedni.</p>\r\n	</li>\r\n	<li>\r\n	<p>Ismerni &eacute;s figyelni kell &ouml;nmagunkat (mindig tudjuk, hogy mikor ett&uuml;nk &eacute;s ittunk utolj&aacute;ra, mitől lesz szorul&aacute;sunk vagy hasmen&eacute;s&uuml;nk, stb.)</p>\r\n	</li>\r\n	<li>\r\n	<p>Ha t&ouml;bb&eacute;-kev&eacute;sb&eacute; ismerj&uuml;k magunkat, akkor nagyobb es&eacute;llyel tudjuk megk&uuml;l&ouml;nb&ouml;ztetni egy &aacute;tlagos h&aacute;ny&aacute;s, hasmen&eacute;ses betegs&eacute;get (amelyen ak&aacute;r &eacute;vente t&ouml;bbsz&ouml;r, minden k&ouml;vetkezm&eacute;ny n&eacute;lk&uuml;l &aacute;teshet&uuml;nk &eacute;s nem sz&uuml;ks&eacute;gszerű, hogy orvos megvizsg&aacute;ljon) egy ak&aacute;r &eacute;letvesz&eacute;lyes k&ouml;vetkezm&eacute;nnyel j&aacute;r&oacute; betegs&eacute;gtől. A mi szemsz&ouml;g&uuml;nkből a kettő k&ouml;z&ouml;tt egy l&eacute;nyeges k&uuml;l&ouml;nbs&eacute;g van: az ut&oacute;bbi esetben mielőbb menj&uuml;nk el az orvoshoz. Ha ezt nem tessz&uuml;k meg k&eacute;sőbb erős f&aacute;jdalmaink &eacute;s / vagy magas l&aacute;zunk lesz &eacute;s &eacute;letben marad&aacute;si es&eacute;ly&uuml;nk cs&ouml;kken.</p>\r\n	</li>\r\n	<li>\r\n	<p>Az eg&eacute;szs&eacute;g fontos eleme az alv&aacute;s, ha ezzel probl&eacute;ma van f&aacute;rad&eacute;konyabbak lesz&uuml;nk, cs&ouml;kken a munkahelyi &eacute;s otthoni teljes&iacute;tm&eacute;ny&uuml;nk, romlik az &eacute;letminős&eacute;g&uuml;nk. Ez&eacute;rt ezt a probl&eacute;m&aacute;t ki kell vizsg&aacute;ltatni. Gyakori ok lehet a horkol&aacute;s, amely s&uacute;lyos estben a k&ouml;zelben alv&oacute;k alv&aacute;s&aacute;t nehez&iacute;ti &eacute;s a horkol&oacute; v&eacute;rnyom&aacute;s&aacute;t időszakosan k&aacute;ros m&eacute;rt&eacute;kben megemeli. <strong>Magunk &eacute;s hozz&aacute;nk tartoz&oacute;ik &eacute;rdek&eacute;ben a horkol&oacute;k </strong>k&eacute;rjenek beutal&oacute;t az alv&aacute;scenrtumba &eacute;s vizsg&aacute;ltass&aacute;k ki magukat: <a href="http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html">http://www.alvascentrum.hu/budapest/allami-egeszsegugyi-kozpont-alvasdiagnosztikai-es-terapias-kozpont.html</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Volt szerencs&eacute;m megismerkedni a l&aacute;gy&eacute;ks&eacute;rvvel is (alhasi f&aacute;jdalom, esetleg kitapinthat&oacute; dudor), amellyel norm&aacute;l esetben nem t&uacute;l f&aacute;jdalmas &eacute;s a műt&eacute;t is rutinnak sz&aacute;m&iacute;t, ha időben orvoshoz megy&uuml;nk!</p>\r\n	</li>\r\n	<li>\r\n	<p>A gerincprobl&eacute;m&aacute;k szint&eacute;n sokat &eacute;rinthetnek, lumb&aacute;g&oacute; &ouml;r&ouml;meit m&aacute;r a huszon&eacute;vesek is &eacute;lvezhetik. Ez orvosi szempontb&oacute;l egy j&oacute; betegs&eacute;g, hiszen aki igaz&aacute;n elkapja, az a f&aacute;jdalmai miatt igen nagy val&oacute;sz&iacute;nűs&eacute;ggel orvoshoz fog fordulni. Tal&aacute;n kev&eacute;sb&eacute; ismert, hogy nem sz&uuml;ks&eacute;gszerű a visszaes&eacute;s, mert rendszeres gy&oacute;gytorn&aacute;val &eacute;s kellő k&ouml;r&uuml;ltekint&eacute;ssel (az &eacute;rz&eacute;keny ter&uuml;let hidegtől &eacute;s huzatt&oacute;l val&oacute; v&eacute;d&eacute;ssel, a rossz &eacute;s hirtelen mozdulatok ker&uuml;l&eacute;s&eacute;vel) a visszat&eacute;r&eacute;s val&oacute;sz&iacute;nűs&eacute;ge jelentősen cs&ouml;kkenthető.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban az idősebbek &eacute;let&eacute;t keser&iacute;tik meg a gerincs&eacute;rv &eacute;s a meszesed&eacute;s. Mindkettőre j&oacute; hat&aacute;ssal lehet a gy&oacute;gytorn&aacute;sz &aacute;ltal megtan&iacute;tott gy&oacute;gytorna, amelyet ezut&aacute;n c&eacute;lszerű heti t&ouml;bb alkalommal otthon, &eacute;let&uuml;nk v&eacute;g&eacute;ig elv&eacute;gezni. Gerinc s&eacute;rv eset&eacute;ben nem csak a kock&aacute;zatos műt&eacute;tet ker&uuml;lhetj&uuml;k el, hanem es&eacute;ly&uuml;nk lehet a f&aacute;jdalom mentes vagy csak időszakosan enyhe vagy elviselhető f&aacute;jdalommal b&iacute;r&oacute; &eacute;letre.</p>\r\n	</li>\r\n	<li>\r\n	<p>Sokakat &eacute;rinthet a reflux (gyomorsav t&uacute;ltermel&eacute;s, nyelőcső kimar&oacute;d&aacute;s &eacute;s gyullad&aacute;s), amely tart&oacute;s rossz k&ouml;z&eacute;rzethez vezet &eacute;s v&aacute;ltoz&oacute; t&uuml;netekkel j&aacute;rhat. &Eacute;n magam f&eacute;l&eacute;vig &eacute;lveztem t&aacute;rsas&aacute;g&aacute;t &eacute;s b&aacute;r t&ouml;bb gy&oacute;gyint&eacute;zm&eacute;nyben t&ouml;bb orvosnak panaszkodtam, de nem ker&uuml;lt behat&aacute;rol&aacute;sra az ok. V&eacute;g&uuml;l taktik&aacute;t v&aacute;ltoztattam &eacute;s panaszkod&aacute;s helyett ezt k&eacute;rdeztem: Mondja doktor &uacute;r norm&aacute;lis az, hogy f&eacute;l&eacute;ve rossz a k&ouml;z&eacute;rzetem? A nemleges v&aacute;lasz ut&aacute;n r&eacute;szletesen kik&eacute;rdezett &eacute;s ut&aacute;na fel&iacute;rt egy gy&oacute;gyszert, amely hat&aacute;s&aacute;ra harmadnapra elm&uacute;ltak a panaszaim. Tanuls&aacute;g: panaszkod&oacute; t&uuml;netfelsorol&aacute;s helyett <strong>egy j&oacute;l megfogalmazott k&eacute;rd&eacute;s n&eacute;ha c&eacute;lravezetőbb lehet.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p>M&aacute;r csak egy &aacute;ltalam kipr&oacute;b&aacute;lt n&eacute;pbetegs&eacute;g maradt h&aacute;tra: a stroke. Nekem az agyi infarktusos v&aacute;ltozat (agyl&aacute;gyul&aacute;s) jutott oszt&aacute;lyr&eacute;sz&uuml;l. Ez egy nagy falat, ennek r&eacute;szletez&eacute;s&eacute;t szakemberekre hagyom, aki a saj&aacute;t esetemre k&iacute;v&aacute;ncsi itt elolvashatja: <a href="http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23">http://errehab.hu/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=23</a></p>\r\n	</li>\r\n	<li>\r\n	<p>Boldog nyugd&iacute;jask&eacute;nt hetente t&ouml;bb alkalommal cs&aacute;b&iacute;tanak ingyenes eg&eacute;szs&eacute;gfelm&eacute;r&eacute;snek &aacute;lc&aacute;zott term&eacute;kbemutat&oacute;kra. N&eacute;h&aacute;nyra elmentem &eacute;s az interneten is ut&aacute;nan&eacute;ztem a t&eacute;m&aacute;nak ezek ut&aacute;n az &aacute;ltal&aacute;nos jellemzők az al&aacute;bbiak:</p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Minimum m&aacute;sf&eacute;l &oacute;r&aacute;s &ndash; k&ouml;telezően v&eacute;gighallgatand&oacute; - v&aacute;ltoz&oacute; sz&iacute;nvonal&uacute; &eacute;s erősen h&eacute;zagos igazs&aacute;gtartalm&uacute; előad&aacute;s, amelyben t&ouml;bbsz&ouml;r megk&eacute;rdőjelezik a modern gy&oacute;gyszerek sz&uuml;ks&eacute;gess&eacute;g&eacute;t, szidj&aacute;k a kapzsi gy&oacute;gyszergy&aacute;rt&oacute;kat &eacute;s ezzel tulajdonk&eacute;ppen azok fel&iacute;r&oacute;it is negat&iacute;van &iacute;t&eacute;lik meg. L&eacute;nyeg az &aacute;ltaluk bemutatott az eg&eacute;szs&eacute;ges &eacute;lethez - szerint&uuml;k n&eacute;lk&uuml;l&ouml;zhetetlen - csodaterm&eacute;kek (v&aacute;ltozatos sk&aacute;la: v&iacute;zszűrő, csodaturmixg&eacute;p, csodaporsz&iacute;v&oacute;, amelyik m&eacute;g az atk&aacute;kkal is elb&aacute;nik, gőz&aacute;gy&uacute;, m&aacute;gneses massz&iacute;roz&oacute; szuper-&aacute;gy, stb.).</p>\r\n	</li>\r\n	<li>\r\n	<p>A be&iacute;g&eacute;rt ingyenes vizsg&aacute;lat (hőkamer&aacute;s felv&eacute;tel, k&eacute;tb&uuml;tyk&ouml;s magnetorezonanci&aacute;s &aacute;lműszer, stb. eredm&eacute;nye haszn&aacute;lhatatlan, &eacute;s/vagy ellenőrizhetetlen m&oacute;don sz&aacute;m&iacute;t&oacute;g&eacute;p adja az eredm&eacute;nyt, amely semmit mond&oacute; &eacute;s a val&oacute;s&aacute;ghoz semmi k&ouml;ze.</p>\r\n	</li>\r\n	<li>\r\n	<p>A cs&uacute;cspont a &bdquo;k&ouml;zpontb&oacute;l&rdquo; j&ouml;vő l&aacute;tv&aacute;nyosan felbontott extra &aacute;r kedvezm&eacute;nyek, amelyeket gyakran gyomorforgat&oacute; m&oacute;don kisorsolnak vagy jobb esetben majdnem mindenki megkap. A l&eacute;nyeg: a kedvezm&eacute;nyes &aacute;ron &aacute;rult k&eacute;sz&uuml;l&eacute;khez a bolti &aacute;r kb. t&iacute;zszeres&eacute;&eacute;rt juthatunk hozz&aacute;, de ez cs&uacute;csminős&eacute;g, ezzel szemben azonnal kell d&ouml;nteni &eacute;s d&ouml;nt&eacute;s&uuml;nket k&eacute;sőbb nem lesz m&oacute;dunk visszavonni!!! <strong>Rem&eacute;lem &ouml;sszefoglal&oacute;m kellőn elrettentő &eacute;s sokakat megk&iacute;m&eacute;lek a felesleges bosszankod&aacute;st&oacute;l.</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<ol start="15">\r\n	<li>\r\n	<p><strong>V&eacute;gezet&uuml;l az &ouml;sszegzett j&oacute; tan&aacute;csok:</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Pr&oacute;b&aacute;lj megb&iacute;zni a kezelőorvosodban, (ez azt is jelenti, hogy az igazat mondom, &eacute;s a mulaszt&aacute;somat sem hallgatom el!)</p>\r\n	</li>\r\n	<li>\r\n	<p>&Aacute;ltal&aacute;ban haszn&aacute;l, ha a gy&oacute;gyszereket (az &ouml;sszeset!) az elő&iacute;r&aacute;snak megfelelően beszedi az ember.</p>\r\n	</li>\r\n	<li>\r\n	<p>Kr&oacute;nikus betegs&eacute;gek eset&eacute;n &eacute;s idős korban n&ouml;vekszik a beszedendő gy&oacute;gyszerek sz&aacute;ma, &iacute;gy egyre nagyobb odafigyel&eacute;st k&ouml;vetel az elő&iacute;r&aacute;sok betart&aacute;sa.</p>\r\n	</li>\r\n	<li>\r\n	<p>Egyes betegs&eacute;gek &eacute;letm&oacute;dv&aacute;lt&aacute;st k&ouml;vetelnek: di&eacute;t&aacute;t, rendszeres &eacute;s behat&aacute;rolt mozg&aacute;st, gy&oacute;gytorn&aacute;t. Ha ezeket elhanyagoljuk &eacute;letes&eacute;ly&uuml;nket cs&ouml;kkentj&uuml;k, esetleg m&aacute;sokra elker&uuml;lhető terheket rakunk.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Budapest, 2013.08.11. id. Darvas G&aacute;bor</p>\r\n\r\n<p>legal&aacute;bb 60 &eacute;ve gyakorl&oacute; beteg</p>\r\n\r\n<ol start="14">\r\n</ol>\r\n', 0, 1, '', '', 1, '0000-00-00 00:00:00'),
(4, 'bemutatkozas', 'Bemutatkozás', '$orvosnev, háziorvos,életrajz', '<p><img alt="" src="/ho/images/abris2.JPG" style="float:left; margin:5px 10px; width:100px" />Saj&aacute;t f&eacute;nyk&eacute;p</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nsz&uuml;let&eacute;si &eacute;v, hely<br />\r\nSpeci&aacute;lis tanulm&aacute;nyok<br />\r\nMi&eacute;rt lettem h&aacute;ziorvos<br />\r\nCsal&aacute;d<br />\r\nHobbi</p>\r\n', 0, 0, '0', '', 1, '0000-00-00 00:00:00'),
(5, 'rendido', 'Általános tudnivalók:', 'rendelés, ismertető, rendelési információk', '<ul>\n	<li>Csak recept vagy beutal&oacute; k&eacute;r&eacute;se eset&eacute;n k&eacute;rem, hogy a nőv&eacute;rn&eacute;l &aacute;lljanak sorba, ahol<strong> sorsz&aacute;m n&eacute;lk&uuml;l &eacute;s gyorsabban </strong>t&ouml;rt&eacute;nik a k&eacute;r&eacute;sek teljes&iacute;t&eacute;se!</li>\n	<li>Az orvos - rendk&iacute;v&uuml;li esetek kiv&eacute;tel&eacute;vel - az &eacute;rkez&eacute;skor h&uacute;zott sorsz&aacute;m alapj&aacute;n fogadja a p&aacute;cienseket,</li>\n	<li>20 darab sorsz&aacute;mozott k&aacute;rtya h&uacute;zhat&oacute;, ennek elfogy&aacute;sa eset&eacute;n tov&aacute;bbi p&aacute;cienseket nem tudok fogadni,</li>\n	<li>A rendel&eacute;si idő utols&oacute; &oacute;r&aacute;ja az - előzetesen időpontot foglalt betegek sz&aacute;m&aacute;ra van fenntartva.</li>\n	<li>Az alapos vizsg&aacute;lat &eacute;rdek&eacute;ben &oacute;r&aacute;nk&eacute;nt &aacute;tlagosan 4 - 7 beteget tudok vizsg&aacute;lni.</li>\n	<li>Sajnos az egyes vizsg&aacute;lati idő - az igen elt&eacute;rő vizsg&aacute;latok &eacute;s a v&aacute;ratlanul befut&oacute; telefonh&iacute;v&aacute;sok miatt - <strong>igen v&aacute;ltoz&oacute; lehet, ez&eacute;rt a kedves p&aacute;cienseim sz&iacute;ves t&uuml;relm&eacute;t k&eacute;rem!</strong></li>\n	<li>Nem sűrgős esetekben mindenkinek javaslom -<strong> a r&ouml;videbb v&aacute;rakoz&aacute;si idő miatt - a telefonon vagy az interneten t&ouml;rt&eacute;nő időpont foglal&aacute;st!</strong></li>\n</ul>\n\n<p>&Uuml;dv&ouml;zlettel</p>\n\n<p>$orvosnev h&aacute;ziorvos</p>\n', 0, 1, '', '<span class="red">Figyelem, a rekord name mező tartalmának <b>[rendido]</b> megváltoztatása a rendelési idő oldal hibáját eredményezheti!!!</span>', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felvilagosit`
--

DROP TABLE IF EXISTS `felvilagosit`;
CREATE TABLE IF NOT EXISTS `felvilagosit` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `rovid` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `hosszu` text COLLATE utf8_hungarian_ci,
  `megjegyzes` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `id_orvos` int(11) DEFAULT NULL,
  `lastmod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=95 ;

--
-- A tábla adatainak kiíratása `felvilagosit`
--

INSERT INTO `felvilagosit` (`id`, `name`, `title`, `link`, `rovid`, `hosszu`, `megjegyzes`, `id_orvos`, `lastmod`) VALUES
(25, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<b>Felnőtt ügyelet</b>\r\n<br><br>\r\n1173 Budapest, Egészségház utca 3.\r\n<br>\r\nTelefonszám:                  256-62-72\r\n<br>\r\nRendelési idő:                 0-24 óráig\r\n<br><br>\r\n<b>Gyermek ügyelet</b>\r\n<br>\r\nÉjszaka, hétvége és ünnepnapok\r\n<br>\r\nAmbuláns ellátás\r\n<br>\r\nAmbuláns ellátás: Heim Pál Gyermekkórház\r\n\r\n                             Budapest, Üllői út 86.\r\n<br>\r\n \r\n\r\n \r\n\r\n<b>Kijáró gyermekügyelet (Heim Pál Gyermekkórház)</b>\r\n\r\n264-33-14\r\n<br>\r\nFigyelem! A fenti információk 2013.08.09.- állapotot tükrözik!!!\r\n', 'Tulajdonos által ellenőrizendő!', 2, '0000-00-00 00:00:00'),
(26, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', 'A szakrendelések pontos listáját a következő linken nézheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendelések</a><br>\r\nKerületünk sajátossága, hogy bizonyos szakrendelések választhatóan az egészségház utcai szakrendelőben vagy a HT Medical Centerben vehető igénybe, de a beutaló kitöltése előtt dönteni kell, hogy melyik rendelő szolgáltatására tart igényt.', 'Tulajdonos által ellenőrizendő!!!!', 2, '0000-00-00 00:00:00'),
(27, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', 'Egy több mint hatvan éve gyakorló beteg 15 pontban összegzett tanácsai  azok számára, akik a betegtárs észrevételeire fogékonyak.', 'Tulajdonos által ellenőrizendő!', 2, '0000-00-00 00:00:00'),
(28, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', 'http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html\r\nhttp://www.oltopont.hu/az-influenza-veszelyes\r\nhttp://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945\r\n', 'Megfelelő link kiválasztandó, szöveg átalakítandó', 2, '0000-00-00 00:00:00'),
(30, 'dieta', 'Diéta előnyei', '', 'Röviden a diétákról', '- A diéta jelentősége\r\n- Leggyakoribb egészségügyi diéták \r\n- Fogyókúra diéták\r\n- Előnyök\r\n- Hátrányok, veszélyek', 'Ellenőrizendők', 2, '0000-00-00 00:00:00'),
(31, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<b>Felnőtt ügyelet</b>\r\n<br><br>\r\n1173 Budapest, Egészségház utca 3.\r\n<br>\r\nTelefonszám:                  256-62-72\r\n<br>\r\nRendelési idő:                 0-24 óráig\r\n<br><br>\r\n<b>Gyermek ügyelet</b>\r\n<br>\r\nÉjszaka, hétvége és ünnepnapok\r\n<br>\r\nAmbuláns ellátás\r\n<br>\r\nAmbuláns ellátás: Heim Pál Gyermekkórház\r\n\r\n                             Budapest, Üllői út 86.\r\n<br>\r\n \r\n\r\n \r\n\r\n<b>Kijáró gyermekügyelet (Heim Pál Gyermekkórház)</b>\r\n\r\n264-33-14\r\n<br>\r\nFigyelem! A fenti információk 2013.08.09.- állapotot tükrözik!!!\r\n', 'Tulajdonos által ellenőrizendő!', 3, '0000-00-00 00:00:00'),
(32, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', 'A szakrendelések pontos listáját a következő linken nézheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendelések</a><br>\r\nKerületünk sajátossága, hogy bizonyos szakrendelések választhatóan az egészségház utcai szakrendelőben vagy a HT Medical Centerben vehető igénybe, de a beutaló kitöltése előtt dönteni kell, hogy melyik rendelő szolgáltatására tart igényt.', 'Tulajdonos által ellenőrizendő!!!!', 3, '0000-00-00 00:00:00'),
(33, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', 'Egy több mint hatvan éve gyakorló beteg 15 pontban összegzett tanácsai  azok számára, akik a betegtárs észrevételeire fogékonyak.', 'Tulajdonos által ellenőrizendő!', 3, '0000-00-00 00:00:00'),
(34, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', 'http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html\r\nhttp://www.oltopont.hu/az-influenza-veszelyes\r\nhttp://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945\r\n', 'Megfelelő link kiválasztandó, szöveg átalakítandó', 3, '0000-00-00 00:00:00'),
(35, 'jogsi', 'Jogosítvány tájékoztató', 'fejlesztes', 'Jogosítvánnyal kapcsolatos tudnivallók', '', 'A "Hosszu" mező kitöltendő, a többi ellenőrizendő', 3, '0000-00-00 00:00:00'),
(36, 'dieta', 'Diéta előnyei', 'fejlesztes', 'Röviden a diétákról', '<ul>\r\n	<li>A di&eacute;ta jelentős&eacute;ge</li>\r\n	<li>Leggyakoribb eg&eacute;szs&eacute;g&uuml;gyi di&eacute;t&aacute;k</li>\r\n	<li>Fogy&oacute;k&uacute;ra di&eacute;t&aacute;k - Előny&ouml;k - H&aacute;tr&aacute;nyok, vesz&eacute;lyek</li>\r\n</ul>\r\n', 'Ellenőrizendők', 3, '0000-00-00 00:00:00'),
(37, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<b>Felnőtt ügyelet</b>\r\n<br><br>\r\n1173 Budapest, Egészségház utca 3.\r\n<br>\r\nTelefonszám:                  256-62-72\r\n<br>\r\nRendelési idő:                 0-24 óráig\r\n<br><br>\r\n<b>Gyermek ügyelet</b>\r\n<br>\r\nÉjszaka, hétvége és ünnepnapok\r\n<br>\r\nAmbuláns ellátás\r\n<br>\r\nAmbuláns ellátás: Heim Pál Gyermekkórház\r\n\r\n                             Budapest, Üllői út 86.\r\n<br>\r\n \r\n\r\n \r\n\r\n<b>Kijáró gyermekügyelet (Heim Pál Gyermekkórház)</b>\r\n\r\n264-33-14\r\n<br>\r\nFigyelem! A fenti információk 2013.08.09.- állapotot tükrözik!!!\r\n', 'Tulajdonos által ellenőrizendő!', 4, '0000-00-00 00:00:00'),
(38, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', 'A szakrendelések pontos listáját a következő linken nézheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendelések</a><br>\r\nKerületünk sajátossága, hogy bizonyos szakrendelések választhatóan az egészségház utcai szakrendelőben vagy a HT Medical Centerben vehető igénybe, de a beutaló kitöltése előtt dönteni kell, hogy melyik rendelő szolgáltatására tart igényt.', 'Tulajdonos által ellenőrizendő!!!!', 4, '0000-00-00 00:00:00'),
(39, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', 'Egy több mint hatvan éve gyakorló beteg 15 pontban összegzett tanácsai  azok számára, akik a betegtárs észrevételeire fogékonyak.', 'Tulajdonos által ellenőrizendő!', 4, '0000-00-00 00:00:00'),
(40, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', 'http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html\r\nhttp://www.oltopont.hu/az-influenza-veszelyes\r\nhttp://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945\r\n', 'Megfelelő link kiválasztandó, szöveg átalakítandó', 4, '0000-00-00 00:00:00'),
(41, 'jogsi', 'Jogosítvány tájékoztató', '', 'Jogosítvánnyal kapcsolatos tudnivallók', '', 'A "Hosszu" mező kitöltendő, a többi ellenőrizendő', 4, '0000-00-00 00:00:00'),
(42, 'dieta', 'Diéta előnyei', '', 'Röviden a diétákról', '- A diéta jelentősége\r\n- Leggyakoribb egészségügyi diéták \r\n- Fogyókúra diéták\r\n- Előnyök\r\n- Hátrányok, veszélyek', 'Ellenőrizendők', 4, '0000-00-00 00:00:00'),
(43, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<b>Felnőtt ügyelet</b>\r\n<br><br>\r\n1173 Budapest, Egészségház utca 3.\r\n<br>\r\nTelefonszám:                  256-62-72\r\n<br>\r\nRendelési idő:                 0-24 óráig\r\n<br><br>\r\n<b>Gyermek ügyelet</b>\r\n<br>\r\nÉjszaka, hétvége és ünnepnapok\r\n<br>\r\nAmbuláns ellátás\r\n<br>\r\nAmbuláns ellátás: Heim Pál Gyermekkórház\r\n\r\n                             Budapest, Üllői út 86.\r\n<br>\r\n \r\n\r\n \r\n\r\n<b>Kijáró gyermekügyelet (Heim Pál Gyermekkórház)</b>\r\n\r\n264-33-14\r\n<br>\r\nFigyelem! A fenti információk 2013.08.09.- állapotot tükrözik!!!\r\n', 'Tulajdonos által ellenőrizendő!', 1, '0000-00-00 00:00:00'),
(44, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', 'A szakrendelések pontos listáját a következő linken nézheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendelések</a><br>\r\nKerületünk sajátossága, hogy bizonyos szakrendelések választhatóan az egészségház utcai szakrendelőben vagy a HT Medical Centerben vehető igénybe, de a beutaló kitöltése előtt dönteni kell, hogy melyik rendelő szolgáltatására tart igényt.', 'Tulajdonos által ellenőrizendő!!!!', 1, '0000-00-00 00:00:00'),
(45, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', 'Egy több mint hatvan éve gyakorló beteg 15 pontban összegzett tanácsai  azok számára, akik a betegtárs észrevételeire fogékonyak.', 'Tulajdonos által ellenőrizendő!', 1, '0000-00-00 00:00:00'),
(46, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', 'http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html\r\nhttp://www.oltopont.hu/az-influenza-veszelyes\r\nhttp://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945\r\n', 'Megfelelő link kiválasztandó, szöveg átalakítandó', 1, '0000-00-00 00:00:00'),
(49, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<b>Felnőtt ügyelet</b>\r\n<br><br>\r\n1173 Budapest, Egészségház utca 3.\r\n<br>\r\nTelefonszám:                  256-62-72\r\n<br>\r\nRendelési idő:                 0-24 óráig\r\n<br><br>\r\n<b>Gyermek ügyelet</b>\r\n<br>\r\nÉjszaka, hétvége és ünnepnapok\r\n<br>\r\nAmbuláns ellátás\r\n<br>\r\nAmbuláns ellátás: Heim Pál Gyermekkórház\r\n\r\n                             Budapest, Üllői út 86.\r\n<br>\r\n \r\n\r\n \r\n\r\n<b>Kijáró gyermekügyelet (Heim Pál Gyermekkórház)</b>\r\n\r\n264-33-14\r\n<br>\r\nFigyelem! A fenti információk 2013.08.09.- állapotot tükrözik!!!\r\n', 'Tulajdonos által ellenőrizendő!', 6, '0000-00-00 00:00:00'),
(50, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', 'A szakrendelések pontos listáját a következő linken nézheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendelések</a><br>\r\nKerületünk sajátossága, hogy bizonyos szakrendelések választhatóan az egészségház utcai szakrendelőben vagy a HT Medical Centerben vehető igénybe, de a beutaló kitöltése előtt dönteni kell, hogy melyik rendelő szolgáltatására tart igényt.', 'Tulajdonos által ellenőrizendő!!!!', 6, '0000-00-00 00:00:00'),
(51, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', 'Egy több mint hatvan éve gyakorló beteg 15 pontban összegzett tanácsai  azok számára, akik a betegtárs észrevételeire fogékonyak.', 'Tulajdonos által ellenőrizendő!', 6, '0000-00-00 00:00:00'),
(52, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', 'http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html\r\nhttp://www.oltopont.hu/az-influenza-veszelyes\r\nhttp://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945\r\n', 'Megfelelő link kiválasztandó, szöveg átalakítandó', 6, '0000-00-00 00:00:00'),
(53, 'jogsi', 'Jogosítvány tájékoztató', '', 'Jogosítvánnyal kapcsolatos tudnivallók', '', 'A "Hosszu" mező kitöltendő, a többi ellenőrizendő', 6, '0000-00-00 00:00:00'),
(54, 'dieta', 'Diéta előnyei', '', 'Röviden a diétákról', '- A diéta jelentősége\r\n- Leggyakoribb egészségügyi diéták \r\n- Fogyókúra diéták\r\n- Előnyök\r\n- Hátrányok, veszélyek', 'Ellenőrizendők', 6, '0000-00-00 00:00:00'),
(55, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<b>Felnőtt ügyelet</b>\r\n<br><br>\r\n1173 Budapest, Egészségház utca 3.\r\n<br>\r\nTelefonszám:                  256-62-72\r\n<br>\r\nRendelési idő:                 0-24 óráig\r\n<br><br>\r\n<b>Gyermek ügyelet</b>\r\n<br>\r\nÉjszaka, hétvége és ünnepnapok\r\n<br>\r\nAmbuláns ellátás\r\n<br>\r\nAmbuláns ellátás: Heim Pál Gyermekkórház\r\n\r\n                             Budapest, Üllői út 86.\r\n<br>\r\n \r\n\r\n \r\n\r\n<b>Kijáró gyermekügyelet (Heim Pál Gyermekkórház)</b>\r\n\r\n264-33-14\r\n<br>\r\nFigyelem! A fenti információk 2013.08.09.- állapotot tükrözik!!!\r\n', 'Tulajdonos által ellenőrizendő!', 7, '0000-00-00 00:00:00'),
(56, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', 'A szakrendelések pontos listáját a következő linken nézheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendelések</a><br>\r\nKerületünk sajátossága, hogy bizonyos szakrendelések választhatóan az egészségház utcai szakrendelőben vagy a HT Medical Centerben vehető igénybe, de a beutaló kitöltése előtt dönteni kell, hogy melyik rendelő szolgáltatására tart igényt.', 'Tulajdonos által ellenőrizendő!!!!', 7, '0000-00-00 00:00:00'),
(57, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', 'Egy több mint hatvan éve gyakorló beteg 15 pontban összegzett tanácsai  azok számára, akik a betegtárs észrevételeire fogékonyak.', 'Tulajdonos által ellenőrizendő!', 7, '0000-00-00 00:00:00'),
(58, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', 'http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html\r\nhttp://www.oltopont.hu/az-influenza-veszelyes\r\nhttp://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945\r\n', 'Megfelelő link kiválasztandó, szöveg átalakítandó', 7, '0000-00-00 00:00:00'),
(59, 'jogsi', 'Jogosítvány tájékoztató', '', 'Jogosítvánnyal kapcsolatos tudnivallók', '', 'A "Hosszu" mező kitöltendő, a többi ellenőrizendő', 7, '0000-00-00 00:00:00'),
(60, 'dieta', 'Diéta előnyei', '', 'Röviden a diétákról', '- A diéta jelentősége\r\n- Leggyakoribb egészségügyi diéták \r\n- Fogyókúra diéták\r\n- Előnyök\r\n- Hátrányok, veszélyek', 'Ellenőrizendők', 7, '0000-00-00 00:00:00'),
(61, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<b>Felnőtt ügyelet</b>\r\n<br><br>\r\n1173 Budapest, Egészségház utca 3.\r\n<br>\r\nTelefonszám:                  256-62-72\r\n<br>\r\nRendelési idő:                 0-24 óráig\r\n<br><br>\r\n<b>Gyermek ügyelet</b>\r\n<br>\r\nÉjszaka, hétvége és ünnepnapok\r\n<br>\r\nAmbuláns ellátás\r\n<br>\r\nAmbuláns ellátás: Heim Pál Gyermekkórház\r\n\r\n                             Budapest, Üllői út 86.\r\n<br>\r\n \r\n\r\n \r\n\r\n<b>Kijáró gyermekügyelet (Heim Pál Gyermekkórház)</b>\r\n\r\n264-33-14\r\n<br>\r\nFigyelem! A fenti információk 2013.08.09.- állapotot tükrözik!!!\r\n', 'Tulajdonos által ellenőrizendő!', 8, '0000-00-00 00:00:00'),
(62, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', 'A szakrendelések pontos listáját a következő linken nézheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendelések</a><br>\r\nKerületünk sajátossága, hogy bizonyos szakrendelések választhatóan az egészségház utcai szakrendelőben vagy a HT Medical Centerben vehető igénybe, de a beutaló kitöltése előtt dönteni kell, hogy melyik rendelő szolgáltatására tart igényt.', 'Tulajdonos által ellenőrizendő!!!!', 8, '0000-00-00 00:00:00'),
(63, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', 'Egy több mint hatvan éve gyakorló beteg 15 pontban összegzett tanácsai  azok számára, akik a betegtárs észrevételeire fogékonyak.', 'Tulajdonos által ellenőrizendő!', 8, '0000-00-00 00:00:00'),
(64, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', 'http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html\r\nhttp://www.oltopont.hu/az-influenza-veszelyes\r\nhttp://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945\r\n', 'Megfelelő link kiválasztandó, szöveg átalakítandó', 8, '0000-00-00 00:00:00'),
(65, 'jogsi', 'Jogosítvány tájékoztató', '', 'Jogosítvánnyal kapcsolatos tudnivallók', '', 'A "Hosszu" mező kitöltendő, a többi ellenőrizendő', 8, '0000-00-00 00:00:00'),
(66, 'dieta', 'Diéta előnyei', '', 'Röviden a diétákról', '- A diéta jelentősége\r\n- Leggyakoribb egészségügyi diéták \r\n- Fogyókúra diéták\r\n- Előnyök\r\n- Hátrányok, veszélyek', 'Ellenőrizendők', 8, '0000-00-00 00:00:00'),
(67, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<b>Felnőtt ügyelet</b>\r\n<br><br>\r\n1173 Budapest, Egészségház utca 3.\r\n<br>\r\nTelefonszám:                  256-62-72\r\n<br>\r\nRendelési idő:                 0-24 óráig\r\n<br><br>\r\n<b>Gyermek ügyelet</b>\r\n<br>\r\nÉjszaka, hétvége és ünnepnapok\r\n<br>\r\nAmbuláns ellátás\r\n<br>\r\nAmbuláns ellátás: Heim Pál Gyermekkórház\r\n\r\n                             Budapest, Üllői út 86.\r\n<br>\r\n \r\n\r\n \r\n\r\n<b>Kijáró gyermekügyelet (Heim Pál Gyermekkórház)</b>\r\n\r\n264-33-14\r\n<br>\r\nFigyelem! A fenti információk 2013.08.09.- állapotot tükrözik!!!\r\n', 'Tulajdonos által ellenőrizendő!', 9, '0000-00-00 00:00:00'),
(68, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', 'A szakrendelések pontos listáját a következő linken nézheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendelések</a><br>\r\nKerületünk sajátossága, hogy bizonyos szakrendelések választhatóan az egészségház utcai szakrendelőben vagy a HT Medical Centerben vehető igénybe, de a beutaló kitöltése előtt dönteni kell, hogy melyik rendelő szolgáltatására tart igényt.', 'Tulajdonos által ellenőrizendő!!!!', 9, '0000-00-00 00:00:00'),
(69, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', 'Egy több mint hatvan éve gyakorló beteg 15 pontban összegzett tanácsai  azok számára, akik a betegtárs észrevételeire fogékonyak.', 'Tulajdonos által ellenőrizendő!', 9, '0000-00-00 00:00:00'),
(70, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', 'http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html\r\nhttp://www.oltopont.hu/az-influenza-veszelyes\r\nhttp://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945\r\n', 'Megfelelő link kiválasztandó, szöveg átalakítandó', 9, '0000-00-00 00:00:00'),
(71, 'jogsi', 'Jogosítvány tájékoztató', '', 'Jogosítvánnyal kapcsolatos tudnivallók', '', 'A "Hosszu" mező kitöltendő, a többi ellenőrizendő', 9, '0000-00-00 00:00:00'),
(72, 'dieta', 'Diéta előnyei', '', 'Röviden a diétákról', '- A diéta jelentősége\r\n- Leggyakoribb egészségügyi diéták \r\n- Fogyókúra diéták\r\n- Előnyök\r\n- Hátrányok, veszélyek', 'Ellenőrizendők', 9, '0000-00-00 00:00:00'),
(73, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<b>Felnőtt ügyelet</b>\r\n<br><br>\r\n1173 Budapest, Egészségház utca 3.\r\n<br>\r\nTelefonszám:                  256-62-72\r\n<br>\r\nRendelési idő:                 0-24 óráig\r\n<br><br>\r\n<b>Gyermek ügyelet</b>\r\n<br>\r\nÉjszaka, hétvége és ünnepnapok\r\n<br>\r\nAmbuláns ellátás\r\n<br>\r\nAmbuláns ellátás: Heim Pál Gyermekkórház\r\n\r\n                             Budapest, Üllői út 86.\r\n<br>\r\n \r\n\r\n \r\n\r\n<b>Kijáró gyermekügyelet (Heim Pál Gyermekkórház)</b>\r\n\r\n264-33-14\r\n<br>\r\nFigyelem! A fenti információk 2013.08.09.- állapotot tükrözik!!!\r\n', 'Tulajdonos által ellenőrizendő!', 10, '0000-00-00 00:00:00'),
(74, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', 'A szakrendelések pontos listáját a következő linken nézheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendelések</a><br>\r\nKerületünk sajátossága, hogy bizonyos szakrendelések választhatóan az egészségház utcai szakrendelőben vagy a HT Medical Centerben vehető igénybe, de a beutaló kitöltése előtt dönteni kell, hogy melyik rendelő szolgáltatására tart igényt.', 'Tulajdonos által ellenőrizendő!!!!', 10, '0000-00-00 00:00:00'),
(75, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', 'Egy több mint hatvan éve gyakorló beteg 15 pontban összegzett tanácsai  azok számára, akik a betegtárs észrevételeire fogékonyak.', 'Tulajdonos által ellenőrizendő!', 10, '0000-00-00 00:00:00'),
(76, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', 'http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html\r\nhttp://www.oltopont.hu/az-influenza-veszelyes\r\nhttp://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945\r\n', 'Megfelelő link kiválasztandó, szöveg átalakítandó', 10, '0000-00-00 00:00:00'),
(77, 'jogsi', 'Jogosítvány tájékoztató', '', 'Jogosítvánnyal kapcsolatos tudnivallók', '', 'A "Hosszu" mező kitöltendő, a többi ellenőrizendő', 10, '0000-00-00 00:00:00'),
(78, 'dieta', 'Diéta előnyei', '', 'Röviden a diétákról', '- A diéta jelentősége\r\n- Leggyakoribb egészségügyi diéták \r\n- Fogyókúra diéták\r\n- Előnyök\r\n- Hátrányok, veszélyek', 'Ellenőrizendők', 10, '0000-00-00 00:00:00'),
(79, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<b>Felnőtt ügyelet</b>\r\n<br><br>\r\n1173 Budapest, Egészségház utca 3.\r\n<br>\r\nTelefonszám:                  256-62-72\r\n<br>\r\nRendelési idő:                 0-24 óráig\r\n<br><br>\r\n<b>Gyermek ügyelet</b>\r\n<br>\r\nÉjszaka, hétvége és ünnepnapok\r\n<br>\r\nAmbuláns ellátás\r\n<br>\r\nAmbuláns ellátás: Heim Pál Gyermekkórház\r\n\r\n                             Budapest, Üllői út 86.\r\n<br>\r\n \r\n\r\n \r\n\r\n<b>Kijáró gyermekügyelet (Heim Pál Gyermekkórház)</b>\r\n\r\n264-33-14\r\n<br>\r\nFigyelem! A fenti információk 2013.08.09.- állapotot tükrözik!!!\r\n', 'Tulajdonos által ellenőrizendő!', 11, '0000-00-00 00:00:00'),
(80, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', 'A szakrendelések pontos listáját a következő linken nézheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendelések</a><br>\r\nKerületünk sajátossága, hogy bizonyos szakrendelések választhatóan az egészségház utcai szakrendelőben vagy a HT Medical Centerben vehető igénybe, de a beutaló kitöltése előtt dönteni kell, hogy melyik rendelő szolgáltatására tart igényt.', 'Tulajdonos által ellenőrizendő!!!!', 11, '0000-00-00 00:00:00'),
(81, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', 'Egy több mint hatvan éve gyakorló beteg 15 pontban összegzett tanácsai  azok számára, akik a betegtárs észrevételeire fogékonyak.', 'Tulajdonos által ellenőrizendő!', 11, '0000-00-00 00:00:00'),
(82, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', 'http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html\r\nhttp://www.oltopont.hu/az-influenza-veszelyes\r\nhttp://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945\r\n', 'Megfelelő link kiválasztandó, szöveg átalakítandó', 11, '0000-00-00 00:00:00'),
(83, 'jogsi', 'Jogosítvány tájékoztató', '', 'Jogosítvánnyal kapcsolatos tudnivallók', '', 'A "Hosszu" mező kitöltendő, a többi ellenőrizendő', 11, '0000-00-00 00:00:00'),
(84, 'dieta', 'Diéta előnyei', '', 'Röviden a diétákról', '- A diéta jelentősége\r\n- Leggyakoribb egészségügyi diéták \r\n- Fogyókúra diéták\r\n- Előnyök\r\n- Hátrányok, veszélyek', 'Ellenőrizendők', 11, '0000-00-00 00:00:00'),
(85, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<p><strong>Felnőtt &uuml;gyelet</strong><br />\r\n<br />\r\n1173 Budapest, Eg&eacute;szs&eacute;gh&aacute;z utca 3.<br />\r\nTelefonsz&aacute;m: 256-62-72<br />\r\nRendel&eacute;si idő: 0-24 &oacute;r&aacute;ig<br />\r\n<br />\r\n<strong>Gyermek &uuml;gyelet</strong><br />\r\n&Eacute;jszaka, h&eacute;tv&eacute;ge &eacute;s &uuml;nnepnapok<br />\r\nAmbul&aacute;ns ell&aacute;t&aacute;s<br />\r\nAmbul&aacute;ns ell&aacute;t&aacute;s: Heim P&aacute;l Gyermekk&oacute;rh&aacute;z Budapest, &Uuml;llői &uacute;t 86.<br />\r\n<strong>Kij&aacute;r&oacute; gyermek&uuml;gyelet (Heim P&aacute;l Gyermekk&oacute;rh&aacute;z)</strong> 264-33-14<br />\r\nFigyelem! A fenti inform&aacute;ci&oacute;k 2013.08.09.- &aacute;llapotot t&uuml;kr&ouml;zik!!!</p>\r\n', '', 12, '0000-00-00 00:00:00'),
(86, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', '<p>A szakrendel&eacute;sek pontos list&aacute;j&aacute;t a k&ouml;vetkező linken n&eacute;zheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendel&eacute;sek</a><br />\r\nKer&uuml;let&uuml;nk saj&aacute;toss&aacute;ga, hogy bizonyos szakrendel&eacute;sek v&aacute;laszthat&oacute;an az eg&eacute;szs&eacute;gh&aacute;z utcai szakrendelőben vagy a HT Medical Centerben vehető ig&eacute;nybe, de a beutal&oacute; kit&ouml;lt&eacute;se előtt d&ouml;nteni kell, hogy melyik rendelő szolg&aacute;ltat&aacute;s&aacute;ra tart ig&eacute;nyt.</p>\r\n', '', 12, '0000-00-00 00:00:00'),
(87, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', '<p>Egy t&ouml;bb mint hatvan &eacute;ve gyakorl&oacute; beteg 15 pontban &ouml;sszegzett tan&aacute;csai azok sz&aacute;m&aacute;ra, akik a betegt&aacute;rs &eacute;szrev&eacute;teleire fog&eacute;konyak.</p>\r\n', '', 12, '0000-00-00 00:00:00'),
(88, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', '<p>http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html http://www.oltopont.hu/az-influenza-veszelyes http://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945</p>\r\n', '', 12, '0000-00-00 00:00:00'),
(89, 'jogsi', 'Jogosítvány tájékoztató', 'jogsi', 'Jogosítvánnyal kapcsolatos tudnivallók', '<p>Itt a jogos&iacute;tv&aacute;ny &eacute;s egy&eacute;b fizető eg&eacute;szs&eacute;g&uuml;gyi vizsg&aacute;latokr&oacute;l lesz t&aacute;j&eacute;koztat&aacute;s.</p>\r\n', '', 12, '0000-00-00 00:00:00'),
(90, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<p><strong>Felnőtt &uuml;gyelet</strong><br />\r\n<br />\r\n1173 Budapest, Eg&eacute;szs&eacute;gh&aacute;z utca 3.<br />\r\nTelefonsz&aacute;m: 256-62-72<br />\r\nRendel&eacute;si idő: 0-24 &oacute;r&aacute;ig<br />\r\n<br />\r\n<strong>Gyermek &uuml;gyelet</strong><br />\r\n&Eacute;jszaka, h&eacute;tv&eacute;ge &eacute;s &uuml;nnepnapok<br />\r\nAmbul&aacute;ns ell&aacute;t&aacute;s<br />\r\nAmbul&aacute;ns ell&aacute;t&aacute;s: Heim P&aacute;l Gyermekk&oacute;rh&aacute;z Budapest, &Uuml;llői &uacute;t 86.<br />\r\n<strong>Kij&aacute;r&oacute; gyermek&uuml;gyelet (Heim P&aacute;l Gyermekk&oacute;rh&aacute;z)</strong> 264-33-14<br />\r\nFigyelem! A fenti inform&aacute;ci&oacute;k 2013.08.09.- &aacute;llapotot t&uuml;kr&ouml;zik!!!</p>\r\n', '', 0, '0000-00-00 00:00:00'),
(91, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', '<p>A szakrendel&eacute;sek pontos list&aacute;j&aacute;t a k&ouml;vetkező linken n&eacute;zheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendel&eacute;sek</a><br />\r\nKer&uuml;let&uuml;nk saj&aacute;toss&aacute;ga, hogy bizonyos szakrendel&eacute;sek v&aacute;laszthat&oacute;an az eg&eacute;szs&eacute;gh&aacute;z utcai szakrendelőben vagy a HT Medical Centerben vehető ig&eacute;nybe, de a beutal&oacute; kit&ouml;lt&eacute;se előtt d&ouml;nteni kell, hogy melyik rendelő szolg&aacute;ltat&aacute;s&aacute;ra tart ig&eacute;nyt.</p>\r\n', '', 0, '0000-00-00 00:00:00'),
(92, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', '<p>Egy t&ouml;bb mint hatvan &eacute;ve gyakorl&oacute; beteg 15 pontban &ouml;sszegzett tan&aacute;csai azok sz&aacute;m&aacute;ra, akik a betegt&aacute;rs &eacute;szrev&eacute;teleire fog&eacute;konyak.</p>\r\n', '', 0, '0000-00-00 00:00:00'),
(93, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', '<p>http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html http://www.oltopont.hu/az-influenza-veszelyes http://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945</p>\r\n', '', 0, '0000-00-00 00:00:00'),
(94, 'jogsi', 'Jogosítvány tájékoztató', 'jogsi', 'Jogosítvánnyal kapcsolatos tudnivallók', '<p>Itt a jogos&iacute;tv&aacute;ny &eacute;s egy&eacute;b fizető eg&eacute;szs&eacute;g&uuml;gyi vizsg&aacute;latokr&oacute;l lesz t&aacute;j&eacute;koztat&aacute;s.</p>\r\n', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felvilagosit0`
--

DROP TABLE IF EXISTS `felvilagosit0`;
CREATE TABLE IF NOT EXISTS `felvilagosit0` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `rovid` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `hosszu` text COLLATE utf8_hungarian_ci,
  `megjegyzes` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `id_orvos` int(11) DEFAULT NULL,
  `szak_megnevezes` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `irszam` int(11) NOT NULL,
  `lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=7 ;

--
-- A tábla adatainak kiíratása `felvilagosit0`
--

INSERT INTO `felvilagosit0` (`id`, `name`, `title`, `link`, `rovid`, `hosszu`, `megjegyzes`, `id_orvos`, `szak_megnevezes`, `irszam`, `lastmod`) VALUES
(1, 'ugyelet', 'Ügyeleti információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Ugyelet.aspx', 'Budapest XVII. kerület orvosi ügyeleti információk', '<b>Felnőtt ügyelet</b>\r\n<br><br>\r\n1173 Budapest, Egészségház utca 3.\r\n<br>\r\nTelefonszám:                  256-62-72\r\n<br>\r\nRendelési idő:                 0-24 óráig\r\n<br><br>\r\n<b>Gyermek ügyelet</b>\r\n<br>\r\nÉjszaka, hétvége és ünnepnapok\r\n<br>\r\nAmbuláns ellátás\r\n<br>\r\nAmbuláns ellátás: Heim Pál Gyermekkórház\r\n\r\n                             Budapest, Üllői út 86.\r\n<br>\r\n \r\n\r\n \r\n\r\n<b>Kijáró gyermekügyelet (Heim Pál Gyermekkórház)</b>\r\n\r\n264-33-14\r\n<br>\r\nFigyelem! A fenti információk 2013.08.09.- állapotot tükrözik!!!\r\n', 'Tulajdonos által ellenőrizendő!', 1, '', 117, '0000-00-00 00:00:00'),
(2, 'szakrendeles', 'Szakrendelési és beutalási információk', 'http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx', 'Beutaló nélkül igénybevehető szakrandelések: sebészet, szemészet, urulógia,..  Az összes többi szakrendelés beutaló köteles és időpont előjegyzés szükséges!', 'A szakrendelések pontos listáját a következő linken nézheti meg: <a href="http://www.rakosmente.hu/intezmenyek/egeszsegugyi_intezmenyek/Rendelointezetek.aspx">Bp. XVII. ker. szakrendelések</a><br>\r\nKerületünk sajátossága, hogy bizonyos szakrendelések választhatóan az egészségház utcai szakrendelőben vagy a HT Medical Centerben vehető igénybe, de a beutaló kitöltése előtt dönteni kell, hogy melyik rendelő szolgáltatására tart igényt.', 'Tulajdonos által ellenőrizendő!!!!', 1, '', 117, '0000-00-00 00:00:00'),
(3, 'idbeteg', 'beteghíradó', 'beteghirado', 'Sok betegséggel megáldott nyugdíjasként kijelenthetem, hogy a megelőzésben, a felismerésben és a felgyógyulásban a beteg maga is aktívan részt vehet! ', 'Egy több mint hatvan éve gyakorló beteg 15 pontban összegzett tanácsai  azok számára, akik a betegtárs észrevételeire fogékonyak.', 'Tulajdonos által ellenőrizendő!', 1, '', 117, '0000-00-00 00:00:00'),
(4, 'influenza', 'Milyen tünetei vannak az influenzának?', 'http://efrira1.antsz.hu/hajdu/osztalyok/jarvanyugy/influenza.html', 'Az influenza története, tünetei, kezelése', 'http://www.egeszsegtukor.hu/ferfitukor/mit-jelent-az-influenza-.html\r\nhttp://www.oltopont.hu/az-influenza-veszelyes\r\nhttp://www.hazipatika.com/napi_egeszseg/fertozo_betegsegek/cikkek/az_influenza_a_legfertozobb_betegseg/20000905102945\r\n', 'Megfelelő link kiválasztandó, szöveg átalakítandó', 1, '', 117, '0000-00-00 00:00:00'),
(5, 'jogsi', 'Jogosítvány tájékoztató', '', 'Jogosítvánnyal kapcsolatos tudnivallók', '', 'A "Hosszu" mező kitöltendő, a többi ellenőrizendő', 1, '', 117, '0000-00-00 00:00:00'),
(6, 'dieta', 'Diéta előnyei', '', 'Röviden a diétákról', '- A diéta jelentősége\r\n- Leggyakoribb egészségügyi diéták \r\n- Fogyókúra diéták\r\n- Előnyök\r\n- Hátrányok, veszélyek', 'Ellenőrizendők', 1, '', 117, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kapcsolat`
--

DROP TABLE IF EXISTS `kapcsolat`;
CREATE TABLE IF NOT EXISTS `kapcsolat` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `email_to` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `body` text COLLATE utf8_hungarian_ci,
  `id_orvos` int(11) DEFAULT NULL,
  `lastmod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=19 ;

--
-- A tábla adatainak kiíratása `kapcsolat`
--

INSERT INTO `kapcsolat` (`id`, `name`, `subject`, `email`, `email_to`, `body`, `id_orvos`, `lastmod`) VALUES
(2, 'DeGe', 'próba12', 'darug@freemail.hu', '', 'safrgerthegjejegjdhj\r\nasgsfhwsrghs\r\nzrtutzu,rltzule\r\n', 1, '0000-00-00 00:00:00'),
(3, 'Darvas Gábor', 'tesztelés', 'dg@ddstandard.hu', '', 'tesztelés a többorvosos verzió miatt', 1, '0000-00-00 00:00:00'),
(4, 'DeGe', 'újabb próba', 'dg@ddstandard.hu', '', 'még hibás', 1, '0000-00-00 00:00:00'),
(5, 'DéGé', 'próba 2013.12.13.', 'darug@freemail.hu', '', 'Remélem gyorsan és hiánytalanul kézbesítik az üzeneteme!', NULL, '0000-00-00 00:00:00'),
(6, 'DéGé', 'próba 2013.12.13.', 'darug@freemail.hu', '', 'Remélem most már jó lesz a javított url!', NULL, '0000-00-00 00:00:00'),
(7, 'DéGé', 'próba12', 'darug@freemail.hu', '', 'ydafsdghdsgfjds', NULL, '0000-00-00 00:00:00'),
(8, 'dg', 'próba', 'darug@freemail.hu', '', 'próba', 10, '0000-00-00 00:00:00'),
(9, 'dg', 'próba a hazi-orvosok.hu-ról', 'darug@freemail.hu', '', 'Szeiffert próba: 2014.02.24', 1, '0000-00-00 00:00:00'),
(10, 'Próba Jancsi', 'próba', 'proba@proba.hu', 'dg@ddstandard.hu', 'Kíváncsi vagyok, hogy ez kihez jut el!\r\nÜdv.\r\nJancsi', 200, '2014-07-25 11:47:04'),
(11, 'Bártfai Balázsné', 'érdeklődés- kérés', 'gabi0322@gmail.com', 'dg@ddstandard.hu', 'Tisztelt Doktornő !\r\nEgy éve jártam Önnél gyomortükrözésen, tavasszal is voltam vizsgálaton. Szeretnék Önhöz visszamenni, mert szinte minden nap rossz a közérzetem. Sajnos a Medical Centerben csak október hónapra kaptam időpontot. Érdeklődnék, hogy háziorvosi szakrendelésén megkereshetem-e.\r\n\r\nMaradok tisztelettel.\r\nBártfai Balázsné', 3, '2014-08-12 12:24:20'),
(12, 'DeGE', 'próba', 'darug@freemail.hu', 'dg@ddstandard.hu', 'Próba üzenet, az orvos sorszámnak a tárgyban szögletes zárójelben meg kell jelennie!', 30, '2014-08-12 23:07:56'),
(13, 'DeGE', 'próba', 'darug@freemail.hu', 'dg@ddstandard.hu', 'Próba, tárgy kiegészítve az orvos id-vel!', 30, '2014-08-12 23:16:14'),
(14, 'DeGe', 'próba', 'darug@freemail.hu', 'dg@ddstandard.hu', '[ 15 ] működő verzió', 15, '2014-08-15 13:55:16'),
(15, 'Vígh-Kiss Erika Rozália', 'SOS kérdés, veszettséggel kapcsolatban', 'vighkisserik@gmail.com', 'dg@ddstandard.hu', 'Tisztelt Doktor Úr!\r\nEgy fontos kérdésben kérném a segítségét. Tudja, az a matektanár vagyok, aki a Gregorban tanított 4 évig, és Ön nagyon sokat segített sokszor a tanulmányaim, vizsgaidőszakaim során. :)\r\nSzeptember 3-6. között egy konferencián vettem részt Isztanbulban. Előtte a Dózsa György úti Nemzetközi Oltóközpontban beoltattam magam hepatitisz A+B, hastífusz, meningitisz ellen, de veszettség ellen éppen nem.  Szerdán, konferencia első napján egy macska odadörgölőzött hozzám az egyetemi büfében, Bogazici University, majd a jobb könyökömbe harapott. Ruhán (vékony hosszúujjú pólón) keresztül, így nem vérzett. Rengeteg macska van ott, házuk is van. Állítólag állatorvos felügyeli őket és oltva is vannak, de azért az ördög nem alszik. A helye fájt napokkal utána is, a fejem is néha, persze, a melegtől is lehetett ez utóbbi, régebben is szokott, akár légkonditól is. Aludni pár órát tudtam, ennek oka lehetett izgatottság, meleg, illetve most csütörtökön tudtam meg a hírt, hogy volt gyerekkori játszópajtásom rákban meghalt. Lázam nincs, viszont a jobb lapockám fölött furcsa bizsergést érzek pár perce. Ez a gépeléstől, huzattól van-e, nem tudom. Nem szeretném egyik kollégámat, tanítványomat sem, megharapni, a családomat meg pláne, úgyhogy biztos, ami biztos, átoltatom magam.  \r\nÚj munkahelyen vagyok szeptembertől, a Balassi Gimnáziumban tanítok majd. Nem szeretnék hiányozni a munkából, ha nem muszáj (ha vaklárma, pláne, és senkit sem kétségbeejteni). Így is rendkívül megértő az igazgatóság irányomban, hogy rögtön év elején elengedtek a konferenciára.\r\nNe haragudjon, hogy zavartam. Nagyon kérem, jelezze az ÁNTSZ felé, hogy mi a helyzet. Most este elmegyek az ügyeletre. ha ott nem tudnak segíteni, akkor holnap délután tanítás után mindenképpen elmegyek a Nemzetközi Oltóközpontba, ott biztosan van vakcinájuk, kedden délután pedig rendelési időben elmennék Önhöz.\r\nSegítségét, türelmét előre is hálásan köszönöm!\r\nTisztelettel, szeretettel: Vígh-Kiss Erika Rozália, 1171 Emlék utca 83. \r\n+36209825058', 1, '2014-09-07 17:43:45'),
(16, 'id. Darvas Gábor', 'próba levél', 'dg@ddstandard.hu', 'dg@ddstandard.hu', 'Kedves Gábor!\r\nHa ezt a leveled megkapod, akkor biztos lehetsz benne, hogy a hazi-orvosok.hu/kapcsolat oldalról küldött levelek eljutnak hozzád!\r\nMegköszönném, ha a levél elolvasása után egy rövid visszaigazolást küldenél.\r\nSzia\r\nGábor\r\n', 1, '2014-09-08 17:25:36'),
(17, 'id. Darvas Gábor', 'próba levél', 'dg@ddstandard.hu', 'dg@ddstandard.hu', 'Kedves Gábor!\r\nHa ezt a leveled megkapod, akkor biztos lehetsz benne, hogy a hazi-orvosok.hu/kapcsolat oldalról küldött levelek eljutnak hozzád!\r\nMegköszönném, ha a levél elolvasása után egy rövid visszaigazolást küldenél.\r\nSzia\r\nGábor', 1, '2014-09-08 17:40:43'),
(18, 'id. Darvas Gábor', 'próba levél', 'dg@ddstandard.hu', 'szeiffert@hazi-orvosok.hu', 'Kedves Gábor!\r\nHa ezt a leveled megkapod, akkor biztos lehetsz benne, hogy a hazi-orvosok.hu/kapcsolat oldalról küldött levelek eljutnak hozzád!\r\nMegköszönném, ha a levél elolvasása után egy rövid visszaigazolást küldenél.\r\nSzia\r\nGábor', 1, '2014-09-08 20:00:38');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `korzet`
--

DROP TABLE IF EXISTS `korzet`;
CREATE TABLE IF NOT EXISTS `korzet` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `irszam` int(11) DEFAULT NULL,
  `megjegyzes` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `kezdo_szam_paros` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `veg_szam_paros` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `kezdo_szam_paratlan` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `veg_szam_paratlan` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `utca` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `id_orvos` int(11) DEFAULT NULL,
  `id_rendelo` int(11) NOT NULL,
  `lastmod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=175 ;

--
-- A tábla adatainak kiíratása `korzet`
--

INSERT INTO `korzet` (`id`, `name`, `title`, `irszam`, `megjegyzes`, `kezdo_szam_paros`, `veg_szam_paros`, `kezdo_szam_paratlan`, `veg_szam_paratlan`, `utca`, `id_orvos`, `id_rendelo`, `lastmod`) VALUES
(1, 'also', 'Körzet', 1171, 'északi határ', '', '', '', '', 'Alsódabas utca', 1, 1, '0000-00-00 00:00:00'),
(2, 'Bojt', 'Körzet', 1171, '', '', '', '', '', 'Bojt utca', 1, 1, '0000-00-00 00:00:00'),
(3, 'Csgyongy', 'Körzet', 1171, 'vége', '70', '82', '55', '67', 'Csabagyöngye utca', 1, 1, '0000-00-00 00:00:00'),
(4, 'Cskut', 'Körzet', 1171, '', '', '', '', '', 'Csordakút utca', 1, 1, '0000-00-00 00:00:00'),
(5, 'edzo', 'Körzet', 1171, '', '', '', '', '', 'Edző utca', 1, 1, '0000-00-00 00:00:00'),
(6, 'emlek', 'Körzet', 1171, '', '', '', '', '', 'Emlék utca', 1, 1, '0000-00-00 00:00:00'),
(7, 'gombosi', 'Körzet', 1171, '', '', '', '', '', 'Gombosi utca', 1, 1, '0000-00-00 00:00:00'),
(8, 'izbeg', 'Körzet', 1171, 'csak az egyik oldal létezik, a másik szántóföld', '', '', '1', '21', 'Izbég utca', 1, 1, '0000-00-00 00:00:00'),
(9, 'kaszino', 'Körzet', 1171, '', '', '', '', '', 'Kaszinó utca', 1, 1, '0000-00-00 00:00:00'),
(10, 'lantos', 'Körzet', 1171, '', '', '', '', '', 'Lantos utca', 1, 1, '0000-00-00 00:00:00'),
(11, 'mezo', 'Körzet', 1171, '', '', '', '', '', 'Mező köz', 1, 1, '0000-00-00 00:00:00'),
(12, 'mezocsat', 'Körzet', 1171, '', '', '', '', '', 'Mezőcsát utca', 1, 1, '0000-00-00 00:00:00'),
(13, 'mezoor', 'Körzet', 1171, '', '', '', '', '', 'Mezőőr utca', 1, 1, '0000-00-00 00:00:00'),
(14, 'nemesbukk', 'Körzet', 1171, '', '2', '92', '1', '73', 'Nemesbükk utca', 1, 1, '0000-00-00 00:00:00'),
(15, 'nogradkovesd', 'Körzet', 1171, '', '', '', '', '', 'Nógrádkövesd utca', 1, 1, '0000-00-00 00:00:00'),
(16, 'nyitany', 'Körzet', 1171, 'Páratl oldal végszám ellenőrizendő!! ', '90', '102', '79', '91 ', 'Nyitány utca', 1, 1, '0000-00-00 00:00:00'),
(17, 'peceli', 'Körzet', 1171, '', '186', '190', '175', '181', 'Péceli utca', 1, 1, '0000-00-00 00:00:00'),
(18, 'peregi', 'Körzet', 1171, '', '2', '92', '1', '95', 'Peregi utca', 1, 1, '0000-00-00 00:00:00'),
(19, 'porzo', 'Körzet', 1171, '', '', '', '', '', 'Porzó utca', 1, 1, '0000-00-00 00:00:00'),
(20, 'Ramas', 'Körzet', 1171, '', '', '', '', '', 'Rámás utca', 1, 1, '0000-00-00 00:00:00'),
(21, 'res', 'Körzet', 1171, '', '', '', '', '', 'Rés utca', 1, 1, '0000-00-00 00:00:00'),
(22, 'rovatka', 'Körzet', 1171, '', '', '', '', '', 'Rovátka utca', 1, 1, '0000-00-00 00:00:00'),
(23, 'szabadhatar', 'Körzet', 1171, '', '', '', '', '', 'Szabadhatár utca', 1, 1, '0000-00-00 00:00:00'),
(24, 'szantho', 'Körzet', 1171, '', '2', '34', '1', '29', 'Szánthó Géza utca', 1, 1, '0000-00-00 00:00:00'),
(25, 'tanar', 'Körzet', 1171, '', '2', '58', '1', '89', 'Tanár utca', 1, 1, '0000-00-00 00:00:00'),
(26, 'vagi', 'Körzet', 1171, '', '', '', '', '', 'Vági utca', 1, 1, '0000-00-00 00:00:00'),
(27, 'zrinyi', 'Körzet', 1171, '', '2', '90', '1', '109', 'Zrinyi utca', 1, 1, '0000-00-00 00:00:00'),
(28, 'kreta', 'Körzet', 1171, '', '', '', '', '', 'Kréta utca', 1, 1, '0000-00-00 00:00:00'),
(41, 'agyagos', 'Körzet', 1171, '', '', '', '', '', 'Agyagos utca', 2, 1, '0000-00-00 00:00:00'),
(42, 'anna', 'Körzet', 1171, '', '38', 'végig', '35', 'végig', 'Anna utca', 2, 1, '0000-00-00 00:00:00'),
(43, 'arpadhazi', 'Körzet', 1171, '', '2', '', '3', '5', 'Árpád-házi Szent Erzsébet park', 2, 1, '0000-00-00 00:00:00'),
(44, 'csabagyongyekoz', 'Körzet', 1171, '', '', '', '', '', 'Csabagyöngye köz', 2, 1, '0000-00-00 00:00:00'),
(45, 'derkovits', 'Körzet', 1171, '', '', '', '', '', 'Derkovits tér', 2, 1, '0000-00-00 00:00:00'),
(46, 'fatyolvirag', 'Körzet', 1171, '', '', '', '', '', 'Fátyolvirág utca', 2, 1, '0000-00-00 00:00:00'),
(47, 'gombvirag', 'Körzet', 1171, '', '', '', '', '', 'Gömbvirág utca', 2, 1, '0000-00-00 00:00:00'),
(48, 'hoszirom', 'Körzet', 1171, '', '', '', '', '', 'Hószirom utca', 2, 1, '0000-00-00 00:00:00'),
(49, 'kalmar', 'Körzet', 1171, '', '', '', '', '', 'Kalmár utca', 2, 1, '0000-00-00 00:00:00'),
(50, 'kalmarvolgy', 'Körzet', 1171, '', '', '', '', '', 'Kalmárvölgy utca', 2, 1, '0000-00-00 00:00:00'),
(51, 'kecskefuz', 'Körzet', 1171, '', '', '', '', '', 'Kecskefűz utca', 2, 1, '0000-00-00 00:00:00'),
(52, 'keszeg', 'Körzet', 1171, '', '', '', '', '', 'Keszeg utca', 2, 1, '0000-00-00 00:00:00'),
(53, 'kisvarda', 'Körzet', 1171, '', '86', '108', '81', '107/b', 'Kisvárda utca', 2, 1, '0000-00-00 00:00:00'),
(54, 'kohur', 'Körzet', 1171, '', '', '', '', '', 'Kőhúr utca', 2, 1, '0000-00-00 00:00:00'),
(55, 'koromvirag', 'Körzet', 1171, '', '', '', '', '', 'Körömvirág utca', 2, 1, '0000-00-00 00:00:00'),
(56, 'lemberg', 'Körzet', 1171, '', '38', '114', '37', '107', 'Lemberg utca', 2, 1, '0000-00-00 00:00:00'),
(57, 'lepkeszeg', 'Körzet', 1171, '', '', '', '', '', 'Lepkeszeg utca', 2, 1, '0000-00-00 00:00:00'),
(58, 'lovesz', 'Körzet', 1171, '', '', '', '', '', 'Lövész utca', 2, 1, '0000-00-00 00:00:00'),
(59, 'mehecske', 'Körzet', 1171, '', '', '', '', '', 'Méhecske utca', 2, 1, '0000-00-00 00:00:00'),
(60, 'napoly', 'Körzet', 1171, '', '86', '120', '83', '97', 'Nápoly utca', 2, 1, '0000-00-00 00:00:00'),
(61, 'nyeremeny', 'Körzet', 1171, '', '', '', '', '', 'Nyeremény utca', 2, 1, '0000-00-00 00:00:00'),
(62, 'orchidea', 'Körzet', 1171, '', '', '', '', '', 'Orchidea utca', 2, 1, '0000-00-00 00:00:00'),
(63, 'ovono', 'Körzet', 1171, '', '38', 'végig folymatos', '', '', 'Óvónő utca', 2, 1, '0000-00-00 00:00:00'),
(64, 'rak', 'Körzet', 1171, '', '', '', '', '', 'Rák utca', 2, 1, '0000-00-00 00:00:00'),
(65, 'szabadsag', 'Körzet', 1171, '', '98', '124', '107', '125', 'Szabadság sugárút', 2, 1, '0000-00-00 00:00:00'),
(66, 'tanar', 'Körzet', 1171, '', '60', 'végig', '95', 'végig', 'Tanár utca', 2, 1, '0000-00-00 00:00:00'),
(67, 'tapiobicske', 'Körzet', 1173, '', '48', 'végig', '', '', 'Tápióbicske utca', 2, 1, '0000-00-00 00:00:00'),
(68, 'tubarozsa', 'Körzet', 1171, '', '', '', '', '', 'Tubarózsa utca', 2, 1, '0000-00-00 00:00:00'),
(69, 'battonyakoz', 'Körzet', 1171, '', '', '', '', '', 'Battonya köz', 3, 1, '0000-00-00 00:00:00'),
(70, 'battonya', 'Körzet', 1171, '', '', '', '', '', 'Battonya utca', 3, 1, '0000-00-00 00:00:00'),
(71, 'bordoce', 'Körzet', 1171, '', '', '', '', '', 'Bördöce utca', 3, 1, '0000-00-00 00:00:00'),
(72, 'czegledi', 'Körzet', 1171, '', '', '', '', '', 'Czeglédi Mihály utca', 3, 1, '0000-00-00 00:00:00'),
(73, 'csabavez', 'Körzet', 1171, '', '', '', '', '', 'Csaba vezér tér', 3, 1, '0000-00-00 00:00:00'),
(74, 'csabamezo', 'Körzet', 1171, '', '', '', '', '', 'Csabamező utca', 3, 1, '0000-00-00 00:00:00'),
(75, 'csapat', 'Körzet', 1171, '', '', '', '', '', 'Csapat köz', 3, 1, '0000-00-00 00:00:00'),
(76, 'dedes', 'Körzet', 1171, '', '', '', '', '', 'Dédes köz', 3, 1, '0000-00-00 00:00:00'),
(77, 'ebergeny', 'Körzet', 1171, '', '', '', '', '', 'Ebergény utca', 3, 1, '0000-00-00 00:00:00'),
(78, 'ecsedhazakoz', 'Körzet', 1171, '', '', '', '', '', 'Ecsedháza köz', 3, 1, '0000-00-00 00:00:00'),
(79, 'ecsedhaza', 'Körzet', 1171, '', '', '', '', '', 'Ecsedháza utca', 3, 1, '0000-00-00 00:00:00'),
(80, 'ecsedhazater', 'Körzet', 1171, '', '', '', '', '', 'Ecsedháza tér', 3, 1, '0000-00-00 00:00:00'),
(81, 'ede', 'Körzet', 1171, '', '', '', '', '', 'Ede utca', 3, 1, '0000-00-00 00:00:00'),
(82, 'felsoret', 'Körzet', 1171, '', '', '', '', '', 'Felsőrét dűlő', 3, 1, '0000-00-00 00:00:00'),
(83, 'fuzkut', 'Körzet', 1171, '', '', '', '', '', 'Fűzkút utca', 3, 1, '0000-00-00 00:00:00'),
(84, 'gerecsahida', 'Körzet', 1171, '', '', '', '', '', 'Gerecsahida utca', 3, 1, '0000-00-00 00:00:00'),
(85, 'gerencser', 'Körzet', 1171, '', '', '', '', '', 'Gerencsér utca', 3, 1, '0000-00-00 00:00:00'),
(86, 'gocsej', 'Körzet', 1171, '', '', '', '', '', 'Göcsej utca', 3, 1, '0000-00-00 00:00:00'),
(87, 'gyeplos', 'Körzet', 1171, '', '', '', '', '', 'Gyeplős utca', 3, 1, '0000-00-00 00:00:00'),
(88, 'iras', 'Körzet', 1171, '', '', '', '', '', 'Írás utca', 3, 1, '0000-00-00 00:00:00'),
(89, 'jo', 'Körzet', 1173, '', '', '', '', '', 'Jó utca', 3, 1, '0000-00-00 00:00:00'),
(90, 'kelecseny', 'Körzet', 1171, '', '', '', '', '', 'Kelecsény köz', 3, 1, '0000-00-00 00:00:00'),
(91, 'kendo', 'Körzet', 1171, '', '', '', '', '', 'Kendő utca', 3, 1, '0000-00-00 00:00:00'),
(92, 'kertalja', 'Körzet', 1171, '', '', '', '', '', 'Kertalja utca', 3, 1, '0000-00-00 00:00:00'),
(93, 'korso', 'Körzet', 1171, '', '', '', '', '', 'Korsó utca', 3, 1, '0000-00-00 00:00:00'),
(94, 'kurtos', 'Körzet', 1171, '', '', '', '', '', 'Kürtös utca', 3, 1, '0000-00-00 00:00:00'),
(95, 'laffert', 'Körzet', 1171, '', '', '', '', '', 'Laffert utca', 3, 1, '0000-00-00 00:00:00'),
(96, 'lajoshazakoz', 'Körzet', 1171, '', '', '', '', '', 'Lajosháza köz', 3, 1, '0000-00-00 00:00:00'),
(97, 'lajoshaza', 'Körzet', 1171, '', '', '', '', '', 'Lajosháza utca', 3, 1, '0000-00-00 00:00:00'),
(98, 'mavvallomas', 'Körzet', 1171, '', '', '', '', '', 'MÁV vasútállomás', 3, 1, '0000-00-00 00:00:00'),
(99, 'pallos', 'Körzet', 1171, '', '', '', '', '', 'Pallós utca', 3, 1, '0000-00-00 00:00:00'),
(100, 'pancel', 'Körzet', 1171, '', '', '', '', '', 'Pácél utca', 3, 1, '0000-00-00 00:00:00'),
(101, 'patak', 'Körzet', 1171, '', '', '', '', '', 'Patak utca', 3, 1, '0000-00-00 00:00:00'),
(102, 'peceli', 'Körzet', 1171, '', '192', 'végig', '183', 'végig', 'Péceli út', 3, 1, '0000-00-00 00:00:00'),
(103, 'poroly', 'Körzet', 1171, '', '', '', '', '', 'Pöröly utca', 3, 1, '0000-00-00 00:00:00'),
(104, 'poszmete', 'Körzet', 1171, '', '', '', '', '', 'Pöszméte utca', 3, 1, '0000-00-00 00:00:00'),
(105, 'rakoscsaba', 'Körzet', 1171, '', '', '', '', '', 'Rákoscsaba utca', 3, 1, '0000-00-00 00:00:00'),
(106, 'rizskalasz', 'Körzet', 1171, '', '', '', '', '', 'Rizskalász utca', 3, 1, '0000-00-00 00:00:00'),
(107, 'szantho', 'Körzet', 1171, '', '36', 'végig', '29/b', 'végig', 'Szánthó Géza utca', 3, 1, '0000-00-00 00:00:00'),
(108, 'szines', 'Körzet', 1171, '', '', '', '', '', 'Színes utca', 3, 1, '0000-00-00 00:00:00'),
(109, 'vizforras', 'Körzet', 1171, '', '', '', '', '', 'Vízforrás utca', 3, 1, '0000-00-00 00:00:00'),
(110, 'anna', 'Körzet', 1171, '', '2', '36', '1', '33', 'Anna utca', 4, 1, '0000-00-00 00:00:00'),
(111, 'arpadhazi', 'Körzet', 1171, '', '4', 'végig folymatos', '1', '1', 'Árpád-házi Szent Erzsébet park', 4, 1, '0000-00-00 00:00:00'),
(112, 'baracska', 'Körzet', 1171, '', '', '', '', '', 'Barcska utca', 4, 1, '0000-00-00 00:00:00'),
(113, 'borsfa', 'Körzet', 1171, '', '', '', '', '', 'Borsfa utca', 4, 1, '0000-00-00 00:00:00'),
(114, 'csabagy', 'Körzet', 1171, '', '2', '66', '1', '53', 'Csabagyöngye utca', 4, 1, '0000-00-00 00:00:00'),
(115, 'dunaszeg', 'Körzet', 1171, '', '', '', '', '', 'Dunaszeg utca', 4, 1, '0000-00-00 00:00:00'),
(116, 'eszperanto', 'Körzet', 1171, '', '', '', '', '', 'Eszperantó utca', 4, 1, '0000-00-00 00:00:00'),
(117, 'fuzesabony', 'Körzet', 1171, '', '', '', '', '', 'Füzesabony utca', 4, 1, '0000-00-00 00:00:00'),
(118, 'gazlo', 'Körzet', 1171, '', '', '', '', '', 'Gázló köz', 4, 1, '0000-00-00 00:00:00'),
(119, 'gazlou', 'Körzet', 1171, '', '', '', '', '', 'Gázló utca', 4, 1, '0000-00-00 00:00:00'),
(120, 'kisvarda', 'Körzet', 1171, '', '2-82', '110-114', '1-79', '115 - végig', 'Kisvárda utca', 4, 1, '0000-00-00 00:00:00'),
(121, 'lemberg', 'Körzet', 1171, '', '2', '36', '1', '33', 'Lemberg utca', 4, 1, '0000-00-00 00:00:00'),
(122, 'nagyszenas', 'Körzet', 1171, '', '', '', '', '', 'Nagyszénás utca', 4, 1, '0000-00-00 00:00:00'),
(123, 'napoly', 'Körzet', 1171, '', '2', '86', '1', '81', 'Nápoly utca', 4, 1, '0000-00-00 00:00:00'),
(124, 'nyitany', 'Körzet', 1171, '', '', '', '1', '92 folyamatos', 'Nyitány utca', 4, 1, '0000-00-00 00:00:00'),
(125, 'nyuszt', 'Körzet', 1171, '', '', '', '', '', 'Nyuszt utca', 4, 1, '0000-00-00 00:00:00'),
(126, 'ovono', 'Körzet', 1171, '', '', '', '1', '37 folyamatos', 'Óvónő utca', 4, 1, '0000-00-00 00:00:00'),
(127, 'ontozo', 'Körzet', 1171, '', '', '', '', '', 'Öntöző utca', 4, 1, '0000-00-00 00:00:00'),
(128, 'peceli', 'Körzet', 1171, '', '90', '184', '71', '173', 'Péceli út', 4, 1, '0000-00-00 00:00:00'),
(129, 'pestvideki', 'Körzet', 1171, 'utca', '', '', '', '', 'Pestvidéki', 4, 1, '0000-00-00 00:00:00'),
(130, 'prem', 'Körzet', 1171, '', '', '', '', '', 'Prém utca', 4, 1, '0000-00-00 00:00:00'),
(131, 'szabadsag', 'Körzet', 1171, '', '2', '96', '1-105', '127-135', 'Szabadság sugárút', 4, 1, '0000-00-00 00:00:00'),
(132, 'szocske', 'Körzet', 1171, '', '', '', '', '', 'Szöcske utca', 4, 1, '0000-00-00 00:00:00'),
(133, 'tapiobicske', 'Körzet', 1171, '', '2', '46/a', '1', 'végig', 'Tápióbicske utca', 4, 1, '0000-00-00 00:00:00'),
(134, 'uttoro', 'Körzet', 1171, '', '', '', '', '', 'Úttörő utca', 4, 1, '0000-00-00 00:00:00'),
(135, 'valtoor', 'Körzet', 1171, '', '', '', '', '', 'Váltóőr utca', 4, 1, '0000-00-00 00:00:00'),
(136, 'vannay', 'Körzet', 1171, '', '', '', '', '', 'Vannay József utca', 4, 1, '0000-00-00 00:00:00'),
(137, 'varviz', 'Körzet', 1171, '', '', '', '', '', 'Várvíz utca', 4, 1, '0000-00-00 00:00:00'),
(138, 'vasutor', 'Körzet', 1171, '', '', '', '', '', 'Vasútőr utca', 4, 1, '0000-00-00 00:00:00'),
(139, 'volan', 'Körzet', 1171, '', '', '', '', '', 'Volán utca', 4, 1, '0000-00-00 00:00:00'),
(140, 'zamenhof', 'Körzet', 1171, '', '', '', '', '', 'Zamenhof utca', 4, 1, '0000-00-00 00:00:00'),
(143, 'egyenes', 'Körzet', 1173, 'Ez az utca teljes terjedelemben a körzethez tartozik, mivelsehol nincs kezdő és vég szám!', '', '', '', NULL, 'Egyenes utca', 6, 0, '0000-00-00 00:00:00'),
(144, 'gorbe', 'Körzet', 1173, 'Csak a páros oldal tartozik a körzethez!', '2', '28', '', NULL, 'Görbe sikátor', 6, 0, '0000-00-00 00:00:00'),
(145, 'talan', 'Körzet', 1173, 'Ennek a térnek csak a páratlan oldala tartozik a közethez', '', '', '1', '25', 'Talán tér', 6, 0, '0000-00-00 00:00:00'),
(146, 'sehol', 'Körtzet', 1173, 'Ennek az utcának mindkét oldalán behatárolt a körzet határ', '4', '28', '3', '33', 'Sehol köz', 6, 0, '0000-00-00 00:00:00'),
(147, 'egyenes', 'Körzet', 1173, 'Ez az utca teljes terjedelemben a körzethez tartozik, mivelsehol nincs kezdő és vég szám!', '', '', '', NULL, 'Egyenes utca', 7, 0, '0000-00-00 00:00:00'),
(148, 'gorbe', 'Körzet', 1173, 'Csak a páros oldal tartozik a körzethez!', '2', '28', '', NULL, 'Görbe sikátor', 7, 0, '0000-00-00 00:00:00'),
(149, 'talan', 'Körzet', 1173, 'Ennek a térnek csak a páratlan oldala tartozik a közethez', '', '', '1', '25', 'Talán tér', 7, 0, '0000-00-00 00:00:00'),
(150, 'sehol', 'Körtzet', 1173, 'Ennek az utcának mindkét oldalán behatárolt a körzet határ', '4', '28', '3', '33', 'Sehol köz', 7, 0, '0000-00-00 00:00:00'),
(151, 'egyenes', 'Körzet', 1173, 'Ez az utca teljes terjedelemben a körzethez tartozik, mivelsehol nincs kezdő és vég szám!', '', '', '', NULL, 'Egyenes utca', 8, 2, '0000-00-00 00:00:00'),
(152, 'gorbe', 'Körzet', 1173, 'Csak a páros oldal tartozik a körzethez!', '2', '28', '', NULL, 'Görbe sikátor', 8, 2, '0000-00-00 00:00:00'),
(153, 'talan', 'Körzet', 1173, 'Ennek a térnek csak a páratlan oldala tartozik a közethez', '', '', '1', '25', 'Talán tér', 8, 2, '0000-00-00 00:00:00'),
(154, 'sehol', 'Körtzet', 1173, 'Ennek az utcának mindkét oldalán behatárolt a körzet határ', '4', '28', '3', '33', 'Sehol köz', 8, 2, '0000-00-00 00:00:00'),
(155, 'egyenes', 'Körzet', 1173, 'Ez az utca teljes terjedelemben a körzethez tartozik, mivelsehol nincs kezdő és vég szám!', '', '', '', NULL, 'Egyenes utca', 9, 2, '0000-00-00 00:00:00'),
(156, 'gorbe', 'Körzet', 1173, 'Csak a páros oldal tartozik a körzethez!', '2', '28', '', NULL, 'Görbe sikátor', 9, 2, '0000-00-00 00:00:00'),
(157, 'talan', 'Körzet', 1173, 'Ennek a térnek csak a páratlan oldala tartozik a közethez', '', '', '1', '25', 'Talán tér', 9, 2, '0000-00-00 00:00:00'),
(158, 'sehol', 'Körtzet', 1173, 'Ennek az utcának mindkét oldalán behatárolt a körzet határ', '4', '28', '3', '33', 'Sehol köz', 9, 2, '0000-00-00 00:00:00'),
(159, 'egyenes', 'Körzet', 1173, 'Ez az utca teljes terjedelemben a körzethez tartozik, mivelsehol nincs kezdő és vég szám!', '', '', '', NULL, 'Egyenes utca', 10, 3, '0000-00-00 00:00:00'),
(160, 'gorbe', 'Körzet', 1173, 'Csak a páros oldal tartozik a körzethez!', '2', '28', '', NULL, 'Görbe sikátor', 10, 3, '0000-00-00 00:00:00'),
(161, 'talan', 'Körzet', 1173, 'Ennek a térnek csak a páratlan oldala tartozik a közethez', '', '', '1', '25', 'Talán tér', 10, 3, '0000-00-00 00:00:00'),
(162, 'sehol', 'Körtzet', 1173, 'Ennek az utcának mindkét oldalán behatárolt a körzet határ', '4', '28', '3', '33', 'Sehol köz', 10, 3, '0000-00-00 00:00:00'),
(163, 'egyenes', 'Körzet', 1173, 'Ez az utca teljes terjedelemben a körzethez tartozik, mivelsehol nincs kezdő és vég szám!', '', '', '', NULL, 'Egyenes utca', 11, 3, '0000-00-00 00:00:00'),
(164, 'gorbe', 'Körzet', 1173, 'Csak a páros oldal tartozik a körzethez!', '2', '28', '', NULL, 'Görbe sikátor', 11, 3, '0000-00-00 00:00:00'),
(165, 'talan', 'Körzet', 1173, 'Ennek a térnek csak a páratlan oldala tartozik a közethez', '', '', '1', '25', 'Talán tér', 11, 3, '0000-00-00 00:00:00'),
(166, 'sehol', 'Körtzet', 1173, 'Ennek az utcának mindkét oldalán behatárolt a körzet határ', '4', '28', '3', '33', 'Sehol köz', 11, 3, '0000-00-00 00:00:00'),
(167, 'egyenes', 'Körzet', 1173, 'Ez az utca teljes terjedelemben a körzethez tartozik, mivelsehol nincs kezdő és vég szám!', '', '', '', NULL, 'Egyenes utca', 12, 1, '0000-00-00 00:00:00'),
(168, 'gorbe', 'Körzet', 1173, 'Csak a páros oldal tartozik a körzethez!', '2', '28', '', NULL, 'Görbe sikátor', 12, 1, '0000-00-00 00:00:00'),
(169, 'talan', 'Körzet', 1173, 'Ennek a térnek csak a páratlan oldala tartozik a közethez', '', '', '1', '25', 'Talán tér', 12, 1, '0000-00-00 00:00:00'),
(170, 'sehol', 'Körtzet', 1173, 'Ennek az utcának mindkét oldalán behatárolt a körzet határ', '4', '28', '3', '33', 'Sehol köz', 12, 1, '0000-00-00 00:00:00'),
(171, 'egyenes', 'Körzet', 1173, 'Ez az utca teljes terjedelemben a körzethez tartozik, mivelsehol nincs kezdő és vég szám!', '', '', '', NULL, 'Egyenes utca', 0, 1, '0000-00-00 00:00:00'),
(172, 'gorbe', 'Körzet', 1173, 'Csak a páros oldal tartozik a körzethez!', '2', '28', '', NULL, 'Görbe sikátor', 0, 1, '0000-00-00 00:00:00'),
(173, 'talan', 'Körzet', 1173, 'Ennek a térnek csak a páratlan oldala tartozik a közethez', '', '', '1', '25', 'Talán tér', 0, 1, '0000-00-00 00:00:00'),
(174, 'sehol', 'Körtzet', 1173, 'Ennek az utcának mindkét oldalán behatárolt a körzet határ', '4', '28', '3', '33', 'Sehol köz', 0, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `korzet0`
--

DROP TABLE IF EXISTS `korzet0`;
CREATE TABLE IF NOT EXISTS `korzet0` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `irszam` int(11) DEFAULT NULL,
  `megjegyzes` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `kezdo_szam_paros` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `veg_szam_paros` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `kezdo_szam_paratlan` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `veg_szam_paratlan` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `utca` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `id_orvos` int(11) DEFAULT NULL,
  `id_rendelo` int(11) NOT NULL,
  `lastmod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=5 ;

--
-- A tábla adatainak kiíratása `korzet0`
--

INSERT INTO `korzet0` (`id`, `name`, `title`, `irszam`, `megjegyzes`, `kezdo_szam_paros`, `veg_szam_paros`, `kezdo_szam_paratlan`, `veg_szam_paratlan`, `utca`, `id_orvos`, `id_rendelo`, `lastmod`) VALUES
(1, 'egyenes', 'Körzet', 1171, 'Ez az utca teljes terjedelemben a körzethez tartozik, mivelsehol nincs kezdő és vég szám!', '', '', '', NULL, 'Egyenes utca', NULL, 0, '0000-00-00 00:00:00'),
(2, 'gorbe', 'Körzet', 117, 'Csak a páros oldal tartozik a körzethez!', '2', '28', '', NULL, 'Görbe sikátor', NULL, 0, '0000-00-00 00:00:00'),
(3, 'talan', 'Körzet', 1171, 'Ennek a térnek csak a páratlan oldala tartozik a közethez', '', '', '1', '25', 'Talán tér', NULL, 0, '0000-00-00 00:00:00'),
(4, 'sehol', 'Körtzet', 1171, 'Ennek az utcának mindkét oldalán behatárolt a körzet határ', '4', '28', '3', '33', 'Sehol köz', NULL, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orvos`
--

DROP TABLE IF EXISTS `orvos`;
CREATE TABLE IF NOT EXISTS `orvos` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `sub_link` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `id_rendelo` int(11) DEFAULT NULL,
  `megjegyzes` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `layout` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `orvos_megnev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `lastmod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=231 ;

--
-- A tábla adatainak kiíratása `orvos`
--

INSERT INTO `orvos` (`id`, `name`, `sub_link`, `id_rendelo`, `megjegyzes`, `layout`, `orvos_megnev`, `status`, `lastmod`) VALUES
(1, 'Dr. Szeiffert Gábor', 'szeiffert', 1, 'Kézzel kitöltve..', 'main', 'háziorvos', 'OK', '2014-04-28 19:59:16'),
(2, 'Dr. Miklós Márta ', '', 1, 'gépi', 'main', 'háziorvos', 'ajánlati fázis', '2014-04-28 19:58:41'),
(3, 'Dr. Szakács Andrea ', '', 1, 'gépi', 'main', 'háziorvos', 'ajánlati fázis', '2014-04-28 19:58:41'),
(4, 'Dr. Szászi Andrea ', '', 1, 'gépi', 'main', 'háziorvos', 'ajánlati fázis', '2014-04-28 19:58:41'),
(10, 'Dr. Méder Éva ', '', 3, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(11, 'Dr. Pátkai Gizella ', '', 3, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(12, 'Dr. Demó Demeter', '', 0, 'Demó oldal az admin felület kipróbálására', 'main', 'háziorvos', 'Demó', '2014-04-28 20:00:30'),
(15, 'Dr. Dobó Éva ', '', 5, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(16, 'Dr. Kertai Aurél ', '', 5, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(17, 'Dr. Antalics Gábor ', '', 6, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(18, 'Dr. Szalay Zsolt ', '', 6, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(19, 'Dr. Sziklai Erzsébet ', '', 6, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(20, 'Dr. Vörös Krisztián ', '', 6, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(21, 'Dr. Bodrogi Ilona ', '', 7, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(22, 'Dr. Roskovics Gyula ', '', 7, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(23, 'Dr. Ormos Endre ', '', 8, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(24, 'Dr. Tündik András ', '', 8, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(25, 'Dr. Bánhidi Eszter ', '', 9, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(26, 'Dr. Halászy Zsófia ', '', 9, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(27, 'Dr. Kozma Gábor ', '', 9, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(28, 'Dr. Zdravkova A. Snezska ', '', 9, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(29, 'Dr. Pivarnyik Erzsébet ', '', 10, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(30, 'Dr. Fejős Róbert ', '', 11, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(31, 'Dr. Hajdú Sándor ', '', 11, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(32, 'Dr. Lakó Futó Zoltán ', '', 11, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(33, 'Dr. Tóth Antal ', '', 11, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(34, 'Dr. Hernandez Edina ', '', 12, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(35, 'Dr. Kóczi Zoltán ', '', 12, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(36, 'Dr. Marton-Szücs Gábor ', '', 12, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(37, 'Dr. Peresa Magdolna ', '', 12, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(38, 'Dr. Kajetán Miklós ', '', 13, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-02-22 10:13:06'),
(200, 'Házi- és Gyermekorvosok', '', NULL, 'Orvos függeltenrész ', 'main', '', 'fejlesztés alatt', '2014-02-23 18:18:47'),
(202, 'Dr. Herepey Ágnes', '', 16, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-04-14 16:00:25'),
(203, ' Dr. Dán Katalin', '', 16, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-04-14 16:00:40'),
(204, 'Dr. Hajdú Ágnes', '', 16, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-04-14 16:00:44'),
(205, 'Dr. Horváth Ákos', '', 16, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-04-14 16:00:52'),
(206, 'Dr. Salacz András', '', 16, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-04-14 16:00:55'),
(207, 'Dr. Tóth Viktória', '', 16, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-04-14 16:00:59'),
(208, 'Dr. Záhony Zsuzsanna', '', 16, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-04-14 16:01:01'),
(209, 'Dr. Baksay Andrea', '', 5, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-22 12:55:28'),
(210, 'Dr. Péterfai János', '', 5, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-22 12:55:33'),
(211, 'Dr. Diófási Erika 	', '', 17, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-22 13:52:50'),
(212, 'Dr. Köllner Pálma', '', 17, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-22 13:52:52'),
(213, 'Dr. Móra Imola', '', 17, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-22 13:52:54'),
(214, 'Dr. Várhelyi Éva', '', 17, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-22 13:52:57'),
(215, 'Dr. Galambos Éva', '', 11, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-27 08:42:59'),
(216, 'Dr. Mile Gabriella', '', 11, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-27 08:43:01'),
(217, 'Dr. Jakubcsik Erzsébet', '', 11, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-27 09:04:22'),
(218, 'Dr. Kovács Mária', '', 18, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-27 13:08:15'),
(219, 'Dr. Bényi Zsolt', '', 19, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-27 13:10:40'),
(220, 'Dr. Kósa Julianna', '', 19, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-27 13:10:42'),
(221, 'Dr. Berezvay Krisztina', '', 20, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-27 13:12:46'),
(222, 'Dr. Tengelyi Zsuzsanna', '', 20, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-27 13:12:48'),
(223, 'Dr. Horváth Ibolya', '', 1, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-27 13:29:42'),
(224, 'Dr. Novák Ágota', '', 1, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-27 13:29:43'),
(225, 'Dr. Pethe Ilona', '', 21, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-27 13:44:33'),
(226, 'Dr. Szederkényi Katalin', '', 21, 'gépi', 'main', 'gyermekorvos', 'előkészítve', '2014-04-27 13:44:35'),
(227, 'Dr. Fábry Adrienn', '', 22, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-05-29 12:54:33'),
(228, 'Dr. Horváth Gyula', '', 22, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-05-29 12:54:36'),
(229, 'Dr. Koplányi Gábor', '', 22, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-05-29 12:54:39'),
(230, 'Dr. Wallinger Péter', '', 22, 'gépi', 'main', 'háziorvos', 'előkészítve', '2014-05-29 12:54:42');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orvosform1`
--

DROP TABLE IF EXISTS `orvosform1`;
CREATE TABLE IF NOT EXISTS `orvosform1` (
`id` int(11) NOT NULL,
  `l_hasznos` int(11) DEFAULT NULL,
  `l_ertheto` int(11) DEFAULT NULL,
  `h_hasznos` int(11) DEFAULT NULL,
  `h_attekint` int(11) DEFAULT NULL,
  `h_celszeru` int(11) DEFAULT NULL,
  `h_hiany` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `h_legjobb` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `h_kimaradt` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `h_felesleg` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `megjegyzes` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `kitoltve` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=9 ;

--
-- A tábla adatainak kiíratása `orvosform1`
--

INSERT INTO `orvosform1` (`id`, `l_hasznos`, `l_ertheto`, `h_hasznos`, `h_attekint`, `h_celszeru`, `h_hiany`, `h_legjobb`, `h_kimaradt`, `h_felesleg`, `megjegyzes`, `kitoltve`) VALUES
(1, 3, 3, 3, 3, 3, 'sok minden', 'semmi', '1', 'bb', 'nnn', '2014-01-18 18:20:29'),
(2, 4, 4, 4, 4, NULL, 'semmi', 'az infosor', '1', 'semmi', 'nincs', '2014-01-18 18:29:32'),
(3, 4, 4, 4, 4, 4, 'sok minden', 'az infosor', '1', 'semmi', 'nincs', '2014-01-18 18:32:25'),
(4, 5, 5, 5, 5, 5, '5', '5', '5', '5', '5', '2014-01-18 18:37:51'),
(5, 4, 4, 5, 3, 3, 'sok minden', 'az infosor', NULL, 'semmi', 'nincs', '2014-01-18 18:58:49'),
(6, 2, 3, 4, 5, 5, 's', 'az infosor', NULL, '5', '5', '2014-01-18 19:00:44'),
(7, 3, 3, 3, 3, 3, '3', '3', '1', '3', '3', '2014-01-18 19:03:48'),
(8, 5, NULL, NULL, NULL, NULL, '', '', '12', '', '', '2014-02-02 20:58:19');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendelo`
--

DROP TABLE IF EXISTS `rendelo`;
CREATE TABLE IF NOT EXISTS `rendelo` (
`id` int(11) NOT NULL,
  `irszam` int(11) NOT NULL,
  `varos` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `cim` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `rend_nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `orvos_szam` int(11) DEFAULT NULL,
  `megjegyzes` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `lastmod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=23 ;

--
-- A tábla adatainak kiíratása `rendelo`
--

INSERT INTO `rendelo` (`id`, `irszam`, `varos`, `cim`, `telefon`, `email`, `rend_nev`, `orvos_szam`, `megjegyzes`, `lastmod`) VALUES
(1, 1171, 'Bp.,', 'Péceli út 190.', '', '', '1171 Péceli út 190. I. emelet', 4, 'gépi', '0000-00-00 00:00:00'),
(3, 1173, 'Bp.,', '525. tér', '', '', '1173 Bp., 525. tér', 2, 'gépi', '0000-00-00 00:00:00'),
(5, 1171, 'Bp.,', 'Csongrád utca 2.', '', '', '1171 Bp., Csongrád utca 2.', 4, 'gépi', '2014-04-27 08:40:02'),
(6, 1174, 'Bp.,', 'Baross utca 18.', '', '', '1174 Bp., Baross utca 18.', 4, 'gépi', '2014-02-20 14:20:33'),
(7, 1173, 'Bp.,', 'Egészségház utca 3.', '', '', '1173 Bp., Egészségház utca 3.', 2, 'gépi', '2014-02-20 16:27:30'),
(8, 1172, 'Bp.,', 'IX. utca 2-4.', '', '', '1172 Bp., IX. utca 2-4.', 2, 'gépi', '2014-02-20 16:47:07'),
(9, 1172, 'Bp.,', 'Naplás utca 58.', '', '', '1172 Bp., Naplás utca 58.', 4, 'gépi', '2014-02-20 16:52:58'),
(10, 1173, 'Bp.,', 'Uszoda utca 3.', '', '', '1173 Bp., Uszoda utca 3.', 1, 'gépi', '2014-02-20 16:57:47'),
(11, 1173, 'Bp,.', 'Ferihegyi út 81.', '', '', '1173 Bp., Ferihegyi út 81.', 7, 'gépi', '2014-04-27 20:07:23'),
(12, 1173, 'Bp,.', 'Újlak utca 11.', '', '', '1173 Bp., Újlak utca 11.', 4, 'gépi', '2014-02-20 21:28:35'),
(13, 1171, 'Bp.,', 'Zrínyi út 224/A.', '', '', '1171 Bp., Zrínyi út 224/A.', 1, 'gépi', '2014-02-20 17:31:43'),
(16, 1132, 'Bp.,', 'Bessenyei utca 27.', '', '', '1132 Bp., Bessenyei utca 27.', 7, 'gépi', '2014-04-14 16:00:23'),
(17, 1173, 'Bp.,', 'Egészségház utca 40.', '', '', '1173 Bp., Egészségház utca 40.', 4, 'gépi', '2014-04-22 13:52:49'),
(18, 1172, 'Bp.,', 'Hősök tere 3.', '', '', '1172 Bp., Hősök tere 3.', 1, 'gépi', '2014-04-27 13:08:15'),
(19, 1174, 'Bp.,', 'Kép utca 1/b.', '', '', '1174 Bp., Kép utca 1/b.', 2, 'gépi', '2014-04-27 13:10:39'),
(20, 1172, 'Bp.,', 'Naplás u. 58.', '', '', '1172 Bp., Naplás u. 58.', 2, 'gépi', '2014-04-27 20:11:35'),
(21, 1173, 'Bp.,', 'Újlak utca 13.', '', '', '1173 Bp., Újlak utca 13.', 2, 'gépi', '2014-04-27 13:44:33'),
(22, 1052, 'Budapest,', 'Semmelweis u. 14.', '', '', '1052 Budapest, Semmelweis u. 14.', 4, 'gépi', '2014-05-29 12:54:33');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendido`
--

DROP TABLE IF EXISTS `rendido`;
CREATE TABLE IF NOT EXISTS `rendido` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `start` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `stop` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `id_orvos` int(11) DEFAULT NULL,
  `lastmod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=358 ;

--
-- A tábla adatainak kiíratása `rendido`
--

INSERT INTO `rendido` (`id`, `name`, `title`, `start`, `stop`, `comment`, `id_orvos`, `lastmod`) VALUES
(1, '1de', 'Hétfő', '8:00', '12:00', '', 1, '0000-00-00 00:00:00'),
(2, '1du', 'Hétfő', '', '', '', 1, '0000-00-00 00:00:00'),
(3, '2de', 'Kedd', '', '', '', 1, '0000-00-00 00:00:00'),
(4, '2du', 'Kedd', '16:00', '20:00', '', 1, '0000-00-00 00:00:00'),
(5, '3de', 'Szerda', '8:00', '12:00', '', 1, '0000-00-00 00:00:00'),
(6, '3du', 'Szerda', '', '', '', 1, '0000-00-00 00:00:00'),
(7, '4de', 'Csütörtök', '', '', '', 1, '0000-00-00 00:00:00'),
(8, '4du', 'Csütörtök', '16:00', '20:00', '', 1, '0000-00-00 00:00:00'),
(9, '5de', 'Péntek', '', '', 'páros héten,<br> helyettesit -> Dr. Szászi Andrea', 1, '0000-00-00 00:00:00'),
(10, '5du', 'Péntek', '16:00', '20:00', 'páratlan hét:', 1, '0000-00-00 00:00:00'),
(11, '6de', 'Szombat', '', '', 'Nincs rendelés', 1, '0000-00-00 00:00:00'),
(12, '6du', 'Szombat', '', '', 'Nincs rendelés', 1, '0000-00-00 00:00:00'),
(13, '7de', 'Vasárnap', '', '', 'Nincs rendelés', 1, '0000-00-00 00:00:00'),
(14, '7du', 'Vasárnap', '', '', 'Nincs rendelés', 1, '0000-00-00 00:00:00'),
(204, '1de', 'Hétfő', '', '', '', 2, '0000-00-00 00:00:00'),
(205, '1du', 'Hétfő', '16:00', '20:00', '', 2, '0000-00-00 00:00:00'),
(206, '2de', 'Kedd', '8:00', '12:00', '', 2, '0000-00-00 00:00:00'),
(207, '2du', 'Kedd', '', '', '', 2, '0000-00-00 00:00:00'),
(208, '3de', 'Szerda', '', '', '', 2, '0000-00-00 00:00:00'),
(209, '3du', 'Szerda', '16:00', '20:00', '', 2, '0000-00-00 00:00:00'),
(210, '4de', 'Csütörtök', '8:00', '12:00', '', 2, '0000-00-00 00:00:00'),
(211, '4du', 'Csütörtök', '', '', '', 2, '0000-00-00 00:00:00'),
(212, '5de', 'Péntek', '', '', 'változó', 2, '0000-00-00 00:00:00'),
(213, '5du', 'Péntek', '', '', '', 2, '0000-00-00 00:00:00'),
(214, '6de', 'Szombat', '', '', 'Nincs rendelés', 2, '0000-00-00 00:00:00'),
(215, '6du', 'Szombat', '', '', 'Nincs rendelés', 2, '0000-00-00 00:00:00'),
(216, '7de', 'Vasárnap', '', '', 'Nincs rendelés', 2, '0000-00-00 00:00:00'),
(217, '7du', 'Vasárnap', '', '', 'Nincs rendelés', 2, '0000-00-00 00:00:00'),
(218, '1de', 'Hétfő', '', '', '', 3, '0000-00-00 00:00:00'),
(219, '1du', 'Hétfő', '16:00', '20:00', '', 3, '0000-00-00 00:00:00'),
(220, '2de', 'Kedd', '8:00', '12:00', '', 3, '0000-00-00 00:00:00'),
(221, '2du', 'Kedd', '', '', '', 3, '0000-00-00 00:00:00'),
(222, '3de', 'Szerda', '', '', '', 3, '0000-00-00 00:00:00'),
(223, '3du', 'Szerda', '16:00', '20:00', '', 3, '0000-00-00 00:00:00'),
(224, '4de', 'Csütörtök', '8:00', '12:00', '', 3, '0000-00-00 00:00:00'),
(225, '4du', 'Csütörtök', '', '', '', 3, '0000-00-00 00:00:00'),
(226, '5de', 'Péntek', '8:00', '12:00', 'páratlan héten:', 3, '0000-00-00 00:00:00'),
(227, '5du', 'Péntek', '13:00', '17:00', 'páros héten:', 3, '0000-00-00 00:00:00'),
(228, '6de', 'Szombat', '', '', 'Nincs rendelés', 3, '0000-00-00 00:00:00'),
(229, '6du', 'Szombat', '', '', 'Nincs rendelés', 3, '0000-00-00 00:00:00'),
(230, '7de', 'Vasárnap', '', '', 'Nincs rendelés', 3, '0000-00-00 00:00:00'),
(231, '7du', 'Vasárnap', '', '', 'Nincs rendelés', 3, '0000-00-00 00:00:00'),
(232, '1de', 'Hétfő', '8:00', '12:00', '', 4, '0000-00-00 00:00:00'),
(233, '1du', 'Hétfő', '', '', '', 4, '0000-00-00 00:00:00'),
(234, '2de', 'Kedd', '', '', '', 4, '0000-00-00 00:00:00'),
(235, '2du', 'Kedd', '16:00', '20:00', '', 4, '0000-00-00 00:00:00'),
(236, '3de', 'Szerda', '8:00', '12:00', '', 4, '0000-00-00 00:00:00'),
(237, '3du', 'Szerda', '', '', '', 4, '0000-00-00 00:00:00'),
(238, '4de', 'Csütörtök', '', '', '', 4, '0000-00-00 00:00:00'),
(239, '4du', 'Csütörtök', '16:00', '20:00', '', 4, '0000-00-00 00:00:00'),
(240, '5de', 'Péntek', '8:00', '12:00', 'páros héten:', 4, '0000-00-00 00:00:00'),
(241, '5du', 'Péntek', '', '', 'páratlan héten nincs rendelés,<br> helyettesit -> Dr Szeiffert Gábor', 4, '0000-00-00 00:00:00'),
(242, '6de', 'Szombat', '', '', 'Nincs rendelés', 4, '0000-00-00 00:00:00'),
(243, '6du', 'Szombat', '', '', 'Nincs rendelés', 4, '0000-00-00 00:00:00'),
(244, '7de', 'Vasárnap', '', '', 'Nincs rendelés', 4, '0000-00-00 00:00:00'),
(245, '7du', 'Vasárnap', '', '', 'Nincs rendelés', 4, '0000-00-00 00:00:00'),
(246, '1de', 'Hétfő', '', '', '', 6, '0000-00-00 00:00:00'),
(247, '1du', 'Hétfő', '16:00', '20:00', '', 6, '0000-00-00 00:00:00'),
(248, '2de', 'Kedd', '8:00', '12:00', '', 6, '0000-00-00 00:00:00'),
(249, '2du', 'Kedd', '', '', '', 6, '0000-00-00 00:00:00'),
(250, '3de', 'Szerda', '', '', '', 6, '0000-00-00 00:00:00'),
(251, '3du', 'Szerda', '16:00', '20:00', '', 6, '0000-00-00 00:00:00'),
(252, '4de', 'Csütörtök', '8:00', '12:00', '', 6, '0000-00-00 00:00:00'),
(253, '4du', 'Csütörtök', '', '', '', 6, '0000-00-00 00:00:00'),
(254, '5de', 'Péntek', '8:00', '12:00', '', 6, '0000-00-00 00:00:00'),
(255, '5du', 'Péntek', '', '', '', 6, '0000-00-00 00:00:00'),
(256, '6de', 'Szombat', '', '', 'Nincs rendelés', 6, '0000-00-00 00:00:00'),
(257, '6du', 'Szombat', '', '', 'Nincs rendelés', 6, '0000-00-00 00:00:00'),
(258, '7de', 'Vasárnap', '', '', 'Nincs rendelés', 6, '0000-00-00 00:00:00'),
(259, '7du', 'Vasárnap', '', '', 'Nincs rendelés', 6, '0000-00-00 00:00:00'),
(260, '1de', 'Hétfő', '8:00', '12:00', '', 7, '0000-00-00 00:00:00'),
(261, '1du', 'Hétfő', '', '', '', 7, '0000-00-00 00:00:00'),
(262, '2de', 'Kedd', '', '', '', 7, '0000-00-00 00:00:00'),
(263, '2du', 'Kedd', '16:00', '20:00', '', 7, '0000-00-00 00:00:00'),
(264, '3de', 'Szerda', '8:00', '12:00', '', 7, '0000-00-00 00:00:00'),
(265, '3du', 'Szerda', '', '', '', 7, '0000-00-00 00:00:00'),
(266, '4de', 'Csütörtök', '', '', '', 7, '0000-00-00 00:00:00'),
(267, '4du', 'Csütörtök', '16:00', '20:00', '', 7, '0000-00-00 00:00:00'),
(268, '5de', 'Péntek', '', '', 'változó', 7, '0000-00-00 00:00:00'),
(269, '5du', 'Péntek', '', '', '', 7, '0000-00-00 00:00:00'),
(270, '6de', 'Szombat', '', '', 'Nincs rendelés', 7, '0000-00-00 00:00:00'),
(271, '6du', 'Szombat', '', '', 'Nincs rendelés', 7, '0000-00-00 00:00:00'),
(272, '7de', 'Vasárnap', '', '', 'Nincs rendelés', 7, '0000-00-00 00:00:00'),
(273, '7du', 'Vasárnap', '', '', 'Nincs rendelés', 7, '0000-00-00 00:00:00'),
(274, '1de', 'Hétfő', '', '', '', 8, '0000-00-00 00:00:00'),
(275, '1du', 'Hétfő', '16:00', '20:00', '', 8, '0000-00-00 00:00:00'),
(276, '2de', 'Kedd', '8:00', '12:00', '', 8, '0000-00-00 00:00:00'),
(277, '2du', 'Kedd', '', '', '', 8, '0000-00-00 00:00:00'),
(278, '3de', 'Szerda', '', '', '', 8, '0000-00-00 00:00:00'),
(279, '3du', 'Szerda', '16:00', '20:00', '', 8, '0000-00-00 00:00:00'),
(280, '4de', 'Csütörtök', '8:00', '12:00', '', 8, '0000-00-00 00:00:00'),
(281, '4du', 'Csütörtök', '', '', '', 8, '0000-00-00 00:00:00'),
(282, '5de', 'Péntek', '8:00', '12:00', '', 8, '0000-00-00 00:00:00'),
(283, '5du', 'Péntek', '', '', '', 8, '0000-00-00 00:00:00'),
(284, '6de', 'Szombat', '', '', 'Nincs rendelés', 8, '0000-00-00 00:00:00'),
(285, '6du', 'Szombat', '', '', 'Nincs rendelés', 8, '0000-00-00 00:00:00'),
(286, '7de', 'Vasárnap', '', '', 'Nincs rendelés', 8, '0000-00-00 00:00:00'),
(287, '7du', 'Vasárnap', '', '', 'Nincs rendelés', 8, '0000-00-00 00:00:00'),
(288, '1de', 'Hétfő', '8:00', '12:00', '', 9, '0000-00-00 00:00:00'),
(289, '1du', 'Hétfő', '', '', '', 9, '0000-00-00 00:00:00'),
(290, '2de', 'Kedd', '', '', '', 9, '0000-00-00 00:00:00'),
(291, '2du', 'Kedd', '16:00', '20:00', '', 9, '0000-00-00 00:00:00'),
(292, '3de', 'Szerda', '8:00', '12:00', '', 9, '0000-00-00 00:00:00'),
(293, '3du', 'Szerda', '', '', '', 9, '0000-00-00 00:00:00'),
(294, '4de', 'Csütörtök', '', '', '', 9, '0000-00-00 00:00:00'),
(295, '4du', 'Csütörtök', '16:00', '20:00', '', 9, '0000-00-00 00:00:00'),
(296, '5de', 'Péntek', '', '', 'változó', 9, '0000-00-00 00:00:00'),
(297, '5du', 'Péntek', '', '', '', 9, '0000-00-00 00:00:00'),
(298, '6de', 'Szombat', '', '', 'Nincs rendelés', 9, '0000-00-00 00:00:00'),
(299, '6du', 'Szombat', '', '', 'Nincs rendelés', 9, '0000-00-00 00:00:00'),
(300, '7de', 'Vasárnap', '', '', 'Nincs rendelés', 9, '0000-00-00 00:00:00'),
(301, '7du', 'Vasárnap', '', '', 'Nincs rendelés', 9, '0000-00-00 00:00:00'),
(302, '1de', 'Hétfő', '', '', '', 10, '0000-00-00 00:00:00'),
(303, '1du', 'Hétfő', '16:00', '20:00', '', 10, '0000-00-00 00:00:00'),
(304, '2de', 'Kedd', '8:00', '12:00', '', 10, '0000-00-00 00:00:00'),
(305, '2du', 'Kedd', '', '', '', 10, '0000-00-00 00:00:00'),
(306, '3de', 'Szerda', '', '', '', 10, '0000-00-00 00:00:00'),
(307, '3du', 'Szerda', '16:00', '20:00', '', 10, '0000-00-00 00:00:00'),
(308, '4de', 'Csütörtök', '8:00', '12:00', '', 10, '0000-00-00 00:00:00'),
(309, '4du', 'Csütörtök', '', '', '', 10, '0000-00-00 00:00:00'),
(310, '5de', 'Péntek', '8:00', '12:00', '', 10, '0000-00-00 00:00:00'),
(311, '5du', 'Péntek', '', '', '', 10, '0000-00-00 00:00:00'),
(312, '6de', 'Szombat', '', '', 'Nincs rendelés', 10, '0000-00-00 00:00:00'),
(313, '6du', 'Szombat', '', '', 'Nincs rendelés', 10, '0000-00-00 00:00:00'),
(314, '7de', 'Vasárnap', '', '', 'Nincs rendelés', 10, '0000-00-00 00:00:00'),
(315, '7du', 'Vasárnap', '', '', 'Nincs rendelés', 10, '0000-00-00 00:00:00'),
(316, '1de', 'Hétfő', '8:00', '12:00', '', 11, '0000-00-00 00:00:00'),
(317, '1du', 'Hétfő', '', '', '', 11, '0000-00-00 00:00:00'),
(318, '2de', 'Kedd', '', '', '', 11, '0000-00-00 00:00:00'),
(319, '2du', 'Kedd', '16:00', '20:00', '', 11, '0000-00-00 00:00:00'),
(320, '3de', 'Szerda', '8:00', '12:00', '', 11, '0000-00-00 00:00:00'),
(321, '3du', 'Szerda', '', '', '', 11, '0000-00-00 00:00:00'),
(322, '4de', 'Csütörtök', '', '', '', 11, '0000-00-00 00:00:00'),
(323, '4du', 'Csütörtök', '16:00', '20:00', '', 11, '0000-00-00 00:00:00'),
(324, '5de', 'Péntek', '', '', 'változó', 11, '0000-00-00 00:00:00'),
(325, '5du', 'Péntek', '', '', '', 11, '0000-00-00 00:00:00'),
(326, '6de', 'Szombat', '', '', 'Nincs rendelés', 11, '0000-00-00 00:00:00'),
(327, '6du', 'Szombat', '', '', 'Nincs rendelés', 11, '0000-00-00 00:00:00'),
(328, '7de', 'Vasárnap', '', '', 'Nincs rendelés', 11, '0000-00-00 00:00:00'),
(329, '7du', 'Vasárnap', '', '', 'Nincs rendelés', 11, '0000-00-00 00:00:00'),
(330, '1de', 'hétfő', '8:00', '12:00', '', 12, '0000-00-00 00:00:00'),
(331, '1du', 'hétfő', '', '', '', 12, '0000-00-00 00:00:00'),
(332, '2de', 'kedd', '', '', '', 12, '0000-00-00 00:00:00'),
(333, '2du', 'kedd', '16:00', '20:00', '', 12, '0000-00-00 00:00:00'),
(334, '3de', 'szerda', '8:00', '12:00', '', 12, '0000-00-00 00:00:00'),
(335, '3du', 'szerda', '', '', '', 12, '0000-00-00 00:00:00'),
(336, '4de', 'csütörtök', '', '', '', 12, '0000-00-00 00:00:00'),
(337, '4du', 'csütörtök', '16:00', '20:00', '', 12, '0000-00-00 00:00:00'),
(338, '5de', 'péntek', '8:00', '12:00', 'páratlan héten:', 12, '0000-00-00 00:00:00'),
(339, '5du', 'péntek', '16:00', '20:00', 'páros héten:', 12, '0000-00-00 00:00:00'),
(340, '6de', 'szombat', '', '', 'nincs rendelés', 12, '0000-00-00 00:00:00'),
(341, '6du', 'szombat', '', '', 'nincs rendelés', 12, '0000-00-00 00:00:00'),
(342, '7de', 'vasárnap', '', '', 'nincs rendelés', 12, '0000-00-00 00:00:00'),
(343, '7du', 'vasárnap', '', '', 'nincs rendelés', 12, '0000-00-00 00:00:00'),
(344, '1de', 'hétfő', '8:00', '12:00', '', 0, '0000-00-00 00:00:00'),
(345, '1du', 'hétfő', '', '', '', 0, '0000-00-00 00:00:00'),
(346, '2de', 'kedd', '', '', '', 0, '0000-00-00 00:00:00'),
(347, '2du', 'kedd', '16:00', '20:00', '', 0, '0000-00-00 00:00:00'),
(348, '3de', 'szerda', '8:00', '12:00', '', 0, '0000-00-00 00:00:00'),
(349, '3du', 'szerda', '', '', '', 0, '0000-00-00 00:00:00'),
(350, '4de', 'csütörtök', '', '', '', 0, '0000-00-00 00:00:00'),
(351, '4du', 'csütörtök', '16:00', '20:00', '', 0, '0000-00-00 00:00:00'),
(352, '5de', 'péntek', '8:00', '12:00', 'páratlan héten:', 0, '0000-00-00 00:00:00'),
(353, '5du', 'péntek', '16:00', '20:00', 'páros héten:', 0, '0000-00-00 00:00:00'),
(354, '6de', 'szombat', '', '', 'nincs rendelés', 0, '0000-00-00 00:00:00'),
(355, '6du', 'szombat', '', '', 'nincs rendelés', 0, '0000-00-00 00:00:00'),
(356, '7de', 'vasárnap', '', '', 'nincs rendelés', 0, '0000-00-00 00:00:00'),
(357, '7du', 'vasárnap', '', '', 'nincs rendelés', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tbl_kepek`
--

DROP TABLE IF EXISTS `tbl_kepek`;
CREATE TABLE IF NOT EXISTS `tbl_kepek` (
`id` int(11) NOT NULL,
  `kep` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `szoveg` varchar(128) COLLATE utf8_hungarian_ci NOT NULL,
  `rovid_leiras` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `fajta` varchar(64) COLLATE utf8_hungarian_ci NOT NULL,
  `meret` decimal(4,0) NOT NULL,
  `mertek_egyseg` varchar(160) COLLATE utf8_hungarian_ci NOT NULL,
  `id_orvos` int(11) DEFAULT NULL,
  `lastmod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=11 ;

--
-- A tábla adatainak kiíratása `tbl_kepek`
--

INSERT INTO `tbl_kepek` (`id`, `kep`, `szoveg`, `rovid_leiras`, `fajta`, `meret`, `mertek_egyseg`, `id_orvos`, `lastmod`) VALUES
(7, 'DSC_1397.jpg', 'Dr. Szeiffert Gábor', 'Rendelőben várja a következőt', 'Magamról', '1', 'Választás indoka: majdnem mosolyogsz, és nem csak számítástechnika, hanem a vérnyomásmérő is látszik.', 1, '0000-00-00 00:00:00'),
(8, 'IMG_8018.JPG', 'Péceli út 190. rendelő', 'közeli kép', 'rendelo', '1', 'rendelő modulban kerül kijelzésre', 1, '0000-00-00 00:00:00'),
(9, 'IMG_8019.JPG', 'Péceli út 190. rendelő', 'távoli kép', 'rendelo', '1', 'rendelő modulban ', 1, '0000-00-00 00:00:00'),
(10, 'IMG_8006.JPG', 'Péceli 190. belülről', 'Belső kép', 'rendelo', '1', 'rendelő modulban kerül kijelzésre', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1371485778),
('m130604_123850_create_content_table', 1371485789),
('m130604_130602_create_index_content_table', 1371485789),
('m130720_095414_drop_column_url_from_content_table', 1374335942),
('m130720_100448_drop_columns_from_user', 1374335942),
('m130720_120340_uzenet', 1374322914),
('m130722_072514_addColumn_user_table', 1374478417),
('m130724_101550_add_column_to_content_table', 1375202938),
('m130730_140316_korzet_table', 1375202938),
('m130731_112905_addColunm_korzet_table', 1375271725),
('m130731_135038_change_korzet', 1375279003),
('m130809_192946_felvilgosit_table', 1376077725),
('m130809_193530_felvilgosit_table', 1376077725),
('m130813_072446_create_config_table', 1376747919),
('m130813_123651_add_columns_label_category_to_config', 1376747919),
('m130817_102146_insert_data_to_config_table', 1376747920),
('m130824_145903_kapcsolat_table', 1377357522),
('m130918_111637_contact_table', 1379503969),
('m130919_142157_column_rename_kapcsolat_table', 1379600917),
('m131020_134204_rendido_table', 1382277999),
('m131102_154650_tbl_kepek_table', 1383408306),
('m131113_163032_orvos_table', 1384362913),
('m131113_165018_addColunm_config_table', 1384428724),
('m131114_113510_rendelo_table', 1384429518),
('m131122_104136_reformetted_lastmod_user_table', 1385117278);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(12) NOT NULL,
  `username` varchar(64) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `authority` int(2) NOT NULL,
  `rememberMe` tinyint(1) NOT NULL,
  `id_orvos` int(11) DEFAULT NULL,
  `id_rendelo` int(11) DEFAULT NULL,
  `lastmod` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `title`, `authority`, `rememberMe`, `id_orvos`, `id_rendelo`, `lastmod`) VALUES
(0, 'admin', '$2a$13$eUlLSygdmBr9kOH0HN5k3.UmSp/..o05rrlJLkqpqFrAajteKqf6K', '', 1, 0, 1, 1, NULL),
(1, 'felhadmin', '$2a$13$e88KyGCSAuUCemb6lmpnN.OX6nWUIasvsODvUazbp2v7acjSMLuOu', 'Felhasználói adminisztrátor', 0, 0, 1, 1, '0000-00-00 00:00:00'),
(2, 'guest', '$2a$13$U30Aw6cwpwnyvLe8Oj5IRO3PhfrjC5Yn2Ve1FHXuAcHP3HfdkJYjC', '', 0, 1, 1, 1, '0000-00-00 00:00:00'),
(3, 'Szeiffertadmin1', '$2a$13$2l1.jXGE5YWwdUeuiY07WuLK6O.J4Y7XLu4D6hNlGp.Ac3xVEwFrm', 'Dr. Szeiffert Gábor honlapjának felhasználói adminisztátor I. ', 88, 0, 1, 1, NULL),
(4, 'felhadmin1', '$2a$13$RVeow0f0HWbubTYHLj4JGOZLKJzqK5Y.1bCNlUSNfB8BBQJWrpEKq', 'demo', 0, 0, 1, 1, '0000-00-00 00:00:00'),
(5, 'felhadmin2', '$2a$13$XsgixycSSZ0IJdbFk.F8jOGoKY0Hz1YSaQSJiKMANBU/TbhQQCRCy', 'Felhasználói adminisztrátor', 0, 1, 2, 1, '0000-00-00 00:00:00'),
(6, 'felhadmin3', '$2a$13$KJj42NsJHb9HcN8eZkgtoud2KOiwsom89EbNC0pt5RUtMixr2GW2e', 'Felhasználói adminisztrátor', 0, 1, 3, 1, '0000-00-00 00:00:00'),
(7, 'felhadmin4', '$2a$13$MFqy8wVhE9OURNnEtLZWZeyIh5GcsXSU5yv0S5Q/RGZsXXent9VLG', 'Felhasználói adminisztrátor', 0, 1, 4, 1, '0000-00-00 00:00:00'),
(8, 'felhadmin8', '$2a$13$rLQwH9086jVB9CEgR6RcPuL1QlwRDUHtgg1sciRI7RSeCDYJmCSQm', 'Felhasználói adminisztrátor', 0, 1, 8, 2, '0000-00-00 00:00:00'),
(9, 'felhadmin9', '$2a$13$DnvTsLn6rkUYung2jUUsOeBgd1eVf.BMsBmc/7Hb6JZnGtg7q0ioW', 'Felhasználói adminisztrátor', 0, 1, 9, 2, '0000-00-00 00:00:00'),
(10, 'felhadmin10', '$2a$13$A9MBx8TQBVKF3gBVKtgrXeceL.bq7acshfTwBysVgmITmLgDlUbam', 'Felhasználói adminisztrátor', 0, 1, 10, 3, '0000-00-00 00:00:00'),
(11, 'felhadmin11', '$2a$13$nvpfumtxb2AmPtlSd8fp7u.M6a2NocilSu6lZxm268RffXTXy03vq', 'Felhasználói adminisztrátor', 0, 1, 11, 3, '0000-00-00 00:00:00'),
(12, 'Demo', '$2a$13$RVeow0f0HWbubTYHLj4JGOZLKJzqK5Y.1bCNlUSNfB8BBQJWrpEKq', 'demó felhasználói adminisztrátor', 0, 1, 12, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenet`
--

DROP TABLE IF EXISTS `uzenet`;
CREATE TABLE IF NOT EXISTS `uzenet` (
`id` int(11) NOT NULL,
  `uzenet` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `ervenyes` date DEFAULT NULL,
  `megjegyzes` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  `id_orvos` int(11) DEFAULT NULL,
  `lastmod` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=11 ;

--
-- A tábla adatainak kiíratása `uzenet`
--

INSERT INTO `uzenet` (`id`, `uzenet`, `ervenyes`, `megjegyzes`, `valid`, `id_orvos`, `lastmod`) VALUES
(1, 'Figyelem! 2014.07.17.-től 27.-ig és 08.11.-től 08.23.-ig szabadságon leszek! Helyettesít: Dr. Szászi Andrea', '2014-08-24', 'ellenőrizendő!', 1, 1, '2014-05-13 21:31:37'),
(2, 'Lejárt üzenet, ennek nem szabad megjelenni!', '2013-07-10', 'nincs', 1, 1, '0000-00-00 00:00:00'),
(5, 'Az ünnepi rendelés és az ügyelet helyszíne változott <a href="/1/unnepi"> a részelekért kattintson ide!!!</a> Figyelem az influenzia oltás megérkezett!', '2014-01-05', '', 1, 1, '0000-00-00 00:00:00'),
(6, '<b>Figyelem! Pénteken (2014.05.02.-án) nincs rendelés! Kérem, hogy sűrgős esetben az ügyelethez forduljanak.</b>', '2014-05-04', 'munkanap átrendezés miatt!', 0, 1, '2014-04-30 08:51:35'),
(7, '<b>Figyelem! Pénteken (2014.05.02.-án) nincs rendelés! Kérem, hogy sűrgős esetben az ügyelethez forduljanak.</b>', '2014-05-04', 'munkanap átrendezés miatt!', 0, 2, '2014-04-30 08:52:03'),
(8, '<b>Figyelem! Pénteken (2014.05.02.-án) nincs rendelés! Kérem, hogy sűrgős esetben az ügyelethez forduljanak.</b>', '2014-05-04', 'munkanap átrendezés miatt!', 0, 3, '2014-04-30 08:53:09'),
(9, '<b>Figyelem! Pénteken (2014.05.02.-án) nincs rendelés! Kérem, hogy sűrgős esetben az ügyelethez forduljanak.</b>', '2014-05-04', 'munkanap átrendezés miatt!', 0, 4, '2014-04-30 08:53:32'),
(10, 'Figyelem! 2014.06.30.-tól 07.07.13.-ig és 07.28-tól 08.05.-ig szabadságon leszek. Helyettesít: Dr. Szeiffert Gábor', '2014-08-06', '', 0, 4, '2014-05-13 21:40:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config0`
--
ALTER TABLE `config0`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`,`id_orvos`);

--
-- Indexes for table `content0`
--
ALTER TABLE `content0`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `felvilagosit`
--
ALTER TABLE `felvilagosit`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `felvilagosit0`
--
ALTER TABLE `felvilagosit0`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kapcsolat`
--
ALTER TABLE `kapcsolat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korzet`
--
ALTER TABLE `korzet`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korzet0`
--
ALTER TABLE `korzet0`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orvos`
--
ALTER TABLE `orvos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orvosform1`
--
ALTER TABLE `orvosform1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rendelo`
--
ALTER TABLE `rendelo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rendido`
--
ALTER TABLE `rendido`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kepek`
--
ALTER TABLE `tbl_kepek`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `kep` (`kep`), ADD KEY `szoveg` (`szoveg`), ADD KEY `rovid_leiras` (`rovid_leiras`), ADD KEY `fajta` (`fajta`);

--
-- Indexes for table `tbl_migration`
--
ALTER TABLE `tbl_migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `uzenet`
--
ALTER TABLE `uzenet`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=402;
--
-- AUTO_INCREMENT for table `config0`
--
ALTER TABLE `config0`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=286;
--
-- AUTO_INCREMENT for table `content0`
--
ALTER TABLE `content0`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `felvilagosit`
--
ALTER TABLE `felvilagosit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `felvilagosit0`
--
ALTER TABLE `felvilagosit0`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kapcsolat`
--
ALTER TABLE `kapcsolat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `korzet`
--
ALTER TABLE `korzet`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=175;
--
-- AUTO_INCREMENT for table `korzet0`
--
ALTER TABLE `korzet0`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orvos`
--
ALTER TABLE `orvos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=231;
--
-- AUTO_INCREMENT for table `orvosform1`
--
ALTER TABLE `orvosform1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rendelo`
--
ALTER TABLE `rendelo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `rendido`
--
ALTER TABLE `rendido`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=358;
--
-- AUTO_INCREMENT for table `tbl_kepek`
--
ALTER TABLE `tbl_kepek`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `uzenet`
--
ALTER TABLE `uzenet`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
