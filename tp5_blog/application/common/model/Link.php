<?php

namespace app\common\model;

use think\Model;

class Link extends Model
{
    protected $pk = 'link_id';
    protected $table = 'blog_link';
    public function getAll(){
        return $this->order('link_sort asc,link_id desc')->paginate(2);
    }
    /**
     * 添加
     */
    public function link($data){

        $res = $this->validate(true)->save($data,$data['link_id']);
        if($res){
            return ['valid'=>1,'msg'=>'操作成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }
}
