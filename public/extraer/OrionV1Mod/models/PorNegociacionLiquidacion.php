<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "por_titulo_liquidacion".
 *
 * @property integer $ptl_id
 * @property integer $NegId
 * @property string $ptl_path
 * @property string $ptl_fecha
 * @property string $ptl_estado
 */
class PorNegociacionLiquidacion extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_negociacion_liquidacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['neg_id'], 'integer'],
            [['pnl_path', 'pnl_estado'], 'string'],
            [['pnl_fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pnl_id' => 'pnl_id',
            'neg_id' => 'neg_id',
            'pnl_path' => 'Path',
            'pnl_fecha' => 'Fecha',
            'pnl_estado' => 'Estado',
        ];
    }
}
