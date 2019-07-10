<?php

namespace app\common\model;

use think\Model;
use tree\Tree;

class Rules extends Model
{
    protected $table = 'blog_auth_rule';

    public function add($data){
        $result = $this->validate(true)->save($data);
        if($result){
            return ['valid'=>1,'msg'=>'操作成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }

    }
    public function edit($data){
        $result = $this->validate(true)->save($data,['id'=>$data['id']]);
        if($result){
            return ['valid'=>1,'msg'=>'操作成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }
    public function getSonData($id){
        //1、找子集
        $data = db('auth_rule')->select();
        $ids = $this->getSon($data,$id);
        $ids[] = $id;
        $field = db('auth_rule')->whereNotIn('id',$ids)->select();
        $tree = new Tree();
        return $tree->tree($field,'title','id','pid');
    }
    protected function getSon($data,$id){
        static $temp = [];
        foreach ($data as $k=>$v){
            if($v['pid'] == $id){
                $temp[] = $v['id'];
                $this->getSon($data,$v['id']);
            }
        }
        return $temp;
    }
}
