<?php

namespace app\controllers;

use Yii;
use app\models\PorReportoGarantiaEfectivo;
use app\models\PorReportoGarantiaEfectivoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use \yii\helpers\Json;

/**
 * PorReportoGarantiaEfectivoController implements the CRUD actions for PorReportoGarantiaEfectivo model.
 */
class PorreportogarantiaefectivoController extends Controller
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
     * Lists all PorReportoGarantiaEfectivo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PorReportoGarantiaEfectivoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PorReportoGarantiaEfectivo model.
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
     * Creates a new PorReportoGarantiaEfectivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new PorReportoGarantiaEfectivo();

		if(Yii::$app->request->isAjax){
            $model = new PorReportoGarantiaEfectivo();
            if ($model->load(Yii::$app->request->post())) {
                if($model->save()){
                    return "Exitoso";
                }else{
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }
            } else {
                return $this->renderPartial('create', ['model' => $model,'negId' => $id]);
            }
        }
    }

    /**
     * Updates an existing PorReportoGarantiaEfectivo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

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
				$infoBusqueda = $this->infoCliente();
				$porId = $infoBusqueda['PortafolioId'];
				return $this->renderPartial('update', ['model' => $model,'negId' => $id]);              
          }
		}
    }

    /**
     * Deletes an existing PorReportoGarantiaEfectivo model.
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
     * Finds the PorReportoGarantiaEfectivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorReportoGarantiaEfectivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorReportoGarantiaEfectivo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	private function wsdl() {
        ini_set('max_execution_time', 180);
		ini_set('default_socket_timeout', 180);
        $wsdl = Yii::$app->params['webService']; 
		libxml_disable_entity_loader(false);
        $client = new \SoapClient($wsdl, array('trace' => 1, "connection_timeout" => 180,'cache_wsdl' => WSDL_CACHE_NONE,'version' => SOAP_1_2));

        return $client;
    }
	private function infoCliente() {
        $session = Yii::$app->session;
        $ComitenteId = $session->get('ComitenteId');
        $PortafolioId = $session->get('PortafolioId');
        $client = $this->wsdl();
        $params = Array();
        $idUsuario = Yii::$app->user->identity->id;
        $params['intUsuarioId'] = $idUsuario;
        $resp = [];
        if (!empty($ComitenteId) && !empty($PortafolioId) &&
                intval($ComitenteId) > 0 && intval($PortafolioId) > 0) {
            $resp['ComitenteId'] = $ComitenteId;
            $resp['PortafolioId'] = $PortafolioId;
        } else {
            try {
                $resultado = $client->ObtenerInformacionCliente($params);
                $resp = Json::decode($resultado->ObtenerInformacionClienteResult, true);
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
            }
        }

        return $resp;
    }
	public function actionMostrar($ornId){
        $searchModel = new PorReportoGarantiaEfectivoSearch();
		
        $porGarantiaEfec = $searchModel->mostrarListado($ornId);
        echo Json::encode($porGarantiaEfec);
        exit;
    }
}
