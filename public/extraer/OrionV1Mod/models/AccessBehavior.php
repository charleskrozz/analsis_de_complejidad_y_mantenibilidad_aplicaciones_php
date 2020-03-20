<?php

/*
 * In configuration file
 * ...
 * 'as AccessBehavior' => [
 *    'class' => '\app\components\AccessBehavior'
 * ]
 * ...
 * (c) Artem Voitko <r3verser@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models;


use yii\base\Behavior;
use yii\console\Controller;
use yii\helpers\Url;
use app\controllers\SiteController;

/**
 * Redirects all users to login page if not logged in
 *
 * Class AccessBehavior
 * @package app\components
 * @author  Artem Voitko <r3verser@gmail.com>
 */
class AccessBehavior extends Behavior
{
    /**
     * Subscribe for events
     * @return array
     */
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeAction'
        ];
    }

    /**
     * On event callback
     */
    public function beforeAction()
    {
		
        if(\Yii::$app->getUser()->isGuest && 
            \Yii::$app->getRequest()->url === Url::to(['site/resetear'])){
            return true;
        }

        if (\Yii::$app->getUser()->isGuest &&
            \Yii::$app->getRequest()->url !== Url::to(\Yii::$app->getUser()->loginUrl)
        ) {
            \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }    
        $menus = \Yii::$app->session->get('menus');

        if(!empty($menus)){
            $operacion = str_replace("/", "_", \Yii::$app->controller->route);
            $resultado = SiteController::processAction($operacion);

            if(!$resultado){
                \Yii::$app->getResponse()->redirect(['/site/error',
                    "name" => "No permitido",
                    'message' => "No tiene permiso para acceder a este recurso!",
                    ]
                );
            }
        }
    }
}