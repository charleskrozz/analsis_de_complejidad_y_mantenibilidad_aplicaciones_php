<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorPortafolio;

/**
 * PorPortafolioSearch represents the model behind the search form about `app\models\PorPortafolio`.
 */
class PorPortafolioSearch extends PorPortafolio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['por_id', 'cli_id', 'por_estado'], 'integer'],
            [['por_codigo', 'por_comentario', 'por_fecha_vigencia', 'por_fecha_creacion', 'por_fecha_actualizacion'], 'safe'],
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
        $query = PorPortafolio::find();

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
            'por_id' => $this->por_id,
            'cli_id' => $this->cli_id,
            'por_estado' => $this->por_estado,
            'por_fecha_vigencia' => $this->por_fecha_vigencia,
            'por_fecha_creacion' => $this->por_fecha_creacion,
            'por_fecha_actualizacion' => $this->por_fecha_actualizacion,
        ]);

        $query->andFilterWhere(['like', 'por_codigo', $this->por_codigo])
            ->andFilterWhere(['like', 'por_comentario', $this->por_comentario]);

        return $dataProvider;
    }
}
