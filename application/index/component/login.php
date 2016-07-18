<?php
namespace app\index\component;

use think\Controller;
/**
* 组件中的LOGIN控制器
*/
class Login extends Controller
{

    public function index()
    {
        return $this->fetch('Component/login/Login');
    }
}
