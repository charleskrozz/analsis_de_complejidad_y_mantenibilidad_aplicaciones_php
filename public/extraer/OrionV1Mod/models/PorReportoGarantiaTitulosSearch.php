<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorReportoGarantiaTitulos;

/**
 * PorReportoGarantiaTitulosSearch represents the model behind the search form about `app\models\PorReportoGarantiaTitulos`.
 */
class PorReportoGarantiaTitulosSearch extends PorReportoGarantiaTitulos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rgt_id', 'neg_id', 'tpo_id', 'rgt_tipo', 'rgt_estado'], 'integer'],
            [['rgt_fecha_registro'], 'safe'],
            [['rgt_monto'], 'number'],
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
        $query = PorReportoGarantiaTitulos::find();

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
            'rgt_id' => $this->rgt_id,
            'neg_id' => $this->neg_id,
            'tpo_id' => $this->tpo_id,
            'rgt_fecha_registro' => $this->rgt_fecha_registro,
            'rgt_tipo' => $this->rgt_tipo,
            'rgt_monto' => $this->rgt_monto,
            'rgt_estado' => $this->rgt_estado,
        ]);

        return $dataProvider;
    }
}
