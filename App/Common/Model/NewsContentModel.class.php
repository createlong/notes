<?php
namespace Common\Model;
use Think\Model;
class NewsContentModel extends Model
{
    public function insertContent($data)
    {
        if(!$data || !is_array($data))
        {
            E('数据错误');
        }
       $data['createtime'] = time();
       $data['content'] = htmlspecialchars($data['content']);
        return $this->add($data);
    }


}