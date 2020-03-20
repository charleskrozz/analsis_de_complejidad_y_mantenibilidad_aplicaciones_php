<?php

namespace app\models;
use yii\db\Query;
use \yii\db\mssql\PDO;
use Yii;

/**
 * This is the model class for table "por_item_catalogo".
 *
 * @property integer $itc_id
 * @property integer $cat_id
 * @property integer $itc_padre_id
 * @property string $itc_descripcion
 * @property string $itc_nombre
 * @property string $itc_codigo
 * @property string $itc_valor
 * @property integer $itc_estado
 * @property string $itc_fecha_creacion
 * @property integer $itc_editable
 * @property integer $itc_orden
 * @property integer $itc_codigo_sic
 *
 * @property PorCatalogo $cat
 * @property PorItemCatalogo $itcPadre
 * @property PorItemCatalogo[] $porItemCatalogos
 */
class PorItemCatalogo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_item_catalogo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id','itc_nombre', 'itc_codigo', 'itc_valor', 'itc_editable'], 'required'],
            [['cat_id', 'itc_padre_id', 'itc_estado', 'itc_editable', 'itc_orden', 'itc_codigo_sic'], 'integer'],
            [['itc_descripcion', 'itc_nombre', 'itc_codigo', 'itc_valor'], 'string'],
            [['itc_fecha_creacion'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itc_id' => 'Itc ID',
            'cat_id' => 'Cat ID',
            'itc_padre_id' => 'Padre ID',
            'itc_descripcion' => 'Descripción',
            'itc_nombre' => 'Nombre',
            'itc_codigo' => 'Código',
            'itc_valor' => 'Valor',
            'itc_estado' => 'Estado',
            'itc_fecha_creacion' => 'Fecha Creación',
            'itc_editable' => '',
            'itc_orden' => 'Orden',
            'itc_codigo_sic' => 'Código Sic',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(PorCatalogo::className(), ['cat_id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItcPadre()
    {
        return $this->hasOne(PorItemCatalogo::className(), ['itc_id' => 'itc_padre_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorItemCatalogos()
    {
        return $this->hasMany(PorItemCatalogo::className(), ['itc_padre_id' => 'itc_id']);
    }
    public function mostrarListadoItem(){
        $query = new Query;
        $query  ->from(['por_item_catalogo it'])
          ->select(['it.itc_id','it.cat_id','it.itc_padre_id','it.itc_descripcion','it.itc_nombre','it.itc_nombre as nombre_estado',
            'it.itc_codigo','it.itc_valor','it.itc_estado','it.itc_fecha_creacion','it.itc_editable','it.itc_orden','it.itc_codigo_sic'])
              ->innerJoin(['por_catalogo c'],' c.cat_estado = it.itc_id');

            $command = $query->createCommand();
        $catalogo = $command->queryAll();

        return $catalogo;
    }

}
