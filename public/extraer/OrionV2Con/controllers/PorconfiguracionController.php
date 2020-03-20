<?php

namespace app\controllers;

use Yii;
use app\models\PorConfiguracion;
use app\models\PorConfiguracionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use \yii\helpers\Json;

/**
 * PorconfiguracionController implements the CRUD actions for PorConfiguracion model.
 */
class PorconfiguracionController extends Controller
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
     * Lists all PorConfiguracion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PorConfiguracionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PorConfiguracion model.
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
     * Creates a new PorConfiguracion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if(Yii::$app->request->isAjax){
            $model = new PorConfiguracion();
            if ($model->load(Yii::$app->request->post())) {
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
     * Updates an existing PorConfiguracion model.
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
          }else{
              return $this->renderPartial('update', [
                  'model' => $model,
              ]);
          }
        }
    }

    /**
     * Deletes an existing PorConfiguracion model.
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
     * Finds the PorConfiguracion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorConfiguracion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorConfiguracion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public function actionHabilitarrf($check){		
		$session = Yii::$app->session;
        $ComitenteId = $session->get('ComitenteId');
		
		$confir = new PorConfiguracionSearch();
		$confir->actualizarRentafija($session->get('PortafolioId'),Yii::$app->user->identity->id,$check);
		echo $session->get('PortafolioId');
	}
	public function actionHabilitarrfcc($check){		
		$session = Yii::$app->session;

		$confir = new PorConfiguracionSearch();
		$confir->actualizarRentafijacc($session->get('PortafolioId'),Yii::$app->user->identity->id,$check);
		echo $session->get('PortafolioId');
	}
	public function actionMostrar(){
        $searchModel = new PorConfiguracionSearch();
        $porPortafolio = $searchModel->mostrarListado();
        echo Json::encode($porPortafolio);
        exit;
    }
}
