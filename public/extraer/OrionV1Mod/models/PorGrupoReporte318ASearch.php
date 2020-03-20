<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorGrupoReporte318A;
use yii\db\Query;

/**
 * PorGrupoReporte318ASearch represents the model behind the search form about `app\models\PorGrupoReporte318A`.
 */
class PorGrupoReporte318ASearch extends PorGrupoReporte318A
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grp_id', 'grp_orden'], 'integer'],
            [['grp_codigo', 'grp_nombre', 'grp_descripcion', 'grp_estado'], 'safe'],
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
        $query = PorGrupoReporte318A::find();

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
            'grp_id' => $this->grp_id,
            'grp_orden' => $this->grp_orden,
        ]);

        $query->andFilterWhere(['like', 'grp_codigo', $this->grp_codigo])
            ->andFilterWhere(['like', 'grp_nombre', $this->grp_nombre])
            ->andFilterWhere(['like', 'grp_descripcion', $this->grp_descripcion])
            ->andFilterWhere(['like', 'grp_estado', $this->grp_estado]);

        return $dataProvider;
    }
    public function mostrarListado() {
        $query = new Query;
        $grupoReporte318a = $query->select(['grp_id', 'grp_codigo', 'grp_nombre', 'grp_descripcion', 'grp_estado','grp_orden'
                 ])
                ->from('por_grupo_reporte318_a')
                ->all();

        return $grupoReporte318a;
    }
}
