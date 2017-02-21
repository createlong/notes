<?php
/**
 * @message 菜单
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;
use Think\Exception;

class MenuController extends CommonController
{
    public function index()
    {
//        if(isset($_GET['type'])){echo $_GET['type'];}
        $data = array();
        if(isset($_REQUEST['type']) && in_array($_REQUEST['type'],array(1,2)))
        {
            $data['type'] = intval($_REQUEST['type']);
            $this->assign('type',$data['type']);
        }else{
            $this->assign('type',-10);
        }
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] :20;
        $menuList =  D('Menu')->selects($data,$p,$pageSize);
        $menuCount = D('Menu')->counts($data);
        $page = new \Think\Page($menuCount,$pageSize);
        $menuShow = $page->show();

        $this->assign('menuList',$menuList);
        $this->assign('menuShow',$menuShow);
        $this->display();
    }

    public function add()
    {
        $jump_url = $_SERVER['HTTP_REFERER'];
        if(IS_POST && IS_AJAX)
        {
            if(!$_POST['name'] || !isset($_POST['name']))
            {
                return show(0,'菜单名必须填写');
            }
            if(!$_POST['m'] || !isset($_POST['m']))
            {
                return show(0,'模型必须填写');
            }
            if(!$_POST['c'] || !isset($_POST['c']))
            {
                return show(0,'控制器必须填写');
            }
            if(!$_POST['f'] || !isset($_POST['f']))
            {
                return show(0,'方法必须填写');
            }
            $data = I('');
            $menuId = D('Menu')->insert($data);
            if(!$menuId) return show(0,'添加失败',array('jump_url'=>$jump_url));
            else return show(1,'添加成功');
        }
        $this->display();
    }

    public function listorder()
    {
        parent::listorder('Menu');
        exit;
    }

    public function setStatus()
    {
        parent::setStatus('Menu');
        exit();
    }

}