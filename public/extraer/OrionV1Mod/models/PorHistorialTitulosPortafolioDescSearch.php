<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorHistorialTitulosPortafolioDesc;

/**
 * PorHistorialTitulosPortafolioDescSearch represents the model behind the search form about `app\models\PorHistorialTitulosPortafolioDesc`.
 */
class PorHistorialTitulosPortafolioDescSearch extends PorHistorialTitulosPortafolioDesc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['htp_id', 'htp_origen', 'htp_id_origen'], 'integer'],
            [['htp_monto', 'htp_saldo_ant', 'htp_saldo_act'], 'number'],
            [['htp_fecha'], 'safe'],
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
        $query = PorHistorialTitulosPortafolioDesc::find();

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
            'htp_id' => $this->htp_id,
            'htp_monto' => $this->htp_monto,
            'htp_fecha' => $this->htp_fecha,
            'htp_origen' => $this->htp_origen,
            'htp_id_origen' => $this->htp_id_origen,
            'htp_saldo_ant' => $this->htp_saldo_ant,
            'htp_saldo_act' => $this->htp_saldo_act,
        ]);

        return $dataProvider;
    }
}
