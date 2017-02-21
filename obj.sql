
CREATE TABLE IF NOT EXISTS `obj_user`(
`user_id` tinyint(6) not null AUTO_INCREMENT PRIMARY KEY,
`user_name` VARCHAR(32) NOT NULL  default '' COMMENT '用户名',
`user_pwd` CHAR(32) NOT NULL DEFAULT '' COMMENT '用户密码',
`login_time` INT(11) NOT NULL DEFAULT '0' COMMENT '登陆时间',
`create_time` INT(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
`update_time` INT(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
`login_ip` VARCHAR(30) NOT NULL DEFAULT '' COMMENT '登陆ip'
)ENGINE = MyISAM DEFAULT CHARSET = 'utf8';

CREATE TABLE IF NOT EXISTS `obj_menu`(
`menu_id` int(11) not null AUTO_INCREMENT PRIMARY KEY,
`parent_id` tinyint(6) not null default '0',
`name` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '菜单名',
`createtime` int(11) not null default '0' COMMENT '创建时间',
`updatetime` int(11) not null default '0' COMMENT '修改时间',
`m` varchar(10) not null default '' COMMENT '模型',
`c` varchar(10) not null default '' COMMENT '控制器',
`f` varchar(10) not null default '' COMMENT '方法',
`type` tinyint(2) not null default '1' COMMENT '1为前台 2为后台',
`listorder` tinyint(2) not null default '50' COMMENT '排序',
`status` tinyint(2) not null default '1' COMMENT '状态',
`data` VARCHAR(100) not null default '' COMMENT '描述',
 KEY `parent_id`(`parent_id`),
 KEY `listorder`(`listorder`),
 KEY `module`(`m`,`c`,`f`)
)ENGINE = MyISAM DEFAULT CHARSET = 'utf8';

CREATE TABLE IF NOT EXISTS `obj_new`(
`new_id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT '文章id',
`catid` smallint(5) unsigned not null default '0' COMMENT '菜单id',
`new_name` VARCHAR(100) not null default '' COMMENT '文章名称',
`small_name` varchar(80) not null default '' COMMENT '文章短标题',
`title_font_color` varchar(30) not null default '' COMMENT '标题颜色',
`thumb` varchar(100) not null default '' COMMENT '缩略图',
`keywords` char(40) not null default '' COMMENT '关键字',
`description` varchar(250) not null default '' COMMENT '描述',
`createtime` int(11) unsigned not null default '0' COMMENT '创建时间',
`updatetime` int(11) unsigned not null default '0' COMMENT '修改时间',
`listorder` int(10) unsigned not null default '50' COMMENT '排序',
`status` tinyint(1) unsigned not null default '1' COMMENT '状态',
`copyfrom` varchar(250) default NULL COMMENT '来源',
`username` char(20) NOT NULL,
  KEY `status` (`status`,`listorder`,`new_id`),
  KEY `listorder` (`catid`,`status`,`listorder`,`new_id`),
  KEY `catid` (`catid`,`status`,`new_id`)
)ENGINE = MyISAM DEFAULT CHARSET ='utf8';

CREATE TABLE IF NOT EXISTS `obj_new_content`(
`content_id` int(11) unsigned AUTO_INCREMENT PRIMARY KEY COMMENT '',
`new_id` int(11) unsigned not null default '0' COMMENT '文章id',
)ENGINE = MyISAM DEFAULT CHARSET = 'utf8';


