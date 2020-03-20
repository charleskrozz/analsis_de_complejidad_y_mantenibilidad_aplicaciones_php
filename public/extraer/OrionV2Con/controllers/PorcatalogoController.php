<?php

namespace app\controllers;

use Yii;
use app\models\PorCatalogo;
use app\models\PorCatalogoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use app\models\MenuSearch;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use app\models\PorItemCatalogoSearch;
use app\models\PorItemCatalogo;
/**
 * PorcatalogoController implements the CRUD actions for PorCatalogo model.
 */
class PorcatalogoController extends Controller
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
     * Lists all PorCatalogo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PorCatalogoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PorCatalogo model.
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
     * Creates a new PorCatalogo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new PorCatalogo();
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
     * Updates an existing PorCatalogo model.
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
     * Deletes an existing PorCatalogo model.
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
     * Finds the PorCatalogo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorCatalogo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorCatalogo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionMostrar(){
        $searchModel = new PorCatalogoSearch();
        $porCatalo = $searchModel->mostrarListado();
        echo Json::encode($porCatalo);
        exit;
    }
    public function actionMastrarItems(){
      $searchModel = new PorItemCatalogoSearch();
      $porItemCatalogo = $searchModel->mostrarListadoItem();
      echo Json::encode($porItemCatalogo);
      exit;
    }
    public function actionObtenerEstado()
    {
      $searchModel = new PorCatalogoSearch();
      $estado= $searchModel->obtenerEstado();
      echo Json::encode($estado);
      exit;
    }
	public function actionItemcatalogo($id){
        $objAsig = new PorItemCatalogoSearch;
        $arrItemsCat = $objAsig->getItemsCatalogById($id);

        //array_multisort($codigo, SORT_ASC, $portafolios);

        return $this->renderPartial('itemscatalogo', [
            'items' => Json::encode($arrItemsCat, true),
            'ids' => $id,
        ]);
    }
	 public function actionMostraritems($id){
        $objAsig = new PorItemCatalogoSearch;
        $arrItemsCat = $objAsig->getItemsCatalogById($id);
        echo Json::encode($arrItemsCat,true);
        exit;
    }

}
