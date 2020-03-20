<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_titulo_valor".
 *
 * @property integer $tiv_id
 * @property string $tiv_codigo
 * @property integer $tiv_emisor
 * @property integer $tiv_tipo_valor
 * @property integer $tiv_tipo_renta
 * @property string $tiv_fecha_vencimiento
 * @property double $tiv_rendimiento
 * @property integer $tiv_moneda
 * @property integer $tiv_tipo
 * @property integer $tiv_estado
 * @property double $tiv_valor_nominal
 * @property double $tiv_valor_efectivo
 * @property integer $tiv_dias_para_vencer
 * @property double $tiv_tasa_interes
 * @property double $tiv_tasa_descuento
 * @property double $tiv_tasa_cupon_vigente
 * @property string $tiv_serie
 * @property integer $tiv_aplica_debengo
 * @property integer $tiv_aplica_maduracion
 * @property integer $tiv_desmaterializado
 * @property integer $tiv_sector
 * @property integer $tiv_tipo_base
 * @property double $tiv_precio_spot
 * @property double $tiv_factor_pres_bursatil
 * @property integer $tiv_tipo_tasa
 * @property double $tiv_tasa_margen
 * @property string $tiv_fecha_emision
 * @property double $tiv_frecuencia
 * @property integer $tiv_materia_reporto
 * @property integer $tiv_materia_plazo
 * @property integer $tiv_garantia_reporto
 * @property integer $tiv_garantia_plazo
 * @property string $tiv_descripcion
 * @property integer $tiv_subtipo
 * @property string $tiv_decreto
 * @property integer $tiv_valoracion
 * @property integer $tiv_dias_plazo
 * @property integer $tiv_clasificacion
 * @property double $tiv_presencia_bursatil
 * @property integer $tiv_registrado_manual
 * @property integer $tiv_calculo_frecuencia
 * @property string $tiv_fecha_registro
 * @property string $tiv_fecha_actualizacion
 * @property string $tiv_producto
 * @property string $tiv_codigo_titulo_sic
 * @property string $tiv_tipo_titulo_generico
 * @property integer $tiv_dias_clasificacion
 * @property integer $tiv_plazo
 * @property integer $tiv_plazo_remanente
 * @property integer $tiv_codigo_sic
 * @property integer $tiv_codigo_gen_sic
 * @property string $tiv_camara
 * @property string $vencimientomenos1y
 * @property integer $tiv_valora_sin_redondear
 * @property integer $tiv_accrual_365
 * @property integer $tiv_con_restriccion
 * @property string $tiv_tipo_restriccion
 * @property double $tiv_frecuencia_seb
 * @property double $tiv_periodo_capital_seb
 */
