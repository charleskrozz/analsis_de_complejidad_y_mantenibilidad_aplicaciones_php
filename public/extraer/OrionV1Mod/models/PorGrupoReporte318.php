<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_grupo_reporte318".
 *
 * @property integer $fgp_id
 * @property string $fgp_codigo
 * @property string $fgp_nombre
 * @property string $fgp_descripcion
 * @property string $fgp_estado
 * @property integer $fgp_orden
 * @property string $fgp_color
 * @property string $fgp_formula
 * @property integer $fgp_padre
 *
 * @property PorGrupoReporte318 $fgpPadre
 * @property PorGrupoReporte318[] $porGrupoReporte318s
 */
class PorGrupoReporte318 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_grupo_reporte318';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fgp_codigo', 'fgp_nombre', 'fgp_estado','fgp_orden','fgp_estado'], 'required'],
            [['fgp_codigo', 'fgp_nombre', 'fgp_descripcion', 'fgp_estado', 'fgp_color', 'fgp_formula'], 'string'],
            [['fgp_orden', 'fgp_padre'], 'integer'],
            
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fgp_id' => 'Fgp ID',
            'fgp_codigo' => 'Código',
            'fgp_nombre' => 'Nombre',
            'fgp_descripcion' => 'Descripción',
            'fgp_estado' => 'Estado',
            'fgp_orden' => 'Orden',
            'fgp_color' => 'Color',
            'fgp_formula' => 'Fórmula',
            'fgp_padre' => 'Padre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFgpPadre()
    {
        return $this->hasOne(PorGrupoReporte318::className(), ['fgp_id' => 'fgp_padre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorGrupoReporte318s()
    {
        return $this->hasMany(PorGrupoReporte318::className(), ['fgp_padre' => 'fgp_id']);
    }
}
