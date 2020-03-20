<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_notificaciones_diarias".
 *
 * @property integer $pno_id
 * @property integer $por_id
 * @property string $pno_fecha_registro
 */
class PorNotificacionesDiarias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_notificaciones_diarias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['por_id'], 'required'],
            [['por_id'], 'integer'],
            [['pno_fecha_registro'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pno_id' => 'Pno ID',
            'por_id' => 'Portafolio',
            'pno_fecha_registro' => 'Fecha Registro',
        ];
    }
}
