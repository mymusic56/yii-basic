<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/4
 * Time: 11:25
 */

namespace app\handler;


use yii\base\Event;

class FooHandler
{
    public function autoIncrement($a)
    {
        $a = $a+1;
        echo $a, '++++++++++';
    }

    public function echoString()
    {
        echo '---------';
    }
}