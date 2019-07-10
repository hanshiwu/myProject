<?php
namespace app\admin\controller;

use think\Controller;
use app\common\model\Group as GroupModel;
class Group extends Base
{
    public function index(){
        $field = GroupModel::order('id desc')->paginate(10);
        return $this->fetch('',compact('field'));
    }
    public function add(GroupModel $group){
        if(request()->isPost()){
            $res = $group->add(input('post.'));
            if($res['valid']){
                return $this->success($res['msg'],'index');
            }else{
                return $this->error($res['msg']);
            }
        }
        //获取所有规则
        $rules = $this->getRules();
        return $this->fetch('',compact('rules'));
    }

    /**
     * 获取所有规则
     * @return array
     */
    public function getRules(){
        $field = db('auth_rule')->select();
        $rules = [];
        foreach ($field as $k=>$v){
            $rules[$v['nav']][] = $v;
        }
        return $rules;
    }

    /**
     * @return \think\response\View
     */
    public function edit(GroupModel $group){
        $id = input('param.id');
        if(request()->isPost()){
            $res = $group->edit(input('post.'));
            if($res['valid']){
                return $this->success($res['msg'],'index');
            }else{
                return $this->error($res['msg']);
            }
        }
        $rules = $this->getRules();
        $oldData = db('auth_group')->find($id);
        $field = explode(',',$oldData['rules']);
        $oldData['rules'] = $field;
        return view('',compact('rules','oldData'));
    }
    public function del(){
        $id = input('get.id');
        if(GroupModel::destroy($id)){
            $this->success('操作成功');
        }else{
            $this->error('操作失败');
        }
    }
}
