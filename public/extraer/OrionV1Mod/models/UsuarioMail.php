<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "port_usuario_email".
 *
 * @property integer $pue_id
 * @property string $pue_email
 * @property integer $pue_principal
 * @property integer $pue_habilitado
 * @property integer $com_id
 * @property integer $por_id
 * @property integer $usr_id
 */
class UsuarioMail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_usuario_email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pue_email'], 'required'],
            [['pue_email'], 'email'],
            [['pue_email'], 'string'],
            [['pue_principal', 'pue_habilitado', 'com_id', 'por_id', 'usr_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pue_id' => 'Pue ID',
            'pue_email' => 'Correo',
            'pue_principal' => 'Correo Principal',
            'pue_habilitado' => 'Correo Habilitado',
            'com_id' => 'Com ID',
            'por_id' => 'Por ID',
            'usr_id' => 'porafolio por usuario',
        ];
    }
    
    public function corrDefecto($idusu, $idpue){
        $connection = \Yii::$app->db;			
        $connection->createCommand()
            ->update('port_usuario_email', ['pue_principal' => 0], 'usr_id = '.$idusu.' and pue_id != '.$idpue)
            ->execute();
    }        
}
