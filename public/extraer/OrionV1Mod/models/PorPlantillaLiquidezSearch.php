<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorPlantillaLiquidez;

/**
 * PorPlantillaLiquidezSearch represents the model behind the search form about `app\models\PorPlantillaLiquidez`.
 */
class PorPlantillaLiquidezSearch extends PorPlantillaLiquidez
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pll_id', 'pll_tipo', 'pll_estado'], 'integer'],
            [['pll_nombre', 'pll_descripcion'], 'safe'],
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
        $query = PorPlantillaLiquidez::find();

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
            'pll_id' => $this->pll_id,
            'pll_tipo' => $this->pll_tipo,
            'pll_estado' => $this->pll_estado,
        ]);

        $query->andFilterWhere(['like', 'pll_nombre', $this->pll_nombre])
            ->andFilterWhere(['like', 'pll_descripcion', $this->pll_descripcion]);

        return $dataProvider;
    }
}
