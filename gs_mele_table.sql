-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 7 月 25 日 09:25
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
-- テーブルの構造 `gs_mele_table`
--

CREATE TABLE `gs_mele_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_mele_table`
--

INSERT INTO `gs_mele_table` (`id`, `user_id`, `song_name`, `created_at`) VALUES
(4, 2, 'pua mana', '2024-07-25 00:41:50'),
(5, 2, 'koali', '2024-07-25 00:42:13'),
(6, 2, 'pua a hihi', '2024-07-25 00:42:29'),
(7, 2, 'kealoha', '2024-07-25 00:44:16'),
(9, 2, 'kanohonapilikai', '2024-07-25 00:45:53'),
(10, 2, 'umiakahanu', '2024-07-25 00:47:48'),
(11, 2, 'makee ailana', '2024-07-25 06:45:44'),
(12, 2, 'he mele aloha no puna', '2024-07-25 06:46:38'),
(13, 2, 'alohano', '2024-07-25 06:46:54'),
(14, 2, 'kalehua ula', '2024-07-25 06:47:11'),
(15, 2, 'kuu mili', '2024-07-25 06:47:17'),
(16, 2, 'kapilina', '2024-07-25 06:47:41');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_mele_table`
--
ALTER TABLE `gs_mele_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_mele_table`
--
ALTER TABLE `gs_mele_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `gs_mele_table`
--
ALTER TABLE `gs_mele_table`
  ADD CONSTRAINT `gs_mele_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `gs_kadai_hula` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
