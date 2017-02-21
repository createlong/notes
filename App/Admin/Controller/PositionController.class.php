<?php
/**
 * 推荐位
 */
namespace Admin\Controller;
use Think\Controller;
class PositionController extends Controller
{
    //开始干~~~~~
    public function index()
    {
        $p = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
        $pageSize = 10;

        $positionRes = D('Position')->selects($p,$pageSize);
        $positionCount = D('Position')->getCount();
        $page = new \Think\Page($positionCount,$pageSize);
        $positionShow = $page->show();
        //~~Ajax分页~~~//
        if(IS_AJAX)
        {
            $p = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
            $positionRes = D('Position')->selects($p,$pageSize);
            $this->assign('positionRes',$positionRes);
            $this->assign('positionShow',$positionShow);
            $html = $this->fetch('Position:ajaxPage');
            $this->ajaxReturn($html);
        }

        ///普通分页 cut
        $this->assign('positionRes',$positionRes);
        $this->assign('positionShow',$positionShow);
        $this->display();
    }
    //插入
    public function add()
    {
        $position = D('Position');
        if(IS_POST && IS_AJAX)
        {
//            if(!$position->create()) return show(0,$position->getError());
            $res = $position->insert($_POST);
            if(!$res) return show(0,'添加失败');
            return show(1,'添加陈工');
        }
            $this->display();
    }

}