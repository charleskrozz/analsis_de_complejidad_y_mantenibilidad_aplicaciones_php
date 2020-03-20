<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_subtipo".
 *
 * @property integer $sbt_id
 * @property integer $tvl_id
 * @property integer $sbt_tipo_renta
 * @property string $sbt_codigo
 * @property string $sbt_nombre
 * @property string $sbt_descripcion
 * @property string $sbt_fecha_creacion
 * @property string $sbt_fecha_actualizacion
 * @property integer $sbt_estado
 * @property integer $sbt_id_sicav
 */
class PorSubtipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_subtipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sbt_codigo','sbt_tipo_renta','sbt_nombre','sbt_estado'],'required'],
            [['tvl_id', 'sbt_tipo_renta', 'sbt_estado', 'sbt_id_sicav'], 'integer'],
            [['sbt_codigo', 'sbt_nombre', 'sbt_fecha_creacion', 'sbt_fecha_actualizacion', 'sbt_estado'], 'required'],
            [['sbt_codigo', 'sbt_nombre', 'sbt_descripcion'], 'string'],
            [['sbt_fecha_creacion', 'sbt_fecha_actualizacion'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sbt_id' => 'Sbt ID',
            'tvl_id' => 'Tvl ID',
            'sbt_tipo_renta' => 'Tipo Renta',
            'sbt_codigo' => 'Código',
            'sbt_nombre' => 'Nombre',
            'sbt_descripcion' => 'Descripcion',
            'sbt_fecha_creacion' => 'Fecha Creacion',
            'sbt_fecha_actualizacion' => 'Fecha Actualizacion',
            'sbt_estado' => 'Estado',
            'sbt_id_sicav' => 'Sbt Id Sicav',
        ];
    }
    public function mostrarListado(){
        $query = new Query;
        $query  ->from(['por_subtipo s'])
          ->select(['s.sbt_id','s.sbt_codigo','s.sbt_nombre','s.sbt_descripcion','s.sbt_fecha_creacion','s.sbt_fecha_actualizacion'
          ,'s.sbt_estado','i.itc_nombre as sbt_estado_nombre','itr.itc_nombre as sbt_tipo_renta_nombre'])
          ->innerJoin(['por_item_catalogo i'],'i.itc_id = s.sbt_estado')
          ->innerJoin(['por_item_catalogo itr'],'itr.itc_id = s.sbt_tipo_renta');
        $command = $query->createCommand();
        $tipoValor = $command->queryAll();

        return $tipoValor;
    }
}
