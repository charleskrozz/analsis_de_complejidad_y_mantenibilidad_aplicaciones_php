<?php

namespace app\controllers;

use app\models\PorTituloTablaAmort;
use yii\filters\VerbFilter;
use yii\web\Controller;

class PortitulotablaamortizacionController extends Controller {
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
    
    public static function savefile($tpoId,$nameFile)
    {
        $modelTabla = new PorTituloTablaAmort();
        $modelTabla->TpoId = $tpoId;
        $modelTabla->pta_path = $nameFile; 
        $modelTabla->pta_fecha = date("d-m-Y");
        $modelTabla->pta_estado = 'A';
        if($modelTabla->save()){                    
            return "success";
        }else{   
            return "error";
        }
    }
    

}