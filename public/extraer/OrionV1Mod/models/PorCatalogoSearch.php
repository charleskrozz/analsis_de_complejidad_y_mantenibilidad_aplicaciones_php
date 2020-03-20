<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorCatalogo;

/**
 * PorCatalogoSearch represents the model behind the search form about `app\models\PorCatalogo`.
 */
class PorCatalogoSearch extends PorCatalogo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'cat_padre_id', 'cat_estado', 'cat_valor_defecto'], 'integer'],
            [['cat_nombre', 'cat_codigo', 'cat_descripcion'], 'safe'],
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
        $query = PorCatalogo::find();

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
            'cat_id' => $this->cat_id,
            'cat_padre_id' => $this->cat_padre_id,
            'cat_estado' => $this->cat_estado,
            'cat_valor_defecto' => $this->cat_valor_defecto,
        ]);

        $query->andFilterWhere(['like', 'cat_nombre', $this->cat_nombre])
            ->andFilterWhere(['like', 'cat_codigo', $this->cat_codigo])
            ->andFilterWhere(['like', 'cat_descripcion', $this->cat_descripcion]);

        return $dataProvider;
    }
}
