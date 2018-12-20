<?php
namespace app\controller;

use think\Controller;
use app\model\User as UserModel;

class User extends Controller
{
    public function sign_in($name,$pwd)
    {
        return UserModel::sign_in($name,$pwd);
    }
    public function sign_up($name,$pwd)
    {
        return UserModel::sign_up($name,$pwd);
    }
    public function check_name($name)
    {
        return UserModel::check_name($name);
    }
}