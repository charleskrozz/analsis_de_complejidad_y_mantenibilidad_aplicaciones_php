<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_moneda".
 *
 * @property integer $mon_id
 * @property string $mon_nombre
 * @property string $mon_codigo_iso
 * @property string $mon_simbolo
 * @property integer $mon_estado
 * @property integer $mon_codigo_sic
 */
class PorMoneda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_moneda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mon_nombre', 'mon_codigo_iso', 'mon_simbolo', 'mon_estado'], 'required'],
            [['mon_nombre', 'mon_codigo_iso', 'mon_simbolo'], 'string'],
            [['mon_estado', 'mon_codigo_sic'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mon_id' => 'Mon ID',
            'mon_nombre' => 'Mon Nombre',
            'mon_codigo_iso' => 'Mon Codigo Iso',
            'mon_simbolo' => 'Mon Simbolo',
            'mon_estado' => 'Mon Estado',
            'mon_codigo_sic' => 'Mon Codigo Sic',
        ];
    }
}
