<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/13
 * Time: 16:06
 */

namespace app\admin\validate;


use think\Validate;

class Group extends Validate
{
    protected $rule = [
        'title'  =>'require',
        'rules'       =>'require',
    ];
    protected $message = [
        'title.require'  =>'请输入用户组名称',
        'rules.require'       =>'请选择规则',
        ];
}