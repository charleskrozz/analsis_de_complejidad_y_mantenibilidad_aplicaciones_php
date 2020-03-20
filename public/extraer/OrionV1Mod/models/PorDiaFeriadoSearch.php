<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorDiaFeriado;

/**
 * PorDiaFeriadoSearch represents the model behind the search form about `app\models\PorDiaFeriado`.
 */
class PorDiaFeriadoSearch extends PorDiaFeriado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dfe_id'], 'integer'],
            [['dfe_descripcion', 'dfe_fecha_inicio', 'dfe_fecha_fin', 'dfe_fecha_creacion', 'dfe_fecha_actualizacion'], 'safe'],
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
        $query = PorDiaFeriado::find();

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
            'dfe_id' => $this->dfe_id,
            'dfe_fecha_inicio' => $this->dfe_fecha_inicio,
            'dfe_fecha_fin' => $this->dfe_fecha_fin,
            'dfe_fecha_creacion' => $this->dfe_fecha_creacion,
            'dfe_fecha_actualizacion' => $this->dfe_fecha_actualizacion,
        ]);

        $query->andFilterWhere(['like', 'dfe_descripcion', $this->dfe_descripcion]);

        return $dataProvider;
    }
}
