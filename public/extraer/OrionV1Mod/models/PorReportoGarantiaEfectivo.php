<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_reporto_garantia_efectivo".
 *
 * @property integer $rge_id
 * @property integer $neg_id
 * @property string $rge_fecha_registro
 * @property integer $rge_tipo
 * @property double $rge_monto
 * @property integer $rge_estado
 */
class PorReportoGarantiaEfectivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_reporto_garantia_efectivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['neg_id'], 'required'],
            [['neg_id', 'rge_tipo', 'rge_estado'], 'integer'],
            [['rge_fecha_registro'], 'safe'],
            [['rge_monto'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rge_id' => 'Rge ID',
            'neg_id' => 'Neg ID',
            'rge_fecha_registro' => 'Fecha Registro',
            'rge_tipo' => 'Tipo',
            'rge_monto' => 'Monto',
            'rge_estado' => 'Estado',
        ];
    }
	public function mostrarListado($ornId){
		$query = new Query;
         $query  ->from(['por_reporto_garantia_efectivo ge'])
          ->select(['ge.rge_id','ge.neg_id','ge.rge_fecha_registro','ge.rge_tipo','ge.rge_monto','ge.rge_estado','ge.rge_estado','ge.rge_estado','ti.itc_nombre as tipo_nombre','es.itc_nombre as estado'])
			->innerJoin(['por_item_catalogo ti'],'ti.itc_id = ge.rge_tipo')
			->innerJoin(['por_item_catalogo es'],'es.itc_id = ge.rge_estado')
			->andWhere(['=','ge.neg_id', $ornId]);

		$command = $query->createCommand();
        $garantiasEfec = $command->queryAll();
		
        return $garantiasEfec;
	}
}
