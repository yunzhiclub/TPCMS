<?php
namespace app\index\component;

use think\Controller;
use app\index\model\Article;
/**
* 显示新闻列表
*/
class Lists extends Controller
{

    public function index()
    {
        $Articles = Article::getLists();
        $this->assign('articles',$Articles);
        return $this->fetch('component/lists/index');
    }
}
