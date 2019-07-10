<?php

namespace app\common\model;

use think\Model;

class Groupaccess extends Model
{
    protected $table = 'blog_auth_group_access';
    public function setAuth($data){
        if(!isset($data['group_id'])){
            return ['valid'=>0,'msg'=>'请选择权限名称'];
        }else{
            //判断当前用户是否存在权限组
            $this->where('uid',$data['uid'])->delete();
            foreach ($data['group_id'] as $k=>$v){
                $model = new Groupaccess;
                $model->uid     = $data['uid'];
                $model->group_id    = $v;
                $model->save();
            }
        }
    }
}
