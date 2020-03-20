<?php

namespace app\controllers;

use Yii;
use app\models\PorEmisor;
use app\models\PorEmisorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use app\models\MenuSearch;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\PorEmisorCalificacionSearch;
use app\models\PorEmisorCalificacion;
use app\models\PorEmisorTipoValorSearch;
use app\models\PorEmisorTipoValor;


/**
 * PoremisorController implements the CRUD actions for PorEmisor model.
 */
class PoremisorController extends Controller
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
     * Lists all PorEmisor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PorEmisorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PorEmisor model.
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
     * Creates a new PorEmisor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      if(Yii::$app->request->isAjax){
          $model = new PorEmisor();
          if ($model->load(Yii::$app->request->post())) {
            $model->emi_fecha_creacion = date('d-m-Y H:i:s');	
            $model->emi_fecha_actualizacion = date('d-m-Y H:i:s');
              if($model->save()){
                  return "Exitoso";
              }else{
                  Yii::$app->response->format = trim(Response::FORMAT_JSON);
                  return ActiveForm::validate($model);
              }
          } else {
              return $this->renderPartial('create', [
                  'model' => $model,
              ]);
          }
      }
    }

    /**
     * Updates an existing PorEmisor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      if(Yii::$app->request->isAjax){
          $model = $this->findModel($id);
          if ($model->load(Yii::$app->request->post())) {
            $model->emi_fecha_actualizacion = date('d-m-Y H:i:s');
              if($model->save()){
                  return "Exitoso";
              }else{
                  Yii::$app->response->format = trim(Response::FORMAT_JSON);
                  return ActiveForm::validate($model);
              }
          }else{
              return $this->renderPartial('update', [
                  'model' => $model,
              ]);
          }
      }
    }

    /**
     * Deletes an existing PorEmisor model.
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
          $mensaje = [];
          try {
              $model->delete();
              $mensaje['mensaje'] = "Exitoso";
          } catch (\Exception $e) {
              $mensaje['mensaje'] = "Error";
          }
          return Json::encode($mensaje, true);
      }
    }

    /**
     * Finds the PorEmisor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorEmisor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorEmisor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionMostrar(){
        $searchModel = new PorEmisorSearch();
        $porEmisor = $searchModel->mostrarListado();
        echo Json::encode($porEmisor);
        exit;
    }
   public function actionMastrarCalificacion(){
      $searchModel = new PorEmisorCalificacionSearch();
      $porEmisorCal = $searchModel->mostrarListadoCalificacion();
      echo Json::encode($porEmisorCal);
      exit;
    }
    public function actionEmisorcalificacion($id){
          $objAsig = new PorEmisorCalificacionSearch();

          $id = intval($id);

          $arrEmiCalif = $objAsig->getEmisorCalifById($id);

          //array_multisort($codigo, SORT_ASC, $portafolios);

          return $this->renderPartial('emisorscalificacion', [
              'calificacion' => Json::encode($arrEmiCalif, true),
              'ids' => $id,
          ]);
      }
   public function actionMostrarcalificacion($id){
	   $objAsig = new PorEmisorCalificacionSearch();
	   $arrEmiCal = $objAsig->getEmisorCalifById($id);
	   echo Json::encode($arrEmiCal,true);
	   exit;
   }
    public function actionEmisortipovalor($id){
          $objAsig = new PorEmisorTipoValorSearch();

          $id = intval($id);

          $arrEmiTv = $objAsig->getEmisorTipoValorById($id);

          return $this->renderPartial('emisortipovalor', [
              'tipoval' => Json::encode($arrEmiTv, true),
              'ids' => $id,
          ]);
      }
   
	public function actionMostrartipoval($id){
		$objAsig = new PorEmisorTipoValorSearch();

		$id = intval($id);

		$arrEmiTv = $objAsig->getEmisorTipoValorById($id);
		
		echo Json::encode($arrEmiTv);
        exit;
	}

}
