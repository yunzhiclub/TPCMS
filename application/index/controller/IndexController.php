<?php
namespace app\index\controller;

use app\index\model\Menu;
use think\Controller;
/**
*
*/
class IndexController extends Controller
{

    public function Login()
    {
        $Menu = Menu::getFromUrl();
        // var_dump($Menu);

        //根据menuID获取附件中的控制器
        $controller = $Menu->Component->controller;
        // var_dump($controller);

        $class = '\app\index\component\\' . $controller;
        // var_dump($class);
        // 实例化的是动态获取的组件中的控制器
        $Component = new $class;
        // var_dump($Component);
        return $Component->index();
    }

    public function test()
    {
        echo "hello";
    }
}
