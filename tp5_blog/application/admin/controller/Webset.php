<?php

namespace app\admin\controller;

use think\Controller;

class Webset extends Base
{
    public function index(){
        $field = db('webset')->select();
        $this->assign('webset',$field);
        return $this->fetch();
    }
    public function edit(){
        if(request()->isAjax()){
            $res = (new \app\common\model\Webset())->edit(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');
            }else{
                $this->error($res['msg']);
            }
        }
    }

}
