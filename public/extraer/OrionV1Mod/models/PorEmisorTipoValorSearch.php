<?php

namespace app\models;

use yii\db\Query;
use \yii\db\mssql\PDO;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorEmisorTipoValor;

/**
 * PorEmisorTipoValorSearch represents the model behind the search form about `app\models\PorEmisorTipoValor`.
 */
class PorEmisorTipoValorSearch extends PorEmisorTipoValor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['etv_id', 'emi_id', 'tvl_id', 'etv_codigo_sic2', 'etv_codigo_gen_sic', 'etv_id_sicav'], 'integer'],
            [['etv_codigo_sic', 'etv_resolucion_sic', 'etv_fecha_rmv', 'etv_fecha_resolucion_sic', 'etv_fecha_creacion', 'etv_fecha_actualizacion', 'etv_camara'], 'safe'],
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
        $query = PorEmisorTipoValor::find();

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
            'etv_id' => $this->etv_id,
            'emi_id' => $this->emi_id,
            'tvl_id' => $this->tvl_id,
            'etv_fecha_rmv' => $this->etv_fecha_rmv,
            'etv_fecha_resolucion_sic' => $this->etv_fecha_resolucion_sic,
            'etv_codigo_sic2' => $this->etv_codigo_sic2,
            'etv_codigo_gen_sic' => $this->etv_codigo_gen_sic,
            'etv_fecha_creacion' => $this->etv_fecha_creacion,
            'etv_fecha_actualizacion' => $this->etv_fecha_actualizacion,
            'etv_id_sicav' => $this->etv_id_sicav,
        ]);

        $query->andFilterWhere(['like', 'etv_codigo_sic', $this->etv_codigo_sic])
            ->andFilterWhere(['like', 'etv_resolucion_sic', $this->etv_resolucion_sic])
            ->andFilterWhere(['like', 'etv_camara', $this->etv_camara]);

        return $dataProvider;
    }
	public function getEmisorTipoValorById($id){
      $query = new Query;
          $query  ->select( ['et.etv_id','et.emi_id','et.tvl_id','tv.tvl_nombre','etv_fecha_rmv','etv_fecha_resolucion_sic','etv_fecha_creacion','etv_codigo_sic2','etv_codigo_gen_sic'])
                  ->from('por_emisor_tipo_valor et')
                  ->innerJoin(['por_tipo_valor tv'],'tv.tvl_id =et.tvl_id')
                  ->where('et.emi_id = :emiId');
          $command = $query->createCommand()
              ->bindValue(':emiId', $id, PDO::PARAM_INT);
          $rows = $command->queryAll();

          return $rows;
    }
}
