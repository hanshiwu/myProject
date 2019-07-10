<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/13
 * Time: 16:06
 */

namespace app\admin\validate;


use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'username'  =>'require',
        'pwd'       =>'require',
        'code'      =>'require|captcha',
    ];
    protected $message = [
        'username.require'  =>'请输入用户名',
        'pwd.require'       =>'请输入密码',
        'code.require'      =>'请输入验证码',
        'caode.captcha'     =>'验证码不正确'
        ];
}