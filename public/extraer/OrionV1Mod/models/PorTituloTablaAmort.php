<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "por_titulo_tabla_amortizacion".
 *
 * @property integer $pta_id
 * @property integer $TpoId
 * @property string $pta_path
 * @property string $pta_fecha
 * @property string $pta_estado
 */
class PorTituloTablaAmort extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_titulo_tabla_amortizacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TpoId'], 'integer'],
            [['pta_path', 'pta_estado'], 'string'],
            [['pta_fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pta_id' => 'Pta ID',
            'TpoId' => 'Tpo ID',
            'pta_path' => 'Pta Path',
            'pta_fecha' => 'Pta Fecha',
            'pta_estado' => 'Pta Estado',
        ];
    }
}
