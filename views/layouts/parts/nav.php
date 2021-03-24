    <?php
    // NavBar::begin([
    //     'brandLabel' => 'Aurill',
    //     'brandUrl' => Yii::$app->homeUrl,
    //     'options' => [
    //         'class' => 'navbar-inverse navbar-fixed-top',
    //     ],
    // ]);
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right'],
    //     'items' => [
    //         ['label' => 'Home', 'url' => ['/site/index']],
    //         ['label' => 'About', 'url' => ['/site/about']],
    //         ['label' => 'Contact', 'url' => ['/site/contact']],
    //         Yii::$app->user->isGuest ? (
    //             ['label' => 'Login', 'url' => ['/site/login']]
    //         ) : (
    //             '<li>'
    //             . Html::beginForm(['/site/logout'], 'post')
    //             . Html::submitButton(
    //                 'Logout (' . Yii::$app->user->identity->username . ')',
    //                 ['class' => 'btn btn-link logout']
    //             )
    //             . Html::endForm()
    //             . '</li>'
    //         )
    //     ],
    // ]);  
    // NavBar::end();
    
    use yii\helpers\Url;
    $fileUrl = Url::isRelative('@web');
    $indexUrl = Url::toRoute(['/site/index', true]);
    $nosotrosUrl = Url::toRoute(['/site/nosotros', true]);
    $contactoUrl = Url::toRoute(['/site/contacto', true]);
    $productosUrl = Url::toRoute(['/site/productos', true]);
    $ventasUrl = Url::toRoute(['/site/ventas', true]);
    $usosUrl = Url::toRoute(['/site/usos', true]);

    ?>
        <!-- HEADER -->
        <header>
            <div class="animatedParent animateOnce">
                <div class="nav-back animated fadeInDown">
                    <nav class="navbar">
                        <div class="container-fluid">
                            <div class="container">
                                <div class="row">
                                    <div class="hedone-menu-header">
                                        <div class="nav-button">
                                            <i class="fa fa-bars"></i>
                                        </div>
                                        <!-- SITE LOGO -->
                                        <div class="site-branding">
                                            <a href="<?php echo $indexUrl; ?>">
                                                <img src="/web/img/site-logo.png" alt="brand logo"/>
                                            </a>
                                        </div>      
                                    </div>
                                    <!-- PRIMARY MENU -->
                                    <div id="Hedone" class="hedone-menu-container">
                                        <div class="navbar-right">
                                            <ul class="hedone-menu">
                                                <li class="menu-item">
                                                    <a href="<?php echo $indexUrl; ?>">Home</a>                                                    
                                                </li>
                                                <li class="menu-item">
                                                    <a href="<?php echo $productosUrl; ?>">Productos</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="<?php echo $usosUrl; ?>">Usos</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="<?php echo $ventasUrl; ?>">Ventas</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="<?php echo $nosotrosUrl; ?>">Nosotros</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="<?php echo $contactoUrl; ?>">Contacto</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
