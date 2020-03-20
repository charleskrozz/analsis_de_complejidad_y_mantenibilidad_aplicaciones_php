<?php

namespace app\models;

use yii\db\Query;
use \yii\db\mssql\PDO;
use Yii;

/**
 * This is the model class for table "por_emisor_tipo_valor".
 *
 * @property integer $etv_id
 * @property integer $emi_id
 * @property integer $tvl_id
 * @property string $etv_codigo_sic
 * @property string $etv_resolucion_sic
 * @property string $etv_fecha_rmv
 * @property string $etv_fecha_resolucion_sic
 * @property integer $etv_codigo_sic2
 * @property integer $etv_codigo_gen_sic
 * @property string $etv_fecha_creacion
 * @property string $etv_fecha_actualizacion
 * @property string $etv_camara
 * @property integer $etv_id_sicav
 */
class PorEmisorTipoValor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_emisor_tipo_valor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emi_id', 'tvl_id', 'etv_fecha_creacion', 'etv_fecha_actualizacion'], 'required'],
            [['emi_id', 'tvl_id', 'etv_codigo_sic2', 'etv_codigo_gen_sic', 'etv_id_sicav'], 'integer'],
            [['etv_codigo_sic', 'etv_resolucion_sic', 'etv_camara'], 'string'],
            [['etv_fecha_rmv', 'etv_fecha_resolucion_sic', 'etv_fecha_creacion', 'etv_fecha_actualizacion'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'etv_id' => 'Etv ID',
            'emi_id' => 'Emisor',
            'tvl_id' => 'Tipo Valor',
            'etv_codigo_sic' => 'Código Sic',
            'etv_resolucion_sic' => 'Resolución Sic',
            'etv_fecha_rmv' => 'Fecha Rmv',
            'etv_fecha_resolucion_sic' => 'Fecha Resolución Sic',
            'etv_codigo_sic2' => 'Código Sic2',
            'etv_codigo_gen_sic' => 'Código Gen Sic',
            'etv_fecha_creacion' => 'Fecha Creación',
            'etv_fecha_actualizacion' => 'Fecha Actualización',
            'etv_camara' => 'Camara',
            'etv_id_sicav' => 'Id Sicav',
        ];
    }
}
