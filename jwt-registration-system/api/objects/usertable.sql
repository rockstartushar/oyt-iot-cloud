CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(256) default NULL,
   `lastname` varchar(256) default NULL,
    `email` varchar(256) default NULL,
  `password` varchar(2048) default NULL,
   `created` datetime default NULL,
   `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
);
