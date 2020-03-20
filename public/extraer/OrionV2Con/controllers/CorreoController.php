<?php

namespace app\controllers;

use Yii;
use app\models\Correo;
use app\models\CorreoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use \yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * CorreoController implements the CRUD actions for Correo model.
 */
class CorreoController extends Controller
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
    
    public function actionMostrar($ids){
        if(Yii::$app->request->isAjax){
            $ocorreos = new CorreoSearch();
            return Json::encode($ocorreos->listarCorreo($ids), true);            
        }
    }

    /**
     * Lists all Correo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CorreoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Correo model.
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
     * Creates a new Correo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new Correo();            
            if ($model->load(Yii::$app->request->post())) {
                if($model->save()){
                    return "Exitoso";
                }else{
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }   
            } else {
                $model->id = $_POST['ids'];
                return $this->renderPartial('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing Correo model.
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
     * Deletes an existing Correo model.
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
     * Finds the Correo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Correo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Correo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
