DROP TABLE IF EXISTS `#__juridico`;

CREATE TABLE `#__juridico` (
  `id` int(11) NOT NULL auto_increment,
  `greeting` varchar(25) NOT NULL,
  `catid` int(11) NOT NULL DEFAULT '0',
  `params` TEXT NOT NULL DEFAULT '',
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__juridico` (`greeting`) VALUES
	('Hello World!'),
	('Good bye World!');