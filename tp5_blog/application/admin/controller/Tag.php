<?php

namespace app\admin\controller;

use think\Controller;

class Tag extends Base
{
    protected $db;
    public function _initialize(){
        parent::_initialize();
        $this->db = new \app\common\model\Tag();
    }
    public function index(){
        $list = db('tag')->paginate(2);
        // 获取分页显示
        $page = $list->render();
        // 模板变量赋值
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch();
    }
    public function tag(){
        $tag_id = input('param.tag_id');
        if(request()->isPost()){
            $res = $this->db->tag(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');
            }else{
                $this->error($res['msg']);
            }
        }
        //$tag_id有值说明是编辑没值说明是添加
        if($tag_id){
            $oldData = $this->db->find($tag_id);
        }else{
            $oldData = ['tag_name'=>''];
        }
        $this->assign(
            array(
                'oldData'=>$oldData,
            )
        );
        return $this->fetch();
    }
    public function del(){
        $tag_id = input('param.tag_id');
        if(\app\common\model\Tag::destroy($tag_id)){
            $this->success('操作成功','index');
        }else{
            $this->error('操作失败');exit;
        }
    }
}
