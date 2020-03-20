<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_grupo_reporte318_a".
 *
 * @property integer $grp_id
 * @property string $grp_codigo
 * @property string $grp_nombre
 * @property string $grp_descripcion
 * @property string $grp_estado
 * @property integer $grp_orden
 */
class PorGrupoReporte318A extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_grupo_reporte318_a';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grp_codigo', 'grp_nombre','grp_estado'], 'required'],
            [['grp_codigo', 'grp_nombre', 'grp_descripcion', 'grp_estado'], 'string'],
            [['grp_orden'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grp_id' => 'ID',
            'grp_codigo' => 'Código',
            'grp_nombre' => 'Nombre',
            'grp_descripcion' => 'Descripción',
            'grp_estado' => 'Estado',
            'grp_orden' => 'Orden',
        ];
    }
}
