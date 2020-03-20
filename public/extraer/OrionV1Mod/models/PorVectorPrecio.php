<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_vector_precio".
 *
 * @property integer $vpr_id
 * @property integer $TivId
 * @property string $FechaPrecio
 * @property string $Emisor
 * @property string $TipoValor
 * @property string $FechaEmision
 * @property string $FechaVencimiento
 * @property double $TasaValor
 * @property double $Precio
 * @property integer $tiv_id_sicav
 * @property double $RendimientoEquivalente
 */
class PorVectorPrecio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_vector_precio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TivId', 'tiv_id_sicav'], 'integer'],
            [['FechaPrecio', 'FechaEmision', 'FechaVencimiento'], 'safe'],
            [['Emisor', 'TipoValor'], 'string'],
            [['TasaValor', 'Precio', 'RendimientoEquivalente'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vpr_id' => 'Vpr ID',
            'TivId' => 'Tiv ID',
            'FechaPrecio' => 'Fecha Precio',
            'Emisor' => 'Emisor',
            'TipoValor' => 'Tipo Valor',
            'FechaEmision' => 'Fecha Emision',
            'FechaVencimiento' => 'Fecha Vencimiento',
            'TasaValor' => 'Tasa Valor',
            'Precio' => 'Precio',
            'tiv_id_sicav' => 'Tiv Id Sicav',
            'RendimientoEquivalente' => 'Rendimiento Equivalente',
        ];
    }
}
