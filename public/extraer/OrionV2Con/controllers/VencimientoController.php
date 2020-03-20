<?php

namespace app\controllers;

use Yii;
use app\models\Vencimiento;
use app\models\VencimientoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use \yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * VencimientoController implements the CRUD actions for Vencimiento model.
 */
class VencimientoController extends Controller
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
     * Lists all Vencimiento models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', []);
    }

    /**
     * Displays a single Vencimiento model.
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
     * Creates a new Vencimiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new Vencimiento();
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
     * Updates an existing Vencimiento model.
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
     * Deletes an existing Vencimiento model.
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
     * Finds the Vencimiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vencimiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vencimiento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionMostrar($filterscount, $pagenum, $pagesize, $recordstartindex, 
            $recordendindex, $sortdatafield = "", $sortorder =""){
        $searchModel = new VencimientoSearch();        

        $params['filterscount'] = $filterscount;
        $params['page'] = $pagenum;
        $params['pagesize'] = $pagesize;
        $params['sortdatafield'] = (empty($sortdatafield))? 'nve_id' : $sortdatafield;
        $params['sortorder'] = (empty($sortorder))? 'asc' : $sortorder;
        $params['allparams'] = $_GET;

        $data[] = [
            'TotalRows' => $searchModel->contarVencimiento($params),
            'Rows' => $searchModel->listarVencimiento($params),
        ];

        return Json::encode($data, true);
    }
}
