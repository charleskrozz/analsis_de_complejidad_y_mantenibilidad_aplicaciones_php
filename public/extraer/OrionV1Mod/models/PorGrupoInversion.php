<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_grupo_inversion".
 *
 * @property integer $grp_id
 * @property integer $grp_padre_id
 * @property string $grp_descripcion
 * @property integer $grp_nivel
 * @property integer $grp_detalle
 * @property integer $grp_estado
 * @property integer $grp_id_sicav
 */
class PorGrupoInversion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_grupo_inversion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grp_padre_id', 'grp_nivel', 'grp_detalle', 'grp_estado', 'grp_id_sicav'], 'integer'],
            [['grp_descripcion'], 'string'],
            [['grp_nivel', 'grp_detalle'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grp_id' => 'Grp ID',
            'grp_padre_id' => 'Grp Padre ID',
            'grp_descripcion' => 'Grp Descripcion',
            'grp_nivel' => 'Grp Nivel',
            'grp_detalle' => 'Grp Detalle',
            'grp_estado' => 'Grp Estado',
            'grp_id_sicav' => 'Grp Id Sicav',
        ];
    }
}
