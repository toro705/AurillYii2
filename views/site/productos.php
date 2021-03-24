<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Types;
use app\models\ProductUses;
use app\models\Products;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
$this->title = 'Productos';
?>
       <section class="padding-top-bottom-120px white-background animation-overflow">
            <div class="container">
                <div class="row">
                    <div class="animatedParent animateOnce">
                        <h3 class="head-h3">Productos</h3>
                        <p class="head-subtitle">Nuestros Productos</p>
                    </div>
                </div>
                <!-- FILTERS -->
                <div class="row">
                    <div class="col-xs-12 padding-top-bottom-20px">
                        <ul class="portfolio-filter">
                            <li><a href="#" data-filter="*" class="current">Todos</a></li> <br>

                            <?php
                                $types = Types::find()->orderBy('id ASC')->all();

                                foreach ($types as $k => $v) {
                                    $id = $v->id;
                                    $name = $v->name;
                            ?>                            
                                <li><a href="#" data-filter=".<?php echo $id; ?>"><?php echo $name; ?></a></li>
                            <?php
                                }
                                    // exit();
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
                                $uses = $v->productUses;
                                $usesId = ArrayHelper::getColumn($uses, 'use_id');   
                                $productoroute = Url::toRoute(['/site/producto', true]);
                        ?>
                            <div class="grid-item col-xs-12 col-sm-4 col-md-3 col-lg-2 <?php echo $v->types->id; ?>">
                                <div class="grid-item-content">
                                    <a href="<?php echo $productoroute; ?>&id=<?php echo $v->id; ?>" class="masonry-portfolio-box-link">
                                        <div class="masonry-portfolio-box-mask">
                                            <div class="portfolio-mask-title"><?php echo $v->name; ?><br>
                                                <span class="portfolio-mask-subtitle" style="">Ver</span>
                                            </div>
                                        </div>  
                                        <div class="product-image" style="background-image: url(/web/img/products/<?php echo $v->img ?>);"></div>
                                        <!-- <img src="/web/img/products/<?php echo $v->img ?>" alt="<?php echo $v->name ?>" class="img-responsive"/> -->
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