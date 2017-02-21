<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/7
 * Time: 17:11
 */

function show($code,$message,$data = array())
{
    $result = array(
        'status'=>$code,
        'message'=>$message,
        'data'=>$data
    );
    exit(json_encode($result));
}
function p($data){
    // 定义样式
    $str='<pre style="display: block;padding: 9.5px;margin: 44px 0 0 0;font-size: 13px;line-height: 1.42857;color: #333;word-break: break-all;word-wrap: break-word;background-color: #F5F5F5;border: 1px solid #CCC;border-radius: 4px;">';
    // 如果是boolean或者null直接显示文字；否则print
    if (is_bool($data)) {
        $show_data=$data ? 'true' : 'false';
    }elseif (is_null($data)) {
        $show_data='null';
    }else{
        $show_data=print_r($data,true);
    }
    $str.=$show_data;
    $str.='</pre>';
    echo  $str;
}
//验证码
function checkVerify($code,$id='')
{
   $Verify = new \Think\Verify();
   return $Verify->check($code,$id);
}
//更改状态
function changeStatus($status)
{
    if($status == 1) return '开启';
     else return '关闭';
}
//获取菜单类型
function getMenuModel($type)
{
  if($type == 1)
  {
      return "后台菜单";
  }
  if($type == 2)
  {
      return "前台菜单";
  }
}

//url
function getUrl($nav)
{
   if(isset($nav['f']) && $nav['f'] == 'index')
   {
       $url = './admin.php?c='.$nav['c'];
   }else{
       $url = './admin.php?c='.$nav['c'].'&a='.$nav['f'];
   }
    return $url;

}
//文本编辑器
function showKind($status,$data) {
    header('Content-type:application/json;charset=UTF-8');
    if($status==0) {
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'message'=>'上传失败')));
}
//获取用户名 用于增加文章
function getUserName()
{
    if(isset($_SESSION['user']))
    {
        return $_SESSION['user']['name'];
    }
        redirect('./admin.php?c=login');
}
//获取所有的前台菜单
function getMenu($menus,$catid)
{
    foreach($menus AS $key=>$value)
    {
        $menus[$value['menu_id']] = $value['name'];
    }
        return $menus[$catid];
}
//判断是否有图
function is_hasthumb($thumb)
{
    if(isset($thumb) && $thumb)
    {
        return '有';
    }
        return '无';
}