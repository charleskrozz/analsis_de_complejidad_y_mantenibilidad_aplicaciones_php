<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_titulos_calificacion".
 *
 * @property integer $tca_id
 * @property integer $tiv_id
 * @property integer $cal_id
 * @property string $tca_fecha_desde
 * @property string $tca_fecha_hasta
 * @property string $tca_valor
 * @property string $tca_numero_resolucion
 * @property string $tca_fecha_resolucion
 * @property integer $tca_estado
 * @property string $tca_fecha_actualizacion
 * @property string $tca_fecha_creacion
 */
class PorTitulosCalificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_titulos_calificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['tiv_id','cal_id','tca_fecha_desde','tca_estado'], 'required'],
            [['tiv_id', 'cal_id', 'tca_estado'], 'integer'],
            [['tca_fecha_desde', 'tca_fecha_hasta', 'tca_fecha_resolucion', 'tca_fecha_actualizacion', 'tca_fecha_creacion','tca_envia_not'], 'safe'],
            [['tca_valor', 'tca_numero_resolucion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tca_id' => 'Tca ID',
            'tiv_id' => 'Título',
            'cal_id' => 'Calificadora',
            'tca_fecha_desde' => 'Fecha Desde',
            'tca_fecha_hasta' => 'Fecha Hasta',
            'tca_valor' => 'Categoría',
            'tca_numero_resolucion' => 'Comité',
            'tca_fecha_resolucion' => 'Fecha de Comité',
            'tca_estado' => 'Estado',
            'tca_fecha_actualizacion' => 'Fecha Actualización',
            'tca_fecha_creacion' => 'Fecha Creación',
            'tca_envia_not' => '',
        ];
    }
}
