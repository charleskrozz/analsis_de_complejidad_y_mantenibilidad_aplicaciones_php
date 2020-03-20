<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\base\InvalidParamException;
use \yii\helpers\Json;

class ForminvController extends Controller {    
    private $MESES = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
    
    public function actionListar() {
        return $this->render('lista', ['btnEnableAdmin'=> $this->isEnableEdit()]);
    }
	public function actionSimulador() {
        return $this->render('simulador', []);
    }
    public function actionFormulariosim(){
		if(Yii::$app->request->isAjax){
            $post = file_get_contents("php://input");
            $data = Json::decode($post, true);     
            //$fecha = $data['fecha'];
            $client = $this->wsdl();
            $params = [];
            //$params['dtFecha'] = $fecha;
            try {
                $resultado = $client->ObtenerInformaionSimuladorIO();
                return $resultado->ObtenerInformaionSimuladorIOResult;
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
                return "[]";
            }
        }
	}
    public function actionFormulario(){
        if(Yii::$app->request->isAjax){
            $post = file_get_contents("php://input");
            $data = Json::decode($post, true);     
            $idFormulario = $data['ids'];
            $client = $this->wsdl();
            $params = [];
            $params['intFormularioId'] = $idFormulario;
            try {
                $resultado = $client->ObtenerDetalleFormularioInvOblGrupo($params);
                return $resultado->ObtenerDetalleFormularioInvOblGrupoResult;
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
                return "[]";
            }
        }
    }
    public function actionDatosinvact(){
		if(Yii::$app->request->isAjax){
            $post = file_get_contents("php://input");
            $data = Json::decode($post, true);     
            $fecha = $data['fecha'];
            $client = $this->wsdl();
            $params = [];
			
			$session = Yii::$app->session;
			$PortafolioId = $session->get('PortafolioId');
			
            $params['dtTime'] = $fecha;
			$params['intPorId'] = $PortafolioId;
            try {
                $resultado = $client->ObtenerInfoFormularioInvOblPorFecha($params);
                return $resultado->ObtenerInfoFormularioInvOblPorFechaResult;
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
                return "[]";
            }
        }
	}
    public function actionFormularioinv(){
        if(Yii::$app->request->isAjax){
            $data = [];
            try {
                $post = file_get_contents("php://input");
                $data = Json::decode($post, true);
            } catch (InvalidParamException $exc) {
                $data= Yii::$app->request->post();
            }            
            try {
                $res = [];
                $client = $this->wsdl();
                if($data['tipo'] == 'nuevo'){
                    $fech = explode("-", $data['fio_fecha_corte']);
                    //$params['intPortafolioId'] = 128;
                    $session = Yii::$app->session;
                    $params['intPortafolioId'] = $session->get('PortafolioId');
                    $params['intMes'] = $fech[1];
                    $params['intAnio'] = $fech[0];
                    //print_r($params);exit;
                    $resultado = $client->CrearFormularioInversionesObligatorias($params);
                    $res['res'] = $resultado->CrearFormularioInversionesObligatoriasResult;
                    if(intval($res['res']) > 0){
                        $info['intPortafolioId'] = $params['intPortafolioId'];
                        $reslista = $client->ObtenerListaFormularioInvObligatorias($info);
                        $res['resul'] = $reslista->ObtenerListaFormularioInvObligatoriasResult;
                    }
                }else{
					if($data['tipo'] == 'remove'){
						$params['intFormularioId'] = $data['ids'];
						$resultado = $client->EliminarFormularioInversionesObl($params);
						$res['res'] = $resultado->EliminarFormularioInversionesOblResult;
					}else{
						if($data['tipo'] == 'update'){
							$params['intFioId'] = $data['ids'];
							$session = Yii::$app->session;
							$params['intPortfolioId'] = $session->get('PortafolioId');
							
							$resultado = $client->ActualizarInversionesObligatorias($params);
							$res['res'] = $resultado->ActualizarInversionesObligatoriasResult;
						}
					}
				}               
                return Json::encode($res, true);
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
                $res['res'] = -1;
                return Json::encode($res, true);
            }            
        }
    }
    
