<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorLiquidezReg;

/**
 * PorLiquidezRegSearch represents the model behind the search form about `app\models\PorLiquidezReg`.
 */
class PorLiquidezRegSearch extends PorLiquidezReg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['liq_id', 'por_id', 'usr_id', 'liq_tipo', 'liq_estado', 'liq_origen', 'liq_origen_id', 'tfl_id'], 'integer'],
            [['liq_monto'], 'number'],
            [['liq_fecha_registro', 'liq_fecha_aplicacion', 'liq_descripcion', 'liq_tipo_res'], 'safe'],
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
        $query = PorLiquidezReg::find();

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
            'liq_id' => $this->liq_id,
            'por_id' => $this->por_id,
            'usr_id' => $this->usr_id,
            'liq_tipo' => $this->liq_tipo,
            'liq_monto' => $this->liq_monto,
            'liq_estado' => $this->liq_estado,
            'liq_fecha_registro' => $this->liq_fecha_registro,
            'liq_fecha_aplicacion' => $this->liq_fecha_aplicacion,
            'liq_origen' => $this->liq_origen,
            'liq_origen_id' => $this->liq_origen_id,
            'tfl_id' => $this->tfl_id,
        ]);

        $query->andFilterWhere(['like', 'liq_descripcion', $this->liq_descripcion])
            ->andFilterWhere(['like', 'liq_tipo_res', $this->liq_tipo_res]);

        return $dataProvider;
    }
}
