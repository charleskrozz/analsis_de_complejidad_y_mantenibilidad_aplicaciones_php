<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorCalificadora;

/**
 * PorCalificadoraSearch represents the model behind the search form about `app\models\PorCalificadora`.
 */
class PorCalificadoraSearch extends PorCalificadora
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cal_id', 'cal_estado'], 'integer'],
            [['cal_nombre', 'cal_codigo','cal_descripcion_corta','cal_fecha_actualizacion', 'cal_fecha_creacion'], 'safe'],
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
        $query = PorCalificadora::find();

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
            'cal_id' => $this->cal_id,
            'cal_estado' => $this->cal_estado,
            'cal_fecha_actualizacion' => $this->cal_fecha_actualizacion,
            'cal_fecha_creacion' => $this->cal_fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'cal_nombre', $this->cal_nombre])
            ->andFilterWhere(['like', 'cal_codigo', $this->cal_codigo])
              ->andFilterWhere(['like', 'cal_descripcion_corta', $this->cal_codigo]);

        return $dataProvider;
    }
}
