<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "port_not_vencimiento".
 *
 * @property integer $nve_id
 * @property string $nve_nombre
 * @property integer $nve_lim_menor
 * @property integer $nve_lim_mayor
 * @property string $nve_color
 * @property integer $nve_orden
 */
class Vencimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_not_vencimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nve_nombre', 'nve_color', 'nve_lim_menor', 'nve_lim_mayor', 'nve_orden'], 'required'],
            [['nve_nombre', 'nve_color'], 'string'],
            [['nve_lim_menor', 'nve_lim_mayor', 'nve_orden'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nve_id' => 'Nve ID',
            'nve_nombre' => 'Nombre',
            'nve_lim_menor' => 'Límite Menor',
            'nve_lim_mayor' => 'Límite Mayor',
            'nve_color' => 'Color',
            'nve_orden' => 'Orden',
        ];
    }
}
