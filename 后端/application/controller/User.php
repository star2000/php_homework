<?php
namespace app\controller;

use app\model\User as UserModel;
use think\Controller;
use think\facade\Session;

class User extends Controller
{
    /**
     * 登录
     *
     * @param string $name
     * @param string $pwd
     * @return think\response\Json
     */
    public function signIn($name, $pwd)
    {
        $result = $this->validate([
            'name' => $name,
            'pwd' => $pwd,
        ], 'app\validate\User');
        if ($result === true) {
            Session::set('name', $name);
            return UserModel::signIn($name, sha1($pwd));
        } else {
            return $result;
        }
    }
    /**
     * 注册
     *
     * @param string $name
     * @param string $pwd
     * @return think\response\Json
     */
    public function signUp($name, $pwd)
    {
        $result = $this->validate([
            'name' => $name,
            'pwd' => $pwd,
        ], 'app\validate\User');
        if ($result === true) {
            Session::set('name', $name);
            return UserModel::signUp($name, sha1($pwd));
        } else {
            return $result;
        }
    }
    /**
     * 检查用户名是否注册
     *
     * @param string $name
     * @return think\response\Json
     */
    public function isSign($name)
    {
        $result = $this->validate([
            'name' => $name,
        ], 'app\validate\User.name');
        if ($result === true) {
            return UserModel::isSign($name);
        } else {
            return $result;
        }
    }
    /**
     * 是否已登录
     *
     * @return think\response\Json
     */
    public function isLogin()
    {
        return Session::get('name');
    }
    /**
     * 注销
     *
     * @return void
     */
    public function logout()
    {
        Session::clear();
    }
}
