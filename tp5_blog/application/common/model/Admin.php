<?php

namespace app\common\model;

use crypt\Crypt;
use think\Loader;
use think\Model;
use think\Validate;

class Admin extends Model
{
    protected $pk = 'id';
    protected $table = 'blog_admin';
    public function login($data){
        //执行验证
        $validate = Loader::validate('Admin');
        //如果验证不通过
        if(!$validate->check($data)){
            return ['valid'=>0,'msg'=>$validate->getError()];
        }
        //验证通过开始检查账号密码
        $crypt = new Crypt();
        $userInfo = $this->where('username',$data['username'])
            ->where('pwd',$crypt->encrypt($data['pwd']))
            ->find();
        if(!$userInfo){
            return ['valid'=>0,'msg'=>'用户名或者密码不正确'];
        }
        session('admin_id',$userInfo['id']);
        session('admin_username',$userInfo['username']);
        return ['valid'=>1,'msg'=>'登陆成功'];
    }
    /**
     * 修改密码
     * @param $data post数据
     */
    public function pass($data){
        /*执行验证*/
        $validate = new Validate([
            'pwd'  => 'require',
            'new_pwd' => 'require',
            'pwd_confirm'=>'require|confirm:new_pwd'
        ],[
            'pwd.require'  => '请输入原始密码',
            'new_pwd.require'  => '请输入新密码',
            'pwd_confirm.require'  => '请输入确认密码',
            'pwd_confirm.confirm'  => '确认密码与新密码不一致',
        ]);

        if (!$validate->check($data)) {
            return ['valid'=>0,'msg'=>$validate->getError()];
        }

        /*检查原始密码是否正确*/
        $crypt = new Crypt();
        $userInfo = $this->where('id',session('admin_id'))
            ->where('pwd',$crypt->encrypt($data['pwd']))->find();
        if(!$userInfo){
            return ['valid'=>0,'msg'=>'原始密码不正确'];
        }
        /*修改密码*/
        // save方法第二个参数为更新条件
       $res = $this->save([
            'pwd'  => $crypt->encrypt($data['new_pwd']),
        ],[$this->pk => session('admin_id')]);
       if($res){
           return ['valid'=>1,'msg'=>'密码修改成功'];
       }else{
           return ['valid'=>0,'msg'=>'密码修改失败'];
       }
    }

    /**
     * 添加用户
     */
    public function add($data){
        $validate = new Validate(
            [
                'username'=>'require',
                'pwd'=>'require',
            ],[
                'username.require'=>'请输入用户名',
                'pwd.require'=>'请输入密码',
            ]
        );
        if(!$validate->check($data)){
            return ['valid'=>0,'msg'=>$validate->getError()];
        }
       // 验证用户是否存在
        if($userInfo = Admin::where('username',$data['username'])->find()){
            return ['valid'=>0,'msg'=>'管理员已存在'];
        }
        $crypt = new Crypt();
        $this->username = $data['username'];
        $this->pwd = $crypt->encrypt($data['pwd']);
        $this->save();
        return ['valid'=>1,'msg'=>'操作成功'];
    }
    public function edit($data){
        $validate = new Validate(
            [
                'username'=>'require',
                'pwd'=>'require',
            ],[
                'username.require'=>'请输入用户名',
                'pwd.require'=>'请输入密码',
            ]
        );
        if(!$validate->check($data)){
            return ['valid'=>0,'msg'=>$validate->getError()];
        }
        // 验证用户是否存在
        if($userInfo = Admin::whereNotIn('id',$data['id'])->where('username',$data['username'])->find()){
            return ['valid'=>0,'msg'=>'管理员已存在'];
        }
        $model = Admin::find($data['id']);
        $crypt = new Crypt();
        $model->username = $data['username'];
        $model->pwd = $crypt->encrypt($data['pwd']);
        $model->save();
        return ['valid'=>1,'msg'=>'操作成功'];
    }

}
