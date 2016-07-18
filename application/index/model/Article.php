<?php
namespace app\index\model;

use think\Model;

/**
* Article表
*/
class Article extends Model
{
    public function Category()
    {
        return $this->belongsTo('category');
    }

    public static function getLists()
    {
        $lists = Article::where('status',1)->select();
        return $lists;
    }

}
