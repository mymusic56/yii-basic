<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/4
 * Time: 9:31
 */

namespace app\controllers;


use app\models\LoginForm;
use app\models\User;
use app\models\Users;
use yii\web\Controller;

class UserController extends Controller
{

    public function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    public function actionLoadData()
    {
        $form = new LoginForm();
        var_dump(\Yii::$app->user->id);
        $login_form = [
            'LoginForm' => \Yii::$app->request->get()
        ];
        if ($form->load($login_form) && $form->login()) {
            var_dump(\Yii::$app->user->id);
        } else {
            var_dump($form->errors);
        }
        var_dump($form->username, \Yii::$app->user->id);
    }

    /**
     * 测试认证
     */
    public function actionUser()
    {
        $user_id = \Yii::$app->request->get('id');
        $user = User::findIdentity($user_id);
        \Yii::$app->user->login($user);

        $user = \Yii::$app->user;
        var_dump($user->id, $user->isGuest);
        $user->logout();
        var_dump($user->id, $user->isGuest);
    }

    public function actionRequest()
    {
        $request = \Yii::$app->request;
        echo $request->getRemoteIP();
        \Yii::$app->response->content = 'hello world!';
        \Yii::$app->response->headers->add('X-User', '123456');
    }

    public function actionLog()
    {
        \Yii::trace('start calculating average revenue', 'USER-123245');
        \Yii::info('info', 'USER-123245');//log组件levels是否配置info
        \Yii::error('error', 'USER-123245');
        \Yii::warning('warning', 'USER-123245');
    }

    public function actionAdd()
    {
        $user = new Users();
        $user->name = 'a2';
        $user->email = 'a2@qq.com';
        $user->save();
        echo $user->created_at;
    }

    /**
     * http://yii.mytest.com/user/db-command
     *
     * @throws \yii\db\Exception
     */
    public function actionDbCommand()
    {
        \Yii::beginProfile('dbCommand');
        // 返回多行. 每行都是列名和值的关联数组.
        // 如果该查询没有结果则返回空数组
        $posts = \Yii::$app->db->createCommand('SELECT * FROM users')
            ->queryAll();

        print_r($posts);
//        var_dump($posts, '-------------');
        // 返回一行 (第一行)
        // 如果该查询没有结果则返回 false
        $post = \Yii::$app->db->createCommand('SELECT * FROM users WHERE id=1')
            ->queryOne();
        var_dump($post, '-------------');

        // 返回一列 (第一列)
        // 如果该查询没有结果则返回空数组
        $titles = \Yii::$app->db->createCommand('SELECT name FROM users')
            ->queryColumn();
        var_dump($titles, '-------------');

        // 返回一个标量值
        // 如果该查询没有结果则返回 false
        $count = \Yii::$app->db->createCommand('SELECT COUNT(*) FROM users')
            ->queryScalar();
        var_dump($count, '-------------');
        \Yii::endProfile('dbCommand');
    }

    public function actionUpdate()
    {
        $user = new Users();
        $user->update();
    }
}