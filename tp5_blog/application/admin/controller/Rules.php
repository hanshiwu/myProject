<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Rules as RulesModel;
use tree\Tree;

/**
 * 权限之规则管理控制器类
 * Class Rules
 * @package app\admin\controller
 */
class Rules extends Base
{
    public function index(){
        $field = db('auth_rule')->select();
        $field = (new Tree())->tree($field,'title','id','pid');
        $this->assign('field',$field);
        return $this->fetch();
    }
    public function add(RulesModel $rules){
        if(request()->isPost()){
            $res = $rules->add(input('post.'));
            if($res['valid']){
                return $this->success($res['msg'],'index');
            }else{
                return $this->error($res['msg']);
            }
        }
        //获取所有规则数据
        $data = db('auth_rule')->select();
        $field = (new Tree())->tree($data,'title','id','pid');
        return $this->fetch('',compact('field'));
    }
    public function edit(RulesModel $rules){
        if(request()->isPost()){
            $res = $rules->edit(input('post.'));
            if($res['valid']){
                return $this->success($res['msg'],'index');
            }else{
                return $this->error($res['msg']);
            }
        }
        $id = input('param.id');
        //处理数据  不包含自己和自己的子集
        $field = $rules->getSonData($id);
        //获取老数据
        $oldData = RulesModel::find($id);
        return $this->fetch('',compact('field','oldData'));
    }
    public function del(){
        $id = input('get.id');
        if(RulesModel::where('pid',$id)->find()){
            $this->error('请先删除子集数据');
        }
        if(RulesModel::destroy($id)){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }
}
