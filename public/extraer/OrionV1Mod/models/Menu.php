<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "port_menu".
 *
 * @property integer $men_id
 * @property string $men_nombre
 * @property string $men_path
 * @property string $men_descripcion
 * @property integer $men_padre
 * @property integer $men_estado
 * @property string $men_fecha_creacion
 * @property integer $men_orden
 * @property string $men_item_template
 * @property string $men_per_consulta
 * @property string $men_per_editar
 * @property string $men_per_borrar
 * @property string $men_per_crear
 *
 * @property MenuPerfil[] $menuPerfils
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['men_nombre', 'men_path', 'men_descripcion', 'men_item_template'], 'string'],
            [['men_padre', 'men_estado', 'men_orden'], 'integer'],
            [['men_fecha_creacion'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'men_id' => 'Men ID',
            'men_nombre' => 'Men Nombre',
            'men_path' => 'Men Path',
            'men_descripcion' => 'Men Descripcion',
            'men_padre' => 'Men Padre',
            'men_estado' => 'Men Estado',
            'men_fecha_creacion' => 'Men Fecha Creacion',
            'men_orden' => 'Men Orden',
            'men_item_template' => 'Item template'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuPerfils()
    {
        return $this->hasMany(MenuPerfil::className(), ['men_id' => 'men_id']);
    }
}
