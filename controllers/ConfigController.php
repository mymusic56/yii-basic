<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/4
 * Time: 9:55
 */

namespace app\controllers;


use yii\web\Controller;

class ConfigController extends Controller
{
    public function actionConfig()
    {
        var_dump(\Yii::$app->urlManager->rules);
    }
}