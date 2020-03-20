<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorConfiguracion;

/**
 * PorConfiguracionSearch represents the model behind the search form about `app\models\PorConfiguracion`.
 */
class PorConfiguracionSearch extends PorConfiguracion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['con_id', 'por_id', 'con_enable_valoraciones', 'con_rf', 'con_rfcc'], 'integer'],
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
        $query = PorConfiguracion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'con_id' => $this->con_id,
            'por_id' => $this->por_id,
            'con_enable_valoraciones' => $this->con_enable_valoraciones,
            'con_rf' => $this->con_rf,
            'con_rfcc' => $this->con_rfcc,
        ]);

        return $dataProvider;
    }
}
