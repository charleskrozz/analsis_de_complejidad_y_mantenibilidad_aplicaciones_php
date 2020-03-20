<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Parametro;
use yii\db\Query;

/**
 * ParametroSearch represents the model behind the search form about `app\models\Parametro`.
 */
class ParametroSearch extends Parametro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['par_id', 'usu_id'], 'integer'],
            [['par_nombre', 'par_valor', 'par_fecha', 'par_nemonico'], 'safe'],
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
        $query = Parametro::find();

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
            'par_id' => $this->par_id,
            'par_fecha' => $this->par_fecha,
            'usu_id' => $this->usu_id,
        ]);

        $query->andFilterWhere(['like', 'par_nombre', $this->par_nombre])
            ->andFilterWhere(['like', 'par_valor', $this->par_valor])
            ->andFilterWhere(['like', 'par_nemonico', $this->par_nemonico]);

        return $dataProvider;
    }
    
    public function paramNemonico($nemonico){
        $query = new Query;
        $param = $query->select('par_valor')
                ->from('port_parametro')
                ->where('par_nemonico = :nemonico', [':nemonico' => $nemonico])
                ->scalar();
        return $param;
    }
    
    public function mostrarListado(){
        $query = new Query;
        $parametros = $query->select(['par_id','par_nombre','par_valor','usu_id','par_nemonico',
            'CONVERT(DATE, par_fecha, 121) as par_fecha']) 
            ->from('port_parametro')
            ->all();

        return $parametros;
    }
}
