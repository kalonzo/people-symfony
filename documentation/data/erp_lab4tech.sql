-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2018 at 07:23 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9


-- --------------------------------------------------------


--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id_country` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_country`)
  )ENGINE=INNODB;
  
--
-- Table structure for table `departments` (canton / département / états)
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id_department` int(11) NOT NULL AUTO_INCREMENT,
  `id_country`int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_department`),
    FOREIGN KEY (id_country)
        REFERENCES countries(id_country)
  )ENGINE=INNODB;
  


--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
CREATE TABLE IF NOT EXISTS `candidates` (
  `id_candidat` int(11) NOT NULL AUTO_INCREMENT,
  `id_department`int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `street` varchar(45) NOT NULL,
  `postal_code` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `birthday` datetime NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `civil_status` int(11) NOT NULL,
  `orp_registration_date` varchar(45) NOT NULL,
  `do_bilan` int(11) NOT NULL,
  PRIMARY KEY (`id_candidat`),
  FOREIGN KEY (id_department)
        REFERENCES departments(id_department)
  )ENGINE=INNODB;
  
  
--
-- Table structure for table `orps`
--

DROP TABLE IF EXISTS `orps`;
CREATE TABLE IF NOT EXISTS `orps` (
  `id_orp` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `street` varchar(45) NOT NULL,
  `postal_code` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `birthday` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_orp`)
) ENGINE=INNODB;

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `candidates_orps`
--

DROP TABLE IF EXISTS `candidates_orps`;
CREATE TABLE IF NOT EXISTS `candidates_orps` (
  `id_orp` int(11) NOT NULL,
  `id_candidat` int(11) NOT NULL,
  `registration_date` datetime DEFAULT NULL,
  PRIMARY KEY (id_orp , id_candidat),
  FOREIGN KEY (id_orp)
        REFERENCES orps(id_orp)
        ON DELETE CASCADE,
   FOREIGN KEY (id_candidat)
        REFERENCES candidates(id_candidat)
        ON DELETE CASCADE
  )ENGINE=INNODB;

-- --------------------------------------------------------


--
-- Table structure for table `unemployment_funds`
--

DROP TABLE IF EXISTS `unemployment_funds`;
CREATE TABLE IF NOT EXISTS `unemployment_funds` (
  `id_unemployment_fund` int(11) NOT NULL AUTO_INCREMENT,
  `id_department`int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `street` varchar(45) DEFAULT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
   PRIMARY KEY (`id_unemployment_fund`),
    FOREIGN KEY (id_department)
        REFERENCES departments(id_department)
) ENGINE=INNODB;


--
-- Table structure for table `unemployment_funds_candidates`
--

DROP TABLE IF EXISTS `unemployment_funds_candidates`;
CREATE TABLE IF NOT EXISTS `unemployment_funds_candidates` (
  `id_candidat` int(11) NOT NULL,
  `id_unemployment_fund` int(11) NOT NULL,
  PRIMARY KEY (id_candidat , id_unemployment_fund ),
  FOREIGN KEY (id_unemployment_fund)
        REFERENCES unemployment_funds(id_unemployment_fund)
        ON DELETE CASCADE,
   FOREIGN KEY (id_candidat)
        REFERENCES candidates(id_candidat)
        ON DELETE CASCADE
) ENGINE=INNODB ;

COMMIT;

-- --------------------------------------------------------