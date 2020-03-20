<?php

namespace app\controllers;

use Yii;
use app\models\PorTituloPortafolioTablaAmor;
use app\models\PorTituloPortafolioTablaAmorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PorTituloportafoliotablaamorController implements the CRUD actions for PorTituloPortafolioTablaAmor model.
 */
class PorTituloportafoliotablaamorController extends Controller
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
     * Lists all PorTituloPortafolioTablaAmor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PorTituloPortafolioTablaAmorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PorTituloPortafolioTablaAmor model.
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
     * Creates a new PorTituloPortafolioTablaAmor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PorTituloPortafolioTablaAmor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tpt_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PorTituloPortafolioTablaAmor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tpt_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PorTituloPortafolioTablaAmor model.
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
     * Finds the PorTituloPortafolioTablaAmor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorTituloPortafolioTablaAmor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorTituloPortafolioTablaAmor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public static function savefile($tpoId,$nameFile)
    {
        $modelTabla = new PorTituloPortafolioTablaAmor();
        $modelTabla->tpo_id = $tpoId;
        $modelTabla->tpt_path = $nameFile; 
        $modelTabla->tpt_fecha = date("d-m-Y");
        $modelTabla->tpt_estado = 'A';
        if($modelTabla->save()){                    
            return "success";
        }else{   
            return "error";
        }
    }
}
