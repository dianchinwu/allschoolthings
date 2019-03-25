-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:3306
-- 產生時間： 2019 年 03 月 25 日 01:09
-- 伺服器版本： 10.3.13-MariaDB
-- PHP 版本： 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `id7773224_allschoolthings`
--
CREATE DATABASE IF NOT EXISTS `id7773224_allschoolthings` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id7773224_allschoolthings`;

-- --------------------------------------------------------

--
-- 資料表結構 `absent`
--

CREATE TABLE `absent` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `record` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `leave_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `absent`
--

INSERT INTO `absent` (`id`, `date`, `record`, `student_id`, `teacher_id`, `leave_id`) VALUES
(1, '0000-00-00', '準時', 0, 0, 0),
(2, '0000-00-01', '遲到', 1, 1, 1),
(3, '0000-00-01', '遲到', 1, 1, 1),
(4, '0000-00-01', '遲到', 2, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `identity_id` int(10) NOT NULL DEFAULT 4,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`name`, `password`, `identity_id`, `email`, `create_time`) VALUES
('acc1', '123456', 4, 'a@test.com', '0000-00-00 00:00:00'),
('acc2', '123456', 4, 'b@test.com', '0000-00-00 00:00:00'),
('acc3', '123456', 4, 'c@test.com', '0000-00-00 00:00:00'),
('acc4', '123456', 4, 'd@test.com', '0000-00-00 00:00:00'),
('acc5', '123456', 4, 'e@test.com', '0000-00-00 00:00:00'),
('acc6', '123456', 4, 'f@test.com', '0000-00-00 00:00:00'),
('acc7', '123456', 4, 'g@test.com', '0000-00-00 00:00:00'),
('acc8', '123456', 4, 'h@test.com', '0000-00-00 00:00:00'),
('0987654321', '123456', 4, 'test@gmail.com', '2019-03-08 13:47:07'),
('0987654333', '123456', 4, '', '2019-03-11 07:50:30'),
('0988123456', '123456', 4, '', '2019-03-11 07:51:09'),
('0911111111', '123456', 4, 'abe@abc.com', '2019-03-18 05:44:54'),
('0912345678', '123456', 4, 'rgb@rgb.com', '2019-03-18 08:37:10'),
('0933333333', '123456', 4, 'aaa@aaa.com', '2019-03-18 08:42:48'),
('0987654000', '123456', 4, 'a@test.com', '2019-03-18 12:43:07'),
('0987654111', '123456', 4, 'b@test.com', '2019-03-18 12:44:11'),
('0911111222', '123456', 4, 'test.@test.com', '2019-03-20 20:23:45'),
('0911111333', '123456', 4, 'test.@test.com', '2019-03-20 20:24:22'),
('0911111444', '123456', 4, 'test@test.com', '2019-03-20 20:25:00'),
('0911111555', '123456', 4, 'test@test.com', '2019-03-20 20:25:30'),
('0911111666', '123456', 4, 'fire@fire.com', '2019-03-20 20:56:16'),
('0911111777', '123456', 4, 'seafood@test.com', '2019-03-20 21:18:36'),
('0911111888', '123456', 4, '888@test.com', '2019-03-20 21:20:21'),
('0922222111', '12345678', 3, 'zihen@test.com', '2019-03-20 21:26:49'),
('0922222555', '123456', 3, 'test@test.com', '2019-03-23 13:36:34');

-- --------------------------------------------------------

--
-- 資料表結構 `bulletin`
--

