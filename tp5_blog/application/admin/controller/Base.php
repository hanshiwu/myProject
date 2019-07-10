<?php

namespace app\admin\controller;

use think\auth\Auth;
use think\Controller;
use think\Request;

class Base extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        if(!session('admin_id')){
            $this->redirect('admin/login/login');
        }
        if(session('admin_id')!=1){
            $rule = request()->module().'/'.request()->controller().'/'.request()->action();
            if(!(new Auth())->check($rule,session('admin_id'))){
                return $this->error('你没有操作权限');
            }
        }
    }
    
}
