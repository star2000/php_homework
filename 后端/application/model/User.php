<?php
namespace app\model;

use think\Model;

class User extends Model
{
    /**
     * 检查用户名是否注册
     *
     * @param string $name
     * @return bool
     */
    public function check_name($name)
    {
        return (bool) self::where('name', $name)->find();
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
        return (bool) self::insert([
            'name' => $name,
            'pwd' => $pwd,
        ]);
    }
    /**
     * 登录
     *
     * @param string $name
     * @param string $pwd
     * @return bool
     */
    public function sign_in($name, $pwd)
    {
        return (bool) self::where([
            'name' => $name,
            'pwd' => $pwd,
        ])->find();
    }
}
