<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/4
 * Time: 11:20
 */

namespace app\controllers;


use app\event\FooEvent;
use app\handler\FooHandler;
use yii\web\Controller;

class EventController extends Controller
{
    public function actionIndex()
    {
        $a = 1;
        $foo = new FooEvent();
        $foo->on(FooEvent::EVENT_HELLO, function () use (&$a) {
            return $a = $a +1;
        });

        //移除时间处理
//        $foo->off(FooEvent::EVENT_HELLO);
        $fooHandler = new FooHandler();
        $foo->on(FooEvent::EVENT_HELLO, [$fooHandler, 'echoString']);
        //测试失败
//        $foo->on(FooEvent::EVENT_HELLO, [$fooHandler, 'autoIncrement']);

        $foo->trigger(FooEvent::EVENT_HELLO);
        var_dump($a);
    }
}