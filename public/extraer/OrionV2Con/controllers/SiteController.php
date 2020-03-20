<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MenuSearch;
use app\models\PasswordForm;
use app\models\Users;
use app\models\Sesion;
use \yii\helpers\Json;

class SiteController extends Controller
{
    public function behaviors()
    { 
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout', 'resetear'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function resultado($resultado, $objt){
        if($resultado == true){
            return true;
        }else{
            echo $objt->render('/site/error', [
                "name" => "No permitido",
                'message' => "No tiene permiso para acceder a este recurso!",
            ]);
            return false;
        }
    }
    
    public function actionAsignarportusu(){
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);        
        $session = Yii::$app->session;
        $session->set('ComitenteId', $data['ComitenteId']);
        $session->set('PortafolioId', $data['PortafolioId']);
        $session->set('NombreComitente', $data['NombreComitente']);
        $session->set('ItemPortSelect', $data['upa_id']);
        
    }

    private function wsdl(){
        ini_set('max_execution_time', 180);
        $wsdl = Yii::$app->params['webService'];
        $client = new \SoapClient($wsdl, array('trace' => 1, "connection_timeout" => 180, "exceptions" => false,'cache_wsdl' => WSDL_CACHE_NONE));
        
        return $client;
    }
    public function  actionEnviaremail(){
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        
        $resultEmail = FALSE;
        $client = $this->wsdl();
        $session = Yii::$app->session;
        $ComitenteId = $session->get('ComitenteId');
        $PortafolioId = $session->get('PortafolioId');

        $params = [];
        $params['intComitenteId'] = $ComitenteId;
        $params['intPortafolioId'] = $PortafolioId;      
        $params['intUserId'] = Yii::$app->user->identity->id;
        $params['dtFecha'] = $data['fecha'];
        $resultado=$client->EnviarEmailVencimientosIndex($params);                    
        $resultEmail = $resultado->EnviarEmailVencimientosIndexResult;
        return $resultEmail;
    }
    public function actionNotificaciones()
    {
        $infoNotificaciones = "[]";
        try{
            $client = $this->wsdl();
            $session = Yii::$app->session;
            $ComitenteId = $session->get('ComitenteId');
            $PortafolioId = $session->get('PortafolioId');

            $params = [];
            $params['intComitenteId'] = $ComitenteId;
            $params['intPortafolioId'] = $PortafolioId;            
            $resultado=$client->ObtenerNotificacionesVencimientosActInt($params);                        
            $infoNotificaciones = $resultado->ObtenerNotificacionesVencimientosActIntResult;

            if($infoNotificaciones==""){
                $infoNotificaciones = "[]";
            }
        }catch(\Exception $ex){
                $infoNotificaciones = "[]";
                echo $ex;
        }
        echo $infoNotificaciones;
    }
    public function actionHechosrelevantes()
    {
        $post = file_get_contents("php://input");
        $data = Json::decode($post, true);
        
        $infoHechosRelevantes = "[]";
        try{
            $client = $this->wsdl();
            $params = [];
            $params['dtFechaIni'] = $data['fechaIni'];
            $params['dtFechaFin'] = $data['fechaFin'];
            $resultado=$client->ObtenerHechosRelevantes($params);            
            $infoHechosRelevantes = $resultado->ObtenerHechosRelevantesResult;
        }catch(\Exception $ex){
                $infoHechosRelevantes = "[]";
        }
        echo $infoHechosRelevantes;
    }
    public function actionObtenerboletin()
    { 
        $infoBoletin = "[]";
        try{
            $client = $this->wsdl();
            $resultado=$client->ObtenerBoletinSemanal();            
            $infoBoletin = $resultado->ObtenerBoletinSemanalResult;
        }catch(\Exception $ex){
                $infoBoletin = "[]";
        }
        echo $infoBoletin;
    }
    public function actionNoticias()
    {
        $infoRssNoticias = "[]";
        try
        {
            $client = $this->wsdl();
            $params = [];
            $resultado=$client->ObtenerNoticias();            
            $infoRssNoticias = $resultado->ObtenerNoticiasResult;
        }catch(\Exception $ex){
                $infoRssNoticias = "[]";
        }
        echo $infoRssNoticias;
    }
    public function actionIndex()
    {  
        $infoPortafolioUsuario = "[]";
        $infoHechosRelevantes = "[]";
        $infoNotificaciones = "[]";
        $infoRssNoticias = "[]";
        $rssDoc = null;
        $selValue = "{}";
        try {
            $client = $this->wsdl();
            $params['intUsuarioId'] = Yii::$app->user->identity->id;
            $resultado=$client->ObtenerPortafoliosPorUsuario($params);            
            $infoPortafolioUsuario = $resultado->ObtenerPortafoliosPorUsuarioResult;
            if(empty($infoPortafolioUsuario) || $infoPortafolioUsuario == "[]"){
                $infoPortafolioUsuario = "[]";
                $selValue = "{}";
            }else{
                $selValue = $this->valuePortafolio($infoPortafolioUsuario);
            }
        } catch (\SoapFault $fault) {
            $error = $fault->getTraceAsString(); 
            $selValue = "{}";
        }
        return $this->render('index', [
            'infoPortafolioUsuario' => $infoPortafolioUsuario,
            'infoHechosRelevantes' => $infoHechosRelevantes,
            'infoNotificaciones' => $infoNotificaciones,
            'infoRssNoticias' => $infoRssNoticias,
            'selValue' => $selValue,
        ]);         
    }
    
    private function valuePortafolio($arrInfo){
        
        $session = Yii::$app->session;
        $ComitenteId = $session->get('ComitenteId');
        $PortafolioId = $session->get('PortafolioId');
        $comitente = $session->get('NombreComitente');
        $itemPortSelect = $session->get('ItemPortSelect');
        
        if(empty($ComitenteId) || empty($PortafolioId) || empty($comitente) || empty($itemPortSelect)){
            $arrCombo = Json::decode($arrInfo, true);
            foreach ($arrCombo as $value) {
                //echo $value['NombreComitente'];
                if($value['upa_principal']){
                    $session->set('ComitenteId', $value['ComitenteId']);
                    $session->set('PortafolioId', $value['PortafolioId']);
                    $session->set('NombreComitente', $value['NombreComitente']);
                    $session->set('ItemPortSelect', $value['upa_id']);
                    $comitente = $value['NombreComitente'];
                    return $value['upa_id'];
                }
            }
        }else{
            return $itemPortSelect;
        }   
        
        return 0;
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {            
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {  
            $this->initMenu();
            $osession = new Sesion();
            $osession->registroSesion(true, 36);
            return $this->goBack();
        }
        $session = Yii::$app->session;
        $mensj = "";
        if($session->isActive){
            if($session->has('mensj')){
                $mensj = $session->get('mensj');
                $session->remove('mensj');
                $session->destroy();
            }
        }
        return $this->render('login', [
            'model' => $model,
            'mensj' => $mensj,
        ]);
    }
    
    private function permisos(&$permisos, $strPermi){
        if(strpos($strPermi, ",") === FALSE){
            array_push($permisos, $strPermi);
        }else{
            $arrs = explode(",", $strPermi);
            foreach ($arrs as $value) {
                array_push($permisos, $value);
            }
        }
    }
    
    private function setPermissions(&$permisos, $menu){
        if($menu['men_per_crear'] == 1 && !empty($menu['men_crear'])){
            $this->permisos($permisos, $menu['men_crear']);
        }
        if($menu['men_per_consulta'] == 1 && !empty($menu['men_consultar'])){
            $this->permisos($permisos, $menu['men_consultar']);
        }
        if($menu['men_per_actualizar'] == 1 && !empty($menu['men_editar'])){
            $this->permisos($permisos, $menu['men_editar']);
        }
        if($menu['men_per_borrar'] == 1 && !empty($menu['men_borrar'])){
            $this->permisos($permisos, $menu['men_borrar']);
        }
    }
    
    private function submenus($menus, &$menuPadre, &$permisos){
        $arrSubmenu = [] ;
        foreach ($menus as $menu) {
            if($menu['men_padre'] == $menuPadre['id']){
                $this->setPermissions($permisos, $menu);
                $sub = ['id' => $menu['men_id'],'label' => $menu['men_nombre'], 'url' => [$menu['men_path']]];
                if(!empty($menu['men_item_template'])){
                    $sub['template'] = $menu['men_item_template'];
                }
                $arrSubmenu[] = $sub; 
            }
        }
        if(count($arrSubmenu) > 0){
            $menuPadre['items'] = $arrSubmenu;
        }
    }

    private function initMenu(){
        $menus = MenuSearch::menuPerfil(Yii::$app->user->identity->id);

        $menuItems = [];
        $permisos = [];
		$buttoms = [];
        foreach ($menus as $menu) {		
			$bolAdd = true;
            $this->setPermissions($permisos, $menu);
			if($menu['men_path']=='#BTN_TBLAMORTIZACION' || $menu['men_path']=='#BTN_RV' || $menu['men_path']=='#BTN_EDITARG' || $menu['men_path']=='#BTN_ADDLIQ'){
				array_push($buttoms, $menu);
				$bolAdd = false;
			}
			if($bolAdd){
				$label = ($menu['men_nombre'] == 'optionUser')? Yii::$app->user->identity->username : $menu['men_nombre'];
				if(empty($menu['men_padre'])){
					$menuPadre = ['id' => $menu['men_id'],'label' => $label, 'url' => [$menu['men_path']], 'template' => $menu['men_item_template']];
					$this->submenus($menus, $menuPadre, $permisos);
					$menuItems[] = $menuPadre;
				}
			}
        }
        $session = Yii::$app->session;
        $session->set('menus', $menuItems);
        $session->set('permisos', $permisos);
		$session->set('buttons_rm', $buttoms);
    }
    
    public static function processAction($action){        
        try {
            $arrPermisos = Yii::$app->session->get('permisos');
            
            if(!is_null($arrPermisos) && in_array($action, $arrPermisos)){
                return true;
            }
            
        } catch (Exception $exc) {
            return false;
        }

        return false;
    }

    public function actionLogout()
    {
        $osession = new Sesion();
        $osession->registroSesion(false);
        Yii::$app->user->logout();        
        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionResetear(){
        $model = new PasswordForm;        
      
        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                try{
                    $mensaje = "";
                    $modeluser = Users::find()->where([
                        'username'=> $_POST['PasswordForm']['users']
                    ])->one();
                    $modeluser->password = $_POST['PasswordForm']['newpass'];
                    $modeluser->estadoe = true;
                    if($modeluser->save()){
                        $mensaje = 'Clave cambiada exitósamente';
                    }else{
                        $mensaje = 'La clave no fue cambiada, favor comuníquese con el administrador';
                    }
                    $session = Yii::$app->session;
                    $session->set('mensj', $mensaje);
                    $this->redirect(yii\helpers\Url::toRoute(['site/login']));
                }catch(Exception $e){
                    return $this->render('resetear',[
                        'model'=>$model
                    ]);
                }
            }else{
                return $this->render('resetear',[
                    'model'=>$model
                ]);
            }
        }else{
            return $this->render('resetear',[
                'model'=>$model
            ]);
        }
    }

}
