<?php
namespace app\controller;

use app\model\User as UserModel;
use think\Controller;

class User extends Controller
{
    /**
     * 登录
     *
     * @param string $name
     * @param string $pwd
     * @return bool
     */
    public function sign_in($name, $pwd)
    {
        $result = $this->validate([
            'name' => $name,
            'pwd' => $pwd,
        ], 'app\validate\User');
        if ($result === true) {
            $msg = UserModel::sign_in($name, sha1($pwd));
        } else {
            $msg = $result;
        }
        return ['msg' => $msg];
    }
    /**
     * 注册
     *
     * @param string $name
     * @param string $pwd
     * @return bool
     */
    public function sign_up($name, $pwd)
    {
        $result = $this->validate([
            'name' => $name,
            'pwd' => $pwd,
        ], 'app\validate\User');
        if ($result === true) {
            $msg = UserModel::sign_up($name, sha1($pwd));
        } else {
            $msg = $result;
        }
        return ['msg' => $msg];
    }
    /**
     * 检查用户名是否注册
     *
     * @param string $name
     * @return bool
     */
    public function is_sign($name)
    {
        $result = $this->validate([
            'name' => $name,
        ], 'app\validate\User.name');
        if ($result === true) {
            $msg = UserModel::is_sign($name);
        } else {
            $msg = $result;
        }
        return ['msg' => $msg];
    }
}
