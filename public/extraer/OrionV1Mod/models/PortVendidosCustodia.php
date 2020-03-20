<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "port_vendidos_custodia".
 *
 * @property integer $tvc_id
 * @property string $Emisor
 * @property string $Numeracion
 * @property double $ValorNominal
 * @property string $Tipo
 * @property string $FechaRegistro
 * @property string $Observaciones
 */
class PortVendidosCustodia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_vendidos_custodia';
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
            'tvc_id' => 'Tvc ID',
            'Emisor' => 'Emisor',
            'Numeracion' => 'Numeración',
            'ValorNominal' => 'Valor Nominal',
            'Tipo' => 'Tipo',
            'FechaRegistro' => 'Fecha Registro',
            'Observaciones' => 'Observaciones',
            'PorId'=>'PorId',
            'FechaSalida '=>'Fecha Salida ',
        ];
    }
        public function getFgpPadre()
    {
        return $this->hasOne(PorGrupoReporte318::className(), ['tvc_id' => 'tvc_padre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortVendidosCustodias()
    {
        return $this->hasMany(PortVendidosCustodia::className(), ['tvc_padre' => 'tvc_id']);
    }
}
