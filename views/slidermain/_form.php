<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use app\models\Types;

/* @var $this yii\web\View */
/* @var $model app\models\Slidermain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slidermain-form container">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?php 
         if (!empty($model->img)) {  ?>
            <?= $form->field($model, 'file')->fileInput(['class' => 'invisible']) ?>    
            <img  class="img-responsive" src="<?php echo '/img/slider/'.$model->img ?>" alt=""> <br>
            <label for="slidermain-file" class="btn btn-md btn-success">Cambiar Imagen</label>
    <?php   } else { ?>
        
        <?= $form->field($model, 'file')->fileInput() ?>    

    <?php  } ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
