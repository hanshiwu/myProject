<?php
namespace app\index\controller;

use think\Controller;

class Index extends Common
{
    public function index()
    {
        $headConf = ['title'=>'TP5博客--首页'];
        $this->assign('headConf',$headConf);
        /*获取文章数据*/
        $articleData = db('article')->alias('a')
            ->join('__CATE__ c','a.cate_id=c.cate_id')
            ->where('a.is_recycle',2)
            ->order('sendtime desc')->select();
        foreach ($articleData as $key=>$val) {
            $articleData[$key]['tags'] = db('arc_tag')->alias('t')
                ->join('__TAG__ b','t.tag_id=b.tag_id')
                ->where('t.arc_id',$val['arc_id'])
                ->field('b.tag_id,b.tag_name')
                ->select();
        }
        $this->assign('articleData',$articleData);
        return $this->fetch();
    }
}
