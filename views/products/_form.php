<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use app\models\Types;
use app\models\Lines;
use app\models\Uses;
use app\models\ProductUses;
use app\models\Products;


/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form container">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>
    <?php 
         if (!empty($model->img)) {  ?>
            <?= $form->field($model, 'file')->fileInput(['class' => 'invisible']) ?>    
            <img class="img-responsive" src="<?php echo '/img/products/'.$model->img ?>" alt=""> <br>
            <label for="products-file" class="btn btn-md btn-success">Cambiar Imagen</label>
    <?php   } else { ?>
        
        <?= $form->field($model, 'file')->fileInput() ?>    

    <?php  } ?>

    <?= $form->field($model, 'type_id')->dropdownList(ArrayHelper::map(Types::find()->all(), 'id', 'name'), ['prompt' => '---Tipo de producto---']) ?>
    
    <?= $form->field($model, 'line_id')->dropdownList(ArrayHelper::map(Lines::find()->all(), 'id', 'name'), ['prompt' => '---Seleccione una Línea---']) ?>

    <?php   $this->registerJs("jQuery('#checkAll').change(function(){jQuery('.book').prop('checked',this.checked?'checked':'');})");?>
        
    <?= $form->field($model, 'uses')->checkboxList(ArrayHelper::map(Uses::find()
                        ->all(), 'id', 'name'), [
                        'separator' => '<span></span>',
                        'itemOptions' => [ 'class' => 'book' ]
     ])->label('<label><input type="checkbox" id="checkAll">Marcar Todos</label>');
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
