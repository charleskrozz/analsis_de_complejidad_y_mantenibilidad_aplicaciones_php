<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorReportoGarantiaEfectivo;

/**
 * PorReportoGarantiaEfectivoSearch represents the model behind the search form about `app\models\PorReportoGarantiaEfectivo`.
 */
class PorReportoGarantiaEfectivoSearch extends PorReportoGarantiaEfectivo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rge_id', 'neg_id', 'rge_tipo', 'rge_estado'], 'integer'],
            [['rge_fecha_registro'], 'safe'],
            [['rge_monto'], 'number'],
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
        $query = PorReportoGarantiaEfectivo::find();

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
            'rge_id' => $this->rge_id,
            'neg_id' => $this->neg_id,
            'rge_fecha_registro' => $this->rge_fecha_registro,
            'rge_tipo' => $this->rge_tipo,
            'rge_monto' => $this->rge_monto,
            'rge_estado' => $this->rge_estado,
        ]);

        return $dataProvider;
    }
}
