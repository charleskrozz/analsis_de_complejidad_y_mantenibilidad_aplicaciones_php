<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorEmisorCalificacion;
use yii\db\Query;
use yii\db\mssql\PDO;
/**
 * PorEmisorCalificacionSearch represents the model behind the search form about `app\models\PorEmisorCalificacion`.
 */
class PorEmisorCalificacionSearch extends PorEmisorCalificacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eca_id', 'emi_id', 'cal_id', 'eca_estado'], 'integer'],
            [['eca_valor', 'eca_fecha', 'eca_numero_resolucion', 'eca_fecha_resolucion', 'eca_fecha_actualizacion', 'eca_fecha_creacion'], 'safe'],
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
        $query = PorEmisorCalificacion::find();

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
            'eca_id' => $this->eca_id,
            'emi_id' => $this->emi_id,
            'cal_id' => $this->cal_id,
            'eca_fecha' => $this->eca_fecha,
            'eca_fecha_resolucion' => $this->eca_fecha_resolucion,
            'eca_estado' => $this->eca_estado,
            'eca_fecha_actualizacion' => $this->eca_fecha_actualizacion,
            'eca_fecha_creacion' => $this->eca_fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'eca_valor', $this->eca_valor])
            ->andFilterWhere(['like', 'eca_numero_resolucion', $this->eca_numero_resolucion]);

        return $dataProvider;
    }
    public function obtenerEstado(){
      $query = new Query;

          $query->from(['por_item_catalogo i'])
        ->select(['i.itc_nombre','i.itc_id'])
        ->innerJoin(['por_catalogo c'],'c.cat_id = i.cat_id')
        ->andWhere(['c.cat_codigo' => 'COD_ESTADO']);

      $command = $query->createCommand();
      $calificacion = $command->queryAll();

      return $calificacion;
    }
    public function getEmisorCalifById($id){
      $query = new Query;
          $query  ->select( ['ec.eca_id','ec.emi_id','ec.cal_id','ec.eca_valor',
                             'ec.eca_fecha_desde','ec.eca_fecha_hasta','ec.eca_numero_resolucion','ec.eca_fecha_resolucion','ec.eca_estado','ec.eca_fecha_actualizacion',
                             'ec.eca_fecha_creacion','it.itc_nombre as nombre_estado','ca.cal_nombre as nombre_calificadora',"case when [ec].[eca_envia_not]=1 then 'SI' else 'NO' end as eca_envia_not_desc"])
                  ->from('por_emisor_calificacion ec')
                  ->innerJoin(['por_item_catalogo it'],'it.itc_id =ec.eca_estado')
                  ->innerJoin(['por_calificadora ca'],'ca.cal_id =ec.cal_id')
                  ->where('ec.emi_id = :emiId');
          $command = $query->createCommand()
              ->bindValue(':emiId', $id, PDO::PARAM_INT);
          $rows = $command->queryAll();

          return $rows;
    }

}
