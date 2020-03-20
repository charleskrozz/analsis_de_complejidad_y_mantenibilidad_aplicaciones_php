<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_negociacion".
 *
 * @property integer $neg_id
 * @property integer $por_id
 * @property integer $neg_operacion
 * @property integer $neg_reporto
 * @property integer $emi_id
 * @property integer $tvl_id
 * @property integer $tiv_id
 * @property string $neg_fecha_valor
 * @property string $neg_num_liq
 * @property double $neg_cantidad
 * @property double $neg_valor_nominal
 * @property double $neg_precio
 * @property double $neg_comision_bolsa
 * @property double $neg_comision_casa
 * @property double $neg_retencion_bolsa
 * @property double $neg_retnecion_casa
 * @property integer $neg_estado
 * @property string $por_fecha_creacion
 * @property string $por_fecha_actualizacion
 * @property double $neg_intereses_trans
 *
 * @property PorEmisor $emi
 * @property PorItemCatalogo $negEstado
 * @property PorItemCatalogo $negOperacion
 * @property PorPortafolio $por
 * @property PorTipoValor $tvl
 * @property PorTituloValor $tiv;
 */
class PorNegociacion extends \yii\db\ActiveRecord
{
	public $cuppoid = -1;
	public $cuppontype = '';
	public $listtpoid = '';
	public $tiv_camara_id = -1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_negociacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['por_id','emi_id','tvl_id','tiv_id','neg_operacion','neg_tipo_renta','neg_origen','neg_num_liq','neg_precio'], 'required'],
            [['por_id', 'neg_operacion', 'neg_reporto', 'emi_id', 'tvl_id', 'tiv_id', 'neg_estado','neg_tipo_renta','neg_origen','neg_rep_plazo','tpo_id'], 'integer'],
            [['neg_fecha_valor', 'por_fecha_creacion', 'por_fecha_actualizacion','neg_rep_fecha_vencimiento'], 'safe'],
            [['neg_num_liq'], 'string'],
            [['neg_cantidad', 'neg_valor_nominal', 'neg_precio', 'neg_comision_bolsa', 'neg_comision_casa', 'neg_retencion_bolsa', 'neg_retnecion_casa', 'neg_intereses_trans','neg_valor_original_emision','neg_rendimiento_compra','neg_intereses_dias_trans',
			'neg_garantia_basica','neg_acciones_reportadas','neg_precio_spot'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'neg_id' => 'Neg ID',
            'por_id' => 'Por ID',
            'neg_operacion' => 'Operación',
            'neg_reporto' => 'SI/NO',
            'emi_id' => 'Emisor',
            'tvl_id' => 'Tipo Valor',
            'neg_fecha_valor' => 'Fecha Valor',
            'neg_num_liq' => 'Número Liquidación',
            'neg_cantidad' => 'Cantidad',
            'neg_valor_nominal' => 'Valor Nominal',
            'neg_precio' => 'Precio',
            'neg_comision_bolsa' => 'Comisión Bolsa',
            'neg_comision_casa' => 'Comisión Casa',
            'neg_retencion_bolsa' => 'Retención Bolsa',
            'neg_retnecion_casa' => 'Retención Casa',
            'neg_estado' => 'Estado',
            'por_fecha_creacion' => 'Fecha Creacion',
            'por_fecha_actualizacion' => 'Fecha Actualizacion',
            'neg_intereses_trans' => 'Intereses Transcurrido',
			'tiv_id' => 'Título Valor',
			'neg_tipo_renta' => 'Tipo renta',
			'neg_valor_original_emision' => 'Monto Emisión',
			'neg_origen' => 'Bolsa',
			'neg_rendimiento_compra' => 'Rendimiento de compra',
			'neg_intereses_dias_trans' => 'Intereses días transcurridos',
			'neg_garantia_basica' => 'Garantía básica',
			'neg_acciones_reportadas' => 'Título reportado',
			'neg_precio_spot' => 'Precio Spot',
			'neg_rep_fecha_vencimiento' => 'Fecha Vencimiento',
			'neg_rep_plazo' => 'Plazo',
			'tpo_id' => 'Título',
			'cuppoid' => 'cuppoid',
			'cuppontype' => 'cuppontype',
			'tiv_camara_id' => 'tiv_camara_id',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmi()
    {
        return $this->hasOne(PorEmisor::className(), ['emi_id' => 'emi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNegEstado()
    {
        return $this->hasOne(PorItemCatalogo::className(), ['itc_id' => 'neg_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNegOperacion()
    {
        return $this->hasOne(PorItemCatalogo::className(), ['itc_id' => 'neg_operacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPor()
    {
        return $this->hasOne(PorPortafolio::className(), ['por_id' => 'por_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTvl()
    {
        return $this->hasOne(PorTipoValor::className(), ['tvl_id' => 'tvl_id']);
	}
	/**
     * @return \yii\db\ActiveQuery
     */
    public function getTiv()
    {
        return $this->hasOne(PorTituloValor::className(), ['tiv_id' => 'tiv_id']);
    }
	public function mostrarListado($porId,$fechaIni,$fechaEnd){
        $query = new Query;
        $query  ->from(['por_negociacion n'])
          ->select(['n.neg_id','n.por_id','n.neg_operacion','n.neg_reporto','n.emi_id','n.tvl_id'
		  ,'n.tiv_id','n.neg_fecha_valor','n.neg_num_liq','n.neg_cantidad','n.neg_valor_nominal','n.neg_precio','n.neg_comision_bolsa'
		  ,'n.neg_comision_casa','n.neg_retencion_bolsa','n.neg_retnecion_casa','n.neg_estado','n.por_fecha_creacion','n.por_fecha_actualizacion','n.neg_intereses_trans','n.neg_valor_original_emision',
		  'i.itc_nombre as neg_estado_nombre','i.itc_codigo as neg_estado_cod','p.por_codigo','c.cli_razon_social','n.neg_tipo_renta','tr.itc_nombre as neg_tipo_renta_nombre','ori.itc_nombre as neg_orige_nombre','n.neg_origen','neg_rendimiento_compra','neg_intereses_dias_trans'
		  ,'op.itc_codigo as neg_codigo_op','isnull(n.neg_ocultar_tp,0) as neg_ocultar_tp',"isnull((select top 1 pnl_path from por_negociacion_liquidacion nl where nl.neg_id=n.neg_id order by pnl_fecha desc),'') as neg_liqpath",'em.emi_nombre'])
			->innerJoin(['por_portafolio p'],'n.por_id = p.por_id')
			->innerJoin(['por_cliente c'],'c.cli_id = p.cli_id')
			->innerJoin(['por_item_catalogo tr'],'n.neg_tipo_renta = tr.itc_id')
			->innerJoin(['por_item_catalogo ori'],'n.neg_origen = ori.itc_id')
			->innerJoin(['por_titulo_valor tv'],'tv.tiv_id = n.tiv_id')
			->innerJoin(['por_emisor em'],'em.emi_id = tv.tiv_emisor')
			->leftJoin(['por_item_catalogo op'],'op.itc_id = n.neg_operacion')
			->leftJoin(['por_item_catalogo i'],'n.neg_estado = i.itc_id')
			->andWhere(['n.por_id' => $porId])
			->andWhere(['>=','n.neg_fecha_valor', date("d-m-Y",strtotime($fechaIni))])
			->andWhere(['<=','n.neg_fecha_valor',date("d-m-Y",strtotime($fechaEnd))])
			->orderBy(['n.neg_fecha_valor'=> SORT_ASC]);

            $command = $query->createCommand();
        $catalogo = $command->queryAll();

        return $catalogo;
    }
	public function obtenerTituloPortafolio($tpoId){
		$query = new Query;
        $query  ->from(['por_titulos_portafolio tpo'])
          ->select(['tpo.neg_id','tpo.tiv_id','tiv.tiv_emisor','tiv.tiv_tipo_valor','tiv.tiv_tipo_renta','tpo.tpo_cantidad','tpo.tpo_valor_nominal','isnull(tpo.tpo_saldo,tpo.tpo_valor_nominal) as tpo_saldo'])
		  ->innerJoin(['por_titulo_valor tiv'],'tiv.tiv_id = tpo.tiv_id')
		->andWhere(['tpo.tpo_id' => $tpoId]);
		
		$command = $query->createCommand();
        $tituloPor = $command->queryAll();

        return $tituloPor;
	}
	public function obtenerTituloCuponNego($negId,$tpoId,$tipo){
		$query = new Query;
		if($tipo=="'C'")
		{
			$query  ->from(['por_titulos_portafolio tpo'])
			->select(['tf.tfl_id','cn.nec_id','tf.tfl_fecha_inicio','tf.tfl_fecha_vencimiento','(isnull(tpo.tpo_monto_emision,0) * tf.tfl_amortizacion) as tpo_valor_original_emision','(case when nec_id is null then 0 else 1 end) as checked'])
			->innerJoin(['por_titulo_flujo tf'],'tf.tiv_id = tpo.tiv_id')
			->leftJoin(['por_negociacion_cupon cn'],'cn.tpo_id = tpo.tpo_id and cn.[flu_id] = tf.tfl_id and [nec_tipo] = '.$tipo.'and (cn.neg_id='.$negId.' or -1='.$negId.')')
			->andWhere(['tpo.tpo_id' => $tpoId])
			->andWhere(['>','tf.tfl_amortizacion',0]);
			
			//.' 
			if($negId<0){
				$query->andWhere(['is','cn.nec_id',null]);
			}
			
		}else{
				$query  ->from(['por_titulos_portafolio tpo'])
				->select(['tf.tfl_id','cn.nec_id','tf.tfl_fecha_inicio','tf.tfl_fecha_vencimiento','((isnull(tpo.tpo_monto_emision,0)-[dbo].[ObtenerAmortizacionCuponTpo](tpo.tpo_id,tf.tfl_fecha_inicio))  * (isnull(tf.tfl_interes,tv.tiv_tasa_interes)/100) * ([dbo].[fnDias](tf.tfl_fecha_inicio,tf.tfl_fecha_vencimiento,tv.tiv_tipo_base)/(select itc_valor from por_item_catalogo where itc_id = tv.tiv_tipo_base))) as tpo_valor_original_emision','(case when nec_id is null then 0 else 1 end) as checked'])
				->innerJoin(['por_titulo_valor tv'],'tv.tiv_id = tpo.tiv_id')
				->innerJoin(['por_titulo_flujo tf'],'tf.tiv_id = tpo.tiv_id')
				->leftJoin(['por_negociacion_cupon cn'],'cn.tpo_id = tpo.tpo_id and cn.[flu_id] = tf.tfl_id and [nec_tipo] = '.$tipo.'and (cn.neg_id='.$negId.' or -1='.$negId.')')
				->andWhere(['tpo.tpo_id' => $tpoId])
				->andWhere(['>','isnull(tf.tfl_interes,tv.tiv_tasa_interes)',0]);
				
				//.' and cn.neg_id='.$negId
				if($negId<0){
					$query->andWhere(['is','cn.nec_id',null]);
				}
		}
		
		$command = $query->createCommand();
        $tituloPor = $command->queryAll();

        return $tituloPor;
	}
	public function getStatusIdByCode($code){
		$query = new Query;
		$query  ->from(['por_item_catalogo itc'])
			->select(['itc.itc_id','itc.itc_nombre','itc.itc_codigo'])
			->innerJoin(['por_catalogo cat'],"cat.cat_id = itc.cat_id and cat.cat_codigo='EST_NEG'")
			->andWhere(['itc.itc_codigo' => $code]);
			
		$command = $query->createCommand();
        $tituloPor = $command->queryAll();

        return $tituloPor;
	}
	public function cambiarEstadoNegociacion($negId,$tpoId,$monto,$estado){
		$result = \Yii::$app->db->createCommand("EXEC dbo.EjecutarNegocacionCambioEstado @i_tpoId=:i_tpoId, @i_negId=:i_negId, @i_estado=:i_estado, @i_monto=:i_monto") 
                      ->bindValue(':i_tpoId' , $tpoId)
                      ->bindValue(':i_negId', $negId)
					  ->bindValue(':i_estado', $estado)
					  ->bindValue(':i_monto', $monto)
                      ->execute();
	}
	public function obtenerComprasVenderCupon($tpoId,$tivId,$fluId,$tipo,$negId){
		$query = new Query;
		if($tipo=="'C'")
		{
			$query  ->from(['por_titulos_portafolio tpo'])
			->select(['tpo.tpo_fecha_ingreso','isnull(tpo_saldo,tpo_cantidad*tpo_valor_nominal) as tpo_saldo','tpo.tpo_id',"isnull(ne.neg_num_liq,'') as tpo_liquidacion",'(isnull(tpo.tpo_monto_emision,0) * tf.tfl_amortizacion) as tpo_valor_original_emision','(case when nec_id is null then 0 else 1 end) as checked'])
			->innerJoin(['por_titulo_flujo tf'],'tf.tiv_id = tpo.tiv_id')
			->innerJoin(['por_titulo_valor tv'],'tv.tiv_id = tpo.tiv_id')
			->leftJoin(['por_negociacion_cupon cn'],'cn.tpo_id = tpo.tpo_id and cn.[flu_id] = tf.tfl_id and [nec_tipo] = '.$tipo)
			->leftJoin(['por_titulo_portafolio_cupon tpc'],'tpc.tpo_id=tpo.tpo_id and tpc.flu_id=tf.tfl_id and tpc.tpc_tipo='.$tipo)
			->leftJoin(['por_negociacion ne'],'ne.neg_id=tpo.neg_id')
			->andWhere(['<>','tpo.tpo_id',$tpoId])
			->andWhere(['=','tpo.tiv_id',$tivId])
			->andWhere(['=','tf.tfl_id',$fluId])
			->andWhere(['>','tf.tfl_amortizacion',0]);
			
			if($negId<0){
				$query->andWhere(['is','tpc.tpc_id',null])
				->andWhere(['is','cn.nec_id',null]);
			}
			
		}else{
			$query  ->from(['por_titulos_portafolio tpo'])
			->select(['tpo.tpo_fecha_ingreso','isnull(tpo_saldo,tpo_cantidad*tpo_valor_nominal) as tpo_saldo','tpo.tpo_id',"isnull(ne.neg_num_liq,'') as tpo_liquidacion",'((isnull(tpo.tpo_monto_emision,0)-[dbo].[ObtenerAmortizacionCuponTpo](tpo.tpo_id,tf.tfl_fecha_inicio))  * (isnull(tf.tfl_interes,tv.tiv_tasa_interes)/100) * ([dbo].[fnDias](tf.tfl_fecha_inicio,tf.tfl_fecha_vencimiento,tv.tiv_tipo_base)/(select itc_valor from por_item_catalogo where itc_id = tv.tiv_tipo_base))) as tpo_valor_original_emision','(case when nec_id is null then 0 else 1 end) as checked'])
			->innerJoin(['por_titulo_flujo tf'],'tf.tiv_id = tpo.tiv_id')
			->innerJoin(['por_titulo_valor tv'],'tv.tiv_id = tpo.tiv_id')
			->leftJoin(['por_negociacion_cupon cn'],'cn.tpo_id = tpo.tpo_id and cn.[flu_id] = tf.tfl_id and [nec_tipo] = '.$tipo)
			->leftJoin(['por_titulo_portafolio_cupon tpc'],'tpc.tpo_id=tpo.tpo_id and tpc.flu_id=tf.tfl_id and tpc.tpc_tipo='.$tipo)
			->leftJoin(['por_negociacion ne'],'ne.neg_id=tpo.neg_id')
			->andWhere(['<>','tpo.tpo_id',$tpoId])
			->andWhere(['=','tpo.tiv_id',$tivId])
			->andWhere(['=','tf.tfl_id',$fluId])
			->andWhere(['>','isnull(tf.tfl_interes,tv.tiv_tasa_interes)',0]);
			if($negId<0){
				$query->andWhere(['is','tpc.tpc_id',null])
				->andWhere(['is','cn.nec_id',null]);
			}
		}
			
		$command = $query->createCommand();
        $tituloPor = $command->queryAll();

        return $tituloPor;
	}
	public function obtnerNegociacionPorId($negId){
		$query = new Query;
        $query  ->from(['por_negociacion n'])
          ->select(['n.neg_id','n.por_id','n.neg_operacion','n.neg_reporto','n.emi_id','n.tvl_id'
		  ,'n.tiv_id','n.neg_fecha_valor','n.neg_num_liq','n.neg_cantidad','n.neg_valor_nominal','n.neg_precio','n.neg_comision_bolsa'
		  ,'n.neg_comision_casa','n.neg_retencion_bolsa','n.neg_retnecion_casa','n.neg_estado','n.por_fecha_creacion','n.por_fecha_actualizacion','n.neg_intereses_trans','n.neg_valor_original_emision',
		  'i.itc_nombre as neg_estado_nombre','i.itc_codigo as neg_estado_cod','p.por_codigo','c.cli_razon_social','n.neg_tipo_renta','tr.itc_nombre as neg_tipo_renta_nombre','ori.itc_nombre as neg_orige_nombre','n.neg_origen','neg_rendimiento_compra','neg_intereses_dias_trans'
		  ,'op.itc_codigo as neg_codigo_op','isnull(n.neg_ocultar_tp,0) as neg_ocultar_tp',"isnull((select top 1 pnl_path from por_negociacion_liquidacion nl where nl.neg_id=n.neg_id order by pnl_fecha desc),'') as neg_liqpath",'em.emi_nombre','tv.tiv_camara_id'])
			->innerJoin(['por_portafolio p'],'n.por_id = p.por_id')
			->innerJoin(['por_cliente c'],'c.cli_id = p.cli_id')
			->innerJoin(['por_item_catalogo tr'],'n.neg_tipo_renta = tr.itc_id')
			->innerJoin(['por_item_catalogo ori'],'n.neg_origen = ori.itc_id')
			->innerJoin(['por_titulo_valor tv'],'tv.tiv_id = n.tiv_id')
			->innerJoin(['por_emisor em'],'em.emi_id = tv.tiv_emisor')
			->leftJoin(['por_item_catalogo op'],'op.itc_id = n.neg_operacion')
			->leftJoin(['por_item_catalogo i'],'n.neg_estado = i.itc_id')
			->andWhere(['n.neg_id' => $negId]);

            $command = $query->createCommand();
        $catalogo = $command->queryAll();

        return $catalogo;
	}
}
