<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/8
 * Time: 16:41
 */
namespace Common\Model;
use Think\Model;
class MenuModel extends Model
{
    public function insert($data)
    {
        if(!is_array($data) || !$data)
        {
            E('数据异常');
        }
        $data['createtime'] = time();
        return $this->add($data);
    }

    public function selects($data,$p,$pageSize=10)
    {

        $data['status'] = array('neq',-1);
        $offset = ($p-1)*$pageSize;
        return $this->where($data)
            ->order('`menu_id` desc,`listorder` desc')
            ->limit($offset,$pageSize)
            ->select();
    }
    public function counts($cond)
    {
        $cond['status'] = array('neq',-1);
        return $this->where($cond)->count();
    }

    public function checkListorder($id,$value)
    {
//        p($id);exit();
        if(!$id || !is_numeric($id))
        {
            E('id不合法');
        }
        if(!$value || !is_numeric($value))
        {
            E('排数值不合法');
        }

        $data['listorder'] = $value;
        return $this->where('menu_id='.$id)->save($data);
    }

    public function checkStatus($data)
    {
        if(!$data || !is_array($data))
        {
            E('数据异常');
        }
//        p($data);exit();
        if($data['status'] == 1)
        {
            return $this->where('menu_id='.$data['id'])->setField('status',$data['status']);
        }elseif($data['status'] == 0)
        {
            return $this->where('menu_id='.$data['id'])->setField('status',$data['status']);
        }
    }

    public function getMenuNav()
    {
        $data = array(
            'status'=>1,
            'type'=>1,
        );
        return $this->where($data)->field('menu_id,name,m,c,f')->select();
    }

    public function getBarNav()
    {
        $data = array(
            'status'=>1,
            'type'=>2,
        );
        return $this->where($data)->field('menu_id,name,m,c,f')->select();
    }

}