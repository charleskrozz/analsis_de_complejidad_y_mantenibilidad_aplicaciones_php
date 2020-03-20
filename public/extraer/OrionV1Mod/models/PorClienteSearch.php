<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorCliente;

/**
 * PorClienteSearch represents the model behind the search form about `app\models\PorCliente`.
 */
class PorClienteSearch extends PorCliente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cli_id', 'cli_estado'], 'integer'],
            [['cli_identificacion', 'cli_razon_social', 'cli_direcccion', 'cli_telefono', 'cli_fecha_creacion', 'cli_fecha_actualizacion'], 'safe'],
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
        $query = PorCliente::find();

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
            'cli_id' => $this->cli_id,
            'cli_estado' => $this->cli_estado,
            'cli_fecha_creacion' => $this->cli_fecha_creacion,
            'cli_fecha_actualizacion' => $this->cli_fecha_actualizacion,
        ]);

        $query->andFilterWhere(['like', 'cli_identificacion', $this->cli_identificacion])
            ->andFilterWhere(['like', 'cli_razon_social', $this->cli_razon_social])
            ->andFilterWhere(['like', 'cli_direcccion', $this->cli_direcccion])
            ->andFilterWhere(['like', 'cli_telefono', $this->cli_telefono]);

        return $dataProvider;
    }
}
