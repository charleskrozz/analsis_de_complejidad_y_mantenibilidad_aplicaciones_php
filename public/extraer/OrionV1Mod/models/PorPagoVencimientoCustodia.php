<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_pago_vencimiento_custodia".
 *
 * @property integer $pvc_id
 * @property string $Emisor
 * @property string $Numeracion
 * @property double $ValorNominal
 * @property string $Tipo
 * @property string $FechaRegistro
 * @property string $Observaciones
 */
class PorPagoVencimientoCustodia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_pago_vencimiento_custodia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['Emisor', 'Numeracion', 'Tipo','ValorNominal','FechaRegistro'], 'required'],
            [['Emisor', 'Numeracion', 'Tipo', 'Observaciones'], 'string'],
            [['ValorNominal'], 'number'],
            [['PorId'],'integer'],
            [['FechaRegistro','FechaSalida'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pvc_id' => 'Pvc ID',
            'Emisor' => 'Emisor',
            'Numeracion' => 'Numeración',
            'ValorNominal' => 'Valor Nominal',
            'Tipo' => 'Tipo',
            'FechaRegistro' => 'Fecha Registro',
            'Observaciones' => 'Observaciones',
            'PorId'=>'Por Id',
            'FechaSalida '=>'Fecha Salida',
        ];
    }
}