    public function actionListado() {
        $client = $this->wsdl();
        $params = [];
        //$params['intPortafolioId'] = 128;
        $session = Yii::$app->session;
        $params['intPortafolioId'] = $session->get('PortafolioId');
        try {
            $resultado = $client->ObtenerListaFormularioInvObligatorias($params);
            $resul = $resultado->ObtenerListaFormularioInvObligatoriasResult;
            return empty($resul)? "[]" : $resul;
        } catch (\SoapFault $fault) {
            $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
            return "[]";
        }
    }
    
    private function wsdl() {
        ini_set('max_execution_time', 180);
        $wsdl = Yii::$app->params['webService']; //
        $client = new \SoapClient($wsdl, array('trace' => 1, "connection_timeout" => 180,'cache_wsdl' => WSDL_CACHE_NONE));

        return $client;
    }
    
    public function actionTerminar(){
        if(Yii::$app->request->isAjax){
            $data = [];
            try {
                $post = file_get_contents("php://input");
                $data = Json::decode($post, true);
            } catch (InvalidParamException $exc) {
                $data= Yii::$app->request->post();
            }
            $client = $this->wsdl();
            $params = [];
            if($data['tipo'] === "grupo"){
                $params['intFormularioId'] = $data['fio_id'];
                $params['intDigId'] = $data['dig_id'];
                $params['fltCapitalpagado'] = $data['dig_capital_pagado'];
                $params['fltIncrementoCapital'] = $data['dig_incremento_capital'];
            }elseif($data['tipo'] === "cupo"){
                $params['intFormularioId'] = $data['fio_id'];
                $params['intIogId'] = $data['iog_id'];
                $params['fltValor'] = $data['iog_valor'];
            }
            try {
                if($data['tipo'] === "grupo"){
                    $resultado = $client->ActualizarFormularioInvOblGrupo($params);
                    $resp = $resultado->ActualizarFormularioInvOblGrupoResult;
                }elseif($data['tipo'] === "cupo"){
                    $resultado = $client->ActualizarFormularioInvOblCupo($params);
                    $resp = $resultado->ActualizarFormularioInvOblCupoResult;
                }
                $res = intval(['res']) > 0? "Exitoso" : "Error";
                return Json::encode($res, true);
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
                return "[]";
            }
        }
    }
    
