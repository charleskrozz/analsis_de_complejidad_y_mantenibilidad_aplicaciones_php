<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_historial_titulos_portafolio_desc".
 *
 * @property integer $htp_id
 * @property double $htp_monto
 * @property string $htp_fecha
 * @property integer $htp_origen
 * @property integer $htp_id_origen
 * @property double $htp_saldo_ant
 * @property double $htp_saldo_act
 */
class PorHistorialTitulosPortafolioDesc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_historial_titulos_portafolio_desc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['htp_monto', 'htp_saldo_ant', 'htp_saldo_act'], 'number'],
            [['htp_fecha'], 'safe'],
            [['htp_origen', 'htp_id_origen'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'htp_id' => 'Htp ID',
            'htp_monto' => 'Htp Monto',
            'htp_fecha' => 'Htp Fecha',
            'htp_origen' => 'Htp Origen',
            'htp_id_origen' => 'Htp Id Origen',
            'htp_saldo_ant' => 'Htp Saldo Ant',
            'htp_saldo_act' => 'Htp Saldo Act',
        ];
    }
}
