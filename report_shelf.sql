-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-02-02 12:49:08
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `report_shelf`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `member_registration`
--

CREATE TABLE `member_registration` (
  `id` int(11) NOT NULL,
  `company` varchar(200) NOT NULL,
  `affiliation` varchar(400) NOT NULL,
  `address` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `password` varchar(10) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `member_registration`
--

INSERT INTO `member_registration` (`id`, `company`, `affiliation`, `address`, `user_name`, `tel`, `mail`, `password`, `is_admin`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, '岡野バルブ製造㈱', 'メンテナンス事業部', '福岡県行橋市西泉4-4-1', '長城　恵二', '0930-23-0023', 'k-nagaki@olano-valve.co.jp', '15082', 1, '2023-01-29 18:24:58', '2023-01-29 18:24:58', NULL),
(2, '株式会社グリーン発電大分', '天ケ瀬発電所', '大分県日田市天瀬町五馬市245-4', '長城恵二', '0930-23-0023', 'k-nagaki@olano-valve.co.jp', '15082', 0, '2023-01-30 14:14:00', '2023-01-30 14:14:00', NULL),
(3, '岡野バルブ', 'メンテナンス事業部', '西宮市2-1-29-1206', 'ナガキケイジ', '09059308174', 'ｓだｓｄｆ', '15082', 0, '2023-02-02 08:24:04', '2023-02-02 08:24:04', NULL),
(4, '岡野バルブ', 'メンテナンス事業部', '西宮市2-1-29-1206', 'nananna', '09059308174', 'r-mori@okano-valve.co.jp', '12345', 0, '2023-02-02 08:26:21', '2023-02-02 08:26:21', NULL),
(5, '岡野バルブ製造㈱', 'メンテナンス事業部', '西宮市2-1-29-1206', '1111111111', '09059308174', 'k-nagaki@olano-valve.co.jp', '12345', 0, '2023-02-02 08:46:19', '2023-02-02 08:46:19', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `report_data`
--

CREATE TABLE `report_data` (
  `id` int(11) NOT NULL,
  `auxiliaries` varchar(1000) NOT NULL,
  `auxiliaries_number` varchar(1000) NOT NULL,
  `auxiliaries_name` varchar(1000) NOT NULL,
  `year` year(4) NOT NULL,
  `specification_type` varchar(200) NOT NULL,
  `specification` mediumblob NOT NULL,
  `report_type` varchar(200) NOT NULL,
  `report` mediumblob NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `report_data`
--

INSERT INTO `report_data` (`id`, `auxiliaries`, `auxiliaries_number`, `auxiliaries_name`, `year`, `specification_type`, `specification`, `report_type`, `report`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'バルブ', 'SV-1', '主蒸気止弁', 2023, 'application/pdf', 0x646174612f323032333031333030383337323441707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, 'application/pdf', 0x646174612f323032333031333030383337323441707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, '2023-01-30 16:37:24', '2023-01-30 16:37:24', '2023-01-30 16:37:24'),
(2, 'バルブ', 'SV-1', '主蒸気止弁', 2023, 'application/pdf', 0x646174612f323032333031333030383431333041707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, 'application/pdf', 0x646174612f323032333031333030383431333041707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, '2023-01-30 16:41:30', NULL, NULL),
(3, 'バルブ', 'SV-1', '主蒸気止弁', 2023, 'application/pdf', 0x646174612f323032333031333030383433303841707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, 'application/pdf', 0x646174612f323032333031333030383433303841707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, '2023-01-30 16:43:08', NULL, NULL),
(4, 'バルブ', 'SV-1', '主蒸気止弁', 2023, 'application/pdf', 0x646174612f323032333031333031343139333041707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, 'application/pdf', 0x646174612f323032333031333031343139333041707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, '2023-01-30 22:19:30', NULL, NULL),
(5, 'バルブ', 'SF-1', 'ドラム安全弁', 2022, 'application/pdf', 0x646174612f323032333031333031343233353441707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, 'application/pdf', 0x646174612f323032333031333031343233353441707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, '2023-01-30 22:23:54', NULL, NULL),
(6, 'バルブ', 'BWCP-１', '循環ポンプ入口弁', 2019, 'application/pdf', 0x646174612f3230323330313330313432353233313742353737315f31392d31322d31385f303535374d2d31332e706466, 'application/pdf', 0x646174612f3230323330313330313432353233313742363032385f32302d30362d32345f313133374d2e706466, '2023-01-30 22:25:23', NULL, NULL),
(7, 'バルブ', 'SV-1', '主蒸気止弁', 2023, 'application/pdf', 0x646174612f323032333031333130323533343741707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, 'application/pdf', 0x646174612f323032333031333130323533343741707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, '2023-01-31 10:53:47', NULL, NULL),
(8, 'バルブ', 'SV-1', '循環ポンプ入口弁', 2022, 'application/pdf', 0x646174612f323032333031333130333231343441707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, 'application/pdf', 0x646174612f323032333031333130333231343441707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, '2023-01-31 11:21:44', NULL, NULL),
(9, 'バルブ', 'SV-1', '主蒸気止弁', 2023, 'application/pdf', 0x31305f70687030355f6b616461692f646174612f323032333031333130363333353441707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, 'application/pdf', 0x31305f70687030355f6b616461692f646174612f323032333031333130363333353441707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, '2023-01-31 14:33:54', NULL, NULL),
(10, '配管', '12345', '主蒸気管', 2021, 'application/pdf', 0x646174612f323032333031333130363335333441707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, 'application/pdf', 0x646174612f323032333031333130363335333441707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, '2023-01-31 14:35:34', NULL, NULL),
(11, '補器', '123', '駆動部', 2019, 'application/pdf', 0x646174612f323032333031333130373238313641707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, 'application/pdf', 0x646174612f323032333031333130373238313641707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, '2023-01-31 15:28:16', NULL, NULL),
(12, 'バルブ', 'SV-1', '主蒸気止弁', 2023, 'application/pdf', 0x646174612f323032333031333130383134333041707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, 'application/pdf', 0x646174612f323032333031333130383134333041707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, '2023-01-31 16:14:30', NULL, NULL),
(13, 'バルブ', 'FW-502', '復水器入口止弁', 2018, 'application/pdf', 0x646174612f323032333032303130363437323941707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, 'application/pdf', 0x646174612f323032333032303130363437323941707047756172642de4bf9de8adb7e4b880e69982e5819ce6ada2e6898be9a086e69bb8202831292e706466, '2023-02-01 14:47:29', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `company_id` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `auxiliaries_name` varchar(200) NOT NULL,
  `year` year(4) NOT NULL,
  `file` mediumblob NOT NULL,
  `file_pass` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `request`
--

INSERT INTO `request` (`id`, `company_id`, `user_id`, `auxiliaries_name`, `year`, `file`, `file_pass`, `created_at`) VALUES
(1, '0', 2, 'バルブ', 2022, 0x6170706c69636174696f6e2f706466, 'data/20230202124043AppGuard-保護一時停止手順書 (1).pdf', '2023-02-02 20:40:43'),
(2, '0', 2, 'バルブ', 2022, 0x6170706c69636174696f6e2f706466, 'data/20230202124151AppGuard-保護一時停止手順書 (1).pdf', '2023-02-02 20:41:51'),
(3, '0', 2, 'バルブ', 2019, 0x6170706c69636174696f6e2f706466, 'data/20230202124315AppGuard-保護一時停止手順書 (1).pdf', '2023-02-02 20:43:15'),
(4, 'GHO', 2, 'バルブ', 2021, 0x6170706c69636174696f6e2f706466, 'data/20230202124349AppGuard-保護一時停止手順書 (1).pdf', '2023-02-02 20:43:49');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `member_registration`
--
ALTER TABLE `member_registration`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `report_data`
--
ALTER TABLE `report_data`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `member_registration`
--
ALTER TABLE `member_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルの AUTO_INCREMENT `report_data`
--
ALTER TABLE `report_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
