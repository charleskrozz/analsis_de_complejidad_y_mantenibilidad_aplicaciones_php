<?php

namespace app\controllers;

use Yii;
use app\models\Perfil;
use app\models\PerfilSearch;
use app\models\MenuPerfilSearch;
use app\models\MenuPerfil;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use app\models\MenuSearch;
use \yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * PerfilController implements the CRUD actions for Perfil model.
 */
class PerfilController extends Controller
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
        $searchModel = new PerfilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perfil model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $objMen = new MenuSearch();
        
        return $this->renderPartial('view', [
            'model' => $this->findModel($id),
            'menus' => Json::encode($objMen->menusActivos($id)),
            'ids' => $id,
        ]);
    }

    public function actionAsignar($id){
        $objMenPer = new MenuPerfilSearch();
        $menus = $objMenPer->menusAsignados($id);
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $res = array();
        try {
            if(count($menus) > 0){
                foreach ($menus as $value) {
                    if(!$this->comparar($data, $value['men_id'])){
                        MenuPerfil::deleteAll('men_id = :menId and per_id = :perId', [':menId' => $value['men_id'], ':perId' => $id]);
                    }
                }
            }        
            if(count($data) > 0){
                foreach ($data as $value) {
                    $menPerfil = $this->retMenus($menus, $value['men_id']);
                    $menPerfil->men_id = $value['men_id'];
                    $menPerfil->per_id = $id;
                    $menPerfil->men_per_estado = 1;

                    $menPerfil->men_per_consulta = $value['consulta'];
                    $menPerfil->men_per_actualizar = $value['actualizacion'];
                    $menPerfil->men_per_crear = $value['creacion'];
                    $menPerfil->men_per_borrar = $value['eliminar'];
                    $menPerfil->save(false);
                   // }
                }
            }
            $res['mensaje'] = "Exitoso";
        } catch (Exception $exc) {
            $res['mensaje'] = "Error";
        }
        echo Json::encode($res);
        exit;
    }
    
    private function comparar($arrVal, $valor){
        foreach ($arrVal as $value) {
            if(intval($value['men_id']) == intval($valor)){
                return true;
            }
        }
        
        return false;
    }

    private function retMenus($arrVal, $valor){
        foreach ($arrVal as $value) {
            if(intval($value['men_id']) == intval($valor)){
                return MenuPerfil::findOne($value['per_men_id']);
            }
        }
        
        return new MenuPerfil();
    }


    /**
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new Perfil();            
            if ($model->load(Yii::$app->request->post())) {
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
     * Updates an existing Perfil model.
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
                ]);
            }
        }
    }

    /**
     * Deletes an existing Perfil model.
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
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Perfil::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionMostrar(){
        $searchModel = new PerfilSearch();
        $perfiles = $searchModel->mostrarListado();
        echo Json::encode($perfiles);
        exit;
    }
    
}
