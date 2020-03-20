<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_negociacion_cupon".
 *
 * @property integer $nec_id
 * @property integer $tpo_id
 * @property integer $flu_id
 * @property string $nec_tipo
 * @property string $nec_fecha_venta
 */
class PorNegociacionCupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_negociacion_cupon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tpo_id', 'flu_id'], 'integer'],
            [['nec_tipo'], 'string'],
            [['nec_fecha_venta'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nec_id' => 'Nec ID',
			'neg_id' => 'Neg ID',
            'tpo_id' => 'Tpo ID',
            'flu_id' => 'Flu ID',
            'nec_tipo' => 'Nec Tipo',			
            'nec_fecha_venta' => 'Nec Fecha Venta',
        ];
    }
}
