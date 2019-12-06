<?php

/**
 *     小海豚官网
 *     Barrichello(巴里切罗) <ydfzgyj@baliqieluo.com>
 *     配置
 */

if(!defined('DOLPHIN')) {
	exit('Access Denied');
}

$_config = array();

// 数据库服务器设置
$_config['db']['host'] = 'hdm182127439.my3w.com';
$_config['db']['user'] = 'hdm182127439';
$_config['db']['pw'] = 'XiaoHaiTun2017';
$_config['db']['name'] = 'hdm182127439_db';
$_config['db']['charset'] = 'utf8';
$_config['db']['pconnect'] = 0;
// 模板设置
$_config['template']['template_dir'] = '/source/template';   //指定模板文件存放目录
$_config['template']['cache_dir'] = '/cache';          //指定缓存文件存放目录
$_config['template']['auto_update'] = true;           //当模板文件有改动时重新生成缓存 [关闭该项会快一些]
$_config['template']['cache_lifetime'] = 0;           //缓存生命周期(分钟)，为 0 表示永久 [设置为 0 会快一些]
