<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        /*读取配置向*/
        $webset = $this->loadWebset();
        $this->assign('_webset',$webset);
        /*获取顶级栏目*/
        $cateData = $this->loadcateData();
        $this->assign('_cateData',$cateData);
        /*获取全部栏目数据*/
        $allCateData = $this->localAllCateData();
        $this->assign('_allCateData',$allCateData);
        /*获取标签数据*/
        $allTagData = $this->localAllTagData();
        $this->assign('_allTagData',$allTagData);
        /*获取最新文章数据*/
        $allArticleData = $this->localArticleData();
        $this->assign('_allArticleData',$allArticleData);
        /*获取友链数据*/
        $allLinkData = $this->localAllLinkData();
        $this->assign('_allLinkData',$allLinkData);
    }

    /**
     * 获取网站配置
     * @return array
     */
    private function loadWebset(){
        return db('webset')->column('webset_value','webset_name');
    }

    /**
     * 获取顶级栏目数据
     * @return false|\PDOStatement|string|\think\Collection
     */
    private function loadcateData(){
        return db('cate')->where(['cate_pid'=>0,'status'=>1])->order('cate_sort desc')->limit(5)->select();
    }

    /**
     * 获取全部显示栏目数据
     * @return false|\PDOStatement|string|\think\Collection
     */
    private function localAllCateData(){
        return db('cate')->where(['status'=>1])->order('cate_sort desc')->limit(5)->select();
    }

    /**
     * 获取标签数据
     * @return false|\PDOStatement|string|\think\Collection
     */
    private function localAllTagData(){
        return db('tag')->select();
    }

    /**
     * 获取最新文章
     * @return false|\PDOStatement|string|\think\Collection
     */
    private function localArticleData(){
        return db('article')->field('arc_id,arc_title,sendtime')->order('sendtime desc')->limit(2)->select();
    }

    /**
     * 获取友链数据
     * @return false|\PDOStatement|string|\think\Collection
     */
    private function localAllLinkData(){
        return db('link')->order('link_sort desc')->select();
    }
}
