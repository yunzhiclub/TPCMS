<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$

return [
    'url_route_on' => true,
    'log'          => [
        'type' => 'trace', // 支持 socket trace file
    ],

    // 是否启用控制器类后缀
    'use_controller_suffix'  => true,

    // 设置变量过滤方法
    'default_filter'=>'htmlspecialchars',
];
