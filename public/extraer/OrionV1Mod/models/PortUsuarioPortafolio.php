<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "port_usuario_portafolio".
 *
 * @property integer $upa_id
 * @property integer $usr_id
 * @property integer $com_id
 * @property integer $por_id
 * @property string $upa_estado
 * @property string $upa_ultima_act
 * @property integer $upa_principal
 * @property string $upa_nombre_comitente
 * @property string $upa_codigo
 */
class PortUsuarioPortafolio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_usuario_portafolio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usr_id', 'com_id', 'por_id'], 'required'],
            [['usr_id', 'com_id', 'por_id', 'upa_principal'], 'integer'],
            [['upa_estado', 'upa_nombre_comitente', 'upa_codigo'], 'string'],
            [['upa_ultima_act'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'upa_id' => 'Upa ID',
            'usr_id' => 'Usr ID',
            'com_id' => 'Com ID',
            'por_id' => 'Por ID',
            'upa_estado' => 'Upa Estado',
            'upa_ultima_act' => 'Upa Ultima Act',
            'upa_principal' => 'Upa Principal',
            'upa_nombre_comitente' => 'Upa Nombre Comitente',
            'upa_codigo' => 'Upa Codigo',
        ];
    }
}
