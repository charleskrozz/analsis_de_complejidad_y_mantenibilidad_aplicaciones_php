<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "port_perfil".
 *
 * @property integer $per_id
 * @property string $per_nombre
 * @property string $per_descripcion
 * @property integer $per_estado
 * @property string $per_fecha_creacion
 *
 * @property MenuPerfil[] $menuPerfils
 * @property Usuario[] $usuarios
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_nombre', 'per_descripcion', 'per_estado'], 'required'],
            [['per_nombre', 'per_descripcion'], 'string'],
            [['per_estado'], 'integer'],
            [['per_fecha_creacion'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'per_id' => 'Per ID',
            'per_nombre' => 'Nombre',
            'per_descripcion' => 'Descripción',
            'per_estado' => 'Estado',
            'per_fecha_creacion' => 'Per Fecha Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuPerfils()
    {
        return $this->hasMany(MenuPerfil::className(), ['per_id' => 'per_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['per_id' => 'per_id']);
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'per_fecha_creacion',
                'updatedAtAttribute' => false,
                'value' => new Expression('CURRENT_TIMESTAMP'),
            ],
        ];
    }
}
