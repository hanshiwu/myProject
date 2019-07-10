/*
Navicat MySQL Data Transfer

Source Server         : hdm334229330_db
Source Server Version : 50173
Source Host           : hdm334229330.my3w.com:3306
Source Database       : hdm334229330_db

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2018-01-29 15:56:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `blog_admin`
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL COMMENT '用户名',
  `pwd` varchar(45) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('1', 'admin888', 'C78k+lLOnLvbI7lg6Og+Yw==');
INSERT INTO `blog_admin` VALUES ('6', 'test', 'S4cj77RLvgCEeGK2WujphQ==');

-- ----------------------------
-- Table structure for `blog_arc_tag`
-- ----------------------------
DROP TABLE IF EXISTS `blog_arc_tag`;
CREATE TABLE `blog_arc_tag` (
  `arc_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章标签中间表';

-- ----------------------------
-- Records of blog_arc_tag
-- ----------------------------
INSERT INTO `blog_arc_tag` VALUES ('3', '1');
INSERT INTO `blog_arc_tag` VALUES ('4', '1');
INSERT INTO `blog_arc_tag` VALUES ('4', '2');

-- ----------------------------
-- Table structure for `blog_article`
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `arc_id` int(11) NOT NULL AUTO_INCREMENT,
  `arc_title` varchar(45) NOT NULL,
  `arc_author` varchar(30) NOT NULL,
  `arc_digest` varchar(200) NOT NULL,
  `arc_content` text NOT NULL,
  `sendtime` int(11) NOT NULL DEFAULT '0',
  `updatetime` int(11) NOT NULL DEFAULT '0',
  `arc_click` int(11) NOT NULL DEFAULT '0',
  `is_recycle` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1代表在回收站2代表不在',
  `arc_thumb` varchar(100) NOT NULL DEFAULT '''''',
  `cate_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `arc_sort` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`arc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('1', '8', '8', '8', '<p>8<br/></p>', '1514257355', '1514363101', '0', '1', 'http://tp5_blog.com/uploads/20171219/d0b2c8d53412b1ddd2339fbcaefadd64.jpg', '5', '1', '8');
INSERT INTO `blog_article` VALUES ('3', 'PHP文章', 'PHP', 'PHP最好PHP最好PHP最好PHP最好PHP最好PHP最好PHP最好PHP最好PHP最好', '<p>PHP最好PHP最好PHP最好PHP最好PHP最好PHP最好PHP最好PHP最好PHP最好PHP最好PHP最好PHP最好PHP最好</p>', '1514360036', '1515417312', '5', '2', 'http://tp5_blog.com/uploads/20171219/405c45d2655820fcb5319b525d7f2ed6.png', '4', '1', '9');
INSERT INTO `blog_article` VALUES ('4', '测试PHP', 'PHP作者', '1PHP学习PHP学习PHP学习PHP学习PHP学习PHP学习PHP学习', '<p>2PHP学习PHP学习PHP学习PHP学习PHP学习PHP学习PHP学习PHP学习PHP学习PHP学习PHP学习PHP学习PHP学习PHP学习</p>', '1514360421', '1515473990', '3', '2', 'http://test.cnhiyi.com/uploads/20171219/2128aa0d7bc844021cc294aa8e2046e6.png', '4', '1', '110');

-- ----------------------------
-- Table structure for `blog_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `blog_attachment`;
CREATE TABLE `blog_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `filename` varchar(45) NOT NULL,
  `path` varchar(100) NOT NULL,
  `extension` varchar(6) NOT NULL,
  `createtime` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_attachment
-- ----------------------------
INSERT INTO `blog_attachment` VALUES ('26', 'price.png', '7e900676118583b81c4adf71514c4a9f.png', 'uploads/20171219/7e900676118583b81c4adf71514c4a9f.png', 'png', '1513668085', '1437');
INSERT INTO `blog_attachment` VALUES ('27', 'price.png', 'f7b208cc0da294ee23444f6f7ecb0707.png', 'uploads/20171219/f7b208cc0da294ee23444f6f7ecb0707.png', 'png', '1513668233', '1437');
INSERT INTO `blog_attachment` VALUES ('28', 'price.png', '2128aa0d7bc844021cc294aa8e2046e6.png', 'uploads/20171219/2128aa0d7bc844021cc294aa8e2046e6.png', 'png', '1513668676', '1437');
INSERT INTO `blog_attachment` VALUES ('29', 'price.png', '405c45d2655820fcb5319b525d7f2ed6.png', 'uploads/20171219/405c45d2655820fcb5319b525d7f2ed6.png', 'png', '1513672413', '1437');
INSERT INTO `blog_attachment` VALUES ('30', '快捷键.jpg', 'd0b2c8d53412b1ddd2339fbcaefadd64.jpg', 'uploads/20171219/d0b2c8d53412b1ddd2339fbcaefadd64.jpg', 'jpg', '1513673394', '92159');

-- ----------------------------
-- Table structure for `blog_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `blog_auth_group`;
CREATE TABLE `blog_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_auth_group
-- ----------------------------
INSERT INTO `blog_auth_group` VALUES ('3', '文章管理员', '1', '1,2,7');
INSERT INTO `blog_auth_group` VALUES ('1', '超级管理员', '1', '1,2,7,3,6,8');

-- ----------------------------
-- Table structure for `blog_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `blog_auth_group_access`;
CREATE TABLE `blog_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_auth_group_access
-- ----------------------------
INSERT INTO `blog_auth_group_access` VALUES ('1', '1');
INSERT INTO `blog_auth_group_access` VALUES ('1', '3');

-- ----------------------------
-- Table structure for `blog_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `blog_auth_rule`;
CREATE TABLE `blog_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `pid` int(11) DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `nav` varchar(100) DEFAULT '',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_auth_rule
-- ----------------------------
INSERT INTO `blog_auth_rule` VALUES ('1', 'admin/Category/index', '栏目列表', '0', '1', '1', '栏目管理', '');
INSERT INTO `blog_auth_rule` VALUES ('2', 'admin/Category/add', '栏目添加', '1', '1', '1', '栏目管理', '');
INSERT INTO `blog_auth_rule` VALUES ('3', 'admin/Tag/index', '标签列表', '0', '1', '1', '标签管理', '');
INSERT INTO `blog_auth_rule` VALUES ('7', 'admin/Category/edit', '栏目编辑', '1', '1', '1', '栏目管理', '');
INSERT INTO `blog_auth_rule` VALUES ('6', 'admin/Index/index', '后台首页', '0', '1', '1', '设置', '');
INSERT INTO `blog_auth_rule` VALUES ('8', 'Admin/Entry/pass', '修改密码', '6', '1', '1', '基本信息', '');

-- ----------------------------
-- Table structure for `blog_cate`
-- ----------------------------
DROP TABLE IF EXISTS `blog_cate`;
CREATE TABLE `blog_cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(45) NOT NULL,
  `cate_pid` int(11) NOT NULL,
  `cate_sort` int(11) NOT NULL DEFAULT '100',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1代表显示2代表不显示',
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_cate
-- ----------------------------
INSERT INTO `blog_cate` VALUES ('1', '开源产品', '0', '1', '1');
INSERT INTO `blog_cate` VALUES ('2', '在线视频', '0', '5', '1');
INSERT INTO `blog_cate` VALUES ('3', '源码下载', '1', '6', '1');
INSERT INTO `blog_cate` VALUES ('4', 'PHP学习', '2', '7', '1');
INSERT INTO `blog_cate` VALUES ('5', '新闻', '0', '8', '1');
INSERT INTO `blog_cate` VALUES ('6', '国内新闻', '5', '9', '1');
INSERT INTO `blog_cate` VALUES ('8', '美国新闻', '5', '11', '1');
INSERT INTO `blog_cate` VALUES ('9', '腾讯新闻', '6', '12', '1');
INSERT INTO `blog_cate` VALUES ('10', '新浪新闻', '6', '14', '1');
INSERT INTO `blog_cate` VALUES ('11', 'Java学习', '2', '16', '2');
INSERT INTO `blog_cate` VALUES ('13', 'python', '2', '6', '2');

-- ----------------------------
-- Table structure for `blog_link`
-- ----------------------------
DROP TABLE IF EXISTS `blog_link`;
CREATE TABLE `blog_link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(45) DEFAULT NULL,
  `link_url` varchar(100) DEFAULT NULL,
  `link_sort` tinyint(4) NOT NULL DEFAULT '100',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_link
-- ----------------------------
INSERT INTO `blog_link` VALUES ('1', 'php中文网', 'http://php.cn', '9');
INSERT INTO `blog_link` VALUES ('2', '后盾网', 'http://houdunwang.com', '2');
INSERT INTO `blog_link` VALUES ('3', '百度传课', 'https://chuanke.baidu.com', '1');
INSERT INTO `blog_link` VALUES ('4', '慕课网', 'htthttps://www.imooc.com/', '5');
INSERT INTO `blog_link` VALUES ('5', '腾讯课堂', 'https://ke.qq.com/', '6');

-- ----------------------------
-- Table structure for `blog_tag`
-- ----------------------------
DROP TABLE IF EXISTS `blog_tag`;
CREATE TABLE `blog_tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(45) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_tag
-- ----------------------------
INSERT INTO `blog_tag` VALUES ('1', 'PHP');
INSERT INTO `blog_tag` VALUES ('2', 'Java');
INSERT INTO `blog_tag` VALUES ('3', 'Python');
INSERT INTO `blog_tag` VALUES ('4', '.net');
INSERT INTO `blog_tag` VALUES ('5', 'C++');
INSERT INTO `blog_tag` VALUES ('6', 'C');
INSERT INTO `blog_tag` VALUES ('7', 'Java');

-- ----------------------------
-- Table structure for `blog_webset`
-- ----------------------------
DROP TABLE IF EXISTS `blog_webset`;
CREATE TABLE `blog_webset` (
  `webset_id` int(11) NOT NULL AUTO_INCREMENT,
  `webset_name` varchar(45) DEFAULT NULL,
  `webset_value` varchar(45) DEFAULT NULL,
  `webset_des` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`webset_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_webset
-- ----------------------------
INSERT INTO `blog_webset` VALUES ('1', 'title', 'tp5博客', '网站名称');
INSERT INTO `blog_webset` VALUES ('2', 'email', '2108637739@qq.com', '站长邮箱');
INSERT INTO `blog_webset` VALUES ('3', 'copyright', 'Copyright@2017 琴心剑胆—武', '版权信息');
