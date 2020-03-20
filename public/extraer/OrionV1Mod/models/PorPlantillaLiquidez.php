<?php

namespace app\models;


use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_plantilla_liquidez".
 *
 * @property integer $pll_id
 * @property string $pll_nombre
 * @property string $pll_descripcion
 * @property integer $pll_tipo
 * @property integer $pll_estado
 */
class PorPlantillaLiquidez extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_plantilla_liquidez';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pll_nombre', 'pll_tipo', 'pll_estado'], 'required'],
            [['pll_nombre', 'pll_descripcion'], 'string'],
            [['pll_tipo', 'pll_estado'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pll_id' => 'Pll ID',
            'pll_nombre' => 'Nombre',
            'pll_descripcion' => 'Descripcion',
            'pll_tipo' => 'Tipo',
            'pll_estado' => 'Estado',
        ];
    }
    public function Obtenertipoliqact($estado){
		$query = new Query;
		$query  ->from(['por_plantilla_liquidez pll'])
			->select(['pll.pll_id','pll.pll_nombre','pll.pll_descripcion','pll.pll_tipo','pll.pll_estado','itc.itc_nombre as estado_nombre','itc.itc_codigo as est_codigo','tp.itc_codigo as tipo_code'])
            ->innerJoin(['por_item_catalogo itc'],"pll.pll_estado = itc.itc_id")
            ->innerJoin(['por_item_catalogo tp'],"pll.pll_tipo = tp.itc_id")
			->andWhere(['itc.itc_codigo' => $estado]);
			
		$command = $query->createCommand();
        $plantillas = $command->queryAll();

        return $plantillas;
    }
    public function mostrarListado(){
		$query = new Query;
		$query  ->from(['por_plantilla_liquidez pll'])
			->select(['pll.pll_id','pll.pll_nombre','pll.pll_descripcion','pll.pll_tipo','pll.pll_estado','itc.itc_nombre as estado_nombre','itc.itc_codigo as est_codigo','tp.itc_codigo as tipo_code','upper(tp.itc_nombre) as tipo_nombre'])
            ->innerJoin(['por_item_catalogo itc'],"pll.pll_estado = itc.itc_id")
            ->innerJoin(['por_item_catalogo tp'],"pll.pll_tipo = tp.itc_id");
			
		$command = $query->createCommand();
        $cuentaBan = $command->queryAll();

        return $cuentaBan;
    }
}
