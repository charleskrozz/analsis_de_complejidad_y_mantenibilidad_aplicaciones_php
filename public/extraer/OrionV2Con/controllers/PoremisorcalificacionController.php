<?php

namespace app\controllers;

use Yii;
use app\models\PorEmisorCalificacion;
use app\models\PorEmisorCalificacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use \yii\helpers\Json;

/**
 * PoremisorcalificacionController implements the CRUD actions for PorEmisorCalificacion model.
 */
class PoremisorcalificacionController extends Controller
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
     * Lists all PorEmisorCalificacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PorEmisorCalificacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PorEmisorCalificacion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionMostrar(){
          $searchModel = new PorEmisorCalificacionSearch();
          $porEmisorCal = $searchModel->mostrarListado();
          echo Json::encode($porEmisorCal);
          exit;
    }
    /**
     * Creates a new PorEmisorCalificacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      if(Yii::$app->request->isAjax){
              $model = new PorEmisorCalificacion();
              if ($model->load(Yii::$app->request->post())) {
				  $model->eca_fecha_creacion = date('d-m-Y H:i:s');	
				  $model->eca_fecha_actualizacion = date('d-m-Y H:i:s');
                  if($model->save()){
                      return "Exitoso";
                  }else{
                      Yii::$app->response->format = trim(Response::FORMAT_JSON);
                      return ActiveForm::validate($model);
                  }
              } else {
                  return $this->renderPartial('create', [
                      'model' => $model,
                      'emiId' => Yii::$app->request->post()["emiId"],
                  ]);
              }
          }
    }

    /**
     * Updates an existing PorEmisorCalificacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      if(Yii::$app->request->isAjax){
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post())) {
				$model->eca_fecha_actualizacion = date('d-m-Y H:i:s');
                if($model->save()){
                    return "Exitoso";
                }else{
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }
            }else{
                return $this->renderPartial('update', [
                    'model' => $model,
					'emiId' => $model->emi_id
                ]);
            }
        }
    }

    /**
     * Deletes an existing PorEmisorCalificacion model.
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
     * Finds the PorEmisorCalificacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorEmisorCalificacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorEmisorCalificacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
