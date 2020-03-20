<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorGrupoInversion;

/**
 * PorGrupoInversionSearch represents the model behind the search form about `app\models\PorGrupoInversion`.
 */
class PorGrupoInversionSearch extends PorGrupoInversion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grp_id', 'grp_padre_id', 'grp_nivel', 'grp_detalle', 'grp_estado', 'grp_id_sicav'], 'integer'],
            [['grp_descripcion'], 'safe'],
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
        $query = PorGrupoInversion::find();

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
            'grp_padre_id' => $this->grp_padre_id,
            'grp_nivel' => $this->grp_nivel,
            'grp_detalle' => $this->grp_detalle,
            'grp_estado' => $this->grp_estado,
            'grp_id_sicav' => $this->grp_id_sicav,
        ]);

        $query->andFilterWhere(['like', 'grp_descripcion', $this->grp_descripcion]);

        return $dataProvider;
    }
}
