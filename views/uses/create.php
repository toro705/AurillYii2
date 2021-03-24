<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Uses */

$this->title = 'Create Uses';
$this->params['breadcrumbs'][] = ['label' => 'Uses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uses-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
