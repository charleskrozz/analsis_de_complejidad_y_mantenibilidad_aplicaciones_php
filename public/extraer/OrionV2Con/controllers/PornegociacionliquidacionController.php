<?php

namespace app\controllers;

use app\models\PorNegociacionLiquidacion;
use yii\filters\VerbFilter;
use yii\web\Controller;

class PornegociacionliquidacionController extends Controller {
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
    
    public static function savefile($negId,$nameFile)
    {
        $modelTabla = new PorNegociacionLiquidacion();
        $modelTabla->neg_id = $negId;
        $modelTabla->pnl_path = $nameFile; 
        $modelTabla->pnl_fecha = date("d-m-Y");
        $modelTabla->pnl_estado = 'A';
        if($modelTabla->save()){                    
            return "success";
        }else{   
            return "error";
        }
    }
    

}