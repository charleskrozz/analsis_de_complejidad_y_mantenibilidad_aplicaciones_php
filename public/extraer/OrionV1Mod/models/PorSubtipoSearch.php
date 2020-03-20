<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorSubtipo;

/**
 * PorSubtipoSearch represents the model behind the search form about `app\models\PorSubtipo`.
 */
class PorSubtipoSearch extends PorSubtipo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sbt_id', 'tvl_id', 'sbt_tipo_renta', 'sbt_estado', 'sbt_id_sicav'], 'integer'],
            [['sbt_codigo', 'sbt_nombre', 'sbt_descripcion', 'sbt_fecha_creacion', 'sbt_fecha_actualizacion'], 'safe'],
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
        $query = PorSubtipo::find();

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
            'sbt_id' => $this->sbt_id,
            'tvl_id' => $this->tvl_id,
            'sbt_tipo_renta' => $this->sbt_tipo_renta,
            'sbt_fecha_creacion' => $this->sbt_fecha_creacion,
            'sbt_fecha_actualizacion' => $this->sbt_fecha_actualizacion,
            'sbt_estado' => $this->sbt_estado,
            'sbt_id_sicav' => $this->sbt_id_sicav,
        ]);

        $query->andFilterWhere(['like', 'sbt_codigo', $this->sbt_codigo])
            ->andFilterWhere(['like', 'sbt_nombre', $this->sbt_nombre])
            ->andFilterWhere(['like', 'sbt_descripcion', $this->sbt_descripcion]);

        return $dataProvider;
    }
}