class PorTituloValor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_titulo_valor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tiv_codigo', 'tiv_emisor', 'tiv_tipo_valor', 'tiv_tipo_renta', 'tiv_moneda', 'tiv_tipo', 'tiv_estado', 'tiv_desmaterializado', 'tiv_sector', 'tiv_tipo_base', 'tiv_materia_reporto', 'tiv_materia_plazo', 'tiv_garantia_reporto', 'tiv_garantia_plazo','tiv_tipo_tasa','tiv_subtipo','tiv_camara_id'], 'required'],
            [['tiv_id', 'tiv_emisor', 'tiv_tipo_valor', 'tiv_tipo_renta', 'tiv_moneda', 'tiv_tipo', 'tiv_estado', 'tiv_dias_para_vencer', 'tiv_aplica_debengo', 'tiv_aplica_maduracion', 'tiv_desmaterializado', 'tiv_sector', 'tiv_tipo_base', 'tiv_tipo_tasa', 'tiv_materia_reporto', 'tiv_materia_plazo', 'tiv_garantia_reporto', 'tiv_garantia_plazo', 'tiv_subtipo', 'tiv_valoracion', 'tiv_dias_plazo', 'tiv_clasificacion', 'tiv_registrado_manual', 'tiv_calculo_frecuencia', 'tiv_dias_clasificacion', 'tiv_plazo', 'tiv_plazo_remanente', 'tiv_codigo_sic', 'tiv_codigo_gen_sic', 'tiv_valora_sin_redondear', 'tiv_accrual_365', 'tiv_con_restriccion'], 'integer'],
            [['tiv_codigo', 'tiv_serie', 'tiv_descripcion', 'tiv_decreto', 'tiv_producto', 'tiv_codigo_titulo_sic', 'tiv_tipo_titulo_generico', 'tiv_camara', 'tiv_tipo_restriccion','tiv_codigo_vp'], 'string'],
            [['tiv_fecha_vencimiento', 'tiv_fecha_emision', 'tiv_fecha_registro', 'tiv_fecha_actualizacion', 'vencimientomenos1y'], 'safe'],
            [['tiv_rendimiento', 'tiv_valor_nominal', 'tiv_valor_efectivo', 'tiv_tasa_interes', 'tiv_tasa_descuento', 'tiv_tasa_cupon_vigente', 'tiv_precio_spot', 'tiv_factor_pres_bursatil', 'tiv_tasa_margen', 'tiv_frecuencia', 'tiv_presencia_bursatil', 'tiv_frecuencia_seb', 'tiv_periodo_capital_seb'], 'number'],
            [['tiv_emisor'], 'exist', 'skipOnError' => true, 'targetClass' => PorEmisor::className(), 'targetAttribute' => ['tiv_emisor' => 'emi_id']],
            //[['tiv_clasificacion'], 'exist', 'skipOnError' => true, 'targetClass' => PorItemCatalogo::className(), 'targetAttribute' => ['tiv_clasificacion' => 'itc_id']],
            [['tiv_estado'], 'exist', 'skipOnError' => true, 'targetClass' => PorItemCatalogo::className(), 'targetAttribute' => ['tiv_estado' => 'itc_id']],
            [['tiv_moneda'], 'exist', 'skipOnError' => true, 'targetClass' => PorMoneda::className(), 'targetAttribute' => ['tiv_moneda' => 'mon_id']],
            [['tiv_sector'], 'exist', 'skipOnError' => true, 'targetClass' => PorItemCatalogo::className(), 'targetAttribute' => ['tiv_sector' => 'itc_id']],
            [['tiv_subtipo'], 'exist', 'skipOnError' => true, 'targetClass' => PorSubtipo::className(), 'targetAttribute' => ['tiv_subtipo' => 'sbt_id']],
            [['tiv_tipo_renta'], 'exist', 'skipOnError' => true, 'targetClass' => PorItemCatalogo::className(), 'targetAttribute' => ['tiv_tipo_renta' => 'itc_id']],
            [['tiv_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => PorItemCatalogo::className(), 'targetAttribute' => ['tiv_tipo' => 'itc_id']],
            [['tiv_tipo_base'], 'exist', 'skipOnError' => true, 'targetClass' => PorItemCatalogo::className(), 'targetAttribute' => ['tiv_tipo_base' => 'itc_id']],
            [['tiv_tipo_tasa'], 'exist', 'skipOnError' => true, 'targetClass' => PorItemCatalogo::className(), 'targetAttribute' => ['tiv_tipo_tasa' => 'itc_id']],
            [['tiv_tipo_valor'], 'exist', 'skipOnError' => true, 'targetClass' => PorTipoValor::className(), 'targetAttribute' => ['tiv_tipo_valor' => 'tvl_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tiv_id' => 'Título Valor',
            'tiv_codigo' => 'Código',
            'tiv_emisor' => 'Emisor',
            'tiv_tipo_valor' => 'Tipo Valor',
            'tiv_tipo_renta' => 'Tipo Renta',
            'tiv_fecha_vencimiento' => 'Fecha Vencimiento',
            'tiv_rendimiento' => 'Rendimiento',
            'tiv_moneda' => 'Moneda',
            'tiv_tipo' => 'Tipo',
            'tiv_estado' => 'Estado',
            'tiv_valor_nominal' => 'Valor Nominal',
            'tiv_valor_efectivo' => 'Valor Efectivo',
            'tiv_dias_para_vencer' => 'Días por vencer',
            'tiv_tasa_interes' => 'Tasa Interés',
            'tiv_tasa_descuento' => 'Tasa Descuento',
            'tiv_tasa_cupon_vigente' => 'Tasa Cupón Vigente',
            'tiv_serie' => 'Serie',
            'tiv_aplica_debengo' => '',
            'tiv_aplica_maduracion' => '',
            'tiv_desmaterializado' => '',
            'tiv_sector' => 'Sector',
            'tiv_tipo_base' => 'Tipo Base',
            'tiv_precio_spot' => 'Precio Spot',
            'tiv_factor_pres_bursatil' => 'Factor Pres. Bursátil',
            'tiv_tipo_tasa' => 'Tipo Tasa',
            'tiv_tasa_margen' => 'Tasa Margen',
            'tiv_fecha_emision' => 'Fecha Emisión',
            'tiv_frecuencia' => 'Frecuencia',
            'tiv_materia_reporto' => '',
            'tiv_materia_plazo' => '',
            'tiv_garantia_reporto' => '',
            'tiv_garantia_plazo' => '',
            'tiv_descripcion' => 'Descripción',
            'tiv_subtipo' => 'Subtipo',
            'tiv_decreto' => 'Decreto',
            'tiv_valoracion' => '',
            'tiv_dias_plazo' => 'Días Plazo',
            'tiv_clasificacion' => 'Clasificación',
            'tiv_presencia_bursatil' => 'Presencia Bursátil',
            'tiv_registrado_manual' => '',
            'tiv_calculo_frecuencia' => '',
            'tiv_fecha_registro' => 'Fecha Registro',
            'tiv_fecha_actualizacion' => 'Fecha Actualización',
            'tiv_producto' => 'Producto',
            'tiv_codigo_titulo_sic' => 'Código Título Sic',
            'tiv_tipo_titulo_generico' => 'Tipo Título Genérico',
            'tiv_dias_clasificacion' => 'Días Clasificación',
            'tiv_plazo' => 'Plazo',
            'tiv_plazo_remanente' => 'Plazo Remanente',
            'tiv_codigo_sic' => 'Código Sic',
            'tiv_codigo_gen_sic' => 'Código Gen Sic',
            'tiv_camara' => 'Cámara',
            'vencimientomenos1y' => 'Vencimiento menos 1',
            'tiv_valora_sin_redondear' => '',
            'tiv_accrual_365' => '',
            'tiv_con_restriccion' => '',
            'tiv_tipo_restriccion' => 'Tipo Restricción',
            'tiv_frecuencia_seb' => 'Frecuencia SEB',
            'tiv_periodo_capital_seb' => 'Período Capital SEB',
            'tiv_codigo_vp' => 'Código vector de precios',
            'tiv_camara_id' => 'Cámara'
        ];
    }
	public function mostrarListado($bolShowAll){
		$fecha_actual = date("d-m-Y");
		$fecha_actual = date("d-m-Y",strtotime($fecha_actual."- 1 month"));
        $query = new Query;

        if($bolShowAll==false){
            $query  ->from(['por_titulo_valor pt'])
          ->select(['pt.tiv_id','pt.tiv_codigo','pt.tiv_emisor','e.emi_nombre','pt.tiv_tipo_valor','tv.tvl_nombre','pt.tiv_tipo_renta','upper(tr.itc_nombre) as tiporentanombre',
		  'pt.tiv_fecha_vencimiento','pt.tiv_rendimiento','pt.tiv_moneda','m.mon_nombre as monedanombre','pt.tiv_tipo','upper(ti.itc_nombre) as tiponombre','pt.tiv_estado','es.itc_nombre as estadonombre',
		  'pt.tiv_valor_nominal','pt.tiv_valor_efectivo','pt.tiv_dias_para_vencer','pt.tiv_tasa_interes','pt.tiv_tasa_descuento','pt.tiv_tasa_cupon_vigente','pt.tiv_serie','pt.tiv_aplica_debengo',
		  'pt.tiv_aplica_maduracion','pt.tiv_desmaterializado','pt.tiv_sector','sec.itc_nombre as sectornombre','pt.tiv_tipo_base','tb.itc_nombre as tipobasenombre','pt.tiv_precio_spot','pt.tiv_factor_pres_bursatil',
		  'pt.tiv_tipo_tasa','tt.itc_nombre as tipotasanombre','pt.tiv_tasa_margen','pt.tiv_fecha_emision','pt.tiv_frecuencia','pt.tiv_materia_reporto','pt.tiv_materia_plazo','pt.tiv_garantia_reporto',
		  'pt.tiv_garantia_plazo','pt.tiv_descripcion','pt.tiv_subtipo','pt.tiv_decreto','pt.tiv_valoracion','pt.tiv_dias_plazo','pt.tiv_clasificacion','pt.tiv_presencia_bursatil',
		  'pt.tiv_registrado_manual','pt.tiv_calculo_frecuencia','pt.tiv_fecha_registro','pt.tiv_fecha_actualizacion','pt.tiv_producto','pt.tiv_codigo_titulo_sic','pt.tiv_tipo_titulo_generico','pt.tiv_dias_clasificacion',
		  'pt.tiv_plazo','pt.tiv_plazo_remanente','pt.tiv_codigo_sic','pt.tiv_codigo_gen_sic','pt.tiv_camara','pt.vencimientomenos1y','pt.tiv_valora_sin_redondear','pt.tiv_accrual_365',
		  'pt.tiv_con_restriccion','pt.tiv_tipo_restriccion','pt.tiv_frecuencia_seb','pt.tiv_periodo_capital_seb','pt.tiv_codigo_vp','[dbo].[fnDias](tiv_fecha_emision,tiv_fecha_vencimiento,tiv_tipo_base) as dias_plazo_cal','tiv_camara_id'])
			->innerJoin(['por_emisor e'],'e.emi_id = pt.tiv_emisor')
            ->innerJoin(['por_tipo_valor tv'],'tv.tvl_id = pt.tiv_tipo_valor')
			->innerJoin(['por_item_catalogo tr'],'tr.itc_id = pt.tiv_tipo_renta')
			->innerJoin(['por_moneda m'],'m.mon_id = pt.tiv_moneda')
			->innerJoin(['por_item_catalogo ti'],'ti.itc_id = pt.tiv_tipo')
			->innerJoin(['por_item_catalogo es'],'es.itc_id = pt.tiv_estado')
			->innerJoin(['por_item_catalogo sec'],'sec.itc_id = pt.tiv_sector')
			->innerJoin(['por_item_catalogo tb'],'tb.itc_id = pt.tiv_tipo_base')
			->innerJoin(['por_item_catalogo tt'],'tt.itc_id = pt.tiv_tipo_tasa')
			->andWhere(['>=','pt.tiv_fecha_vencimiento', $fecha_actual])
			->orWhere(['is','pt.tiv_fecha_vencimiento', null])
			->orderBy(['e.emi_nombre'=> SORT_ASC]);
        }else{
            $query  ->from(['por_titulo_valor pt'])
          ->select(['pt.tiv_id','pt.tiv_codigo','pt.tiv_emisor','e.emi_nombre','pt.tiv_tipo_valor','tv.tvl_nombre','pt.tiv_tipo_renta','upper(tr.itc_nombre) as tiporentanombre',
		  'pt.tiv_fecha_vencimiento','pt.tiv_rendimiento','pt.tiv_moneda','m.mon_nombre as monedanombre','pt.tiv_tipo','upper(ti.itc_nombre) as tiponombre','pt.tiv_estado','es.itc_nombre as estadonombre',
		  'pt.tiv_valor_nominal','pt.tiv_valor_efectivo','pt.tiv_dias_para_vencer','pt.tiv_tasa_interes','pt.tiv_tasa_descuento','pt.tiv_tasa_cupon_vigente','pt.tiv_serie','pt.tiv_aplica_debengo',
		  'pt.tiv_aplica_maduracion','pt.tiv_desmaterializado','pt.tiv_sector','sec.itc_nombre as sectornombre','pt.tiv_tipo_base','tb.itc_nombre as tipobasenombre','pt.tiv_precio_spot','pt.tiv_factor_pres_bursatil',
		  'pt.tiv_tipo_tasa','tt.itc_nombre as tipotasanombre','pt.tiv_tasa_margen','pt.tiv_fecha_emision','pt.tiv_frecuencia','pt.tiv_materia_reporto','pt.tiv_materia_plazo','pt.tiv_garantia_reporto',
		  'pt.tiv_garantia_plazo','pt.tiv_descripcion','pt.tiv_subtipo','pt.tiv_decreto','pt.tiv_valoracion','pt.tiv_dias_plazo','pt.tiv_clasificacion','pt.tiv_presencia_bursatil',
		  'pt.tiv_registrado_manual','pt.tiv_calculo_frecuencia','pt.tiv_fecha_registro','pt.tiv_fecha_actualizacion','pt.tiv_producto','pt.tiv_codigo_titulo_sic','pt.tiv_tipo_titulo_generico','pt.tiv_dias_clasificacion',
		  'pt.tiv_plazo','pt.tiv_plazo_remanente','pt.tiv_codigo_sic','pt.tiv_codigo_gen_sic','pt.tiv_camara','pt.vencimientomenos1y','pt.tiv_valora_sin_redondear','pt.tiv_accrual_365',
		  'pt.tiv_con_restriccion','pt.tiv_tipo_restriccion','pt.tiv_frecuencia_seb','pt.tiv_periodo_capital_seb','pt.tiv_codigo_vp','[dbo].[fnDias](tiv_fecha_emision,tiv_fecha_vencimiento,tiv_tipo_base) as dias_plazo_cal','tiv_camara_id'])
			->innerJoin(['por_emisor e'],'e.emi_id = pt.tiv_emisor')
            ->innerJoin(['por_tipo_valor tv'],'tv.tvl_id = pt.tiv_tipo_valor')
			->innerJoin(['por_item_catalogo tr'],'tr.itc_id = pt.tiv_tipo_renta')
			->innerJoin(['por_moneda m'],'m.mon_id = pt.tiv_moneda')
			->innerJoin(['por_item_catalogo ti'],'ti.itc_id = pt.tiv_tipo')
			->innerJoin(['por_item_catalogo es'],'es.itc_id = pt.tiv_estado')
			->innerJoin(['por_item_catalogo sec'],'sec.itc_id = pt.tiv_sector')
			->innerJoin(['por_item_catalogo tb'],'tb.itc_id = pt.tiv_tipo_base')
			->innerJoin(['por_item_catalogo tt'],'tt.itc_id = pt.tiv_tipo_tasa')
			->orderBy(['e.emi_nombre'=> SORT_ASC]);
        }
         

		$command = $query->createCommand();
        $tituloVal = $command->queryAll();
		
        return $tituloVal;
    }
	public function obtenerFlujo($tivId){
		$query = new Query;
        $query  ->from(['por_titulo_flujo tf'])
		->select(['tf.tfl_id','tf.tiv_id','tf.tfl_periodo','tf.tfl_capital','(tf.tfl_interes*100) as tfl_interes','tf.tfl_amortizacion','tf.tfl_fecha_inicio','tf.tfl_fecha_vencimiento'])
		->andWhere(['tf.tiv_id' => $tivId])
		->orderBy(['tf.tfl_periodo' => SORT_ASC]);
		
		$command = $query->createCommand();
        $flujo = $command->queryAll();
		
        return $flujo;
	}
	public function obtenerTituloPorId($tivId){
		$query = new Query;
        $query  ->from(['por_titulo_valor tv'])
		->select(['tv.*'])
		->andWhere(['tv.tiv_id' => $tivId]);
		
		$command = $query->createCommand();
        $titulo = $command->queryAll();
		
        return $titulo;
	}
	public function obtenerTipoValorEmisor($emiId)
	{
		$query = new Query;
        $query  ->from(['por_emisor_tipo_valor et'])
		->select(['et.tvl_id as id','ti.tvl_nombre as text'])
		->innerJoin(['por_emisor e'],'e.emi_id = et.emi_id')
		->innerJoin(['por_tipo_valor ti'],'et.tvl_id = ti.tvl_id')
		->andWhere(['et.emi_id' => $emiId]);
		
		$command = $query->createCommand();
        $tipoEmi = $command->queryAll();
		
		
        return $tipoEmi;
	}
	public function obtenerTipoValorEmisorRenta($emiId,$renta)
	{
		$query = new Query;
        $query  ->from(['por_emisor_tipo_valor et'])
		->select(['et.tvl_id as id','ti.tvl_nombre as text'])
		->innerJoin(['por_emisor e'],'e.emi_id = et.emi_id')
		->innerJoin(['por_tipo_valor ti'],'et.tvl_id = ti.tvl_id')
		->andWhere(['et.emi_id' => $emiId,'ti.tvl_tipo_renta' => $renta]);
		
		$command = $query->createCommand();
        $tipoEmi = $command->queryAll();
		
		
        return $tipoEmi;
	}
	public function obtenerTituloValorPorEmiTiv($emiId,$tivId,$renta)
	{
		$query = new Query;
        $query  ->from(['por_titulo_valor tiv'])
		->select(['tiv.tiv_id as id',"concat(tiv.tiv_codigo,' - FE:',CONVERT(VARCHAR(10),tiv.tiv_fecha_emision,105),' - FV:',CONVERT(VARCHAR(10),tiv.tiv_fecha_vencimiento,105),' - F:',tiv_frecuencia,' - TI:',tiv_tasa_interes,'% - ST:',upper(st.sbt_nombre)) as text"])
		->innerJoin(['por_subtipo st'],'st.sbt_id = tiv.tiv_subtipo')
		->andWhere(['tiv.tiv_emisor' => $emiId,'tiv.tiv_tipo_valor' => $tivId,'tiv.tiv_tipo_renta' => $renta]);
		
		$command = $query->createCommand();
        $tipoTitulo = $command->queryAll();
		
		
        return $tipoTitulo;
	}
}
