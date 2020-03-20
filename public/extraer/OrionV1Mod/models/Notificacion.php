<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "port_notificacion".
 *
 * @property integer $not_id
 * @property integer $por_id
 * @property integer $not_dias
 * @property string $not_estado
 * @property string $not_portafolio
 * @property string $not_color
 */
class Notificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_notificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['por_id', 'not_dias', 'not_estado','not_color'], 'required'],
            [['por_id', 'not_dias'], 'integer'],
            ['not_dias', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => 'Días de notificación, debe ser mayor a 0'],
            [['por_id', 'not_dias'], 'unique', 'targetAttribute' => ['por_id', 'not_dias'], 'message' => 'El portafolio y la notificación deben ser únicos.'],
            [['not_estado', 'not_portafolio', 'not_color'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'not_id' => 'Not ID',
            'por_id' => 'Portafolio',
            'not_dias' => 'Días Notificación',
            'not_estado' => 'Estado',
            'not_portafolio' => 'Nombre Portafolio',
            'not_color' => 'Color',
        ];
    }
}
