<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorNegociacion;

/**
 * PorNegociacionSearch represents the model behind the search form about `app\models\PorNegociacion`.
 */
class PorNegociacionSearch extends PorNegociacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['neg_id', 'por_id', 'neg_operacion', 'neg_reporto', 'emi_id', 'tvl_id', 'tiv_id', 'neg_estado'], 'integer'],
            [['neg_fecha_valor', 'neg_num_liq', 'por_fecha_creacion', 'por_fecha_actualizacion'], 'safe'],
            [['neg_cantidad', 'neg_valor_nominal', 'neg_precio', 'neg_comision_bolsa', 'neg_comision_casa', 'neg_retencion_bolsa', 'neg_retnecion_casa', 'neg_intereses_trans'], 'number'],
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
        $query = PorNegociacion::find();

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
            'neg_id' => $this->neg_id,
            'por_id' => $this->por_id,
            'neg_operacion' => $this->neg_operacion,
            'neg_reporto' => $this->neg_reporto,
            'emi_id' => $this->emi_id,
            'tvl_id' => $this->tvl_id,
            'tiv_id' => $this->tiv_id,
            'neg_fecha_valor' => $this->neg_fecha_valor,
            'neg_cantidad' => $this->neg_cantidad,
            'neg_valor_nominal' => $this->neg_valor_nominal,
            'neg_precio' => $this->neg_precio,
            'neg_comision_bolsa' => $this->neg_comision_bolsa,
            'neg_comision_casa' => $this->neg_comision_casa,
            'neg_retencion_bolsa' => $this->neg_retencion_bolsa,
            'neg_retnecion_casa' => $this->neg_retnecion_casa,
            'neg_estado' => $this->neg_estado,
            'por_fecha_creacion' => $this->por_fecha_creacion,
            'por_fecha_actualizacion' => $this->por_fecha_actualizacion,
            'neg_intereses_trans' => $this->neg_intereses_trans,
        ]);

        $query->andFilterWhere(['like', 'neg_num_liq', $this->neg_num_liq]);

        return $dataProvider;
    }
}
