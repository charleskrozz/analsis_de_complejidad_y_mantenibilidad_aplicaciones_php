<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "port_correo".
 *
 * @property integer $cor_id
 * @property string $cor_correo
 * @property integer $id
 * @property string $fecha
 */
class Correo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_correo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cor_correo', 'id'], 'required'],
            [['cor_correo'], 'email'],
            [['cor_correo'], 'string'],
            [['id'], 'integer'],
            [['fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cor_id' => 'Cor ID',
            'cor_correo' => 'Correo Electrónico',
            'id' => 'Usuario',
            'fecha' => 'Fecha generación',
        ];
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'fecha',
                'updatedAtAttribute' => false,
                'value' => new Expression('CURRENT_TIMESTAMP'),
            ],
        ];
    }
}
