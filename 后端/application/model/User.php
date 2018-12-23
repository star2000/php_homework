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
    public static function isSign($name)
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
    public static function signUp($name, $pwd)
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
    public static function signIn($name, $pwd)
    {
        return (bool) self::where([
            'name' => $name,
            'pwd' => $pwd,
        ])->find();
    }
}
