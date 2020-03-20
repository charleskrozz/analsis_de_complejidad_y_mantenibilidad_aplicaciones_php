<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorLiquidezRegPago;

/**
 * PorLiquidezRegPagoSearch represents the model behind the search form about `app\models\PorLiquidezRegPago`.
 */
class PorLiquidezRegPagoSearch extends PorLiquidezRegPago
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lpa_id', 'liq_id'], 'integer'],
            [['liq_monto'], 'number'],
            [['liq_fecha_registro', 'liq_descripcion'], 'safe'],
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
        $query = PorLiquidezRegPago::find();

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
            'lpa_id' => $this->lpa_id,
            'liq_id' => $this->liq_id,
            'liq_monto' => $this->liq_monto,
            'liq_fecha_registro' => $this->liq_fecha_registro,
        ]);

        $query->andFilterWhere(['like', 'liq_descripcion', $this->liq_descripcion]);

        return $dataProvider;
    }
}
