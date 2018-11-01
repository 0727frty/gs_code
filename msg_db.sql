-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 年 11 月 01 日 23:47
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `msg_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `password`, `picture`, `created`, `modified`) VALUES
(1, '古屋 強', 't-furuya@type.jp', '3927', '20181025012512d41d8cd98f00b204e9800998ecf8427e.', '2018-10-20 23:21:23', '2018-10-24 16:25:12'),
(2, '中村', 'nakamura@type.jp', '3927', '', '2018-10-20 23:22:17', '2018-10-20 14:22:17'),
(3, 'テストさん', 'test@type.jp', '0000', '', '2018-10-20 23:23:02', '2018-10-20 14:23:02'),
(4, '管理者1', 'kanri', 'kanri', '20181024234242d41d8cd98f00b204e9800998ecf8427e.', '2018-10-21 01:29:22', '2018-10-24 14:42:42'),
(6, 'ユーザー1', 'user', 'user', 'me.png', '2018-10-21 01:30:51', '2018-10-21 09:19:06'),
(7, '太郎', 'taro@gmail.com', 'taro', '', '2018-10-21 12:30:12', '2018-10-21 03:30:12'),
(8, 'テストさん', 'bokushi@gmail.com', 'bokushi', '20181023015432d41d8cd98f00b204e9800998ecf8427e.', '2018-10-23 01:56:39', '2018-10-22 16:56:39'),
(18, 'フルヤツヨシ', 'tsukahara0727@gmail.com', '$2y$10$l8ugxXQ6DVxtCvDUF9JcC.gtWI/2I0aKko4H8KWThlp24efI6ZfsK', '20181030005731d41d8cd98f00b204e9800998ecf8427e.', '2018-10-30 00:56:26', '2018-10-29 15:57:31');

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(12) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `reply_post_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `posts`
--

INSERT INTO `posts` (`id`, `message`, `member_id`, `reply_post_id`, `created`, `modified`) VALUES
(1, 'テスト', 6, 0, '2018-10-21 18:04:56', '2018-10-21 09:04:56'),
(2, '2回目の投稿です!', 6, 0, '2018-10-21 18:22:36', '2018-10-21 09:22:36'),
(4, 'https://qiita.com/miyohide/items/6cb8967282d4b2db0f61', 6, 0, '2018-10-22 00:30:19', '2018-10-21 15:30:19'),
(5, '４コメ', 6, 0, '2018-10-22 00:46:44', '2018-10-21 15:46:44'),
(6, '5コメ', 6, 0, '2018-10-22 00:46:50', '2018-10-21 15:46:50'),
(7, '6コメ', 6, 0, '2018-10-22 00:46:56', '2018-10-21 15:46:56'),
(8, '7コメ', 6, 0, '2018-10-23 00:15:26', '2018-10-22 15:15:26'),
(9, '管理者で投稿1', 4, 0, '2018-10-23 01:07:08', '2018-10-22 16:07:08'),
(10, '牧師をやっています', 8, 0, '2018-10-23 01:57:32', '2018-10-22 16:57:32'),
(11, 'girlです！', 9, 0, '2018-10-23 02:04:32', '2018-10-22 17:04:32'),
(12, '古屋投稿！', 6, 0, '2018-10-23 09:13:06', '2018-10-23 00:13:06'),
(13, '@テスト girlです！\r\n返信メッセージでーす！', 6, 11, '2018-10-23 09:13:38', '2018-10-23 00:13:38'),
(14, '投稿テスト', 6, 0, '2018-10-24 20:58:52', '2018-10-24 11:58:52'),
(16, 'かばさんアイコンになりました！', 4, 0, '2018-10-25 01:06:19', '2018-10-24 16:06:19'),
(17, 'もくもく・・・', 1, 0, '2018-10-25 01:25:36', '2018-10-24 16:25:36'),
(18, '@テスト girlです！\r\n元気？', 6, 11, '2018-10-28 20:31:16', '2018-10-28 11:31:16'),
(19, 'テスト！', 16, 0, '2018-10-29 22:11:52', '2018-10-29 13:11:52'),
(20, 'ポケモンです＾＾', 17, 0, '2018-10-29 22:15:26', '2018-10-29 13:15:26'),
(21, 'フルヤ 強です！', 18, 0, '2018-10-30 00:57:53', '2018-10-29 15:57:53'),
(22, '@ユーザー1 2回目の投稿です!　どうですか？元気ですか？', 18, 2, '2018-11-01 21:52:05', '2018-11-01 12:52:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
