<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "port_menu_perfil".
 *
 * @property integer $per_men_id
 * @property integer $men_id
 * @property integer $per_id
 * @property integer $men_per_estado
 * @property integer $men_per_consulta
 * @property integer $men_per_actualizar
 * @property integer $men_per_borrar
 * @property integer $men_per_crear
 *
 * @property Menu $men
 * @property Perfil $per
 */
class MenuPerfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_menu_perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['men_id', 'per_id', 'men_per_estado'], 'required'],
            [['per_men_id', 'men_id', 'per_id', 'men_per_estado'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'per_men_id' => 'Per Men ID',
            'men_id' => 'Men ID',
            'per_id' => 'Per ID',
            'men_per_estado' => 'Men Per Estado',
            'men_per_crear' => 'Crear',
            'men_per_consulta' => 'Consultar',
            'men_per_actualizar' => 'Actualizar',
            'men_per_borrar' => 'Borrar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMen()
    {
        return $this->hasOne(Menu::className(), ['men_id' => 'men_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPer()
    {
        return $this->hasOne(Perfil::className(), ['per_id' => 'per_id']);
    }
        
}
