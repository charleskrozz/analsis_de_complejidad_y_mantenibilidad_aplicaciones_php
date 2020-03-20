<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorTitulosPortafolio;

/**
 * PorTitulosPortafolioSearch represents the model behind the search form about `app\models\PorTitulosPortafolio`.
 */
class PorTitulosPortafolioSearch extends PorTitulosPortafolio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tpo_id', 'tiv_id', 'por_id', 'tpo_estado', 'tpo_cobro_cupon', 'tpo_confirma_titulo', 'neg_id', 'tpo_categoria', 'tpo_tipo_valoracion', 'tpo_redondear_amortizacion', 'grp_id', 'tpo_lineal_desde_primera_compra', 'tpo_saldo_en_fila_anterior', 'tpo_amortizar_monto_total'], 'integer'],
            [['tpo_precio_ingreso', 'tpo_ultima_revaluacion', 'tpo_cantidad', 'tpo_rendimiento', 'tpo_comision_compromiso', 'tpo_comision_financiamiento', 'tpo_comision_evaluacion', 'tpo_participacion', 'tpo_monto_emision', 'tpo_saldo'], 'number'],
            [['tpo_fecha_ingreso', 'tpo_fecha_registro', 'tpo_numeracion', 'tpo_custodio', 'tpo_renovado_de', 'tpo_objeto'], 'safe'],
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
        $query = PorTitulosPortafolio::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'tpo_id' => $this->tpo_id,
            'tiv_id' => $this->tiv_id,
            'por_id' => $this->por_id,
            'tpo_precio_ingreso' => $this->tpo_precio_ingreso,
            'tpo_fecha_ingreso' => $this->tpo_fecha_ingreso,
            'tpo_fecha_registro' => $this->tpo_fecha_registro,
            'tpo_estado' => $this->tpo_estado,
            'tpo_ultima_revaluacion' => $this->tpo_ultima_revaluacion,
            'tpo_cobro_cupon' => $this->tpo_cobro_cupon,
            'tpo_confirma_titulo' => $this->tpo_confirma_titulo,
            'neg_id' => $this->neg_id,
            'tpo_categoria' => $this->tpo_categoria,
            'tpo_cantidad' => $this->tpo_cantidad,
            'tpo_rendimiento' => $this->tpo_rendimiento,
            'tpo_tipo_valoracion' => $this->tpo_tipo_valoracion,
            'tpo_redondear_amortizacion' => $this->tpo_redondear_amortizacion,
            'grp_id' => $this->grp_id,
            'tpo_lineal_desde_primera_compra' => $this->tpo_lineal_desde_primera_compra,
            'tpo_comision_compromiso' => $this->tpo_comision_compromiso,
            'tpo_comision_financiamiento' => $this->tpo_comision_financiamiento,
            'tpo_comision_evaluacion' => $this->tpo_comision_evaluacion,
            'tpo_participacion' => $this->tpo_participacion,
            'tpo_monto_emision' => $this->tpo_monto_emision,
            'tpo_saldo_en_fila_anterior' => $this->tpo_saldo_en_fila_anterior,
            'tpo_amortizar_monto_total' => $this->tpo_amortizar_monto_total,
            'tpo_saldo' => $this->tpo_saldo,
        ]);

        $query->andFilterWhere(['like', 'tpo_numeracion', $this->tpo_numeracion])
            ->andFilterWhere(['like', 'tpo_custodio', $this->tpo_custodio])
            ->andFilterWhere(['like', 'tpo_renovado_de', $this->tpo_renovado_de])
            ->andFilterWhere(['like', 'tpo_objeto', $this->tpo_objeto]);

        return $dataProvider;
    }	
}
