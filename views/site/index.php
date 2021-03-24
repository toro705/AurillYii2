<?php

/* @var $this yii\web\View */

$this->title = 'Aurill - Shampoes, Enjuagues, Tratamientos Capilares, Styling';
$testeoSesionStatus = session_status();
$this->title = $session;
$asset = app\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;
?>
        <!-- PRELOADER -->
        <div id="royal_preloader"></div>

        <!-- TOP SCROLL -->
        <div id="top-home-scroll"></div>
        <a href="#top-home-scroll" class="scroll-to-top-arrow-button"></a>

        <!-- AJAX LOADER -->
        <div id="ajax-loader" class="loader loader-default" data-half="" data-text="Loading..."></div>

        <!-- IS MOBILE HACK -->
        <div id="isMobile"></div>

        <!-- HEADER END -->

        <!-- HERO SECTION -->

        <div class="hero-slider">
            <div class="owl-hero-slider owl-carousel owl-theme">
                <!-- <div class="item">
                    <div class="hero-image" style="background: #000"></div>
                    <div class="hero-slider-content">
                        <div class="container-fluid">
                            <div class="row">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/nXO4-vfjhZw?rel=0&amp;controls=0&amp;showinfo=0&autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>            
                    </div>

                </div> -->
                <?php
                    use app\models\Slidermain;
                    use yii\helpers\ArrayHelper;
                    $sliders = Slidermain::find()->orderBy('position ASC')->asArray(true)->all();
                    $route = ArrayHelper::getColumn($sliders, 'img');
                    foreach ($route as $key => $img) {
                ?>
                        <div class="item">
                            <div class="hero-image" style="background-image: url(/web/img/slider/<?php echo $img?>);"></div>
                            <div class="hero-slider-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="upSection animated slideOutUp">
                                            <div class="text-top"></div>
                                            <div class="text-mid">
                                           </div>
                                            <!--<div class="slider-line"></div>-->
                                        </div>
<!--                                        <div class="downSection animated slideOutDown">
                                            <div class="text-bottom"></div>
                                            <a class="home-move-button" href="#about-home"></a>
                                        </div>-->
                                    </div>
                                </div>            
                            </div>

                        </div>
                <?php
                    }
                ?>
            </div>
        </div>

         <?php 
        
        // if (Yii::$app->user->isGuest) {
        //         echo 'Your are a guest';
        // } else {
        //         echo 'Your are a logged in';

        // } 
        // exit();
        ?>
       <!-- PRODUCTOS SECTION -->
        <?php if (!Yii::$app->user->isGuest) {
            // echo "no es invitado";
        } else {
            // echo'es invitado';
        } ?>        

        <!-- PROGRESS SECTION -->
        <div id="usos" class="padding-top-bottom-120px element-with-video-bg jquery-background-video-wrapper">
            <video class="my-background-video jquery-background-video" loop autoplay muted poster="/web/img/bg-video-poster.png">
                <source src="/web/video/video-hair.mp4" type="video/mp4">
            </video>
            <div class="container">
                <div class="row bg-video-content">
                    <div class="col-xs-12 text-center">
                        <h2 class="h1 margin-bottom-30px">¿Qué Necesitas para tu pelo?</h2>
                        <ul class="liist list-inline">
                            <?php    
                                use yii\helpers\Url;
                                $queusosUrl = Url::toRoute(['/site/usos', true]);
                            ?>

                           <li><a class="h3 btn btn-md btn-danger" href="<?php echo $queusosUrl; ?>#reparar">Reparar</a> </li> 
                           <li><a class="h3 btn btn-md btn-warning" href="<?php echo $queusosUrl; ?>#balancear">Balancear</a> </li> 
                           <li><a class="h3 btn btn-md btn-success" href="<?php echo $queusosUrl; ?>#nutrir">Nutrir</a> </li> 
                        </ul>

                    </div>

                </div>
            </div>
        </div>

        <?= $this->render('ventas.php') ?>
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div style="max-height: none" class="elfsight-app-ba119b4d-624a-40ce-a10c-6bd14296bec4"></div>

        <!-- nosotros SECTION -->
        <?= $this->render('nosotros.php') ?>


       <!-- INFO RELEVANTE SECTION -->
       
        <div class="dark-background padding-top-bottom-60px animation-overflow">
            <div class="container">
                <div class="row">
                    <div class="animatedParent animateOnce">                           
                        <div class="col-sm-4 col-sm-offset-2">
                            <div class="facts-number"><span class="counter" data-counter-val="45">45</span></div>
                            <div class="facts-name">años De experiencia</div>
                        </div>
                        <div class="col-sm-4">
                            <div class="facts-number">+<span class="counter" data-counter-val="50">+50 </span></div>
                            <div class="facts-name">PRODUCTOS en el mercado</div>
                        </div>
                      <!--   <div class="col-sm-4">
                            <div class="facts-number">+<span class="counter" data-counter-val="15">15</span></div>
                            <div class="facts-name">distribuidores</div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
       <div class="container" style="padding: 35px 0;">
            <div class="row">		
                    <div class="col-xs-12 text-center">
                        <h3>Si tiene consultas no dude en contactarnos</h3>
                        <a target="_blank" href="<?php echo Url::toRoute(['/site/contacto', true]); ?>" class="btn btn-md btn-success">Contactanos</a>
                    </div>
            </div>       
        </div>
        <!-- SUBSCRIBE SECTION -->
<!--         <div class="padding-top-bottom-60px white-background">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <form id="subscribe-form" name="subscribe-form" method="post">
                            <input id="subscribe-email" type="text" placeholder="subscribe (we hate spam)" name="email" required="required" class="subscribe-style">
                            <button type="button" data-value="subscribe" data-wait="Please wait..." class="w-button subscribe-button">subscribe</button>
                        </form>
                        <div class="alert alert-success contact-form-done no-border-radius">
                            <p>Thank you! Your submission has been received!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <?php $this->title = 'Aurill - Shampoes, Enjuagues, Tratamientos Capilares, Styling'; ?>
