<?php

$installer=$this;

$installer->startSetup();

$installer->run("
	CREATE TABLE IF NOT EXISTS `{$installer->getTable('banners/manage')}`
	(
		`banner_id` int(100) NOT NULL AUTO_INCREMENT,
  		`name` varchar(50) NOT NULL,
  		`path` varchar(100) NOT NULL,
  		`status` int(1) NOT NULL,
  		PRIMARY KEY (`banner_id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25;
");

$installer->endSetup();