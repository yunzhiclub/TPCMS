<?php
namespace app\common\validate;

use think\Validate;     //内置验证类

/**
* 验证
*/
class Teacher extends Validate
{
    protected $rule = [
        'email' => 'email',
    ];

    protected $message = [
        'email' => '邮箱格式有误',
    ];

}
