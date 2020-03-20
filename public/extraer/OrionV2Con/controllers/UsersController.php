<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use \yii\db\IntegrityException;
use app\models\UsuarioPortafolioSearch;
use app\models\UsuarioPortafolio;
use \yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
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
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new Users();
            if ($model->load(Yii::$app->request->post())) {
                $model->estadoe = true;
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
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */    
    public function actionUpdate($id)
    {
        if(Yii::$app->request->isAjax){
            $model = $this->findModel($id);
            $clave = $model->password;
            if ($model->load(Yii::$app->request->post())) {
                $model->estadoe = !empty($_POST['mclave']);
                if(empty($_POST['mclave'])){
                    $model->password = $clave;
                }
                if($model->save()){
                    return "Exitoso";
                }else{
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }
            }else{
                $model->password = '';
                return $this->renderPartial('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $model = $this->findModel($data['ids']);
        $mensaje['mensaje'] = "";
        try {
            $model->delete();
            $mensaje['mensaje'] = "Exitoso";
        } catch(IntegrityException $e) {
            $mensaje['mensaje'] = "Error";
        }

        echo Json::encode($mensaje);
        exit;
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionListar(){
        $objUsuSearch = new UsersSearch();
        echo Json::encode($objUsuSearch->listadoUsuarios());
        exit;
    }
    
    private function wsdl(){
        $wsdl = Yii::$app->params['webService'];//
        $client = new \SoapClient($wsdl, array('trace' => 1, "connection_timeout" => 90));
        
        return $client;
    }
    
    public function actionPortausuario($id){
        $client = $this->wsdl();
        $resultado=$client->ObtenerPortafolios();        
        $arrData = Json::decode($resultado->ObtenerPortafoliosResult, true);
        $objAsig = new UsuarioPortafolioSearch;
        $arrAsignados = $objAsig->usuconPortafolio($id);
        $portafolios = [];
        //valor por defecto
        $princ = 0;
        foreach($arrAsignados as $valor){
            if($valor['upa_principal'] == 1){
                $princ = $valor['por_id'];
            }
        }
        if(!empty($arrData) && count($arrData) > 0){
            foreach ($arrData['Table1'] as $value) {
                $this->comparaInf($value, $arrAsignados);
                $portafolios[] = $value;
            }
        } 
        
        foreach ($portafolios as $clave => $fila) {
            $codigo[$clave] = $fila['Codigo'];
        }
        
        //array_multisort($codigo, SORT_ASC, $portafolios);

        return $this->renderPartial('portafolio', [
            'portas' => Json::encode($portafolios, true),
            'ids' => $id,
            'princ' => $princ,
        ]);   
    }
    
    private function comparaInf(&$porta, $arrinfo){
        $porta['reg'] = false;
        $porta['pri'] = false;
        $porta['upa_id'] = 0;
        foreach ($arrinfo as $value) {
            if($porta['IdComitente'] == $value['com_id'] && 
                $porta['IdPortafolio'] == $value['por_id']){
                $porta['reg'] = true;
                $porta['upa_estado'] = $value['upa_estado'];
                $porta['upa_ultima_act'] = $value['upa_ultima_act'];
                $porta['upa_principal'] = $value['upa_principal'];
                $porta['upa_id'] = $value['upa_id'];
                $porta['pri'] = $porta['upa_principal'] == 1;
            }

        }
    }
    
    public function actionAsignar($id, $valor){
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $objAsig = new UsuarioPortafolioSearch;
        $arrAsignados = $objAsig->usuconPortafolio($id);
        $res = [];
        $valor = intval($valor);
        try {
            if(count($arrAsignados) > 0){
                foreach($arrAsignados as $port){
                    if($this->comparar($data, $port)){
                        UsuarioPortafolio::deleteAll('upa_id = :upId', [':upId' => $port['upa_id']]);
                    }
                }
            }
            if(count($data) > 0){
                foreach ($data as $value) {
                    if($value['reg'] == 1 && intval($value['upa_id']) <= 0){                        
                        $usuPorta = new UsuarioPortafolio();
                        $usuPorta->usr_id = $id;
                        $usuPorta->com_id = $value['IdComitente'];
                        $usuPorta->por_id = $value['IdPortafolio'];
                        $usuPorta->upa_estado = 'A';
                        $usuPorta->upa_nombre_comitente = $value['NombreComitente'];
                        $usuPorta->upa_codigo = $value['Codigo'];
                        $usuPorta->save(false);
                    }
                }
            }
            $ousuport = new UsuarioPortafolio();
            $ousuport->actDefecto($valor, $id);
            $res['mensaje'] = "Exitoso";
        } catch (\Exception $exc) {
            $res['mensaje'] = "Error";
        }
        echo Json::encode($res);
        exit;
    }
    
    private function comparar($arrData, $item){
        foreach ($arrData as $value) {
            if($value['reg'] != 1 && intval($value['upa_id']) == intval($item['upa_id'])){
                return true;
            }
        }
        
        return false;
    }
}
