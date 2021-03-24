<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="padding-top-bottom-120px ">
    <div class="site-login container text-center">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Complete el formulario:</p>
        
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'class' => 'text-center',
            'fieldConfig' => [
                'template' => "{label}<div class='clearfix'></div>\n<div class=\"col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3\">{input}</div><div class='clearfix'></div>\n<div class=\"col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3\">{error}</div>",
                'labelOptions' => ['class' => 'col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center control-label'],
            ],
        ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>

    </div>
    
</section>
