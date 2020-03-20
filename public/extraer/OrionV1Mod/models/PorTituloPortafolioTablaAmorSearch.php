<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorTituloPortafolioTablaAmor;

/**
 * PorTituloPortafolioTablaAmorSearch represents the model behind the search form about `app\models\PorTituloPortafolioTablaAmor`.
 */
class PorTituloPortafolioTablaAmorSearch extends PorTituloPortafolioTablaAmor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tpt_id', 'tpo_id'], 'integer'],
            [['tpt_path', 'tpt_fecha', 'tpt_estado'], 'safe'],
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
        $query = PorTituloPortafolioTablaAmor::find();

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
            'tpt_id' => $this->tpt_id,
            'tpo_id' => $this->tpo_id,
            'tpt_fecha' => $this->tpt_fecha,
        ]);

        $query->andFilterWhere(['like', 'tpt_path', $this->tpt_path])
            ->andFilterWhere(['like', 'tpt_estado', $this->tpt_estado]);

        return $dataProvider;
    }
}
