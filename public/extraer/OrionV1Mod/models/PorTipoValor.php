<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;
/**
 * This is the model class for table "por_tipo_valor".
 *
 * @property integer $tvl_id
 * @property integer $tvl_tipo_renta
 * @property string $tvl_codigo
 * @property string $tvl_nombre
 * @property string $tvl_descripcion
 * @property string $tvl_fecha_creacion
 * @property string $tvl_fecha_actualizacion
 * @property integer $tvl_estado
 * @property integer $tvl_generico
 * @property string $tvl_tipo_generico
 * @property integer $tvl_inscrito_mv
 * @property string $tvl_sctit_pattern
 * @property integer $tvl_con_cupones
 * @property integer $tvl_con_interes
 * @property double $tvl_con_interes_probabilidad
 * @property double $tvl_con_cupones_probabilidad
 * @property integer $tvl_codigo_gen_sic
 * @property integer $tvl_grupo_concentracion
 *
 * @property PorItemCatalogo $tvlEstado
 * @property PorItemCatalogo $tvlGrupoConcentracion
 */
class PorTipoValor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_tipo_valor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tvl_tipo_renta', 'tvl_codigo', 'tvl_nombre', 'tvl_fecha_creacion', 'tvl_fecha_actualizacion', 'tvl_estado'], 'required'],
            [['tvl_tipo_renta', 'tvl_estado', 'tvl_generico', 'tvl_inscrito_mv', 'tvl_con_cupones', 'tvl_con_interes', 'tvl_codigo_gen_sic', 'tvl_grupo_concentracion'], 'integer'],
            [['tvl_codigo', 'tvl_nombre', 'tvl_descripcion', 'tvl_tipo_generico', 'tvl_sctit_pattern'], 'string'],
            [['tvl_fecha_creacion', 'tvl_fecha_actualizacion'], 'safe'],
            [['tvl_con_interes_probabilidad', 'tvl_con_cupones_probabilidad'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tvl_id' => 'Tvl ID',
            'tvl_tipo_renta' => 'Tipo Renta',
            'tvl_codigo' => 'Código',
            'tvl_nombre' => 'Nombre',
            'tvl_descripcion' => 'Descripción',
            'tvl_fecha_creacion' => 'Fecha Creación',
            'tvl_fecha_actualizacion' => 'Fecha Actualización',
            'tvl_estado' => 'Estado',
            'tvl_generico' => 'Genérico',
            'tvl_tipo_generico' => 'Tipo Genérico',
            'tvl_inscrito_mv' => 'Inscrito Mv',
            'tvl_sctit_pattern' => 'Sctit Pattern',
            'tvl_con_cupones' => 'Con Cupones',
            'tvl_con_interes' => 'Con Intéres',
            'tvl_con_interes_probabilidad' => 'Con Interes Probabilidad',
            'tvl_con_cupones_probabilidad' => 'Con Cupones Probabilidad',
            'tvl_codigo_gen_sic' => 'Código Gen Sic',
            'tvl_grupo_concentracion' => 'Grupo Concentración',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTvlEstado()
    {
        return $this->hasOne(PorItemCatalogo::className(), ['itc_id' => 'tvl_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTvlGrupoConcentracion()
    {
        return $this->hasOne(PorItemCatalogo::className(), ['itc_id' => 'tvl_grupo_concentracion']);
    }
    public function mostrarListado(){
        $query = new Query;
        $query  ->from(['por_tipo_valor v'])
          ->select(['v.tvl_id','v.tvl_nombre','v.tvl_tipo_renta','v.tvl_codigo',
          'v.tvl_nombre','v.tvl_descripcion','v.tvl_fecha_creacion','v.tvl_fecha_actualizacion',
          'v.tvl_estado','v.tvl_generico',"case when [v].[tvl_generico]=1 then 'SI' else 'NO' end as tvl_generico_desc ",'v.tvl_tipo_generico','tvl_inscrito_mv',
          "case when [v].[tvl_inscrito_mv]=1 then 'SI' else 'NO' end as tvl_inscrito_mv_desc ",
          'v.tvl_sctit_pattern','tvl_con_cupones','tvl_con_interes','tvl_con_interes_probabilidad',
          'tvl_con_cupones_probabilidad','tvl_codigo_gen_sic','tvl_grupo_concentracion',
          "case when [v].[tvl_con_cupones]=1 then 'SI' else 'NO' end as tvl_con_cupones_desc ",
          "case when [v].[tvl_con_interes]=1 then 'SI' else 'NO' end as tvl_con_interes_desc ",
          'i.itc_nombre as nombre_estado','it.itc_nombre as nombre_grupo_con',
          'itr.itc_nombre as nombre_renta'])
          ->innerJoin(['por_item_catalogo i'],'i.itc_id = v.tvl_estado')
          ->innerJoin(['por_item_catalogo it'],'it.itc_id = v.tvl_grupo_concentracion')
          ->innerJoin(['por_item_catalogo itr'],'itr.itc_id = v.tvl_tipo_renta');
        $command = $query->createCommand();
        $tipoValor = $command->queryAll();

        return $tipoValor;
    }
}
