<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorCuentaBancaria;

/**
 * PorCuentaBancariaSearch represents the model behind the search form about `app\models\PorCuentaBancaria`.
 */
class PorCuentaBancariaSearch extends PorCuentaBancaria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ctb_id', 'ctb_banco', 'ctb_estado'], 'integer'],
            [['ctb_nombre', 'ctb_numero', 'ctb_comentario', 'ctb_fecha_registro'], 'safe'],
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
        $query = PorCuentaBancaria::find();

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
            'ctb_id' => $this->ctb_id,
            'ctb_banco' => $this->ctb_banco,
            'ctb_estado' => $this->ctb_estado,
            'ctb_fecha_registro' => $this->ctb_fecha_registro,
        ]);

        $query->andFilterWhere(['like', 'ctb_nombre', $this->ctb_nombre])
            ->andFilterWhere(['like', 'ctb_numero', $this->ctb_numero])
            ->andFilterWhere(['like', 'ctb_comentario', $this->ctb_comentario]);

        return $dataProvider;
    }
}
