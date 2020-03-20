<?php

namespace app\controllers;

use Yii;
use app\models\PorNegociacion;
use app\models\PorNegociacionSearch;
use app\models\PorReportoGarantiaEfectivoSearch;
use app\models\PorReportoGarantiaTitulosSearch;
use app\models\PorNegociacionCupon;
use app\models\PorHistorialTitulosPortafolioDesc;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use \yii\helpers\Json;


/**
 * PornegociacionController implements the CRUD actions for PorNegociacion model.
 */
class PornegociacionController extends Controller
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
     * Lists all PorNegociacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
        ]);
    }

    /**
     * Displays a single PorNegociacion model.
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
     * Creates a new PorNegociacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new PorNegociacion();
            if ($model->load(Yii::$app->request->post())) {
				$searchModel = new PorNegociacionSearch();
				$porNegociacion = $searchModel->getStatusIdByCode('NEG_ACT');
				
				$model->neg_estado = $porNegociacion[0]['itc_id'];
				
                if($model->save()){
					$cuppoid = Yii::$app->request->post()["PorNegociacion"]["cuppoid"];
					$cuppocode = Yii::$app->request->post()["PorNegociacion"]["cuppontype"];

					if($cuppoid>0){
						$modelIntro = new PorNegociacionCupon();
						$modelIntro->neg_id = $model->neg_id;
						$modelIntro->tpo_id = $model->tpo_id;
						$modelIntro->flu_id = $cuppoid;
						$modelIntro->nec_tipo = $cuppocode;
						$modelIntro->nec_fecha_venta = date('d-m-Y H:i:s');

						$modelIntro->save();
						
						$listtpoid = Yii::$app->request->post()["PorNegociacion"]["listtpoid"];
						$listCompras = explode("|", $listtpoid);
						
						foreach ($listCompras as $value){
							$modelIntro = new PorNegociacionCupon();
							$modelIntro->neg_id = $model->neg_id;
							$modelIntro->tpo_id = intval ($value);
							$modelIntro->flu_id = $cuppoid;
							$modelIntro->nec_tipo = $cuppocode;
							$modelIntro->nec_fecha_venta = date('d-m-Y H:i:s');
							$modelIntro->save();
						}
						
					}
					  
                    return "Exitoso";
                }else{
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }
            } else {
				$infoBusqueda = $this->infoCliente();
				$porId = $infoBusqueda['PortafolioId'];
                return $this->renderPartial('create', [
                    'model' => $model,
					'porId' => $porId,
					'dataGE' => [],
					'dataTV' => [],
					'cupones' => [],
					'readonly' => false,
                ]);
            }
        }
    }

    /**
     * Updates an existing PorNegociacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$re)
    {
        if(Yii::$app->request->isAjax){
          $model = $this->findModel($id);
          if ($model->load(Yii::$app->request->post())) {			  			  
              if($model->save()){
				  $cuppoid = Yii::$app->request->post()["PorNegociacion"]["cuppoid"];
				  $cuppocode = Yii::$app->request->post()["PorNegociacion"]["cuppontype"];
				  
				  if($cuppoid>0){
					  
					  PorNegociacionCupon::deleteAll('neg_id = :neg_id', [':neg_id' => $model->neg_id]);
					  
					  $modelIntro = new PorNegociacionCupon();
					  $modelIntro->neg_id = $model->neg_id;
					  $modelIntro->tpo_id = $model->tpo_id;
					  $modelIntro->flu_id = $cuppoid;
					  $modelIntro->nec_tipo = $cuppocode;
					  $modelIntro->nec_fecha_venta = date('d-m-Y H:i:s');
					  
					  $modelIntro->save();
					  
						$listtpoid = Yii::$app->request->post()["PorNegociacion"]["listtpoid"];
						$listCompras = explode("|", $listtpoid);
						
						foreach ($listCompras as $value){
							$modelIntro = new PorNegociacionCupon();
							$modelIntro->neg_id = $model->neg_id;
							$modelIntro->tpo_id = intval ($value);
							$modelIntro->flu_id = $cuppoid;
							$modelIntro->nec_tipo = $cuppocode;
							$modelIntro->nec_fecha_venta = date('d-m-Y H:i:s');
							$modelIntro->save();
						}
				  }
				  
                  return "Exitoso";
              }else{
                  Yii::$app->response->format = trim(Response::FORMAT_JSON);
                  return ActiveForm::validate($model);
              }
          }else{
				$infoBusqueda = $this->infoCliente();
				$porId = $infoBusqueda['PortafolioId'];
				
				$searchModelGE = new PorReportoGarantiaEfectivoSearch();
				$dataGE = $searchModelGE->mostrarListado($id);
				
				$searchModelNE = new PorReportoGarantiaTitulosSearch();
				$dataTV = $searchModelNE->mostrarListado($id);
				
				$searchModel = new PorNegociacionSearch();
				$porCuponC = $searchModel->obtenerTituloCuponNego($model->neg_id,$model->tpo_id,"'C'");
				$porCuponCI = $searchModel->obtenerTituloCuponNego($model->neg_id,$model->tpo_id,"'I'");
				
				$porCuponC = array(0 => $porCuponC,1 => $porCuponCI);
				
				return $this->renderPartial('update', [
					'model' => $model,
					'porId' => $porId,
					'dataGE' => $dataGE,
					'dataTV' => $dataTV,
					'cupones' => array_values($porCuponC),
					'readonly' => $re,
				]);              
          }
		}
    }

    /**
     * Deletes an existing PorNegociacion model.
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
				PorNegociacionCupon::deleteAll('neg_id = :neg_id', [':neg_id' => $model->neg_id]);
				
				$mensaje['mensaje'] = "Exitoso";
			} catch (\Exception $e) {
				$mensaje['mensaje'] = "Error";
			}
			return Json::encode($mensaje, true);
		}
    }

    /**
     * Finds the PorNegociacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorNegociacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorNegociacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public function actionMostrar(){
        $searchModel = new PorNegociacionSearch();
        
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);

		$infoBusqueda = $this->infoCliente();
        $porId = $infoBusqueda['PortafolioId'];

        $porNegociacion = $searchModel->mostrarListado($porId,$data['fecha'],$data['fechaEnd']);
        echo Json::encode($porNegociacion);
        exit;
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
	public function actionOrdeninfo(){
		$post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        
        $searchModel = new PorNegociacionSearch();        
        $arrResult = $searchModel->obtnerNegociacionPorId($data['id']);

		echo Json::encode($arrResult);
        exit;
	}
	public function actionTituloportafolio($tpoId){
		$searchModel = new PorNegociacionSearch();
        $porNegociacion = $searchModel->obtenerTituloPortafolio($tpoId);
        echo Json::encode($porNegociacion);
        exit;
	}
	public function actionObtenercuponestpo($negId,$tpoId){
		$searchModel = new PorNegociacionSearch();
        $porCuponC = $searchModel->obtenerTituloCuponNego($negId,$tpoId,"'C'");
		$porCuponCI = $searchModel->obtenerTituloCuponNego($negId,$tpoId,"'I'");
		
		$arrCupon = array($porCuponC,$porCuponCI);
		
        echo Json::encode($arrCupon);
        exit;
	}
	public function actionChangestatusneg($negId,$status){
		$model = $this->findModel($negId);
		//$searchModel = new PorNegociacionSearch();
		//$porNegociacion = $searchModel->getStatusIdByCode($status);		
		//$model->neg_estado = $porNegociacion[0]['itc_id'];
		
		$strResult = 'ERROR';
		$searchModel = new PorNegociacionSearch();
		$searchModel->cambiarEstadoNegociacion($model->neg_id,$model->tpo_id,($model->neg_valor_nominal * $model->neg_cantidad),$status);
		$strResult = "OK";
		
		echo Json::encode($strResult);
        exit;
	}
	public function actionOcultarnegtp($negId,$tipo){
		$model = $this->findModel($negId);
		$model->neg_ocultar_tp = $tipo;
		$model->save();
		
		$resp = [];
		echo Json::encode($resp);
        exit;
	}
	public function actionObtenercomprasvendercupon(){
		$post = file_get_contents("php://input");
		$data = Json::decode($post, true);
		$tpoId = $data['tpoId'];
		$tivId = $data['tivId'];
		$fluId = $data['fluId'];
		$tipo = $data['tipo'];
		$negid = $data['negid'];
		
		$searchModel = new PorNegociacionSearch();
		
        $porCuponC = $searchModel->obtenerComprasVenderCupon($tpoId,$tivId,$fluId,$tipo,$negid);
		
		echo Json::encode($porCuponC);
        exit;
	}
}
