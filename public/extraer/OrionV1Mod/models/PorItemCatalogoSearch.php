<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorItemCatalogo;
use yii\db\Query;
use yii\db\mssql\PDO;

/**
 * PorItemCatalogoSearch represents the model behind the search form about `app\models\PorItemCatalogo`.
 */
class PorItemCatalogoSearch extends PorItemCatalogo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itc_id', 'cat_id', 'itc_padre_id', 'itc_estado', 'itc_editable', 'itc_orden', 'itc_codigo_sic'], 'integer'],
            [['itc_descripcion', 'itc_nombre', 'itc_codigo', 'itc_valor', 'itc_fecha_creacion'], 'safe'],
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
        $query = PorItemCatalogo::find();

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
            'itc_id' => $this->itc_id,
            'cat_id' => $this->cat_id,
            'itc_padre_id' => $this->itc_padre_id,
            'itc_estado' => $this->itc_estado,
            'itc_fecha_creacion' => $this->itc_fecha_creacion,
            'itc_editable' => $this->itc_editable,
            'itc_orden' => $this->itc_orden,
            'itc_codigo_sic' => $this->itc_codigo_sic,
        ]);

        $query->andFilterWhere(['like', 'itc_descripcion', $this->itc_descripcion])
            ->andFilterWhere(['like', 'itc_nombre', $this->itc_nombre])
            ->andFilterWhere(['like', 'itc_codigo', $this->itc_codigo])
            ->andFilterWhere(['like', 'itc_valor', $this->itc_valor]);

        return $dataProvider;
    }
    public function obtenerEstado(){
      $query = new Query;

          $query->from(['por_item_catalogo i'])
        ->select(['i.itc_nombre','i.itc_id'])
        ->innerJoin(['por_catalogo c'],'c.cat_id = i.cat_id')
        ->andWhere(['c.cat_codigo' => 'COD_ESTADO']);

      $command = $query->createCommand();
      $catalogo = $command->queryAll();

      return $catalogo;
    }
	public function getItemsCatalogById($id){
		$query = new Query;
        $query  ->select( ['i.itc_id','i.cat_id','i.itc_padre_id','i.itc_descripcion',
                         'i.itc_nombre','i.itc_codigo','i.itc_valor','i.itc_estado',
                         'i.itc_fecha_creacion','i.itc_editable','i.itc_orden',
                         'i.itc_codigo_sic','it.itc_nombre as nombre_estado','itp.itc_nombre as nombre_padre'])
                ->from('por_item_catalogo i')
                ->innerJoin(['por_item_catalogo it'],'it.itc_id =i.itc_estado')
                ->leftJoin(['por_item_catalogo itp'],'itp.itc_id =i.itc_padre_id')
                ->where('i.cat_id = :catId');
        $command = $query->createCommand()
            ->bindValue(':catId', $id, PDO::PARAM_INT);
        $rows = $command->queryAll();

        return $rows;
	}
}