CREATE TABLE `bulletin` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `identity_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `photo` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `bulletin`
--

INSERT INTO `bulletin` (`id`, `account_name`, `identity_id`, `class_id`, `date`, `photo`, `title`, `detail`) VALUES
(1, '0', NULL, NULL, '0000-00-00 00:00:00', NULL, '', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `class`
--

CREATE TABLE `class` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `grade` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `year` int(10) UNSIGNED DEFAULT NULL,
  `index` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `class`
--

INSERT INTO `class` (`id`, `name`, `grade`, `year`, `index`) VALUES
(1, '一班', '', 1, NULL),
(2, '二班', '', 1, NULL),
(3, '三班', '', 1, NULL),
(4, '一班', '', 2, NULL),
(5, '二班', '', 2, NULL),
(6, '三班', '', 2, NULL),
(7, '一班', '', 3, NULL),
(8, '二班', '', 3, NULL),
(9, '三班', '', 3, NULL),
(16, '三班', '', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `health`
--

CREATE TABLE `health` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester` varchar(10) NOT NULL,
  `height` float UNSIGNED NOT NULL,
  `weight` float UNSIGNED NOT NULL,
  `bmi` float UNSIGNED NOT NULL,
  `eye_l` float UNSIGNED DEFAULT NULL,
  `eye_r` float UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `remark` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `health`
--

INSERT INTO `health` (`id`, `semester`, `height`, `weight`, `bmi`, `eye_l`, `eye_r`, `student_id`, `remark`) VALUES
(1, '105-1', 100, 14, 14, 1, 1, 1, ''),
(2, '105-2', 100, 16, 16, 1, 1, 1, ''),
(3, '106-1', 110, 25, 20.6616, 1, 1, 1, ''),
(4, '106-2', 110, 26, 21.4876, 1, 1, 1, ''),
(5, '107-1', 120, 30, 20.8333, 1, 1, 1, ''),
(6, '107-2', 120, 31, 21.5278, 0.8, 0.8, 1, ''),
(7, '105-1', 100, 22, 22, 0.8, 0.8, 2, ''),
(8, '105-2', 130, 35, 20.7101, 0.8, 1, 2, ''),
(9, '106-1', 130, 30, 17.7515, 1.2, 1.2, 2, ''),
(10, '105-1', 100, 21, 21, 0.8, 0.8, 3, ''),
(11, '107-2', 120, 25, 17.3611, 1, 0.8, 4, ''),
(12, '107-2', 120, 22, 15.2778, 1, 1.2, 5, ''),
(14, '107-2', 145, 40, 19.025, 1, 1.2, 2, ''),
(15, '107-2', 120, 20, 13.8889, 0.8, 0.8, 3, ''),
(16, '105-1', 150, 50, 22.2222, 0.8, 0.8, 6, '');

-- --------------------------------------------------------

--
-- 資料表結構 `homework`
--

CREATE TABLE `homework` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `item` text COLLATE utf8_unicode_ci NOT NULL,
  `hw_check` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 資料表結構 `identity`
--

CREATE TABLE `identity` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `identity`
--

INSERT INTO `identity` (`id`, `name`, `value`) VALUES
(1, 'admin', 100),
(2, 'director', 60),
(3, 'teacher', 40),
(4, 'parent', 10);

-- --------------------------------------------------------

--
-- 資料表結構 `leave_record`
--

