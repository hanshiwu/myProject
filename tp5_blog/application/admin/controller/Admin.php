<?php

namespace app\admin\controller;

use app\common\model\Groupaccess;
use app\index\controller\Common;
use think\Controller;
use \app\common\model\Admin as AdminModel;
/**
 * 用户管理控制器
 * Class Admin
 * @package app\admin\controller
 */
class Admin extends Base
{
    public function index(){
        $field = AdminModel::paginate(2);
        $this->assign('field',$field);
        return $this->fetch();
    }

    /**
     * 添加用户
     * @param AdminModel $admin
     * @return mixed
     */
    public function add(AdminModel $admin){
        if(request()->isPost()){
            $res = $admin->add(input('post.'));
            if(!$res['valid']){
                $this->error($res['msg']);
            }else{
                $this->success($res['msg']);
            }
        }
        return $this->fetch();
    }

    /**
     * 编辑用户
     * @param AdminModel $admin
     * @return mixed
     */
    public function edit(AdminModel $admin){
        if(request()->isPost()){
            $res = $admin->edit(input('post.'));
            if(!$res['valid']){
                $this->error($res['msg']);
            }else{
                $this->success($res['msg']);
            }
        }
        $oldData = AdminModel::find(input('param.id'));
        $oldData['pwd'] = (new \crypt\Crypt())->decrypt($oldData['pwd']);
        return view('',compact('oldData'));
    }

    /**
     * 删除用户
     * @return mixed
     */
    public function del(){
        if(AdminModel::destroy(input('get.id'))){
            Groupaccess::where('uid',input('get.id'))->delete();
            return $this->success('删除成功','index');
        }else{
            return $this->error('删除失败','index');

        }
    }
    public function setAuth(Groupaccess $groupaccess){
        if(request()->isPost()){
            $res = $groupaccess->setAuth(input('post.'));
            if(!$res['valid']){
                $this->error($res['msg']);
            }else{
                $this->success($res['msg'],'index');
            }
        }
        $id = input('param.id');
        //获取所有用户组数据
        $groupData = \app\common\model\Group::select();
        //获取当前用户组的组id
        $accessData = db('auth_group_access')->where('uid',$id)->column('group_id');
        return $this->fetch('setAuth',compact('groupData','accessData'));
    }
}
