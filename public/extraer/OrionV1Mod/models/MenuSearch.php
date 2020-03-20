<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Menu;
use yii\db\Query;

/**
 * MenuSearch represents the model behind the search form about `app\models\Menu`.
 */
class MenuSearch extends Menu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['men_id', 'men_padre', 'men_estado', 'men_orden'], 'integer'],
            [['men_nombre', 'men_path', 'men_descripcion', 'men_fecha_creacion'], 'safe'],
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
        $query = Menu::find();

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
            'men_id' => $this->men_id,
            'men_padre' => $this->men_padre,
            'men_estado' => $this->men_estado,
            'men_fecha_creacion' => $this->men_fecha_creacion,
            'men_orden' => $this->men_orden,
        ]);

        $query->andFilterWhere(['like', 'men_nombre', $this->men_nombre])
            ->andFilterWhere(['like', 'men_path', $this->men_path])
            ->andFilterWhere(['like', 'men_descripcion', $this->men_descripcion]);

        return $dataProvider;
    }
    
    public function menusActivos($ids){
        $query = new Query;
        $menus = $query->select(['m.men_id', 'm.men_nombre', 'm.men_padre','m.men_descripcion','p.per_men_id',
            'men_per_consulta', 'men_per_actualizar', 'men_per_borrar', 'men_per_crear', 'm.men_orden'])
                ->distinct()
                ->from('port_menu m')
                ->leftJoin('port_menu_perfil p', 'm.men_id = p.men_id and p.per_id = :perId', [':perId' => $ids])
                ->where('m.men_estado = :estado', [':estado' => 1])
                ->orderBy(['m.men_padre' => SORT_ASC, 'm.men_orden' => SORT_DESC])
                ->all();
        
        return $menus;
    }
    
    public static function menuPerfil($id){
        $query = new Query;
        $menus = $query->select('m.*, mp.men_per_crear, mp.men_per_consulta, mp.men_per_actualizar, mp.men_per_borrar')
                ->from("port_users u")
                ->innerJoin("port_menu_perfil mp", "u.per_id=mp.per_id")
                ->innerJoin("port_menu m", "mp.men_id=m.men_id")
                ->where("u.id= :ids and mp.men_per_estado=1 and m.men_estado=1", [':ids' => $id])
                ->orderBy(['m.men_orden' => SORT_ASC])
                ->all();
        
        return $menus;
    }
}
