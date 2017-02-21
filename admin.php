<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 后台应用入口文件
// 检测PHP环境

// 检测是否是第一次进入
//if(file_exists('./Public/myBenFen') && !file_exists('./Public/myBenFen/install.lock')) {
//    //组装 url
//    $url  = $_SERVER['HTTP_HOST'].trim($_SERVER['SCRIPT_NAME'],'index.php').'.Public/myFenBen/index.php';
//    header("Location:http://$url");
//    die;
//}
//检测php环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
define('ROOT',__DIR__);
//定义文件静态页面后缀名(根目录)
$dir = dirname(__FILE__);
//G:\ampServer\Apache24\htdocs\ThinkPHP

define('HTTP_PATH',$dir.'/');

$_GET['m'] = (!isset($_GET['m']) || !$_GET['m']) ? 'admin' : $_GET['m'];
$_GET['c'] = (!isset($_GET['c']) || !$_GET['c']) ? 'index' : $_GET['c'];
$_GET['a'] = (!isset($_GET['a']) || !$_GET['a']) ? 'index' : $_GET['a'];


// 定义应用目录
define('APP_PATH','./App/');
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
// 亲^_^ 后面不需要任何代码了 就是如此简单