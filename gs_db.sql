-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 24-01-06 05:13
-- 서버 버전: 10.4.28-MariaDB
-- PHP 버전: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `gs_db`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `gs_am_table`
--

CREATE TABLE `gs_am_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `artist` varchar(64) NOT NULL,
  `pop` text NOT NULL,
  `genre` text NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `gs_am_table`
--

INSERT INTO `gs_am_table` (`id`, `name`, `artist`, `pop`, `genre`, `url`, `comment`, `date`) VALUES
(12, '모르는 사람', 'Zion.T', 'Pop', 'ballade', 'https://www.youtube.com/watch?v=yd8_KD4rZio', '好きなアーティストの新曲', '2023-12-21 22:27:17'),
(23, '꽃피는 봄이 오면＿更新', 'BMK', 'Pop', 'ballade', 'https://www.youtube.com/watch?v=OnO92YGNwD8', 'ますます好きになる曲', '2023-12-23 13:08:53');

-- --------------------------------------------------------

--
-- 테이블 구조 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 테이블의 덤프 데이터 `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', '$2y$10$VCwbEqU6HF4RBwbdS/fl.OMuZSOX8LCazXrJW8KVbZ6FIMLgWJFEq', 1, 0),
(2, 'テスト2一般', 'test2', '$2y$10$ERJV/Yuiks1VVFdX2tzBHemadpY/CDGtQzzUMe6fPreS5enjrPI8u', 0, 0),
(3, 'テスト３', 'test3', '$2y$10$CeKyDZ0kKb3Bt58T.0iQzO0WpsqKvuZGEqq8mqFZr/UJikSzX7fjq', 0, 0);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `gs_am_table`
--
ALTER TABLE `gs_am_table`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `gs_am_table`
--
ALTER TABLE `gs_am_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 테이블의 AUTO_INCREMENT `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 테이블의 AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
