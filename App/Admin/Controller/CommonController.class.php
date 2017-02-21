<?php
/**
 * @message 公共
 */
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listorder($model)
    {
        $jump_url = $_SERVER['HTTP_REFERER'];
        if(IS_POST && IS_AJAX)
        {
            $data = $_POST['listorder'];
            try{
                $error = array();
                foreach($data AS $k=>$v)
                {
                    $menuListOrderRes =  D($model)->checkListorder($k,$v);
                    if(!$menuListOrderRes) $error[] = $k;
                }
                if(!empty($error))
                {
                    return show(0,'错误的id是:'.implode('-',$error),array('jump_url'=>$jump_url));
                }
                return show(1,'排序成功',array('jump_url'=>$jump_url));
            }catch(Exception $e)
            {
                return show(0,$e->getMessage());
            }

        }
        exit;
    }
    public function setStatus($model)
    {
        if(IS_POST && IS_AJAX)
        {
            $status =  D($model)->checkStatus($_POST);
            if($status) return show(1,'修改成功');
        }
        exit();
    }

}