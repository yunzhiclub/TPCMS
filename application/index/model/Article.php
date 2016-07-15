<?php
namespace app\index\model;

use think\Model;

/**
* Article表
*/
class Article extends Model
{
    public static function getLists()
    {
        $lists = Article::where('type',1)->select();
        return $lists;
    }

}
