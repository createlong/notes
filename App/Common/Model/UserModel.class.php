<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/7
 * Time: 22:42
 * @message 用户
 */
namespace Common\Model;
use Think\Model;
class UserModel extends Model
{


    public function checkMessage($data)
    {
        if(!$data || !is_array($data))
        {
            E('数据错误');
        }
        $result = array(
            'username'=>$data['username'],
            'password'=>$data['password'],
        );
        return $this->where($result)->find();
    }

    public function addUser($data)
    {
        if(!$data || !is_array($data))
        {
            E('数据异常');
        }
        $result = array(
            'user_name'=>$data['username'],
            'user_pwd'=>md5($data['password']),
            'create_time'=>time(),
            'last_time'=>time(),
        );

        return $this->add($result);
    }

    public function pageSelect($p,$pageSize)
    {
        $tatol = ($p-1) * $pageSize;
        $data['status'] = array('neq',-1);
        return $this->where($data)
            ->field('user_id,user_name,last_time,status')
            ->order('user_id desc')
            ->limit($tatol,$pageSize)
            ->select();
    }

    public function userCount()
    {
        $data['status'] = array('neq',-1);
        return $this->where($data)->count();
    }

    public function checkStatus($data)
    {
        if(!$data || !is_array($data))
        {
            E('数据异常');
        }
        if($data['status'] == 1)
        {
            return $this->where('user_id='.$data['id'])->setField('status',$data['status']);
        }elseif($data['status'] == 0)
        {
            return $this->where('user_id='.$data['id'])->setField('status',$data['status']);
        }
    }
}