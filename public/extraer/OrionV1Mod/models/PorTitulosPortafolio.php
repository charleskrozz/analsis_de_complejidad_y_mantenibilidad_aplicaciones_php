<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;


/**
 * This is the model class for table "por_titulos_portafolio".
 *
 * @property integer $tpo_id
 * @property integer $tiv_id
 * @property integer $por_id
 * @property double $tpo_precio_ingreso
 * @property string $tpo_fecha_ingreso
 * @property string $tpo_fecha_registro
 * @property integer $tpo_estado
 * @property double $tpo_ultima_revaluacion
 * @property integer $tpo_cobro_cupon
 * @property integer $tpo_confirma_titulo
 * @property integer $neg_id
 * @property integer $tpo_categoria
 * @property string $tpo_numeracion
 * @property double $tpo_cantidad
 * @property double $tpo_rendimiento
 * @property integer $tpo_tipo_valoracion
 * @property integer $tpo_redondear_amortizacion
 * @property integer $grp_id
 * @property integer $tpo_lineal_desde_primera_compra
 * @property string $tpo_custodio
 * @property string $tpo_renovado_de
 * @property double $tpo_comision_compromiso
 * @property double $tpo_comision_financiamiento
 * @property double $tpo_comision_evaluacion
 * @property double $tpo_participacion
 * @property double $tpo_monto_emision
 * @property string $tpo_objeto
 * @property integer $tpo_saldo_en_fila_anterior
 * @property integer $tpo_amortizar_monto_total
 * @property double $tpo_saldo
 */
class PorTitulosPortafolio extends \yii\db\ActiveRecord
{
	public $tiv_tipo_renta;
	public $emi_id;
	public $tvl_id;
	public $checked = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_titulos_portafolio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tiv_id', 'por_id','tpo_estado','grp_id','tpo_categoria'], 'required'],
            [['tiv_id', 'por_id', 'tpo_estado', 'tpo_cobro_cupon', 'tpo_confirma_titulo', 'neg_id', 'tpo_categoria', 'tpo_tipo_valoracion', 'tpo_redondear_amortizacion', 'grp_id', 'tpo_lineal_desde_primera_compra', 'tpo_saldo_en_fila_anterior', 'tpo_amortizar_monto_total','tpo_ven_retencion_base','tpo_tipo_valoracion'], 'integer'],
            [['tpo_precio_ingreso', 'tpo_ultima_revaluacion', 'tpo_cantidad', 'tpo_rendimiento', 'tpo_comision_compromiso', 'tpo_comision_financiamiento', 'tpo_comision_evaluacion', 'tpo_participacion', 'tpo_monto_emision', 'tpo_saldo','tpo_valor_original_emision','tpo_valor_nominal','tpo_intereses_dias_trans','tpo_costos_incurridos','tpo_ven_retencion'], 'number'],
            [['tpo_fecha_ingreso', 'tpo_fecha_registro','tiv_tipo_renta','tpo_aplica_ven_retencion','tpo_ven_fecha_apli_retencion'], 'safe'],
            [['tpo_numeracion', 'tpo_custodio', 'tpo_renovado_de', 'tpo_objeto'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tpo_id' => 'Tpo ID',
            'tiv_id' => 'Titulo',
            'por_id' => 'Por ID',
            'tpo_precio_ingreso' => 'Precio Ingreso',
            'tpo_fecha_ingreso' => 'Fecha Valor',
            'tpo_fecha_registro' => 'Fecha Registro',
            'tpo_estado' => 'Estado',
            'tpo_ultima_revaluacion' => 'Última Revaluación',
            'tpo_cobro_cupon' => 'Si/No',
            'tpo_confirma_titulo' => 'Si/No',
            'neg_id' => 'Negociación',
            'tpo_categoria' => 'Categoría',
            'tpo_numeracion' => 'Numeración',
            'tpo_cantidad' => 'Cantidad',
            'tpo_rendimiento' => 'Rendimiento',
            'tpo_tipo_valoracion' => 'Tipo Valoración',
            'tpo_redondear_amortizacion' => 'Si/No',
            'grp_id' => 'Grupo Valor',
            'tpo_lineal_desde_primera_compra' => 'Si/No',
            'tpo_custodio' => 'Custodio',
            'tpo_renovado_de' => 'Renovado De',
            'tpo_comision_compromiso' => 'Comisión Compromiso',
            'tpo_comision_financiamiento' => 'Comisión Financiamiento',
            'tpo_comision_evaluacion' => 'Comisión Evaluación',
            'tpo_participacion' => 'Participación',
            'tpo_monto_emision' => 'Monto Emisión',
            'tpo_objeto' => 'Objeto',
            'tpo_saldo_en_fila_anterior' => 'Saldo En Fila Anterior',
            'tpo_amortizar_monto_total' => 'Amortizar Monto Total',
            'tpo_saldo' => 'Saldo',
			'tiv_tipo_renta' => 'Tipo Renta',
			'tvl_id' => 'Tipo Valor',
			'emi_id' => 'Emisor',
			'checked' => 'checked',
			'tpo_valor_original_emision' => 'Valor original emisión',
			'tpo_valor_nominal' => 'Valor nominal',
			'tpo_costos_incurridos' => 'Costos incurridos',
			'tpo_intereses_dias_trans' => 'Intereses días transcurridos',
			'tpo_aplica_ven_retencion' => 'Aplica retención',
			'tpo_ven_retencion' => 'Porcentaje retención',
			'tpo_ven_retencion_base' => 'Base imponible',
			'tpo_ven_fecha_apli_retencion' => 'Fecha retención',
        ];
    }
	
