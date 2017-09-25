/*
 Navicat MySQL Data Transfer

 Source Server         : 本地数据库
 Source Server Type    : MySQL
 Source Server Version : 50635
 Source Host           : 127.0.0.1
 Source Database       : exam

 Target Server Type    : MySQL
 Target Server Version : 50635
 File Encoding         : utf-8

 Date: 09/25/2017 17:32:09 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(2) NOT NULL COMMENT '管理员编号',
  `username` varchar(50) NOT NULL COMMENT '管理员用户名',
  `password` varchar(50) NOT NULL COMMENT '管理员密码',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '管理员状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `admin`
-- ----------------------------
BEGIN;
INSERT INTO `admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc31dFlxLhiuLqnUZe9kA', '1');
COMMIT;

-- ----------------------------
--  Table structure for `option`
-- ----------------------------
DROP TABLE IF EXISTS `option`;
CREATE TABLE `option` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '选项名称',
  `t_id` int(2) NOT NULL COMMENT '所属表格',
  `q_id` int(2) NOT NULL COMMENT '所属问题',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `option`
-- ----------------------------
BEGIN;
INSERT INTO `option` VALUES ('4', '吃', '12', '15'), ('5', '喝', '12', '15'), ('6', '玩', '12', '15'), ('7', '乐', '12', '15'), ('8', '男生', '12', '16'), ('9', '女生', '12', '16'), ('10', '哈', '13', '17'), ('11', '嘻', '13', '17'), ('12', '场站作业标准', '14', '19'), ('13', '甩挂作业标准', '14', '19'), ('14', '配送调度标准', '14', '19'), ('15', '客服服务标准', '14', '19'), ('16', '单据管理标准', '14', '19'), ('17', '仓储运营标准', '14', '19'), ('18', '库存险', '14', '20'), ('19', '货物险', '14', '20'), ('20', '整车险／叉车作业险', '14', '20'), ('21', '物流责任险', '14', '20'), ('22', '员工险', '14', '20'), ('23', '车辆险', '14', '20'), ('24', '司机培训', '14', '21'), ('25', '司机绩效', '14', '21'), ('26', '防御性驾驶', '14', '21'), ('27', '油耗监控', '14', '21'), ('28', '行驶行为优化', '14', '21'), ('29', '会计合规', '14', '22'), ('30', '税务咨询', '14', '22'), ('31', '税务筹划', '14', '22'), ('32', '内部审计', '14', '22'), ('33', '人力资源外包', '14', '22'), ('34', '甲方客户', '14', '23'), ('35', '合同物流客户', '14', '23'), ('36', '小三方物流客户', '14', '23'), ('37', '专业市场客户', '14', '23'), ('38', '同行客户', '14', '23'), ('39', '企业宣传视频', '14', '24'), ('40', '核心竞争力提炼', '14', '24'), ('41', '关键人物形象塑造', '14', '24'), ('42', '市场定位', '14', '24'), ('43', '宣传文案', '14', '24'), ('44', '推广渠道', '14', '24'), ('45', '员工商务礼仪', '14', '25'), ('46', '仓库形象', '14', '25'), ('47', '企业微信货物查询功能', '14', '25'), ('48', '网络下单', '14', '25'), ('49', '实时车辆跟踪', '14', '25'), ('50', '实时货物跟踪', '14', '25'), ('51', '新能源车', '14', '26'), ('52', '配送车辆', '14', '26'), ('53', '叉车', '14', '26'), ('54', '液压车', '14', '26'), ('55', '仓配自动化', '14', '26'), ('56', '打印设备', '14', '26'), ('57', '条码', '14', '26'), ('58', 'PDA', '14', '26'), ('59', '托盘（木，铁，铝，塑）', '14', '26'), ('60', '纸箱', '14', '26'), ('61', '缠绕膜', '14', '26'), ('62', '仓储管理系统WMS', '14', '27'), ('63', '订单管理系统OMS', '14', '27'), ('64', '配送管理系统', '14', '27'), ('65', '运输管理系统TMS', '14', '27'), ('66', '车辆管理系统G7', '14', '27'), ('67', '经营贷款', '14', '28'), ('68', '车贷', '14', '28'), ('69', '融资', '14', '28'), ('70', '合资', '14', '28'), ('71', '并购', '14', '28'), ('72', '出售', '14', '28'), ('73', '运营经理', '14', '29'), ('74', '财务经理', '14', '29'), ('75', '销售经理', '14', '29'), ('76', '车队经理', '14', '29'), ('77', '副总', '14', '29'), ('78', '总经理', '14', '29');
COMMIT;

-- ----------------------------
--  Table structure for `question`
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(2) NOT NULL AUTO_INCREMENT COMMENT '问题编号',
  `name` varchar(50) NOT NULL COMMENT '问题名称',
  `t_id` int(2) NOT NULL COMMENT '所属表格',
  `type` tinyint(1) NOT NULL,
  `require` tinyint(1) NOT NULL COMMENT '问题是否必选',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `question`
-- ----------------------------
BEGIN;
INSERT INTO `question` VALUES ('14', '你有啥事儿，可以说出来', '12', '2', '0'), ('15', '你喜欢啥', '12', '1', '0'), ('16', '你是男生还是女生', '12', '0', '0'), ('17', '哈哈', '13', '1', '1'), ('18', '培训需求（请填写具体需求）', '14', '2', '0'), ('19', '流程优化', '14', '1', '0'), ('20', '保险需求', '14', '1', '0'), ('21', '司机管理', '14', '1', '0'), ('22', '税务规范', '14', '1', '0'), ('23', '货源开拓', '14', '1', '0'), ('24', '品牌推广', '14', '1', '0'), ('25', '服务提升', '14', '1', '0'), ('26', '团购集采', '14', '1', '0'), ('27', '信息系统', '14', '1', '0'), ('28', '资金需求', '14', '1', '0'), ('29', '人才需求', '14', '1', '0');
COMMIT;

-- ----------------------------
--  Table structure for `result`
-- ----------------------------
DROP TABLE IF EXISTS `result`;
CREATE TABLE `result` (
  `id` int(2) NOT NULL COMMENT '结果编号',
  `u_id` int(11) NOT NULL COMMENT '用户编号',
  `t_id` int(2) NOT NULL COMMENT '表格编号',
  `o_id` int(2) NOT NULL,
  `addtime` varchar(50) NOT NULL COMMENT '填表时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `table`
-- ----------------------------
DROP TABLE IF EXISTS `table`;
CREATE TABLE `table` (
  `id` int(2) NOT NULL AUTO_INCREMENT COMMENT '问题编号',
  `title` varchar(100) NOT NULL COMMENT '问卷标题',
  `description` varchar(100) NOT NULL COMMENT '问卷简介',
  `author` varchar(50) NOT NULL COMMENT '发布者姓名',
  `starttime` varchar(20) DEFAULT NULL COMMENT '开始时间',
  `endtime` varchar(20) DEFAULT NULL COMMENT '结束时间',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `table`
-- ----------------------------
BEGIN;
INSERT INTO `table` VALUES ('12', '问卷调查测试', '这是一个问卷的测试', 'admin', '1505109311', '1567958400', '1'), ('13', '哈哈哈', '哈哈哈哈哈', 'admin', '1505109756', '1567958400', '1'), ('14', '仓配资源对接信息登记表', '企业帮扶需求', 'admin', '1505196434', '1567958400', '1');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(2) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '用户密码',
  `sex` tinyint(1) DEFAULT NULL COMMENT '用户性别',
  `address` varchar(100) DEFAULT NULL COMMENT '用户地址',
  `phone` int(11) DEFAULT NULL COMMENT '用户手机',
  `head` varchar(50) DEFAULT NULL COMMENT '用户头像',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'user1', 'userpassword', '1', '北京市', '2147483647', null, '1'), ('2', '用户', '7b79e788e94c1c41b6d4e1b1280c4bdb', '1', '北京市', '2147483647', '\\', '1'), ('3', '测试', '7b79e788e94c1c41b6d4e1b1280c4bdb', '0', '北京', '110', '、', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
