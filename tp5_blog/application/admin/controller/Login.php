<?php

namespace app\admin\controller;

use app\common\model\Admin;
use think\Controller;

class Login extends Controller
{
    public function login(){
        if(request()->isPost()){
            $model = new Admin();
            $res   = $model->login(input('post.'));
            if($res['valid'])
            {
                //说明登录成功
                $this->success($res['msg'],'admin/index/index');exit;
            }else{
                //说明登录失败
                $this->error($res['msg']);exit;
            }
        }
        return $this->fetch();
    }
}
