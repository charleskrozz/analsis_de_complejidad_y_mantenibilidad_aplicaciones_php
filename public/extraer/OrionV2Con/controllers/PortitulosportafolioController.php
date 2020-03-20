<?php

namespace app\controllers;

use Yii;
use app\models\PorTitulosPortafolio;
use app\models\PorTitulosPortafolioSearch;
use app\models\PorItemCatalogo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use \yii\helpers\Json;


/**
 * PortitulosportafolioController implements the CRUD actions for PorTitulosPortafolio model.
 */
class PortitulosportafolioController extends Controller
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
     * Lists all PorTitulosPortafolio models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$searchModel = new PorTitulosPortafolioSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
        ]);
    }

    /**
     * Displays a single PorTitulosPortafolio model.
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
     * Creates a new PorTitulosPortafolio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if(Yii::$app->request->isAjax){
            $model = new PorTitulosPortafolio();
            if ($model->load(Yii::$app->request->post())) {
				$model->tpo_fecha_registro = date('d-m-Y H:i:s');
				
                if($model->save()){
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
					'porId' => $porId
                ]);
            }
        }
    }

    /**
     * Updates an existing PorTitulosPortafolio model.
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
				$infoBusqueda = $this->infoCliente();
				$porId = $infoBusqueda['PortafolioId'];
				return $this->renderPartial('update', [
					'model' => $model,
					'porId' => $porId
				]);              
          }
		}
    }

    /**
     * Deletes an existing PorTitulosPortafolio model.
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
				$itemModel = PorItemCatalogo::find()->where('itc_codigo = :itc_codigo', [':itc_codigo' => 'EST_TPO_ELI'])->one();
				
				PorTitulosPortafolio::updateAll(['tpo_estado' => $itemModel->itc_id,'tpo_fecha_salida' => $data['fecha']], 'tpo_id = '.$data['id']);
				
				$mensaje['mensaje'] = "Exitoso";
			} catch (\Exception $e) {
				$mensaje['mensaje'] = "Error";
			}
			return Json::encode($mensaje, true);
		}
    }
	
	public function actionVendercupones($id){
		if(Yii::$app->request->isAjax){
			$model = $this->findModel($id);
			$searchModel = new PorTitulosPortafolioSearch();


			$newformat = date('d-m-Y',strtotime($model['tpo_fecha_ingreso']));		  
			$porFlujoC = $searchModel->getTitleFlujo($id,"C",$newformat);
			$porFlujoI = $searchModel->getTitleFlujo($id,"I",$newformat);

			$arrCupon = array($porFlujoC,$porFlujoI);
		
			$infoBusqueda = $this->infoCliente();
			$porId = $infoBusqueda['PortafolioId'];
			return $this->renderPartial('buycuppon', [
				'model' => $model,
				'porId' => $porId,
				'flujo' => Json::encode($arrCupon),
				'tpoId' => $id
			]);  
		}
	}
	public function actionSalidatitulo(){
		return $this->renderPartial('buytitle', []);              
	}

    /**
     * Finds the PorTitulosPortafolio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorTitulosPortafolio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorTitulosPortafolio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionMostrar(){
        $searchModel = new PorTitulosPortafolioSearch();
		
		$infoBusqueda = $this->infoCliente();
        $porId = $infoBusqueda['PortafolioId'];
        
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
		
        $porTituloPor = $searchModel->mostrarListado($porId,$data['fecha'],$data['fechaEnd']);
        echo Json::encode($porTituloPor);
        exit;
    }
	public function actionSalidacupones(){
		$client = $this->wsdl();
		$resp = -100;
		try {
			$params = Array();
			
			$post = file_get_contents("php://input");
			$data = Json::decode($post, true);
			
			$params['intTpoId'] = $data['tpoId'];
			$params['strCupon'] = $data['cupones'];
			$params['dtFecha'] = $data['fecha'];
			$params['strMonto'] = $data['monto'];
			$resultado = $client->VenderCuponTituloPortafolio($params);
			
			$resp = $resultado->VenderCuponTituloPortafolioResult;
		} catch (\SoapFault $fault) {
			$error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
			echo $error;
		}
		echo $resp;
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
}
