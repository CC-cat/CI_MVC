-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2018-07-27 08:52:59
-- 服务器版本： 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myform`
--

-- --------------------------------------------------------

--
-- 表的结构 `content`
--

CREATE TABLE `content` (
  `userId` int(11) NOT NULL COMMENT '学生唯一标识(学号)',
  `userName` varchar(30) NOT NULL COMMENT '学生姓名',
  `age` varchar(200) DEFAULT NULL COMMENT '年龄',
  `sex` varchar(30) DEFAULT NULL COMMENT '学生性别',
  `subjectId` varchar(30) NOT NULL COMMENT '学生选择的科目id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `content`
--

INSERT INTO `content` (`userId`, `userName`, `age`, `sex`, `subjectId`) VALUES
(1, '张三', '12', 'male', '0,1'),
(2, '王五', '16', 'male', '1,2'),
(3, '李四', '14', 'female', '0,1,2'),
(4, '凉凉2', '12', 'female', '0,1'),
(5, '凉凉2', '12', 'female', '0,1'),
(6, '凉凉2', '12', 'female', '0,1'),
(7, '凉凉2', '12', 'female', '0,1'),
(8, '凉凉2', '12', 'female', '0,1'),
(9, '凉凉2', '12', 'female', '0,1'),
(10, '凉凉2', '12', 'female', '0,1'),
(11, '凉凉2', '12', 'female', '0,1'),
(12, '凉凉2', '12', 'female', '0,1'),
(13, '凉凉2', '12', 'female', '0,1'),
(14, '凉凉', '12', 'female', '1'),
(15, '凉凉', '12', 'female', '1'),
(16, '凉凉', '12', 'female', '1'),
(17, '凉凉', '12', 'female', '1'),
(18, '凉凉', '12', 'female', '1'),
(19, '凉凉', '12', 'female', '1'),
(20, '凉凉', '12', 'female', '1'),
(21, '凉凉', '12', 'female', '1'),
(22, '凉凉', '12', 'female', '1'),
(23, '凉凉', '12', 'female', '1'),
(24, '凉凉', '12', 'female', '1'),
(25, '凉凉', '12', 'female', '1'),
(26, '凉凉', '12', 'female', '1'),
(27, '凉凉', '12', 'female', '1'),
(28, '凉凉', '12', 'female', '1'),
(29, '凉凉', '12', 'female', '1'),
(30, '凉凉', '12', 'female', '1'),
(31, '凉凉', '12', 'female', '1'),
(32, '凉凉', '12', 'male', '0'),
(33, '凉凉', '12', 'male', '0'),
(34, '凉凉', '12', 'male', '0'),
(35, '凉凉', '12', 'male', '0'),
(36, '凉凉3', '12', 'male', '0'),
(37, '凉凉3', '12', 'male', '0'),
(38, '凉凉', '124', 'male', '0'),
(39, '凉凉', '124', 'male', '0'),
(40, '凉凉1', '14', 'female', '1,2'),
(41, '凉凉1', '14', 'female', '1,2'),
(42, '凉凉1', '14', 'female', '1,2'),
(43, '凉凉1', '14', 'female', '1,2'),
(44, '凉凉5', '125', 'male', '0,1'),
(45, '凉凉5', '125', 'male', '0,1'),
(46, '梁晨', '25', 'male', '0,1,2'),
(47, '梁晨', '25', 'male', '0,1,2'),
(48, '凉凉', '12', 'male', '0'),
(49, '凉凉', '12', 'male', '0'),
(50, '凉凉', '12', 'male', '0'),
(51, '凉凉', '12', 'male', '0'),
(52, '凉凉', '12', 'female', '0,1'),
(53, '凉凉', '12', 'female', '0,1'),
(54, '梁晨', '25', 'male', '0,1,2'),
(55, '梁晨', '25', 'male', '0,1,2'),
(56, '梁晨', '25', 'male', '0,1,2'),
(57, '梁晨', '25', 'male', '0,1,2'),
(58, '梁晨', '25', 'male', '0,1,2'),
(59, '梁晨', '25', 'male', '0,1,2'),
(60, '梁晨', '25', 'male', '0,1,2'),
(61, '梁晨', '25', 'male', '0,1,2'),
(62, '梁晨', '25', 'male', '0,1,2'),
(63, '梁晨', '25', 'male', '0,1,2'),
(64, '凉凉', '12', 'male', '0,1'),
(65, '凉凉', '12', 'male', '0'),
(66, '凉凉', '12', 'male', '0'),
(67, '凉凉', '12', 'male', '0'),
(68, '凉凉', '12', 'male', '0,2'),
(69, '凉凉', '12', 'male', '0,2'),
(70, '凉凉', '12', 'female', '0,1,2'),
(71, '凉凉', '12', 'female', '0,1,2'),
(72, '凉凉', '12', 'male', '1,2'),
(73, '凉凉', '12', 'female', '0'),
(74, '凉凉', '12', 'female', '0'),
(75, '凉凉', '12', 'female', '0'),
(76, '凉凉', '12', 'male', '1,2'),
(77, '凉凉', '12', 'male', '1,2'),
(78, '凉凉', '12', 'male', '0'),
(79, '凉凉', '12', 'male', '0'),
(80, '凉凉', '12', 'male', '0'),
(81, '凉凉', '12', 'male', '0'),
(82, '凉凉', '12', 'male', '0,1'),
(83, '凉凉', '12', 'male', '0,1'),
(84, '凉凉', '12', 'male', '0,1'),
(85, '凉凉', '12', 'male', '0,1'),
(86, '凉凉', '12', NULL, '0'),
(87, '凉凉', '12', NULL, '0'),
(88, '凉凉', '12', 'male', '1,2'),
(89, '凉凉', '12', 'male', '1,2'),
(90, '凉凉', '12', 'male', '1,2'),
(91, '凉凉', '12', 'male', '1,2'),
(92, '凉凉', '12', 'male', '1,2'),
(93, '凉凉', '12', 'male', '1,2'),
(94, '凉凉', '12', 'male', '0'),
(95, '凉凉', '12', 'male', '0'),
(96, '凉凉', '12', 'male', '0'),
(97, '凉凉', '12', 'male', '0'),
(98, '凉凉', '12', 'male', '0'),
(99, '凉凉', '12', 'male', '0'),
(100, '凉凉', '12', 'male', '0'),
(101, '凉凉', '12', 'male', '0'),
(102, '凉凉', '12', 'male', '0'),
(103, '凉凉', '12', 'male', '0'),
(104, '凉凉', '12', 'male', '0'),
(105, '凉凉', '12', 'male', '0'),
(106, '123', '12', 'male', '0,1'),
(107, '123', '12', 'male', '0,1'),
(108, '凉凉', '12', NULL, '0'),
(109, '凉凉发热', '12', NULL, '0,1,2'),
(110, '凉凉发热', '12', NULL, '0,1,2'),
(111, '凉凉发热', '12', NULL, '0,1,2'),
(112, '凉凉发热', '12', NULL, '0,1,2'),
(113, '凉凉发热', '12', NULL, '0,1,2'),
(114, '凉凉发热', '12', NULL, '0,1,2'),
(115, '凉凉', '12', 'male', '0'),
(116, '凉凉', '12', 'female', '1'),
(117, '凉凉', '12', 'female', '0,1,2'),
(118, '凉凉', '12', 'female', '0,1,2'),
(119, '凉凉', '12', 'female', '0,1,2'),
(120, '凉凉', '12', 'female', '0,1,2'),
(121, '凉凉', '12', 'female', '0,1,2'),
(122, '凉凉', '12', 'female', '0,1,2'),
(123, '凉凉', '12', 'female', '0,1,2'),
(124, '凉凉', '12', 'female', '0,1,2'),
(125, '凉凉', '12', 'female', '0,1,2'),
(126, '凉凉', '12', 'male', '0'),
(127, '凉凉', '12', 'male', '0'),
(128, '凉凉', '12', 'male', '0'),
(129, '凉凉', '12', 'male', '0');

-- --------------------------------------------------------

--
-- 表的结构 `mySubject`
--

CREATE TABLE `mySubject` (
  `subjectId` int(11) NOT NULL COMMENT '科目唯一标识',
  `subject` varchar(30) NOT NULL COMMENT '科目'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mySubject`
--

INSERT INTO `mySubject` (`subjectId`, `subject`) VALUES
(1, '语文'),
(2, '数学'),
(3, '英语');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userId_2` (`userId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `userId_3` (`userId`);

--
-- Indexes for table `mySubject`
--
ALTER TABLE `mySubject`
  ADD PRIMARY KEY (`subjectId`),
  ADD UNIQUE KEY `subjectId` (`subjectId`),
  ADD KEY `subjectId_2` (`subjectId`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `content`
--
ALTER TABLE `content`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT COMMENT '学生唯一标识(学号)', AUTO_INCREMENT=130;

--
-- 使用表AUTO_INCREMENT `mySubject`
--
ALTER TABLE `mySubject`
  MODIFY `subjectId` int(11) NOT NULL AUTO_INCREMENT COMMENT '科目唯一标识', AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
