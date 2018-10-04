-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 年 10 月 04 日 23:07
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(12) NOT NULL,
  `cmt` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `img`, `uid`, `cmt`, `indate`) VALUES
(29, 'ティール組織', 'https://amzn.to/2N8azgV', '51VetYi1kkL._SX308_BO1,204,203,200_.jpg', 1, '今、newspicksでも連載されていて注目の本です。', '2018-09-30 19:39:35'),
(30, 'エンジニアリング組織論への招待 ~不確実性に向き合う思考と組織のリファクタリング', 'https://amzn.to/2y1GgmL', '51K+8q6629L._SX350_BO1,204,203,200_.jpg', 2, 'ああああ', '2018-09-30 19:41:57'),
(31, 'センスのいらない経営', 'https://amzn.to/2Nc8KzH', '41EbeuRTvyL._SX338_BO1,204,203,200_.jpg', 1, 'センスいらないらしいです。', '2018-09-30 19:43:25'),
(32, 'カイゼン・ジャーニー たった1人からはじめて、「越境」するチームをつくるまで', 'https://amzn.to/2IqD351', '413zYBVOo2L._SX354_BO1,204,203,200_.jpg', 2, '改善は大事', '2018-09-30 19:44:37'),
(33, 'ビジネスモデル2.0図鑑', 'https://www.amazon.co.jp/gp/product/4046023619/ref=s9u_qpp_gw_i6?ie=UTF8&pd_rd_i=4046023619&pd_rd_r=e01c4ab5-c49d-11e8-a829-192d104beea6&pd_rd_w=WvKed&pd_rd_wg=mgDR0&pf_rd_m=AN1VRQENFRJN5&pf_rd_s=&pf_rd_r=XGF3QMYX5CY62QNM6NV2&pf_rd_t=36701&pf_rd_p=5dde70a7-29ac-4e03-87b0-3d01e50df5bc&pf_rd_i=desktop', '416ba7eElQL._SX389_BO1,204,203,200_.jpg', 1, '図解できるようになりたいです。', '2018-09-30 19:46:15'),
(35, 'スペキュラティヴ・デザイン 問題解決から、問題提起へ。—未来を思索するためにデザインができること', 'https://amzn.to/2y7lXEm', '51K+8q6629L._SX350_BO1,204,203,200_.jpg', 1, 'スペキュラティヴ・デザイン', '2018-10-03 01:33:03'),
(37, '社員の力で最高のチームをつくる――〈新版〉1分間エンパワーメント', 'https://amzn.to/2P7LULt', '51V63S2IkqL._SX348_BO1,204,203,200_.jpg', 2, 'エンパワメント！', '2018-10-03 20:22:37'),
(38, 'エンジニアのためのマネジメントキャリアパス ―テックリードからCTOまでマネジメントスキル向上ガイド', 'https://amzn.to/2Pb6SZZ', '51sEua-+ejL._SX350_BO1,204,203,200_.jpg', 1, 'エンジニアのキャリアパスがわかります', '2018-10-04 23:01:21'),
(39, '起業の科学 スタートアップサイエンス', 'https://amzn.to/2xYeaJW', '51Hu9MIXTvL._SX352_BO1,204,203,200_.jpg', 1, 'まさにサイエンス！', '2018-10-04 23:05:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
