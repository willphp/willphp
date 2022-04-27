    CREATE TABLE `wp_blog` (
      `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
      `title` varchar(100) NOT NULL DEFAULT ' ',
      `cid` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
      `content` text NOT NULL,
      `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
      `hits` int(10) UNSIGNED NOT NULL DEFAULT '0',
      `pwd` varchar(32) NOT NULL DEFAULT '',
      `uptime` int(10) UNSIGNED NOT NULL DEFAULT '0',
      `ctime` int(10) UNSIGNED NOT NULL DEFAULT '0',
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=0;