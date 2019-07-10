<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/13
 * Time: 16:06
 */

namespace app\admin\validate;


use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'arc_title'  =>'require',
        'arc_author'  =>'require',
        'arc_sort'  =>'require|between:1,9999',
        'cate_id'  =>'notIn:0',
        'arc_thumb'  =>'require',
        'arc_digest'  =>'require',
        'arc_content'  =>'require',
    ];
    protected $message = [
        'arc_title.require'  =>'请输入文章标题',
        'arc_author.require'  =>'请输入文章作者',
        'arc_sort.require'  =>'文章排序不能为空',
        'arc_sort.between'  =>'文章排序必须在1-9999之间',
        'cate_id.notIn'  =>'请选择文章所属栏目',
        'arc_thumb.require'  =>'请上传缩略图',
        'arc_digest.require'  =>'请输入文章摘要',
        'arc_content.require'  =>'请输入文章内容',
        ];
}