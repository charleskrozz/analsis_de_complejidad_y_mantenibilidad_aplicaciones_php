<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorEmisor;

/**
 * PorEmisorSearch represents the model behind the search form about `app\models\PorEmisor`.
 */
class PorEmisorSearch extends PorEmisor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emi_id', 'emi_codigo_sic2', 'emi_sector', 'emi_estado'], 'integer'],
            [['emi_codigo', 'emi_nombre','emi_tipo_emisor', 'emi_descripcion', 'emi_codigo_sic', 'emi_nombre_personalizado', 'emi_fecha_creacion', 'emi_fecha_actualizacion'], 'safe'],
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
        $query = PorEmisor::find();

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
            'emi_id' => $this->emi_id,
            'emi_tipo_emisor' => $this->emi_tipo_emisor,
            'emi_codigo_sic2' => $this->emi_codigo_sic2,
            'emi_sector' => $this->emi_sector,
            'emi_estado' => $this->emi_estado,
            'emi_fecha_creacion' => $this->emi_fecha_creacion,
            'emi_fecha_actualizacion' => $this->emi_fecha_actualizacion,
        ]);

        $query->andFilterWhere(['like', 'emi_codigo', $this->emi_codigo])
            ->andFilterWhere(['like', 'emi_nombre', $this->emi_nombre])
            ->andFilterWhere(['like', 'emi_descripcion', $this->emi_descripcion])
            ->andFilterWhere(['like', 'emi_codigo_sic', $this->emi_codigo_sic])
            ->andFilterWhere(['like', 'emi_nombre_personalizado', $this->emi_nombre_personalizado]);

        return $dataProvider;
    }
}
