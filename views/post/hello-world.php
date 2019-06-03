<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Hello-World';
?>
<div>在视图中获取数据，拉取方式： The controller ID is: <?= $this->context->id ?></div>
<div>在视图中获取数据，推送方式： The action ID is: <?php echo $actionId; ?></div>
<h3>如何去掉layouts？$this->layout = false;</h3>
