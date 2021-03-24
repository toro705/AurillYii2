<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Lines;
use app\models\Types;
use app\models\ProductUses;
use app\models\Uses;
use app\models\Products;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$prodID = Yii::$app->getRequest()->getQueryParam('id');
$product = Products::findOne($prodID);
//echo'<pre>';
//var_dump($product);
$this->title = $product->name;



?>
       <section class="padding-top-bottom-120px white-background animation-overflow"> 
            <div class="container">
                <div class="row">
                    <div class="animatedParent animateOnce">
                        <h3 class="head-h3"><?php echo $product->name; ?></h3>
<!--                        <p class="head-subtitle">Nuestros Productos</p>-->
                    </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">	
                                <img src="/web/img/products/<?php echo $product->img; ?>" alt="" class="img-responsive fadeIn animated wow go">

                        </div>
                        <div class="col-sm-6">
                                <blockquote class="quote animated fadeIn go">
                                    <?php echo $product->description; ?>
                                    
                                    <br><br>Usos: <?php
                                            $productUses = $product->productUses; 
                                            $i = 0;
                                            $len = count($productUses);
                                            foreach ($productUses as $id) {                                                
                                                $usesId = $id->use_id;
                                                if (isset($usesId)) {
                                                    $productUse = new Uses();
                                                    $productUse = Uses::findOne($usesId);
                                                    echo $productUse->name;
                                                    if ($i == $len - 1) {
                                                        
                                                            echo '.';

                                                    } else {
                                                            echo ', ';

                                                    }
                                                    $i++;
                                                } else {}
                                            }
                                    ?>
                                    <br>Envase: <?php echo $product->size; ?>
                                    <br>Línea: <?php $productLineID = $product->line_id; $productLine = new Lines(); $productLine = Lines::findOne($productLineID); echo $productLine->name;?>
                                    <br>Tipo de producto: <?php $productTypeID = $product->type_id; $productType = new Types(); $productType = Types::findOne($productTypeID); echo $productType->name; ?>
                                
                               
                                </blockquote>
                        </div>
                </div>
                <!-- Productos Relacionados-->
                <div class="container-fluid max-width-1600px" style="margin-top: 100px;">
                    <div class="row">
                        <h3 class="text-center h3" style="margin-bottom: 25px;">Productos de la misma Línea</h3>
                        <div class="portfolio-container">
                            <!-- 2 col grid @ xs, 3 col grid @ sm, 4 col grid @ md -->
                            <div class="grid-sizer col-xs-12 col-sm-4 col-md-3 col-lg-2"></div>
                            <!-- 1 col @ xs, 2 col @ sm, 2 col @ md -->

                            <?php

                                $products = Products::find()->where(['line_id' => $productLineID])->orderBy('id ASC')->all();
                                // print_r($products);
                                // $route = ArrayHelper::getColumn($sliders, 'img');
                                foreach ($products as $k => $v) {
                                    // $productsUses = Products::find()->orderBy('id ASC')->asArray(true)->all();
                                    // print_r($products);
                                    $uses = $v->productUses;
                                    // $uses = ProductUses::find()->where(['product_id' => $k])->all();
                                    $usesId = ArrayHelper::getColumn($uses, 'use_id');   


                                    // echo '<pre>';
                                    //  print_r ($usesId); 

                                    // $productUses = $v->productUses;
                                     // print_r ($v->productUses); 

                                // }
                                // exit();                            use yii\helpers\Url;

                                $productoroute = Url::toRoute(['/site/producto', true]);

                            ?>
                                <div class="grid-item col-xs-12 col-sm-6 col-md-4 col-lg-3 <?php echo $v->types->id; ?>">
                                    <div class="grid-item-content">
                                        <a href="<?php echo $productoroute; ?>&id=<?php echo $v->id; ?>" class="masonry-portfolio-box-link">
                                            <div class="masonry-portfolio-box-mask">
                                                <div class="portfolio-mask-title"><?php echo $v->name; ?><br>
                                                    <span class="portfolio-mask-subtitle" style="">Ver</span>
                                                </div>
                                            </div>
                                            <img src="/web/img/products/<?php echo $v->img ?>" alt="<?php echo $v->name ?>" class="img-responsive"/>
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
                <div class="clearfix"></div>
            </div>

      
        </section>