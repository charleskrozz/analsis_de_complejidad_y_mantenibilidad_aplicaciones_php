<?php

namespace app\controllers;

use Yii;
use app\models\PorPrecioRv;
use app\models\PorPrecioRvSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use \yii\web\Response;
use yii\widgets\ActiveForm;
/**
 * PorpreciorvController implements the CRUD actions for PorPrecioRv model.
 */
class PorpreciorvController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all PorPrecioRv models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PorPrecioRvSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PorPrecioRv model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PorPrecioRv model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */    
   public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new PorPrecioRv();
            if ($model->load(Yii::$app->request->post())) {  
                if($model->save()){                    
                    return "Exitoso";
                }else{                     
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);; 
                }             
            } else {
                return $this->renderPartial('create', [
                    'model' => $model,
                ]);
            }
        }
    }
     public function actionUpdate($id)
    {
        if(Yii::$app->request->isAjax){
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post())) {
                if($model->save()){                    
                    return "Exitoso";
                }else{                     
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }
            }else {
                return $this->renderPartial('update', [
                    'model' => $model,
                ]);
            }
        }
    }
    /**
     * Deletes an existing PorPrecioRv model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
   public function actionDelete()
    {
        if(Yii::$app->request->isAjax){
            $post = file_get_contents("php://input");
            $data = Json::decode($post, true);
            $model = $this->findModel($data['ids']);
            $model->delete();                    
            $mensaje['mensaje'] = "Exitoso";
            return Json::encode($mensaje, true);
        } 
    }

    /**
     * Finds the PorPrecioRv model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorPrecioRv the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorPrecioRv::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     public function actionMostrar(){
        $searchModel = new PorPrecioRvSearch();
        $porPrecioRv = $searchModel->mostrarListado();
        return Json::encode($porPrecioRv);
    }
}
