CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '产品id',
  `price` decimal(10,3) NOT NULL COMMENT '价格',
  `store` int(11) NOT NULL COMMENT '库存',
  `detail` varchar(255) DEFAULT NULL COMMENT '详细描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
