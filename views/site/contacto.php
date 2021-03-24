<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\captcha\Captcha;

$this->title = 'Contacto';
// $this->params['breadcrumbs'][] = $this->title;
$asset = app\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;

?>
<div class="container">
    <div class="row">
        <div class="animatedParent animateOnce">
            <h3 class="head-h3"><?= Html::encode($this->title) ?></h3>
            <p class="head-subtitle">Aurill</p>
        </div>
    </div>

    <div class="site-contact">

        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

            <div class="alert alert-success">
                ¡Su consulta se envió con éxito!
            </div>

            <p>
                Note that if you turn on the Yii debugger, you should be able
                to view the mail message on the mail panel of the debugger.
                <?php if (Yii::$app->mailer->useFileTransport): ?>
                    Because the application is in development mode, the email is not sent but saved as
                    a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                    Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                    application component to be false to enable email sending.
                <?php endif; ?>
            </p>

        <?php else: ?>

            <p>
                Si está interesado en contactarnos, por favor complete el siguiente formulario. Muchas Gracias.
            </p>

            <div class="row">
                <div class="col-sm-6">

                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'class' => 'w-input text-field white-background']) ?>

                        <?= $form->field($model, 'email')->textInput(['class' => 'w-input text-field white-background']) ?>

                        <?= $form->field($model, 'subject')->textInput(['class' => 'w-input text-field white-background']) ?>

                        <?= $form->field($model, 'body')->textarea(['rows' => 6, 'class' => 'w-input text-field white-background']) ?>
                       

                        
                        <div class="form-group">
                            <?= Html::submitButton('Enviar', ['class' => 'btn btn-default-main-color contac-button', 'name' => 'contact-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>
                <div class="col-sm-6 animated">
                    <!-- <blockquote class="quote contact-quote">
                        "We are a new creative studuio. veritatis, eosquiso uam asperi oresipsum itaque dignissimos reprehen derit. non quos ratione ipsa facilisis. Vivamus dapibus rutrum mi ut aliquam. In hac habitasse platea dictumst. Integer sagittis neque a tortor tempor in porta sem vulputate."
                    </blockquote> -->
                    <ul style="margin-top: 50px;">
                        <li>
                            <div class="project-list-item">
                                <strong><em>email:</em></strong> aurill@aurill.com.ar 
                            </div>
                        </li>
                        <li>
                            <div class="project-list-item">
                                <strong><em>email:</em></strong> info@aurill.com.ar 
                            </div>
                        </li>
                        <li>
                            <div class="project-list-item">
                                <strong><em>Facebook:</em></strong> <a style="color: #333; text-decoration: none!important;" href="https://www.facebook.com/aurillproductos/">/aurillproductos</a>
                            </div>
                        </li>
   
                    </ul>
                </div>                
            </div>

        <?php endif; ?>
    </div>
</div>
