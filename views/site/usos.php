<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Uses;
use app\models\Types;
use app\models\ProductUses;
use app\models\Products;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;


$this->title = 'Usos';
?>
       <section class="padding-top-bottom-120px white-background animation-overflow">
            <div class="container">
                <div class="row">
                    <div class="animatedParent animateOnce">
                        <h3 class="head-h3">Usos</h3>
                        <?php echo Html::csrfMetaTags();
                        Yii::$app->getRequest()->getCookies()->getValue('my_cookie');
                         ?>
                        <p class="head-subtitle">De productos</p>
                    </div>
                </div>
                <!-- FILTERS -->
                <div class="row">
                    <div class="col-xs-12 padding-top-bottom-20px">
                        <ul class="portfolio-filter">
                            <li><a href="#" data-filter="*" class="current todos">Todos</a></li> <br>

                            <?php
                                $Uses = Uses::find()->orderBy('id ASC')->all();

                                foreach ($Uses as $k => $v) {
                                    $id = $v->id;
                                    $name = $v->name;
                            ?>                            
                                <li><a href="#" class="<?php echo $name; ?>" data-filter="<?php echo '.use'; echo $id; ?>"><?php echo $name; ?></a></li>
                            <?php
                                }
                            ?>                                
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <!-- PROJECTS -->
            <div class="container-fluid max-width-1600px">
                <div class="row">
                    <div class="portfolio-container">
                        <!-- 2 col grid @ xs, 3 col grid @ sm, 4 col grid @ md -->
                        <div class="grid-sizer col-xs-12 col-sm-4 col-md-3 col-lg-2"></div>
                        <!-- 1 col @ xs, 2 col @ sm, 2 col @ md -->
                        <?php
                            $products = Products::find()->orderBy('id ASC')->all();
                            foreach ($products as $k => $v) {
                                $productUses = $v->productUses;
                                // $productUses = ProductUses::find()->where(['product_id' => $v->id])->asArray(true)->all();
                                $usesId = ArrayHelper::getColumn($productUses, 'use_id');   
                                // $productUses = $v->productUses;
                                 // print_r ($usesId); 

                            // }
                            // exit();
                        ?>
                            <div class="grid-item col-xs-12 col-sm-4 col-md-3 col-lg-2<?php
                                if (!empty($productUses)) {
                                    foreach ($usesId as $h => $j) {
                                        echo ' use'.$j;
                                        // echo $v;
                                    } 

                                } else {
                                    echo '';
                                }
                                ?>">
                                <div class="grid-item-content">
                                    <?php $productoURL = Url::toRoute(['/site/producto', true]); ?>

                                    <a href="<?php echo $productoURL?>&id=<?php echo $v->id; ?>" class="masonry-portfolio-box-link">
                                        <div class="masonry-portfolio-box-mask">
                                            <div class="portfolio-mask-title"><?php echo $v->name; ?><br>
                                                <span class="portfolio-mask-subtitle">Ver</span>
                                            </div>
                                        </div>
                                        <img src="/web/img/products/<?php echo $v->img; ?>" alt="<?php echo $v->name; ?>" class="img-responsive"/>
                                    </a>
                                </div>  
                            </div>
                        <?php
                            }
                                // exit();
                        ?>                        

                        <!-- 1 col @ xs, 2 col @ sm, 2 col @ md -->

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>