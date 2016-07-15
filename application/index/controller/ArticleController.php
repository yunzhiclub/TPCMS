<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles =Article::getLists();
        $this->assign('articles',$articles);
        return $this->fetch();
    }

    public function detail()
    {
        $id = input('get.id');
        $article = Article::get($id);
        $this->assign('article',$article);
        return $this->fetch();
    }

}
