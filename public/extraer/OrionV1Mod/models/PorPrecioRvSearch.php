<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorPrecioRv;
use yii\db\Query;




/**
 * PorPrecioRvSearch represents the model behind the search form about `app\models\PorPrecioRv`.
 */
class PorPrecioRvSearch extends PorPrecioRv
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prv_id'], 'integer'],
            [['prv_codigo_sic', 'prv_codigo_sic_gen', 'prv_fecha_emision', 'prv_fecha_vencimiento'], 'safe'],
            [['prv_precio', 'prv_rendimiento'], 'number'],
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
        $query = PorPrecioRv::find();

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
            'prv_id' => $this->prv_id,
            'prv_fecha_emision' => $this->prv_fecha_emision,
            'prv_fecha_vencimiento' => $this->prv_fecha_vencimiento,
            'prv_precio' => $this->prv_precio,
            'prv_rendimiento' => $this->prv_rendimiento,
        ]);

        $query->andFilterWhere(['like', 'prv_codigo_sic', $this->prv_codigo_sic])
            ->andFilterWhere(['like', 'prv_codigo_sic_gen', $this->prv_codigo_sic_gen]);

        return $dataProvider;
    }
     public function mostrarListado(){
        $query = new Query;
        $porPrecioRv = $query->select(['prv_id','prv_codigo_sic','prv_codigo_sic_gen','prv_fecha_emision',
            'prv_fecha_vencimiento','prv_precio','prv_rendimiento']) 
            ->from('por_precio_rv')
            ->all();

        return $porPrecioRv;
    }
}
