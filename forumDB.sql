-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019-10-16 17:25:39
-- 伺服器版本: 10.1.31-MariaDB
-- PHP 版本： 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `selene_ntu`
--

-- --------------------------------------------------------

--
-- 資料表結構 `archive`
--

CREATE TABLE `archive` (
  `arc_id` int(11) NOT NULL COMMENT '編號',
  `arc_post` int(11) NOT NULL COMMENT '追蹤文章',
  `arc_rndcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '誰追蹤',
  `arc_time` datetime NOT NULL COMMENT '時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL COMMENT '編號',
  `art_name` varchar(100) NOT NULL COMMENT '文章名稱',
  `content` text NOT NULL COMMENT '文章內容',
  `refer` text NOT NULL COMMENT '參考資料',
  `signature` varchar(100) DEFAULT NULL,
  `author` varchar(30) NOT NULL COMMENT '作者',
  `gender` int(1) NOT NULL,
  `author_rndcode` varchar(10) NOT NULL,
  `type` int(3) NOT NULL COMMENT '分類',
  `like_count` int(11) NOT NULL DEFAULT '0' COMMENT '讚數',
  `reply_count` int(11) NOT NULL DEFAULT '0',
  `art_del` int(1) NOT NULL DEFAULT '0' COMMENT '是否被移除',
  `top` int(1) NOT NULL DEFAULT '0' COMMENT '置頂文章',
  `public` int(1) NOT NULL COMMENT '公開',
  `sign` int(1) NOT NULL COMMENT '顯示簽名檔',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '發表時間',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `badge_use` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `badge`
--

CREATE TABLE `badge` (
  `bd_id` int(11) NOT NULL COMMENT '編號',
  `bd_num` int(11) NOT NULL COMMENT '徽章編號',
  `bd_have` varchar(10) NOT NULL COMMENT '擁有者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `bug`
--

CREATE TABLE `bug` (
  `bg_id` int(11) NOT NULL COMMENT '編號',
  `bg_title` varchar(20) NOT NULL COMMENT 'Bug標題',
  `bg_who` varchar(8) NOT NULL COMMENT '誰回報',
  `bg_content` varchar(3000) NOT NULL COMMENT '內容',
  `bg_type` int(1) NOT NULL COMMENT '種類',
  `bg_reply` varchar(1000) NOT NULL COMMENT 'bug回覆',
  `bg_reply_ck` int(11) NOT NULL COMMENT '是否已回覆',
  `bg_check` int(11) NOT NULL COMMENT 'bug查看',
  `bg_time` datetime NOT NULL COMMENT '時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `dept`
--

CREATE TABLE `dept` (
  `de_id` int(11) NOT NULL COMMENT '編號',
  `de_code` int(3) NOT NULL COMMENT '系所編號',
  `de_name` varchar(100) NOT NULL COMMENT '系所名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `dept`
--

INSERT INTO `dept` (`de_id`, `de_code`, `de_name`) VALUES
(1, 1, '機械工程'),
(2, 2, '化工與材料工程'),
(3, 3, '電機工程'),
(4, 4, '電子工程'),
(5, 5, '資訊工程'),
(6, 6, '資訊網路工程'),
(7, 7, '土木工程'),
(8, 8, '電腦通訊與系統工程'),
(9, 9, '空間資訊與防災科技'),
(10, 10, '應用空間資訊'),
(11, 11, '材料製造科技'),
(12, 12, '數位多媒體設計'),
(13, 13, '機電光工程'),
(14, 14, '建築'),
(15, 15, '遊戲系統創新設計'),
(16, 16, '飛機系統工程'),
(17, 17, '航空運輸'),
(18, 18, '航空機械'),
(19, 19, '航空電子'),
(20, 20, '航空服務管理'),
(21, 21, '國際企業'),
(22, 22, '財務金融'),
(23, 23, '企業管理'),
(24, 24, '資訊管理'),
(25, 25, '工業管理'),
(26, 26, '應用外語'),
(27, 27, '多媒體與遊戲發展科學'),
(28, 28, '文化創意與數位媒體設計'),
(29, 29, '觀光休閒'),
(30, 30, '企業管理暨經營管理'),
(31, 31, '行銷與流通管理'),
(32, 32, '餐旅管理'),
(33, 33, '物業經營與管理'),
(34, 34, '國際企業經營'),
(35, 35, '經營管理'),
(36, 36, '國際商務與行銷'),
(37, 37, '工業工程與管理'),
(38, 38, '文創與數位多媒體'),
(39, 39, '健康科技'),
(40, 40, '生物科技'),
(41, 41, '食品科學'),
(42, 42, '創新與專案管理'),
(43, 43, '企業與創業管理學'),
(44, 44, '會計學'),
(45, 45, '行銷學'),
(46, 46, '商學院企業管理國際'),
(47, 47, '多媒體與行動商務學'),
(48, 48, '資訊傳播學'),
(49, 49, '創意產業與數位電影'),
(50, 50, '數位空間與商品設計'),
(51, 51, '物流與航運管理學'),
(52, 52, '空運管理學'),
(53, 53, '運輸科技與管理學'),
(54, 54, '觀光與餐飲旅館學'),
(55, 55, '休閒事業管理學'),
(56, 56, '公共事務管理學'),
(57, 57, '法律學'),
(58, 58, '應用日語學'),
(59, 59, '應用英語學'),
(60, 60, '應用華語學'),
(61, 61, '保健營養學'),
(62, 62, '健康產業管理學'),
(63, 63, '養生與健康行銷學'),
(64, 64, '形象與健康管理'),
(65, 65, '護理'),
(66, 66, '物理治療'),
(67, 67, '營養系暨營養醫學'),
(68, 68, '動物保健'),
(69, 69, '語言治療與聽力學'),
(70, 70, '文化創意產業'),
(71, 71, '老人福利與事業'),
(72, 72, '運動休閒'),
(73, 73, '食品科技'),
(74, 74, '幼兒保育'),
(75, 75, '美髮造型設計'),
(76, 76, '化妝品應用'),
(77, 77, '健康事業管理'),
(78, 78, '生物醫學'),
(79, 79, '環境與安全衛生工程'),
(80, 80, '生物科技暨醫學'),
(81, 81, '醫學檢驗生物技術'),
(82, 82, '醫學影像暨放射科學'),
(83, 83, '牙體技術暨材料'),
(84, 84, '視光'),
(85, 85, '兒童教育暨事業經營學'),
(86, 86, '老人照顧'),
(87, 87, '醫療暨健康產業管理'),
(88, 88, '文教事業經營'),
(89, 89, '自動化工程'),
(90, 90, '資訊與網路通訊'),
(91, 91, '服務與科技管理'),
(92, 92, '行銷與服務管理'),
(93, 93, '創意生活應用設計'),
(94, 94, '媒體與遊戲設計'),
(95, 95, '遊戲與產品設計'),
(96, 96, '商業設計'),
(97, 97, '空間設計'),
(98, 98, '美容'),
(99, 99, '運動健康與休閒'),
(100, 100, '觀光'),
(101, 101, '老人照護'),
(102, 102, '化妝品應用與管理'),
(103, 103, '餐飲管理'),
(104, 104, '視光學'),
(105, 105, '復健'),
(106, 106, '醫事檢驗'),
(107, 107, '職業安全衛生'),
(108, 108, '生命關懷事業'),
(109, 109, '健康美容觀光'),
(110, 110, '調理保健技術'),
(111, 111, '高齡健康促進'),
(112, 112, '數位媒體應用'),
(113, 113, '文化資產與創意學'),
(114, 114, '傳播學'),
(115, 115, '產品與媒體設計學'),
(116, 116, '資訊應用學'),
(117, 117, '佛教學'),
(118, 118, '中國文學與應用學'),
(119, 119, '歷史學'),
(120, 120, '外國語文學'),
(121, 121, '藝術學'),
(122, 122, '健康與創意素食產業學'),
(123, 123, '未來與樂活產業學'),
(124, 124, '社會學'),
(125, 125, '心理學'),
(126, 126, '公共事務學'),
(127, 127, '管理學'),
(128, 128, '應用經濟學'),
(129, 129, '土木與防災設計'),
(130, 130, '室內設計'),
(131, 131, '視覺傳達設計'),
(132, 132, '影視設計'),
(133, 133, '互動娛樂設計'),
(134, 134, '國際商務'),
(135, 135, '財政稅務'),
(136, 136, '會計'),
(137, 137, '觀光與休閒事業管理'),
(138, 138, '應用英語'),
(139, 139, '電腦與通訊'),
(140, 140, '化工與生化工程'),
(141, 141, '綠色能源應用'),
(142, 142, '香妝與養生保健'),
(143, 143, '綠環境設計'),
(144, 144, '文化創意設計與數位整合'),
(145, 145, '休閒運動管理'),
(146, 146, '觀光事業管理'),
(147, 147, '銀髮事業'),
(148, 148, '機械與自動化工程'),
(149, 149, '光電科學與工程'),
(150, 150, '資訊科技應用'),
(151, 151, '資訊傳播'),
(152, 152, '多媒體動畫遊戲'),
(153, 153, '行動多媒體設計'),
(154, 154, '觀光與休閒管理'),
(155, 155, '高階主管企管'),
(156, 156, '財稅與會計資訊'),
(157, 157, '財經法律'),
(158, 158, '金融與風險管理'),
(159, 159, '會計資訊'),
(160, 160, '財政'),
(161, 161, '數位媒體設計'),
(162, 162, '創意產品設計'),
(163, 163, '資訊科技'),
(164, 164, '資訊網路'),
(165, 165, '流行設計'),
(166, 166, '服飾設計'),
(167, 167, '時尚經營'),
(168, 168, '營建科技'),
(169, 169, '材料科學與工程'),
(170, 170, '環境工程'),
(171, 171, '生物技術'),
(172, 172, '光電工程'),
(173, 173, '旅館管理'),
(174, 174, '航空暨運輸服務管理'),
(175, 175, '經營管理研究'),
(176, 176, '理財經營管理'),
(177, 177, '數位多媒體'),
(178, 178, '通訊工程'),
(179, 179, '光機電與材料'),
(180, 180, '工程科學'),
(181, 181, '科技管理'),
(182, 182, '財務管理'),
(183, 183, '國際金融管理'),
(184, 184, '運輸科技與物流管理'),
(185, 185, '國際經營管理'),
(186, 186, '生物資訊'),
(187, 187, '建築與都市計畫'),
(188, 188, '景觀建築'),
(189, 189, '營建管理'),
(190, 190, '工業產品設計'),
(191, 191, '建築與設計'),
(192, 192, '行政管理'),
(193, 193, '休閒遊憩規劃與管理'),
(194, 194, '觀光與會展'),
(195, 195, '生物資訊與醫學工程'),
(196, 196, '行動商務與多媒體應用'),
(197, 197, '光電與通訊'),
(198, 198, '創意商品設計'),
(199, 199, '時尚設計'),
(200, 200, '國際設計'),
(201, 201, '保健營養生技'),
(202, 202, '護理學'),
(203, 203, '聽力暨語言治療'),
(204, 204, '職能治療'),
(205, 205, '休閒與遊憩管理'),
(206, 206, '會計與資訊'),
(207, 207, '社會工作'),
(208, 208, '幼兒教育'),
(209, 209, '美容造型'),
(210, 210, '行銷與流通'),
(211, 211, '健康休閒管理'),
(212, 212, '長期照護'),
(213, 213, '口腔衛生學'),
(214, 214, '國際企業學'),
(215, 215, '幼兒教育學'),
(216, 216, '創意商品設計學'),
(217, 217, '牙體技術'),
(218, 218, '美容保健'),
(219, 219, '資訊與通訊'),
(220, 220, '時尚經營管理'),
(221, 221, '機械與電腦輔助工程'),
(222, 222, '創意設計'),
(223, 223, '數位文藝'),
(224, 224, '休閒運動與健康管理'),
(225, 225, '大眾傳播學'),
(226, 226, '廣播與電視新聞學'),
(227, 227, '影劇藝術學'),
(228, 228, '原住民學'),
(229, 229, '視覺傳達設計學'),
(230, 230, '藝術與創意設計學'),
(231, 231, '時尚設計學'),
(232, 232, '社會工作學'),
(233, 233, '應用心理學'),
(234, 234, '宗教與文化學'),
(235, 235, '生命禮儀學'),
(236, 236, '餐旅管理學'),
(237, 237, '資訊管理學'),
(238, 238, '企業管理學'),
(239, 239, '應用外語學'),
(240, 240, '機械與機電工程'),
(241, 241, '應用科技'),
(242, 242, '化學工程與材料工程'),
(243, 243, '材料與纖維'),
(244, 244, '環境科技與管理'),
(245, 245, '觀光英語'),
(246, 246, '創意流行時尚設計'),
(247, 247, '餐飲廚藝管理'),
(248, 248, '機電工程'),
(249, 249, '營建工程'),
(250, 250, '建築與室內設計'),
(251, 251, '土木與空間資訊'),
(252, 252, '影像顯示科技'),
(253, 253, '醫學工程'),
(254, 254, '化妝品與時尚彩妝'),
(255, 255, '時尚生活創意設計'),
(256, 256, '休閒與運動管理'),
(257, 257, '觀光遊憩'),
(258, 258, '金融管理'),
(259, 259, '創意產業經營'),
(260, 260, '行銷與物流學'),
(261, 261, '財務金融學'),
(262, 262, '中國文學學'),
(263, 263, '生物科技學'),
(264, 264, '精緻農業學'),
(265, 265, '材料與能源工程學'),
(266, 266, '數位設計學'),
(267, 267, '時尚造形學'),
(268, 268, '景觀與環境設計學'),
(269, 269, '休閒保健學'),
(270, 270, '時尚產業網路行銷學'),
(271, 271, '數位動畫學位學'),
(272, 272, '助產'),
(273, 273, '高齡及長期照護事業'),
(274, 274, '醫事技術'),
(275, 275, '保健營養'),
(276, 276, '健康美容'),
(277, 277, '休閒與遊憩事業管理'),
(278, 278, '資訊科技學'),
(279, 279, '文教事業管理學'),
(280, 280, '環境工程與科學'),
(281, 281, '應用化學及材料科學'),
(282, 282, '環境與生命學'),
(283, 283, '生活服務產業'),
(284, 284, '服飾設計管理'),
(285, 285, '美容造型設計'),
(286, 286, '餐飲'),
(287, 287, '運動休閒與健康管理'),
(288, 288, '商品設計'),
(289, 289, '多媒體動畫'),
(290, 290, '舞蹈'),
(291, 291, '醫學影像暨放射技術'),
(292, 292, '醫務管理'),
(293, 293, '生物醫學工程'),
(294, 294, '環境工程衛生'),
(295, 295, '生物科技暨製藥技術'),
(296, 296, '應用財務管理'),
(297, 297, '行動科技應用'),
(298, 298, '觀光休閒系'),
(299, 299, '旅運管理'),
(300, 300, '時尚造形設計'),
(301, 301, '數位設計'),
(302, 302, '藥學'),
(303, 303, '醫藥化學'),
(304, 304, '化粧品應用與管理'),
(305, 305, '嬰幼兒保育'),
(306, 306, '生活應用與保健'),
(307, 307, '文化事業發展'),
(308, 308, '資訊多媒體應用'),
(309, 309, '環境資源管理'),
(310, 310, '運動管理'),
(311, 311, '休閒保健管理'),
(312, 312, '老人服務事業管理'),
(313, 313, '國際企業管理'),
(314, 314, '英國語文'),
(315, 315, '國際事務'),
(316, 316, '翻譯'),
(317, 317, '西班牙語文'),
(318, 318, '日本語文'),
(319, 319, '法國語文'),
(320, 320, '德國語文'),
(321, 321, '數位內容應用與管理'),
(322, 322, '應用華語文'),
(323, 323, '外語教學'),
(324, 324, '傳播藝術'),
(325, 325, '光電系統工程'),
(326, 326, '化學工程與材料科學與工程'),
(327, 327, '土木工程與環境資源管理'),
(328, 328, '旅館事業管理'),
(329, 329, '休閒事業管理'),
(330, 330, '材料工程'),
(331, 331, '房地產開發與管理'),
(332, 332, '公共關係暨廣告'),
(333, 333, '旅遊文化發展'),
(334, 334, '休閒遊憩與運動管理'),
(335, 335, '餐飲管理及廚藝'),
(336, 336, '呼吸照護'),
(337, 337, '老人照顧管理'),
(338, 338, '國際貿易學'),
(339, 339, '財稅學'),
(340, 340, '合作經濟學'),
(341, 341, '統計學'),
(342, 342, '經濟學'),
(343, 343, '機械與電腦輔助工程學'),
(344, 344, '纖維與複合材料學'),
(345, 345, '工業工程與系統管理學'),
(346, 346, '化學工程學'),
(347, 347, '航太與系統工程學'),
(348, 348, '資訊工程學'),
(349, 349, '電機工程學'),
(350, 350, '電子工程學'),
(351, 351, '自動控制工程學'),
(352, 352, '通訊工程學'),
(353, 353, '水利工程與資源保育學'),
(354, 354, '土木工程學'),
(355, 355, '建築學'),
(356, 356, '都市計畫與空間資訊學'),
(357, 357, '土地管理學'),
(358, 358, '風險管理與保險學'),
(359, 359, '中國文學'),
(360, 360, '應用數學'),
(361, 361, '環境工程與科學學'),
(362, 362, '材料科學與工程學'),
(363, 363, '光電學'),
(364, 364, '新聞學'),
(365, 365, '口語傳播學'),
(366, 366, '公共關係暨廣告學'),
(367, 367, '圖文傳播暨數位出版學'),
(368, 368, '廣播電視電影學'),
(369, 369, '數位多媒體設計學'),
(370, 370, '傳播管理學'),
(371, 371, '行政管理學'),
(372, 372, '觀光學'),
(373, 373, '社會心理學'),
(374, 374, '英語學'),
(375, 375, '日本語文學'),
(376, 376, '美術'),
(377, 377, '音樂'),
(378, 378, '流行音樂'),
(379, 379, '視覺傳達設計系暨創新應用設計'),
(380, 380, '養生休閒管理學'),
(381, 381, '銀髮生活產業學'),
(382, 382, '微型創業管理學'),
(383, 383, '高齡福祉事業管理學'),
(384, 384, '網路與數位媒體應用學'),
(385, 385, '會展暨文創事業管理學'),
(386, 386, '國際健康行銷管理學'),
(387, 387, '化粧品科技'),
(388, 388, '兒童產業服務學'),
(389, 389, '產業安全衛生與防災'),
(390, 390, '國際事業暨文化交流'),
(391, 391, '國際商務英語'),
(392, 392, '國際觀光與會展學'),
(393, 393, '外語文教事業發展'),
(394, 394, '創意藝術產業'),
(395, 395, '產業研發'),
(396, 396, '化妝品應用學'),
(397, 397, '服務事業管理'),
(398, 398, '文化觀光產業學'),
(399, 399, '創業與行銷學'),
(400, 400, '機械與能源工程'),
(401, 401, '國際貿易系暨國際商務與金融'),
(402, 402, '空間設計系暨環境設計'),
(403, 403, '時尚展演事業學'),
(404, 404, '資訊電機'),
(405, 405, '產業研發'),
(406, 406, '生醫資訊暨生醫工程'),
(407, 407, '電機與通訊工程'),
(408, 408, '室內及景觀'),
(409, 409, '土木及水利工程'),
(410, 410, '財務工程與精算學'),
(411, 411, '歷史與文物管理'),
(412, 412, '電子商務'),
(413, 413, '精密系統設計學'),
(414, 414, '綠色能源科技'),
(415, 415, '機械與航空工程'),
(416, 416, '社會發展'),
(417, 417, '智慧財產權'),
(418, 418, '視訊傳播設計'),
(419, 419, '保險金融管理'),
(420, 420, '銀髮產業管理'),
(421, 421, '應用化學'),
(422, 422, '環境工程與管理'),
(423, 423, '工業設計'),
(424, 424, '景觀及都市設計'),
(425, 425, '休閒事業經營'),
(426, 426, '國際貿易'),
(427, 427, '應用統計'),
(428, 428, '多媒體設計'),
(429, 429, '應用日語'),
(430, 430, '應用中文'),
(431, 431, '流通管理'),
(432, 432, '公共行政學'),
(433, 433, '諮商與臨床心理學'),
(434, 434, '華文文學'),
(435, 435, '中國語文學'),
(436, 436, '英美語文學'),
(437, 437, '臺灣文化學'),
(438, 438, '音樂學'),
(439, 439, '藝術與設計學'),
(440, 440, '藝術創意產業學'),
(441, 441, '自然資源與環境學'),
(442, 442, '運籌管理'),
(443, 443, '觀光暨休閒遊憩學'),
(444, 444, '物理學'),
(445, 445, '生命科學'),
(446, 446, '化學'),
(447, 447, '光電工程學'),
(448, 448, '教育與潛能開發學'),
(449, 449, '教育行政與管理學'),
(450, 450, '特殊教育學'),
(451, 451, '體育與運動科學'),
(452, 452, '族群關係與文化學'),
(453, 453, '民族語言與傳播學'),
(454, 454, '民族事務與發展學'),
(455, 455, '旅遊管理學'),
(456, 456, '非營利事業管理學'),
(457, 457, '文化創意事業管理學'),
(458, 458, '會計資訊學'),
(459, 459, '文學'),
(460, 460, '哲學與生命教育學'),
(461, 461, '生死學'),
(462, 462, '宗教學'),
(463, 463, '國際事務與企業學'),
(464, 464, '應用社會學'),
(465, 465, '電子商務管理學'),
(466, 466, '自然生物科技學'),
(467, 467, '視覺與媒體藝術學'),
(468, 468, '創意產品設計學'),
(469, 469, '建築與景觀學'),
(470, 470, '工業管理與資訊'),
(471, 471, '創新產品設計'),
(472, 472, '多媒體與電腦娛樂科學'),
(473, 473, '流行音樂產業'),
(474, 474, '機械與自動化工程學'),
(475, 475, '財務與計算數學'),
(476, 476, '土木與生態工程學'),
(477, 477, '生物技術與化學工程'),
(478, 478, '工業管理學'),
(479, 479, '國際商務學'),
(480, 480, '公共政策與管理學'),
(481, 481, '電影與電視學'),
(482, 482, '國際企業經營學'),
(483, 483, '國際財務金融學'),
(484, 484, '國際觀光餐旅學'),
(485, 485, '娛樂事業管理學'),
(486, 486, '廚藝學'),
(487, 487, '健康管理學'),
(488, 488, '營養學'),
(489, 489, '生物醫學工程學'),
(490, 490, '職能治療學'),
(491, 491, '醫務管理學'),
(492, 492, '物理治療學'),
(493, 493, '學士後中醫學'),
(494, 494, '資產與物業管理'),
(495, 495, '能源與材料科技'),
(496, 496, '資訊網路技術'),
(497, 497, '應用財務金融'),
(498, 498, '人力資源管理與發展'),
(499, 499, '觀光與遊憩管理'),
(500, 500, '財務金融系暨理財與稅務管理'),
(501, 501, '不動產投資與經營'),
(502, 502, '行銷管理'),
(503, 503, '健康餐旅'),
(504, 504, '國際貿易運籌'),
(505, 505, '旅館與會展管理'),
(506, 506, '多媒體與遊戲設計'),
(507, 507, '生活創意設計'),
(508, 508, '電腦輔助工業設計'),
(509, 509, '工商業設計'),
(510, 510, '休閒餐飲'),
(511, 511, '觀光旅遊'),
(512, 512, '健康管理'),
(513, 513, '專案管理'),
(514, 514, '餐旅經營'),
(515, 515, '視覺設計'),
(516, 516, '視覺創意'),
(517, 517, '遊戲開發'),
(518, 518, '時尚造型設計'),
(519, 519, '整體造型'),
(520, 520, '健康照顧社會工作'),
(521, 521, '華文傳播與創意'),
(522, 522, '財務資訊與金融'),
(523, 523, '奈米科技學'),
(524, 524, '機械工程學'),
(525, 525, '生物環境工程學'),
(526, 526, '電機資訊學'),
(527, 527, '工業與系統工程學'),
(528, 528, '國際經營與貿易學'),
(529, 529, '國際商學'),
(530, 530, '商業巨量資料管理'),
(531, 531, '財經法律學'),
(532, 532, '工程法律學'),
(533, 533, '室內設計學'),
(534, 534, '商業設計學'),
(535, 535, '景觀學'),
(536, 536, '文創設計學'),
(537, 537, '設計學'),
(538, 538, '教育學'),
(539, 539, '應用外國語文學'),
(540, 540, '應用華語文學'),
(541, 541, '數位音樂應用學'),
(542, 542, '製造工程與管理學'),
(543, 543, '生物科技與工程學'),
(544, 544, '化學工程與材料科學學'),
(545, 545, '工業工程與管理學'),
(546, 546, '先進能源學'),
(547, 547, '財務金融暨會計學'),
(548, 548, '資訊社會學'),
(549, 549, '生物與醫學資訊學'),
(550, 550, '社會暨政策科學學'),
(551, 551, '文化產業與文化政策學'),
(552, 552, '電信工程'),
(553, 553, '電機與控制工程'),
(554, 554, '顯示科技'),
(555, 555, '生醫工程'),
(556, 556, '電機學院產業研發'),
(557, 557, '資訊科學與工程'),
(558, 558, '多媒體工程'),
(559, 559, '網路工程'),
(560, 560, '光電系統'),
(561, 561, '影像與生醫光電'),
(562, 562, '照明與能源光電'),
(563, 563, '平面顯示技術'),
(564, 564, '加速器光源科技與應用'),
(565, 565, '聲音與音樂創意科技'),
(566, 566, '奈米科學及工程學'),
(567, 567, '電子物理學'),
(568, 568, '數學建模與科學'),
(569, 569, '分子科學'),
(570, 570, '分子醫學與生物工程'),
(571, 571, '生物資訊及系統生物'),
(572, 572, '運輸與物流管理學'),
(573, 573, '管理科學學'),
(574, 574, '交通運輸'),
(575, 575, '資訊管理與財務金融'),
(576, 576, '外國語文學系暨外國文學與語言學'),
(577, 577, '英語教學'),
(578, 578, '應用藝術'),
(579, 579, '社會與文化'),
(580, 580, '人文社會學系暨族群與文化'),
(581, 581, '傳播與科技學'),
(582, 582, '科技法律'),
(583, 552, '電信工程'),
(584, 553, '電機與控制工程'),
(585, 554, '顯示科技'),
(586, 555, '生醫工程'),
(587, 556, '電機學院產業研發'),
(588, 557, '資訊科學與工程'),
(589, 558, '多媒體工程'),
(590, 559, '網路工程'),
(591, 560, '光電系統'),
(592, 561, '影像與生醫光電'),
(593, 562, '照明與能源光電'),
(594, 563, '平面顯示技術'),
(595, 564, '加速器光源科技與應用'),
(596, 565, '聲音與音樂創意科技'),
(597, 566, '奈米科學及工程學'),
(598, 567, '電子物理學'),
(599, 568, '數學建模與科學'),
(600, 569, '分子科學'),
(601, 570, '分子醫學與生物工程'),
(602, 571, '生物資訊及系統生物'),
(603, 572, '運輸與物流管理學'),
(604, 573, '管理科學學'),
(605, 574, '交通運輸'),
(606, 575, '資訊管理與財務金融'),
(607, 576, '外國語文學系暨外國文學與語言學'),
(608, 577, '英語教學'),
(609, 578, '應用藝術'),
(610, 579, '社會與文化'),
(611, 580, '人文社會學系暨族群與文化'),
(612, 581, '傳播與科技學'),
(613, 582, '科技法律');

-- --------------------------------------------------------

--
-- 資料表結構 `discuss`
--

CREATE TABLE `discuss` (
  `di_id` int(11) NOT NULL COMMENT '編號',
  `di_numb` int(3) NOT NULL COMMENT '數字代號',
  `di_code` varchar(30) NOT NULL COMMENT '英文代號',
  `di_sch` int(1) NOT NULL COMMENT '1為校版',
  `di_name` varchar(50) NOT NULL COMMENT '中文名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `discuss`
--

INSERT INTO `discuss` (`di_id`, `di_numb`, `di_code`, `di_sch`, `di_name`) VALUES
(1, 0, 'all', 3, '全部'),
(2, 1, 'uch', 1, '健行科大'),
(3, 2, 'lhu', 1, '龍華科大'),
(4, 3, 'life', 0, '有趣'),
(5, 4, 'shrimp', 0, '瞎聊'),
(6, 5, 'mw', 0, '男女'),
(7, 6, 'cust', 1, '中華科大'),
(8, 7, 'hate', 0, '黑特'),
(9, 8, 'ask', 0, '問？'),
(10, 9, 'knu', 1, '開南大學'),
(11, 10, 'hk', 1, '弘光科大'),
(12, 11, 'ctust', 1, '中臺科大'),
(13, 12, 'ctu', 1, '建國科大'),
(14, 13, 'mkc', 1, '馬偕護專'),
(15, 14, 'jente', 1, '仁德護專'),
(16, 15, 'fgu', 1, '佛光大學'),
(17, 16, 'cute', 1, '中國科大'),
(18, 17, 'kyu', 1, '高苑科大'),
(19, 18, 'ltu', 1, '嶺東科大'),
(20, 19, 'vnu', 1, '萬能科大'),
(21, 20, 'vent', 0, '廢文'),
(22, 21, 'sex', 0, '西斯'),
(23, 22, 'boy', 0, '男孩'),
(24, 23, 'girl', 0, '女孩'),
(25, 24, 'pet', 0, '寵物'),
(26, 25, 'movie', 0, '影劇'),
(27, 26, 'food', 0, '美食'),
(28, 27, 'marvel', 0, '靈異'),
(29, 28, 'constellation', 0, '星座'),
(30, 29, 'works', 0, '手作'),
(31, 30, 'creation', 0, '藝文'),
(32, 31, 'music', 0, '音樂'),
(33, 32, 'chu', 1, '中華大學'),
(34, 33, 'asia', 1, '亞洲大學'),
(35, 34, 'hsc', 1, '新生醫專'),
(36, 35, 'ann', 4, '公告'),
(37, 36, 'trending', 0, '時事'),
(38, 37, 'job', 0, '工作'),
(39, 38, 'mood', 0, '心情'),
(40, 39, 'game', 0, '遊戲'),
(41, 40, 'photography', 0, '攝影'),
(42, 41, 'mhchcm', 1, '敏惠護專'),
(43, 42, 'sju', 1, '聖約翰科大'),
(44, 43, 'hcu', 1, '玄奘大學'),
(45, 44, 'tiit', 1, '南亞技院'),
(46, 45, 'csu', 1, '正修科大'),
(47, 46, 'mdu', 1, '明道大學'),
(48, 47, 'fy', 1, '輔英科大'),
(49, 48, 'tut', 1, '台南應用科大'),
(50, 49, 'szmc', 1, '樹人護專'),
(51, 50, 'ypu', 1, '元培科大'),
(52, 51, 'hwu', 1, '醒吾科大'),
(53, 52, 'cnu', 1, '嘉南藥理大學'),
(54, 53, 'wzu', 1, '文藻外語大學'),
(55, 54, 'must', 1, '明新科大'),
(56, 55, 'ksu', 1, '崑山科大'),
(57, 56, 'cgust', 1, '長庚科大'),
(58, 57, 'fcu', 1, '逢甲大學'),
(59, 58, 'shu', 1, '世新大學'),
(60, 59, 'cyut', 1, '朝陽科大'),
(61, 60, 'hwh', 1, '華夏科大'),
(62, 61, 'nutc', 1, '臺中科大'),
(63, 62, 'ndhu', 1, '東華大學'),
(64, 63, 'nhu', 1, '南華大學'),
(65, 64, 'isu', 1, '義守大學'),
(66, 65, 'stust', 1, '南臺科大'),
(67, 66, 'tourism', 0, '旅遊'),
(68, 67, 'movement', 0, '體育'),
(69, 68, 'hust', 1, '修平科大'),
(70, 69, 'ctcn', 1, '耕莘健康專'),
(71, 70, 'takming', 1, '德明科大'),
(72, 71, 'cjc', 1, '崇仁醫專'),
(73, 72, 'coding', 0, '程式設計'),
(74, 73, 'writing', 0, '手寫'),
(75, 74, 'ocu', 1, '僑光科大'),
(76, 75, 'oit', 1, '亞東學院'),
(77, 76, 'ydu', 1, '育達科大'),
(78, 77, 'cycu', 1, '中原大學'),
(79, 78, 'yzu', 1, '元智大學'),
(80, 79, 'nctu', 1, '交通大學'),
(81, 80, 'beauty', 0, '彩妝'),
(82, 81, 'fashion', 0, '時尚'),
(83, 82, 'fantasy', 0, '創作文'),
(84, 83, 'star', 0, '追星'),
(85, 84, 'moto', 0, 'Moto'),
(86, 85, 'technology', 0, '科技'),
(87, 86, 'selene', 0, 'SELENE'),
(88, 79, 'nctu', 1, '交通大學');

-- --------------------------------------------------------

--
-- 資料表結構 `discuss_href`
--

CREATE TABLE `discuss_href` (
  `dh_id` int(11) NOT NULL COMMENT '編號',
  `dh_code` int(11) NOT NULL COMMENT '代碼',
  `dh_url` varchar(100) NOT NULL COMMENT '網址'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `discuss_href`
--

INSERT INTO `discuss_href` (`dh_id`, `dh_code`, `dh_url`) VALUES
(1, 0, '<a href=\"all\">所有文章</a>'),
(2, 1, '<a href=\"uch\">健行科大</a>'),
(3, 2, '<a href=\"lhu\">龍華科大</a>'),
(4, 3, '<a href=\"life\">有趣</a>'),
(5, 4, '<a href=\"shrimp\">瞎聊</a>'),
(6, 5, '<a href=\"mw\">男女</a>'),
(7, 6, '<a href=\"cust\">中華科大</a>'),
(9, 7, '<a href=\"hate\">黑特</a>'),
(11, 8, '<a href=\"ask\">問？</a>'),
(12, 9, '<a href=\"knu\">開南大學</a>'),
(13, 10, '<a href=\"hk\">弘光科大</a>'),
(14, 11, '<a href=\"ctust\">中臺科大</a>'),
(15, 12, '<a href=\"ctu\">建國科大</a>'),
(16, 13, '<a href=\"mkc\">馬偕護專</a>'),
(17, 14, '<a href=\"jente\">仁德護專</a>'),
(18, 15, '<a href=\"fgu\">佛光大學</a>'),
(19, 16, '<a href=\"cute\">中國科大</a>'),
(20, 17, '<a href=\"kyu\">高苑科大</a>'),
(21, 18, '<a href=\"ltu\">嶺東科大</a>'),
(22, 19, '<a href=\"vnu\">萬能科大</a>'),
(23, 20, '<a href=\"vent\">廢文</a>'),
(24, 21, '<a href=\"sex\">西斯</a>'),
(25, 22, '<a href=\"boy\">男孩</a>'),
(26, 23, '<a href=\"girl\">女孩</a>'),
(27, 24, '<a href=\"pet\">寵物</a>'),
(28, 25, '<a href=\"movie\">影劇</a>'),
(29, 26, '<a href=\"food\">美食</a>'),
(30, 27, '<a href=\"marvel\">靈異</a>'),
(31, 28, '<a href=\"constellation\r\n\">星座</a>'),
(33, 29, '<a href=\"works\">手作</a>'),
(34, 30, '<a href=\"creation\">藝文</a>'),
(35, 31, '<a href=\"music\r\n\">音樂</a>'),
(36, 32, '<a href=\"chu\">中華大學</a>'),
(37, 33, '<a href=\"asia\">亞洲大學</a>'),
(38, 34, '<a href=\"hsc\">新生醫專</a>'),
(39, 35, '<a href=\"ann\">公告</a>'),
(40, 36, '<a href=\"trending\">時事</a>'),
(41, 37, '<a href=\"job\">工作</a>'),
(42, 38, '<a href=\"mood\">心情</a>'),
(43, 39, '<a href=\"game\">遊戲</a>'),
(44, 40, '<a href=\"Photography\">攝影</a>'),
(45, 41, '<a href=\"mhchcm\">敏惠護專</a>'),
(46, 42, '<a href=\"sju\">聖約翰科大</a>'),
(47, 43, '<a href=\"hcu\">玄奘大學</a>'),
(48, 44, '<a href=\"tiit\">桃創科大</a>'),
(49, 45, '<a href=\"csu\">正修科大</a>'),
(50, 46, '<a href=\"mdu\">明道大學</a>'),
(51, 47, '<a href=\"fy\">輔英科大</a>'),
(52, 48, '<a href=\"tut\">台南科大</a>'),
(53, 49, '<a href=\"szmc\">樹人醫專</a>'),
(54, 50, '<a href=\"ypu\">元培科大</a>'),
(55, 51, '<a href=\"hwu\">醒吾科大</a>'),
(56, 52, '<a href=\"cnu\">嘉藥大學</a>'),
(57, 53, '<a href=\"wzu\">文藻大學</a>'),
(58, 54, '<a href=\"must\">明新科大</a>'),
(59, 55, '<a href=\"ksu\">崑山科大</a>'),
(60, 56, '<a href=\"cgust\">長庚科大</a>'),
(61, 57, '<a href=\"fcu\">逢甲大學</a>'),
(62, 58, '<a href=\"shu\">世新大學</a>'),
(63, 59, '<a href=\"cyut\">朝陽科大</a>'),
(64, 60, '<a href=\"hwh\">華夏科大</a>'),
(65, 61, '<a href=\"nutc\">臺中科大</a>'),
(66, 62, '<a href=\"ndhu\">東華大學</a>'),
(67, 63, '<a href=\"nhu\">南華大學</a>'),
(68, 64, '<a href=\"isu\">義守大學</a>'),
(69, 65, '<a href=\"stust\">南臺科大</a>'),
(70, 66, '<a href=\"tourism\">旅遊</a>'),
(71, 67, '<a href=\"movement\">體育</a>'),
(72, 68, '<a href=\"hust\">修平科大</a>'),
(73, 69, '<a href=\"ctcn\">耕莘健康管</a>'),
(74, 70, '<a href=\"takming\">德明科大</a>'),
(75, 71, '<a href=\"cjc\">崇仁醫專</a>'),
(76, 72, '<a href=\"coding\">程式設計</a>'),
(77, 73, '<a href=\"writing\">手寫</a>'),
(78, 74, '<a href=\"ocu\">僑光科大</a>'),
(79, 75, '<a href=\"oit\">亞東學院</a>'),
(80, 76, '<a href=\"ydu\">育達科大</a>');

-- --------------------------------------------------------

--
-- 資料表結構 `discuss_p`
--

CREATE TABLE `discuss_p` (
  `dp_id` int(11) NOT NULL COMMENT '編號',
  `dp_code` int(11) NOT NULL COMMENT '代碼',
  `dp_name` varchar(20) NOT NULL COMMENT '名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `discuss_p`
--

INSERT INTO `discuss_p` (`dp_id`, `dp_code`, `dp_name`) VALUES
(1, 1, 'uchp'),
(2, 2, 'lhup'),
(3, 3, 'lifep'),
(4, 4, 'shrimpp'),
(5, 5, 'mwp'),
(6, 6, 'custp'),
(7, 7, 'hatep'),
(8, 8, 'askp'),
(9, 9, 'knup'),
(10, 10, 'hkp'),
(11, 11, 'ctustp'),
(12, 12, 'ctup'),
(13, 13, 'mkcp'),
(14, 14, 'jentep'),
(15, 15, 'fgup'),
(16, 16, 'cutep'),
(17, 17, 'kyup'),
(18, 18, 'ltup'),
(19, 19, 'vnup'),
(20, 20, 'ventp'),
(21, 21, 'sexp'),
(22, 22, 'boyp'),
(23, 23, 'girlp'),
(24, 24, 'petp'),
(25, 25, 'moviep'),
(26, 26, 'foodp'),
(27, 27, 'marvelp'),
(28, 28, 'constellationp'),
(29, 29, 'worksp'),
(30, 30, 'creationp'),
(31, 31, 'musicp'),
(32, 32, 'chup'),
(33, 33, 'asiap'),
(34, 34, 'hscp'),
(35, 35, 'annp'),
(36, 36, 'trendingp'),
(37, 37, 'jobp'),
(38, 38, 'moodp'),
(39, 39, 'gamep'),
(40, 40, 'Photographyp'),
(41, 41, 'mhchcmp'),
(42, 42, 'sjup'),
(43, 43, 'hcup'),
(44, 44, 'tiitp'),
(45, 45, 'csup'),
(46, 46, 'mdup'),
(47, 47, 'fyp'),
(48, 48, 'tutp'),
(49, 49, 'szmcp'),
(50, 50, 'ypup'),
(51, 51, 'hwup'),
(52, 52, 'cnup'),
(53, 53, 'wzup'),
(54, 54, 'mustp'),
(55, 55, 'ksup'),
(56, 56, 'cgustp'),
(57, 57, 'fcup'),
(58, 58, 'shup'),
(59, 59, 'cyutp'),
(60, 60, 'hwhp'),
(61, 61, 'nutcp'),
(62, 62, 'ndhup'),
(63, 63, 'nhup'),
(64, 64, 'isup'),
(65, 65, 'stustp'),
(66, 66, 'tourismp'),
(67, 67, 'movementp'),
(68, 68, 'hustp'),
(69, 69, 'ctcnp'),
(70, 70, 'takmingp'),
(71, 71, 'cjcp'),
(72, 72, 'codingp'),
(73, 73, 'writingp'),
(74, 74, 'ocup'),
(75, 75, 'oitp'),
(76, 76, 'ydup');

-- --------------------------------------------------------

--
-- 資料表結構 `forget_psw`
--

CREATE TABLE `forget_psw` (
  `fp_id` int(11) NOT NULL COMMENT '編號',
  `fp_rndcode` varchar(10) NOT NULL COMMENT '申請者',
  `fp_enable` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '金鑰',
  `fp_expire` datetime NOT NULL COMMENT '金鑰期限',
  `fp_hd` int(1) NOT NULL COMMENT '處理完成'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `friend`
--

CREATE TABLE `friend` (
  `id` int(11) NOT NULL COMMENT '流水號',
  `invite` varchar(10) NOT NULL COMMENT '邀請者',
  `invitee` varchar(10) NOT NULL COMMENT '受邀者',
  `agree` int(1) NOT NULL,
  `click` int(1) NOT NULL COMMENT '確認過訊息',
  `add_time` date NOT NULL COMMENT '時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `god`
--

CREATE TABLE `god` (
  `g_id` int(11) NOT NULL COMMENT '編號',
  `g_cover` varchar(100) NOT NULL COMMENT '封面',
  `g_name` varchar(40) NOT NULL COMMENT '名稱',
  `g_content` varchar(150) NOT NULL COMMENT '說明',
  `g_get` int(2) NOT NULL COMMENT '獎賞',
  `g_extra` varchar(50) NOT NULL COMMENT '前三名',
  `g_limit` int(2) NOT NULL COMMENT '人數限制',
  `g_date` date NOT NULL COMMENT '開始日期',
  `g_join_end` date NOT NULL COMMENT '報名截止日',
  `g_king_start` date NOT NULL COMMENT '投票開始日期',
  `g_end` date NOT NULL COMMENT '投票截止',
  `g_reward` int(1) NOT NULL COMMENT '是否發放獎勵',
  `g_type` int(1) NOT NULL COMMENT '競賽分類'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `god_join`
--

CREATE TABLE `god_join` (
  `gj_id` int(5) NOT NULL COMMENT '編號',
  `gj_user` varchar(8) NOT NULL COMMENT '參賽者',
  `gj_item` int(5) NOT NULL COMMENT '項目',
  `gj_msname` varchar(30) NOT NULL COMMENT '音樂名稱',
  `gj_nickname` varchar(30) NOT NULL COMMENT '藝名',
  `gj_like` int(4) NOT NULL COMMENT '喜歡數',
  `gj_order` int(10) NOT NULL COMMENT '參賽者順序',
  `gj_url` varchar(200) NOT NULL COMMENT '參賽者報名網址',
  `gj_player` varchar(150) NOT NULL COMMENT '審核過的網址'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `god_like`
--

CREATE TABLE `god_like` (
  `gl_id` int(11) NOT NULL COMMENT '編號',
  `gl_user` varchar(8) NOT NULL COMMENT '點讚人',
  `gl_item` int(5) NOT NULL COMMENT '點讚項目',
  `gl_itemuser` int(2) NOT NULL COMMENT '參賽者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL COMMENT '編號',
  `likes_rndcode` varchar(255) NOT NULL COMMENT '點擊人',
  `likes_post` varchar(255) NOT NULL COMMENT '點擊文章',
  `time` datetime NOT NULL COMMENT '時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL COMMENT '編號',
  `useremail` varchar(40) NOT NULL COMMENT '校園信箱',
  `nickname` varchar(10) NOT NULL COMMENT '綽號',
  `mg_rndcode` varchar(10) NOT NULL COMMENT '管理員隨機號',
  `password` varchar(40) DEFAULT NULL COMMENT '密碼',
  `level` int(2) NOT NULL COMMENT '等級'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `manager`
--

INSERT INTO `manager` (`id`, `useremail`, `nickname`, `mg_rndcode`, `password`, `level`) VALUES
(1, 'xeaiow', '塞拉涅', '53369497', 'a9b9c8d1', 5),
(4, 'jim840506', '骨頭', '80518013', 'zxc90951', 0),
(8, '402402624', '輔大男神', '48371674', 'dream0919', 0),
(9, 'siyunyou525', '吶兒', '73324843', 'sjiojgoqj2', 0),
(10, 'banqhsia@msn.com', '本本', '88761274', 'b0920216630', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL COMMENT '學校信箱',
  `d_acc` varchar(20) DEFAULT NULL COMMENT '副帳號',
  `enable` varchar(40) NOT NULL COMMENT '啟用',
  `psw` varchar(40) NOT NULL,
  `firstname` varchar(9) NOT NULL COMMENT '真實姓名',
  `rndcode` varchar(10) NOT NULL COMMENT '隨機產生號',
  `gender` int(1) NOT NULL COMMENT '性別',
  `school` int(2) NOT NULL COMMENT '就讀學校',
  `department` int(3) NOT NULL COMMENT '系所',
  `introduction` varchar(3000) NOT NULL COMMENT '自介',
  `specialty` varchar(3000) NOT NULL COMMENT '興趣、專長',
  `signature` varchar(100) NOT NULL COMMENT '簽名檔',
  `pic` varchar(100) NOT NULL,
  `constellation` int(2) DEFAULT NULL COMMENT '星座',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `reg_date` datetime NOT NULL COMMENT '註冊日期',
  `gm` int(1) NOT NULL COMMENT '管理員',
  `status` int(1) NOT NULL,
  `stop` int(11) NOT NULL COMMENT '停止抽卡',
  `online` int(1) NOT NULL COMMENT '1為封鎖',
  `inspect` int(1) NOT NULL COMMENT '是否審核',
  `rece_message` int(1) NOT NULL COMMENT '接收訊息',
  `wrn` int(1) NOT NULL COMMENT '警告',
  `coin` int(5) NOT NULL,
  `last_seen` date DEFAULT NULL COMMENT '最後抽卡日',
  `nameIsHide` int(1) NOT NULL DEFAULT '0' COMMENT '是否隱藏姓名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `oth_sms`
--

CREATE TABLE `oth_sms` (
  `oth_id` int(11) NOT NULL COMMENT '編號',
  `oth_user` varchar(8) NOT NULL,
  `oth_name` varchar(100) NOT NULL COMMENT '訊息標題',
  `oth_content` varchar(200) NOT NULL COMMENT '內容',
  `oth_read` int(1) NOT NULL COMMENT '讀取',
  `oth_time` date NOT NULL COMMENT '發送時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL COMMENT '編號',
  `reply_post` int(11) NOT NULL,
  `reply_rndcode` varchar(10) NOT NULL COMMENT '回覆人',
  `reply_author` varchar(30) NOT NULL,
  `reply_gender` int(1) NOT NULL,
  `content` text NOT NULL COMMENT '內容',
  `art_reply_type` int(11) NOT NULL,
  `reply_f` int(6) NOT NULL COMMENT '回覆樓數',
  `re_check` int(11) NOT NULL COMMENT '發文者看過',
  `reply_item` int(11) NOT NULL COMMENT '第幾筆回覆',
  `reply_like_count` int(11) NOT NULL DEFAULT '0' COMMENT '讚數',
  `reply_del` int(11) NOT NULL DEFAULT '0' COMMENT '是否被移除',
  `reply_anon` int(1) NOT NULL COMMENT '匿名',
  `reply_time` datetime NOT NULL COMMENT '回覆時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `reply_likes`
--

CREATE TABLE `reply_likes` (
  `id` int(11) NOT NULL COMMENT '編號',
  `reply_likes_rndcode` varchar(10) NOT NULL COMMENT '誰點',
  `reply_likes_post` int(11) NOT NULL COMMENT '點哪篇文章',
  `reply_likes_post_f` int(11) DEFAULT NULL,
  `reply_likes_replyid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `report`
--

CREATE TABLE `report` (
  `r_id` int(11) NOT NULL COMMENT '編號',
  `r_report_user` varchar(15) NOT NULL COMMENT '檢舉者',
  `r_report_post` varchar(20) NOT NULL COMMENT '檢舉文章',
  `r_reason` varchar(100) NOT NULL COMMENT '原因',
  `r_date` datetime NOT NULL,
  `r_handle` int(11) NOT NULL COMMENT '是否處理'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `report_reply`
--

CREATE TABLE `report_reply` (
  `rp_id` int(11) NOT NULL COMMENT '編號',
  `rp_report_user` varchar(15) NOT NULL COMMENT '檢舉者',
  `rp_report_reply` varchar(20) NOT NULL COMMENT '檢舉回應',
  `rp_reason` varchar(100) NOT NULL COMMENT '原因',
  `rp_date` datetime NOT NULL,
  `rp_handle` int(11) NOT NULL COMMENT '是否處理'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `report_rnd`
--

CREATE TABLE `report_rnd` (
  `rern_id` int(11) NOT NULL COMMENT '編號',
  `rern_rndcode` varchar(10) NOT NULL COMMENT '被檢舉者',
  `rern_user` varchar(10) NOT NULL COMMENT '檢舉者',
  `rern_content` varchar(50) NOT NULL COMMENT '檢舉內容',
  `rern_handle` int(11) NOT NULL COMMENT '是否審核'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `response_temp`
--

CREATE TABLE `response_temp` (
  `id` int(11) NOT NULL COMMENT '編號',
  `author_rndcode` varchar(10) NOT NULL COMMENT '引用者',
  `articleId` int(11) NOT NULL COMMENT '文章id',
  `content` text NOT NULL COMMENT '引用內容',
  `reply` text COMMENT '引用回應',
  `reason` varchar(255) NOT NULL COMMENT '修改理由',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `rnd_friends`
--

CREATE TABLE `rnd_friends` (
  `rnd_id` int(11) NOT NULL COMMENT '編號',
  `rnd_add_user` varchar(255) NOT NULL COMMENT '先點今日好友的人',
  `rnd_be_add_user` varchar(255) NOT NULL COMMENT '被隨機的使用者',
  `rnd_time` date NOT NULL COMMENT '時間',
  `rnd_his` time NOT NULL COMMENT '時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `school`
--

CREATE TABLE `school` (
  `sc_id` int(11) NOT NULL COMMENT '編號',
  `sc_code` int(11) NOT NULL COMMENT '學校編號',
  `sc_mt_dis` int(2) NOT NULL COMMENT '對應dis編號',
  `sc_name` varchar(100) NOT NULL COMMENT '學校名稱',
  `sc_abb` varchar(10) NOT NULL COMMENT '縮寫',
  `sc_email` varchar(100) NOT NULL COMMENT '學校信箱',
  `sc_ex` varchar(100) NOT NULL COMMENT '範例',
  `sc_url` varchar(500) NOT NULL COMMENT '超連結',
  `sc_mark` varchar(50) NOT NULL COMMENT '備註',
  `sc_blood` int(3) NOT NULL COMMENT '血量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `school`
--

INSERT INTO `school` (`sc_id`, `sc_code`, `sc_mt_dis`, `sc_name`, `sc_abb`, `sc_email`, `sc_ex`, `sc_url`, `sc_mark`, `sc_blood`) VALUES
(1, 1, 2, '龍華科技大學', 'lhu', '@gm.lhu.edu.tw', '學號@gm.lhu.edu.tw', 'http://web.gm.lhu.edu.tw/', '', 196),
(2, 2, 1, '健行科技大學', 'uch', '@uch.edu.tw', '學號@uch.edu.tw', 'https://mail.uch.edu.tw/', '', 366),
(3, 3, 6, '中華科技大學', 'cust', '@ccs.cust.edu.tw', 's+學號@ccs.cust.edu.tw', 'http://ccs.cust.edu.tw/roundcube/', '', 97),
(4, 4, 9, '開南大學', 'knu', '@mail.knu.edu.tw', '學號@mail.knu.edu.tw', 'http://mail.knu.edu.tw/index.html', '', 448),
(5, 5, 10, '弘光科技大學', 'hk', '@ms.hk.edu.tw', 'U102P212@ms.hk.edu.tw', 'http://ms.hk.edu.tw/webmail', '預設密碼為身份證字號，且為小寫', 45),
(6, 6, 11, '中臺科技大學', 'ctust', '@ms3.ctust.edu.tw', 'D10401051@ms3.ctust.edu.tw', 'http://eip.ctust.edu.tw/mailIndex.do', '', 476),
(7, 7, 12, '建國科技大學', 'ctu', '@stu.ctu.edu.tw', '102403007@stu.ctu.edu.tw', 'http://mail.stu.ctu.edu.tw/', '', 0),
(8, 8, 13, '馬偕醫護管理專科學校', 'mkc', '@student.mkc.edu.tw', 's50211078@student.mkc.edu.tw', 'http://student.mkc.edu.tw', '', 402),
(9, 9, 14, '仁德醫護管理專科學校', 'jente', '@jente.edu.tw', '10352295@jente.edu.tw', 'http://ccmail.jente.edu.tw/cc_login.php', '信箱帳號預設為學號、密碼預設首字大寫', 405),
(10, 10, 15, '佛光大學', 'fgu', '@mail.fgu.edu.tw', '10415238@mail.fgu.edu.tw', 'http://mail.fgu.edu.tw/', '', 126),
(11, 11, 16, '中國科技大學', 'cute', '@gm.cute.edu.tw', '1031423087@gm.cute.edu.tw', 'http://iq.cute.edu.tw/index.do?thetime=1457104702751', '', 0),
(12, 12, 17, '高苑科技大學', 'kyu', '@mail.kyu.edu.tw', '40021A2448@mail.kyu.edu.tw', 'http://mail.mail.kyu.edu.tw/', '', 448),
(13, 13, 18, '嶺東科技大學', 'ltu', '@stumail.ltu.edu.tw', 'a28h037@stumail.ltu.edu.tw', 'http://portal.ltu.edu.tw/mailIndex.do', '登入學生資訊系統後點擊\"電子郵件\"', 434),
(14, 14, 19, '萬能科技大學', 'vnu', '@mail.vnu.edu.tw', 'ac0205029@mail.vnu.edu.tw', 'https://mail.vnu.edu.tw', '', 310),
(15, 15, 32, '中華大學', 'chu', '@chu.edu.tw', 'b102200233@chu.edu.tw', 'https://webmail.chu.edu.tw/cgi-bin/openwebmail/openwebmail.pl', '帳號為學號首字小寫密碼為身份證首字小寫', 486),
(16, 16, 33, '亞洲大學', 'asia', '@live.asia.edu.tw', '101032035@live.asia.edu.tw', 'http://mail.live.asia.edu.tw', '密碼同於校園入口', 493),
(17, 17, 34, '新生醫護管理專科學校', 'hsc', '@mail.hsc.edu.tw', '1001501116@mail.hsc.edu.tw', 'http://portal.hsc.edu.tw/toGoogle.do', '請從資訊系統進入信箱，預設密碼為身份證首字大寫', 410),
(18, 18, 41, '敏惠醫護管理專科學校', 'mhchcm', '@smail.mhchcm.edu.tw', '50001030@smail.mhchcm.edu.tw', 'http://smail.mhchcm.edu.tw:8080/webmail-cgi/XwebMail', '信箱進入後選擇最底下的後綴，帳號密碼皆為學號', 462),
(19, 19, 42, '聖約翰科技大學', 'sju', '@stud.sju.edu.tw', '104406022@stud.sju.edu.tw', 'http://gmail.com', '帳號為學號@stud.sju.edu.tw 密碼身份證首字大寫', 492),
(20, 20, 43, '玄奘大學', 'hcu', '@umail.hcu.edu.tw', 'bb1042117@umail.hcu.edu.tw', 'http://umail.hcu.edu.tw', '', 461),
(21, 21, 44, '南亞技術學院', 'tiit', '@tiit.edu.tw', '1041222103@tiit.edu.tw', 'http://mail.tiit.edu.tw/index.html', '預設密碼為學號', 494),
(22, 22, 45, '正修科技大學', 'csu', '@gcloud.csu.edu.tw', 'k+學號@gcloud.csu.edu.tw', 'https://accounts.google.com/ServiceLogin?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ltmpl=default&service=mail&sacu=1&hd=gcloud.csu.edu.tw#identifier', '信箱預設密碼為身份證', 453),
(23, 23, 46, '明道大學', 'mdu', '@live.mdu.edu.tw', '1439082@live.mdu.edu.tw', 'https://login.microsoftonline.com/', '預設密碼第一次使用，請用身分證號首字大寫', 497),
(24, 24, 47, '輔英科技大學', 'fy', '@live.fy.edu.tw', '4AB1040062@live.fy.edu.tw', 'https://portal.office.com/Home', '', 492),
(25, 25, 48, '台南應用科技大學', 'tut', '@gm.tut.edu.tw', '學號@gm.tut.edu.tw', 'http://gm.tut.edu.tw', '預設為身分證字號', 491),
(26, 26, 49, '樹人醫護管理專科學校', 'szmc', '@student.szmc.edu.tw', 's50302172@student.szmc.edu.tw', 'https://accounts.google.com/ServiceLogin?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ltmpl=default&service=mail&sacu=1&rip=1&hd=student.szmc.edu.tw#identifier', '預設密碼為身份證', 432),
(27, 27, 50, '元培醫事科技大學', 'ypu', '@mail.ypu.edu.tw', '1041408078@mail.ypu.edu.tw', 'https://mail.ypu.edu.tw/cgi-bin/owmmdir2/openwebmail.pl', '登入信箱帳號無需輸入後綴，預設密碼為身份證末8碼', 430),
(28, 28, 51, '醒吾科技大學', 'hwu', '@mail.hwu.edu.tw', '1031407046@mail.hwu.edu.tw', 'http://portal.hwu.edu.tw/Portal/login.htm', '請先登入學生入口網站，點選左上角Gmail登入', 492),
(29, 29, 52, '嘉南藥理大學', 'cnu', '@stmail.cnu.edu.tw', 'b0211042@stmail.cnu.edu.tw', 'http://mail.cnu.edu.tw/index_p.html', '信箱登入帳號無需加後綴，預設密碼身分證後四碼', 496),
(30, 30, 53, '文藻外語大學', 'wzu', '@student.wzu.edu.tw', '2104200018@student.wzu.edu.tw', 'http://student.wzu.edu.tw/cgi-bin/owmmdirwtuc/openwebmail.pl', '', 490),
(31, 31, 54, '明新科技大學', 'must', '@std.must.edu.tw', 'b04120062@std.must.edu.tw', 'http://std.must.edu.tw/', '預設登入密碼為身份證', 489),
(32, 32, 55, '崑山科技大學', 'ksu', '@g.ksu.edu.tw', 's103000328@g.ksu.edu.tw', 'https://accounts.google.com/ServiceLogin?hl=zh-TW&passive=true&continue=https://www.google.com.tw/%3Fgws_rd%3Dssl#identifier', '', 482),
(33, 33, 56, '長庚科技大學', 'cgust', '@mail.cgust.edu.tw', 'a011052@mail.cgust.edu.tw', 'http://gmail.cgust.edu.tw:81/', '', 483),
(34, 34, 57, '逢甲大學', 'fcu', '@mail.fcu.edu.tw', 'a0983896819@mail.fcu.edu.tw', 'http://www.oit.fcu.edu.tw/wSite/ct?xItem=35995&ctNode=11149&mp=271201&idPath=', '', 489),
(35, 35, 58, '世新大學', 'shu', '@mail.shu.edu.tw', 'a102210131@mail.shu.edu.tw', 'https://ap.shu.edu.tw/SSO/login.aspx?ReturnUrl=/SSO/Auth.aspx%3FCheckSessionID%3Desvzpgrkqglnyr3aytaq0qt3%26GetAuthUrl%3Dhttp://ap.shu.edu.tw/GoogleSrv/Login.aspx%26ReturnUrl%3D/GoogleSrv/SSO/Prompt2.', '', 479),
(36, 36, 59, '朝陽科技大學', 'cyut', '@gm.cyut.edu.tw', 's103350xx@gm.cyut.edu.tw', 'http://gmail.com', '帳號是s+學號@gm.cyut.edu.tw 預設密碼為身份證', 273),
(37, 37, 60, '華夏科技大學', 'hwh', '@go.hwh.edu.tw', '50404120@go.hwh.edu.tw', 'http://gmail.com', '', 496),
(38, 38, 61, '臺中科技大學', 'nutc', '@nutc.edu.tw', 's11011012@nutc.edu.tw', 'https://sso.nutc.edu.tw/ePortal/', '請登入eportal 裡面的WebMail收信', 489),
(39, 39, 62, '東華大學', 'ndhu', '@ems.ndhu.edu.tw', '4100010xx@ems.ndhu.edu.tw', 'https://ems.ndhu.edu.tw/', '', 479),
(40, 40, 63, '南華大學', 'nhu', '@nhu.edu.tw', '10210012@nhu.edu.tw', 'http://gmail.nhu.edu.tw', '預設密碼為身份證字號，第一個英文字母大寫', 479),
(41, 41, 64, '義守大學', 'isu', '@cloud.isu.edu.tw', 'isu10307010a@cloud.isu.edu.tw', 'https://adfs.isu.edu.tw/adfs/ls/?wa=wsignin1.0&wtrealm=urn:federation:MicrosoftOnline', '', 491),
(42, 42, 65, '南臺科技大學', 'stust', '@stust.edu.tw', '4a30h022@stust.edu.tw', 'http://gmail.stust.edu.tw', '', 488),
(43, 43, 68, '修平科技大學', 'hust', '@hust.edu.tw', 'bf103046@hust.edu.tw', 'https://login.microsoftonline.com/login.srf?wa=wsignin1.0&rpsnv=4&ct=1459751073&rver=6.7.6640.0&wp=MCMBI&wreply=https%3a%2f%2fportal.office.com%2flanding.aspx%3ftarget%3d%252fdefault.aspx&lc=1028&id=501392&msafed=0&client-request-id=8a7452d6-b1fe-4872-bfde-82df37291f04', '預設密碼為身份證首字大寫', 419),
(44, 44, 69, '耕莘健康管理專科學校', 'ctcn', '@sms.ctcn.edu.tw', 's+學號＠sms.ctcn.edu.tw', 'http://sms.ctcn.edu.tw', '預設密碼為身分證末四碼加生日', 472),
(45, 45, 70, '德明財經科技大學', 'takming', '@cc.takming.edu.tw', 'D101261xx@cc.takming.edu.tw', 'https://mail.cc.takming.edu.tw/owa/auth/logon.aspx?replaceCurrent=1&url=https%3a%2f%2fmail.cc.takming.edu.tw%2fowa%2f', '', 484),
(46, 46, 71, '崇仁醫護管理專科學校', 'cjc', '@cjc.edu.tw', 's10101285@cjc.edu.tw', 'https://accounts.google.com/ServiceLogin?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ltmpl=default&hd=cjc.edu.tw&service=mail&sacu=1&rip=1#identifier', '', 487),
(47, 47, 74, '僑光科技大學', 'ocu', '@ocu.edu.tw', 's+學號@ocu.edu.tw', 'https://webmail.ocu.edu.tw', '', 481),
(48, 48, 75, '亞東技術學院', 'oit', '@mail.oit.edu.tw', '學號@mail.oit.edu.tw', 'https://mail.oit.edu.tw/owa/auth/logon.aspx?replaceCurrent=1&url=https%3A%2F%2Fmail.oit.edu.tw%2Fowa%2F', '', 484),
(49, 49, 76, '育達科技大學', 'ydu', '@ydu.edu.tw', '學號@ydu.edu.tw', 'https://webmail.ydu.edu.tw/', '', 467),
(50, 50, 77, '中原大學', 'cycu', '@cycu.edu.tw', 's+學號@cycu.edu.tw', 'https://mail.cycu.edu.tw/indexi2.html', '', 462),
(51, 51, 78, '元智大學', 'yzu', '@mail.yzu.edu.tw', 's+學號@mail.yzu.edu.tw', 'https://webmail04.yzu.edu.tw/owa', '', 494),
(52, 52, 79, '交通大學', 'nctu', '@nctu.edu.tw', '自訂+@nctu.edu.tw', 'https://fwebmail.nctu.edu.tw/roundcube/', '請至 http://smtp.cc.nctu.edu.tw/~ccweb/apply.php 申請', 451);

-- --------------------------------------------------------

--
-- 資料表結構 `session`
--

CREATE TABLE `session` (
  `sId` int(11) NOT NULL,
  `rndcode` varchar(10) NOT NULL COMMENT '使用者隨機碼',
  `timestamp` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '時間戳 唯一編碼',
  `ip` varchar(16) NOT NULL,
  `user_agent` varchar(200) DEFAULT NULL COMMENT '登入的瀏覽器',
  `time` datetime NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1' COMMENT '是否有效 1有效登入 0登入已過期',
  `expire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `session`
--

INSERT INTO `session` (`sId`, `rndcode`, `timestamp`, `ip`, `user_agent`, `time`, `active`, `expire`) VALUES
(1, '56724138', '86y5sm9OowajrGPrwsQv9UsngElomMJpnTnKN4thBTIkfvmIHr7QrOcwqek57MHov34M19D6GE8GWFLpKMgzA5O2rbb9J9yKuBEc8CHjENrswe3sGwhEDJkVlvUAfTgv', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-16 23:24:29', 1, '2019-10-23 23:24:29');

-- --------------------------------------------------------

--
-- 資料表結構 `setting`
--

CREATE TABLE `setting` (
  `st_id` int(11) NOT NULL,
  `st_icon` varchar(100) NOT NULL,
  `st_content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

CREATE TABLE `shop` (
  `sh_id` int(1) NOT NULL COMMENT '編號',
  `sh_name` varchar(20) NOT NULL COMMENT '名稱',
  `sh_content` varchar(80) NOT NULL COMMENT '說明',
  `sh_price` int(3) NOT NULL COMMENT '價格',
  `sh_img` varchar(100) NOT NULL COMMENT '圖片',
  `sh_type` int(2) NOT NULL COMMENT '分類'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `siega`
--

CREATE TABLE `siega` (
  `sg_id` int(11) NOT NULL COMMENT '編號',
  `sg_attacker` int(2) NOT NULL COMMENT '攻擊學校',
  `sg_be_attacked` int(2) NOT NULL COMMENT '被攻擊學校',
  `sg_attacker_user` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '攻擊者',
  `sg_date` date NOT NULL COMMENT '攻擊日期',
  `sg_time` time NOT NULL COMMENT '攻擊時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL COMMENT '流水號',
  `sender` varchar(8) NOT NULL COMMENT '傳送者',
  `receiver` varchar(8) NOT NULL COMMENT '接收者',
  `content` text NOT NULL COMMENT '內容',
  `click` int(1) NOT NULL COMMENT '點擊',
  `isfriend` int(11) NOT NULL COMMENT '是否為好友',
  `time` date NOT NULL COMMENT '傳送時間',
  `his` time NOT NULL COMMENT '時分秒'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `sub_rndcode` varchar(10) NOT NULL COMMENT '訂閱人',
  `discuss_id` int(11) NOT NULL COMMENT '板塊編號',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `track`
--

CREATE TABLE `track` (
  `tr_id` int(11) NOT NULL COMMENT '編號',
  `tr_post` int(11) NOT NULL COMMENT '追蹤文章',
  `tr_who` varchar(10) NOT NULL COMMENT '誰追蹤',
  `tr_reply_co` int(11) NOT NULL COMMENT '我追蹤時有幾人回覆',
  `tr_time` datetime NOT NULL COMMENT '時間',
  `tr_check` int(1) NOT NULL COMMENT '是否看過 1 為看過'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `wrn`
--

CREATE TABLE `wrn` (
  `wrn_id` int(11) NOT NULL COMMENT '編號',
  `wrn_rndcode` varchar(15) NOT NULL COMMENT '警告者',
  `wrn_title` varchar(50) NOT NULL COMMENT '違規項目',
  `wrn_content` varchar(50) NOT NULL COMMENT '如何解除',
  `wrn_enc` varchar(50) NOT NULL COMMENT '遭遇',
  `wrn_read` int(11) NOT NULL COMMENT '警告已讀',
  `wrn_read_time` datetime NOT NULL COMMENT '已讀日期',
  `wrn_solve` int(11) NOT NULL COMMENT '是否解除',
  `wrn_manager` varchar(15) NOT NULL COMMENT '誰記的',
  `wrn_time` datetime NOT NULL COMMENT '警告時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`arc_id`),
  ADD KEY `arc_post` (`arc_post`),
  ADD KEY `arc_rndcode` (`arc_rndcode`);

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_rndcode` (`author_rndcode`),
  ADD KEY `top` (`top`),
  ADD KEY `type` (`type`);

--
-- 資料表索引 `badge`
--
ALTER TABLE `badge`
  ADD PRIMARY KEY (`bd_id`),
  ADD KEY `bd_have` (`bd_have`);

--
-- 資料表索引 `bug`
--
ALTER TABLE `bug`
  ADD PRIMARY KEY (`bg_id`),
  ADD KEY `bg_who` (`bg_who`);

--
-- 資料表索引 `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`de_id`),
  ADD KEY `de_code` (`de_code`),
  ADD KEY `de_code_2` (`de_code`);

--
-- 資料表索引 `discuss`
--
ALTER TABLE `discuss`
  ADD PRIMARY KEY (`di_id`),
  ADD KEY `di_numb` (`di_numb`);

--
-- 資料表索引 `discuss_href`
--
ALTER TABLE `discuss_href`
  ADD PRIMARY KEY (`dh_id`);

--
-- 資料表索引 `discuss_p`
--
ALTER TABLE `discuss_p`
  ADD PRIMARY KEY (`dp_id`);

--
-- 資料表索引 `forget_psw`
--
ALTER TABLE `forget_psw`
  ADD PRIMARY KEY (`fp_id`),
  ADD KEY `fp_rndcode` (`fp_rndcode`);

--
-- 資料表索引 `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invite` (`invite`),
  ADD KEY `invitee` (`invitee`);

--
-- 資料表索引 `god`
--
ALTER TABLE `god`
  ADD PRIMARY KEY (`g_id`);

--
-- 資料表索引 `god_join`
--
ALTER TABLE `god_join`
  ADD PRIMARY KEY (`gj_id`);

--
-- 資料表索引 `god_like`
--
ALTER TABLE `god_like`
  ADD PRIMARY KEY (`gl_id`);

--
-- 資料表索引 `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_rndcode` (`likes_rndcode`(191));

--
-- 資料表索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rndcode` (`rndcode`),
  ADD KEY `department` (`department`),
  ADD KEY `school` (`school`);

--
-- 資料表索引 `oth_sms`
--
ALTER TABLE `oth_sms`
  ADD PRIMARY KEY (`oth_id`);

--
-- 資料表索引 `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_rndcode` (`reply_rndcode`),
  ADD KEY `art_reply_type` (`art_reply_type`),
  ADD KEY `reply_post` (`reply_post`);

--
-- 資料表索引 `reply_likes`
--
ALTER TABLE `reply_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_likes_replyid` (`reply_likes_replyid`),
  ADD KEY `reply_likes_rndcode` (`reply_likes_rndcode`),
  ADD KEY `reply_likes_rndcode_2` (`reply_likes_rndcode`);

--
-- 資料表索引 `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `r_report_user` (`r_report_user`);

--
-- 資料表索引 `report_reply`
--
ALTER TABLE `report_reply`
  ADD PRIMARY KEY (`rp_id`),
  ADD KEY `rp_report_user` (`rp_report_user`);

--
-- 資料表索引 `report_rnd`
--
ALTER TABLE `report_rnd`
  ADD PRIMARY KEY (`rern_id`);

--
-- 資料表索引 `response_temp`
--
ALTER TABLE `response_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `response_rndcode` (`author_rndcode`),
  ADD KEY `response_article_id` (`articleId`);

--
-- 資料表索引 `rnd_friends`
--
ALTER TABLE `rnd_friends`
  ADD PRIMARY KEY (`rnd_id`),
  ADD KEY `rnd_add_user` (`rnd_add_user`(191)),
  ADD KEY `rnd_be_add_user` (`rnd_be_add_user`(191));

--
-- 資料表索引 `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`sc_id`),
  ADD KEY `sc_code` (`sc_code`);

--
-- 資料表索引 `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sId`),
  ADD KEY `rndcode` (`rndcode`),
  ADD KEY `timestamp` (`timestamp`);

--
-- 資料表索引 `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`st_id`);

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`sh_id`);

--
-- 資料表索引 `siega`
--
ALTER TABLE `siega`
  ADD PRIMARY KEY (`sg_id`);

--
-- 資料表索引 `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- 資料表索引 `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribe_user` (`sub_rndcode`),
  ADD KEY `subscribe_discuss_id` (`discuss_id`);

--
-- 資料表索引 `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `tr_who` (`tr_who`),
  ADD KEY `tr_post` (`tr_post`);

--
-- 資料表索引 `wrn`
--
ALTER TABLE `wrn`
  ADD PRIMARY KEY (`wrn_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `archive`
--
ALTER TABLE `archive`
  MODIFY `arc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `badge`
--
ALTER TABLE `badge`
  MODIFY `bd_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `bug`
--
ALTER TABLE `bug`
  MODIFY `bg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `dept`
--
ALTER TABLE `dept`
  MODIFY `de_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=614;

--
-- 使用資料表 AUTO_INCREMENT `discuss`
--
ALTER TABLE `discuss`
  MODIFY `di_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=89;

--
-- 使用資料表 AUTO_INCREMENT `discuss_href`
--
ALTER TABLE `discuss_href`
  MODIFY `dh_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=81;

--
-- 使用資料表 AUTO_INCREMENT `discuss_p`
--
ALTER TABLE `discuss_p`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=77;

--
-- 使用資料表 AUTO_INCREMENT `forget_psw`
--
ALTER TABLE `forget_psw`
  MODIFY `fp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號';

--
-- 使用資料表 AUTO_INCREMENT `god`
--
ALTER TABLE `god`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `god_join`
--
ALTER TABLE `god_join`
  MODIFY `gj_id` int(5) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `god_like`
--
ALTER TABLE `god_like`
  MODIFY `gl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=11;

--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `oth_sms`
--
ALTER TABLE `oth_sms`
  MODIFY `oth_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `reply_likes`
--
ALTER TABLE `reply_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `report`
--
ALTER TABLE `report`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `report_reply`
--
ALTER TABLE `report_reply`
  MODIFY `rp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `report_rnd`
--
ALTER TABLE `report_rnd`
  MODIFY `rern_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `response_temp`
--
ALTER TABLE `response_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `rnd_friends`
--
ALTER TABLE `rnd_friends`
  MODIFY `rnd_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `school`
--
ALTER TABLE `school`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=53;

--
-- 使用資料表 AUTO_INCREMENT `session`
--
ALTER TABLE `session`
  MODIFY `sId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `setting`
--
ALTER TABLE `setting`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `sh_id` int(1) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `siega`
--
ALTER TABLE `siega`
  MODIFY `sg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號';

--
-- 使用資料表 AUTO_INCREMENT `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `track`
--
ALTER TABLE `track`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表 AUTO_INCREMENT `wrn`
--
ALTER TABLE `wrn`
  MODIFY `wrn_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_author` FOREIGN KEY (`author_rndcode`) REFERENCES `member` (`rndcode`),
  ADD CONSTRAINT `article_discuss_id` FOREIGN KEY (`type`) REFERENCES `discuss` (`di_numb`);

--
-- 資料表的 Constraints `response_temp`
--
ALTER TABLE `response_temp`
  ADD CONSTRAINT `response_article_id` FOREIGN KEY (`articleId`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `response_rndcode` FOREIGN KEY (`author_rndcode`) REFERENCES `member` (`rndcode`);

--
-- 資料表的 Constraints `subscribe`
--
ALTER TABLE `subscribe`
  ADD CONSTRAINT `subscribe_discuss_id` FOREIGN KEY (`discuss_id`) REFERENCES `discuss` (`di_id`),
  ADD CONSTRAINT `subscribe_user` FOREIGN KEY (`sub_rndcode`) REFERENCES `member` (`rndcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
