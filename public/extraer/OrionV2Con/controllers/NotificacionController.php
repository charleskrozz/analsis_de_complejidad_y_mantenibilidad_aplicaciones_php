<?php
namespace app\controllers;

use Yii;
use app\models\Notificacion;
use app\models\NotificacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use \yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * NotificacionoController implements the CRUD actions for Notificacion model.
 */
class NotificacionController extends Controller
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
     * Lists all Notificacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', []);
    }

    /**
     * Displays a single Notificacion model.
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
     * Creates a new Notificacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new Notificacion();
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
     * Updates an existing Notificacion model.
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
     * Deletes an existing Notificacion model.
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
     * Finds the Notificacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notificacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notificacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionMostrar(){
        $searchModel = new NotificacionSearch();
        $notificaciones = $searchModel->mostrarListado();
        return Json::encode($notificaciones);
    }
    
    public static function wsdl(){
        $wsdl = Yii::$app->params['webService'];//
        $client = new \SoapClient($wsdl, array('trace' => 1, "connection_timeout" => 90));
        
        return $client;
    }
    
    public static function portafolios(){
        $client = NotificacionController::wsdl();
        $params['intUsuarioId'] = Yii::$app->user->identity->id;
        $resultado=$client->ObtenerPortafoliosPorUsuario($params);                  
        $arrData = Json::decode($resultado->ObtenerPortafoliosPorUsuarioResult, true);
        $arrlis = []; 
        $arrlis[] = ['por_id' => 0, 'not_portafolio' => 'Seleccione ...'];
        foreach ($arrData as $value) {
            $arrlis[] = ['por_id' => $value['PortafolioId'], 'not_portafolio' => $value['CodigoPortafolio']." ".$value['NombreComitente']];            
        }
        
        return Json::encode($arrlis);
    }
}
