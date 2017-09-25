<?php
namespace app\admin\validate;

use think\Validate;

/**
 * 后台用户添加验证
 * Class User
 * @package app\admin\validate
 */
class User extends Validate
{
    protected $rule = [
        'username'   => 'require',
        'password'   => 'require',
        'repassword' => 'require',

    ];

    protected $message = [
        'username.require'   => '请输入用户名',
        'password.require'   => '请输入密码',
        'repassword.require' => '请输入重复密码',

    ];
}