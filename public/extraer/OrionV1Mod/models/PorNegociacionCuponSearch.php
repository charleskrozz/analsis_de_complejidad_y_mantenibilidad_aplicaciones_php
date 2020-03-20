<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorNegociacionCupon;

/**
 * PorNegociacionCuponSearch represents the model behind the search form about `app\models\PorNegociacionCupon`.
 */
class PorNegociacionCuponSearch extends PorNegociacionCupon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nec_id', 'tpo_id', 'flu_id'], 'integer'],
            [['nec_tipo', 'nec_fecha_venta'], 'safe'],
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
        $query = PorNegociacionCupon::find();

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
            'nec_id' => $this->nec_id,
            'tpo_id' => $this->tpo_id,
            'flu_id' => $this->flu_id,
            'nec_fecha_venta' => $this->nec_fecha_venta,
        ]);

        $query->andFilterWhere(['like', 'nec_tipo', $this->nec_tipo]);

        return $dataProvider;
    }
}
