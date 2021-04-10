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
-- Table structure for table ``
--

CREATE TABLE IF NOT EXISTS `data_table` (
  `id` int(11) NOT NULL auto_increment,
  `datavalue` int(11) default NULL,
  `at` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `at` (`at`)
);