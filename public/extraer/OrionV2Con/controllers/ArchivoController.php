<?php

namespace app\controllers;

use Yii;
use app\models\Archivo;
use app\models\Archivod;
use app\models\ArchivoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use \yii\web\Response;
use \app\models\ParametroSearch;
use app\models\UploadForm;
use yii\web\UploadedFile;
use \yii\helpers\Json;

/**
 * ArchivoController implements the CRUD actions for Archivo model.
 */
class ArchivoController extends Controller
{
    private $tipoArchivo = [0 => 'pathArchivo0', 1 => 'pathArchivo1', 2 => 'pathArchivo2', 3 => 'pathArchivo3', 4 => 'pathArchivo4'];
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
     * Lists all Archivo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->varpathfiles();

        return $this->render('index', [
                    'tipo' => 0,
                ]);
    }
    
    public function actionDecevalle()
    {        
        $this->varpathfiles();
        return $this->render('decevale', [
                    'tipo' => 1,
					'btnEnableEdit'=> $this->isEnableEditGen()
                ]);
    }
    
    public function actionCdvbce()
    {        
        $this->varpathfiles();
        return $this->render('cdvbce', [
                    'tipo' => 2,
					'btnEnableEdit'=> $this->isEnableEditGen()
                ]);
    }
    
    public function actionBoletin()
    {        
        $this->varpathfiles();
        return $this->render('boletin', [
                    'tipo' => 4,
                ]);
    }
    
    public function actionTitulofisico()
    {        
        $this->varpathfiles();
        return $this->render('titulofisico', [
                    'tipo' => 3,
					'btnEnableEdit'=> $this->isEnableEditGen()
                ]);
    }
    
    private function varpathfiles(){
        $session = Yii::$app->session;
        if(empty($session->get('path_archivo4'))){
            $objParam = new ParametroSearch;
            $session->set('pathArchivo0', $objParam->paramNemonico("path_archivo0"));
            $session->set('pathArchivo1', $objParam->paramNemonico("path_archivo1"));
            $session->set('pathArchivo2', $objParam->paramNemonico("path_archivo2"));
            $session->set('pathArchivo3', $objParam->paramNemonico("path_archivo3"));
            $session->set('pathArchivo4', $objParam->paramNemonico("path_archivo4"));
        }
    }

    /**
     * Displays a single Archivo model.
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
     * Creates a new Archivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $this->varpathfiles();
            $tarch = !empty( $_POST['tip0'])? $_POST['tip0'] : "nn";
            $model = $tarch == "dece" || !empty($_POST['Archivod'])?  new Archivod() : new Archivo();
            $model->arc_tipo = !empty( $_POST['tipoa'])? $_POST['tipoa'] : 0;
            $model->arc_rep_id = !empty( $_POST['idreport'])? $_POST['idreport'] : 0;                  

            if ($model->load(Yii::$app->request->post())) {
                $model->usu_id = Yii::$app->user->identity->id;
                $session = Yii::$app->session;
                $ComitenteId = $session->get('ComitenteId');
                $PortafolioId = $session->get('PortafolioId');
                if(!empty($ComitenteId)){
                    $model->com_id = $ComitenteId;
                }
                if(!empty($PortafolioId)){
                    $model->por_id = $PortafolioId;
                }
                if($model->save()){
                    if(intval($model->arc_tipo) != 4){
                        $session = Yii::$app->session;
                        $pathFile = Yii::getAlias($session->get($this->tipoArchivo[$model->arc_tipo])).$model->arc_path;
                        $pathTmp = Yii::getAlias('@webroot')."/tmp/".$model->arc_path;
                        copy($pathTmp, $pathFile);
                        unlink($pathTmp);
                    }
                    return "Exitoso";
                }else{                     
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model); 
                }             
            } else {
                if($tarch == "dece"){
                    return $this->renderPartial('created', [
                        'model' => $model,
                    ]);
                }elseif($tarch == "bol"){
                    return $this->renderPartial('createl', [
                        'model' => $model,
                    ]);
                }else{
                    return $this->renderPartial('create', [
                        'model' => $model,
                    ]);
                }                
            }
        }
    }

    /**
     * Updates an existing Archivo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $tipoa, $tip0 = "")
    {
        if(Yii::$app->request->isAjax){
            $tarch = !empty($tip0)? $tip0 : "nn";
            $model = $tarch == "dece" || !empty($_POST['Archivod'])? $this->findModeld($id) : $this->findModel($id);
            $origen = $model->arc_path;
            if ($model->load(Yii::$app->request->post())) {
                $model->usu_id = Yii::$app->user->identity->id;
                if($model->save()){
                    if($origen != $model->arc_path){
                        if(intval($model->arc_tipo) != 4){
                            $session = Yii::$app->session;
                            $pathFile = Yii::getAlias($session->get('pathArchivo'.$tipoa)).$model->arc_path;
                            $pathEli = Yii::getAlias($session->get('pathArchivo'.$tipoa)).$origen;
                            $pathTmp = Yii::getAlias('@webroot')."/tmp/".$model->arc_path;
                            copy($pathTmp, $pathFile);
                            if(file_exists($pathTmp)){unlink($pathTmp);}
                            if(file_exists($pathEli)){unlink($pathEli);}  
                        }
                    }
                    return "Exitoso";
                }else{                     
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }
            }else {
                if($tarch == "dece"){
                    return $this->renderPartial('updated', [
                        'model' => $model,
                    ]);
                }elseif($tarch == "bol"){
                    return $this->renderPartial('updatel', [
                        'model' => $model,
                    ]);
                }else{
                    return $this->renderPartial('update', [
                        'model' => $model,
                    ]);
                }   
            }
        }
    }

    /**
     * Deletes an existing Archivo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        if(Yii::$app->request->isAjax){
            $post = file_get_contents("php://input");
            $data = Json::decode($post, true);
            $info = $this->findModel($data['ids']);
            $model = $info; 
            $model->delete();
            if(intval($info->arc_tipo) !=4){
                $session = Yii::$app->session;
                $pathFile = Yii::getAlias($session->get('pathArchivo'.$data['tipoa'])).$info->arc_path;   
                if(file_exists($pathFile)){unlink($pathFile);} 
            }
            $mensaje['mensaje'] = "Exitoso";
            return Json::encode($mensaje, true);
        }        
    }

    /**
     * Finds the Archivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Archivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Archivo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModeld($id)
    {
        if (($model = Archivod::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionMostrar($filterscount, $pagenum, $pagesize, $recordstartindex, 
            $recordendindex, $sortdatafield = "", $sortorder ="", $tipoa, $idreport, $pags){
        $searchModel = new ArchivoSearch();        

        $params['tipoa'] = $tipoa;
        $params['filterscount'] = $filterscount;
        $params['page'] = $pagenum;
        $params['pagesize'] = $pagesize;
        $params['idreport'] = !empty($idreport)? $idreport : 0;
        $params['sortdatafield'] = (empty($sortdatafield))? 'arc_id' : $sortdatafield;
        $params['sortorder'] = (empty($sortorder))? 'asc' : $sortorder;
        $params['allparams'] = $_GET;        

        if($pags == "s"){
            $archivos = $searchModel->searchFile($params);
            $data[] = [
                'TotalRows' => $searchModel->totalFiles($params),
                'Rows' => $archivos,
            ];
        }

        return $pags == "s"? Json::encode($data, true) : Json::encode($searchModel->searchFilen($params), true);
    }

    public function actionSubir(){
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->fileToUpload = UploadedFile::getInstance($model, 'fileToUpload');
            $nameFile = "arch".date("Ymdhis").'.'.$model->fileToUpload->extension;
            $model->upload('tmp/'.$nameFile);
        }
        return $nameFile;
    }
    public function actionSubirarchivo(){
        $this->varpathfiles();
        return $this->render('subirArchivo', []);
    }
	public function actionSubirarchivoformularios(){
        $this->varpathfiles();
        return $this->render('subirarchivoFormularios', []);
    }
    public function actionSubirarchivoprecio(){
        $this->varpathfiles();
        return $this->render('subirArchivoprecio', []);
    }
	public function actionSubirvectorprecio(){
        $this->varpathfiles();
        return $this->render('subirarchivovector', []);
    }
    public function actionSubiralternativas(){
        $this->varpathfiles();
        return $this->render('subirAlternativas', []);
    }
    public function actionSubirxsl(){        
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->fileToUpload = UploadedFile::getInstance($model, 'fileToUpload');
            $nameFile = "infoupload_".date("Ymdhis").'.'.$model->fileToUpload->extension;
            $model->upload('tmp/'.$nameFile);
        }
        return $nameFile;
    }
	public function actionSubirxslformularios(){        
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->fileToUpload = UploadedFile::getInstance($model, 'fileToUpload');
            $nameFile = "formupload_".date("Ymdhis").'.'.$model->fileToUpload->extension;
            $model->upload('tmp/'.$nameFile);
        }
        return $nameFile;
    }
    public function actionSubirxslprecio(){        
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->fileToUpload = UploadedFile::getInstance($model, 'fileToUpload');
            $nameFile = "precioupload_".date("Ymdhis").'.'.$model->fileToUpload->extension;
            $model->upload('tmp/'.$nameFile);
        }
        return $nameFile;
    }
    public function actionSubiralternativaszip(){        
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->fileToUpload = UploadedFile::getInstance($model, 'fileToUpload');
            $nameFile = "alternativas_".date("Ymdhis").'.zip';
            $result= $model->upload('tmp/'.$nameFile);
        }
        return $nameFile;
    }
    public function actionDescarga($path1, $tipoa){
        $session = Yii::$app->session;
        $pathFile = Yii::getAlias($session->get('pathArchivo'.$tipoa)).$path1;
        if(file_exists($pathFile)){
            \Yii::$app->response->sendFile($pathFile)->send();         
        }else{
            \Yii::$app->response->sendFile("filenofound.txt")->send();
        }
    }

    public function actionVisualizar(){
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $session = Yii::$app->session;
        $pathFile = Yii::getAlias($session->get($this->tipoArchivo[$data['tipoa']])).$data['path'];
        $pathTmp = Yii::getAlias('@webroot')."/tmp/".$data['path'];
        copy($pathFile, $pathTmp);
        return Json::encode(['res' => "tmp/".$data['path']], true);
    }

	public function actionSubirtablaamortizaciongen($tpoId){        
        $model = new UploadForm();
        $nameFile = 'KO';
        if (Yii::$app->request->isPost) {
            $model->fileToUpload = UploadedFile::getInstance($model, 'fileToUpload');
            $nameFile = "tablaamorgen/tblamorgen_".$tpoId.'_'.date("Ymdhis").'.'.$model->fileToUpload->extension;
            $model->upload('tmp/'.$nameFile);
            
            return PortitulotablaamortizacionController::savefile($tpoId, $nameFile);
        }
        return $nameFile;
    }
	public function isEnableEditGen(){
        try{
            $rest = Yii::$app->session->get('buttons_rm');
            foreach($rest as $item)
            {
                if($item['men_path'] == "#BTN_EDITARG")
                {
                    return 1;
                }
            }
        }catch (\Exception $error) {
            return 0;
        }
        return 0;
    }
	public function actionSubirliquidaion($negId,$liqNum,$anio){    
        $model = new UploadForm();
        $nameFile = 'KO';
        if (Yii::$app->request->isPost) {
            $model->fileToUpload = UploadedFile::getInstance($model, 'fileToUpload');
            $nameFile = "liquidacion/liquidacion_".$negId.'_'.$liqNum.'_'.date("Ymdhis").'.'.$model->fileToUpload->extension;
            $model->upload('tmp/'.$nameFile);
            
            return PornegociacionliquidacionController::savefile($negId, $nameFile);
        }
        return $nameFile;
    }
	public function actionSubirtablaamortizacion($tpoId){
		$model = new UploadForm();
        $nameFile = 'KO';
        if (Yii::$app->request->isPost) {
            $model->fileToUpload = UploadedFile::getInstance($model, 'fileToUpload');
            $nameFile = "tablaamortizaciontpo/tablaamortizacion_".$tpoId.'_'.date("Ymdhis").'.'.$model->fileToUpload->extension;
            $model->upload('tmp/'.$nameFile);
            
            return PorTituloportafoliotablaamorController::savefile($tpoId, $nameFile);
        }
        return $nameFile;
    }
    public function actionSubirtitulofisico($tpoId){
		$model = new UploadForm();
        $nameFile = 'KO';
        if (Yii::$app->request->isPost) {
            $model->fileToUpload = UploadedFile::getInstance($model, 'fileToUpload');
            $nameFile = "archivofisicotpo/archivofisico_".$tpoId.'_'.date("Ymdhis").'.'.$model->fileToUpload->extension;
            $model->upload('tmp/'.$nameFile);
            
            return PorarchivotitulofisicoController::savefile($tpoId, $nameFile);
        }
        return $nameFile;
    }
    
	
	public function actionSubirflujotv(){
        $model = new UploadForm();
		$nameFile = 'KO';
        if (Yii::$app->request->isPost) {
            $model->fileToUpload = UploadedFile::getInstance($model, 'fileToUpload');
            $nameFile = "flujotv_".date("Ymdhis").'.'.$model->fileToUpload->extension;
            $model->upload('tmp/flujo/'.$nameFile);
        }
        return $nameFile;
    }
	public function actionCargarvectroprecio(){
        $model = new UploadForm();
		$nameFile = 'KO';
        if (Yii::$app->request->isPost) {
            $model->fileToUpload = UploadedFile::getInstance($model, 'fileToUpload');
            $nameFile = "vector_".date("Ymdhis").'.'.$model->fileToUpload->extension;
            $model->upload('tmp/vector/'.$nameFile);
        }
        return $nameFile;
    }
	public function actionProcesarvectorprecio(){
		
		$post = file_get_contents("php://input");
		$data = Json::decode($post, true);
		
		$params = Array();
		$params['strPath'] = Yii::getAlias('@webroot').'/tmp/vector/'.$data["archivo"];
		$params['dtFecha'] = $data["fecha"];
		$client = $this->wsdl();
		$resultado = $client->ProcesarArchivoVectroPrecioBVG($params);
		echo "true";
	}
	private function wsdl() {
        ini_set('max_execution_time', 180);
		ini_set('default_socket_timeout', 180);
        $wsdl = Yii::$app->params['webService']; 
		libxml_disable_entity_loader(false);
        $client = new \SoapClient($wsdl, array('trace' => 1, "connection_timeout" => 180,'cache_wsdl' => WSDL_CACHE_NONE,'version' => SOAP_1_2));

        return $client;
    }
}
