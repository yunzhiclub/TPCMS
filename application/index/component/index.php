<?php
namespace app\index\component;

use think\Controller;
/**
* 展示首页组件
*/
class Index extends Controller
{

    public function show()
    {
        return $this->fetch('Component/index/index');
    }
}
