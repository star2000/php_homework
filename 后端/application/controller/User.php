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
        $r = $this->validate([
            'name' => $name,
            'pwd' => $pwd,
        ], 'app\validate\User');
        if (true !== $r) {
            $this->error($r);
        }
        if (true !== $this->isSign($name)) {
            $this->error('用户未注册');
        }
        if (true !== UserModel::signIn($name, sha1($pwd))) {
            $this->error('密码错误');
        }
        Session::set('name', $name);
        $this->success('登录成功');
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
        $r = $this->validate([
            'name' => $name,
            'pwd' => $pwd,
        ], 'app\validate\User');
        if (true !== $r) {
            $this->error($r);
        }
        if (true === $this->isSign($name)) {
            $this->error('用户已注册');
        }
        UserModel::signUp($name, sha1($pwd));
        Session::set('name', $name);
        $this->success('注册成功');
    }
    /**
     * 是否已注册
     *
     * @param string $name
     * @return think\response\Json|bool
     */
    public function isSign($name)
    {
        $r = $this->validate([
            'name' => $name,
        ], 'app\validate\User.name');
        if (true !== $r) {
            $this->error($r);
        }
        return UserModel::isSign($name);
    }
    /**
     * 是否已登录
     *
     * @return null|string
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
