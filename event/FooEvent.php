<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/4
 * Time: 11:19
 */

namespace app\event;


use yii\base\Component;

class FooEvent extends Component
{
    const EVENT_HELLO = 'hello';
    const EVENT_FOO = 'event_foo';

}