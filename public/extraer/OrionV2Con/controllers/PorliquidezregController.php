<?php

namespace app\controllers;

use Yii;
use app\models\PorLiquidezReg;
use app\models\PorLiquidezRegSearch;
use app\models\PorLiquidezRegPago;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use \yii\helpers\Json;

/**
 * PorliquidezregController implements the CRUD actions for PorLiquidezReg model.
 */
class PorliquidezregController extends Controller
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
     * Lists all PorLiquidezReg models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PorLiquidezRegSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PorLiquidezReg model.
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
     * Creates a new PorLiquidezReg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new PorLiquidezReg();

            if ($model->load(Yii::$app->request->post())) {
                $model->liq_fecha_registro = date('d-m-Y H:i:s');
                if($model->save()){
                    return "Exitoso";
                }else{
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }

                return "Exitoso";
            } else {
                $infoBusqueda = $this->infoCliente();
                $porId = $infoBusqueda['PortafolioId'];

                return $this->renderPartial('create', [
                    'model' => $model,
                    'porId' => $porId,
                    'usrId' => Yii::$app->user->identity->id,
                ]);
            }
        }
    }

    /**
     * Updates an existing PorLiquidezReg model.
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
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                  return ActiveForm::validate($model);
                }else{
                    return "Exitoso";
                };
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Deletes an existing PorLiquidezReg model.
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
                PorLiquidezRegPago::deleteAll('liq_id = :liq_id', [':liq_id' => $model->liq_id]);
                $model->delete();
				
				$mensaje['mensaje'] = "Exitoso";
			} catch (\Exception $e) {
                $mensaje['mensaje'] = "Error";
			}
			return Json::encode($mensaje, true);
		}
    }

    /**
     * Finds the PorLiquidezReg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorLiquidezReg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorLiquidezReg::findOne($id)) !== null) {
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
}