	public function mostrarListado($porId,$fechaIni,$fechaEnd){
        $query = new Query;
         $query  ->from(['por_titulos_portafolio tp'])
          ->select(['tp.tpo_id','tp.tiv_id','tp.por_id','tp.tpo_precio_ingreso','tp.tpo_fecha_ingreso','tp.tpo_fecha_registro','tp.tpo_estado','tp.tpo_ultima_revaluacion',
		  'tp.tpo_cobro_cupon','tp.tpo_confirma_titulo','tp.neg_id','tp.tpo_categoria','tp.tpo_numeracion',
		  'tp.tpo_cantidad','tp.tpo_rendimiento','tp.tpo_tipo_valoracion','tp.tpo_redondear_amortizacion','tp.grp_id','tp.tpo_lineal_desde_primera_compra','tp.tpo_custodio','tp.tpo_renovado_de',
		  'tp.tpo_comision_compromiso','tp.tpo_comision_financiamiento','tp.tpo_comision_evaluacion','tp.tpo_participacion','tp.tpo_monto_emision','tp.tpo_objeto','tp.tpo_saldo_en_fila_anterior','tp.tpo_amortizar_monto_total',
		  "case when tr.itc_codigo='REN_FIJA' then isnull(tp.tpo_saldo,tp.tpo_valor_nominal) else isnull(tp.tpo_saldo,tp.tpo_cantidad) end as tpo_saldo",'tiv.tiv_codigo','tiv.tiv_fecha_emision','tiv.tiv_fecha_vencimiento','e.emi_nombre','tv.tvl_nombre','tr.itc_nombre as tiporentanombre','m.mon_nombre as monedanombre','ti.itc_nombre as tiponombre',
		  'es.itc_nombre as estadonombre','tems.itc_nombre as sectornombre'//'sec.itc_nombre as sectornombre',
		  ,'tb.itc_nombre as tipobasenombre','tt.itc_nombre as tipotasanombre','gi.grp_descripcion','neg.neg_num_liq','tp.tpo_valor_original_emision','tp.tpo_valor_nominal',
		  'tp.tpo_intereses_dias_trans','tp.tpo_costos_incurridos','op.itc_codigo as neg_codigo_op','isnull(neg.neg_ocultar_tp,0) as neg_ocultar_tp',
		  "isnull((select top 1 tpt_path from por_titulo_portafolio_tabla_amor pta where pta.tpo_id=tp.tpo_id order by tpt_id desc),'') as tpo_tapath",
		  "tiv.tiv_desmaterializado",
		  "isnull((select top 1 atf_path from por_archivo_titulo_fisico pta where pta.tpo_id=tp.tpo_id order by atf_id desc),'') as tpo_tfpath"
		  ])
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
			->leftJoin(['por_item_catalogo tems'],'tems.itc_id = e.emi_tipo_emisor')
			->leftJoin(['por_grupo_inversion gi'],'gi.grp_id = tp.grp_id')
			->leftJoin(['por_negociacion neg'],'neg.neg_id = tp.neg_id')
			->leftJoin(['por_item_catalogo op'],'op.itc_id = neg.neg_operacion')
			->andWhere(['<>','es.itc_codigo','EST_TPO_ELI'])
			->andWhere(['tp.por_id' => $porId])
			->andWhere(['>=','tp.tpo_fecha_ingreso', date("d-m-Y",strtotime($fechaIni))])
			->andWhere(['<=','tp.tpo_fecha_ingreso',date("d-m-Y",strtotime($fechaEnd))])
			->orderBy(['tp.tpo_fecha_ingreso'=> SORT_ASC]);

		$command = $query->createCommand();
        $tituloVal = $command->queryAll();
		
        return $tituloVal;
    }	
	public function getTitleFlujo($tpoId,$tipo,$fecha){
		//$query = new Query;
		/*if($tipo=="'C'")
		{
			$query  ->from(['por_titulos_portafolio tpo'])
			->select(['tf.tfl_id','cn.nec_id','tf.tfl_fecha_inicio','tf.tfl_fecha_vencimiento','((isnull(tpo.tpo_monto_emision,0) * tf.tfl_amortizacion)-isnull(tpc.[Total],0)) as tpo_valor_original_emision','(case when nec_id is null then 0 else 1 end) as checked'])
			->innerJoin(['por_titulo_flujo tf'],'tf.tiv_id = tpo.tiv_id')
			->leftJoin(['por_negociacion_cupon cn'],'cn.tpo_id = tpo.tpo_id and cn.[flu_id] = tf.tfl_id and [nec_tipo] = '.$tipo)
			->leftJoin(['vw_por_total_venta_cupon_tp tpc'],'tpc.tpo_id = tpo.tpo_id and [tpc].[flu_id] = tf.tfl_id and tpc.tpc_tipo = '.$tipo)
			->andWhere(['tpo.tpo_id' => $tpoId])
			->andWhere(['cn.nec_id' => null])
			->andWhere(['>','tf.tfl_amortizacion',0])
			->andWhere(['>','((isnull(tpo.tpo_monto_emision,0) * tf.tfl_amortizacion)-isnull(tpc.[Total],0))',0.05])
			
			->andWhere(['>=','tf.tfl_fecha_vencimiento', $fecha]);
		}else{
				$query  ->from(['por_titulos_portafolio tpo'])
				->select(['tf.tfl_id','cn.nec_id','tf.tfl_fecha_inicio','tf.tfl_fecha_vencimiento','((isnull(tpo.tpo_monto_emision,0)-[dbo].[ObtenerAmortizacionCuponTpo](tpo.tpo_id,tf.tfl_fecha_inicio))  * (isnull(tf.tfl_interes,tv.tiv_tasa_interes)/100) * ([dbo].[fnDias](tf.tfl_fecha_inicio,tf.tfl_fecha_vencimiento,tv.tiv_tipo_base)/(select itc_valor from por_item_catalogo where itc_id = tv.tiv_tipo_base))-isnull(tpc.[Total],0)) as tpo_valor_original_emision','(case when nec_id is null then 0 else 1 end) as checked'])
				->innerJoin(['por_titulo_valor tv'],'tv.tiv_id = tpo.tiv_id')
				->innerJoin(['por_titulo_flujo tf'],'tf.tiv_id = tpo.tiv_id')
				->leftJoin(['por_negociacion_cupon cn'],'cn.tpo_id = tpo.tpo_id and cn.[flu_id] = tf.tfl_id and [nec_tipo] = '.$tipo)
				->leftJoin(['vw_por_total_venta_cupon_tp tpc'],'tpc.tpo_id = tpo.tpo_id and tpc.[flu_id] = tf.tfl_id and tpc.[tpc_tipo] = '.$tipo)
				->andWhere(['tpo.tpo_id' => $tpoId])
				->andWhere(['>','isnull(tf.tfl_interes,tv.tiv_tasa_interes)',0])
				->andWhere(['>','((isnull(tpo.tpo_monto_emision,0)-[dbo].[ObtenerAmortizacionCuponTpo](tpo.tpo_id,tf.tfl_fecha_inicio))  * (isnull(tf.tfl_interes,tv.tiv_tasa_interes)/100) * ([dbo].[fnDias](tf.tfl_fecha_inicio,tf.tfl_fecha_vencimiento,tv.tiv_tipo_base)/(select itc_valor from por_item_catalogo where itc_id = tv.tiv_tipo_base))-isnull(tpc.[Total],0))',0.05])
				->andWhere(['>=','tf.tfl_fecha_vencimiento', $fecha]);

		}
		
		$command = $query->createCommand();
		$tituloPor = $command->queryAll();*/
		
		$tituloPor = \Yii::$app->db->createCommand("EXEC dbo.ObtenerCuponesTituloPortafolio @i_tpoId=:i_tpoId, @i_tipo=:i_tipo") 
                      ->bindValue(':i_tpoId' , $tpoId)
					  ->bindValue(':i_tipo', $tipo)
                      ->queryAll();

        return $tituloPor;
	}
	public function getPortafiosPortafolio($porId){
		$query = new Query;
         $query  ->from(['por_titulos_portafolio tp'])
          ->select(['tp.tpo_id as id',"concat(e.emi_nombre,' - ',tv.tvl_nombre ,' - ',tiv.tiv_codigo,' - ',CONVERT(VARCHAR(10),tiv.tiv_fecha_emision,105),' - ',CONVERT(VARCHAR(10),tiv.tiv_fecha_vencimiento,105)) as text"])
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
			->andWhere(['tp.por_id' => $porId]);

		$command = $query->createCommand();
        $tituloVal = $command->queryAll();
		
        return $tituloVal;
	}
	public function venderTituloPrtafolioMonto($tpoId,$i_fecha,$monto){
		$result = \Yii::$app->db->createCommand("EXEC dbo.VenderTituloPortafolioPorMonto @i_tpoId=:i_tpoId, @i_fecha=:i_fecha, @i_monto=:i_monto") 
                      ->bindValue(':i_tpoId' , $tpoId)
                      ->bindValue(':i_fecha', $i_fecha)
					  ->bindValue(':i_monto', $monto)
                      ->execute();
	}
}
