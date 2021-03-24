<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lines */

$this->title = 'Create Lines';
$this->params['breadcrumbs'][] = ['label' => 'Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lines-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
