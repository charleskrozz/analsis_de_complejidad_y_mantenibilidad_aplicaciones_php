<?php

namespace app\controllers;

use Yii;
use app\models\PorPortafolio;
use app\models\PorPortafolioSearch;
use app\models\PorCodigosAutogenerados;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use \yii\helpers\Json;

/**
 * PorportafolioController implements the CRUD actions for PorPortafolio model.
 */
class PorportafolioController extends Controller
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
     * Lists all PorPortafolio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PorPortafolioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PorPortafolio model.
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
     * Creates a new PorPortafolio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new PorPortafolio();
            if ($model->load(Yii::$app->request->post())) {
				$model->por_fecha_creacion = date('d-m-Y H:i:s');	
				$model->por_fecha_actualizacion = date('d-m-Y H:i:s');
                if($model->save()){
					$model1 = PorCodigosAutogenerados::find()->where(['cau_codigo' => 'SEC_001'])->one();
					$model1->cau_valor = $model1->cau_valor + $model1->cau_incremento;
					$model1->save();
                    return "Exitoso";
                }else{
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }
            } else {
				$model1 = PorCodigosAutogenerados::find()->where(['cau_codigo' => 'SEC_001'])->one();
				$porCodigo = $model1->cau_prefijo.$model1->cau_valor;
				
                return $this->renderPartial('create', [
                    'model' => $model,
					'codigo' => $porCodigo
                ]);
            }
        }
    }

    /**
     * Updates an existing PorPortafolio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->request->isAjax){
          $model = $this->findModel($id);
          if ($model->load(Yii::$app->request->post())) {
				$model->por_fecha_actualizacion = date('d-m-Y H:i:s');
              if($model->save()){
                  return "Exitoso";
              }else{
                  Yii::$app->response->format = trim(Response::FORMAT_JSON);
                  return ActiveForm::validate($model);
              }
          }else{
              return $this->renderPartial('update', [
                  'model' => $model,
				  'codigo' => $model->por_codigo
              ]);
          }
      }
    }

    /**
     * Deletes an existing PorPortafolio model.
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
     * Finds the PorPortafolio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorPortafolio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorPortafolio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public function actionMostrar(){
        $searchModel = new PorPortafolioSearch();
        $porPortafolio = $searchModel->mostrarListado();
        echo Json::encode($porPortafolio);
        exit;
    }
}
