<?php
namespace app\controller;

use think\Controller;
use app\model\User as UserModel;

class User extends Controller
{
    public function sign_in($name,$pwd)
    {
        return ['msg'=>UserModel::sign_in($name,sha1($pwd))];
    }
    public function sign_up($name,$pwd)
    {
        return ['msg'=>UserModel::sign_up($name,sha1($pwd))];
    }
    public function is_sign($name)
    {
        return ['msg'=>UserModel::is_sign($name)];
    }
}