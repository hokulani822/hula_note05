-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 7 月 11 日 15:32
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db_kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_kadai_hula`
--

CREATE TABLE `gs_kadai_hula` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `age` int(3) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `hulareki` varchar(2) DEFAULT NULL,
  `halauname` varchar(50) DEFAULT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL DEFAULT 0,
  `life_flg` int(1) NOT NULL DEFAULT 0,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_kadai_hula`
--

INSERT INTO `gs_kadai_hula` (`id`, `name`, `age`, `tel`, `email`, `hulareki`, `halauname`, `lid`, `lpw`, `kanri_flg`, `life_flg`, `indate`) VALUES
(1, 'test1管理者', 10, '0', 'test1@test.jp', '1', 'test1', 'test1', '$2y$10$WTyN2q/6vENTODEBvc3fSOaXQYMUkzugEeW7b8jq8m/7CVXpZ2YlO', 1, 0, '2024-06-25 23:17:42'),
(2, 'test2', 20, '0', 'test2@test.jp', '2', 'test2', 'test2', '$2y$10$aVqYAsfUg4vBDRrN5OY05Owfn24J7YS2ibmzF4AlxMkD2VrTnpTPW', 0, 0, '2024-06-25 23:19:22'),
(3, 'test3', 30, '0', 'test3@test.jp', '3', 'test3', 'test3', '$2y$10$x84lQz2Ch6/vomCTUnRzoOw52QnbBslIg6LX3IvJ3fxRIa1zvHb0m', 0, 0, '2024-06-25 23:19:49'),
(4, 'test4', 40, '0', 'test4@test.jp', '4', 'test4', '', '', 0, 0, '2024-06-25 23:20:03'),
(5, 'test5', 50, '0', 'test5@test.jp', '5', 'test5', '', '', 0, 0, '2024-06-25 23:23:23'),
(6, 'test6', 60, '0', 'test6@test.jp', '6', 'test6', '', '', 0, 0, '2024-06-25 23:23:58'),
(7, 'test7', 70, '0', 'test7@test.jp', '7', 'test7', '', '', 0, 0, '2024-06-25 23:24:22'),
(8, 'test8', 80, '0', 'test8@test.jp', '8', 'test8', '', '', 0, 0, '2024-06-25 23:29:23'),
(13, 'test9', 90, '0', 'test9@test.jp', '9', 'test9', '', '', 0, 0, '2024-07-03 16:39:23'),
(15, 'test', 30, '0', 'test9@test.jp', '2', '2', '', '', 0, 0, '2024-07-11 00:38:45'),
(16, 'test', 30, '0', 'test1@test.jp', '2', 'test2', '', '', 0, 0, '2024-07-11 00:39:29'),
(17, 'test', 50, '0', 'test1@test.jp', '10', 'test1', '', '', 0, 0, '2024-07-11 01:05:13'),
(18, 'test', 21, '0', 'test9@test.jp', '10', '2', '', '', 0, 0, '2024-07-11 01:19:09'),
(19, 'test', 21, '0', 'test9@test.jp', '10', '2', '', '', 0, 0, '2024-07-11 14:07:42'),
(20, 'test', 30, '0', 'test9@test.jp', '2', 'test2', '', '', 0, 0, '2024-07-11 01:30:27'),
(21, 'test', 30, '0', 'test9@test.jp', '2', 'test2', '', '', 0, 0, '2024-07-11 01:32:30'),
(22, 'test', 30, '0', 'test9@test.jp', '2', 'test2', '', '', 0, 0, '2024-07-11 01:32:39'),
(23, 'test', 30, '0', 'test9@test.jp', '1', 'test9', '', '', 0, 0, '2024-07-11 08:55:28'),
(24, 'test', 21, '0', 'test9@test.jp', '9', 'test6', '', '', 0, 0, '2024-07-11 16:12:15'),
(25, 'test', 21, '00000000000', 'test9@test.jp', '2', 'test1', 'test22', '$2y$10$fNoY8ihrO20wZolzZY8rKej9TBylgWTuSytzgRVN0rFwtKoto4e5W', 0, 0, '2024-07-11 22:13:14');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_kadai_hula`
--
ALTER TABLE `gs_kadai_hula`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_kadai_hula`
--
ALTER TABLE `gs_kadai_hula`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
