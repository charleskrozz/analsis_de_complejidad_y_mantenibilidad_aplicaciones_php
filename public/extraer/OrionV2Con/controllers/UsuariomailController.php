<?php

namespace app\controllers;

use Yii;
use app\models\UsuarioMail;
use app\models\UsuariomailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use \yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * UsuariomailController implements the CRUD actions for UsuarioMail model.
 */
class UsuariomailController extends Controller
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
     * Lists all UsuarioMail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuariomailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionMostrar($idport, $idcom, $iduu){
        if(Yii::$app->request->isAjax){
            $ocorreos = new UsuariomailSearch();
            return Json::encode($ocorreos->listarCorreo($idport, $idcom, $iduu), true);            
        }
    }

    /**
     * Displays a single UsuarioMail model.
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
     * Creates a new UsuarioMail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new UsuarioMail();            
            if ($model->load(Yii::$app->request->post())) {
                if($model->save()){
                    if(intval($model->pue_principal) == 1){
                        $oumail = new UsuarioMail();
                        $oumail->corrDefecto($model->usr_id, $model->pue_id);
                    }
                    return "Exitoso";
                }else{
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }   
            } else {
                $model->por_id = $_POST['idport'];
                $model->com_id = $_POST['idcom'];
                $model->usr_id = $_POST['iduu'];
                return $this->renderPartial('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing UsuarioMail model.
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
                    if(intval($model->pue_principal) == 1){
                        $oumail = new UsuarioMail();
                        $oumail->corrDefecto($model->usr_id, $model->pue_id);
                    }
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
     * Deletes an existing UsuarioMail model.
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
     * Finds the UsuarioMail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UsuarioMail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UsuarioMail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
