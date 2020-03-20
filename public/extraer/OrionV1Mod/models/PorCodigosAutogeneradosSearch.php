<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorCodigosAutogenerados;

/**
 * PorCodigosAutogeneradosSearch represents the model behind the search form about `app\models\PorCodigosAutogenerados`.
 */
class PorCodigosAutogeneradosSearch extends PorCodigosAutogenerados
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cau_id', 'cau_valor_inicial', 'cau_incremento'], 'integer'],
            [['cau_codigo', 'cau_nombre', 'cau_prefijo'], 'safe'],
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
        $query = PorCodigosAutogenerados::find();

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
            'cau_id' => $this->cau_id,
            'cau_valor_inicial' => $this->cau_valor_inicial,
            'cau_incremento' => $this->cau_incremento,
        ]);

        $query->andFilterWhere(['like', 'cau_codigo', $this->cau_codigo])
            ->andFilterWhere(['like', 'cau_nombre', $this->cau_nombre])
            ->andFilterWhere(['like', 'cau_prefijo', $this->cau_prefijo]);

        return $dataProvider;
    }
}
