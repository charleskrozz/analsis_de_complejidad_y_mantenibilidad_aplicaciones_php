<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorTitulosCalificacion;
use yii\db\Query;
use yii\db\mssql\PDO;

/**
 * PorTitulosCalificacionSearch represents the model behind the search form about `app\models\PorTitulosCalificacion`.
 */
class PorTitulosCalificacionSearch extends PorTitulosCalificacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tca_id', 'tiv_id', 'cal_id', 'tca_estado'], 'integer'],
            [['tca_fecha_desde', 'tca_fecha_hasta', 'tca_valor', 'tca_numero_resolucion', 'tca_fecha_resolucion', 'tca_fecha_actualizacion', 'tca_fecha_creacion'], 'safe'],
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
        $query = PorTitulosCalificacion::find();

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
            'tca_id' => $this->tca_id,
            'tiv_id' => $this->tiv_id,
            'cal_id' => $this->cal_id,
            'tca_fecha_desde' => $this->tca_fecha_desde,
            'tca_fecha_hasta' => $this->tca_fecha_hasta,
            'tca_fecha_resolucion' => $this->tca_fecha_resolucion,
            'tca_estado' => $this->tca_estado,
            'tca_fecha_actualizacion' => $this->tca_fecha_actualizacion,
            'tca_fecha_creacion' => $this->tca_fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'tca_valor', $this->tca_valor])
            ->andFilterWhere(['like', 'tca_numero_resolucion', $this->tca_numero_resolucion]);

        return $dataProvider;
    }
	public function getTituloCalifById($id){
      $query = new Query;
          $query  ->select( ['ec.tca_id','ec.tiv_id','ec.cal_id','ec.tca_valor',
                             'ec.tca_fecha_desde','ec.tca_fecha_hasta','ec.tca_numero_resolucion','ec.tca_fecha_resolucion','ec.tca_estado','ec.tca_fecha_actualizacion',
                             'ec.tca_fecha_creacion','it.itc_nombre as nombre_estado','ca.cal_nombre as nombre_calificadora',"case when [ec].[tca_envia_not]=1 then 'SI' else 'NO' end as tca_envia_not_desc"])
                  ->from('por_titulos_calificacion ec')
                  ->innerJoin(['por_calificadora ca'],'ca.cal_id =ec.cal_id')
                  ->innerJoin(['por_item_catalogo it'],'it.itc_id =ec.tca_estado')
                  ->where('ec.tiv_id = :tivId');
          $command = $query->createCommand()
              ->bindValue(':tivId', $id, PDO::PARAM_INT);
          $rows = $command->queryAll();

          return $rows;
    }
}
