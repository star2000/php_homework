<?php
namespace app\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'name|名称'=>'require|max:20',
        'pwd|密码'=>'require|min:6'
    ];
    protected $scene = [
        'name'=>'name'
    ];
}