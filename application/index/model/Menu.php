<?php
namespace app\index\model;

use think\Model;

/**
*
*/
class Menu extends Model
{
    //根据url返回Menu类
    static public function getFromUrl()
    {
        return self::get(1);
    }

    public function Component()
    {
        return $this->belongsTo('component');
    }
}
