<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;
/**
 * This is the model class for table "por_emisor".
 *
 * @property integer $emi_id
 * @property string $emi_codigo
 * @property string $emi_nombre
 * @property string $emi_descripcion
 * @property integer $emi_tipo_emisor
 * @property string $emi_codigo_sic
 * @property integer $emi_codigo_sic2
 * @property integer $emi_sector
 * @property integer $emi_estado
 * @property string $emi_nombre_personalizado
 * @property string $emi_fecha_creacion
 * @property string $emi_fecha_actualizacion
 *
 * @property PorItemCatalogo $emiEstado
 * @property PorItemCatalogo $emiTipoEmisor
 * @property PorEmisorCalificacion[] $porEmisorCalificacions
 */
class PorEmisor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_emisor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emi_codigo', 'emi_nombre', 'emi_tipo_emisor', 'emi_estado', 'emi_fecha_creacion', 'emi_fecha_actualizacion'], 'required'],
            [['emi_codigo', 'emi_nombre', 'emi_descripcion', 'emi_codigo_sic','emi_codigo_sic2', 'emi_nombre_personalizado'], 'string'],
            [['emi_tipo_emisor', 'emi_sector', 'emi_estado'], 'integer'],
            [['emi_fecha_creacion', 'emi_fecha_actualizacion'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emi_id' => 'Emi ID',
            'emi_codigo' => 'Código',
            'emi_nombre' => 'Nombre',
            'emi_descripcion' => 'Descripción',
            'emi_tipo_emisor' => 'Tipo Emisor',
            'emi_codigo_sic' => 'Código Sic',
            'emi_codigo_sic2' => 'Código Sic 2',
            'emi_sector' => 'Sector',
            'emi_estado' => 'Estado',
            'emi_nombre_personalizado' => 'Nombre Personalizado',
            'emi_fecha_creacion' => 'Fecha Creación',
            'emi_fecha_actualizacion' => 'Fecha Actualización',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmiEstado()
    {
        return $this->hasOne(PorItemCatalogo::className(), ['itc_id' => 'emi_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmiTipoEmisor()
    {
        return $this->hasOne(PorItemCatalogo::className(), ['itc_id' => 'emi_tipo_emisor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorEmisorCalificacions()
    {
        return $this->hasMany(PorEmisorCalificacion::className(), ['emi_id' => 'emi_id']);
    }

    public function mostrarListado(){
        $query = new Query;
        $query  ->from(['por_emisor e'])
          ->select(['e.emi_id','e.emi_nombre','e.emi_codigo','e.emi_descripcion',
          'e.emi_tipo_emisor','e.emi_codigo_sic','e.emi_codigo_sic2','e.emi_sector',
          'e.emi_estado',  'e.emi_nombre_personalizado','e.emi_fecha_creacion',
          'e.emi_fecha_actualizacion','i.itc_nombre as nombre_estado','it.itc_nombre as nombre_emisor',
          'upper(its.itc_nombre) as nombre_sector'])
          ->innerJoin(['por_item_catalogo i'],'i.itc_id = e.emi_estado')
		  ->innerJoin(['por_item_catalogo it'],'it.itc_id = e.emi_tipo_emisor')
          ->leftJoin(['por_item_catalogo its'],'its.itc_id = e.emi_sector')
		  ->orderBy(['e.emi_nombre'=> SORT_ASC]);

            $command = $query->createCommand();
        $emisor = $command->queryAll();

        return $emisor;
    }

}