    public function actionExportar($fech){
        if(Yii::$app->request->isAjax){
            $data = [];
            $plantilla= 'plantilla/Inversiones.xlsx';
            $nombreExcel = 'tmp/Inversiones.xlsx';
			$inputFileType = \PHPExcel_IOFactory::identify($plantilla);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objReader->setIncludeCharts(TRUE);
            $fileExcel = $objReader->load($plantilla);
            $sheetData = $fileExcel->getActiveSheet();
            
            try {
                $data = file_get_contents("php://input");
            } catch (InvalidParamException $exc) {
                $data= Yii::$app->request->post();
            } 
            $session = Yii::$app->session; 
            $comitente = $session->get('NombreComitente');
            $sheetData->setCellValueByColumnAndRow(0, 2, $comitente);
            $arrinfo = Json::decode($data, true);
			
            $i = 8;
            $fech1 = explode("-", $fech);
            $str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
            $sheetData->setCellValueByColumnAndRow(0, 4, $str1); 
            //grupo
            if (count($arrinfo['grupo']) > 2) {
                $sheetData->insertNewRowBefore($i + 1, count($arrinfo['grupo']) - 2);
            }
            foreach ($arrinfo['grupo'] as $value) {
                $sheetData->setCellValueByColumnAndRow(0, $i, $value['des']);
                $sheetData->setCellValueByColumnAndRow(1, $i, $value['cap']);
                $sheetData->setCellValueByColumnAndRow(2, $i, $value['inc']);
                $formula = (floatval($value['lim']) > 0 )? "=IF(B$i+C$i>=".$value['lim'].",(B$i+C$i)*".$value['por'].",(B$i+C$i))" : 
                    "=(B$i+C$i)*".floatval($value['por']);
                $sheetData->setCellValueByColumnAndRow(3, $i, $formula);                
                $i++;
            }
            $sheetData->setCellValueByColumnAndRow(1, $i, "=SUM(B8:B".($i - 1).")");
            $sheetData->setCellValueByColumnAndRow(2, $i, "=SUM(C8:C".($i - 1).")");
            $sheetData->setCellValueByColumnAndRow(3, $i, "=SUM(D8:D".($i - 1).")");
            //cupo
            $com = $j = $i + 3;
            if (count($arrinfo['cupo']) > 2) {
                $sheetData->insertNewRowBefore($com + 1, count($arrinfo['cupo']) - 2);
            }
            foreach ($arrinfo['cupo'] as $value) {
                $sheetData->setCellValueByColumnAndRow(0, $j, $value['des']);
                $sheetData->setCellValueByColumnAndRow(1, $j, floatval($value['por']));               
                $j++;
            }
            $ini = $k = $j + 4;
            if (count($arrinfo['cupo']) > 2) {
                $sheetData->insertNewRowBefore($ini + 1, count($arrinfo['cupo']) - 3);
            }
            foreach ($arrinfo['cupo'] as $value) {
				$sheetData->setCellValueByColumnAndRow(0, $k, $value['des']);//PROPER
                //$sheetData->setCellValueByColumnAndRow(0, $k, ucfirst(strtolower($value['des'])) );//PROPER
				if($value['cod']!='IVOBL_5')
					$sheetData->setCellValueByColumnAndRow(1, $k, "=+\$D\$".$i."*B".$com);
				else
					$sheetData->setCellValueByColumnAndRow(1, $k, "=".$value['PatrimonioAnt']."*B".$com);
                $sheetData->setCellValueByColumnAndRow(2, $k, $value['val']);
				$sheetData->setCellValueByColumnAndRow(3, $k, $value['inc']);
				$sheetData->setCellValueByColumnAndRow(4, $k, "=+C$k-D$k");
                $sheetData->setCellValueByColumnAndRow(5, $k, "=+B$k-D$k");
				$sheetData->setCellValueByColumnAndRow(5, $k, "=IF(B$k>0,(B$k-D$k),(B$k-C$k))");
                $k++;
                $com++;
            }            
            
            //$sheetData->getStyle("A$ini:D".($k - 1))->getFont()->setSize(8);
        
            $dataSeriesLabels = array(
                new \PHPExcel_Chart_DataSeriesValues('String', "'INVERSIONES'!".'$B$'.($ini - 1), NULL, 1),
                new \PHPExcel_Chart_DataSeriesValues('String', "'INVERSIONES'!".'$D$'.($ini - 1), NULL, 1)
            );
        
            $xAxisTickValues = array(
                new \PHPExcel_Chart_DataSeriesValues('String', "'INVERSIONES'!".'$A$'.$ini.':$A$'.($k - 1), null, $ini - $k)
            );

            $dataSeriesValues = array(
                new \PHPExcel_Chart_DataSeriesValues('Number', "'INVERSIONES'!".'$B$'.$ini.':$B$'.($k - 1), NULL, $ini - $k),
                new \PHPExcel_Chart_DataSeriesValues('Number', "'INVERSIONES'!".'$D$'.$ini.':$D$'.($k - 1), NULL, $ini - $k)
            );

            $series = new \PHPExcel_Chart_DataSeries(
                \PHPExcel_Chart_DataSeries::TYPE_BARCHART,
                \PHPExcel_Chart_DataSeries::GROUPING_STANDARD,
                range(0, count($dataSeriesValues)-1),
                $dataSeriesLabels,
                $xAxisTickValues,
                $dataSeriesValues
            );
        
            $plotArea = new \PHPExcel_Chart_PlotArea(NULL, array($series));
            $legend = new \PHPExcel_Chart_Legend(\PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);

            $title = new \PHPExcel_Chart_Title('INVERSIONES OBLIGATORIAS');

            $chart = new \PHPExcel_Chart(
                'chart1',
                $title,
                $legend,
                $plotArea,
                true,
                0,
                NULL,
                null
            );
            $chart->setTopLeftPosition('A46');
            $chart->setBottomRightPosition('E86'); 
            $sheetData->addChart($chart);
            $objWriter = \PHPExcel_IOFactory::createWriter($fileExcel, $inputFileType);        
            $objWriter->setIncludeCharts(TRUE);
            $objWriter->save($nombreExcel);
            return $nombreExcel;
        }
    }
	public function isEnableEdit(){
        try{
            $rest = Yii::$app->session->get('buttons_rm');
            foreach($rest as $item)
            {
                if($item['men_path'] == "#BTN_EDITARG")
                {
                    return 1;
                }
            }
        }catch (\Exception $error) {
            return 0;
        }
        return 0;
    }
}