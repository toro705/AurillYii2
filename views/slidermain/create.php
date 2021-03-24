<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Slidermain */

$this->title = 'Create Slidermain';
?>
<div class="slidermain-create container">
<?php
	$this->params['breadcrumbs'][] = ['label' => 'Slidermains', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
