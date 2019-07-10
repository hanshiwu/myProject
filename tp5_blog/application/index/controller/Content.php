<?php

namespace app\index\controller;

use think\Controller;

class Content extends Common
{
    public function index()
    {
        $arc_id = input('param.arc_id');
        //文章点击数+1
        db('article')->where('arc_id',$arc_id)->setInc('arc_click');
        /*获取文章内容*/
        $arc_id = input('param.arc_id');
        $articleData = db('article')->field('arc_id,arc_title,arc_author,arc_content,sendtime')->find($arc_id);
        $headConf = ['title'=>$articleData['arc_title']];
        $this->assign('headConf',$headConf);
        //当前文章标签
        $articleData['tags'] = db('arc_tag')->alias('at')
            ->join('__TAG__ t','at.tag_id=t.tag_id')
            ->where('at.arc_id',$articleData['arc_id'])
            ->field('t.tag_id,t.tag_name')->select();
        $this->assign('articleData',$articleData);
        return $this->fetch();
    }
}
