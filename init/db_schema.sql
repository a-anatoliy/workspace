-- main table ----------------------------------------------------------
-- pj_main -------------------------------------------------------------
USE `luckyDress_db`;

DROP TABLE IF EXISTS `pj_main`;
CREATE TABLE `pj_main` (
  `id`        tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `email`     varchar(255) NOT NULL,
  `contentID` int(5) DEFAULT NULL,
  `date`      timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE INDEX idx_email ON pj_main (email);
