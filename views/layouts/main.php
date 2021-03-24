<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="/web/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/web/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/web/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/web/img/favicon/manifest.json">
    <link rel="mask-icon" href="/web/img/favicon/safari-pinned-tab.svg" color="#00583b">
    <link rel="shortcut icon" href="/web/img/favicon/favicon.ico">
    <meta name="msapplication-config" content="/web/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">    
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="wrap">

<?= $this->render('parts/nav.php') ?>
        <?php
//        print_r($_SESSION);
        ?>             
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
</div>
<?= $this->render('parts/footer.php') ?>


<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
