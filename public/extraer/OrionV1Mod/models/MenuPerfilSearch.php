<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MenuPerfil;
use yii\db\Query;

/**
 * MenuPerfilSearch represents the model behind the search form about `app\models\MenuPerfil`.
 */
class MenuPerfilSearch extends MenuPerfil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_men_id', 'men_id', 'per_id', 'men_per_estado'], 'integer'],
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
        $query = MenuPerfil::find();

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
            'per_men_id' => $this->per_men_id,
            'men_id' => $this->men_id,
            'per_id' => $this->per_id,
            'men_per_estado' => $this->men_per_estado,
        ]);

        return $dataProvider;
    }
    
    public function menusAsignados($perfId){
        $query = new Query;
        $menAsignados = $query->select('*')
                ->from('port_menu_perfil')
                ->where('per_id = :perfId', [':perfId' => $perfId])
                ->all();
        
        return $menAsignados;
    }
}
