<?php
/**
 * @message 用户
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
use Think\Page;

class UserController extends CommonController
{
    public function index()
    {
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 10;
        $userLisr = D('User')->pageSelect($p,$pageSize);
        $userCount = D('User')->userCount();

        $page = new Page($userCount,$pageSize);
        $userShow = $page->show();
        $this->assign('userShow',$userShow);
        $this->assign('userList',$userLisr);
        $this->display();
    }

    public function add()
    {
        $jump_url = $_SERVER['HTTP_REFERER'];
        if(IS_POST && IS_AJAX)
        {
            if(!$_POST['username'] || !$_POST['password'] ||!isset($_POST['username']) || !isset($_POST['password']))
            {
                return show(0,'密码或用户名不能为空');
            }
            try{
                $userId = D('User')->addUser($_POST);
                if(!$userId){
                    return show(0,'添加失败',array('jump_url'=>$jump_url));
            }
                    return show(1,'添加成功');
            }catch(Exception $e){
                return  show(0,$e->getMessage());
            }
            exit();
        }
        $this->display();
    }

    public function setStatus()
    {
      parent::setStatus('User');
          exit();
    }


}