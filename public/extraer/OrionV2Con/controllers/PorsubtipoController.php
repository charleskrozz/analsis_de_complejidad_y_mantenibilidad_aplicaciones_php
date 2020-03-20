<?php

namespace app\controllers;

use Yii;
use app\models\PorSubtipo;
use app\models\PorSubtipoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use \yii\helpers\Json;

/**
 * PorSubtipoController implements the CRUD actions for PorSubtipo model.
 */
class PorsubtipoController extends Controller
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
     * Lists all PorSubtipo models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', []);
    }

    /**
     * Displays a single PorSubtipo model.
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
     * Creates a new PorSubtipo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new PorSubtipo();
            if ($model->load(Yii::$app->request->post())) {
              $model->sbt_fecha_creacion = date('d-m-Y H:i:s');
              $model->sbt_fecha_actualizacion = date('d-m-Y H:i:s');
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
     * Updates an existing PorSubtipo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->isAjax){
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post())) {
                $model->sbt_fecha_actualizacion = date('d-m-Y H:i:s');
                if($model->save()){
                    return "Exitoso";
                }else{
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }
            }else{
                return $this->renderPartial('update', [
                    'model' => $model,
                    'codigo' => $model->sbt_codigo
                ]);
            }
        }
    }

    /**
     * Deletes an existing PorSubtipo model.
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
                $mensaje['mensaje'] = "Exitoso";
            } catch (\Exception $e) {
                $mensaje['mensaje'] = "Error";
            }
            return Json::encode($mensaje, true);
        }
    }

    /**
     * Finds the PorSubtipo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorSubtipo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorSubtipo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionMostrar(){
        $searchModel = new PorSubtipoSearch();

        $porSubtipo = $searchModel->mostrarListado();
        echo Json::encode($porSubtipo);
        exit;
    }
}
