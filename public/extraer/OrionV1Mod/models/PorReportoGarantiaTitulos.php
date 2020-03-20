<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_reporto_garantia_titulos".
 *
 * @property integer $rgt_id
 * @property integer $neg_id
 * @property integer $tpo_id
 * @property string $rgt_fecha_registro
 * @property integer $rgt_tipo
 * @property double $rgt_monto
 * @property integer $rgt_estado
 */
class PorReportoGarantiaTitulos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_reporto_garantia_titulos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['neg_id', 'tpo_id'], 'required'],
            [['neg_id', 'tpo_id', 'rgt_tipo', 'rgt_estado'], 'integer'],
            [['rgt_fecha_registro'], 'safe'],
            [['rgt_monto'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rgt_id' => 'Rgt ID',
            'neg_id' => 'Neg ID',
            'tpo_id' => 'Tpo ID',
            'rgt_fecha_registro' => 'Fecha Registro',
            'rgt_tipo' => 'Tipo',
            'rgt_monto' => 'Monto',
            'rgt_estado' => 'Estado',
        ];
    }
	public function mostrarListado($ornId){
		$query = new Query;
         $query  ->from(['por_reporto_garantia_titulos gt'])
          ->select(['gt.rgt_id','gt.tpo_id','gt.neg_id','gt.rgt_fecha_registro','gt.rgt_tipo','gt.rgt_monto','gt.rgt_estado','tip.itc_nombre as tipo_nombre','est.itc_nombre as estado',"concat(e.emi_nombre,' - ',tv.tvl_nombre ,' - ',tiv.tiv_codigo,' - ',CONVERT(VARCHAR(10),tiv.tiv_fecha_emision,105),' - ',CONVERT(VARCHAR(10),tiv.tiv_fecha_vencimiento,105),' - ',cast(isnull(tp.tpo_saldo,tp.tpo_valor_nominal) as varchar)) as rgt_titulo_text"])
			->innerJoin(['por_titulos_portafolio tp'],'tp.tpo_id = gt.tpo_id')
			->innerJoin(['por_item_catalogo tip'],'tip.itc_id = gt.rgt_tipo')
			->innerJoin(['por_item_catalogo est'],'est.itc_id = gt.rgt_estado')
			->innerJoin(['por_titulo_valor tiv'],'tiv.tiv_id = tp.tiv_id')
			->innerJoin(['por_emisor e'],'e.emi_id = tiv.tiv_emisor')
            ->innerJoin(['por_tipo_valor tv'],'tv.tvl_id = tiv.tiv_tipo_valor')
			->innerJoin(['por_item_catalogo tr'],'tr.itc_id = tiv.tiv_tipo_renta')
			->innerJoin(['por_moneda m'],'m.mon_id = tiv.tiv_moneda')
			->innerJoin(['por_item_catalogo ti'],'ti.itc_id = tiv.tiv_tipo')
			->innerJoin(['por_item_catalogo es'],'es.itc_id = tp.tpo_estado')
			->innerJoin(['por_item_catalogo sec'],'sec.itc_id = tiv.tiv_sector')
			->innerJoin(['por_item_catalogo tb'],'tb.itc_id = tiv.tiv_tipo_base')
			->innerJoin(['por_item_catalogo tt'],'tt.itc_id = tiv.tiv_tipo_tasa')
			->leftJoin(['por_grupo_inversion gi'],'gi.grp_id = tp.grp_id')
			->leftJoin(['por_negociacion neg'],'neg.neg_id = tp.neg_id')
			->andWhere(['=','gt.neg_id', $ornId]);

		$command = $query->createCommand();
        $garantiasEfec = $command->queryAll();
		
        return $garantiasEfec;
	}
}
