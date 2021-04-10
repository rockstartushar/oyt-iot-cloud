-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2009 at 08:01 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

--
-- Database: `reverse_ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `score2` (
  `playerid` int(11) NOT NULL auto_increment,
  `score` int(11) default NULL,
  `created_at` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `created_at` (`created_at`)
);