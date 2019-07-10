<?php

namespace app\index\controller;

use app\common\model\Category;
use think\Controller;

class Lists extends Common
{
    public function index(){
        $headConf = ['title'=>'TP5博客--列表页'];
        $this->assign('headConf',$headConf);
       /* 获取左侧第一部分数据*/
       $cate_id = input('param.cate_id');
       $tag_id = input('param.tag_id');
       if($cate_id){
           //当前分类所有子集分类id
            $cids = (new Category())->getSon(db('cate')->select(),$cate_id);
            $cids[]= $cate_id;//把自己追加进去
           $headData = [
               'title'=>'分类',
               'name'=>db('cate')->where('cate_id',$cate_id)->value('cate_name'),//获取单一字段
                'total'   => db('article')->where('is_recycle',2)->whereIn('cate_id',$cids)->count(),
           ];
           //获取文章数据
           $articleData = db('article')->alias('a')
               ->join('__CATE__ c','a.cate_id=c.cate_id')
               ->where('a.is_recycle',2)
               ->whereIn('a.cate_id',$cids)->select();

       }
       if($tag_id){
           $headData = [
               'title'=>'分类',
               'name'=>db('tag')->where('tag_id',$tag_id)->value('tag_name'),//获取单一字段
               'total'   => db('arc_tag')->where('tag_id',$tag_id)->count(),
           ];
           //获取文章数据
           $articleData = db('article')->alias('a')
               ->join('__ARC_TAG__ at','a.arc_id=at.arc_id')
               ->join('__CATE__ c','a.cate_id=c.cate_id')
               ->where('a.is_recycle',2)
               ->where('at.tag_id',$tag_id)
               ->select();
       }
        foreach ($articleData as $key=>$val) {
            $articleData[$key]['tags'] = db('arc_tag')->alias('t')
                ->join('__TAG__ b','t.tag_id=b.tag_id')
                ->where('t.arc_id',$val['arc_id'])
                ->field('b.tag_id,b.tag_name')
                ->select();
        }
        $this->assign('headData',$headData);
        $this->assign('articleData',$articleData);
        return $this->fetch();
    }
}
