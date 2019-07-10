<?php

namespace app\admin\controller;

use think\Controller;

/**
 * 栏目管理
 * Class Category
 * @package app\admin\controller
 */
class Category extends Base
{
    protected $db;
    protected function _initialize(){
        parent::_initialize();
        $this->db = new \app\common\model\Category();
    }
    //
    public function index(){
        //$field = db('cate')->select();
        $field = $this->db->getAll();
        $this->assign('field',$field);
        return $this->fetch();
    }
    public function add(){
        if(request()->isPost()){
            $res = $this->db->add(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
               $this->error($res['msg']);exit;
            }
        }
        $cateData = $this->db->getAll();
        $this->assign('cateData',$cateData);
        return $this->fetch();
    }

    /**
     * 添加子集栏目
     * @return mixed
     */
    public function addSon(){
        $cate_id = input('param.cate_id');
        $data = $this->db->where('cate_id',$cate_id)->find();
        $this->assign('data',$data);
        if(request()->isPost()){
            $res = $this->db->add(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }
        return $this->view->fetch('addSon');
    }

    /**
     * 编辑栏目
     * @return mixed
     */
    public function edit(){
        if(request()->isPost()){
            $res = $this->db->edit(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }
        $cate_id = input('param.cate_id');
        $oldData = $this->db->find($cate_id);
        //处理所属分类【不能包含自己和自己的子集数据】
        $cateData = $this->db->getCateDate($cate_id);
        $this->assign(
            array(
                'oldData'=>$oldData,
                'cateData'=>$cateData,
        )
        );
        return $this->fetch();
    }
    /**
     *删除栏目
     */
    public function del(){
        $cate_id = input('param.cate_id');
        $status = $this->db->del($cate_id);
        if($status['valid']){
            $this->success($status['msg'],'index');exit;
        }else{
            $this->error($status['msg']);exit;
        }
    }
}
