<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorGrupoReporte318;
use yii\db\Query;

/**
 * PorGrupoReporte318Search represents the model behind the search form about `app\models\PorGrupoReporte318`.
 */
class PorGrupoReporte318Search extends PorGrupoReporte318 {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['fgp_id', 'fgp_orden', 'fgp_padre'], 'integer'],
                [['fgp_codigo', 'fgp_nombre', 'fgp_descripcion', 'fgp_estado', 'fgp_color', 'fgp_formula'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = PorGrupoReporte318::find();

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
            'fgp_id' => $this->fgp_id,
            'fgp_orden' => $this->fgp_orden,
            'fgp_padre' => $this->fgp_padre,
        ]);

        $query->andFilterWhere(['like', 'fgp_codigo', $this->fgp_codigo])
                ->andFilterWhere(['like', 'fgp_nombre', $this->fgp_nombre])
                ->andFilterWhere(['like', 'fgp_descripcion', $this->fgp_descripcion])
                ->andFilterWhere(['like', 'fgp_estado', $this->fgp_estado])
                ->andFilterWhere(['like', 'fgp_color', $this->fgp_color])
                ->andFilterWhere(['like', 'fgp_formula', $this->fgp_formula]);

        return $dataProvider;
    }

    public function mostrarListado() {
        $query = new Query;
        $grupoReporte318 = $query->select(['fgp_id', 'fgp_codigo', 'fgp_nombre', 'fgp_descripcion', 'fgp_estado','fgp_orden',
                    'fgp_color','fgp_formula'])
                ->from('por_grupo_reporte318')
                ->all();

        return $grupoReporte318;
    }

}
