<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_precio_rv".
 *
 * @property integer $prv_id
 * @property string $prv_codigo_sic
 * @property string $prv_codigo_sic_gen
 * @property string $prv_fecha_emision
 * @property string $prv_fecha_vencimiento
 * @property double $prv_precio
 * @property double $prv_rendimiento
 */
class PorPrecioRv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_precio_rv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prv_codigo_sic', 'prv_codigo_sic_gen','prv_precio','prv_rendimiento'], 'required'],
            [['prv_codigo_sic', 'prv_codigo_sic_gen'], 'string'],
            [['prv_fecha_emision', 'prv_fecha_vencimiento'], 'safe'],
            [['prv_precio', 'prv_rendimiento'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prv_id' => 'ID',
            'prv_codigo_sic' => 'Codigo Sic',
            'prv_codigo_sic_gen' => 'Codigo Genérico',
            'prv_fecha_emision' => 'Fecha Emisión',
            'prv_fecha_vencimiento' => 'Fecha Vencimiento',
            'prv_precio' => 'Precio',
            'prv_rendimiento' => 'Rendimiento',
        ];
    }
}
