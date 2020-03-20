<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_liquidez_reg_pago".
 *
 * @property integer $lpa_id
 * @property integer $liq_id
 * @property double $liq_monto
 * @property string $liq_fecha_registro
 * @property string $liq_descripcion
 */
class PorLiquidezRegPago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_liquidez_reg_pago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['liq_id','ctb_id'], 'integer'],
            [['liq_monto'], 'number'],
            [['liq_fecha_registro'], 'safe'],
            [['liq_descripcion','lpa_comentario_cred'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lpa_id' => 'Lpa ID',
            'liq_id' => 'Liq ID',
            'liq_monto' => 'Monto',
            'liq_fecha_registro' => 'Fecha Registro',
            'liq_descripcion' => 'Descripcion',
            'ctb_id' => 'Cuenta bancaria',
            'lpa_comentario_cred' => 'Comentario créditos'
        ];
    }

    public function obtenerPagosLiquidez($liqId){
		$query = new Query;
		$query  ->from(['por_liquidez_reg_pago liqp'])
            ->select(['liqp.lpa_id','liqp.liq_id','liqp.liq_monto','liqp.liq_fecha_registro','liqp.liq_descripcion','liqp.lpa_aplica_liq',"case when [liqp].[lpa_aplica_liq]=1 then 'SI' else 'NO' end as lpa_aplica_liq_nombre","convert(varchar, liq_fecha_registro, 103) as fecha_format","[ctb_nombre] + ' ' + [ban].[itc_nombre] + ' ' + [ctb].[ctb_numero] as ctb_nombre_desc","lpa_comentario_cred"])
            ->innerJoin(['por_cuenta_bancaria ctb'],"liqp.ctb_id = ctb.ctb_id")
            ->innerJoin(['por_item_catalogo ban'],"ban.itc_id = ctb.ctb_banco")
			->andWhere(['liqp.liq_id' => $liqId]);
			
		$command = $query->createCommand();
        $pagosLiq = $command->queryAll();

        return $pagosLiq;
	}
}
