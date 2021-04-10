SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `tempdata` (
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `doctors`
--
INSERT INTO `tempdata` (`temp`) VALUES
(12),
(45),
(15),
(100),
(5);