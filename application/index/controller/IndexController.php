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
    /**
     * 显示首页组件，其实和显示login是一样的，代码都一模一样，但是获取的menuID不同了，重要的是理解思想
     * @return 调用index组件中的show方法
     */
    public function index()
    {
        $Menu = Menu::getFromUrl();
        $controller = $Menu->Component->controller;
        // var_dump($controller);
        $class = '\app\index\component\\' . $controller;
        $Component = new $class;
        return $Component->show();
    }

    public function news()
    {
        $Menu = Menu::getFromUrl();
        $controller = $Menu->Component->controller;
        $class = '\app\index\component\\' . $controller;
        $Component = new $class;
        return $Component->index();
    }
}
