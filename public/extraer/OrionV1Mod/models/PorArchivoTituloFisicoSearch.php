<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorArchivoTituloFisico;

/**
 * PorArchivoTituloFisicoSearch represents the model behind the search form about `app\models\PorArchivoTituloFisico`.
 */
class PorArchivoTituloFisicoSearch extends PorArchivoTituloFisico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['atf_id', 'tpo_id'], 'integer'],
            [['atf_path', 'atf_fecha', 'atf_estado'], 'safe'],
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
        $query = PorArchivoTituloFisico::find();

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
            'atf_id' => $this->atf_id,
            'tpo_id' => $this->tpo_id,
            'atf_fecha' => $this->atf_fecha,
        ]);

        $query->andFilterWhere(['like', 'atf_path', $this->atf_path])
            ->andFilterWhere(['like', 'atf_estado', $this->atf_estado]);

        return $dataProvider;
    }
}
