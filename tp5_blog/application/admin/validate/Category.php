<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/13
 * Time: 16:06
 */

namespace app\admin\validate;


use think\Validate;

class Category extends Validate
{
    protected $rule = [
        'cate_name'  =>'require',
        'cate_sort'      =>'require|number|between:1,9999',
    ];
    protected $message = [
        'cate_name.require'  =>'请输入栏目名称',
        'cate_sort.require'       =>'请输入排序',
        'cate_sort.number'       =>'排序必须为数字',
        'cate_sort.between'     =>'排序必须在1-9999之间'
        ];
}