<?php

namespace app\controllers;

use Yii;
use app\models\PorTituloValor;
use app\models\PorTituloValorSearch;
use app\models\PorCodigosAutogenerados;
use app\models\PorTitulosCalificacionSearch;
use app\models\PorTituloFlujo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use \yii\helpers\Json;
use app\models\UploadForm;

/**
 * PortitulovalorController implements the CRUD actions for PorTituloValor model.
 */
class PortitulovalorController extends Controller
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
     * Lists all PorTituloValor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PorTituloValorSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => null,
        ]);
    }

    /**
     * Displays a single PorTituloValor model.
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
     * Creates a new PorTituloValor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new PorTituloValor();
            if ($model->load(Yii::$app->request->post())) {
                if($model->save()){
                    $searchModelF = new PorTituloFlujo();                    
                    $searchModelF->genrarTituloFlujoDef($model->tiv_id);
                    
                    return "Exitoso";
                }else{
					$model1 = PorCodigosAutogenerados::find()->where(['cau_codigo' => 'TIV_VAL_001'])->one();
					$model1->cau_valor = $model1->cau_valor + $model1->cau_incremento;
					$model1->save();
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }
            } else {
				$model1 = PorCodigosAutogenerados::find()->where(['cau_codigo' => 'TIV_VAL_001'])->one();
				$contpost = $model1->cau_posiciones - strlen(strval($model1->cau_valor));
				$contR = 0;
				$modCodigo = '';
				while($contR<$contpost){
					$modCodigo = $modCodigo.'0';
					$contR++;
				}
				$modCodigo = $model1->cau_prefijo.$modCodigo.$model1->cau_valor;				
                return $this->renderPartial('create', [
                    'model' => $model,
					'codigo' => $modCodigo
                ]);
            }
        }
    }

    /**
     * Updates an existing PorTituloValor model.
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
				  'codigo' => $model->tiv_codigo
              ]);
          }
      }
    }

    /**
     * Deletes an existing PorTituloValor model.
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
				
				
				PorTituloFlujo::deleteAll(['tiv_id' => $model->tiv_id]);
				$model->delete();
				$mensaje['mensaje'] = "Exitoso";
			} catch (\Exception $e) {
				$mensaje['mensaje'] = "Error";
			}
			return Json::encode($mensaje, true);
		}
    }

    /**
     * Finds the PorTituloValor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorTituloValor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorTituloValor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public function actionMostrar(){
        $searchModel = new PorTituloValorSearch();

        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        

        $porTitulo = $searchModel->mostrarListado($data['bolShowAll']);
        echo Json::encode($porTitulo);
        exit;
    }
	public function actionTipovalemisor($emiId)
	{
		$searchModel = new PorTituloValorSearch();
        $porTipoValor = $searchModel->obtenerTipoValorEmisor($emiId);
		
        echo Json::encode($porTipoValor);
        exit;
	}
	public function actionTituloflujo($tivId)
	{
		$searchModel = new PorTituloValorSearch();
        $porFlujo = $searchModel->obtenerFlujo($tivId);
		
        echo Json::encode($porFlujo);
        exit;
	}
	public function actionTipovalemisorrenta($emiId,$renta)
	{
		$searchModel = new PorTituloValorSearch();
        $porTipoValor = $searchModel->obtenerTipoValorEmisorRenta($emiId,$renta);
		
        echo Json::encode($porTipoValor);
        exit;
	}
	public function actionTitvalbuscador($emiId,$tpvId,$renta)
	{
		$searchModel = new PorTituloValorSearch();
        $porTipoValor = $searchModel->obtenerTituloValorPorEmiTiv($emiId,$tpvId,$renta);
		
        echo Json::encode($porTipoValor);
        exit;
	}
	public function actionTitulovalorporid($tivId)
	{
		$searchModel = new PorTituloValorSearch();
        $porTituloValor = $searchModel->obtenerTituloPorId($tivId);
		
        echo Json::encode($porTituloValor);
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
	public function actionSubirflujotitulo(){
		$post = file_get_contents("php://input");
        $data = Json::decode($post, true);

        $client = $this->wsdl();
        $params = Array();
		$params['intTivId'] = $data['tivId'];
		$params['strPath'] = Yii::getAlias('@webroot').'/tmp/flujo/'.$data['archivo'];
		
		$resultado = $client->ProcesarArchivoFlujo($params);
        return true;
	}
	public function actionTitulocalificacion($id){
          $objAsig = new PorTitulosCalificacionSearch();

          $id = intval($id);

          $arrTivCalif = $objAsig->getTituloCalifById($id);

          return $this->renderPartial('titulocalificacion', [
              'calificacion' => Json::encode($arrTivCalif, true),
              'ids' => $id,
          ]);
      }
   public function actionMostrarcalificacion($id){
	   $objAsig = new PorTitulosCalificacionSearch();
	   $arrEmiCal = $objAsig->getTituloCalifById($id);
	   echo Json::encode($arrEmiCal,true);
	   exit;
   }
   public function actionActualizartasaflujo(){
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);

        $model = PorTituloFlujo::find()->where(['tfl_id' => $data['id']])->one();
        if($data['tasa']>0)
            $model->tfl_interes = $data['tasa'];
        else
            $model->tfl_interes = null;
        $model->save();

        $resp = [];
		echo Json::encode($resp);
        exit;      
   }
}
