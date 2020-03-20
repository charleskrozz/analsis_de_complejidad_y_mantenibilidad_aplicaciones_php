<?php

namespace app\controllers;

use Yii;
use app\models\Sesion;
use app\models\SesionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;

/**
 * SesionController implements the CRUD actions for Sesion model.
 */
class SesionController extends Controller
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
     * Lists all Sesion models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', []);
    }

    /**
     * Displays a single Sesion model.
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
     * Creates a new Sesion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sesion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ses_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sesion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ses_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sesion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sesion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sesion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sesion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionMostrar($filterscount, $pagenum, $pagesize, $recordstartindex, 
            $recordendindex, $sortdatafield = "", $sortorder ="", $finicio, $ffin){
        $searchModel = new SesionSearch();        

        $params['finicio'] = $finicio;
        $params['filterscount'] = $filterscount;
        $params['page'] = $pagenum;
        $params['pagesize'] = $pagesize;
        $params['finicio'] = $finicio;
        $params['ffin'] = $ffin;
        $params['sortdatafield'] = (empty($sortdatafield))? 'ses_id' : $sortdatafield;
        $params['sortorder'] = (empty($sortorder))? 'asc' : $sortorder;
        $params['allparams'] = $_GET;

        $data[] = [
            'TotalRows' => $searchModel->contarIngreso($params),
            'Rows' => $searchModel->listarIngreso($params),
            'metad' => $_GET
        ];

        return Json::encode($data, true);
    }
}
