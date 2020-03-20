<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorTituloValor;

/**
 * PorTituloValorSearch represents the model behind the search form about `app\models\PorTituloValor`.
 */
class PorTituloValorSearch extends PorTituloValor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tiv_id', 'tiv_emisor', 'tiv_tipo_valor', 'tiv_tipo_renta', 'tiv_moneda', 'tiv_tipo', 'tiv_estado', 'tiv_dias_para_vencer', 'tiv_aplica_debengo', 'tiv_aplica_maduracion', 'tiv_desmaterializado', 'tiv_sector', 'tiv_tipo_base', 'tiv_tipo_tasa', 'tiv_materia_reporto', 'tiv_materia_plazo', 'tiv_garantia_reporto', 'tiv_garantia_plazo', 'tiv_subtipo', 'tiv_valoracion', 'tiv_dias_plazo', 'tiv_clasificacion', 'tiv_registrado_manual', 'tiv_calculo_frecuencia', 'tiv_dias_clasificacion', 'tiv_plazo', 'tiv_plazo_remanente', 'tiv_codigo_sic', 'tiv_codigo_gen_sic', 'tiv_valora_sin_redondear', 'tiv_accrual_365', 'tiv_con_restriccion'], 'integer'],
            [['tiv_codigo', 'tiv_fecha_vencimiento', 'tiv_serie', 'tiv_fecha_emision', 'tiv_descripcion', 'tiv_decreto', 'tiv_fecha_registro', 'tiv_fecha_actualizacion', 'tiv_producto', 'tiv_codigo_titulo_sic', 'tiv_tipo_titulo_generico', 'tiv_camara', 'vencimientomenos1y', 'tiv_tipo_restriccion'], 'safe'],
            [['tiv_rendimiento', 'tiv_valor_nominal', 'tiv_valor_efectivo', 'tiv_tasa_interes', 'tiv_tasa_descuento', 'tiv_tasa_cupon_vigente', 'tiv_precio_spot', 'tiv_factor_pres_bursatil', 'tiv_tasa_margen', 'tiv_frecuencia', 'tiv_presencia_bursatil', 'tiv_frecuencia_seb', 'tiv_periodo_capital_seb'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PorTituloValor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tiv_id' => $this->tiv_id,
            'tiv_emisor' => $this->tiv_emisor,
            'tiv_tipo_valor' => $this->tiv_tipo_valor,
            'tiv_tipo_renta' => $this->tiv_tipo_renta,
            'tiv_fecha_vencimiento' => $this->tiv_fecha_vencimiento,
            'tiv_rendimiento' => $this->tiv_rendimiento,
            'tiv_moneda' => $this->tiv_moneda,
            'tiv_tipo' => $this->tiv_tipo,
            'tiv_estado' => $this->tiv_estado,
            'tiv_valor_nominal' => $this->tiv_valor_nominal,
            'tiv_valor_efectivo' => $this->tiv_valor_efectivo,
            'tiv_dias_para_vencer' => $this->tiv_dias_para_vencer,
            'tiv_tasa_interes' => $this->tiv_tasa_interes,
            'tiv_tasa_descuento' => $this->tiv_tasa_descuento,
            'tiv_tasa_cupon_vigente' => $this->tiv_tasa_cupon_vigente,
            'tiv_aplica_debengo' => $this->tiv_aplica_debengo,
            'tiv_aplica_maduracion' => $this->tiv_aplica_maduracion,
            'tiv_desmaterializado' => $this->tiv_desmaterializado,
            'tiv_sector' => $this->tiv_sector,
            'tiv_tipo_base' => $this->tiv_tipo_base,
            'tiv_precio_spot' => $this->tiv_precio_spot,
            'tiv_factor_pres_bursatil' => $this->tiv_factor_pres_bursatil,
            'tiv_tipo_tasa' => $this->tiv_tipo_tasa,
            'tiv_tasa_margen' => $this->tiv_tasa_margen,
            'tiv_fecha_emision' => $this->tiv_fecha_emision,
            'tiv_frecuencia' => $this->tiv_frecuencia,
            'tiv_materia_reporto' => $this->tiv_materia_reporto,
            'tiv_materia_plazo' => $this->tiv_materia_plazo,
            'tiv_garantia_reporto' => $this->tiv_garantia_reporto,
            'tiv_garantia_plazo' => $this->tiv_garantia_plazo,
            'tiv_subtipo' => $this->tiv_subtipo,
            'tiv_valoracion' => $this->tiv_valoracion,
            'tiv_dias_plazo' => $this->tiv_dias_plazo,
            'tiv_clasificacion' => $this->tiv_clasificacion,
            'tiv_presencia_bursatil' => $this->tiv_presencia_bursatil,
            'tiv_registrado_manual' => $this->tiv_registrado_manual,
            'tiv_calculo_frecuencia' => $this->tiv_calculo_frecuencia,
            'tiv_fecha_registro' => $this->tiv_fecha_registro,
            'tiv_fecha_actualizacion' => $this->tiv_fecha_actualizacion,
            'tiv_dias_clasificacion' => $this->tiv_dias_clasificacion,
            'tiv_plazo' => $this->tiv_plazo,
            'tiv_plazo_remanente' => $this->tiv_plazo_remanente,
            'tiv_codigo_sic' => $this->tiv_codigo_sic,
            'tiv_codigo_gen_sic' => $this->tiv_codigo_gen_sic,
            'vencimientomenos1y' => $this->vencimientomenos1y,
            'tiv_valora_sin_redondear' => $this->tiv_valora_sin_redondear,
            'tiv_accrual_365' => $this->tiv_accrual_365,
            'tiv_con_restriccion' => $this->tiv_con_restriccion,
            'tiv_frecuencia_seb' => $this->tiv_frecuencia_seb,
            'tiv_periodo_capital_seb' => $this->tiv_periodo_capital_seb,
        ]);

        $query->andFilterWhere(['like', 'tiv_codigo', $this->tiv_codigo])
            ->andFilterWhere(['like', 'tiv_serie', $this->tiv_serie])
            ->andFilterWhere(['like', 'tiv_descripcion', $this->tiv_descripcion])
            ->andFilterWhere(['like', 'tiv_decreto', $this->tiv_decreto])
            ->andFilterWhere(['like', 'tiv_producto', $this->tiv_producto])
            ->andFilterWhere(['like', 'tiv_codigo_titulo_sic', $this->tiv_codigo_titulo_sic])
            ->andFilterWhere(['like', 'tiv_tipo_titulo_generico', $this->tiv_tipo_titulo_generico])
            ->andFilterWhere(['like', 'tiv_camara', $this->tiv_camara])
            ->andFilterWhere(['like', 'tiv_tipo_restriccion', $this->tiv_tipo_restriccion]);

        return $dataProvider;
    }
}
