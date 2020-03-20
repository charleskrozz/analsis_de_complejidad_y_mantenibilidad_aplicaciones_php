<?php

namespace app\controllers;

use Yii;
use app\models\PorTituloTransito;
use app\models\PorTituloTransitoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Json;
use \yii\web\Response;
use yii\widgets\ActiveForm;
/**
 * PortitulotransitoController implements the CRUD actions for PorTituloTransito model.
 */
class PortitulotransitoController extends Controller
{
    private $FORMAT_DATE1 = '[$-C0A]d\-mmm\-yy;@';
    private $FORMAT_DECIMAL2P = '0.00';
    private $COLS_ABC = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI'];
    private $AMESES = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
    private $MESES = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
    private $ISPDF;
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
     * Lists all PorTituloTransito models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index',[
					'btnEnableEdit'=> $this->isEnableEditGen()
                ]);
    }

    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PorTituloTransito model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){
            $model = new PorTituloTransito();
            if ($model->load(Yii::$app->request->post())) {
                $session = Yii::$app->session;             
                $model->PorId = $session->get('PortafolioId');
                if($model->save()){                    
                    return "Exitoso";
                }else{                     
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);; 
                }             
            } else {
                return $this->renderPartial('create', [
                    'model' => $model,
                ]);
            }
        }
    }


    /**
     * Updates an existing PorTituloTransito model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->request->isAjax){
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post())) {
                $session = Yii::$app->session;             
                $model->PorId = $session->get('PortafolioId');
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

    /**
     * Deletes an existing PorTituloTransito model.
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
            if($model->save()){                    
                    return "Exitoso";
                }else{                     
                    Yii::$app->response->format = trim(Response::FORMAT_JSON);
                    return ActiveForm::validate($model);
                }                   
            $mensaje['mensaje'] = "Exitoso";
            return Json::encode($mensaje, true);
        } 
    }
    public function actionExit($id)
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
                return $this->renderPartial('exit', [
                    'model' => $model,
                ]);
            }
        }
    }
    /**
     * Finds the PorTituloTransito model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PorTituloTransito the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PorTituloTransito::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
/*     public function actionMostrar(){
        $searchModel = new PorTituloTransitoSearch();
        $parametros = $searchModel->mostrarListado();
        return Json::encode($parametros);
    }*/
     public function actionConsultarfecha(){
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $fecha = $data['fecha'];
        $fechaEnd =$data['fechaEnd'];
         $session = Yii::$app->session;
        $PortafolioId = $session->get('PortafolioId');
        $searchModel = new PorTituloTransitoSearch(); 
        $portTitulosTransito= $searchModel->consultarFecha($fecha,$fechaEnd,$PortafolioId);
        return Json::encode($portTitulosTransito);
    }
    public function actionValidarFechaSalida(){
         $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        $fecha = $data['fecha'];
          $session = Yii::$app->session;
        $PortafolioId = $session->get('PortafolioId');
        $searchModel = new PorTituloTransitoSearch();
        $porTituloTransito = $searchModel->datosTituloTransito();
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
        if($ids == 12 || $ids == 13){
            $rowsum = end($data);
            array_pop($data);
            $ruwn = ($ids == 12)? count($data) + 7 : count($data) + 1;
            $arrsum = [
                ['col' => 17, 'row' => $ruwn, 'sum' => $rowsum['nominal']],
                ['col' => 18, 'row' => $ruwn, 'sum' => $rowsum['compra']],
                ['col' => 19, 'row' => $ruwn, 'sum' => $rowsum['libros']],
                ['col' => 20, 'row' => $ruwn, 'sum' => $rowsum['valor']],
                ['col' => 31, 'row' => $ruwn, 'sum' => $rowsum['provision']]];            
        }
        if($ids == 14 || $ids == 15){
            $rowsum = end($data);            
            array_pop($data);
            $ruwn = ($ids == 14)? count($data) + 6 : count($data) + 1;
            $arrsum = [
                ['col' => 1, 'row' => $ruwn, 'sum' => $rowsum['capital']],
                ['col' => 2, 'row' => $ruwn, 'sum' => $rowsum['incremento']],
                ['col' => 3, 'row' => $ruwn, 'sum' => $rowsum['suma']],
                ['col' => 0, 'row' => 3, 'fDescripcion' => $fech],
                ['col' => 0, 'row' => 1, 'comitente' => $comitente]];            
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
        if (isset($arrData['filter'])) {
            $sheetData->setAutoFilter($arrData['filter']);
        }
        $objWriter = \PHPExcel_IOFactory::createWriter($fileExcel, 'Excel2007');
        $objWriter->save($arrData['nombreExcel']);
        echo $arrData['nombreExcel'];
    }
        private function infoMetadata($tipo, $fecha = "", $comitente = "", $fech2 = "") {
        $arrInfo = [];
        
         $arrInfo['cols'] = ['Emisor', 'Numeracion', 'Tipo', "Suma0" => 'ValorNominal','Observaciones'];
                $arrInfo['plantilla'] = 'plantilla/TitulosTransitoR.xlsx';
                $arrInfo['nombreExcel'] = 'tmp/TitulosTransitoR.xlsx';
                $arrInfo['nombrePdf'] = 'tmp/TitulosTransito.pdf';
                $arrInfo['inicio'] = 10;
                $arrInfo['colInicio'] = 2;
                $arrInfo['cabecera'] = [['col' => 2, 'row' => 7, 'fDescripcion' => $fecha, 'finicio' => $fech2],
                    ['col' => 2, 'row' => 5, 'comitente' => $comitente]];

        return $arrInfo;
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
						if($val>1){
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
                        }                        
                    }elseif (strpos($key, 'boolval') !== false) {
                        $val = $val? "X" : "";
                        $sheetData->setCellValueByColumnAndRow($i, $inicio, $val);
                    }elseif (strpos($key, 'Fecha') !== false) {
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
                    $ffini = "AL " . $fech2[2] . " DE " . $this->MESES[intval($fech2[1]) - 1] . " DEL " . $fech2[0]." ";
                }
                $sheetData->setCellValueByColumnAndRow($value['col'], $value['row'], $ffini);
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
    private function retornoFecha($fecha) {
        $fech = "";
        if (!empty($fecha) && strlen($fecha) >= 10) {
            $fech1 = substr($fecha, 0, 10);
            $arrF = explode("-", $fech1);
            $fech = $arrF[2] . "/" . $arrF[1] . "/" . $arrF[0];
        }
        return $fech;
    }
        private function formatRowCol(&$sheetData, $formato, $col, $row, $val) {
        \PHPExcel_Cell::setValueBinder(new \PHPExcel_Cell_AdvancedValueBinder());
        $sheetData->setCellValueByColumnAndRow($col, $row, $val);
        $sheetData->getStyleByColumnAndRow($col, $row)
                ->getNumberFormat()
                ->setFormatCode($formato);
    }
	public function isEnableEditGen(){
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
