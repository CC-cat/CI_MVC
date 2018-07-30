-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2018-07-30 09:15:24
-- 服务器版本： 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
(132, '依依', '12', 'male', '[\"1\"]'),
(133, '依依', '14', 'female', '[\"1\",\"2\"]'),
(135, '依依1', '15', 'male', '[\"1\",\"2\",\"3\"]'),
(136, '辰辰', '12', 'female', '[\"3\"]'),
(137, '辰辰欢欢', '12', 'male', '[\"2\"]'),
(139, '依2依', '13', 'female', '[\"1\",\"3\"]'),
(140, '学生', '12', 'male', '[\"1\",\"2\"]'),
(141, '学生3', '12', 'female', '[\"2\",\"3\"]'),
(142, '德尔', '', 'female', '[\"1\",\"2\"]'),
(143, '德尔', '', 'male', '[\"2\",\"3\"]'),
(144, '恩恩', '16', 'male', '[\"1\",\"2\",\"3\"]');

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
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT COMMENT '学生唯一标识(学号)', AUTO_INCREMENT=145;

--
-- 使用表AUTO_INCREMENT `mySubject`
--
ALTER TABLE `mySubject`
  MODIFY `subjectId` int(11) NOT NULL AUTO_INCREMENT COMMENT '科目唯一标识', AUTO_INCREMENT=4;
