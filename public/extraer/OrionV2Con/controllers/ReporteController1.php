<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use app\controllers\SiteController;
use app\models\SesionSearch;
use \app\models\ParametroSearch;

class ReporteController extends Controller {

    private $FORMAT_DATE1 = '[$-C0A]d\-mmm\-yy;@';
    private $COLS_ABC = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI'];
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
        return $this->render('estadoCuentaRentaFija', ['opcgraficos' => $this->getGraficos(),
            'valemisor' => $this->varvalemisor()]);
    }

    public function actionReporte2() {
        return $this->render('estadoAmortizadoRentaFija', ['opcgraficos' => $this->getGraficos(),
            'valemisor' => $this->varvalemisor()]);
    }

    public function actionReporte3() {
        return $this->render('rentaVariable', ['opcgraficos' => $this->getGraficosRV(),
            'valemisor' => $this->varvalemisor()]);
    }

    public function actionReporte4() {
        return $this->render('resumenPortafolio', []);
    }

    public function actionReporte5() {
        return $this->render('creditos', []);
    }

    public function actionReporte6() {
        return $this->render('detalleNegociaciones', []);
    }

    public function actionReporte7() {
        return $this->render('titulosTransito', []);
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
    public function actionForzaractualizacionport(){
        $client = $this->wsdl();
        $params = [];
        $infoBusqueda = $this->infoCliente();
        $params['intPortafolio'] = trim($infoBusqueda['PortafolioId']); //136;
        $params['intComitenteId'] = trim($infoBusqueda['ComitenteId']); //6070;        
        
        $resultado = $client->ActualizarCachePorPortafolio($params);
        return $resultado->ActualizarCachePorPortafolioResult;
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
    public function actionReportes(){
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $tipo = $data['tipo'];
        $client = $this->wsdl();
        $params = [];
        if($tipo == "calculadora"){
            $resultado = $client->ObtenerTitulosCalculadora();
            return $resultado->ObtenerTitulosCalculadoraResult;
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
            $resultado = $client->ObtenerInformacionTitulo($params);
            return $resultado->ObtenerInformacionTituloResult;
        }elseif ($tipo == "calcinfo") {
            $params['intTituloId'] = intval($data['intTituloId']);
            $params['dcmMonto'] = $data['monto'];
            $params['dtDate'] = $data['fecha'];
            $params['dcmTasa'] = $data['tasa'];
            $params['bolCupon'] = $data['cupon'];
            $params['dcmPrecio'] = $data['precio'];
            $resultado = $client->EjecutarCalculadora($params);
            $infod = $resultado->EjecutarCalculadoraResult;
            $res = '{"resinfo" :'.(empty($infod)? "[]}" : $infod);
            if(!empty($infod)){
                $resultado1 = $client->ObtenerTablaAmortizacion($params);
                $detalles = $resultado1->ObtenerTablaAmortizacionResult;
                $res .= ', "detalles" :'.(empty($detalles)? '[]': $detalles)."}";
            }            
            return $res;
        }elseif ($tipo == "infoprecio") {
            $params['intTivId'] = $data['idtitulo'];
            //$params['dtDate'] = date("Y-m-d");
            $resultado = $client->ObtenerVectorPrecioGrafico($params);
            return $resultado->ObtenerVectorPrecioGraficoResult;
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
                $resultado = $client->EstadoCuentaRentaFija($params);
                echo $resultado->EstadoCuentaRentaFijaResult;
            } elseif ($tipo == 'reporte2') {
                $resultado = $client->EstadoCuentaRentaFijaCostoAmortizado($params);
                echo $resultado->EstadoCuentaRentaFijaCostoAmortizadoResult;
            } elseif ($tipo == 'reporte3') {
                $resultado = $client->EstadoCuentaRentaVariable($params);
                echo $resultado->EstadoCuentaRentaVariableResult;
            } elseif ($tipo == 'vencimientos') {
                $resultado=$client->ObtenerVencimientos($params);            
                echo $resultado->ObtenerVencimientosResult;
            } elseif ($tipo == 'portafolio') {
                $resultado = $client->ObtenerResumenPortafolio($params);
                $infoTotal = $this->generarInfoPortafolio($resultado->ObtenerResumenPortafolioResult,
                        $data['fecha']);
                echo $infoTotal;
            } elseif ($tipo == 'credito') {
                $resultado = $client->ObtenerCreditos($params);
                echo $resultado->ObtenerCreditosResult;
            } elseif ($tipo == 'negociacion') {
                $resultado = $client->ObtenerNegociacionesRealizadas($params);
                echo $resultado->ObtenerNegociacionesRealizadasResult;
            } elseif ($tipo == 'titulo') {
                $resultado = $client->ObtenerTitulosEnTransito($params);
                echo $resultado->ObtenerTitulosEnTransitoResult;
            } elseif ($tipo == 'liquidez') {
                $resultado = $client->ObtenerLiquidezPortafolio($params);
                echo $resultado->ObtenerLiquidezPortafolioResult;
            } elseif ($tipo == 'vencimientosGrafico') {
                $resultado=$client->ObtenerGraficoVencimientos($params);    
                echo $resultado->ObtenerGraficoVencimientosResult;
            } elseif ($tipo == 'obtenerPortafolios') {
                $resultado = $client->ObtenerPortafolios($params);
                echo $resultado->ObtenerPortafoliosResult;
            } elseif ($tipo == 'vectorPrecio') {
                $resultado = $client->ObtenerVectorPrecio($params);
                echo $resultado->ObtenerVectorPrecioResult;
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
            }
            
            exit;
        } catch (\SoapFault $fault) {
            $error = "Error: (codigo : {$fault->faultcode}, descripcion: {$fault->faultstring})";
        }
    }
    public function actionDescargagra($campo,$titulo,$type=""){
        //$graficos
        $post = file_get_contents("php://input");
        $data = $post;//Json::decode($post, true);
        
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
        
        $resultado = $this->exportarGraficoExcel($data,$campo,$valor,$titulo);
        
        echo $resultado;
    }

    private function wsdl() {
        ini_set('max_execution_time', 180);
        $wsdl = Yii::$app->params['webService']; //
        $client = new \SoapClient($wsdl, array('trace' => 1, "connection_timeout" => 180,'cache_wsdl' => WSDL_CACHE_NONE));

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

    private function infoMetadata($tipo, $fecha = "", $comitente = "", $fech2 = "") {
        $arrInfo = [];
        switch (intval($tipo)) {
            case 1:
                $arrInfo['cols'] = ['Emisor', 'CodigoEmisor', 'SiglasTipoValor', 'Sector', 'Valor', 'Calificadora', 'Fecha0' => 'FechaCalificacion', 'Numeracion', 'Custodio',
                    'Cantidad', 'ValorNominalUnitario', 'Suma0' => 'ValorNominalTotal', 'Fecha1' => 'FechaCompra', 'Fecha2' => 'FechaEmision', 'Fecha3' => 'FechaVencimiento', 'PlazoTotal',
                    'DiasTranscurridos', 'PlazoVencer', 'Fecha4' => 'FechaAcrual', 'DiasAcrual', 'interes0' => 'TituloRendimiento', 'interes1' => 'RendimientoOperacion', 'interes2' => 'TituloTasaInteres',
                    'Suma1' => 'InteresAcumulado', 'Fecha5' => 'FechaInteres', 'Fecha6' => 'FechaCapital', 'interes3' => 'TituloPrecioSpot', 'Suma2' => 'ValorEfectivo', 'interes4' => 'PrecioCompra', 'Suma3' => 'ValorEfectivoCompra'];
                $arrInfo['plantilla'] = 'plantilla/RentaFijaValorMercado.xlsx';
                $arrInfo['plantillapdf'] = 'plantilla/RentaFijaValorMercado.xlsx';//RentaFijaPdf.xlsx
                $arrInfo['nombreExcel'] = 'tmp/RentaFijaValorMercado.xlsx';
                $arrInfo['nombrePdf'] = 'tmp/RentaFijaValorMercado.pdf';
                $arrInfo['inicio'] = 12;
                $arrInfo['colInicio'] = 0;
                $arrInfo['cabecera'] = [['col' => 0, 'row' => 8, 'fDescripcion' => $fecha],
                    ['col' => 16, 'row' => 10, 'fCabecera' => $fecha],
                    ['col' => 0, 'row' => 5, 'comitente' => $comitente]];
                break;
            case 2:
                $arrInfo['cols'] = ['Emisor', 'CodigoEmisor', 'SiglasTipoValor', 'Sector', 'Valor', 'Calificadora', 'Fecha0' => 'FechaCalificacion', 'Numeracion', 'Custodio',
                    'Cantidad', 'ValorNominalUnitario', 'Suma0' => 'ValorNominalTotal', 'Fecha1' => 'FechaCompra', 'Fecha2' => 'FechaEmision', 'Fecha3' => 'FechaVencimiento', 'PlazoTotal',
                    'DiasTranscurridos', 'PlazoVencer', 'Fecha4' => 'FechaAcrual', 'DiasAcrual', 'interes0' => 'TituloRendimiento', 'interes1' => 'RendimientoOperacion', 'interes2' => 'TituloTasaInteres',
                    'Suma1' => 'InteresTotal','Suma2' => 'InteresAcumulado', 'Fecha5' => 'FechaInteres', 'Fecha6' => 'FechaCapital', 'interes3' => 'PorcentajeCosto', 'Suma3' => 'CostoAmortizado', 'Suma4' => 'CostosIncurridos',
                    'Suma5' =>'InteresTranscurrido','Suma6'=> 'RendimientoOperacionValor', 'interes'=>'PrecioCompra', 'Suma7' => 'ValorEfectivoCompra'];
                
                
                $arrInfo['plantilla'] = 'plantilla/CostoAmortizado.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/CostoAmortizado.xlsx';
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
                $arrInfo['cols'] = ['FechaPrecio', 'Emisor', 'SiglasTipoValor', 'TasaValor','Precio'];                
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
                    if (strpos($key, 'interes') !== false) {
						if($val>1){
							$val = $val / 100;
						}
                    }

                    if (strpos($key, 'Fecha') !== false) {
                        $val = $this->retornoFecha($val);
                        if(strpos($val,"1901"))
                        {
                            $val ="N/A";
                            $sheetData->setCellValueByColumnAndRow($i, $inicio, $val);
                        }else{
                            if($this->ISPDF){
                                $val1 = explode("/", $val);
                                $val2 = $val1[0]."-".$this->AMESES[intval($val1[1]) - 1]."-".substr($val1[2], 2);
                                $sheetData->setCellValueByColumnAndRow($i, $inicio, $val2);  
                            }else{
                                $this->formatRowCol($sheetData, $this->FORMAT_DATE1, $i, $inicio, $val);
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
        }
    }

    public function actionExportar($ids, $fech = "", $fech2 = "",$ext="") {
        ini_set('memory_limit', '500M');
        ini_set('max_execution_time', 300);
        $session = Yii::$app->session;
        $comitente = $session->get('NombreComitente');
        $this->ISPDF = false;
        
        //$comitente =  //"ORION S.A.";
        $arrData = $this->infoMetadata($ids, $fech, $comitente, $fech2);
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
        
        $this->infoRows($sheetData, $arrData['cols'], $data, $arrData['inicio'], $arrData['colInicio']);
        if (!empty($fech)) {
            $this->infoScalar($arrData['cabecera'], $sheetData);
        }
        
        if($ids == '7'){
            $this->formatRowCol($sheetData, $this->FORMAT_DATE1, 3, count($data) + 7, $fech);
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
            
        $arrData = $this->infoMetadata($ids, $fech, $comitente, $fech2);
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
            $this->formatRowCol($sheetData, $this->FORMAT_DATE1, 3, count($data) + 7, $fech);
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
    public function exportarGraficoExcel($data,$campo,$valor,$titulo){
        $exePath = Yii::getAlias('@vendor/utils/exportargrafico/ExportarGrafico.exe');
        $preName = "grafiocoexport".date("Ymdhis");
        $name = Yii::getAlias('@webroot')."/tmp/".$preName;
        $nombreArchivo = $name.".xls";
        $nombreArchivoPara = $name.".txt";
        
        $myfile = fopen($nombreArchivoPara, "w");
        fwrite($myfile, $data);
        fclose($myfile);
        
        exec($exePath.' '.$nombreArchivoPara.' '.$campo.' '.$valor.' "'.htmlentities($titulo).'" '.$nombreArchivo, $output);
        
        return $preName.".xls";
    }
}
