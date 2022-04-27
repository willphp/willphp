DROP TABLE IF EXISTS `wp_blog`;
CREATE TABLE IF NOT EXISTS `wp_blog` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `cid` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `hits` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `pwd` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `uptime` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ctime` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='文章表';

--
-- 转存表中的数据 `wp_blog`
--

INSERT INTO `wp_blog` (`id`, `title`, `cid`, `content`, `status`, `hits`, `pwd`, `uptime`, `ctime`) VALUES
(43, '测试一下', 1, 'test', 1, 1, '', 0, 1651069526);

-- --------------------------------------------------------

--
-- 表的结构 `wp_cate`
--

DROP TABLE IF EXISTS `wp_cate`;
CREATE TABLE IF NOT EXISTS `wp_cate` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `total` int(11) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='分类表';

--
-- 转存表中的数据 `wp_cate`
--

INSERT INTO `wp_cate` (`id`, `cname`, `total`) VALUES
(1, ' 分类1', 0),
(2, ' 分类2', 0);
