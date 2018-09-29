-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 年 9 月 27 日 22:40
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
  `cmt` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `img`, `cmt`, `indate`) VALUES
(1, 'スッキリわかるSQL入門 ドリル215問付き！ スッキリわかるシリーズ', 'https://amzn.to/2pyaav3', '<img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=4844333933&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=0727frty-22&language=ja_JP" >', 'これはテスト投稿です。learnだよ', '2018-09-22 19:01:43'),
(5, 'ティール組織――マネジメントの常識を覆す次世代型組織の出現', 'https://amzn.to/2xzBj55', '<a href="https://www.amazon.co.jp/gp/product/4862762263/ref=as_li_ss_il?ie=UTF8&pd_rd_i=4862762263&pd_rd_r=a11dd4ef-bf22-11e8-a829-192d104beea6&pd_rd_w=jsEvl&pd_rd_wg=MP4UL&pf_rd_m=AN1VRQENFRJN5&pf_rd_s=&pf_rd_r=NPJQ11ES908BTB8A7QG5&pf_rd_t=36701&pf_rd_p=a3a1572c-f1ee-4418-98a4-c2d0a69c6cb8&pf_rd_i=desktop&linkCode=li3&tag=0727frty-22&linkId=869a8b02a5da3ea0f1633477dd0f4ac1&language=ja_JP" target="_blank"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=4862762263&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=0727frty-22&language=ja_JP" ></a><img src="https://ir-jp.amazon-adsystem.com/e/ir?t=0727frty-22&language=ja_JP&l=li3&o=9&a=4862762263" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />', '今度読みたい', '2018-09-23 20:20:46'),
(6, 'HOLACRACY 役職をなくし生産性を上げるまったく新しい組織マネジメント', 'https://amzn.to/2PX4FkI', '<a href="https://www.amazon.co.jp/gp/product/4569827713/ref=as_li_ss_il?ie=UTF8&pd_rd_i=4569827713&pd_rd_r=1f307834-bf27-11e8-9369-bbb6f35b33bf&pd_rd_w=fuyh0&pd_rd_wg=NkP5D&pf_rd_m=AN1VRQENFRJN5&pf_rd_s=&pf_rd_r=AVQ0KT351XHVNWWQEBB4&pf_rd_t=36701&pf_rd_p=a3a1572c-f1ee-4418-98a4-c2d0a69c6cb8&pf_rd_i=desktop&linkCode=li3&tag=0727frty-22&linkId=9108261d824209b911cc7785ec27ea20&language=ja_JP" target="_blank"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=4569827713&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=0727frty-22&language=ja_JP" ></a><img src="https://ir-jp.amazon-adsystem.com/e/ir?t=0727frty-22&language=ja_JP&l=li3&o=9&a=4569827713" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />', '今気になっている本です。更新', '2018-09-23 20:52:56'),
(12, '仕事2.0 人生100年時代の変身力', 'https://amzn.to/2xMQEi9', '<a href="https://www.amazon.co.jp/%E4%BB%95%E4%BA%8B2-0-%E4%BA%BA%E7%94%9F100%E5%B9%B4%E6%99%82%E4%BB%A3%E3%81%AE%E5%A4%89%E8%BA%AB%E5%8A%9B-NewsPicks-Book-%E4%BD%90%E8%97%A4%E7%95%99%E7%BE%8E-ebook/dp/B07F6XJZR9/ref=as_li_ss_il?_encoding=UTF8&pd_rd_i=B07F6XJZR9&pd_rd_r=61c14fd0-bffd-11e8-9db4-473eaecadd24&pd_rd_w=KjVDi&pd_rd_wg=g2Vlh&pf_rd_i=desktop-dp-sims&pf_rd_m=AN1VRQENFRJN5&pf_rd_p=053a78c4-e34f-47d4-9426-4d23f47a211d&pf_rd_r=V45A1Q6WXEYTKQJY09TX&pf_rd_s=desktop-dp-sims&pf_rd_t=40701&psc=1&refRID=V45A1Q6WXEYTKQJY09TX&linkCode=li3&tag=0727frty-22&linkId=18ff38149dfbb5f9d89ca96a4143f3c1&language=ja_JP" target="_blank"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B07F6XJZR9&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=0727frty-22&language=ja_JP" ></a><img src="https://ir-jp.amazon-adsystem.com/e/ir?t=0727frty-22&language=ja_JP&l=li3&o=9&a=B07F6XJZR9" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />', 'これからの日本社会についてよくわかりました。', '2018-09-24 22:28:08'),
(13, 'このまま今の会社にいていいのか？と一度でも思ったら読む 転職の思考法', 'https://amzn.to/2N073oM', '<a href="https://www.amazon.co.jp/%E3%81%93%E3%81%AE%E3%81%BE%E3%81%BE%E4%BB%8A%E3%81%AE%E4%BC%9A%E7%A4%BE%E3%81%AB%E3%81%84%E3%81%A6%E3%81%84%E3%81%84%E3%81%AE%E3%81%8B%EF%BC%9F%E3%81%A8%E4%B8%80%E5%BA%A6%E3%81%A7%E3%82%82%E6%80%9D%E3%81%A3%E3%81%9F%E3%82%89%E8%AA%AD%E3%82%80-%E8%BB%A2%E8%81%B7%E3%81%AE%E6%80%9D%E8%80%83%E6%B3%95-%E5%8C%97%E9%87%8E-%E5%94%AF%E6%88%91-ebook/dp/B07DCLSV6H/ref=as_li_ss_il?_encoding=UTF8&pd_rd_i=B07DCLSV6H&pd_rd_r=666fe426-bffd-11e8-9db4-473eaecadd24&pd_rd_w=HZo8M&pd_rd_wg=3yPhp&pf_rd_i=desktop-dp-sims&pf_rd_m=AN1VRQENFRJN5&pf_rd_p=053a78c4-e34f-47d4-9426-4d23f47a211d&pf_rd_r=MYFVX8GK5DS3HFVC4P71&pf_rd_s=desktop-dp-sims&pf_rd_t=40701&psc=1&refRID=MYFVX8GK5DS3HFVC4P71&linkCode=li3&tag=0727frty-22&linkId=934eddc20bf50bbd465b2f5ae52217eb&language=ja_JP" target="_blank"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B07DCLSV6H&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=0727frty-22&language=ja_JP" ></a><img src="https://ir-jp.amazon-adsystem.com/e/ir?t=0727frty-22&language=ja_JP&l=li3&o=9&a=B07DCLSV6H" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />', '今、転職を検討していなくても参考になる本です。', '2018-09-24 22:29:32'),
(15, '起業の科学 スタートアップサイエンス', 'https://amzn.to/2QUvpUb', '<a href="https://www.amazon.co.jp/gp/product/4822259757/ref=as_li_ss_il?ie=UTF8&pd_rd_i=4822259757&pd_rd_r=c76f7964-bffe-11e8-9c13-b7a7080f2dc1&pd_rd_w=2nrcT&pd_rd_wg=IBws4&pf_rd_m=AN1VRQENFRJN5&pf_rd_s=&pf_rd_r=EYND9M92YFRVPXDXNE4R&pf_rd_t=36701&pf_rd_p=a3a1572c-f1ee-4418-98a4-c2d0a69c6cb8&pf_rd_i=desktop&linkCode=li3&tag=0727frty-22&linkId=b4c72ba5d6a63c4cc8493ef1927ed47e&language=ja_JP" target="_blank"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=4822259757&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=0727frty-22&language=ja_JP" ></a><img src="https://ir-jp.amazon-adsystem.com/e/ir?t=0727frty-22&language=ja_JP&l=li3&o=9&a=4822259757" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />', 'これから読みたい', '2018-09-24 22:36:50'),
(21, 'NETFLIXの最強人事戦略～自由と責任の文化を築く～', 'https://amzn.to/2DA4wlM', '<a href="https://www.amazon.co.jp/gp/product/B07GWJCBVP/ref=as_li_ss_il?ie=UTF8&pd_rd_i=B07GWJCBVP&pd_rd_r=f2ce8a90-c259-11e8-9369-bbb6f35b33bf&pd_rd_w=M5mmz&pd_rd_wg=F1Dq2&pf_rd_m=AN1VRQENFRJN5&pf_rd_s=&pf_rd_r=T8DQC9CWRH0FDZSHWAE7&pf_rd_t=36701&pf_rd_p=7d4cee6a-0149-45bb-a2b2-9b4531af080e&pf_rd_i=desktop&linkCode=li3&tag=0727frty-22&linkId=78496620be92f8ef31b59bb0beb6d1bb&language=ja_JP" target="_blank"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B07GWJCBVP&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=0727frty-22&language=ja_JP" ></a><img src="https://ir-jp.amazon-adsystem.com/e/ir?t=0727frty-22&language=ja_JP&l=li3&o=9&a=B07GWJCBVP" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />', '読んだけど、面白かったです。', '2018-09-27 22:34:48'),
(22, '世界最高のチーム　グーグル流「最少の人数」で「最大の成果」を生み出す方法', 'https://amzn.to/2QcFlYa', '<a href="https://www.amazon.co.jp/%E4%B8%96%E7%95%8C%E6%9C%80%E9%AB%98%E3%81%AE%E3%83%81%E3%83%BC%E3%83%A0-%E3%82%B0%E3%83%BC%E3%82%B0%E3%83%AB%E6%B5%81%E3%80%8C%E6%9C%80%E5%B0%91%E3%81%AE%E4%BA%BA%E6%95%B0%E3%80%8D%E3%81%A7%E3%80%8C%E6%9C%80%E5%A4%A7%E3%81%AE%E6%88%90%E6%9E%9C%E3%80%8D%E3%82%92%E7%94%9F%E3%81%BF%E5%87%BA%E3%81%99%E6%96%B9%E6%B3%95-%E3%83%94%E3%83%A7%E3%83%BC%E3%83%88%E3%83%AB%E3%83%BB%E3%83%95%E3%82%A7%E3%83%AA%E3%82%AF%E3%82%B9%E3%83%BB%E3%82%B0%E3%82%B8%E3%83%90%E3%83%81-ebook/dp/B07GBTBCKK/ref=as_li_ss_il?_encoding=UTF8&pd_rd_i=B07GBTBCKK&pd_rd_r=fbc9bbb6-c259-11e8-b03f-e1c172cb931f&pd_rd_w=SQo2g&pd_rd_wg=bdYq8&pf_rd_i=desktop-dp-sims&pf_rd_m=AN1VRQENFRJN5&pf_rd_p=053a78c4-e34f-47d4-9426-4d23f47a211d&pf_rd_r=K86CWBN9D95H8XTFP8JY&pf_rd_s=desktop-dp-sims&pf_rd_t=40701&psc=1&refRID=K86CWBN9D95H8XTFP8JY&linkCode=li3&tag=0727frty-22&linkId=370520c00931b720c3964d5c31df65fd&language=ja_JP" target="_blank"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B07GBTBCKK&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=0727frty-22&language=ja_JP" ></a><img src="https://ir-jp.amazon-adsystem.com/e/ir?t=0727frty-22&language=ja_JP&l=li3&o=9&a=B07GBTBCKK" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />', '今読んでいる最中です。', '2018-09-27 22:36:19'),
(23, '孫社長の締め切りをすべて守った 最速！ 「プロマネ」仕事術', 'https://amzn.to/2DAMsYR', '<a href="https://www.amazon.co.jp/%E5%AD%AB%E7%A4%BE%E9%95%B7%E3%81%AE%E7%B7%A0%E3%82%81%E5%88%87%E3%82%8A%E3%82%92%E3%81%99%E3%81%B9%E3%81%A6%E5%AE%88%E3%81%A3%E3%81%9F-%E6%9C%80%E9%80%9F%EF%BC%81-%E3%80%8C%E3%83%97%E3%83%AD%E3%83%9E%E3%83%8D%E3%80%8D%E4%BB%95%E4%BA%8B%E8%A1%93-%E4%B8%89%E6%9C%A8-%E9%9B%84%E4%BF%A1-ebook/dp/B07GP738QZ/ref=as_li_ss_il?_encoding=UTF8&pd_rd_i=B07GP738QZ&pd_rd_r=2add473b-c25a-11e8-9684-6dae0617037e&pd_rd_w=dk215&pd_rd_wg=UUcX5&pf_rd_i=desktop-dp-sims&pf_rd_m=AN1VRQENFRJN5&pf_rd_p=053a78c4-e34f-47d4-9426-4d23f47a211d&pf_rd_r=1J3RXK85FPYMRSPWDXY0&pf_rd_s=desktop-dp-sims&pf_rd_t=40701&psc=1&refRID=1J3RXK85FPYMRSPWDXY0&linkCode=li3&tag=0727frty-22&linkId=30365634001c8eea4a641aac07ced83a&language=ja_JP" target="_blank"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B07GP738QZ&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=0727frty-22&language=ja_JP" ></a><img src="https://ir-jp.amazon-adsystem.com/e/ir?t=0727frty-22&language=ja_JP&l=li3&o=9&a=B07GP738QZ" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />', '今度読みたいです', '2018-09-27 22:37:15'),
(24, '世界一速い問題解決', 'https://amzn.to/2DBpilj', '<a href="https://www.amazon.co.jp/%E4%B8%96%E7%95%8C%E4%B8%80%E9%80%9F%E3%81%84%E5%95%8F%E9%A1%8C%E8%A7%A3%E6%B1%BA-%E5%AF%BA%E4%B8%8B-%E8%96%AB-ebook/dp/B07G9TSDZ3/ref=as_li_ss_il?_encoding=UTF8&pd_rd_i=B07G9TSDZ3&pd_rd_r=58270f2d-c25a-11e8-8295-c34f99c9445c&pd_rd_w=e1wsG&pd_rd_wg=iqHDm&pf_rd_i=desktop-dp-sims&pf_rd_m=AN1VRQENFRJN5&pf_rd_p=053a78c4-e34f-47d4-9426-4d23f47a211d&pf_rd_r=AQ3E9AWAVNREFJX86S8T&pf_rd_s=desktop-dp-sims&pf_rd_t=40701&psc=1&refRID=AQ3E9AWAVNREFJX86S8T&linkCode=li3&tag=0727frty-22&linkId=a5af7edb02ab52ce87fdd2085d5731d5&language=ja_JP" target="_blank"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B07G9TSDZ3&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=0727frty-22&language=ja_JP" ></a><img src="https://ir-jp.amazon-adsystem.com/e/ir?t=0727frty-22&language=ja_JP&l=li3&o=9&a=B07G9TSDZ3" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />', '問題解決の本でした、わかりやすかったです', '2018-09-27 22:38:46');

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
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
