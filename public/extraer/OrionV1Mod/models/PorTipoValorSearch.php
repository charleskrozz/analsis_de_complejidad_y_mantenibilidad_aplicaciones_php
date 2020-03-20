<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorTipoValor;

/**
 * PorTipoValorSearch represents the model behind the search form about `app\models\PorTipoValor`.
 */
class PorTipoValorSearch extends PorTipoValor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tvl_id', 'tvl_tipo_renta', 'tvl_estado', 'tvl_generico', 'tvl_inscrito_mv', 'tvl_con_cupones', 'tvl_con_interes', 'tvl_codigo_gen_sic', 'tvl_grupo_concentracion'], 'integer'],
            [['tvl_codigo', 'tvl_nombre', 'tvl_descripcion', 'tvl_fecha_creacion', 'tvl_fecha_actualizacion', 'tvl_tipo_generico', 'tvl_sctit_pattern'], 'safe'],
            [['tvl_con_interes_probabilidad', 'tvl_con_cupones_probabilidad'], 'number'],
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
        $query = PorTipoValor::find();

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
            'tvl_id' => $this->tvl_id,
            'tvl_tipo_renta' => $this->tvl_tipo_renta,
            'tvl_fecha_creacion' => $this->tvl_fecha_creacion,
            'tvl_fecha_actualizacion' => $this->tvl_fecha_actualizacion,
            'tvl_estado' => $this->tvl_estado,
            'tvl_generico' => $this->tvl_generico,
            'tvl_inscrito_mv' => $this->tvl_inscrito_mv,
            'tvl_con_cupones' => $this->tvl_con_cupones,
            'tvl_con_interes' => $this->tvl_con_interes,
            'tvl_con_interes_probabilidad' => $this->tvl_con_interes_probabilidad,
            'tvl_con_cupones_probabilidad' => $this->tvl_con_cupones_probabilidad,
            'tvl_codigo_gen_sic' => $this->tvl_codigo_gen_sic,
            'tvl_grupo_concentracion' => $this->tvl_grupo_concentracion,
        ]);

        $query->andFilterWhere(['like', 'tvl_codigo', $this->tvl_codigo])
            ->andFilterWhere(['like', 'tvl_nombre', $this->tvl_nombre])
            ->andFilterWhere(['like', 'tvl_descripcion', $this->tvl_descripcion])
            ->andFilterWhere(['like', 'tvl_tipo_generico', $this->tvl_tipo_generico])
            ->andFilterWhere(['like', 'tvl_sctit_pattern', $this->tvl_sctit_pattern]);

        return $dataProvider;
    }
}
