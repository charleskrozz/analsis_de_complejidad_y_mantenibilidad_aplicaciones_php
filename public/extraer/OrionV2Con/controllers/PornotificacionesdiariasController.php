<?php

namespace app\controllers;

use Yii;
use app\models\PorNotificacionesDiarias;
use app\models\PorNotificacionesDiariasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use \yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * PornotificacionesdiariasController implements the CRUD actions for PorNotificacionesDiarias model.
 */
class PornotificacionesdiariasController extends Controller
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
     * Lists all PorNotificacionesDiarias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PorNotificacionesDiariasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PorNotificacionesDiarias model.
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
     * Creates a new PorNotificacionesDiarias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   
     public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new PorNotificacionesDiarias();
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
     * Updates an existing PorNotificacionesDiarias model.
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
     * Deletes an existing PorNotificacionesDiarias model.
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
     * Finds the PorNotificacionesDiarias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorNotificacionesDiarias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorNotificacionesDiarias::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionMostrar()
    {
        $searchModel = new PorNotificacionesDiariasSearch();
        $notificacionesDiarias = $searchModel->mostrarListado();
        return Json::encode($notificacionesDiarias);
    }
    
     public static function portafolios(){
        $client = NotificacionController::wsdl();
        $params['intUsuarioId'] = Yii::$app->user->identity->id;
        $resultado=$client->ObtenerPortafoliosPorUsuario($params);                  
        $arrData = Json::decode($resultado->ObtenerPortafoliosPorUsuarioResult, true);
        $arrlis = []; 
        $arrlis[] = ['por_id' => null, 'not_portafolio' => 'Seleccione ...'];
        foreach ($arrData as $value) {
            $arrlis[] = ['por_id' => $value['PortafolioId'], 'not_portafolio' => $value['CodigoPortafolio']." ".$value['NombreComitente']];            
        }
        
        return Json::encode($arrlis);
    }
}
