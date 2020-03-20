<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_catalogo".
 *
 * @property integer $cat_id
 * @property integer $cat_padre_id
 * @property string $cat_nombre
 * @property string $cat_codigo
 * @property string $cat_descripcion
 * @property integer $cat_estado
 * @property integer $cat_valor_defecto
 *
 * @property PorCatalogo $catPadre
 * @property PorCatalogo[] $porCatalogos
 * @property PorItemCatalogo[] $porItemCatalogos
 */
class PorCatalogo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_catalogo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_padre_id', 'cat_estado', 'cat_valor_defecto'], 'integer'],
            [['cat_nombre', 'cat_codigo', 'cat_estado'], 'required'],
            [['cat_nombre', 'cat_codigo', 'cat_descripcion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Cat ID',
            'cat_padre_id' => 'Cat Padre ID',
            'cat_nombre' => 'Nombre',
            'cat_codigo' => 'Código',
            'cat_descripcion' => 'Descripción',
            'cat_estado' => 'Estado',
            'cat_valor_defecto' => 'Valor por defecto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatPadre()
    {
        return $this->hasOne(PorCatalogo::className(), ['cat_id' => 'cat_padre_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorCatalogos()
    {
        return $this->hasMany(PorCatalogo::className(), ['cat_padre_id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorItemCatalogos()
    {
        return $this->hasMany(PorItemCatalogo::className(), ['cat_id' => 'cat_id']);
    }
    public function mostrarListado(){
        $query = new Query;
        $query  ->from(['por_catalogo c'])
          ->select(['c.cat_id','c.cat_padre_id','itc_nombre','c1.cat_nombre as cat_padre_nombre',
            'c.cat_nombre','c.cat_codigo','c.cat_descripcion','c.cat_estado','c.cat_valor_defecto'])
            ->innerJoin(['por_item_catalogo i'],'c.cat_estado = i.itc_id')
            ->leftJoin(['por_catalogo c1'],'c1.cat_id = c.cat_padre_id');

            $command = $query->createCommand();
        $catalogo = $command->queryAll();

        return $catalogo;
    }
    public function obtenerEstado(){
      $query = new Query;

          $query->from(['por_catalogo'])
        ->select(['por_item_catalogo.itc_nombre','por_item_catalogo.itc_id'])
        ->innerJoin(['por_item_catalogo'],'por_catalogo.cat_id = por_item_catalogo.cat_id')
        ->andWhere(['cat_codigo' => 'COD_ESTADO']);

      $command = $query->createCommand();
      $catalogo = $command->queryAll();

      return $catalogo;
    }
    public function mostrarListadoItem(){
      /*  $query = new Query;
        $query  ->from(['por_item_catalogo it'])
          ->select(['it.itc_id','it.cat_id','it.itc_padre_id','it.itc_descripcion','it.itc_nombre','it.itc_nombre as nombre_estado',
            'it.itc_codigo','it.itc_valor','it.itc_estado','it.itc_fecha_creacion','it.itc_editable','it.itc_orden','it.itc_codigo_sic'])
              ->innerJoin(['por_catalogo c'],' c.cat_estado = it.itc_id');

            $command = $query->createCommand();
        $catalogo = $command->queryAll();

        return $catalogo;*/
    }
	public function obtenerItemCatalogPorCodigo($codigo){
		$query = new Query;

          $query->from(['por_catalogo'])
        ->select(['por_item_catalogo.itc_nombre','por_item_catalogo.itc_id'])
        ->innerJoin(['por_item_catalogo'],'por_catalogo.cat_id = por_item_catalogo.cat_id')
        ->andWhere(['cat_codigo' => $codigo]);

      $command = $query->createCommand();
      $catalogo = $command->queryAll();

      return $catalogo;
	}
}
