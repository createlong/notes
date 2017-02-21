<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Think;
/**
 * ThinkPHP系统异常基类
 */
class Exception extends \Exception {
}
//// 重定义构造器使 message 变为必须被指定的属性 
//    public function __construct($message, $code = 0) {
//// 自定义的代码 
//// 确保所有变量都被正确赋值 
//    parent::__construct($message, $code);
//}
//// 自定义字符串输出的样式 
//    public function __toString() {
//     return __CLASS__ . ": [{$this->code}]: {$this->message}";
//}
//    public function customFunction() {
//echo "A Custom function for this type of exceptio";
//}


