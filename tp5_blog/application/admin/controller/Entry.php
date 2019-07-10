<?php

namespace app\admin\controller;
use app\common\model\Admin;
use think\Controller;

class Entry extends Controller
{
    public function index(){
        $this->fetch();
    }
    public function pass(){
        if(request()->isPost()){
            $model = new Admin();
            $res = $model->pass(input('post.'));
            if($res['valid']){
                session(null);
                $this->success($res['msg'],'admin/index/index');
            }else{
               $this->error($res['msg']);exit;
            }
        }
       return $this->fetch();
    }
}
