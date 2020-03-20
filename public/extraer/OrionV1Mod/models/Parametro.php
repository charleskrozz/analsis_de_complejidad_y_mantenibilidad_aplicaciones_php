<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "port_parametro".
 *
 * @property integer $par_id
 * @property string $par_nombre
 * @property string $par_valor
 * @property string $par_fecha
 * @property integer $usu_id
 * @property string $par_nemonico
 *
 * @property Users $usu
 */
class Parametro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_parametro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['par_nombre', 'par_valor', 'par_nemonico'], 'required'],
            [['par_nombre', 'par_valor', 'par_nemonico'], 'string'],
            [['par_fecha'], 'safe'],
            [['usu_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'par_id' => 'Par ID',
            'par_nombre' => 'Parámetro',
            'par_valor' => 'Valor',
            'par_fecha' => 'Fecha',
            'usu_id' => 'Usu ID',
            'par_nemonico' => 'Nemónico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsu()
    {
        return $this->hasOne(Users::className(), ['id' => 'usu_id']);
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'par_fecha',
                'updatedAtAttribute' => 'par_fecha',
                'value' => new Expression('CURRENT_TIMESTAMP'),
            ],
        ];
    }
}