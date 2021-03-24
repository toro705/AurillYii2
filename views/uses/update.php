<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Uses */

$this->title = 'Update Uses: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Uses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uses-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
