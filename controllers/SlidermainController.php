<?php

namespace app\controllers;

use Yii;
use app\models\Slidermain;
use app\models\SlidermainSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * SlidermainController implements the CRUD actions for Slidermain model.
 */
class SlidermainController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Slidermain models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlidermainSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slidermain model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $slider = $this->findModel($id);        
        return $this->render('view', [
            'model' => $slider,
        ]);
    }

    /**
     * Creates a new Slidermain model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slidermain();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            $imageName = md5(uniqid(rand(), TRUE));

            // traer la instancia de el archivo subido
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs( Yii::$app->basePath.'/web/img/slider/'.$imageName.'.'.$model->file->extension );

            // guardar la ruta en la db
            $model->img = $imageName.'.'.$model->file->extension;
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
     * Updates an existing Slidermain model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            

                $model->file = UploadedFile::getInstance($model, 'file');
            if (!empty($model->file)) {
                @unlink(Yii::$app->basePath.'/web/img/slider/'.$model->img);
                $imageName = md5(uniqid(rand(), TRUE));
                $model->file->saveAs( Yii::$app->basePath.'/web/img/slider/'.$imageName.'.'.$model->file->extension );
                $itemImage = Yii::$app->basePath.'/web/img/slider/'.$imageName.'.'.$model->file->extension;

                $model->img = $imageName.'.'.$model->file->extension;
                $model->save();
            } else {
                
            }
            
          
            $model->save();


            return $this->render('view', [
                'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Slidermain model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->img) {
            @unlink(Yii::$app->basePath.'/web/img/slider/'.$model->img);
        }

        $this->findModel($id)->delete();
        $searchModel = new SlidermainSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Slidermain model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slidermain the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slidermain::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