CREATE TABLE `leave_record` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `time_start` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_end` date NOT NULL,
  `time_end` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reason` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `absent_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `leave_record`
--

INSERT INTO `leave_record` (`id`, `date_start`, `time_start`, `date_end`, `time_end`, `category`, `reason`, `student_id`, `parent_id`, `teacher_id`, `absent_id`) VALUES
(6, '2019-03-10', '第1節', '2019-03-10', '第7節', '病假', '感冒看醫生', 1, 1, 1, 1),
(2, '2019-03-12', '第1節', '2019-03-12', '第4節', '病假', '發燒看醫生', 1, 1, 1, 1),
(3, '2019-03-13', '第1節', '2019-03-13', '第7節', '公假', '參加演講比賽', 1, 1, 1, 1),
(4, '2019-03-14', '第1節', '2019-03-14', '第7節', '事假', '家人出遊', 1, 1, 1, 1),
(5, '2019-03-10', '第1節', '2019-03-10', '第7節', '病假', '感冒看醫生', 1, 1, 1, 1),
(10, '2019-03-15', '第1節', '2019-03-15', '第7節', '事假', '有事代辦', 2, 2, 1, 1),
(9, '2019-03-14', '第1節', '2019-03-14', '第7節', '事假', '有事代辦', 2, 2, 1, 1),
(7, '2019-03-14', '第1節', '2019-03-14', '第7節', '事假', '有事代辦', 2, 2, 1, 1),
(11, '2019-03-14', '第一節', '2019-03-14', '第七節', '病假', '感冒看醫生', 1, 1, 1, 1),
(12, '2019-03-21', '第4節', '2019-03-21', '第7節', '事假', '有事', 1, 1, 1, 1),
(13, '2019-03-12', '第3節', '2019-03-06', '第1節', '病假', '在此次', 1, 1, 1, 1),
(14, '2019-03-12', '第3節', '2019-03-06', '第1節', '病假', '在此次', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `parent`
--

CREATE TABLE `parent` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `parent`
--

INSERT INTO `parent` (`id`, `name`, `gender`, `avatar`, `student_id`, `account_name`) VALUES
(1, '美爸', 'm', NULL, 3, '3'),
(2, '芸爸', 'm', NULL, 4, '4'),
(3, '芹媽', 'f', NULL, 5, '5'),
(4, '芹爸', 'm', NULL, 6, '6'),
(5, '璉爸', 'm', NULL, 7, '7'),
(6, '芃爸', 'm', NULL, 8, '8'),
(7, '恩爸', 'm', NULL, 9, '0911222777'),
(8, '恩媽', 'f', NULL, 66, '0922222111'),
(9, '芃媽', 'f', NULL, 66, '0922222555');

-- --------------------------------------------------------

--
-- 資料表結構 `parent_student`
--

CREATE TABLE `parent_student` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `score`
--

CREATE TABLE `score` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `chapter` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `score` int(10) UNSIGNED DEFAULT NULL,
  `remark` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `score`
--

INSERT INTO `score` (`id`, `student_id`, `subject_id`, `date`, `chapter`, `score`, `remark`) VALUES
(1, 1, 1, '2019-03-11', '第十章', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `student`
--

INSERT INTO `student` (`id`, `name`, `gender`, `avatar`) VALUES
(1, '小美', 'f', NULL),
(2, '小芸', 'f', NULL),
(3, '小芹', 'f', NULL),
(4, '小璉', 'f', NULL),
(5, '小芃', 'm', NULL),
(6, '小恩', 'm', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `student_class`
--

CREATE TABLE `student_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `number` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `subject`
--

CREATE TABLE `subject` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `account_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `gender`, `avatar`, `class_id`, `account_name`) VALUES
(16, '孔鏘', 'm', NULL, 1, '0987654000'),
(4, '孟子', 'm', NULL, 1, '0987654323'),
(5, '花子', 'm', NULL, 2, '0987654323'),
(6, '夢子', 'm', NULL, 2, '0987654324'),
(14, '豐田秀吉', 'f', NULL, 1, '0912222222'),
(15, '石田三成', 'm', NULL, 1, '0933333333'),
(17, '墨子', 'f', NULL, 1, '0987654110'),
(18, '廉頗', 'm', NULL, 1, '0911111222'),
(19, '樂毅', 'm', NULL, 1, '0911111333'),
(20, '田單', 'm', NULL, 1, '0911111444'),
(21, '王翦', 'm', NULL, 1, '0911111555'),
(22, '林美江', 'f', NULL, 1, '0911111666'),
(23, '妙禪', 'm', NULL, 1, '0911111777'),
(24, '證嚴', 'f', NULL, 88, '0911111888');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `absent`
--
ALTER TABLE `absent`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`name`);

--
-- 資料表索引 `bulletin`
--
ALTER TABLE `bulletin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `identity`
--
ALTER TABLE `identity`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `leave_record`
--
ALTER TABLE `leave_record`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `account_id` (`account_name`);

--
-- 資料表索引 `parent_student`
--
ALTER TABLE `parent_student`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `account_id` (`account_name`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `absent`
--
ALTER TABLE `absent`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `bulletin`
--
ALTER TABLE `bulletin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `health`
--
ALTER TABLE `health`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `identity`
--
ALTER TABLE `identity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `leave_record`
--
ALTER TABLE `leave_record`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `parent_student`
--
ALTER TABLE `parent_student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `score`
--
ALTER TABLE `score`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `student_class`
--
ALTER TABLE `student_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
