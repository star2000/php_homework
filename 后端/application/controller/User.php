<?php
namespace app\controller;

use think\Controller;
use app\model\User as UserModel;

class User extends Controller
{
    /**
     * 登录
     *
     * @param string $name
     * @param string $pwd
     * @return bool
     */
    public function sign_in($name,$pwd)
    {
        return ['msg'=>UserModel::sign_in($name,sha1($pwd))];
    }
    /**
     * 注册
     *
     * @param string $name
     * @param string $pwd
     * @return bool
     */
    public function sign_up($name,$pwd)
    {
        return ['msg'=>UserModel::sign_up($name,sha1($pwd))];
    }
    /**
     * 检查用户名是否注册
     *
     * @param string $name
     * @return bool
     */
    public function is_sign($name)
    {
        return ['msg'=>UserModel::is_sign($name)];
    }
}