<?php

namespace app\common\model;

use think\Model;

class Group extends Model
{
    protected $table = 'blog_auth_group';
    protected $pk = 'id';
    public function add($data){
        $data['rules'] = implode(',',$data['rules']);
        $res = $this->validate(true)->save($data);
        if($res === false){
            return ['valid'=>0,'msg'=>$this->getError()];
        }else{
            return ['valid'=>1,'msg'=>'操作成功'];
        }
    }
    public function edit($data){
        $data['rules'] = implode(',',$data['rules']);
        $res = $this->validate(true)->save($data,[$this->pk=>$data['id']]);
        if($res === false){
            return ['valid'=>0,'msg'=>$this->getError()];
        }else{
            return ['valid'=>1,'msg'=>'操作成功'];
        }
    }
}
