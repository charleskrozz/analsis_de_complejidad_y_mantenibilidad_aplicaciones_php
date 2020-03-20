<?php

namespace app\controllers;

use Yii;
use app\models\PorPlantillaLiquidez;
use app\models\PorPlantillaLiquidezSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use \yii\helpers\Json;


/**
 * PorplantillaliquidezController implements the CRUD actions for PorPlantillaLiquidez model.
 */
class PorplantillaliquidezController extends Controller
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
     * Lists all PorPlantillaLiquidez models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
        ]);
    }

    /**
     * Displays a single PorPlantillaLiquidez model.
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
     * Creates a new PorPlantillaLiquidez model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new PorPlantillaLiquidez();
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

    /**
     * Updates an existing PorPlantillaLiquidez model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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
     * Deletes an existing PorPlantillaLiquidez model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        if(Yii::$app->request->isAjax){
            $post = file_get_contents("php://input");
            $data = Json::decode($post, true);
            $model = $this->findModel($data['id']);
            $model->delete();                    
            $mensaje['mensaje'] = "Exitoso";
            return Json::encode($mensaje, true);
        } 
    }

    /**
     * Finds the PorPlantillaLiquidez model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorPlantillaLiquidez the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorPlantillaLiquidez::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionObtenertipoliqact(){
		$post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        
		$searchModel = new PorPlantillaLiquidezSearch();
		
        $tipoliq = $searchModel->Obtenertipoliqact($data['est']);
		
		echo Json::encode($tipoliq);
        exit;
    }
    public function actionMostrar(){
        $searchModel = new PorPlantillaLiquidezSearch();
        $planLiq = $searchModel->mostrarListado();
        return Json::encode($planLiq);
    }
    
}
