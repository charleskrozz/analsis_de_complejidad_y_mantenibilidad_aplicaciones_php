<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_titulo_portafolio_tabla_amor".
 *
 * @property integer $tpt_id
 * @property integer $tpo_id
 * @property string $tpt_path
 * @property string $tpt_fecha
 * @property string $tpt_estado
 */
class PorTituloPortafolioTablaAmor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_titulo_portafolio_tabla_amor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tpo_id'], 'integer'],
            [['tpt_path', 'tpt_estado'], 'string'],
            [['tpt_fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tpt_id' => 'Tpt ID',
            'tpo_id' => 'Tpo ID',
            'tpt_path' => 'Tpt Path',
            'tpt_fecha' => 'Tpt Fecha',
            'tpt_estado' => 'Tpt Estado',
        ];
    }
}
