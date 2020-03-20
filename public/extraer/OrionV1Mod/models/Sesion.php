<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use app\models\UsuarioPortafolio;

/**
 * This is the model class for table "port_sesion".
 *
 * @property integer $ses_id
 * @property integer $men_id
 * @property integer $usu_id
 * @property integer $por_id
 * @property integer $com_id
 * @property string $ses_fecha_inicio
 * @property string $ses_fecha_fin
 * @property string $ses_ip
 * @property integer $ses_estado
 * @property string $ses_comitente
 *
 * @property Menu $men
 * @property Users $usu
 */
class Sesion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_sesion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ses_id'], 'required'],
            [['ses_id', 'men_id', 'usu_id', 'por_id', 'com_id', 'ses_estado'], 'integer'],
            [['ses_fecha_inicio', 'ses_fecha_fin'], 'safe'],
            [['ses_ip', 'ses_comitente'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ses_id' => 'Ses ID',
            'men_id' => 'Men ID',
            'usu_id' => 'Usu ID',
            'por_id' => 'Por ID',
            'com_id' => 'Com ID',
            'ses_fecha_inicio' => 'Ses Fecha Inicio',
            'ses_fecha_fin' => 'Ses Fecha Fin',
            'ses_ip' => 'Ses Ip',
            'ses_estado' => 'Estado',
            'ses_comitente' => 'Comitente'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMen()
    {
        return $this->hasOne(Menu::className(), ['men_id' => 'men_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsu()
    {
        return $this->hasOne(Users::className(), ['id' => 'usu_id']);
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'ses_fecha_inicio',
                'updatedAtAttribute' => 'ses_fecha_fin',
                'value' => new Expression('CURRENT_TIMESTAMP'),
            ],
        ];
    }
    
    public function registroSesion($guardar, $men_id = ""){
        //actualizo las sesiones en estado activo
        $this->updateAll(['ses_estado' => 0, 'ses_fecha_fin' => new Expression('CURRENT_TIMESTAMP')], 
                "ses_estado=1 and usu_id=".Yii::$app->user->identity->id);        
        //ingreso la sesión actual
        if($guardar){
            $osesion = new Sesion();
            $osesion->usu_id = Yii::$app->user->identity->id;
            $osesion->ses_estado = 1;
            $osesion->men_id = $men_id;
            $osesion->ses_ip = Yii::$app->getRequest()->getUserIP();
            $session = Yii::$app->session;
            if(!empty($session->get('NombreComitente'))){
                $osesion->ses_comitente = $session->get('NombreComitente');
                $osesion->por_id = $session->get('PortafolioId');
                $osesion->com_id = $session->get('ComitenteId');
            }else{
                $ousua = new UsuarioPortafolio();
                $uport = $ousua->findOne([
                    'usr_id' => Yii::$app->user->identity->id
                ]);
                if(!empty($uport->com_id)){
                    $osesion->ses_comitente = $uport->upa_nombre_comitente;
                    $osesion->por_id = $uport->por_id;
                    $osesion->com_id = $uport->com_id;
                }
            }
            $osesion->save(false);
        }
    }
}
