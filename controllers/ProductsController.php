<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\ProductsSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\imagine\Image;
use app\models\ProductUses;
use app\models\Uses;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
//            ' access'=>[
//                 'class'=>AccessControl::classname(),
//                 'only'=>['create','update','delete','view', 'index'],
//                 'rules'=>[
//                     [
//                         'allow'=>true,
//                         'roles'=>['@']
//                     ],
//                 ]
//             ],        
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $product = $this->findModel($id);
        return $this->render('view', [
            'model' => $product,
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $uses = $model->uses;
            if(!empty($uses)) {
                foreach ($uses as $key => $id) {
                    $productUse = new ProductUses();
                    $productUse->use_id = $id;                    
                    $productUse->product_id = $model->id;
                    $productUse->save();
                }
            }
            $imageName = md5(uniqid(rand(), TRUE));
            // traer la instancia de el archivo subido
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs( Yii::$app->basePath.'/web/img/products/'.$imageName.'.'.$model->file->extension );
            // guardar la ruta en la db
            $model->img = $imageName.'.'.$model->file->extension;
            //THUMBNAIL
            if(!empty($model->file)) {
                $itemImage = Yii::$app->basePath.'/web/img/products/'.$imageName.'.'.$model->file->extension;
                Image::thumbnail( $itemImage , 150, 150)->save(Yii::$app->basePath.'/web/img/products/thumbnail/'.$imageName.'.'.$model->file->extension, ['quality' => 60]);
                // guardar la ruta en la db
            }            
            $model->save();
            return $this->render('view', [
                'model' => $model,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $productUses = ProductUses::find()->where(['product_id' => $id])->select(['use_id'])->asArray(true)->all();
        $ids = ArrayHelper::getColumn($productUses, 'use_id');


        $model->uses = $ids;

        // $productUses = ProductUses::findAll($product->productUses);
        if (!$productUses) {
            throw new NotFoundHttpException("The user was not found.");
        }     
        //$product->scenario = 'update';   
        //$productUses->scenario = 'update';   
        //echo '<pre>';
        //print_r ($productUses);
        //exit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            ProductUses::deleteAll(['product_id' => $id]);
            $uses = $model->uses;

            foreach ($uses as $key => $id) {
                $productUse = new ProductUses();
                $productUse->use_id = $id;
                //echo'<pre>';
                //print_r($productUse->use_id);
                //exit();
                
                $productUse->product_id = $model->id;
                $productUse->save();
            }


            if($model->file == '') {
                @unlink(Yii::$app->basePath.'/web/img/products/'.$model->img);
                @unlink(Yii::$app->basePath.'/web/img/products/thumbnail/'.$model->img);
                $imageName = md5(uniqid(rand(), TRUE));
                // traer la instancia de el archivo subido
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs( Yii::$app->basePath.'/web/img/products/'.$imageName.'.'.$model->file->extension );
                // guardar la ruta en la db
                $model->img = $imageName.'.'.$model->file->extension;
                //THUMBNAIL
                if(!empty($model->file)) {
                    $itemImage = Yii::$app->basePath.'/web/img/products/'.$imageName.'.'.$model->file->extension;
                    Image::thumbnail( $itemImage , 150, 150)->save(Yii::$app->basePath.'/web/img/products/thumbnail/'.$imageName.'.'.$model->file->extension, ['quality' => 60]);
                    // guardar la ruta en la db
                }                            
               
                $model->save();
            } else {
                
                $model->save();

            }
            


            $searchModel = new ProductsSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->img) {
            @unlink(Yii::$app->basePath.'/web/img/products/'.$model->img);
            @unlink(Yii::$app->basePath.'/web/img/products/thumbnail/'.$model->img);
        }
        ProductUses::deleteAll(['product_id' => $id]);
        $this->findModel($id)->delete();
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
     }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
