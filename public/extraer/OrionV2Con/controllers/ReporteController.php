<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use app\controllers\SiteController;
use app\models\SesionSearch;
use \app\models\ParametroSearch;
use app\models\PorConfiguracionSearch;
use app\models\PorRentaVariable;
use PHPExcel_Style_Border;
use PHPExcel_Style_Alignment;
use PHPExcel_Style_NumberFormat;
use PHPExcel_Style_Fill;
use PHPExcel_Shared_Date;
use PHPExcel_Shared_Font;

class ReporteController extends Controller {

    private $FORMAT_DATE1 = '[$-C0A]d\-mmm\-yy;@';
	private $FORMAT_DECIMAL2P = '0.00';
    private $COLS_ABC = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM'];
	private $COLS_ABC_REP = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    private $AMESES = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
    private $MESES = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
    public static $graficos = [['ids'=>1, 'grafico' => 'Sector'], ['ids'=>2, 'grafico' => 'Tipo de Papel'], 
        ['ids'=>3, 'grafico' => 'Calificación de Riesgo'], ['ids'=>4, 'grafico' => 'Calificadora de Riesgo'],
        ['ids'=>5, 'grafico' => 'Emisor']];
    private $ISPDF;
    public static $graficosRV = [['ids'=>1, 'grafico' => 'Sector'], ['ids'=>2, 'grafico' => 'Tipo de Papel'],
        ['ids'=>3, 'grafico' => 'Emisor']];

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                ],
            ],
        ]; 
    }

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }
        $operacion = str_replace("/", "_", Yii::$app->controller->route);
        $resultado = SiteController::processAction($operacion);

        return SiteController::resultado($resultado, $this);
    }
    
    private function varvalemisor(){
        $objParam = new ParametroSearch;
        $valor = $objParam->paramNemonico("val_emisor");
        return empty($valor)? 100000 : $valor;
    }

    public function actionReporte1() {  
		$session = Yii::$app->session;
        
		$confir = new PorConfiguracionSearch();
		$conf = $confir->obtenerConfig($session->get('PortafolioId'),Yii::$app->user->identity->id);
        return $this->render('estadoCuentaRentaFija', ['opcgraficos' => $this->getGraficos(),
            'valemisor' => $this->varvalemisor(),'btnEnableTA'=> $this->isEnableUploadTA(),'arrConfig'=>Json::encode($conf, true)]);
    }

    public function actionReporte2() {
		$session = Yii::$app->session;
        
		$confir = new PorConfiguracionSearch();
		$conf = $confir->obtenerConfig($session->get('PortafolioId'),Yii::$app->user->identity->id);
		
        return $this->render('estadoAmortizadoRentaFija', ['opcgraficos' => $this->getGraficos(),
            'valemisor' => $this->varvalemisor(),'btnEnableTA'=> $this->isEnableUploadTA(),'arrConfig'=>Json::encode($conf, true)]);
    }

    public function actionReporte3() {
        return $this->render('rentaVariable', ['opcgraficos' => $this->getGraficosRV(),
            'valemisor' => $this->varvalemisor(),'btnEnableEditRV'=> $this->isEnableEditRV()]);
    }

    public function actionReporte4() {
		$session = Yii::$app->session;
        
		$confir = new PorConfiguracionSearch();
		$conf = $confir->obtenerConfig($session->get('PortafolioId'),Yii::$app->user->identity->id);
		
        return $this->render('resumenPortafolio', ['arrConfig'=>Json::encode($conf, true)]);
    }

    public function actionReporte5() {
        return $this->render('creditos', []);
    }

    public function actionReporte6() {
        return $this->render('detalleNegociaciones', ['btnEnableLiq'=> $this->isEnableUploadLiq()]);
    }

    public function actionReporte7() {
        return $this->render('titulosTransito', ['btnEnableLiq'=> $this->isEnableEdit()]);
    }

    public function actionReporte8() {
        return $this->render('liquidezPortafolio', []);
    }

    public function actionReporte9() {
        return $this->render('vencimientos', []);
    }

    public function actionReporte10() {
        return $this->render('graficoVencimientos', []);
    }
	public function actionReporte11() {
		$session = Yii::$app->session;
        
		$confir = new PorConfiguracionSearch();
		$conf = $confir->obtenerConfig($session->get('PortafolioId'),Yii::$app->user->identity->id);
        
        return $this->render('resumenEstadoCuenta', ['arrConfig'=>Json::encode($conf, true)]);
    }
    
    public function actionCalculadora() {
        return $this->render('calculadora', []);
    }
    public function actionVectorprecio() {
        return $this->render('vectorPrecio', []);
    }
    public function actionActualizarportafolio(){
        return $this->render('borrarcache', []);
    }
    public function actionSubirarchivo(){
        return $this->render('subirArchivo', []);
    }
    public function actionSubirarchivoprecio(){
        return $this->render('subirarchivoprecio', []);
    }
    
    public function actionGravectorprecio(){
        return $this->render('graficovp', []);
    }
    public function actionActualizarportafoliobvq(){
        return $this->render('actualizaportafoliobvq', []);
    }
	public function actionActualizarportafolioint(){
        return $this->render('actualizaportafolioint', []);
    }
	public function actionActualizarvenciminetosint(){
        return $this->render('actualizarvenciminetosint', []);
    }
	public function actionForzaractualizarvenciminetosint(){
        $client = $this->wsdl();
        $params = [];
        $infoBusqueda = $this->infoCliente();
        $params['intPortafolioId'] = trim($infoBusqueda['PortafolioId']);
		
		$post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $params['dtFechaIni'] = $data['fecha'];
		$params['dtFechaEnd'] = $data['fechaend'];
		
        
        $resultado = $client->ReprocesarVencimientosPorFechaInt($params);
        return "[]";
    }
	
	public function actionReprocesarvencimientos(){
        return $this->render('reprocesarvencimientos', []);
    }
    public function actionForzaractualizacionport(){
        $client = $this->wsdl();
        $params = [];
        $infoBusqueda = $this->infoCliente();
        $params['intPortafolio'] = trim($infoBusqueda['PortafolioId']); //136;
        $params['intComitenteId'] = trim($infoBusqueda['ComitenteId']); //6070;        
        
        $resultado = $client->ActualizarCachePorPortafolio($params);
        return $resultado->ActualizarCachePorPortafolioResult;
    }
	public function actionRendimiento(){
        return $this->render('reporterendimiento', []);
    }
    public function actionForzaractualizacionportbvq(){
        $client = $this->wsdl();
        $params = [];
        $infoBusqueda = $this->infoCliente();
        $params['intPortafolioId'] = trim($infoBusqueda['PortafolioId']); //136;
        $params['intComitenteId'] = trim($infoBusqueda['ComitenteId']); //6070;    
        
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $params['dtFecha'] = $data['fecha'];
        
        $resultado = $client->GenerarCacheEstadoCuentaFecha($params);
        return $resultado->GenerarCacheEstadoCuentaFechaResult;
    }
	public function actionForzaractualizacionportint(){
        $client = $this->wsdl();
        $params = [];
        $infoBusqueda = $this->infoCliente();
        $params['intPortafolioId'] = trim($infoBusqueda['PortafolioId']); //136; 
        
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $params['dtFechaIni'] = $data['fecha'];
		$params['dtFechaEnd'] = $data['fechaEnd'];
		//$params['strTipoRenta'] = 'REN_FIJA';
        
        $resultado = $client->ProcesarValoracionPortafolioFechaInt($params);
        return "[]";
    }
    public function actionReportes(){
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $tipo = $data['tipo'];
        $client = $this->wsdl();
        $params = [];
        if($tipo == "calculadora"){
            $resultado = $client->ObtenerTitulosCalculadoraIntegracion();
            return $resultado->ObtenerTitulosCalculadoraIntegracionResult;
        }elseif($tipo == "arcfisico"){
            $infoBusqueda = $this->infoCliente();
            $params['intComitenteId'] = trim($infoBusqueda['ComitenteId']); //6070;
            $params['intPortafolioId'] = trim($infoBusqueda['PortafolioId']); //136;
            $params['dtFechaIni'] = date("Y-m-d");
            $params['dtFechaFin'] = date("Y-m-d");
            $resultado = $client->ObtenerTiulosMaterializados($params);
            return $resultado->ObtenerTiulosMaterializadosResult;
        }elseif ($tipo == "infotitulo") {
            $params['intTituloId'] = $data['idtitulo'];
            $params['dtDate'] = date("Y-m-d");
            $resultado = $client->ObtenerInformacionTituloIntegracion($params);
            return $resultado->ObtenerInformacionTituloIntegracionResult;
        }elseif ($tipo == "calcinfo") {
            $params['intTituloId'] = intval($data['intTituloId']);
            $params['dcmMonto'] = $data['monto'];
            $params['dtDate'] = $data['fecha'];
            $params['dcmTasa'] = $data['tasa'];
            $params['bolCupon'] = $data['cupon'];
            $params['dcmPrecio'] = $data['precio'];
            $resultado = $client->EjecutarCalculadoraIntegracion($params);
            $infod = $resultado->EjecutarCalculadoraIntegracionResult;
            $res = '{"resinfo" :'.(empty($infod)? "[]}" : $infod);
            if(!empty($infod)){
                $resultado1 = $client->ObtenerTablaAmortizacionInt($params);
                $detalles = $resultado1->ObtenerTablaAmortizacionIntResult;
                $res .= ', "detalles" :'.(empty($detalles)? '[]': $detalles)."}";
            }            
            return $res;
        }elseif ($tipo == "infoprecio") {
            $params['intTivId'] = $data['idtitulo'];
            //$params['dtDate'] = date("Y-m-d");
            $resultado = $client->ObtenerVectorPrecioGraficoIntegracion($params);
            return $resultado->ObtenerVectorPrecioGraficoIntegracionResult;
        }   
    }
    public function actionListado1() {
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $tipo = $data['tipo'];

        $infoBusqueda = $this->infoCliente();

        $client = $this->wsdl();
        $params = Array();
        
        $params['intComitenteId'] = $infoBusqueda['ComitenteId']; //6070;
        $params['intPortafolioId'] = $infoBusqueda['PortafolioId']; //136;
        $params['dtFechaIni'] = $data['fecha'];
        if(isset($data['fechaEnd']))
            $params['dtFechaFin'] = $data['fechaEnd'];
        else
            $params['dtFechaFin'] = $data['fecha'];
        try {
            if ($tipo == 'reporte1') {
                $resultado = $client->ObtenerEstadoCuentaRFIntegracion($params);
                echo $resultado->ObtenerEstadoCuentaRFIntegracionResult;
            } elseif ($tipo == 'reporte2') {
                $resultado = $client->ObtenerEstadoCuentaRFCAIntegracion($params);
                echo $resultado->ObtenerEstadoCuentaRFCAIntegracionResult;
            } elseif ($tipo == 'reporte3') {
                $resultado = $client->EstadoCuentaRentaVariableIntegra($params);
                echo $resultado->EstadoCuentaRentaVariableIntegraResult;
            } elseif ($tipo == 'vencimientos') {
                $resultado=$client->ObtenerVencimientosIntegracion($params);            
                echo $resultado->ObtenerVencimientosIntegracionResult;
            } elseif ($tipo == 'portafolio') {				
				$params['intUserId'] = Yii::$app->user->identity->id;
                $resultado = $client->ObtenerResumenPortafolioIntegracion($params);
                $infoTotal = $this->generarInfoPortafolio($resultado->ObtenerResumenPortafolioIntegracionResult,
                        $data['fecha']);
                echo $infoTotal;
            } elseif ($tipo == 'credito') {
                $resultado = $client->ObtenerCreditosReg($params);
                echo $resultado->ObtenerCreditosRegResult;
            } elseif ($tipo == 'negociacion') {
                $resultado = $client->ObtenerNegociacionesRealizadasV2($params);
                echo $resultado->ObtenerNegociacionesRealizadasV2Result;
            } elseif ($tipo == 'titulo') {
                $resultado = $client->ObtenerTitulosEnTransito($params);
                echo $resultado->ObtenerTitulosEnTransitoResult;
            } elseif ($tipo == 'liquidez') {
                $resultado = $client->ObtenerLiquidezPortafolioInt($params);
                echo $resultado->ObtenerLiquidezPortafolioIntResult;
            } elseif ($tipo == 'vencimientosGrafico') {
                $resultado=$client->ObtenerGraficoVencimientos($params);    
                echo $resultado->ObtenerGraficoVencimientosResult;
            } elseif ($tipo == 'obtenerPortafolios') {
                $resultado = $client->ObtenerPortafolios($params);
                echo $resultado->ObtenerPortafoliosResult;
            } elseif ($tipo == 'vectorPrecio') {
                $resultado = $client->ObtenerVectorPrecioIntegracionFechas($params);
                echo $resultado->ObtenerVectorPrecioIntegracionFechasResult;
            } elseif ($tipo == 'exportarGrafico'){
                
            }elseif ($tipo == 'procesarArchivo'){
                $params['strPath'] = Yii::getAlias('@webroot').'/tmp/'.$data['archivo'];
                $resultado = $client->PorcesarArchivoPorPortafolio($params);
                try{
                    $resultado->PorcesarArchivoPorPortafolioResult;
                    echo "true";
                } catch (\Exception $error) {
                    echo "false";
                }
            }elseif ($tipo == 'procesarArchivoprecio'){
                $params['strPath'] = Yii::getAlias('@webroot').'/tmp/'.$data['archivo'];
                $resultado = $client->ProcesarArchivoPrecios($params);
                try{
                    echo "true";
                } catch (\Exception $error) {
                    echo "false";
                }
            }elseif ($tipo=='procesarArchivoalternativas'){
                $params['strPath'] = Yii::getAlias('@webroot').'/tmp/'.$data['archivo'];
                $resultado = $client->GenerarAlternativasInversion($params);
                try{
                    echo "true";
                } catch (\Exception $error) {
                    echo "false";
                }
            }elseif($tipo=='reprocesarVencimientos'){
                $resultado = $client->ReprocesarVencimientosPorFecha($params);
                echo "true";
            }elseif($tipo=='rendimiento'){
				$params['intPeriodo'] = $data['periodo'];
                $resultado = $client->ObtenerInformacionReporteRendimiento($params);
                echo $resultado->ObtenerInformacionReporteRendimientoResult;
            }elseif($tipo=='reporto'){
				$resultado = $client->EstadoCuentaReporto($params);
                echo $resultado->EstadoCuentaReportoResult;
            }elseif($tipo=='reprocesarOrden'){
				$resultado = $client->EstadoCuentaReporto($params);
                echo $resultado->EstadoCuentaReportoResult;
            }elseif ($tipo == 'procesarArchivoFormularios'){
                $params['strPath'] = Yii::getAlias('@webroot').'/tmp/'.$data['archivo'];
                $resultado = $client->PorcesarArchivo318PorPortafolio($params);
                try{
                    $resultado->PorcesarArchivo318PorPortafolioResult;
                    echo "true";
                } catch (\Exception $error) {
                    echo "false";
                }
            }
			
            
            exit;
        } catch (\SoapFault $fault) {
            $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
        }
    }
    public function actionDescargagra($campo,$titulo,$type=""){
        //$graficos
        $post = file_get_contents("php://input");
		$params = Json::decode($post, true);
        $data = $post;//Json::decode($post, true);
		
		$fechaEnt = $params['fecha'];
        
        $fech1 = explode("-", $fechaEnt);
        $fecha = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
		
		if(isset($params['fecha2']))
		{
			$fech2 = explode("-", $params['fecha2']);
			$fecha = "DEL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
			$fecha = $fecha." AL " . $fech2[2] . " DE " . $this->MESES[intval($fech2[1]) - 1] . " DEL " . $fech2[0];
		}
        
        $itemC = $campo;//$data['campo'];
        //$titulo = $data['titulo'];
        $campo = '';
        $valor = 'ValorNominalTotal';
        //$titulo = '';
        
        switch($itemC){
            case '1':
                $campo = 'Sector';
                break;
            case '2':
		if($type==""){
                    $campo = 'SiglasTipoValor';
                }else{
                    $campo = 'TipoValor';
                }
                break;
            case '3':
                if($type==""){
                    $campo = 'Valor';
                }else{
                    $campo = 'Emisor';
                }
                break;
            case '4':
                $campo = 'Calificadora';
                break;
            case '5':
                $campo = 'Emisor';
                break;
            case '6':
                $campo = 'TipoValor';
                break;
            case '10':
                $campo = 'label';
                $valor = 'Total';
                break;
        }
        
        $resultado = $this->exportarGraficoExcel($data,$campo,$valor,$titulo,$fecha);
        
        echo $resultado;
    }

    private function wsdl() {
        ini_set('max_execution_time', 180);
		ini_set('default_socket_timeout', 180);
        $wsdl = Yii::$app->params['webService']; 
		libxml_disable_entity_loader(false);
        $client = new \SoapClient($wsdl, array('trace' => 1, "connection_timeout" => 180,'cache_wsdl' => WSDL_CACHE_NONE,'version' => SOAP_1_2));

        return $client;
    }

    private function infoCliente() {
        $session = Yii::$app->session;
        $ComitenteId = $session->get('ComitenteId');
        $PortafolioId = $session->get('PortafolioId');
        $client = $this->wsdl();
        $params = Array();
        $idUsuario = Yii::$app->user->identity->id;
        $params['intUsuarioId'] = $idUsuario;
        $resp = [];
        if (!empty($ComitenteId) && !empty($PortafolioId) &&
                intval($ComitenteId) > 0 && intval($PortafolioId) > 0) {
            $resp['ComitenteId'] = $ComitenteId;
            $resp['PortafolioId'] = $PortafolioId;
        } else {
            try {
                $resultado = $client->ObtenerInformacionCliente($params);
                $resp = Json::decode($resultado->ObtenerInformacionClienteResult, true);
            } catch (\SoapFault $fault) {
                $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
            }
        }

        return $resp;
    }

    private function infoMetadata($tipo, $fecha = "", $comitente = "", $fech2 = "",$bolEnableExportUp = false) {
        $arrInfo = [];
        switch (intval($tipo)) {
            case 1:
				if(!$bolEnableExportUp){
					$arrInfo['cols'] = ['Emisor', 'CodigoEmisor', 'SiglasTipoValor', 'Sector', 'Valor', 'Calificadora', 'Fecha0' => 'FechaCalificacion', 'Numeracion', 'Custodio',
                    'Cantidad', 'ValorNominalUnitario', 'Suma0' => 'ValorNominalTotal', 'Fecha1' => 'FechaCompra', 'Fecha2' => 'FechaEmision', 'Fecha3' => 'FechaVencimiento', 'PlazoTotal',
                    'DiasTranscurridos', 'PlazoVencer', 'Fecha4' => 'FechaAcrual', 'DiasAcrual', 'interes0' => 'TituloRendimiento', 'interes1' => 'RendimientoOperacion','interes5' => 'YieldToMaturity', 'interes2' => 'TituloTasaInteres',
                    'Suma1' => 'InteresAcumulado', 'Fecha5' => 'FechaInteres', 'Fecha6' => 'FechaCapital', 'interes3' => 'TituloPrecioSpot', 'Suma2' => 'ValorEfectivo', 'interes4' => 'PrecioCompra', 'Suma3' => 'ValorEfectivoCompra','DuracionModificada'];
					$arrInfo['plantilla'] = 'plantilla/RentaFijaValorMercado.xlsx';
					$arrInfo['plantillapdf'] = 'plantilla/RentaFijaValorMercado.xlsx';//RentaFijaPdf.xlsx
				}else{
					//interes5
					//interes6
					//Suma4
					//Suma5
					$arrInfo['cols'] = ['Emisor', 'CodigoEmisor', 'SiglasTipoValor', 'Sector', 'Valor', 'Calificadora', 'Fecha0' => 'FechaCalificacion', 'Numeracion', 'Custodio',
                    'Cantidad', 'ValorNominalUnitario', 'Suma0' => 'ValorNominalTotal', 'Fecha1' => 'FechaCompra', 'Fecha2' => 'FechaEmision', 'Fecha3' => 'FechaVencimiento', 'PlazoTotal',
                    'DiasTranscurridos', 'PlazoVencer', 'Fecha4' => 'FechaAcrual', 'DiasAcrual', 'interes0' => 'TituloRendimiento', 'interes1' => 'RendimientoOperacion','interes5' => 'YieldToMaturity', 'interes2' => 'TituloTasaInteres',
                    'Suma4' => 'InteresAcumulado','Suma1' => 'InteresesAcumuladosCA', 'Fecha5' => 'FechaInteres', 'Fecha6' => 'FechaCapital', 'interes3' => 'TituloPrecioSpot', 'Suma2' => 'ValorEfectivo','interes6' => 'PorcentajeCostoAmortizado','Suma5' => 'CostoAmortizado','interes4' => 'PrecioCompra', 'interes4' => 'PrecioCompra', 'Suma3' => 'ValorEfectivoCompra','DuracionModificada'];
					
					$arrInfo['plantilla'] = 'plantilla/RentaFijaValorMercado-cc.xlsx';
					$arrInfo['plantillapdf'] = 'plantilla/RentaFijaValorMercado-cc.xlsx';//RentaFijaPdf.xlsx
				}                
				
                $arrInfo['nombreExcel'] = 'tmp/RentaFijaValorMercado.xlsx';
                $arrInfo['nombrePdf'] = 'tmp/RentaFijaValorMercado.pdf';
                $arrInfo['inicio'] = 12;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [['col' => 0, 'row' => 8, 'fDescripcion' => $fecha],
                    ['col' => 16, 'row' => 10, 'fCabecera' => $fecha],
                    ['col' => 0, 'row' => 5, 'comitente' => $comitente]];
                break;
            case 2:
				if(!$bolEnableExportUp){
					$arrInfo['cols'] = ['Emisor', 'CodigoEmisor', 'SiglasTipoValor', 'Sector', 'Valor', 'Calificadora', 'Fecha0' => 'FechaCalificacion', 'Numeracion', 'Custodio',
                    'Cantidad', 'ValorNominalUnitario', 'Suma0' => 'ValorNominalTotal', 'Fecha1' => 'FechaCompra', 'Fecha2' => 'FechaEmision', 'Fecha3' => 'FechaVencimiento', 'PlazoTotal',
                    'DiasTranscurridos', 'PlazoVencer', 'Fecha4' => 'FechaAcrual', 'DiasAcrual', 'interes0' => 'RendimientoOperacion', 'interes1' => 'TituloRendimiento','interes21' => 'YieldToMaturity', 'interes2' => 'TituloTasaInteres',
                    'Suma1' => 'InteresTotal','Suma2' => 'InteresAcumulado', 'Fecha5' => 'FechaInteres', 'Fecha6' => 'FechaCapital', 'interes3' => 'PorcentajeCosto', 'Suma3' => 'CostoAmortizado', 'Suma4' => 'CostosIncurridos','Suma8' => 'CostosPorAmortizar',
                    'Suma5' =>'InteresTranscurrido','Suma6'=> 'RendimientoOperacionValor', 'interes'=>'PrecioCompra', 'Suma7' => 'ValorEfectivoCompra','DuracionModificada'];
					
					$arrInfo['plantilla'] = 'plantilla/CostoAmortizado.xlsx';
					$arrInfo['nombreExcel'] = 'tmp/CostoAmortizado.xlsx';
                }else{
					//interes2
					//interes5
					//Suma8		
					//Suma9					
					
					/*$arrInfo['cols'] = ['Emisor', 'CodigoEmisor', 'SiglasTipoValor', 'Sector', 'Valor', 'Calificadora', 'Fecha0' => 'FechaCalificacion', 'Numeracion', 'Custodio',
                    'Cantidad', 'ValorNominalUnitario', 'Suma0' => 'ValorNominalTotal', 'Fecha1' => 'FechaCompra', 'Fecha2' => 'FechaEmision', 'Fecha3' => 'FechaVencimiento', 'PlazoTotal',
                    'DiasTranscurridos', 'PlazoVencer', 'Fecha4' => 'FechaAcrual', 'DiasAcrual', 'interes0' => 'RendimientoOperacion', 'interes1' => 'TituloRendimiento','interes4' => 'TituloRendimiento', 'interes2' => 'TituloTasaInteres',
                    'Suma1' => 'InteresTotal','Suma2' => 'InteresAcumulado','Suma8' => 'InteresAcumulado', 'Fecha5' => 'FechaInteres', 'Fecha6' => 'FechaCapital', 'interes3' => 'PorcentajeCosto', 'Suma3' => 'CostoAmortizado','interes5' => 'PorcentajeCosto','Suma9' => 'CostosIncurridos', 'Suma4' => 'CostosIncurridos',
                    'Suma5' =>'InteresTranscurrido','Suma6'=> 'RendimientoOperacionValor', 'interes'=>'PrecioCompra', 'Suma7' => 'ValorEfectivoCompra','DuracionModificada'];*/
					$arrInfo['cols'] = ['Emisor', 'CodigoEmisor', 'SiglasTipoValor', 'Sector', 'Valor', 'Calificadora', 'Fecha0' => 'FechaCalificacion', 'Numeracion', 'Custodio',
                    'Cantidad', 'ValorNominalUnitario', 'Suma0' => 'ValorNominalTotal', 'Fecha1' => 'FechaCompra', 'Fecha2' => 'FechaEmision', 'Fecha3' => 'FechaVencimiento', 'PlazoTotal',
                    'DiasTranscurridos', 'PlazoVencer', 'Fecha4' => 'FechaAcrual', 'DiasAcrual', 'interes0' => 'RendimientoOperacion', 'interes1' => 'TituloRendimiento','interes2' => 'YieldToMaturity', 'interes3' => 'TituloTasaInteres',
                    'Suma1' => 'InteresTotal','Suma2' => 'InteresAcumulado','Suma3' => 'InteresesAcumuladosVM', 'Fecha5' => 'FechaInteres', 'Fecha6' => 'FechaCapital', 'interes4' => 'PorcentajeCosto', 'Suma4' => 'CostoAmortizado','interes5' => 'PrecioMercadoVM','Suma10' => 'ValorMercadoVM', 'Suma9' => 'CostosIncurridos', 'Suma5' => 'CostosPorAmortizar',
                    'Suma6' =>'InteresTranscurrido','Suma7'=> 'RendimientoOperacionValor', 'interes'=>'PrecioCompra', 'Suma8' => 'ValorEfectivoCompra','DuracionModificada'];
					
					$arrInfo['plantilla'] = 'plantilla/CostoAmortizado-vm.xlsx';
					$arrInfo['nombreExcel'] = 'tmp/CostoAmortizado-vm.xlsx';
				}
                
                $arrInfo['nombrePdf'] = 'tmp/CostoAmortizado.pdf';
                $arrInfo['inicio'] = 10;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [['col' => 0, 'row' => 6, 'fDescripcion' => $fecha],
                    ['col' => 16, 'row' => 8, 'fCabecera' => $fecha],
                    ['col' => 0, 'row' => 4, 'comitente' => $comitente]];
                break; 
            case 3:
                $arrInfo['cols'] = ['Emisor','CodigoEmisor', 'TipoValor','Sector', 'Custodio', 'Suma01' => 'Cantidad', 'ValorNominalUnitario', 'Suma02' => 'ValorNominalTotal', 'TituloPrecioSpot','Suma03formula' => 'F#*I#',"DividendoAccion","DividendoEfectivo"];
                $arrInfo['plantilla'] = 'plantilla/RentaVariable.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/RentaVariable.xlsx';
                $arrInfo['nombrePdf'] = 'tmp/RentaVariable.pdf';
                $arrInfo['inicio'] = 7;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [['col' => 0, 'row' => 4, 'fDescripcion' => $fecha],
                    ['col' => 0, 'row' => 2, 'comitente' => $comitente]
                ];
                break;
            case 4:
                $arrInfo['cols'] = ['Fecha0' => 'FechaVencimiento', 'Fecha1' => 'FechaDePago', 'Emisor', 'TipoValor', 'TituloTasaInteres',
                    'Suma0' => 'VencimientoCapital', 'Suma1' => 'VencimientoInteres', 'Suma2' => 'Retencion', 'formula0' => 'F#+G#-H#', 'NumeroDeCuenta', 'Banco', 'Observaciones'];
                $arrInfo['plantilla'] = 'plantilla/Creditos.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/Creditos.xlsx';
                $arrInfo['nombrePdf'] = 'tmp/Creditos.pdf';
                $arrInfo['inicio'] = 7;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [['col' => 0, 'row' => 4, 'fDescripcion' => $fecha, 'finicio' => $fech2],
                    ['col' => 0, 'row' => 2, 'comitente' => $comitente]];
                break;
            case 5:
                $arrInfo['cols'] = ['Fecha0' => 'FechaVencimiento', 'NumeroDeLiquidacion', 'CompraVenta', 'Emisor', 'SiglasTipoValor','Cantidad', //'Suma0' => 'NegociacionCantidad',
                    'Suma1' => 'ValorNominalTotal', 'interes0' => 'TituloPrecioSpot', 'Suma2' => 'ValorEfectivo', 'Suma3' => 'ComisionBolsa',
                    'ComisionOperador', 'Suma4' => 'ComisionTotal', 'InteresTranscurrido', 'Suma5' => 'ValorTotal'];
                $arrInfo['plantilla'] = 'plantilla/Negociaciones.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/Negociaciones.xlsx';
                $arrInfo['nombrePdf'] = 'tmp/Negociaciones.pdf';
                $arrInfo['inicio'] = 7;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [['col' => 0, 'row' => 4, 'fDescripcion' => $fecha, 'finicio' => $fech2],
                    ['col' => 0, 'row' => 2, 'comitente' => $comitente]];
                break;
            case 6:
                $arrInfo['cols'] = ['Emisor', 'Numeracion', 'TipoValor', "Suma0" => 'ValorNominalTotal', 'Observaciones'];
                $arrInfo['plantilla'] = 'plantilla/TitulosTransito.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/TitulosTransito.xlsx';
                $arrInfo['nombrePdf'] = 'tmp/TitulosTransito.pdf';
                $arrInfo['inicio'] = 10;
                $arrInfo['colInicio'] = 2;
                $arrInfo['cabecera'] = [['col' => 2, 'row' => 7, 'fDescripcion' => $fecha, 'finicio' => $fech2],
                    ['col' => 2, 'row' => 5, 'comitente' => $comitente]];
                break;
            case 7:
                $arrInfo['cols'] = ['Fecha0' => 'FechaVencimiento', 'LiquidezDescripcion', 'LiquidezCredito', 'LiquidezDebito', 'finpost0' => 'LiquidezSaldo'];
                $arrInfo['plantilla'] = 'plantilla/Liquidez.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/Liquidez.xlsx';
                $arrInfo['nombrePdf'] = 'tmp/Liquidez.pdf';
                $arrInfo['inicio'] = 7;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [['col' => 0, 'row' => 4, 'fDescripcion' => $fecha, 'finicio' => $fech2],
                    ['col' => 0, 'row' => 2, 'comitente' => $comitente]];
                break;
             case 8:
                $arrInfo['cols'] = ['PlazoVencerCupon', 'Emisor', 'SiglasTipoValor', 'NumeracionCode','ValorNominalTotal', 'VencimientoCupon',
                    'Fecha0' => 'FechaVencimientoCupon', 'DiasCupon', 'interes0' => 'TituloTasaInteres', 'Suma0' => 'VencimientoCapital','Suma1' => 'VencimientoInteres',
                    'Suma2' => 'Retencion', 'Suma03formula' => 'J#+K#'];                
                $arrInfo['plantilla'] = 'plantilla/Vencimientos.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/Vencimientos.xlsx';
                $arrInfo['nombrePdf'] = 'tmp/Vencimientos.pdf';
                $arrInfo['inicio'] = 10;
                $arrInfo['colInicio'] = 0;
                $arrInfo['filter'] ="A9:M9";
                   $arrInfo['cabecera']=[['col' => 0,'row' =>6 ,'fDescripcion' =>$fecha, 'finicio' => $fech2],
                       ['col' => 0, 'row' => 4,'comitente' => $comitente]];
                break;
            case 9:
                $arrInfo['cols'] = ['FechaPrecio', 'Emisor', 'TipoValor', 'TasaValor','Precio'];                
                $arrInfo['plantilla'] = 'plantilla/VectorPrecio.xlsx';
                $arrInfo['nombreExcel'] = 'VectorPrecio.xlsx';
                $arrInfo['nombrePdf'] = 'VectorPrecio.pdf';
                $arrInfo['inicio'] = 6;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [['col' => 0, 'row' => 3, 'fDescripcion' => $fecha],
                    ['col' => 0, 'row' => 1, 'comitente' => $comitente]];
                break;
            case 10:
                $arrInfo['cols'] = ['ses_fecha_inicio', 'ses_comitente', 'user_first_names', 'user_last_names'];                
                $arrInfo['plantilla'] = 'plantilla/Ingreso.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/Ingreso.xlsx';
                $arrInfo['nombrePdf'] = 'tmp/Ingreso.pdf';
                $arrInfo['inicio'] = 10;
                $arrInfo['colInicio'] = 1;
                break;
            case 11:
                $arrInfo['cols'] = ['PERIODE', 'CAPITAL_INSOLUTO', 'Fecha0' => 'INIT_DATE', 'Suma0'=>'INTERES','Suma1'=>'CAPITAL','Suma2'=>'RECOVERY','Fecha1' => 'TFL_FECHA_VENCIMIENTO','Suma3'=>'PRESENT_VALUE'];                
                $arrInfo['plantilla'] = 'plantilla/TablaAmortizacion.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/TablaAmortizacion.xlsx';
                $arrInfo['nombrePdf'] = 'tmp/TablaAmortizacion.pdf';
                $arrInfo['inicio'] = 19;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [];
                break;
            case 12:
                $arrInfo['cols'] = [ "grupo01" => "rpd_tipo_titulo", "rpd_numero", "rpd_emisor", "rpd_nacionalidad", "rpd_custodio", "rpd_calificadora", "rpd_clase",
                'Fecha0' => "rpd_fecha_calificacion", 'Fecha1' => "rpd_fecha_compra", 'Fecha2' => "rpd_fecha_emision", 'Fecha3' => "rpd_feha_vencimiento", "rpd_plazo", "boolval" => "rpd_renovacion",
                "boolval01" =>"rpd_nueva_adquisicion", 'interes0' => "rpd_tasa_nominal", 'interes1' => "rpd_tasa_fectiva", "rpd_moneda", "rpd_valor_nominal", "rpd_valor_compra",
                "rpd_libros", "rpd_cotizacion", 'Fecha4' => "rpd_fecha_cotizacion", "rpd_referecnia", "rpd_common", "rpd_isin", "rpd_bbnumber",
                "rpd_cusip", "rpd_sedol", "rpd_fuent_cot_val_mercado", 'interes2' =>"rpd_tasa_interes", "rpd_estado_titulo", "rpd_provision_constitutiva",
                "boolval03" =>"rpd_intension_hv", "boolval04" => "rpd_intension_dpv", "boolval05" => "rpd_contabilizar_avalor", 'boolval06'=> "rpd_contabilizar_costoamor"];  
                
                $arrInfo['plantilla'] = 'plantilla/Formato318a.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/Formato318a.xlsx';
                $arrInfo['inicio'] = 7;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [['col' => 0, 'row' => 3, 'fDescripcion' => $fecha],
                    ['col' => 0, 'row' => 1, 'comitente' => $comitente]];
                break;
            case 13:
                $arrInfo['cols'] = [ "grupo02" => "rpd_tipo_titulo", "rpd_numero", "rpd_emisor", "rpd_nacionalidad", "rpd_custodio", "rpd_calificadora", "rpd_clase",
                'Fecha0' => "rpd_fecha_calificacion", 'Fecha1' => "rpd_fecha_compra", 'Fecha2' => "rpd_fecha_emision", 'Fecha3' => "rpd_feha_vencimiento", "rpd_plazo", "boolval" => "rpd_renovacion",
                "boolval01" =>"rpd_nueva_adquisicion", 'interes0' => "rpd_tasa_nominal", 'interes1' => "rpd_tasa_fectiva", "rpd_moneda", "rpd_valor_nominal", "rpd_valor_compra",
                "rpd_libros", "rpd_cotizacion",'Fecha4' => "rpd_fecha_cotizacion", "rpd_referecnia", "rpd_common", "rpd_isin", "rpd_bbnumber",
                "rpd_cusip", "rpd_sedol", "rpd_fuent_cot_val_mercado", "rpd_tasa_interes", "rpd_estado_titulo", "rpd_provision_constitutiva",
                "boolval03" =>"rpd_intension_hv", "boolval04" => "rpd_intension_dpv", "boolval05" => "rpd_contabilizar_avalor", 'boolval06'=> "rpd_contabilizar_costoamor"];  
                
                $arrInfo['plantilla'] = 'plantilla/SCVS.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/SCVS.xlsx';
                $arrInfo['inicio'] = 1;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [];
                break;
			case 14:
                $arrInfo['cols'] = ['nombref001' => 'fgp_nombre', 'rtd_capital', 'rtd_incremento_capital', 'rtd_suma'];                  
                $arrInfo['plantilla'] = 'plantilla/Formato318.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/Formato318.xlsx';
                $arrInfo['inicio'] = 7;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [];
                break;
            case 15:
                $arrInfo['cols'] = ['nombref001' => 'fgp_nombre', 'rtd_capital', 'rtd_incremento_capital', 'rtd_suma'];                  
                $arrInfo['plantilla'] = 'plantilla/SCVS318.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/SCVS318.xlsx';
                $arrInfo['inicio'] = 1;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [];
                break;
            default :
                break;
        };

        return $arrInfo;
    }

    private function formatRowCol(&$sheetData, $formato, $col, $row, $val) {
        \PHPExcel_Cell::setValueBinder(new \PHPExcel_Cell_AdvancedValueBinder());
        $sheetData->setCellValueByColumnAndRow($col, $row, $val);
        $sheetData->getStyleByColumnAndRow($col, $row)
                ->getNumberFormat()
                ->setFormatCode($formato);
    }

    private function infoRows(&$sheetData, $infoMeta, $data, $inicio, $colInicio = 0) {
        if (count($data) > 2) {
            $sheetData->insertNewRowBefore($inicio + 1, count($data) - 2);
        }
        $arrSuma = [];
        $arrSumaCol = [];
        $ini = $inicio;
        $numLastValue=null;
        $post = -1;
		
        foreach ($data as $cols) {
            $i = $colInicio;
            foreach ($infoMeta as $key => $value) {                               
                if($value!="" && (strpos($key, 'sumaCol0') === false) && (strpos($key, 'formula') === false) && (strpos($key, 'finpost') === false)){
                    $val = $cols[$value];
					if(strpos($key, 'fechaA3') !== false){
                        if(strpos($val, '-') !== false){
                            $fff = explode("-", $val);
                            $val = $fff[2]."/".$fff[1]."/".$fff[0];
                        }
                    }
                    
                    if(strpos($key, 'nombref0') !== false){                        
                        if (!empty($cols['fgp_color']) && !is_null($cols['fgp_color'])) {                        
                        $sheetData->setCellValueByColumnAndRow($i, $inicio, $val);
                            $style = array(
                                'font'  => array(
                                    'bold'  => true,
                                    'color' => array('rgb' => substr($cols['fgp_color'], 1, 6)),
                            ));                            
                            $sheetData->getStyle('A'.$inicio)->applyFromArray($style);
                        }                    
                    }                    
                    if (strpos($key, 'interes') !== false) {
                        if($val!=""){
                                $val = $val / 100;
                        }
                    }
                    if (strpos($key, 'grupo02') !== false) {                        
                        $sheetData->setCellValueByColumnAndRow($i, $inicio, $val);
                        if(trim($cols['parent_id']) == ""){
                            $style = array(
                                'font' => array(
                                    'bold' => true
                                ),
                                'fill' => array(
                                    'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                                    'color' => array('rgb' => '33cccc')
                                )
                            );
                            $sheetData->getStyle('A'.$inicio.":AJ".$inicio)->applyFromArray($style);
                        }                        
                    }elseif (strpos($key, 'grupo01') !== false) {                        
                        $sheetData->setCellValueByColumnAndRow($i, $inicio, $val);
                        if(trim($cols['parent_id']) == ""){
                            $style = array(
                                'font' => array(
                                    'bold' => true
                                ),
                                'fill' => array(
                                    'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                                    'color' => array('rgb' => '33cccc')
                                )
                            );
                            $sheetData->getStyle('A'.$inicio.":AJ".$inicio)->applyFromArray($style);
                            /*$sheetData->getStyle('H'.$inicio.":L".$inicio)->applyFromArray($style);
                            $sheetData->getStyle('O'.$inicio.":S".$inicio)->applyFromArray($style);
                            $sheetData->getStyle('U'.$inicio.":V".$inicio)->applyFromArray($style);*/
                        }                        
                    }elseif (strpos($key, 'boolval') !== false) {
                        $val = $val? "X" : "";
                        $sheetData->setCellValueByColumnAndRow($i, $inicio, $val);
                    }elseif (strpos($key, 'Fecha') !== false) {
						if(!empty($val) && $val!="-1")
							$val = $this->retornoFecha($val);
						
                        if(empty($val) || strpos($val,"1901") || strpos($val,"1900"))//$val=='' || 
                        {
                            $val ="N/A";
                            $sheetData->setCellValueByColumnAndRow($i, $inicio, $val);
                        }else{
							if($val!="-1"){
								if($this->ISPDF){
									$val1 = explode("/", $val);
									$val2 = $val1[0]."-".$this->AMESES[intval($val1[1]) - 1]."-".substr($val1[2], 2);
									$sheetData->setCellValueByColumnAndRow($i, $inicio, $val2);  
								}else{
									$this->formatRowCol($sheetData, $this->FORMAT_DATE1, $i, $inicio, $val);
								}                            
							}
                        }
                    } elseif(strpos($key, 'calx') !== false){
                        $tip = explode("-", $key);
                        $sheetData->setCellValueByColumnAndRow($i, $inicio, ($val*$cols[$tip[1]]));
                    } else {
                        $sheetData->setCellValueByColumnAndRow($i, $inicio, $val);
                    }

                    if (strpos($key, 'Suma') !== false && !in_array($i, $arrSuma)) {
                        $arrSuma[] = $i;
                    }
                    
                }else{
                    if (strpos($key, 'Suma') !== false && !in_array($i, $arrSuma)) {
                        $arrSuma[] = $i;
                    }
                    if (strpos($key, 'sumaCol0') !== false) {                        
                        $sheetData->setCellValueByColumnAndRow($i, $inicio, '=SUM(' . str_replace('#',$inicio,$value) . ")");
                    }else{
                        if (strpos($key, 'formula') !== false) {     
                            $sheetData->setCellValueByColumnAndRow($i, $inicio, '=' . str_replace('#',$inicio,$value));
                        }else{
                            $sheetData->setCellValueByColumnAndRow($i, $inicio, $cols[$value]);
                            $numLastValue = $cols[$value];
                            $post = $i;
                        }
                    }
                }
                $i++;
            }
            $inicio++;
        }
        
        

        if($numLastValue!=null)
        {
            $sheetData->setCellValueByColumnAndRow($post, $inicio,'=E'.($inicio-1));
        }
        
        if(count($data)==1){
            $inicio++;
        }
        foreach ($arrSuma as $cols) {
            $sheetData->setCellValueByColumnAndRow($cols, $inicio, '=SUM(' . $this->COLS_ABC[$cols] . $ini . ':' . $this->COLS_ABC[$cols] . ($inicio - 1) . ")");
        }
    }

    public function infoScalar($arrData, &$sheetData) {
        foreach ($arrData as $value) {
            if (!empty($value['fDescripcion'])) {
                $fech1 = explode("-", $value['fDescripcion']);
                $str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
                $ffini = "";
                if(!empty($value['finicio'])){
                    $fech2 = explode("-", $value['finicio']);
                    $ffini = "DEL " . $fech2[2] . " DE " . $this->MESES[intval($fech2[1]) - 1] . " DEL " . $fech2[0]." ";
                }
                $sheetData->setCellValueByColumnAndRow($value['col'], $value['row'], $ffini.$str1);
            }
            if (!empty($value['fCabecera'])) {
                $val = $this->retornoFecha($value['fCabecera']);
                $this->formatRowCol($sheetData, $this->FORMAT_DATE1, $value['col'], $value['row'], $val);
            }
            if (!empty($value['comitente'])) {
                $sheetData->setCellValueByColumnAndRow($value['col'], $value['row'], $value['comitente']);
            }
            if (!empty($value['sum'])) {
                $sheetData->setCellValueByColumnAndRow($value['col'], $value['row'], $value['sum']);
            } 
        }
    }

    public function actionExportar($ids, $fech = "", $fech2 = "",$ext="") {
        ini_set('memory_limit', '500M');
        ini_set('max_execution_time', 300);
        $session = Yii::$app->session;
        $comitente = $session->get('NombreComitente');
        $this->ISPDF = false;
		
		$bolEnableExportUp = false;
		$conf = null;
		if($ids==1 || $ids==2){
			$confir = new PorConfiguracionSearch();
			$conf = $confir->obtenerConfig($session->get('PortafolioId'),Yii::$app->user->identity->id);
		}
		
		if($conf!=null && count($conf)>0){
			switch($ids){
				case 1:
					$bolEnableExportUp = $conf[0]["con_rf"];
				break;
				case 2:
					$bolEnableExportUp = $conf[0]["con_rfcc"];
				break;
			}
		}
		
        //$comitente =  //"ORION S.A.";
        $arrData = $this->infoMetadata($ids, $fech, $comitente, $fech2,$bolEnableExportUp);
        $fileExcel = \PHPExcel_IOFactory::load($arrData['plantilla']);
        $sheetData = $fileExcel->getActiveSheet();
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $sheetData->freezePane('B1');
		
        if($ids == 10){
            $oses = new SesionSearch();
            $data = $oses->listarIngresosp($_GET);
        }
        
        if(!empty($ext)){
            $result = explode("|", $ext);
            $arrData['cabecera'] = [['col' => 2, 'row' => 9, 'comitente' => $result[0]],
               ['col' => 2, 'row' => 10, 'comitente' => $result[1]],
                ['col' => 2, 'row' => 11, 'comitente' => $result[2]],
                ['col' => 2, 'row' => 12, 'fCabecera' => $result[3]],
                ['col' => 2, 'row' => 13, 'comitente' => $result[5]],
                ['col' => 2, 'row' => 14, 'comitente' => $result[6]],
                ['col' => 2, 'row' => 15, 'fCabecera' => $result[7]],
                ['col' => 2, 'row' => 16, 'fCabecera' => $result[8]]
               ];
                    
                    
        }
        if($ids == 12 || $ids == 13){
            $rowsum = end($data);
            array_pop($data);
            $ruwn = ($ids == 12)? count($data) + 7 : count($data) + 1;
            $arrsum = [
                ['col' => 17, 'row' => $ruwn, 'sum' => $rowsum['nominal']],
                ['col' => 18, 'row' => $ruwn, 'sum' => $rowsum['compra']],
                ['col' => 19, 'row' => $ruwn, 'sum' => $rowsum['libros']],
                ['col' => 20, 'row' => $ruwn, 'sum' => $rowsum['valor']],
                ['col' => 31, 'row' => $ruwn, 'sum' => empty($rowsum['provision'])? '0.0' : $rowsum['provision'] ]];             
        }
		if($ids == 14 || $ids == 15){
            $rowsum = end($data);            
            array_pop($data);
            $ruwn = ($ids == 14)? count($data) + 7 : count($data) + 1;
			
			if($ids == 15){
				$arrsum = [
                ['col' => 1, 'row' => $ruwn, 'sum' => $rowsum['capital']],
                ['col' => 2, 'row' => $ruwn, 'sum' => $rowsum['incremento']],
                ['col' => 3, 'row' => $ruwn, 'sum' => $rowsum['suma']],
                ['col' => 0, 'row' => 3, 'fDescripcion' => ''],
                ['col' => 0, 'row' => 1, 'comitente' => '']];    
			}else{
				$arrsum = [
                ['col' => 1, 'row' => $ruwn, 'sum' => $rowsum['capital']],
                ['col' => 2, 'row' => $ruwn, 'sum' => $rowsum['incremento']],
                ['col' => 3, 'row' => $ruwn, 'sum' => $rowsum['suma']],
                ['col' => 0, 'row' => 3, 'fDescripcion' => $fech],
                ['col' => 0, 'row' => 1, 'comitente' => $comitente]];  
			}
        }
        $this->infoRows($sheetData, $arrData['cols'], $data, $arrData['inicio'], $arrData['colInicio']);
		
        if (!empty($fech)) {
            $cabs = $arrData['cabecera'];
            if(!empty($arrsum)){
                $cabs = array_merge($cabs, $arrsum);
            }
            //$this->infoScalar($arrData['cabecera'], $sheetData);
            $this->infoScalar($cabs, $sheetData);
        }
        
        if($ids == '7'){
			switch(count($data)){
				case 0:
					$this->formatRowCol($sheetData, $this->FORMAT_DATE1, 3, count($data) + 9, $fech);
				break;
				case 1:
					$this->formatRowCol($sheetData, $this->FORMAT_DATE1, 3, count($data) + 8, $fech);
				break;
				default:
					$this->formatRowCol($sheetData, $this->FORMAT_DATE1, 3, count($data) + 7, $fech);
				break;
			}
        }
        
        if (isset($arrData['filter'])) {
            $sheetData->setAutoFilter($arrData['filter']);
        }
        $objWriter = \PHPExcel_IOFactory::createWriter($fileExcel, 'Excel2007');
        $objWriter->save($arrData['nombreExcel']);
        echo $arrData['nombreExcel'];
    }

    private function retornoFecha($fecha) {
        $fech = "";
        if (!empty($fecha) && strlen($fecha) >= 10) {
            $fech1 = substr($fecha, 0, 10);
            $arrF = explode("-", $fech1);
            $fech = $arrF[2] . "/" . $arrF[1] . "/" . $arrF[0];
        }
        return $fech;
    }
    public function actionExportarpdf($ids, $fech = "", $fech2 = "") {
        ini_set('memory_limit', '700M');
        ini_set('max_execution_time', 300);
        $rendererName = \PHPExcel_Settings::PDF_RENDERER_MPDF;
        $rendererLibraryPath = Yii::getAlias('@vendor/mpdf/mpdf/');
        $this->ISPDF = true;
        if (!\PHPExcel_Settings::setPdfRenderer($rendererName, $rendererLibraryPath)) {
            throw new BadRequestHttpException('Exportar a pdf con errores');
        }
        $session = Yii::$app->session; 
        $comitente = $session->get('NombreComitente');
		
		$bolEnableExportUp = false;
		$conf = null;
		if($ids==1 || $ids==2){
			$confir = new PorConfiguracionSearch();
			$conf = $confir->obtenerConfig($session->get('PortafolioId'),Yii::$app->user->identity->id);
		}
		
		if($conf!=null && count($conf)>0){
			switch($ids){
				case 1:
					$bolEnableExportUp = $conf[0]["con_rf"];
				break;
				case 2:
					$bolEnableExportUp = $conf[0]["con_rfcc"];
				break;
			}
		}
            
        $arrData = $this->infoMetadata($ids, $fech, $comitente, $fech2,$bolEnableExportUp);
        $fileExcel = \PHPExcel_IOFactory::load((empty($arrData['plantillapdf']))? $arrData['plantilla'] : $arrData['plantillapdf']);        
        $sheetData = $fileExcel->getActiveSheet();
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        //$sheetData->freezePane('B1');
        if($ids == 10){
            $oses = new SesionSearch();
            $data = $oses->listarIngresosp($_GET);
        }
        $this->infoRows($sheetData, $arrData['cols'], $data, $arrData['inicio'], $arrData['colInicio']);
        if (!empty($fech)) {
            $this->infoScalar($arrData['cabecera'], $sheetData);
        }
        $sheetData->setShowGridlines(true);
        if(!empty($arrData['plantillapdf'])){
            $sheetData->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        }
        
        if($ids == '7'){
			switch(count($data)){
				case 0:
					$this->formatRowCol($sheetData, $this->FORMAT_DATE1, 3, count($data) + 9, $fech);
				break;
				case 1:
					$this->formatRowCol($sheetData, $this->FORMAT_DATE1, 3, count($data) + 8, $fech);
				break;
				default:
					$this->formatRowCol($sheetData, $this->FORMAT_DATE1, 3, count($data) + 7, $fech);
				break;
			}
        }
        

        $objWriter = \PHPExcel_IOFactory::createWriter($fileExcel, 'PDF');
        $objWriter->save($arrData['nombrePdf']);
        echo $arrData['nombrePdf'];
    }

    private function generarInfoPortafolio($data, $fecha) {
        $arrData = Json::decode($data, true);
        $fech1 = explode("-", $fecha);
        $str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
            
        $arrFija = [];
        $arrVariable = [];
        foreach ($arrData[0] as $value) {
            if ($value['TipoRenta'] == "RF") {
                $arrFija[] = $value;
            } else {
                $arrVariable[] = $value;
            }
        }
        $path = "tmp/";
        $pathImagen = $path.$arrData[2]["NombreImagen"];
        $nombreExcel = $path.$arrData[2]["NombreExcel"];
        $nombrePdf = $path.$arrData[2]["NombrePDF"];
        
        $dats[] = $arrFija;
        $dats[] = $arrVariable;
        $dats[] = $arrData[1];
        $dats[] = ["imagen" => $pathImagen, "excel" => $nombreExcel, "pdf" => $nombrePdf];
        return Json::encode($dats, true);
    }

    private function exportarImagen($nombreExcel) {
        $exeImagen = Yii::getAlias('@vendor/utils/portafolio/GenerarImagen.exe ');
        $entradaIn = Yii::getAlias('@webroot') . "/" . $nombreExcel;
        $nombreImagen = "tmp/ResumenPortafolio" . date("Ymdhis") . ".jpg";
        $salidaIma = Yii::getAlias('@webroot') . "/" . $nombreImagen;
        exec($exeImagen . " " . $entradaIn . " " . $salidaIma, $output);
        return $nombreImagen;
    }
    
    private function infometaexcel($data, $jarPath, $nombreArchivo, $plantilla, $extra){
        $param = "";
        $i = 27;
        $iRV = 36;
        $itemsRF = 0;
        $itemsRV = 0;
        

        foreach ($data[0] as $value) {
            if($value['TipoRenta']=='RF'){
                $param .= "1_".$i."_".urlencode($value['Grupo'])."-";
                $param .= "2_".$i."_".$value['ValorNominal']."-";
                $param .= "3_".$i."_".($value['Concentracion']/100)."-";
                $param .= "4_".$i."_".($value['RendimientoPromedio']/100)."-";
                $i++;
                $itemsRF++;
            }else{
                $param .= "1_".$iRV."_".urlencode($value['Grupo'])."-";
                $param .= "2_".$iRV."_".$value['ValorNominal']."-";
                $param .= "3_".$iRV."_".($value['Concentracion']/100)."-";
                if($value['RendimientoPromedio']!=null){
                    $param .= "4_".$iRV."_".($value['RendimientoPromedio']/100)."-";
                }else{
                    $param .= "4_".$iRV."_0-";
                }
                $iRV++;
                $itemsRV++;
            }

        }        
        foreach ($data[1] as $value) {
            if($value["TipoDeRenta"]=="Renta Fija"){
                $param .= "4_18_".$value["ValorEfectivo"]."-";
                $param .= "4_20_".$value['Accrual']."-";
            }else{
                $param .= "4_19_".$value["ValorEfectivo"]."-";
            }
        }
                
        $totalJar = $jarPath." ".$param." ".$nombreArchivo." ".$plantilla." ".$itemsRF." ".$itemsRV.$extra;
        
        return $totalJar;
    }

    public function exportarImagenExcel($data, $fech = ""){
        $param = "";
        $i = 27;
        $iRV = 36;
        $itemsRF = 0;
        $itemsRV = 0; 
        

        foreach ($data[0] as $value) {
            if($value['TipoRenta']=='RF'){
                $param .= "1_".$i."_".urlencode($value['Grupo'])."-";
                $param .= "2_".$i."_".$value['ValorNominal']."-";
                $param .= "3_".$i."_".($value['Concentracion']/100)."-";
                $param .= "4_".$i."_".($value['RendimientoPromedio']/100)."-";
                $i++;
                $itemsRF++;
            }else{
                $param .= "1_".$iRV."_".urlencode($value['Grupo'])."-";
                $param .= "2_".$iRV."_".$value['ValorNominal']."-";
                $param .= "3_".$iRV."_".($value['Concentracion']/100)."-";
                if($value['RendimientoPromedio']!=null){
                    $param .= "4_".$iRV."_".($value['RendimientoPromedio']/100)."-";
                }else{
                    $param .= "4_".$iRV."_0-";
                }
                $iRV++;
                $itemsRV++;
            }

        }        
        foreach ($data[1] as $value) {
            if($value["TipoDeRenta"]=="Renta Fija"){
                $param .= "4_18_".$value["ValorEfectivo"]."-";
                $param .= "4_20_".$value['Accrual']."-";
            }else{
                $param .= "4_19_".$value["ValorEfectivo"]."-";
            }
        }
        $jarPath = Yii::getAlias('@vendor/utils/portafolio/LectorExcel.jar');
        $nombreArchivo = "tmp/ResumenPortafolio".date("Ymdhis").".xls";
        $plantilla = Yii::getAlias('@webroot')."/plantilla/ResumenPortafolio.xls";
        $totalJar = $jarPath." ".$param." ".$nombreArchivo." ".$plantilla." ".$itemsRF." ".$itemsRV." ".urlencode($fech)." prb";
        
        exec("java -jar ".$totalJar, $output);
        return $nombreArchivo;
    }

    public function exportarImagenpdf($data, $pathImagen, $fecha){  
        $aweb = Yii::getAlias('@webroot');
        //genero otro xls temporal sin el chart
        $jarPath = Yii::getAlias('@vendor/utils/portafolio/LectorExcelPdf.jar');
        $tmpfile = "tmp/ResumenPortafoliog".date("Ymdhis").".";
        $nombreArchivo = $tmpfile."xls";
        $plantilla = $aweb."/plantilla/ResumenPortafoliog.xls";
        $extra = " ".urlencode($fecha)." ".$aweb."/".$pathImagen;
        $totalJar = $this->infometaexcel($data, $jarPath, $nombreArchivo, $plantilla, $extra);

        exec("java -jar ".$totalJar, $output);
        //genero el pdf con libreoffice
        $conPdf = '"C:\Program Files\LibreOffice 5\program\soffice.exe"';
        exec($conPdf." --headless --convert-to pdf ".$nombreArchivo." -outdir tmp ", $output);
        return $tmpfile."pdf";
    }

    private function getGraficos(){
        return Json::encode(self::$graficos, true);
    }
	private function getGraficosRV(){
        return Json::encode(self::$graficosRV, true);
    }
    public function exportarGraficoExcel($data,$campo,$valor,$titulo,$fecha){
        $exePath = Yii::getAlias('@vendor/utils/exportargrafico/ExportarGrafico.exe');
        $preName = "grafiocoexport".date("Ymdhis");
        $name = Yii::getAlias('@webroot')."/tmp/".$preName;
        $nombreArchivo = $name.".xls";
        $nombreArchivoPara = $name.".txt";
        
        $myfile = fopen($nombreArchivoPara, "w");
        fwrite($myfile, $data);
        fclose($myfile);
        
        exec($exePath.' '.$nombreArchivoPara.' '.$campo.' '.$valor.' "'.htmlentities($titulo).'" '.$nombreArchivo.' "'.$fecha.'"', $output);
        
        return $preName.".xls";
    }
	public function actionUpdate($id)
    {
        if(Yii::$app->request->isAjax){
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post())) {
                $session = Yii::$app->session;             
                if($model->save()){                    
                    return "Exitoso";
                }else{                     
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }
            }else {
                return $this->renderPartial('update', [
                    'model' => $model,
                ]);
            }
        }
    }
     protected function findModel($id)
    {
        if (($model = PorRentaVariable::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }
	public function isEnableUploadTA(){
        try{
            $rest = Yii::$app->session->get('buttons_rm');
            foreach($rest as $item)
            {
                if($item['men_path'] == "#BTN_TBLAMORTIZACION")
                {
                    return 1;
                }
            }
        }catch (\Exception $error) {
            return 0;
        }
        return 0;
    }
	public function isEnableEditRV(){
        try{
            $rest = Yii::$app->session->get('buttons_rm');
            foreach($rest as $item)
            {
                if($item['men_path'] == "#BTN_RV")
                {
                    return 1;
                }
            }
        }catch (\Exception $error) {
            return 0;
        }
        return 0;
    }
	public function isEnableUploadLiq(){
        try{
            $rest = Yii::$app->session->get('buttons_rm');
            foreach($rest as $item)
            {
                if($item['men_path'] == "#BTN_ADDLIQ")
                {
                    return 1;
                }
            }
        }catch (\Exception $error) {
            return 0;
        }
        return 0;
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
	public function getNameFromNumber($num) {
		$numeric = $num % 26;
		$letter = chr(65 + $numeric);
		$num2 = intval($num / 26);
		if ($num2 > 0) {
			return $this->getNameFromNumber($num2 - 1) . $letter;
		} else {
			return $letter;
		}
	}
	public function actionExportarrendimiento($fecha,$fechaFin,$perio){
		if(Yii::$app->request->isAjax){
			
			$data = [];
            $plantilla= 'plantilla/ReporteRendimiento.xlsx';
            $nombreExcel = 'tmp/ReporteRendimiento.xlsx';
            $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
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
			
			$fech1 = explode("-", $fecha);
			$fecha = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
		
			if(isset($fechaFin))
			{
				$fech2 = explode("-", $fechaFin);
				$fecha = "DEL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
				$fecha = $fecha." AL " . $fech2[2] . " DE " . $this->MESES[intval($fech2[1]) - 1] . " DEL " . $fech2[0];
			}
			
			$sheetData->setCellValueByColumnAndRow(0, 31, 'Periodicidad: '.$perio);
			$sheetData->getStyle('A31')->getFont()->setSize(10);
			$sheetData->getStyle('A31')->getFont()->setBold(true);
			
			PHPExcel_Shared_Font::setTrueTypeFontPath('C:/Windows/Fonts/');
			PHPExcel_Shared_Font::setAutoSizeMethod(PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
            
			
			$i = 33;
            $sheetData->setCellValueByColumnAndRow(0, 4, $fecha);
			
			$BStyle = array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
					)
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				),
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'FFC000')
				)
			);
			
			$colTmp = '';
			$titleList = '';
			$contI = 0;
			foreach ($arrinfo['Table'] as $key=>$value) {
				$j = 0;
				$contI = 0;
				$arrTiv[$key] = '';
				foreach($value as $keyval=>$val){
					$contI++;
					
					$colName = $this->getNameFromNumber($j);
					$sheetData->setCellValueByColumnAndRow($j, $i, $keyval);
					$sheetData->getColumnDimension($this->getNameFromNumber($j))->setAutoSize(true);
					
					if($j==0){
						$colTmp = $keyval;
					}
					
					$j++;
					if(($j%10)==0 && count($value)>$contI)
					{
						if($titleList!='')
							$titleList = $titleList.';';
						$titleList = $titleList."RENDIMIENTO!".'$B$'.$i.':$'.$this->getNameFromNumber($j-1).'$'.$i;
						
						
						$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j-1).$i)->getFont()->setSize(10);
						$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j-1).$i)->getFont()->setBold(true);
						$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j-1).$i)->applyFromArray($BStyle);
						
						$i = $i + count($arrinfo['Table']) + 3;
						
						$colName = $this->getNameFromNumber(0);
						$sheetData->setCellValueByColumnAndRow(0, $i, $colTmp);
						$sheetData->getColumnDimension($this->getNameFromNumber(0))->setAutoSize(true);
						
						$j = 1;
					}
				}
				break;
			}
			
			if($titleList!='')
				$titleList = $titleList.';';
			$titleList = $titleList."RENDIMIENTO!".'$B$'.$i.':$'.$this->getNameFromNumber($j-1).'$'.$i;
			
			
			$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j-1).$i)->getFont()->setSize(10);
			$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j-1).$i)->getFont()->setBold(true);
			$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j-1).$i)->applyFromArray($BStyle);
			
			
			
			
			
			$i = 33;
			$i++;
			$iniRows =$i;
			$incre = 0;
			
			$BStyle = array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
					)
				),
			);
			$sheetData->getStyle('A'.$iniRows.':'.$this->getNameFromNumber($j-1).$i)->applyFromArray($BStyle);
			
			$BStyle = array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
					)
				)
			);
			$lastRowsgroup = $iniRows;
			$arrResp = [];
			$lastKey = '';
			foreach ($arrinfo['Table'] as $key=>$value) {
				$lastKey = $key;
				$j = 0;
				$colTmp = '';	
				$i = $iniRows + $incre;	
				$arrResp[$key] = '';
				$contI = 0;
				foreach($value as $keyval=>$val)
				{			
					$contI++;
					if($j>0){
						$sheetData->setCellValueByColumnAndRow($j, $i, ($val/100));
						$sheetData->getStyle($this->getNameFromNumber($j).$i)->getNumberFormat()->applyFromArray( array( 'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE_00));
						$sheetData->getStyle($this->getNameFromNumber($j).$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
					}else{
						$sheetData->setCellValueByColumnAndRow($j, $i, $val);
						$sheetData->getStyle($this->getNameFromNumber($j).$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
					}
					$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j).$i)->applyFromArray($BStyle);
					if($j==0){
						$colTmp = $val;
					}
					
					$j++;
					
					if(($j%10)==0 && count($value)>$contI)
					{
						if($arrResp[$key]!='')
							$arrResp[$key] = $arrResp[$key].';';
						$arrResp[$key] = $arrResp[$key]."RENDIMIENTO".'!$B$'.$i.':$'.$this->getNameFromNumber($j-1).'$'.$i;
						
						$i++;
						if($incre+1==count($arrinfo['Table'])){
							$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j-1).$i)->applyFromArray($BStyle);
							$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j-1).$i)->getFont()->setSize(10);
							$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j-1).$i)->getFont()->setBold(true);
							$sheetData->setCellValueByColumnAndRow(0, $i, 'TOTAL');
							
							for($intContCol=1;$intContCol<$j;$intContCol++){
								$colName = $this->getNameFromNumber($intContCol);
								$sheetData->setCellValueByColumnAndRow($intContCol, $i, '=AVERAGE('.$colName.$iniRows.':'.$colName.($i-1).')');
								$sheetData->getStyle($this->getNameFromNumber($intContCol).$i)->getNumberFormat()->applyFromArray( array( 'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE_00));
							}
							$lastRowsgroup = $i + 3;
							
						}
						
						$i = $i + count($arrinfo['Table']) + 2;
						
						$j = 0; 
						
						
						$sheetData->setCellValueByColumnAndRow($j, $i, $colTmp);
						$sheetData->getStyle($this->getNameFromNumber($j).$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
						
						$j = 1;
					}
				}  
				if($arrResp[$key]!='')
					$arrResp[$key] = $arrResp[$key].';';
				$arrResp[$key] = $arrResp[$key]."RENDIMIENTO".'!$B$'.$i.':$'.$this->getNameFromNumber($j-1).'$'.$i;
				
                $incre++;
            }
			
			/*if($arrResp[$lastKey]!='')
				$arrResp[$lastKey] = $arrResp[$lastKey].';';
			$arrResp[$lastKey] = $arrResp[$lastKey] .'RENDIMIENTO!$B$'.$i.':$'.$this->getNameFromNumber($j-1).'$'.$i;*/
			
			
			$i++;
			$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j-1).$i)->applyFromArray($BStyle);
			$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j-1).$i)->getFont()->setSize(10);
			$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber($j-1).$i)->getFont()->setBold(true);
			
			$sheetData->setCellValueByColumnAndRow(0, $i, 'TOTAL');
			
			for($intContCol=1;$intContCol<$j;$intContCol++){
				$colName = $this->getNameFromNumber($intContCol);
				$sheetData->setCellValueByColumnAndRow($intContCol, $i, '=AVERAGE('.$colName.$lastRowsgroup.':'.$colName.($i-1).')');
				$sheetData->getStyle($this->getNameFromNumber($intContCol).$i)->getNumberFormat()->applyFromArray( array( 'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE_00));
			}
			
			/*foreach ($arrinfo['Table'] as $key=>$value) {
				$j = 0;
				foreach($value as $keyval=>$val){
					if($j>0){
						$colName = $this->getNameFromNumber($j);
						$sheetData->setCellValueByColumnAndRow($j, $i, '=AVERAGE('.$colName.$iniRows.':'.$colName.($i-1).')');
						$sheetData->getStyle($this->getNameFromNumber($j).$i)->getNumberFormat()->applyFromArray( array( 'code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE_00));
					}
					$j++;
				}
				break;
			}*/
			$dataSeriesLabels = array(
            );
			$dataSeriesValues = array(
			);
			$xAxisTickValues = array(
			);
			
			$iGrap = $iniRows;
			$valueSeries = '';
			foreach ($arrinfo['Table'] as $key=>$value) {
				
				array_push($dataSeriesLabels,new \PHPExcel_Chart_DataSeriesValues('String', "'RENDIMIENTO'!".'$A$'.$iGrap, NULL,  ($i-$iniRows-1)));
				array_push($dataSeriesValues,new \PHPExcel_Chart_DataSeriesValues('Number',"'RENDIMIENTO'!".'$B$'.$iGrap.':$'.$this->getNameFromNumber($j-1).'$'.$iGrap, NULL, 13));
				
				if($valueSeries!=''){
					$valueSeries = $valueSeries.'@';
				}
				$valueSeries = $valueSeries.$arrResp[$key];
				
				//array_push($dataSeriesValues,new \PHPExcel_Chart_DataSeriesValues('Number', "('RENDIMIENTO'!".'$B$33,'."'RENDIMIENTO'!".'$B$41)', NULL, 20));			
				
				//array_push($dataSeriesValues,new \PHPExcel_Chart_DataSeriesValues('Number', "'RENDIMIENTO'!".'$B$'.$iGrap.':$'.$this->getNameFromNumber($j-1).'$'.$iGrap, NULL, 20));
				$iGrap++;
			}
			
			
            $xAxisTickValues = array(
                new \PHPExcel_Chart_DataSeriesValues('String', "'RENDIMIENTO'!".'$B$'.($iniRows-1).':$'.$this->getNameFromNumber($j-1).'$'.($iniRows-1), null, 13)
				
            );
			
			/*foreach ($arrinfo['Table'] as $key=>$value) {
				array_push($xAxisTickValues,new \PHPExcel_Chart_DataSeriesValues('Number', $arrTiv[$key], NULL, 20));
			}*/

            $series = new \PHPExcel_Chart_DataSeries(
                \PHPExcel_Chart_DataSeries::TYPE_LINECHART,
                \PHPExcel_Chart_DataSeries::GROUPING_STANDARD,
                range(0, count($dataSeriesValues)-1),
                $dataSeriesLabels,
                $xAxisTickValues,
                $dataSeriesValues
            );
        
            $plotArea = new \PHPExcel_Chart_PlotArea(NULL, array($series));
            $legend = new \PHPExcel_Chart_Legend(\PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);

            $title = new \PHPExcel_Chart_Title('RENDIMIENTO');

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
            //$chart->setTopLeftPosition('A'.($i+3));
            //$chart->setBottomRightPosition('K'.($i+25)); 
			
			$chart->setTopLeftPosition('A6');
            $chart->setBottomRightPosition('K29'); 
            $sheetData->addChart($chart);			
			
			$objWriter = \PHPExcel_IOFactory::createWriter($fileExcel, 'Excel2007');
			$objWriter->setPreCalculateFormulas(false);			
            $objWriter->setIncludeCharts(TRUE);
            $objWriter->save($nombreExcel);
			
			$client = $this->wsdl();
			$paramsR = Array();

			$paramsR['strPath'] = Yii::getAlias('@webroot').'/'.$nombreExcel;
			$paramsR['strValues'] = $valueSeries;
			$paramsR['strLabels'] = $titleList;
			
			$resultado = $client->UpdateCharRendimiento($paramsR);
			
            return $nombreExcel;
		}
	}
    public function actionExportargen(){
        if(Yii::$app->request->isAjax){
                    
            $post = file_get_contents("php://input");
            $data = Json::decode($post, true);
            
            $infoBusqueda = $this->infoCliente();
            
            $params = [];
            $params['intComitenteId'] = trim($infoBusqueda['ComitenteId']); //6070;
            $params['intPortafolioId'] = trim($infoBusqueda['PortafolioId']); //136;
            $params['dtFechaIni'] = $data['fecha'];
            
            $client = $this->wsdl();
            $resultado = $client->ObtenerDatosReporteEstadoCuenta($params);
            $dateEC = Json::decode($resultado->ObtenerDatosReporteEstadoCuentaResult);
			
			$timezone = 'America/Guayaquil';
			
            //$params = Json::decode($post, true);
            if($dateEC!=null)
            {   
				$plantilla= 'plantilla/EstadoCuenta.xlsx';
                $nombreExcel = 'tmp/EstadoCuenta.xlsx';
				
				$confir = new PorConfiguracionSearch();
				$confOp = $confir->obtenerConfig($infoBusqueda['PortafolioId'],Yii::$app->user->identity->id);
				
				$bolEnableRf = false;
				$bolEnableRfCC = false;
				
				if($confOp[0]["con_enable_valoraciones"]=="1"){
					if($confOp[0]["con_rf"]=="1"){
						$bolEnableRf = true;
					}
					if($confOp[0]["con_rfcc"]=="1"){
						$bolEnableRfCC = true;
					}
				}
				
				if($bolEnableRf && $bolEnableRfCC){
					$plantilla= 'plantilla/EstadoCuenta_2val.xlsx';
				}else{
					if($bolEnableRf && !$bolEnableRfCC){
						$plantilla= 'plantilla/EstadoCuenta_val_vm.xlsx';
					}else{
						if(!$bolEnableRf && $bolEnableRfCC){
							$plantilla= 'plantilla/EstadoCuenta_val_ca.xlsx';
						}
					}
				}
				
                $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
                $objReader->setIncludeCharts(TRUE);
                $fileExcel = $objReader->load($plantilla);
				
				//RENTA FIJA
                $sheetData = $fileExcel->getSheet(0);
                
                $session = Yii::$app->session; 
                $comitente = $session->get('NombreComitente');
               
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($data['fecha']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(16, 7, $dateValue);
				$sheetData->getStyle($this->getNameFromNumber(16).'7')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
			   
                if(count($dateEC['Table'])>0)
                {
                    
                    $sheetData->setCellValueByColumnAndRow(0, 2, $comitente);
                    $i = 9;
					$iniI = 9;
                    $fech1 = explode("-", $data['fechaExp']);
                    $str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
                    $sheetData->setCellValueByColumnAndRow(0, 5, $str1);
					
					$sheetData->freezePaneByColumnAndRow(3,$i);

                    if (count($dateEC['Table']) > 2) {
                        $sheetData->insertNewRowBefore($i + 1, count($dateEC['Table']) - 1);
                    }
                    
                    $BStyle = array(
						'borders' => array(
							'top' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
							'bottom' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
						)
					);
				
					$grupoAct = $dateEC['Table'][0]['TipoValor'];
					$initGrup = $i;
					$frmTotal = "";
					
                    foreach ($dateEC['Table'] as $value) {
						
						if($grupoAct != $value['TipoValor']){
							
							$sheetData->insertNewRowBefore($i, 1);
							
							if($bolEnableRf){
								$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
								$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(24, $i, "=SUM(Y".$initGrup.":Y".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(25, $i, "=SUM(Z".$initGrup.":Z".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(29, $i, "=SUM(AD".$initGrup.":AD".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(31, $i, "=SUM(AF".$initGrup.":AF".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(33, $i, "=SUM(AH".$initGrup.":AH".($i-1).')');
							
								$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('Y'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('Y'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('Y'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('Z'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('Z'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('Z'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AD'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AD'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AD'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AF'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AF'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AF'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AH'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AH'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AH'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getRowDimension($i)->setRowHeight(39);
								
								$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(34).$i)->applyFromArray($BStyle);
							}else{
								$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
								$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(24, $i, "=SUM(Y".$initGrup.":Y".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(28, $i, "=SUM(AC".$initGrup.":AC".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(30, $i, "=SUM(AE".$initGrup.":AE".($i-1).')');
								
								$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('Y'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('Y'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('Y'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AC'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AC'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AC'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AE'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AE'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AE'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getRowDimension($i)->setRowHeight(39);
								
								$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(30).$i)->applyFromArray($BStyle);
							}
							
							if($frmTotal!='')
								$frmTotal = $frmTotal.'+';
							$frmTotal = $frmTotal.'#COL#'.$i;
							
							$i++;	
							
							$grupoAct = $value['TipoValor'];
							$initGrup = $i;							
						}
						
                        $sheetData->setCellValueByColumnAndRow(0, $i, $value['Emisor']);
                        $sheetData->setCellValueByColumnAndRow(1, $i, $value['CodigoEmisor']);
                        $sheetData->setCellValueByColumnAndRow(2, $i, $value['SiglasTipoValor']);
                        $sheetData->setCellValueByColumnAndRow(3, $i, $value['Sector']);
                        
						switch($value['Calificadora']){
							case '':
								$sheetData->setCellValueByColumnAndRow(4, $i, 'N/A');
								$sheetData->setCellValueByColumnAndRow(5, $i, 'N/A');
								$sheetData->setCellValueByColumnAndRow(6, $i, 'N/A');
							break;
							case 'NO APLICA':
								$sheetData->setCellValueByColumnAndRow(4, $i, 'N/A');//$value['Valor']
								$sheetData->setCellValueByColumnAndRow(5, $i, 'N/A');//$value['Calificadora']
								$sheetData->setCellValueByColumnAndRow(6, $i, 'N/A');
							break;
							default:
								$sheetData->setCellValueByColumnAndRow(4, $i, $value['Valor']);
								$sheetData->setCellValueByColumnAndRow(5, $i, $value['Calificadora']);
                        
								if($value['Calificadora']!='N/A'){
									$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCalificacion']). ' '. $timezone));
									$sheetData->setCellValueByColumnAndRow(6, $i, $dateValue);
								}else{
									$sheetData->setCellValueByColumnAndRow(6, $i, "N/A");
								}
							break;
						}
						
                        $sheetData->setCellValueByColumnAndRow(7, $i, $value['Numeracion']);
                        $sheetData->setCellValueByColumnAndRow(8, $i, $value['Custodio']);
                        $sheetData->setCellValueByColumnAndRow(9, $i, $value['Cantidad']);
                        $sheetData->setCellValueByColumnAndRow(10, $i, $value['ValorNominalUnitario']);
                        $sheetData->setCellValueByColumnAndRow(11, $i, "=K".$i."*J".$i);
						
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCompra']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(12, $i, $dateValue);
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaEmision']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(13, $i, $dateValue);
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaVencimiento']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(14, $i, $dateValue);
                        
						$sheetData->setCellValueByColumnAndRow(15, $i, $value['PlazoTotal']);
						$sheetData->setCellValueByColumnAndRow(16, $i, $value['DiasTranscurridos']);
						$sheetData->setCellValueByColumnAndRow(17, $i, $value['PlazoVencer']);
						
						
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaAcrual']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(18, $i, $dateValue);
						
						$sheetData->setCellValueByColumnAndRow(19, $i, $value['DiasAcrual']);
						$sheetData->setCellValueByColumnAndRow(20, $i, $value['TituloRendimiento']/100);						
						$sheetData->setCellValueByColumnAndRow(21, $i, $value['RendimientoOperacion']/100);
						$sheetData->setCellValueByColumnAndRow(22, $i, $value['YieldToMaturity']/100);
						$sheetData->setCellValueByColumnAndRow(23, $i, $value['TituloTasaInteres']/100);
						$sheetData->setCellValueByColumnAndRow(24, $i, $value['InteresAcumulado']);
						
						$intAjustcol = 0;
						if($bolEnableRf){
							$sheetData->setCellValueByColumnAndRow(25, $i, $value['InteresesAcumuladosCA']);
							$intAjustcol = 1;
						}
						
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaInteres']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(25+$intAjustcol, $i, $dateValue);
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCapital']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(26+$intAjustcol, $i, $dateValue);
						
						$sheetData->setCellValueByColumnAndRow(27+$intAjustcol, $i, $value['TituloPrecioSpot']/100);
						$sheetData->setCellValueByColumnAndRow(28+$intAjustcol, $i, "=(L".$i."*AB".$i.")");
						if($bolEnableRf){
							$sheetData->setCellValueByColumnAndRow(28+$intAjustcol, $i, "=(L".$i."*AC".$i.")");
						}
						
						$sheetData->getStyle($this->getNameFromNumber(6).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						$sheetData->getStyle($this->getNameFromNumber(12).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						$sheetData->getStyle($this->getNameFromNumber(13).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						$sheetData->getStyle($this->getNameFromNumber(14).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						$sheetData->getStyle($this->getNameFromNumber(18).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						$sheetData->getStyle($this->getNameFromNumber(25+$intAjustcol).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						$sheetData->getStyle($this->getNameFromNumber(26+$intAjustcol).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						
						if($bolEnableRf){
							$sheetData->setCellValueByColumnAndRow(29 + $intAjustcol, $i, $value['PorcentajeCostoAmortizado']/100);
							$sheetData->setCellValueByColumnAndRow(30 + $intAjustcol, $i, "=(L".$i."*AE".$i.")");
							$intAjustcol = 3;
						}
						
						$sheetData->setCellValueByColumnAndRow(29 + $intAjustcol, $i, $value['PrecioCompra']/100);
						$sheetData->setCellValueByColumnAndRow(30 + $intAjustcol, $i, $value['ValorEfectivoCompraActual']);
						$sheetData->setCellValueByColumnAndRow(31 + $intAjustcol, $i, $value['DuracionModificada']);
						
                        $i++;
                    }
					
					$grupoAct = $value['TipoValor'];
					
					$sheetData->insertNewRowBefore($i, 1);
							
					if($bolEnableRf){
						$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
						$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(24, $i, "=SUM(Y".$initGrup.":Y".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(25, $i, "=SUM(Z".$initGrup.":Z".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(29, $i, "=SUM(AD".$initGrup.":AD".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(31, $i, "=SUM(AF".$initGrup.":AF".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(33, $i, "=SUM(AH".$initGrup.":AH".($i-1).')');
					
						$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('Y'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('Y'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('Y'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('Z'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('Z'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('Z'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AD'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AD'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AD'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AF'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AF'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AF'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AH'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AH'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AH'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getRowDimension($i)->setRowHeight(39);
						
						$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(34).$i)->applyFromArray($BStyle);
						
						if($frmTotal!='')
							$frmTotal = $frmTotal.'+';
						$frmTotal = $frmTotal.'#COL#'.$i;
						
						$i++;	
						
						$sheetData->setCellValueByColumnAndRow(11, $i, "=".str_replace("#COL#","L",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(24, $i, "=".str_replace("#COL#","Y",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(25, $i, "=".str_replace("#COL#","Z",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(29, $i, "=".str_replace("#COL#","AD",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(31, $i, "=".str_replace("#COL#","AF",$frmTotal));		
						$sheetData->setCellValueByColumnAndRow(33, $i, "=".str_replace("#COL#","AH",$frmTotal));		
					}else{
						$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
						$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(24, $i, "=SUM(Y".$initGrup.":Y".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(28, $i, "=SUM(AC".$initGrup.":AC".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(30, $i, "=SUM(AE".$initGrup.":AE".($i-1).')');
					
						$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('Y'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('Y'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('Y'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AC'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AC'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AC'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AE'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AE'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AE'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getRowDimension($i)->setRowHeight(39);
						
						$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(30).$i)->applyFromArray($BStyle);
						
						if($frmTotal!='')
							$frmTotal = $frmTotal.'+';
						$frmTotal = $frmTotal.'#COL#'.$i;
						
						$i++;	
						
						$sheetData->setCellValueByColumnAndRow(11, $i, "=".str_replace("#COL#","L",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(24, $i, "=".str_replace("#COL#","Y",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(28, $i, "=".str_replace("#COL#","AC",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(30, $i, "=".str_replace("#COL#","AE",$frmTotal));
					}				
                }
				
				
				//RENTA FIJA COSTO AMORTIZADO
                
                $sheetData = $fileExcel->getSheet(1);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($data['fecha']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(16, 8, $dateValue);
				$sheetData->getStyle($this->getNameFromNumber(16).'8')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
			   
				$i = 10;
					
				$sheetData->freezePaneByColumnAndRow(3,$i);
				
				$sheetData->setCellValueByColumnAndRow(0, 4, $comitente);
				$i = 10;
				$iniI = 10;
				$fech1 = explode("-", $data['fechaExp']);
				$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
				$sheetData->setCellValueByColumnAndRow(0, 6, $str1);
			   
                if(count($dateEC['Table1'])>0)
                {
                    

                    if (count($dateEC['Table1']) > 2) {
                        $sheetData->insertNewRowBefore($i + 1, count($dateEC['Table1']) - 1);
                    }
                    
                    $BStyle = array(
						'borders' => array(
							'top' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
							'bottom' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
						)
					);
				
					$grupoAct = $dateEC['Table1'][0]['TipoValor'];
					$initGrup = $i;
					$frmTotal = "";
					
                    foreach ($dateEC['Table1'] as $value) {
						
						if($grupoAct != $value['TipoValor']){
							
							$sheetData->insertNewRowBefore($i, 1);
							$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
							
							if($bolEnableRfCC){
								$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(24, $i, "=SUM(Y".$initGrup.":Y".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(25, $i, "=SUM(Z".$initGrup.":Z".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(26, $i, "=SUM(AA".$initGrup.":AA".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(30, $i, "=SUM(AE".$initGrup.":AE".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(32, $i, "=SUM(AG".$initGrup.":AG".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(33, $i, "=SUM(AH".$initGrup.":AH".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(34, $i, "=SUM(AI".$initGrup.":AI".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(35, $i, "=SUM(AJ".$initGrup.":AJ".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(36, $i, "=SUM(AK".$initGrup.":AK".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(38, $i, "=SUM(AM".$initGrup.":AM".($i-1).')');
								
								
								$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('Y'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('Y'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('Y'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('Z'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('Z'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('Z'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AA'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AA'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AA'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AE'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AE'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AE'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AG'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AG'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AG'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AH'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AH'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AH'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

								$sheetData->getStyle('AI'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AI'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AI'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AJ'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AJ'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AJ'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AK'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AK'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AK'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AM'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AM'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AM'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getRowDimension($i)->setRowHeight(41);
								
								$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(39).$i)->applyFromArray($BStyle);
								
								if($frmTotal!='')
									$frmTotal = $frmTotal.'+';
								$frmTotal = $frmTotal.'#COL#'.$i;
								
							}else{
								
								$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(24, $i, "=SUM(Y".$initGrup.":Y".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(25, $i, "=SUM(Z".$initGrup.":Z".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(29, $i, "=SUM(AD".$initGrup.":AD".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(30, $i, "=SUM(AE".$initGrup.":AE".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(31, $i, "=SUM(AF".$initGrup.":AF".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(32, $i, "=SUM(AG".$initGrup.":AG".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(33, $i, "=SUM(AH".$initGrup.":AH".($i-1).')');
								$sheetData->setCellValueByColumnAndRow(35, $i, "=SUM(AJ".$initGrup.":AJ".($i-1).')');
								
								$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('Y'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('Y'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('Y'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('Z'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('Z'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('Z'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AD'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AD'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AD'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AE'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AE'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AE'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AF'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AF'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AF'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AG'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AG'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AG'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AH'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AH'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AH'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								
								$sheetData->getStyle('AJ'.$i)->getFont()->setSize(10);
								$sheetData->getStyle('AJ'.$i)->getFont()->setBold(true);
								$sheetData->getStyle('AJ'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
								
								$sheetData->getRowDimension($i)->setRowHeight(41);
								
								$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(36).$i)->applyFromArray($BStyle);
								
								if($frmTotal!='')
									$frmTotal = $frmTotal.'+';
								$frmTotal = $frmTotal.'#COL#'.$i;
							}
							
							
							$i++;	
							
							$grupoAct = $value['TipoValor'];
							$initGrup = $i;							
						}
						
                        $sheetData->setCellValueByColumnAndRow(0, $i, $value['Emisor']);
                        $sheetData->setCellValueByColumnAndRow(1, $i, $value['CodigoEmisor']);
                        $sheetData->setCellValueByColumnAndRow(2, $i, $value['SiglasTipoValor']);
                        $sheetData->setCellValueByColumnAndRow(3, $i, $value['Sector']);
                        
						
						switch($value['Calificadora']){
							case '':
								$sheetData->setCellValueByColumnAndRow(4, $i, 'N/A');
								$sheetData->setCellValueByColumnAndRow(5, $i, 'N/A');
								$sheetData->setCellValueByColumnAndRow(6, $i, "N/A");
							break;
							case 'NO APLICA':
								$sheetData->setCellValueByColumnAndRow(4, $i, 'N/A');//$value['Valor']
								$sheetData->setCellValueByColumnAndRow(5, $i, 'N/A');//$value['Calificadora']
								$sheetData->setCellValueByColumnAndRow(6, $i, "N/A");
							break;
							default:
								$sheetData->setCellValueByColumnAndRow(4, $i, $value['Valor']);
								$sheetData->setCellValueByColumnAndRow(5, $i, $value['Calificadora']);
                        
								if($value['Calificadora']!='N/A'){
									$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCalificacion']). ' '. $timezone));
									$sheetData->setCellValueByColumnAndRow(6, $i, $dateValue);
								}else{
									$sheetData->setCellValueByColumnAndRow(6, $i, "N/A");
								}
								
							break;
						}
						
                        $sheetData->setCellValueByColumnAndRow(7, $i, $value['Numeracion']);
                        $sheetData->setCellValueByColumnAndRow(8, $i, $value['Custodio']);
                        $sheetData->setCellValueByColumnAndRow(9, $i, $value['Cantidad']);
                        $sheetData->setCellValueByColumnAndRow(10, $i, $value['ValorNominalUnitario']);
                        $sheetData->setCellValueByColumnAndRow(11, $i, "=K".$i."*J".$i);
						
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCompra']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(12, $i, $dateValue);
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaEmision']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(13, $i, $dateValue);
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaVencimiento']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(14, $i, $dateValue);
                        
						$sheetData->setCellValueByColumnAndRow(15, $i, $value['PlazoTotal']);
						$sheetData->setCellValueByColumnAndRow(16, $i, $value['DiasTranscurridos']);
						$sheetData->setCellValueByColumnAndRow(17, $i, $value['PlazoVencer']);
						
						
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaAcrual']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(18, $i, $dateValue);
						
						$sheetData->setCellValueByColumnAndRow(19, $i, $value['DiasAcrual']);
						$sheetData->setCellValueByColumnAndRow(20, $i, $value['RendimientoOperacion']/100);
						$sheetData->setCellValueByColumnAndRow(21, $i, $value['TituloRendimiento']/100);
						$sheetData->setCellValueByColumnAndRow(22, $i, $value['YieldToMaturity']/100);
						$sheetData->setCellValueByColumnAndRow(23, $i, $value['TituloTasaInteres']/100);
						$sheetData->setCellValueByColumnAndRow(24, $i, $value['InteresTotal']);
						$sheetData->setCellValueByColumnAndRow(25, $i, $value['InteresAcumulado']);
						
						$intAjustcol = 0;
						if($bolEnableRfCC){
							$sheetData->setCellValueByColumnAndRow(26, $i, $value['InteresesAcumuladosVM']);
							$intAjustcol = 1;
						}
						
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaInteres']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(26 + $intAjustcol, $i, $dateValue);
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCapital']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(27 + $intAjustcol, $i, $dateValue);
						
						$sheetData->setCellValueByColumnAndRow(28 + $intAjustcol, $i, $value['PorcentajeCosto']/100);
						$sheetData->setCellValueByColumnAndRow(29 + $intAjustcol, $i, $value['CostoAmortizado']);
						
						
						//$sheetData->getStyle($this->getNameFromNumber(6).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						$sheetData->getStyle($this->getNameFromNumber(12).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						$sheetData->getStyle($this->getNameFromNumber(13).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						$sheetData->getStyle($this->getNameFromNumber(14).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						$sheetData->getStyle($this->getNameFromNumber(18).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						$sheetData->getStyle($this->getNameFromNumber(26 + $intAjustcol).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						$sheetData->getStyle($this->getNameFromNumber(27 + $intAjustcol).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
						
						if($bolEnableRfCC){
							$sheetData->setCellValueByColumnAndRow(30 + $intAjustcol, $i, $value['PrecioMercadoVM']/100);
							$sheetData->setCellValueByColumnAndRow(31 + $intAjustcol, $i, $value['ValorMercadoVM']);
							$intAjustcol = 3;
						}
						
						$sheetData->setCellValueByColumnAndRow(30 + $intAjustcol, $i, $value['CostosIncurridos']);
						$sheetData->setCellValueByColumnAndRow(31 + $intAjustcol, $i, $value['CostosPorAmortizar']);
						$sheetData->setCellValueByColumnAndRow(32 + $intAjustcol, $i, $value['InteresTranscurrido']);
						$sheetData->setCellValueByColumnAndRow(33 + $intAjustcol, $i, $value['RendimientoOperacionValor']);
						
						
						//$sheetData->setCellValueByColumnAndRow(32, $i, $value['TituloPrecioSpot']/100);
						//$sheetData->setCellValueByColumnAndRow(33, $i, "=(L".$i."*AA".$i.")");
						$sheetData->setCellValueByColumnAndRow(34 + $intAjustcol, $i, $value['PrecioCompra']/100);
						$sheetData->setCellValueByColumnAndRow(35 + $intAjustcol, $i, "=AI".$i."*L".$i);
						$sheetData->setCellValueByColumnAndRow(36 + $intAjustcol, $i, $value['DuracionModificada']);
						
                        $i++;
                    }
					
					$grupoAct = $value['TipoValor'];
					
					$sheetData->insertNewRowBefore($i, 1);
							
					if($bolEnableRfCC){
						$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
						$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(24, $i, "=SUM(Y".$initGrup.":Y".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(25, $i, "=SUM(Z".$initGrup.":Z".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(26, $i, "=SUM(AA".$initGrup.":AA".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(30, $i, "=SUM(AE".$initGrup.":AE".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(32, $i, "=SUM(AG".$initGrup.":AG".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(33, $i, "=SUM(AH".$initGrup.":AH".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(34, $i, "=SUM(AI".$initGrup.":AI".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(35, $i, "=SUM(AJ".$initGrup.":AJ".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(36, $i, "=SUM(AK".$initGrup.":AK".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(38, $i, "=SUM(AM".$initGrup.":AM".($i-1).')');
						
						
						$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('Y'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('Y'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('Y'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('Z'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('Z'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('Z'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AA'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AA'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AA'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AE'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AE'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AE'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AG'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AG'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AG'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AH'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AH'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AH'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

						$sheetData->getStyle('AI'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AI'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AI'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AJ'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AJ'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AJ'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AK'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AK'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AK'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AM'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AM'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AM'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getRowDimension($i)->setRowHeight(41);
						
						$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(39).$i)->applyFromArray($BStyle);
						
						if($frmTotal!='')
							$frmTotal = $frmTotal.'+';
						$frmTotal = $frmTotal.'#COL#'.$i;
						
						$i++;	
						
						$sheetData->setCellValueByColumnAndRow(11, $i, "=".str_replace("#COL#","L",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(24, $i, "=".str_replace("#COL#","Y",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(25, $i, "=".str_replace("#COL#","Z",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(26, $i, "=".str_replace("#COL#","AA",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(30, $i, "=".str_replace("#COL#","AE",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(32, $i, "=".str_replace("#COL#","AG",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(33, $i, "=".str_replace("#COL#","AH",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(34, $i, "=".str_replace("#COL#","AI",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(35, $i, "=".str_replace("#COL#","AJ",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(36, $i, "=".str_replace("#COL#","AK",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(38, $i, "=".str_replace("#COL#","AM",$frmTotal));
					}else{
						$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
						$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(24, $i, "=SUM(Y".$initGrup.":Y".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(25, $i, "=SUM(Z".$initGrup.":Z".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(29, $i, "=SUM(AD".$initGrup.":AD".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(30, $i, "=SUM(AE".$initGrup.":AE".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(31, $i, "=SUM(AF".$initGrup.":AF".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(32, $i, "=SUM(AG".$initGrup.":AG".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(33, $i, "=SUM(AH".$initGrup.":AH".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(35, $i, "=SUM(AJ".$initGrup.":AJ".($i-1).')');
						
						
						$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('Y'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('Y'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('Y'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('Z'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('Z'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('Z'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AD'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AD'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AD'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AE'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AE'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AE'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AF'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AF'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AF'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AG'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AG'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AG'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AH'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AH'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AH'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getStyle('AJ'.$i)->getFont()->setSize(10);
						$sheetData->getStyle('AJ'.$i)->getFont()->setBold(true);
						$sheetData->getStyle('AJ'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						
						$sheetData->getRowDimension($i)->setRowHeight(41);
						
						$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(36).$i)->applyFromArray($BStyle);
						
						if($frmTotal!='')
							$frmTotal = $frmTotal.'+';
						$frmTotal = $frmTotal.'#COL#'.$i;
						
						$i++;	
						
						$sheetData->setCellValueByColumnAndRow(11, $i, "=".str_replace("#COL#","L",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(24, $i, "=".str_replace("#COL#","Y",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(25, $i, "=".str_replace("#COL#","Z",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(29, $i, "=".str_replace("#COL#","AD",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(30, $i, "=".str_replace("#COL#","AE",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(31, $i, "=".str_replace("#COL#","AF",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(32, $i, "=".str_replace("#COL#","AG",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(33, $i, "=".str_replace("#COL#","AF",$frmTotal));
						$sheetData->setCellValueByColumnAndRow(35, $i, "=".str_replace("#COL#","AJ",$frmTotal));
					}
					
                }
				
				//Renta variabLe 
				$i = 9;
				$sheetData = $fileExcel->getSheet(2);
				
				$sheetData->setCellValueByColumnAndRow(0, 2, $comitente);
				$i = 7;
				$iniI = 7;
				$fech1 = explode("-", $data['fechaExp']);
				$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
				$sheetData->setCellValueByColumnAndRow(0, 4, $str1);

				
                if(count($dateEC['Table2'])>0)
                {
                    
                    
                    if (count($dateEC['Table2']) >= 2) {
                        $sheetData->insertNewRowBefore($i + 1, count($dateEC['Table2']) - 1);
                    }
                    
                    $BStyle = array(
						'borders' => array(
							'top' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
							'bottom' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
						)
					);
				
					$grupoAct = $dateEC['Table2'][0]['TipoValor'];
					$initGrup = $i;
					$frmTotal = "";
					
					
                    foreach ($dateEC['Table2'] as $value) {
						if($grupoAct != $value['TipoValor']){
							
							$sheetData->insertNewRowBefore($i, 1);
							
							$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
							$sheetData->setCellValueByColumnAndRow(5, $i, "=SUM(F".$initGrup.":F".($i-1).')');
							$sheetData->setCellValueByColumnAndRow(7, $i, "=SUM(H".$initGrup.":H".($i-1).')');
							$sheetData->setCellValueByColumnAndRow(9, $i, "=SUM(J".$initGrup.":J".($i-1).')');
							
							$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
							$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
							$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
							
							$sheetData->getStyle('F'.$i)->getFont()->setSize(10);
							$sheetData->getStyle('F'.$i)->getFont()->setBold(true);
							$sheetData->getStyle('F'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
							
							
							$sheetData->getStyle('H'.$i)->getFont()->setSize(10);
							$sheetData->getStyle('H'.$i)->getFont()->setBold(true);
							$sheetData->getStyle('H'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
							
							$sheetData->getStyle('J'.$i)->getFont()->setSize(10);
							$sheetData->getStyle('J'.$i)->getFont()->setBold(true);
							$sheetData->getStyle('J'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
							
							$sheetData->getRowDimension($i)->setRowHeight(39);
							
							$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(11).$i)->applyFromArray($BStyle);
							
							if($frmTotal!='')
								$frmTotal = $frmTotal.'+';
							$frmTotal = $frmTotal.'#COL#'.$i;
							
							$i++;	
							
							$grupoAct = $value['TipoValor'];
							$initGrup = $i;							
						}
						
                        $sheetData->setCellValueByColumnAndRow(0, $i, $value['Emisor']);
                        $sheetData->setCellValueByColumnAndRow(1, $i, $value['CodigoEmisor']);
                        $sheetData->setCellValueByColumnAndRow(2, $i, $value['TipoValor']);
                        $sheetData->setCellValueByColumnAndRow(3, $i, $value['Sector']);
                        $sheetData->setCellValueByColumnAndRow(4, $i, $value['Custodio']);
						$sheetData->setCellValueByColumnAndRow(5, $i, $value['Cantidad']);
						$sheetData->setCellValueByColumnAndRow(6, $i, $value['ValorNominalUnitario']);
						$sheetData->setCellValueByColumnAndRow(7, $i, "=F".$i."*G".$i);
						$sheetData->setCellValueByColumnAndRow(8, $i, $value['TituloPrecioSpot']);
						$sheetData->setCellValueByColumnAndRow(9, $i, "=F".$i."*I".$i);
						$sheetData->setCellValueByColumnAndRow(10, $i, $value['DividendoAccion']);
						$sheetData->setCellValueByColumnAndRow(11, $i, $value['DividendoEfectivo']);
						
						$i++;
						
					}
					$sheetData->insertNewRowBefore($i, 1);
							
					$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
					$sheetData->setCellValueByColumnAndRow(5, $i, "=SUM(F".$initGrup.":F".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(7, $i, "=SUM(H".$initGrup.":H".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(9, $i, "=SUM(J".$initGrup.":J".($i-1).')');
					
					$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('F'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('F'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('F'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					
					$sheetData->getStyle('H'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('H'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('H'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('J'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('J'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('J'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getRowDimension($i)->setRowHeight(39);
					
					$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(11).$i)->applyFromArray($BStyle);
					
					if($frmTotal!='')
						$frmTotal = $frmTotal.'+';
					$frmTotal = $frmTotal.'#COL#'.$i;
					
					$i++;	
					
					$sheetData->setCellValueByColumnAndRow(5, $i, "=".str_replace("#COL#","F",$frmTotal));
					$sheetData->setCellValueByColumnAndRow(7, $i, "=".str_replace("#COL#","H",$frmTotal));
					$sheetData->setCellValueByColumnAndRow(9, $i, "=".str_replace("#COL#","J",$frmTotal));
					
				}
				
				//CREDITOS
				
				$i = 7;
				$sheetData = $fileExcel->getSheet(4);
				$sheetData->setCellValueByColumnAndRow(0, 2, $comitente);
				$i = 7;
				$iniI = 7;
				$fech1 = explode("-", $data['fechaExp']);
				$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
				$sheetData->setCellValueByColumnAndRow(0, 4, $str1);

				
                if(count($dateEC['Table3'])>0)
                {
                    
                    //$sheetData->setCellValueByColumnAndRow(0, 2, $comitente);
                    $i = 7;
					$iniI = 7;

                    if (count($dateEC['Table3']) > 2) {
                        $sheetData->insertNewRowBefore($i + 1, count($dateEC['Table3']) - 1);
                    }
                    
                    $BStyle = array(
						'borders' => array(
							'top' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
							'bottom' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
						)
					);
				
					$grupoAct = $dateEC['Table3'][0]['TipoValor'];
					$initGrup = $i;
					$frmTotal = "";
					
					
                    foreach ($dateEC['Table3'] as $value) {
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaVencimiento']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(0, $i, $dateValue);
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaDePago']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(1, $i, $dateValue);
						
						$sheetData->setCellValueByColumnAndRow(2, $i, $value['Emisor']);
                        $sheetData->setCellValueByColumnAndRow(3, $i, $value['TipoValor']);
                        $sheetData->setCellValueByColumnAndRow(4, $i, $value['TituloTasaInteres']);
                        $sheetData->setCellValueByColumnAndRow(5, $i, $value['VencimientoCapital']);
						$sheetData->setCellValueByColumnAndRow(6, $i, $value['VencimientoInteres']);
						$sheetData->setCellValueByColumnAndRow(7, $i, $value['Retencion']);
						$sheetData->setCellValueByColumnAndRow(8, $i, "=F".$i."+G".$i."-H".$i);
						$sheetData->setCellValueByColumnAndRow(9, $i, $value['NumeroDeCuenta']);
						$sheetData->setCellValueByColumnAndRow(10, $i, $value['Banco']);
						$sheetData->setCellValueByColumnAndRow(11, $i, $value['Observaciones']);
						
						$i++;
					}
					$sheetData->setCellValueByColumnAndRow(5, $i, "=SUM(F".$iniI.":F".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(6, $i, "=SUM(G".$iniI.":G".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(7, $i, "=SUM(H".$iniI.":H".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(8, $i, "=SUM(I".$iniI.":I".($i-1).')');
				}
				
				//NEGOCIACIONES
				$i = 7;
				$sheetData = $fileExcel->getSheet(5);
				$sheetData->setCellValueByColumnAndRow(0, 2, $comitente);
				$i = 7;
				$iniI = 7;
				$fech1 = explode("-", $data['fechaExp']);
				$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
				$sheetData->setCellValueByColumnAndRow(0, 4, $str1);
				
                if(count($dateEC['Table4'])>0)
                {
                    $i = 7;
					$iniI = 7;

                    if (count($dateEC['Table4']) > 2) {
                        $sheetData->insertNewRowBefore($i + 1, count($dateEC['Table4']) - 1);
                    }
                    
                    $BStyle = array(
						'borders' => array(
							'top' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
							'bottom' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
						)
					);
				
					
                    foreach ($dateEC['Table4'] as $value) {
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaVencimiento']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(0, $i, $dateValue);
						$sheetData->setCellValueByColumnAndRow(1, $i, $value['NumeroDeLiquidacion']);
						$sheetData->setCellValueByColumnAndRow(2, $i, $value['CompraVenta']);
						$sheetData->setCellValueByColumnAndRow(3, $i, $value['Emisor']);
						$sheetData->setCellValueByColumnAndRow(4, $i, $value['SiglasTipoValor']);
						$sheetData->setCellValueByColumnAndRow(5, $i, $value['Cantidad']);
						$sheetData->setCellValueByColumnAndRow(6, $i, $value['ValorNominalTotal']);
						$sheetData->setCellValueByColumnAndRow(7, $i, $value['TituloPrecioSpot']/100);
						$sheetData->setCellValueByColumnAndRow(8, $i, $value['ValorEfectivo']);
						$sheetData->setCellValueByColumnAndRow(9, $i, $value['ComisionBolsa']);
						$sheetData->setCellValueByColumnAndRow(10, $i, $value['ComisionOperador']);
						$sheetData->setCellValueByColumnAndRow(11, $i, $value['ComisionTotal']);
						$sheetData->setCellValueByColumnAndRow(12, $i, $value['InteresTranscurrido']);
						$sheetData->setCellValueByColumnAndRow(13, $i, $value['ValorTotal']);
						//$sheetData->setCellValueByColumnAndRow(13, $i, $value['RetencionBVQ']);
						//$sheetData->setCellValueByColumnAndRow(14, $i, $value['ValorTotal']);
						
						$i++;
					}
					$sheetData->setCellValueByColumnAndRow(5, $i, "=SUM(F".$iniI.":F".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(6, $i, "=SUM(G".$iniI.":G".($i-1).')');
					//$sheetData->setCellValueByColumnAndRow(5, $i, "=SUM(I".$iniI.":I".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(8, $i, "=SUM(I".$iniI.":I".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(9, $i, "=SUM(J".$iniI.":J".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(10, $i, "=SUM(K".$iniI.":K".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$iniI.":L".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(12, $i, "=SUM(M".$iniI.":M".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(13, $i, "=SUM(N".$iniI.":N".($i-1).')');
				}
				
				//Titulos en transito
				$sheetData = $fileExcel->getSheet(6);
				$sheetData->setCellValueByColumnAndRow(1, 2, $comitente);
				$i = 7;
				$iniI = 7;
				$fech1 = explode("-", $data['fechaExp']);
				$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
				$sheetData->setCellValueByColumnAndRow(1, 4, $str1);
				
				$i = 8;
				//$sheetData->setCellValueByColumnAndRow(0, 2, $comitente." TITTITITIT ".count($dateEC['Table6']));
                if(count($dateEC['Table6'])>0)
                {
                    $i = 8;
					$iniI = 8;

                    if (count($dateEC['Table6']) >= 2) {
                        $sheetData->insertNewRowBefore($i + 1, count($dateEC['Table6']) - 1);
                    }
                    
                    $BStyle = array(
						'borders' => array(
							'top' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
							'bottom' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
						)
					);
				
					
                    foreach ($dateEC['Table6'] as $value) {
						
						$sheetData->setCellValueByColumnAndRow(1, $i, $value['Emisor']);
						$sheetData->setCellValueByColumnAndRow(2, $i, $value['Numeracion']);
						$sheetData->setCellValueByColumnAndRow(3, $i, $value['ValorNominal']);
						$sheetData->setCellValueByColumnAndRow(4, $i, $value['Tipo']);
						$sheetData->setCellValueByColumnAndRow(5, $i, $value['Observaciones']);
						$i++;
					}
					$sheetData->setCellValueByColumnAndRow(3, $i, "=SUM(D".$iniI.":D".($i-1).')');
				}
				
				//Titulos en vendidos
				$sheetData = $fileExcel->getSheet(7);
				$sheetData->setCellValueByColumnAndRow(1, 2, $comitente);
				$i = 7;
				$iniI = 7;
				$fech1 = explode("-", $data['fechaExp']);
				$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
				$sheetData->setCellValueByColumnAndRow(1, 4, $str1);
				$i = 8;
				//$sheetData->setCellValueByColumnAndRow(0, 2, $comitente." vendidos ".count($dateEC['Table7']));
                if(count($dateEC['Table7'])>0)
                {
                    $i = 8;
					$iniI = 8;

                    if (count($dateEC['Table7']) >= 2) {
                        $sheetData->insertNewRowBefore($i + 1, count($dateEC['Table7']) - 1);
                    }
                    
                    $BStyle = array(
						'borders' => array(
							'top' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
							'bottom' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
						)
					);
				
					
                    foreach ($dateEC['Table7'] as $value) {
						$sheetData->setCellValueByColumnAndRow(1, $i, $value['Emisor']);
						$sheetData->setCellValueByColumnAndRow(2, $i, $value['Numeracion']);
						$sheetData->setCellValueByColumnAndRow(3, $i, $value['ValorNominal']);
						$sheetData->setCellValueByColumnAndRow(4, $i, $value['Tipo']);
						$sheetData->setCellValueByColumnAndRow(5, $i, $value['Observaciones']);
						$i++;
					}
					$sheetData->setCellValueByColumnAndRow(3, $i, "=SUM(D".$iniI.":D".($i-1).')');
				}
				
				//Titulos en vendidos
				$sheetData = $fileExcel->getSheet(8);
				$sheetData->setCellValueByColumnAndRow(1, 2, $comitente);
				$i = 7;
				$iniI = 7;
				$fech1 = explode("-", $data['fechaExp']);
				$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
				$sheetData->setCellValueByColumnAndRow(1, 4, $str1);
				$i = 8;
				//$sheetData->setCellValueByColumnAndRow(0, 2, $comitente." pagos ".count($dateEC['Table7']));
                if(count($dateEC['Table8'])>0)
                {
                    $i = 8;
					$iniI = 8;

                    if (count($dateEC['Table8']) >= 2) {
                        $sheetData->insertNewRowBefore($i + 1, count($dateEC['Table8']) - 1);
                    }
                    
                    $BStyle = array(
						'borders' => array(
							'top' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
							'bottom' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
						)
					);
				
					
                    foreach ($dateEC['Table8'] as $value) {
						$sheetData->setCellValueByColumnAndRow(1, $i, $value['Emisor']);
						$sheetData->setCellValueByColumnAndRow(2, $i, $value['Numeracion']);
						$sheetData->setCellValueByColumnAndRow(3, $i, $value['ValorNominal']);
						$sheetData->setCellValueByColumnAndRow(4, $i, $value['Tipo']);
						$sheetData->setCellValueByColumnAndRow(5, $i, $value['Observaciones']);
						$i++;
					}
					$sheetData->setCellValueByColumnAndRow(3, $i, "=SUM(D".$iniI.":D".($i-1).')');
				}
				
				//Liquidez
				$sheetData = $fileExcel->getSheet(9);
				
				$sheetData->setCellValueByColumnAndRow(0, 2, $comitente);
				$i = 28;
				$iniI = 28;
				$fech1 = explode("-", $data['fechaExp']);
				$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
				$sheetData->setCellValueByColumnAndRow(0, 4, $str1);
				$i = 7;
				//$sheetData->setCellValueByColumnAndRow(0, 2, $comitente." LIQDIZ ".count($dateEC['Table5']));
                if(count($dateEC['Table5'])>0)
                {
                    $i = 7;
					$iniI = $i;

                    if (count($dateEC['Table5']) > 2) {
                        $sheetData->insertNewRowBefore($i + 1, count($dateEC['Table5']) - 1);
                    }
                    
                    $BStyle = array(
						'borders' => array(
							'top' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
							'bottom' => array(
								'style' => PHPExcel_Style_Border::BORDER_THICK
							),
						)
					);
				
					
                    foreach ($dateEC['Table5'] as $value) {
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaVencimiento']). ' '. $timezone));
                        $sheetData->setCellValueByColumnAndRow(0, $i, $dateValue);
						$sheetData->setCellValueByColumnAndRow(1, $i, $value['LiquidezDescripcion']);
						$sheetData->setCellValueByColumnAndRow(2, $i, $value['LiquidezCredito']);
						$sheetData->setCellValueByColumnAndRow(3, $i, $value['LiquidezDebito']);
						$sheetData->setCellValueByColumnAndRow(4, $i, $value['LiquidezSaldo']);
						$i++;
					}
					
					$sheetData->setCellValueByColumnAndRow(4, $i, "=E".($i-1));
					$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($data['fechaExp']). ' '. $timezone));
                    $sheetData->setCellValueByColumnAndRow(3, $i, $dateValue);
				}else{
					$i++;
				}
				
				//$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($data['fechaExp']). ' '. $timezone));
				//$sheetData->setCellValueByColumnAndRow(3, $i, $dateValue);
				
				$sheetData = $fileExcel->getSheet(3);
				
				$sheetData->setCellValueByColumnAndRow(0, 9, $comitente);
				$i = 28;
				$iniI = 28;
				$fech1 = explode("-", $data['fechaExp']);
				$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
				$sheetData->setCellValueByColumnAndRow(4, 11, $str1);

				$client = $this->wsdl();
				$paramsR = Array();

				$paramsR['intComitenteId'] = $infoBusqueda['ComitenteId'];
				$paramsR['intPortafolioId'] = $infoBusqueda['PortafolioId']; //136;
				$paramsR['dtFechaIni'] = $data['fecha'];
				$paramsR['dtFechaFin'] = $data['fecha'];
				$paramsR['intUserId'] = Yii::$app->user->identity->id;
				
				$resultado = $client->ObtenerResumenPortafolio($paramsR);
				
				$manage = json_decode($resultado->ObtenerResumenPortafolioResult,'JSON_FORCE_ARRAY');
				
				$textChar = "";
				
				if(count($manage[0])){
					$i = 28;
					$iniI = $i;
					
					$j = 37;
					$iniJ = $j;
					
					$cont = 1;
					$contJ = 1;
					
					$resumRF = 19;
					$resumRV = 20;
					$resumIA = 21;
					
					$rowsRF = 0;
					$rowsRV = 0;
					foreach ($manage[0] as $value) {
						if($value['TipoRenta']=='RF'){
							$rowsRF++;
						}else{
							$rowsRV++;
						}
					}
					if($rowsRF>2)
						$sheetData->insertNewRowBefore($i+1, $rowsRF-1);
					if($rowsRV>2)
						$sheetData->insertNewRowBefore($i+1, $rowsRV-1);
					
					$j = $i + $rowsRF + 1;
					$iniJ = $j;
					
					foreach ($manage[0] as $value) {
						if($value['TipoRenta']=='RF'){
							
							$sheetData->setCellValueByColumnAndRow(1, $i, $value['Grupo']);
							$sheetData->setCellValueByColumnAndRow(2, $i, $value['ValorNominal']);
							$sheetData->setCellValueByColumnAndRow(3, $i, $value['Concentracion']/100);
							$sheetData->setCellValueByColumnAndRow(4, $i, $value['RendimientoPromedio']/100);
							$sheetData->setCellValueByColumnAndRow(5, $i, $value['PlazoPromedioPonderado']);
							
						
							$cont++;
							$i++;
						}else{
							if($contJ>2){
								$sheetData->insertNewRowBefore($j, 1);
							}
							$sheetData->setCellValueByColumnAndRow(1, $j, $value['Grupo']);
							$sheetData->setCellValueByColumnAndRow(2, $j, $value['ValorNominal']);
							$sheetData->setCellValueByColumnAndRow(3, $j, ($value['Concentracion']/100));
							$sheetData->setCellValueByColumnAndRow(4, $j, '');
							$sheetData->setCellValueByColumnAndRow(5, $j, '');
						
							$contJ++;
							$j++;
						}
					}
					foreach ($manage[1] as $value) {
						if($value['TipoDeRenta']=='Renta Fija'){							
							if(!$bolEnableRf && !$bolEnableRfCC){
								$sheetData->setCellValueByColumnAndRow(4, $resumRF, $value['ValorEfectivo']);
								$sheetData->setCellValueByColumnAndRow(4, $resumIA, $value['Accrual']);
							}else{
								if($bolEnableRf && $bolEnableRfCC){
									$sheetData->setCellValueByColumnAndRow(4, $resumRF, $value['ValorEfectivo1']);
									$sheetData->setCellValueByColumnAndRow(4, $resumIA, $value['Accrual1']);
								}else{
									if($bolEnableRf && !$bolEnableRfCC){
										$sheetData->setCellValueByColumnAndRow(4, $resumRF, $value['ValorEfectivo2']);
										$sheetData->setCellValueByColumnAndRow(4, $resumIA, $value['Accrual2']);
									}else{
										if(!$bolEnableRf && $bolEnableRfCC){
											$sheetData->setCellValueByColumnAndRow(4, $resumRF, $value['ValorEfectivo3']);
											$sheetData->setCellValueByColumnAndRow(4, $resumIA, $value['Accrual3']);
										}
									}
								}
							}
						}else{
							$sheetData->setCellValueByColumnAndRow(4, $resumRV, $value['ValorEfectivo']);
						}
					}
					
					if($j>$iniJ){
						$sheetData->setCellValueByColumnAndRow(2, $iniJ-1, "=SUM(C".($iniI).":C".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(2, $j, "=SUM(C".($iniJ).":C".($j-1).')');
						$sheetData->setCellValueByColumnAndRow(2, $j+1, "=C".($iniJ-1)."+C".($j));
						
						$sheetData->setCellValueByColumnAndRow(3, $iniJ-1, "=SUM(D".($iniI).":D".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(3, $j, "=SUM(D".($iniJ).":D".($j-1).')');
						$sheetData->setCellValueByColumnAndRow(3, $j+1, "=D".($iniJ-1)."+D".($j));
						
						$sheetData->setCellValueByColumnAndRow(4, $j+1, "=SUM(E".($iniI).":E".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(5, $j+1, "=SUM(F".($iniI).":F".($i-1).')');
					}
					else{
						$sheetData->removeRow($j);
						
						$sheetData->setCellValueByColumnAndRow(2, $iniJ-1, "=SUM(C".($iniI).":C".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(2, $j, "=0");
						
						$sheetData->setCellValueByColumnAndRow(3, $iniJ-1, "=SUM(D".($iniI).":D".($i-1).')');
						$sheetData->setCellValueByColumnAndRow(3, $j, "=0");
						
						$sheetData->setCellValueByColumnAndRow(4, $j, "");
						$sheetData->setCellValueByColumnAndRow(5, $j, "");
					}						
					
					$sheetData->setCellValueByColumnAndRow(4, $j+1, "=AVERAGE(E".($iniI).":E".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(5, $j+1, "=AVERAGE(F".($iniI).":F".($i-1).')');
					
					
				}
				
				if($j>$iniJ){
					$textChar = $textChar.'D'.$iniI.':D'.($i-1).';D'.$iniJ.':D'.($j-1).'|B'.$iniI.':B'.($i-1).';B'.$iniJ.':B'.($j-1).'@';
					$textChar = $textChar.'E'.$iniI.':E'.($i-1).'|B'.$iniI.':B'.($i-1).';B'.$iniJ.':B'.($j-1).'@';
					$textChar = $textChar.'F'.$iniI.':F'.($i-1).'| @';					
				}else{
					$textChar = $textChar.'D'.$iniI.':D'.($i-1).'|B'.$iniI.':B'.($i-1).'@';
					$textChar = $textChar.'E'.$iniI.':E'.($i-1).'|B'.$iniI.':B'.($i-1).'@';
					$textChar = $textChar.'F'.$iniI.':F'.($i-1).'| @';
				}
				
				
                $objWriter = \PHPExcel_IOFactory::createWriter($fileExcel, 'Excel2007');        
                $objWriter->setIncludeCharts(TRUE);
                $objWriter->save($nombreExcel);
				
				
				$paramsR = Array();

				$paramsR['strPath'] = Yii::getAlias('@webroot').'/'.$nombreExcel;
				$paramsR['strTemplate'] = Yii::getAlias('@webroot').'/plantilla/CopyStyleChart.xlsx';
				$paramsR['strParamList'] = $textChar;
				
				$resultado = $client->UpdateCharExcelEC($paramsR);
				
                return $nombreExcel;
            }
            
            return "-2";
        }
    }
    private function retornoFechaExcel($fecha) {
        $fech = "";
        if (!empty($fecha) && strlen($fecha) >= 10) {
            $fech1 = substr($fecha, 0, 10);
            $arrF = explode("-", $fech1);
            $fech = $arrF[1] . "/" . $arrF[2] . "/" . $arrF[0];
        }
        return $fech;
    }
	public function actionExportarrf($ids, $fech = "", $fech2 = "",$ext="") {
        ini_set('memory_limit', '500M');
        ini_set('max_execution_time', 300);
        $session = Yii::$app->session;
        $comitente = $session->get('NombreComitente');
        $this->ISPDF = false;
		
		$timezone = 'America/Guayaquil';
        
        $arrData = $this->infoMetadata($ids, $fech, $comitente, $fech2);
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        
		$objReader = \PHPExcel_IOFactory::createReader('Excel2007');
		$fileExcel = $objReader->load($arrData['plantilla']);
		
		//RENTA FIJA
		$sheetData = $fileExcel->getSheet(0);
		$sheetData->freezePane('B1');
		
		
		$session = Yii::$app->session; 
		$comitente = $session->get('NombreComitente');
	   
		$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($fech). ' '. $timezone));
		$sheetData->setCellValueByColumnAndRow(16, 10, $dateValue);
		$sheetData->getStyle($this->getNameFromNumber(16).'7')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
	   
		if(count($data)>0)
		{
			$fech1 = explode("-", $fech);
			
			switch($ids){
				case 1:
					$i = 12;
					$iniI = 12;
					$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
					$sheetData->setCellValueByColumnAndRow(0, 8, $str1);
					$sheetData->setCellValueByColumnAndRow(0, 5, $comitente);
					$sheetData->freezePaneByColumnAndRow(3,$i);
				break;
				case 2:
					$i = 10;
					$iniI = 10;
					$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
					$sheetData->setCellValueByColumnAndRow(0, 6, $str1);
					$sheetData->setCellValueByColumnAndRow(0, 4, $comitente);
					$sheetData->freezePaneByColumnAndRow(3,$i);
				break;
			}
			
			if (count($data) > 2) {
				$sheetData->insertNewRowBefore($i + 1, count($data) - 1);
			}
			
			$BStyle = array(
				'borders' => array(
					'top' => array(
						'style' => PHPExcel_Style_Border::BORDER_THICK
					),
					'bottom' => array(
						'style' => PHPExcel_Style_Border::BORDER_THICK
					),
				)
			);
		
			$grupoAct = $data[0]['TipoValor'];
			$initGrup = $i;
			$frmTotal = "";
			
			foreach ($data as $value) {
				
				if($grupoAct != $value['TipoValor']){
					
					$sheetData->insertNewRowBefore($i, 1);
					
					$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
					$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(23, $i, "=SUM(X".$initGrup.":X".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(27, $i, "=SUM(AB".$initGrup.":AB".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(29, $i, "=SUM(AD".$initGrup.":AD".($i-1).')');
					
					$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('X'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('X'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('X'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AB'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AB'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AB'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AD'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AD'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AD'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getRowDimension($i)->setRowHeight(39);
					
					$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(29).$i)->applyFromArray($BStyle);
					
					if($frmTotal!='')
						$frmTotal = $frmTotal.'+';
					$frmTotal = $frmTotal.'#COL#'.$i;
					
					$i++;	
					
					$grupoAct = $value['TipoValor'];
					$initGrup = $i;							
				}
				
				$sheetData->setCellValueByColumnAndRow(0, $i, $value['Emisor']);
				$sheetData->setCellValueByColumnAndRow(1, $i, $value['CodigoEmisor']);
				$sheetData->setCellValueByColumnAndRow(2, $i, $value['TipoValor']);
				$sheetData->setCellValueByColumnAndRow(3, $i, $value['Sector']);
				
				switch($value['Calificadora']){
					case '':
						$sheetData->setCellValueByColumnAndRow(4, $i, 'N/A');
						$sheetData->setCellValueByColumnAndRow(5, $i, 'N/A');
						$sheetData->setCellValueByColumnAndRow(6, $i, 'N/A');
					break;
					case 'NO APLICA':
						$sheetData->setCellValueByColumnAndRow(4, $i, 'N/A');//$value['Valor']
						$sheetData->setCellValueByColumnAndRow(5, $i, 'N/A');//$value['Calificadora']
						$sheetData->setCellValueByColumnAndRow(6, $i, 'N/A');
					break;
					default:
						$sheetData->setCellValueByColumnAndRow(4, $i, $value['Valor']);
						$sheetData->setCellValueByColumnAndRow(5, $i, $value['Calificadora']);
				
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCalificacion']). ' '. $timezone));
						$sheetData->setCellValueByColumnAndRow(6, $i, $dateValue);
					break;
				}
				
				$sheetData->setCellValueByColumnAndRow(7, $i, $value['Numeracion']);
				$sheetData->setCellValueByColumnAndRow(8, $i, $value['Custodio']);
				$sheetData->setCellValueByColumnAndRow(9, $i, $value['Cantidad']);
				$sheetData->setCellValueByColumnAndRow(10, $i, $value['ValorNominalUnitario']);
				$sheetData->setCellValueByColumnAndRow(11, $i, "=K".$i."*J".$i);
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCompra']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(12, $i, $dateValue);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaEmision']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(13, $i, $dateValue);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaVencimiento']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(14, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(15, $i, $value['PlazoTotal']);
				$sheetData->setCellValueByColumnAndRow(16, $i, $value['DiasTranscurridos']);
				$sheetData->setCellValueByColumnAndRow(17, $i, $value['PlazoVencer']);
				
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaAcrual']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(18, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(19, $i, "=Q7-S".$i);
				$sheetData->setCellValueByColumnAndRow(20, $i, $value['RendimientoOperacion']/100);
				$sheetData->setCellValueByColumnAndRow(21, $i, $value['TituloRendimiento']/100);
				$sheetData->setCellValueByColumnAndRow(22, $i, $value['TituloTasaInteres']/100);
				$sheetData->setCellValueByColumnAndRow(23, $i, $value['InteresAcumulado']);
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaInteres']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(24, $i, $dateValue);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCapital']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(25, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(26, $i, $value['TituloPrecioSpot']/100);
				$sheetData->setCellValueByColumnAndRow(27, $i, "=(L".$i."*AA".$i.")");
				$sheetData->setCellValueByColumnAndRow(28, $i, $value['PrecioCompra']/100);
				$sheetData->setCellValueByColumnAndRow(29, $i, $value['ValorEfectivoCompraActual']);
				
				$sheetData->getStyle($this->getNameFromNumber(6).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(12).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(13).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(14).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(18).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(24).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(25).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				
				
				$i++;
			}
			
			$grupoAct = $value['TipoValor'];
			
			$sheetData->insertNewRowBefore($i, 1);
					
			$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
			$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(23, $i, "=SUM(X".$initGrup.":X".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(27, $i, "=SUM(AB".$initGrup.":AB".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(29, $i, "=SUM(AD".$initGrup.":AD".($i-1).')');
			
			$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('X'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('X'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('X'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AB'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AB'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AB'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AD'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AD'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AD'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getRowDimension($i)->setRowHeight(39);
			
			$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(29).$i)->applyFromArray($BStyle);
			
			if($frmTotal!='')
				$frmTotal = $frmTotal.'+';
			$frmTotal = $frmTotal.'#COL#'.$i;
			
			$i++;	
			
			$sheetData->setCellValueByColumnAndRow(11, $i, "=".str_replace("#COL#","L",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(23, $i, "=".str_replace("#COL#","X",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(27, $i, "=".str_replace("#COL#","AB",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(29, $i, "=".str_replace("#COL#","AD",$frmTotal));								
		}
		$objWriter = \PHPExcel_IOFactory::createWriter($fileExcel, 'Excel2007');
        $objWriter->save($arrData['nombreExcel']);
        echo $arrData['nombreExcel'];
	}
	public function actionExportarpdfrf($ids, $fech = "", $fech2 = "",$ext="") {
        ini_set('memory_limit', '500M');
        ini_set('max_execution_time', 300);
        $session = Yii::$app->session;
        $comitente = $session->get('NombreComitente');
        $this->ISPDF = true;
		
		$rendererName = \PHPExcel_Settings::PDF_RENDERER_MPDF;
		$rendererLibraryPath = Yii::getAlias('@vendor/mpdf/mpdf/');
		$this->ISPDF = true;
		if (!\PHPExcel_Settings::setPdfRenderer($rendererName, $rendererLibraryPath)) {
			throw new BadRequestHttpException('Exportar a pdf con errores');
		}
		
		$timezone = 'America/Guayaquil';
        
        $arrData = $this->infoMetadata($ids, $fech, $comitente, $fech2);
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        
		$objReader = \PHPExcel_IOFactory::createReader('Excel2007');
		$fileExcel = $objReader->load($arrData['plantilla']);
		
		//RENTA FIJA
		$sheetData = $fileExcel->getSheet(0);
		$sheetData->freezePane('B1');
		
		
		$session = Yii::$app->session; 
		$comitente = $session->get('NombreComitente');
	   
		$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($fech). ' '. $timezone));
		$sheetData->setCellValueByColumnAndRow(16, 10, $dateValue);
		$sheetData->getStyle($this->getNameFromNumber(16).'7')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
	   
		if(count($data)>0)
		{		
			$fech1 = explode("-", $fech);
			switch($ids){
				case 1:
					$i = 12;
					$iniI = 12;
					$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
					$sheetData->setCellValueByColumnAndRow(0, 8, $str1);
					$sheetData->setCellValueByColumnAndRow(0, 5, $comitente);
					$sheetData->freezePaneByColumnAndRow(3,$i);
				break;
				case 2:
					$i = 10;
					$iniI = 10;
					$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
					$sheetData->setCellValueByColumnAndRow(0, 6, $str1);
					$sheetData->setCellValueByColumnAndRow(0, 4, $comitente);
					$sheetData->freezePaneByColumnAndRow(3,$i);
				break;
			}

			if (count($data) > 2) {
				$sheetData->insertNewRowBefore($i + 1, count($data) - 1);
			}
			
			$BStyle = array(
				'borders' => array(
					'top' => array(
						'style' => PHPExcel_Style_Border::BORDER_THICK
					),
					'bottom' => array(
						'style' => PHPExcel_Style_Border::BORDER_THICK
					),
				)
			);
		
			$grupoAct = $data[0]['TipoValor'];
			$initGrup = $i;
			$frmTotal = "";
			
			foreach ($data as $value) {
				
				if($grupoAct != $value['TipoValor']){
					
					$sheetData->insertNewRowBefore($i, 1);
					
					$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
					$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(23, $i, "=SUM(X".$initGrup.":X".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(27, $i, "=SUM(AB".$initGrup.":AB".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(29, $i, "=SUM(AD".$initGrup.":AD".($i-1).')');
					
					$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('X'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('X'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('X'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AB'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AB'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AB'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AD'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AD'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AD'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getRowDimension($i)->setRowHeight(39);
					
					$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(29).$i)->applyFromArray($BStyle);
					
					if($frmTotal!='')
						$frmTotal = $frmTotal.'+';
					$frmTotal = $frmTotal.'#COL#'.$i;
					
					$i++;	
					
					$grupoAct = $value['TipoValor'];
					$initGrup = $i;							
				}
				
				$sheetData->setCellValueByColumnAndRow(0, $i, $value['Emisor']);
				$sheetData->setCellValueByColumnAndRow(1, $i, $value['CodigoEmisor']);
				$sheetData->setCellValueByColumnAndRow(2, $i, $value['TipoValor']);
				$sheetData->setCellValueByColumnAndRow(3, $i, $value['Sector']);
				
				switch($value['Calificadora']){
					case '':
						$sheetData->setCellValueByColumnAndRow(4, $i, 'N/A');
						$sheetData->setCellValueByColumnAndRow(5, $i, 'N/A');
						$sheetData->setCellValueByColumnAndRow(6, $i, 'N/A');
					break;
					case 'NO APLICA':
						$sheetData->setCellValueByColumnAndRow(4, $i, 'N/A');//$value['Valor']
						$sheetData->setCellValueByColumnAndRow(5, $i, 'N/A');//$value['Calificadora']
						$sheetData->setCellValueByColumnAndRow(6, $i, 'N/A');
					break;
					default:
						$sheetData->setCellValueByColumnAndRow(4, $i, $value['Valor']);
						$sheetData->setCellValueByColumnAndRow(5, $i, $value['Calificadora']);
				
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCalificacion']). ' '. $timezone));
						$sheetData->setCellValueByColumnAndRow(6, $i, $dateValue);
					break;
				}
				
				$sheetData->setCellValueByColumnAndRow(7, $i, $value['Numeracion']);
				$sheetData->setCellValueByColumnAndRow(8, $i, $value['Custodio']);
				$sheetData->setCellValueByColumnAndRow(9, $i, $value['Cantidad']);
				$sheetData->setCellValueByColumnAndRow(10, $i, $value['ValorNominalUnitario']);
				$sheetData->setCellValueByColumnAndRow(11, $i, "=K".$i."*J".$i);
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCompra']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(12, $i, $dateValue);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaEmision']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(13, $i, $dateValue);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaVencimiento']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(14, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(15, $i, $value['PlazoTotal']);
				$sheetData->setCellValueByColumnAndRow(16, $i, $value['DiasTranscurridos']);
				$sheetData->setCellValueByColumnAndRow(17, $i, $value['PlazoVencer']);
				
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaAcrual']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(18, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(19, $i, "=Q7-S".$i);
				$sheetData->setCellValueByColumnAndRow(20, $i, $value['RendimientoOperacion']/100);
				$sheetData->setCellValueByColumnAndRow(21, $i, $value['TituloRendimiento']/100);
				$sheetData->setCellValueByColumnAndRow(22, $i, $value['TituloTasaInteres']/100);
				$sheetData->setCellValueByColumnAndRow(23, $i, $value['InteresAcumulado']);
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaInteres']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(24, $i, $dateValue);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCapital']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(25, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(26, $i, $value['TituloPrecioSpot']/100);
				$sheetData->setCellValueByColumnAndRow(27, $i, "=(L".$i."*AA".$i.")");
				$sheetData->setCellValueByColumnAndRow(28, $i, $value['PrecioCompra']/100);
				$sheetData->setCellValueByColumnAndRow(29, $i, $value['ValorEfectivoCompraActual']);
				
				$sheetData->getStyle($this->getNameFromNumber(6).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(12).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(13).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(14).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(18).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(24).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(25).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				
				
				$i++;
			}
			
			$grupoAct = $value['TipoValor'];
			
			$sheetData->insertNewRowBefore($i, 1);
					
			$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
			$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(23, $i, "=SUM(X".$initGrup.":X".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(27, $i, "=SUM(AB".$initGrup.":AB".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(29, $i, "=SUM(AD".$initGrup.":AD".($i-1).')');
			
			$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('X'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('X'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('X'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AB'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AB'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AB'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AD'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AD'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AD'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getRowDimension($i)->setRowHeight(39);
			
			$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(29).$i)->applyFromArray($BStyle);
			
			if($frmTotal!='')
				$frmTotal = $frmTotal.'+';
			$frmTotal = $frmTotal.'#COL#'.$i;
			
			$i++;	
			
			$sheetData->setCellValueByColumnAndRow(11, $i, "=".str_replace("#COL#","L",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(23, $i, "=".str_replace("#COL#","X",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(27, $i, "=".str_replace("#COL#","AB",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(29, $i, "=".str_replace("#COL#","AD",$frmTotal));								
		}
		
		$sheetData->setShowGridlines(true);
		$sheetData->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$objWriter = \PHPExcel_IOFactory::createWriter($fileExcel, 'PDF');
		$objWriter->save($arrData['nombrePdf']);
		echo $arrData['nombrePdf'];
	}
	
	public function actionExportarrfca($ids, $fech = "", $fech2 = "",$ext="") {
        ini_set('memory_limit', '500M');
        ini_set('max_execution_time', 300);
        $session = Yii::$app->session;
        $comitente = $session->get('NombreComitente');
        $this->ISPDF = false;
		
		$timezone = 'America/Guayaquil';
        
        $arrData = $this->infoMetadata($ids, $fech, $comitente, $fech2);
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        
		$objReader = \PHPExcel_IOFactory::createReader('Excel2007');
		$fileExcel = $objReader->load($arrData['plantilla']);
		
		//RENTA FIJA
		$sheetData = $fileExcel->getSheet(0);
		$sheetData->freezePane('B1');
		
		
		$session = Yii::$app->session; 
		$comitente = $session->get('NombreComitente');
	   
		$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($fech). ' '. $timezone));
		$sheetData->setCellValueByColumnAndRow(16, 8, $dateValue);
		$sheetData->getStyle($this->getNameFromNumber(16).'8')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
	   
		if(count($data)>0)
		{
			$fech1 = explode("-", $fech);
			
			switch($ids){
				case 1:
					$i = 12;
					$iniI = 12;
					$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
					$sheetData->setCellValueByColumnAndRow(0, 8, $str1);
					$sheetData->setCellValueByColumnAndRow(0, 5, $comitente);
					$sheetData->freezePaneByColumnAndRow(3,$i);
				break;
				case 2:
					$i = 10;
					$iniI = 10;
					$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
					$sheetData->setCellValueByColumnAndRow(0, 6, $str1);
					$sheetData->setCellValueByColumnAndRow(0, 4, $comitente);
					$sheetData->freezePaneByColumnAndRow(3,$i);
				break;
			}
			
			if (count($data) > 2) {
				$sheetData->insertNewRowBefore($i + 1, count($data) - 1);
			}
			
			$BStyle = array(
				'borders' => array(
					'top' => array(
						'style' => PHPExcel_Style_Border::BORDER_THICK
					),
					'bottom' => array(
						'style' => PHPExcel_Style_Border::BORDER_THICK
					),
				)
			);
		
			$grupoAct = $data[0]['TipoValor'];
			$initGrup = $i;
			$frmTotal = "";
			
			foreach ($data as $value) {
				
				if($grupoAct != $value['TipoValor']){
					
					$sheetData->insertNewRowBefore($i, 1);
					
					$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
					$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(23, $i, "=SUM(X".$initGrup.":X".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(24, $i, "=SUM(Y".$initGrup.":Y".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(28, $i, "=SUM(AC".$initGrup.":AC".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(29, $i, "=SUM(AD".$initGrup.":AD".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(30, $i, "=SUM(AE".$initGrup.":AE".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(31, $i, "=SUM(AF".$initGrup.":AF".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(33, $i, "=SUM(AH".$initGrup.":AH".($i-1).')');
					
					
					$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('X'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('X'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('X'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('Y'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('Y'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('Y'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AC'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AC'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AC'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AD'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AD'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AD'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AE'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AE'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AE'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AF'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AF'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AF'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AH'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AH'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AH'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getRowDimension($i)->setRowHeight(39);
					
					$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(33).$i)->applyFromArray($BStyle);
					
					if($frmTotal!='')
						$frmTotal = $frmTotal.'+';
					$frmTotal = $frmTotal.'#COL#'.$i;
					
					$i++;	
					
					$grupoAct = $value['TipoValor'];
					$initGrup = $i;							
				}
				
				$sheetData->setCellValueByColumnAndRow(0, $i, $value['Emisor']);
				$sheetData->setCellValueByColumnAndRow(1, $i, $value['CodigoEmisor']);
				$sheetData->setCellValueByColumnAndRow(2, $i, $value['TipoValor']);
				$sheetData->setCellValueByColumnAndRow(3, $i, $value['Sector']);
				
				switch($value['Calificadora']){
					case '':
						$sheetData->setCellValueByColumnAndRow(4, $i, 'N/A');
						$sheetData->setCellValueByColumnAndRow(5, $i, 'N/A');
						$sheetData->setCellValueByColumnAndRow(6, $i, 'N/A');
					break;
					case 'NO APLICA':
						$sheetData->setCellValueByColumnAndRow(4, $i, 'N/A');//$value['Valor']
						$sheetData->setCellValueByColumnAndRow(5, $i, 'N/A');//$value['Calificadora']
						$sheetData->setCellValueByColumnAndRow(6, $i, 'N/A');
					break;
					default:
						$sheetData->setCellValueByColumnAndRow(4, $i, $value['Valor']);
						$sheetData->setCellValueByColumnAndRow(5, $i, $value['Calificadora']);
				
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCalificacion']). ' '. $timezone));
						$sheetData->setCellValueByColumnAndRow(6, $i, $dateValue);
					break;
				}
				
				$sheetData->setCellValueByColumnAndRow(7, $i, $value['Numeracion']);
				$sheetData->setCellValueByColumnAndRow(8, $i, $value['Custodio']);
				$sheetData->setCellValueByColumnAndRow(9, $i, $value['Cantidad']);
				$sheetData->setCellValueByColumnAndRow(10, $i, $value['ValorNominalUnitario']);
				$sheetData->setCellValueByColumnAndRow(11, $i, "=K".$i."*J".$i);
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCompra']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(12, $i, $dateValue);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaEmision']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(13, $i, $dateValue);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaVencimiento']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(14, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(15, $i, $value['PlazoTotal']);
				$sheetData->setCellValueByColumnAndRow(16, $i, $value['DiasTranscurridos']);
				$sheetData->setCellValueByColumnAndRow(17, $i, $value['PlazoVencer']);
				
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaAcrual']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(18, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(19, $i, "=Q8-S".$i);
				$sheetData->setCellValueByColumnAndRow(20, $i, $value['RendimientoOperacion']/100);
				$sheetData->setCellValueByColumnAndRow(21, $i, $value['TituloRendimiento']/100);
				$sheetData->setCellValueByColumnAndRow(22, $i, $value['TituloTasaInteres']/100);
				$sheetData->setCellValueByColumnAndRow(23, $i, $value['InteresTotal']);
				$sheetData->setCellValueByColumnAndRow(24, $i, $value['InteresAcumulado']);
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaInteres']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(25, $i, $dateValue);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCapital']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(26, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(27, $i, $value['PorcentajeCosto']/100);
				$sheetData->setCellValueByColumnAndRow(28, $i, $value['CostoAmortizado']);
				$sheetData->setCellValueByColumnAndRow(29, $i, $value['CostosIncurridos']);
				$sheetData->setCellValueByColumnAndRow(30, $i, $value['InteresTranscurrido']);
				$sheetData->setCellValueByColumnAndRow(31, $i, $value['RendimientoOperacionValor']);
				$sheetData->setCellValueByColumnAndRow(32, $i, $value['PrecioCompra']/100);
				$sheetData->setCellValueByColumnAndRow(33, $i, $value['ValorEfectivoCompraActual']);
				
				
				$sheetData->getStyle($this->getNameFromNumber(6).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(12).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(13).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(14).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(18).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(25).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(26).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				
				
				$i++;
			}
			
			$grupoAct = $value['TipoValor'];
			
			$sheetData->insertNewRowBefore($i, 1);
					
			$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
			$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');			
			$sheetData->setCellValueByColumnAndRow(23, $i, "=SUM(X".$initGrup.":X".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(24, $i, "=SUM(Y".$initGrup.":Y".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(28, $i, "=SUM(AC".$initGrup.":AC".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(29, $i, "=SUM(AD".$initGrup.":AD".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(30, $i, "=SUM(AE".$initGrup.":AE".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(31, $i, "=SUM(AF".$initGrup.":AF".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(33, $i, "=SUM(AH".$initGrup.":AH".($i-1).')');
			
			$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('X'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('X'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('X'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('Y'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('Y'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('Y'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AC'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AC'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AC'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AD'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AD'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AD'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AE'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AE'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AE'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AF'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AF'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AF'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AH'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AH'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AH'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getRowDimension($i)->setRowHeight(39);
			
			$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(33).$i)->applyFromArray($BStyle);
			
			if($frmTotal!='')
				$frmTotal = $frmTotal.'+';
			$frmTotal = $frmTotal.'#COL#'.$i;
			
			$i++;	
			
			$sheetData->setCellValueByColumnAndRow(11, $i, "=".str_replace("#COL#","L",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(23, $i, "=".str_replace("#COL#","X",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(24, $i, "=".str_replace("#COL#","Y",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(28, $i, "=".str_replace("#COL#","AC",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(29, $i, "=".str_replace("#COL#","AD",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(30, $i, "=".str_replace("#COL#","AE",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(31, $i, "=".str_replace("#COL#","AF",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(33, $i, "=".str_replace("#COL#","AH",$frmTotal));
			
		}
		$objWriter = \PHPExcel_IOFactory::createWriter($fileExcel, 'Excel2007');
        $objWriter->save($arrData['nombreExcel']);
        echo $arrData['nombreExcel'];
	}
	public function actionExportarpdfrfca($ids, $fech = "", $fech2 = "",$ext="") {
        ini_set('memory_limit', '500M');
        ini_set('max_execution_time', 300);
        $session = Yii::$app->session;
        $comitente = $session->get('NombreComitente');
        $this->ISPDF = true;
		
		$rendererName = \PHPExcel_Settings::PDF_RENDERER_MPDF;
		$rendererLibraryPath = Yii::getAlias('@vendor/mpdf/mpdf/');
		$this->ISPDF = true;
		if (!\PHPExcel_Settings::setPdfRenderer($rendererName, $rendererLibraryPath)) {
			throw new BadRequestHttpException('Exportar a pdf con errores');
		}
		
		$timezone = 'America/Guayaquil';
        
        $arrData = $this->infoMetadata($ids, $fech, $comitente, $fech2);
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        
		$objReader = \PHPExcel_IOFactory::createReader('Excel2007');
		$fileExcel = $objReader->load($arrData['plantilla']);
		
		//RENTA FIJA
		$sheetData = $fileExcel->getSheet(0);
		$sheetData->freezePane('B1');
		
		
		$session = Yii::$app->session; 
		$comitente = $session->get('NombreComitente');
	   
		$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($fech). ' '. $timezone));
		$sheetData->setCellValueByColumnAndRow(16, 8, $dateValue);
		$sheetData->getStyle($this->getNameFromNumber(16).'8')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
	   
		$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($fech). ' '. $timezone));
		$sheetData->setCellValueByColumnAndRow(16, 8, $dateValue);
		$sheetData->getStyle($this->getNameFromNumber(16).'8')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
	   
		if(count($data)>0)
		{
			$fech1 = explode("-", $fech);
			
			switch($ids){
				case 1:
					$i = 12;
					$iniI = 12;
					$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
					$sheetData->setCellValueByColumnAndRow(0, 8, $str1);
					$sheetData->setCellValueByColumnAndRow(0, 5, $comitente);
					$sheetData->freezePaneByColumnAndRow(3,$i);
				break;
				case 2:
					$i = 10;
					$iniI = 10;
					$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
					$sheetData->setCellValueByColumnAndRow(0, 6, $str1);
					$sheetData->setCellValueByColumnAndRow(0, 4, $comitente);
					$sheetData->freezePaneByColumnAndRow(3,$i);
				break;
			}
			
			if (count($data) > 2) {
				$sheetData->insertNewRowBefore($i + 1, count($data) - 1);
			}
			
			$BStyle = array(
				'borders' => array(
					'top' => array(
						'style' => PHPExcel_Style_Border::BORDER_THICK
					),
					'bottom' => array(
						'style' => PHPExcel_Style_Border::BORDER_THICK
					),
				)
			);
		
			$grupoAct = $data[0]['TipoValor'];
			$initGrup = $i;
			$frmTotal = "";
			
			foreach ($data as $value) {
				
				if($grupoAct != $value['TipoValor']){
					
					$sheetData->insertNewRowBefore($i, 1);
					
					$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
					$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(23, $i, "=SUM(X".$initGrup.":X".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(24, $i, "=SUM(Y".$initGrup.":Y".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(28, $i, "=SUM(AC".$initGrup.":AC".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(29, $i, "=SUM(AD".$initGrup.":AD".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(30, $i, "=SUM(AE".$initGrup.":AE".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(31, $i, "=SUM(AF".$initGrup.":AF".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(33, $i, "=SUM(AH".$initGrup.":AH".($i-1).')');
					
					
					$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('X'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('X'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('X'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('Y'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('Y'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('Y'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AC'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AC'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AC'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AD'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AD'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AD'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AE'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AE'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AE'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AF'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AF'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AF'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('AH'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('AH'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('AH'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getRowDimension($i)->setRowHeight(39);
					
					$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(33).$i)->applyFromArray($BStyle);
					
					if($frmTotal!='')
						$frmTotal = $frmTotal.'+';
					$frmTotal = $frmTotal.'#COL#'.$i;
					
					$i++;	
					
					$grupoAct = $value['TipoValor'];
					$initGrup = $i;							
				}
				
				$sheetData->setCellValueByColumnAndRow(0, $i, $value['Emisor']);
				$sheetData->setCellValueByColumnAndRow(1, $i, $value['CodigoEmisor']);
				$sheetData->setCellValueByColumnAndRow(2, $i, $value['TipoValor']);
				$sheetData->setCellValueByColumnAndRow(3, $i, $value['Sector']);
				
				switch($value['Calificadora']){
					case '':
						$sheetData->setCellValueByColumnAndRow(4, $i, 'N/A');
						$sheetData->setCellValueByColumnAndRow(5, $i, 'N/A');
						$sheetData->setCellValueByColumnAndRow(6, $i, 'N/A');
					break;
					case 'NO APLICA':
						$sheetData->setCellValueByColumnAndRow(4, $i, 'N/A');//$value['Valor']
						$sheetData->setCellValueByColumnAndRow(5, $i, 'N/A');//$value['Calificadora']
						$sheetData->setCellValueByColumnAndRow(6, $i, 'N/A');
					break;
					default:
						$sheetData->setCellValueByColumnAndRow(4, $i, $value['Valor']);
						$sheetData->setCellValueByColumnAndRow(5, $i, $value['Calificadora']);
				
						$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCalificacion']). ' '. $timezone));
						$sheetData->setCellValueByColumnAndRow(6, $i, $dateValue);
					break;
				}
				
				$sheetData->setCellValueByColumnAndRow(7, $i, $value['Numeracion']);
				$sheetData->setCellValueByColumnAndRow(8, $i, $value['Custodio']);
				$sheetData->setCellValueByColumnAndRow(9, $i, $value['Cantidad']);
				$sheetData->setCellValueByColumnAndRow(10, $i, $value['ValorNominalUnitario']);
				$sheetData->setCellValueByColumnAndRow(11, $i, "=K".$i."*J".$i);
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCompra']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(12, $i, $dateValue);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaEmision']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(13, $i, $dateValue);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaVencimiento']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(14, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(15, $i, $value['PlazoTotal']);
				$sheetData->setCellValueByColumnAndRow(16, $i, $value['DiasTranscurridos']);
				$sheetData->setCellValueByColumnAndRow(17, $i, $value['PlazoVencer']);
				
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaAcrual']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(18, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(19, $i, "=Q8-S".$i);
				$sheetData->setCellValueByColumnAndRow(20, $i, $value['RendimientoOperacion']/100);
				$sheetData->setCellValueByColumnAndRow(21, $i, $value['TituloRendimiento']/100);
				$sheetData->setCellValueByColumnAndRow(22, $i, $value['TituloTasaInteres']/100);
				$sheetData->setCellValueByColumnAndRow(23, $i, $value['InteresTotal']);
				$sheetData->setCellValueByColumnAndRow(24, $i, $value['InteresAcumulado']);
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaInteres']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(25, $i, $dateValue);
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaCapital']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(26, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(27, $i, $value['PorcentajeCosto']/100);
				$sheetData->setCellValueByColumnAndRow(28, $i, $value['CostoAmortizado']);
				$sheetData->setCellValueByColumnAndRow(29, $i, $value['CostosIncurridos']);
				$sheetData->setCellValueByColumnAndRow(30, $i, $value['InteresTranscurrido']);
				$sheetData->setCellValueByColumnAndRow(31, $i, $value['RendimientoOperacionValor']);
				$sheetData->setCellValueByColumnAndRow(32, $i, $value['PrecioCompra']/100);
				$sheetData->setCellValueByColumnAndRow(33, $i, $value['ValorEfectivoCompraActual']);
				
				
				$sheetData->getStyle($this->getNameFromNumber(6).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(12).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(13).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(14).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(18).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(25).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				$sheetData->getStyle($this->getNameFromNumber(26).$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);
				
				
				$i++;
			}
			
			$grupoAct = $value['TipoValor'];
			
			$sheetData->insertNewRowBefore($i, 1);
					
			$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
			$sheetData->setCellValueByColumnAndRow(11, $i, "=SUM(L".$initGrup.":L".($i-1).')');			
			$sheetData->setCellValueByColumnAndRow(23, $i, "=SUM(X".$initGrup.":X".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(24, $i, "=SUM(Y".$initGrup.":Y".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(28, $i, "=SUM(AC".$initGrup.":AC".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(29, $i, "=SUM(AD".$initGrup.":AD".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(30, $i, "=SUM(AE".$initGrup.":AE".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(31, $i, "=SUM(AF".$initGrup.":AF".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(33, $i, "=SUM(AH".$initGrup.":AH".($i-1).')');
			
			$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('L'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('L'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('L'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('X'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('X'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('X'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('Y'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('Y'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('Y'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AC'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AC'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AC'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AD'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AD'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AD'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AE'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AE'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AE'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AF'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AF'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AF'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('AH'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('AH'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('AH'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getRowDimension($i)->setRowHeight(39);
			
			$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(33).$i)->applyFromArray($BStyle);
			
			if($frmTotal!='')
				$frmTotal = $frmTotal.'+';
			$frmTotal = $frmTotal.'#COL#'.$i;
			
			$i++;	
			
			$sheetData->setCellValueByColumnAndRow(11, $i, "=".str_replace("#COL#","L",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(23, $i, "=".str_replace("#COL#","X",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(24, $i, "=".str_replace("#COL#","Y",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(28, $i, "=".str_replace("#COL#","AC",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(29, $i, "=".str_replace("#COL#","AD",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(30, $i, "=".str_replace("#COL#","AE",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(31, $i, "=".str_replace("#COL#","AF",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(33, $i, "=".str_replace("#COL#","AH",$frmTotal));
			
		}
		
		$sheetData->setShowGridlines(true);
		$sheetData->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$objWriter = \PHPExcel_IOFactory::createWriter($fileExcel, 'PDF');
		$objWriter->save($arrData['nombrePdf']);
		echo $arrData['nombrePdf'];
	}
	public function actionExportarrv($ids, $fech = "", $fech2 = "",$ext="") {
		ini_set('memory_limit', '500M');
        ini_set('max_execution_time', 300);
        $session = Yii::$app->session;
        $comitente = $session->get('NombreComitente');
        $this->ISPDF = false;
		
		$timezone = 'America/Guayaquil';
        
        $arrData = $this->infoMetadata($ids, $fech, $comitente, $fech2);
        $post = file_get_contents("php://input");
		
		$arrPost = explode('|@|',$post);
		
        $data = Json::decode($arrPost[0], true);
		$dataRep = Json::decode($arrPost[1], true);
        
		$objReader = \PHPExcel_IOFactory::createReader('Excel2007');
		$fileExcel = $objReader->load($arrData['plantilla']);
		
		//RENTA FIJA
		$sheetData = $fileExcel->getSheet(0);
		$sheetData->freezePane('B1');
		
		
		$session = Yii::$app->session; 
		$comitente = $session->get('NombreComitente');
	   
		/*$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($fech). ' '. $timezone));
		$sheetData->setCellValueByColumnAndRow(16, 2, $dateValue);
		$sheetData->getStyle($this->getNameFromNumber(16).'8')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_XLSX15);*/
	   
	    $fech1 = explode("-", $fech);
	    $i = 7;
		$iniI = 7;
		$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
		$sheetData->setCellValueByColumnAndRow(0, 4, $str1);
		$sheetData->setCellValueByColumnAndRow(0, 2, $comitente);
		$sheetData->freezePaneByColumnAndRow(3,$i);
		
		
		if(count($dataRep)==0){
			$sheetData->removeRow(11, 6);
		}else{
			$i = 15;
			$iniI = 15;
			foreach ($dataRep as $value) {
				$sheetData->insertNewRowBefore($i+1, 1);
				$sheetData->setCellValueByColumnAndRow(0, $i, $value['Emisor']);
				$sheetData->setCellValueByColumnAndRow(1, $i, $value['SaldoReporto']);
				$sheetData->setCellValueByColumnAndRow(2, $i, $value['ValorEfectivo']);
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaInicio']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(3, $i, $dateValue);
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaFin']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(4, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(5, $i, $value['PlazoReporto']);
				$sheetData->setCellValueByColumnAndRow(6, $i, ($value['TituloTasaMargen']/100));
				$sheetData->setCellValueByColumnAndRow(7, $i, $value['GarantiaBasica']);
				$sheetData->setCellValueByColumnAndRow(8, $i, $value['LiquidacionBolsa']);
				$sheetData->setCellValueByColumnAndRow(9, $i, $value['MontoFinal']);
				$i++;
			}
			$sheetData->removeRow($i, 1);
			
			$sheetData->setCellValueByColumnAndRow(1, $i, "=SUM(B".$iniI.":B".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(2, $i, "=SUM(C".$iniI.":C".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(7, $i, "=SUM(H".$iniI.":H".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(9, $i, "=SUM(J".$iniI.":J".($i-1).')');
			
		}
		
		$i = 7;
		$iniI = 7;
	   
		if(count($data)>0)
		{
			
			
			if (count($data) > 2) {
				$sheetData->insertNewRowBefore($i + 1, count($data) - 1);
			}
			
			$BStyle = array(
				'borders' => array(
					'top' => array(
						'style' => PHPExcel_Style_Border::BORDER_THICK
					),
					'bottom' => array(
						'style' => PHPExcel_Style_Border::BORDER_THICK
					),
				)
			);
		
			$grupoAct = $data[0]['TipoValor'];
			$initGrup = $i;
			$frmTotal = "";
			
			
			foreach ($data as $value) {
				if($grupoAct != $value['TipoValor']){
					
					$sheetData->insertNewRowBefore($i, 1);
					
					$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
					$sheetData->setCellValueByColumnAndRow(5, $i, "=SUM(F".$initGrup.":F".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(7, $i, "=SUM(H".$initGrup.":H".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(9, $i, "=SUM(J".$initGrup.":J".($i-1).')');
					
					$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('F'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('F'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('F'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					
					$sheetData->getStyle('H'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('H'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('H'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('J'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('J'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('J'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getRowDimension($i)->setRowHeight(39);
					
					$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(11).$i)->applyFromArray($BStyle);
					
					if($frmTotal!='')
						$frmTotal = $frmTotal.'+';
					$frmTotal = $frmTotal.'#COL#'.$i;
					
					$i++;	
					
					$grupoAct = $value['TipoValor'];
					$initGrup = $i;							
				}
				
				$sheetData->setCellValueByColumnAndRow(0, $i, $value['Emisor']);
				$sheetData->setCellValueByColumnAndRow(1, $i, $value['CodigoEmisor']);
				$sheetData->setCellValueByColumnAndRow(2, $i, $value['TipoValor']);
				$sheetData->setCellValueByColumnAndRow(3, $i, $value['Sector']);
				$sheetData->setCellValueByColumnAndRow(4, $i, $value['Custodio']);
				$sheetData->setCellValueByColumnAndRow(5, $i, $value['Cantidad']);
				$sheetData->setCellValueByColumnAndRow(6, $i, $value['ValorNominalUnitario']);
				$sheetData->setCellValueByColumnAndRow(7, $i, "=F".$i."*G".$i);
				$sheetData->setCellValueByColumnAndRow(8, $i, $value['TituloPrecioSpot']);
				$sheetData->setCellValueByColumnAndRow(9, $i, "=F".$i."*I".$i);
				$sheetData->setCellValueByColumnAndRow(10, $i, $value['DividendoAccion']);
				$sheetData->setCellValueByColumnAndRow(11, $i, $value['DividendoEfectivo']);
				
				$i++;
				
			}
			$sheetData->insertNewRowBefore($i, 1);
					
			$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
			$sheetData->setCellValueByColumnAndRow(5, $i, "=SUM(F".$initGrup.":F".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(7, $i, "=SUM(H".$initGrup.":H".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(9, $i, "=SUM(J".$initGrup.":J".($i-1).')');
			
			$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('F'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('F'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('F'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			
			$sheetData->getStyle('H'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('H'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('H'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('J'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('J'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('J'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getRowDimension($i)->setRowHeight(39);
			
			$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(11).$i)->applyFromArray($BStyle);
			
			if($frmTotal!='')
				$frmTotal = $frmTotal.'+';
			$frmTotal = $frmTotal.'#COL#'.$i;
			
			$i++;	
			
			$sheetData->setCellValueByColumnAndRow(5, $i, "=".str_replace("#COL#","F",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(7, $i, "=".str_replace("#COL#","H",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(9, $i, "=".str_replace("#COL#","J",$frmTotal));
		}
		
		
		$objWriter = \PHPExcel_IOFactory::createWriter($fileExcel, 'Excel2007');
        $objWriter->save($arrData['nombreExcel']);
        echo $arrData['nombreExcel'];
	}
	public function actionExportarpdfrv($ids, $fech = "", $fech2 = "",$ext="") {
		ini_set('memory_limit', '500M');
        ini_set('max_execution_time', 300);
        $session = Yii::$app->session;
        $comitente = $session->get('NombreComitente');
        $this->ISPDF = true;
		
		$rendererName = \PHPExcel_Settings::PDF_RENDERER_MPDF;
		$rendererLibraryPath = Yii::getAlias('@vendor/mpdf/mpdf/');
		$this->ISPDF = true;
		if (!\PHPExcel_Settings::setPdfRenderer($rendererName, $rendererLibraryPath)) {
			throw new BadRequestHttpException('Exportar a pdf con errores');
		}
		
		$timezone = 'America/Guayaquil';
        
        $arrData = $this->infoMetadata($ids, $fech, $comitente, $fech2);
        $post = file_get_contents("php://input");
        $arrPost = explode('|@|',$post);
		
        $data = Json::decode($arrPost[0], true);
		$dataRep = Json::decode($arrPost[1], true);
        
		$objReader = \PHPExcel_IOFactory::createReader('Excel2007');
		$fileExcel = $objReader->load($arrData['plantilla']);
		
		$sheetData = $fileExcel->getSheet(0);
		$sheetData->freezePane('B1');
		
		$session = Yii::$app->session; 
		$comitente = $session->get('NombreComitente');
	   
	    $fech1 = explode("-", $fech);
	    $i = 7;
		$iniI = 7;
		$str1 = "AL " . $fech1[2] . " DE " . $this->MESES[intval($fech1[1]) - 1] . " DEL " . $fech1[0];
		$sheetData->setCellValueByColumnAndRow(0, 4, $str1);
		$sheetData->setCellValueByColumnAndRow(0, 2, $comitente);
		$sheetData->freezePaneByColumnAndRow(3,$i);
		
		
		if(count($dataRep)==0){
			$sheetData->removeRow(11, 6);
		}else{
			$i = 15;
			$iniI = 15;
			foreach ($dataRep as $value) {
				$sheetData->insertNewRowBefore($i+1, 1);
				$sheetData->setCellValueByColumnAndRow(0, $i, $value['Emisor']);
				$sheetData->setCellValueByColumnAndRow(1, $i, $value['SaldoReporto']);
				$sheetData->setCellValueByColumnAndRow(2, $i, $value['ValorEfectivo']);
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaInicio']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(3, $i, $dateValue);
				
				$dateValue = \PHPExcel_Shared_Date::PHPToExcel( strtotime($this->retornoFechaExcel($value['FechaFin']). ' '. $timezone));
				$sheetData->setCellValueByColumnAndRow(4, $i, $dateValue);
				
				$sheetData->setCellValueByColumnAndRow(5, $i, $value['PlazoReporto']);
				$sheetData->setCellValueByColumnAndRow(6, $i, ($value['TituloTasaMargen']/100));
				$sheetData->setCellValueByColumnAndRow(7, $i, $value['GarantiaBasica']);
				$sheetData->setCellValueByColumnAndRow(8, $i, $value['LiquidacionBolsa']);
				$sheetData->setCellValueByColumnAndRow(9, $i, $value['MontoFinal']);
				$i++;
			}
			$sheetData->removeRow($i, 1);
			
			$sheetData->setCellValueByColumnAndRow(1, $i, "=SUM(B".$iniI.":B".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(2, $i, "=SUM(C".$iniI.":C".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(7, $i, "=SUM(H".$iniI.":H".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(9, $i, "=SUM(J".$iniI.":J".($i-1).')');
			
		}
		
		$i = 7;
		$iniI = 7;
	   
		if(count($data)>0)
		{
			
			
			if (count($data) > 2) {
				$sheetData->insertNewRowBefore($i + 1, count($data) - 1);
			}
			
			$BStyle = array(
				'borders' => array(
					'top' => array(
						'style' => PHPExcel_Style_Border::BORDER_THICK
					),
					'bottom' => array(
						'style' => PHPExcel_Style_Border::BORDER_THICK
					),
				)
			);
		
			$grupoAct = $data[0]['TipoValor'];
			$initGrup = $i;
			$frmTotal = "";
			
			
			foreach ($data as $value) {
				if($grupoAct != $value['TipoValor']){
					
					$sheetData->insertNewRowBefore($i, 1);
					
					$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
					$sheetData->setCellValueByColumnAndRow(5, $i, "=SUM(F".$initGrup.":F".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(7, $i, "=SUM(H".$initGrup.":H".($i-1).')');
					$sheetData->setCellValueByColumnAndRow(9, $i, "=SUM(J".$initGrup.":J".($i-1).')');
					
					$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('F'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('F'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('F'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					
					$sheetData->getStyle('H'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('H'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('H'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getStyle('J'.$i)->getFont()->setSize(10);
					$sheetData->getStyle('J'.$i)->getFont()->setBold(true);
					$sheetData->getStyle('J'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					$sheetData->getRowDimension($i)->setRowHeight(39);
					
					$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(11).$i)->applyFromArray($BStyle);
					
					if($frmTotal!='')
						$frmTotal = $frmTotal.'+';
					$frmTotal = $frmTotal.'#COL#'.$i;
					
					$i++;	
					
					$grupoAct = $value['TipoValor'];
					$initGrup = $i;							
				}
				
				$sheetData->setCellValueByColumnAndRow(0, $i, $value['Emisor']);
				$sheetData->setCellValueByColumnAndRow(1, $i, $value['CodigoEmisor']);
				$sheetData->setCellValueByColumnAndRow(2, $i, $value['TipoValor']);
				$sheetData->setCellValueByColumnAndRow(3, $i, $value['Sector']);
				$sheetData->setCellValueByColumnAndRow(4, $i, $value['Custodio']);
				$sheetData->setCellValueByColumnAndRow(5, $i, $value['Cantidad']);
				$sheetData->setCellValueByColumnAndRow(6, $i, $value['ValorNominalUnitario']);
				$sheetData->setCellValueByColumnAndRow(7, $i, "=F".$i."*G".$i);
				$sheetData->setCellValueByColumnAndRow(8, $i, $value['TituloPrecioSpot']);
				$sheetData->setCellValueByColumnAndRow(9, $i, "=F".$i."*I".$i);
				$sheetData->setCellValueByColumnAndRow(10, $i, $value['DividendoAccion']);
				$sheetData->setCellValueByColumnAndRow(11, $i, $value['DividendoEfectivo']);
				
				$i++;
				
			}
			$sheetData->insertNewRowBefore($i, 1);
					
			$sheetData->setCellValueByColumnAndRow(0, $i,"SUBTOTAL ".$grupoAct);
			$sheetData->setCellValueByColumnAndRow(5, $i, "=SUM(F".$initGrup.":F".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(7, $i, "=SUM(H".$initGrup.":H".($i-1).')');
			$sheetData->setCellValueByColumnAndRow(9, $i, "=SUM(J".$initGrup.":J".($i-1).')');
			
			$sheetData->getStyle('A'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('A'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('A'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('F'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('F'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('F'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			
			$sheetData->getStyle('H'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('H'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('H'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getStyle('J'.$i)->getFont()->setSize(10);
			$sheetData->getStyle('J'.$i)->getFont()->setBold(true);
			$sheetData->getStyle('J'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			
			$sheetData->getRowDimension($i)->setRowHeight(39);
			
			$sheetData->getStyle('A'.$i.':'.$this->getNameFromNumber(11).$i)->applyFromArray($BStyle);
			
			if($frmTotal!='')
				$frmTotal = $frmTotal.'+';
			$frmTotal = $frmTotal.'#COL#'.$i;
			
			$i++;	
			
			$sheetData->setCellValueByColumnAndRow(5, $i, "=".str_replace("#COL#","F",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(7, $i, "=".str_replace("#COL#","H",$frmTotal));
			$sheetData->setCellValueByColumnAndRow(9, $i, "=".str_replace("#COL#","J",$frmTotal));
		}
		$sheetData->setShowGridlines(true);
		$sheetData->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$objWriter = \PHPExcel_IOFactory::createWriter($fileExcel, 'PDF');
		$objWriter->save($arrData['nombrePdf']);
		echo $arrData['nombrePdf'];
	}
}
