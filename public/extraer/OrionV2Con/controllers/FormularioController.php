<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Json;
use yii\base\InvalidParamException;

class FormularioController extends Controller {

    public function actionListar() {
        return $this->render('lista318', ['btnEnableAdmin'=> $this->isEnableEdit()]);
    }
    
    public function actionListar1() {
        return $this->render('lista1318', ['btnEnableAdmin'=> $this->isEnableEdit()]);
    }
    
    public function actionListadof318() {
        $client = $this->wsdl();
        $params = [];
        //$params['intPortafolioId'] = 128;
        $session = Yii::$app->session;
        $params['intPortafolioId'] = $session->get('PortafolioId');
        try {
            
            $resultado = $client->ObtenerListadoFormulario318($params);
            $resul = $resultado->ObtenerListadoFormulario318Result;
            return empty($resul)? "[]" : $resul;
        } catch (\SoapFault $fault) {
            $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
            return "[]";
        }
    }
    
    public function actionListado() {
        $client = $this->wsdl();
        $params = [];
        //$params['intPortafolioId'] = 128;
        $session = Yii::$app->session;
        $params['intPortafolioId'] = $session->get('PortafolioId');
        try {
            $resultado = $client->ObtenerListadoFormulario318A($params);
            $resul = $resultado->ObtenerListadoFormulario318AResult;
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
    
    public function actionFormulario(){
        if(Yii::$app->request->isAjax){
            $post = file_get_contents("php://input");
            $data = Json::decode($post, true);
            $session = Yii::$app->session;
            $PortafolioId = $session->get('PortafolioId');
            //$PortafolioId = 128;        
            $idFormulario = $data['ids'];
            $client = $this->wsdl();
            $params = [];
            $params['intFormularioId'] = $idFormulario;
            $params['intPortfolioId'] = $PortafolioId;
            $params['dtFecha'] = $data['fecha'];
            try {
                $resultado = $client->ObtenerFormulario318A($params);
                return $resultado->ObtenerFormulario318AResult;
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
                return "[]";
            }
        }
    }
    
    public function actionFormulariorepf318(){
        if(Yii::$app->request->isAjax){
            $post = file_get_contents("php://input");
            $data = Json::decode($post, true);
            $session = Yii::$app->session;
            $PortafolioId = $session->get('PortafolioId');
            //$PortafolioId = 128;        
            $idFormulario = $data['ids'];
            $client = $this->wsdl();
            $params = [];
            $params['intFormularioId'] = $idFormulario;
            $params['intPortfolioId'] = $PortafolioId;
            $params['dtFecha'] = $data['fecha'];
            try {
                $resultado = $client->ObtenerFormulario318($params);
                return $resultado->ObtenerFormulario318Result;
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
                return "[]";
            }
        }
    }
    
    public function actionFormulario318(){
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
                    $fech = explode("-", $data['rep_fecha_corte']);
                    //$params['intPortafolioId'] = 128;
                    $session = Yii::$app->session;
                    $params['intPortafolioId'] = $session->get('PortafolioId');
                    $params['intMes'] = $fech[1];
                    $params['intAnio'] = $fech[0];
                    //print_r($params);exit;
                    $resultado = $client->CrearFormulario318A($params);
                    $res['res'] = $resultado->CrearFormulario318AResult;
                    if(intval($res['res']) > 0){
                        $info['intPortafolioId'] = $params['intPortafolioId'];
                        $reslista = $client->ObtenerListadoFormulario318A($info);
                        $res['resul'] = $reslista->ObtenerListadoFormulario318AResult;
                    }
                }elseif($data['tipo'] == 'remove'){
                    $params['intFormularioId'] = $data['ids'];
                    $resultado = $client->EliminarFormulario318A($params);
                    $res['res'] = $resultado->EliminarFormulario318AResult;
                }                
                return Json::encode($res, true);
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
                $res['res'] = -1;
                return Json::encode($res, true);
            }            
        }
    }
    
    public function actionFormulariof318(){
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
                    $fech = explode("-", $data['rto_fecha_corte']);
                    //$params['intPortafolioId'] = 128;
                    $session = Yii::$app->session;
                    $params['intPortafolioId'] = $session->get('PortafolioId');
                    $params['intMes'] = $fech[1];
                    $params['intAnio'] = $fech[0];
                    $resultado = $client->CrearFormulario318($params);
                    $res['res'] = $resultado->CrearFormulario318Result;
                    if(intval($res['res']) > 0){
                        $info['intPortafolioId'] = $params['intPortafolioId'];
                        $reslista = $client->ObtenerListadoFormulario318($info);
                        $res['resul'] = $reslista->ObtenerListadoFormulario318Result;
                    }
                }elseif($data['tipo'] == 'remove'){
                    $params['intFormularioId'] = $data['ids'];
                    $resultado = $client->EliminarFormulario318($params);
                    $res['res'] = $resultado->EliminarFormulario318Result;
                }                
                return Json::encode($res, true);
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
                $res['res'] = -1;
                return Json::encode($res, true);
            }            
        }
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
            $infocom = [];
            $vals = ["rpd_id", "rpd_tipo_titulo", "rpd_numero", "rpd_emisor", "rpd_nacionalidad", "rpd_custodio", "rpd_calificadora", "rpd_clase",
                "rpd_fecha_calificacion", "rpd_fecha_compra", "rpd_fecha_emision", "rpd_feha_vencimiento", "rpd_plazo", "rpd_renovacion",
                "rpd_nueva_adquisicion", "rpd_tasa_nominal", "rpd_tasa_fectiva", "rpd_moneda", "rpd_valor_nominal", "rpd_valor_compra",
                "rpd_libros", "rpd_cotizacion", "rpd_fecha_cotizacion", "rpd_referecnia", "rpd_common", "rpd_isin", "rpd_bbnumber",
                "rpd_cusip", "rpd_sedol", "rpd_fuent_cot_val_mercado", "rpd_tasa_interes", "rpd_estado_titulo", "rpd_provision_constitutiva",
                "rpd_intension_hv", "rpd_intension_dpv", "rpd_contabilizar_avalor", "rpd_contabilizar_costoamor","rpd_actualiza", "rep_id", "grp_id",
                "grp_codigo", "TipoCrud"];
            $arrbool = ['rpd_renovacion', 'rpd_nueva_adquisicion', 'rpd_intension_hv', 'rpd_intension_dpv', 'rpd_contabilizar_avalor', 'rpd_contabilizar_costoamor'];            
            $arrnumb = ['rpd_plazo', 'rpd_tasa_nominal', 'rpd_tasa_fectiva', 'rpd_valor_nominal', 'rpd_valor_compra', 'rpd_libros', 'rpd_cotizacion',
                'rpd_tasa_interes', 'rpd_provision_constitutiva'];
            $arrdate = ['rpd_fecha_calificacion', 'rpd_fecha_compra', 'rpd_fecha_emision', 'rpd_feha_vencimiento', 'rpd_fecha_cotizacion'];
			
			$bolUpdate=false;
			if($data["TipoCrud"]=='U')
				$bolUpdate = true;
            foreach($vals as $index){
                $value = "";
				if($bolUpdate && !isset($data[$index])){
					continue;
				}else{
					if(empty($data[$index])){
						if(in_array($index, $arrbool) || in_array($index, $arrnumb)){
							if($index=='rpd_tasa_interes')
								$value=null;
							else
								$value = 0;
						}
					}else{
						$value = $data[$index];
						if(in_array($index, $arrbool)){
							if($value == "X"){
								$value = 1;
							}else{
								$value = 0;
							}
						}else{
							if(in_array($index, $arrnumb)){
									if($index=='rpd_tasa_interes' && ($data[$index]=='' || $data[$index] == null))
										$value=null;
									else
										$value=floatval($data[$index]);
							}
						}                 
					}
					$infocom[$index] = $value;
				}
            }
            $params['intFormulrioId'] = $data['rep_id'];
            $params['strJson'] = "[".Json::encode($infocom)."]";
            //echo $params['strJson'];exit;
            try {
                $resultado = $client->ActualizarFormulario318A($params);
                $resp = $resultado->ActualizarFormulario318AResult;
                $res = [];
                $res['idpar'] = $data['parent_id'];
                if($data['TipoCrud'] == 'I'){
                    $res['res'] = $resp;                    
                }else{
                    $res['res'] = "Exitoso";
                }
                return Json::encode($res, true);
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
                return $error;//"[]";
            }
        }
    }
    
    public function actionTerminarf318(){
        if(Yii::$app->request->isAjax){
            $data = [];
            try {
                $post = file_get_contents("php://input");
                $data = Json::decode($post, true);
            } catch (InvalidParamException $exc) {
                $data= Yii::$app->request->post();
            }
            if(!empty($data['editar'])){
                $data['TipoCrud'] = $data['editar'];
            }
            $client = $this->wsdl();
            $params = [];
            $infocom = [];
            //$vals = ["rtd_id", "fgp_id", "rto_id", "rtd_capital", "rtd_incremento_capital", "rtd_editable", "TipoCrud"];
            $vals = ["rtd_id", "rto_id","fgp_nombre","fgp_padre", "rtd_capital", "rtd_incremento_capital", "rtd_editable", "TipoCrud"];
            $arrnumb = ['rtd_capital', 'rtd_incremento_capital', 'fgp_id', 'rto_id', 'rtd_id'];
            $arrbool = ['rtd_editable'];
			
			$bolUpdate=false;
			if($data["TipoCrud"]=='U')
				$bolUpdate = true;
			
            foreach($vals as $index){
				if($bolUpdate && !isset($data[$index])){
					continue;
				}else{
					$value = $data[$index];
					if(empty($value) && in_array($index, $arrnumb)){
						$value = 0;
					}elseif(in_array($index, $arrnumb)){                    
						$value = floatval($data[$index]);                                  
					}elseif(in_array($index, $arrbool)){                    
						$value = strtolower($data[$index]) == 'true';                                  
					}
					$infocom[$index] = $value;
				}
            }
            if($data['TipoCrud'] == 'I'){
                unset($infocom['rtd_id']);
            }
            $params['intFormulrioId'] = $data['rto_id'];
            $params['strJson'] = "[".Json::encode($infocom)."]";
            //echo $params['strJson'];exit;
            try {
                $resultado = $client->ActualizarFormulario318($params);
                $resp = $resultado->ActualizarFormulario318Result;
                $res = [];
                $res['idpar'] = $data['parent_id'];
                if($data['TipoCrud'] == 'I'){
                    $res['res'] = $resp;                    
                }else{
                    $res['res'] = "Exitoso";
                }
                return Json::encode($res, true);
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
                return "[]";
            }
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
