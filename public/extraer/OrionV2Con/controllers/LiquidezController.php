<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use app\models\MenuSearch;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\PorLiquidezReg;
use app\models\PorLiquidezRegPago;


class LiquidezController extends Controller
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
     * Lists all Perfil models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
        ]);
    }

    public function actionConsultar(){
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);

        $session = Yii::$app->session;
        $PortafolioId = $session->get('PortafolioId');
        $client = $this->wsdl();
        $params = Array();
        $params['intPorId'] = $PortafolioId;
        $params['dtFecha'] = $data['fecha'];
        $params['dtFechaEnd'] = $data['fechaEnd'];
        $resp = '';

        try {
            $resultado = $client->ObtenerRegistroLiquidez($params);
            $resp = $resultado->ObtenerRegistroLiquidezResult;
        } catch (\SoapFault $fault) {
            $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
        }
        if($resp!='')
            return $resp;

        return "[]";
    }
    private function wsdl() {
        ini_set('max_execution_time', 180);
		ini_set('default_socket_timeout', 180);
        $wsdl = Yii::$app->params['webService']; 
		libxml_disable_entity_loader(false);
        $client = new \SoapClient($wsdl, array('trace' => 1, "connection_timeout" => 180,'cache_wsdl' => WSDL_CACHE_NONE,'version' => SOAP_1_2));

        return $client;
    }
    public function actionAprobaritmliq(){
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);

        $liqId = $data["liqId"];
        $fecha = $data["fecha"];
        $coment = $data["coment"];    
        $aplicaLiq = $data["aplicaliq"];
        $ctaBan = $data["ctaBan"];    

		$strResult = 'ERROR';
		$searchModel = new PorLiquidezReg();
		$searchModel->ApobarItemLiquidez($liqId,$fecha,$coment,$aplicaLiq,$ctaBan);
		$strResult = "OK";
		$resp = [];
		echo Json::encode($resp);
        exit;        
    }
    public function actionAnadirpagoliq(){
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);

        $liqId = $data["liqId"];
        $fecha = $data["fecha"];
        $coment = $data["coment"];        
        $monto = $data["monto"]; 
        $aplicaLiq = $data["aplicaliq"];
        $ctaBan = $data["ctaBan"];
        $descCred = $data["descCred"];

		$strResult = 'ERROR';
		$searchModel = new PorLiquidezReg();
		$searchModel->AndirPagoLiquidez($liqId,$monto,$fecha,$coment,$aplicaLiq,$ctaBan,$descCred);
		$strResult = "OK";
		$resp = [];
		echo Json::encode($resp);
        exit;        
    }
    public function actionObtenerpagosporliq(){
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);

        $liqId = $data["liqId"];

        $searchModel = new PorLiquidezRegPago();
        $pagos = $searchModel->obtenerPagosLiquidez($liqId);

        echo Json::encode($pagos);
        exit;
    }
}