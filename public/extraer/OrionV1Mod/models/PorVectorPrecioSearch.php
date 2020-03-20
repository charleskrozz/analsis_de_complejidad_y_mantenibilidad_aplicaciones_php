<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorVectorPrecio;

/**
 * PorVectorPrecioSearch represents the model behind the search form about `app\models\PorVectorPrecio`.
 */
class PorVectorPrecioSearch extends PorVectorPrecio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vpr_id', 'TivId', 'tiv_id_sicav'], 'integer'],
            [['FechaPrecio', 'Emisor', 'TipoValor', 'FechaEmision', 'FechaVencimiento'], 'safe'],
            [['TasaValor', 'Precio', 'RendimientoEquivalente'], 'number'],
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
        $query = PorVectorPrecio::find();

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
            'vpr_id' => $this->vpr_id,
            'TivId' => $this->TivId,
            'FechaPrecio' => $this->FechaPrecio,
            'FechaEmision' => $this->FechaEmision,
            'FechaVencimiento' => $this->FechaVencimiento,
            'TasaValor' => $this->TasaValor,
            'Precio' => $this->Precio,
            'tiv_id_sicav' => $this->tiv_id_sicav,
            'RendimientoEquivalente' => $this->RendimientoEquivalente,
        ]);

        $query->andFilterWhere(['like', 'Emisor', $this->Emisor])
            ->andFilterWhere(['like', 'TipoValor', $this->TipoValor]);

        return $dataProvider;
    }
}
