<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorNotificacionesDiarias;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * PorNotificacionesDiariasSearch represents the model behind the search form about `app\models\PorNotificacionesDiarias`.
 */
class PorNotificacionesDiariasSearch extends PorNotificacionesDiarias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pno_id', 'por_id'], 'integer'],
            [['pno_fecha_registro'], 'safe'],
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
        $query = PorNotificacionesDiarias::find();

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
            'pno_id' => $this->pno_id,
            'por_id' => $this->por_id,
            'pno_fecha_registro' => $this->pno_fecha_registro,
        ]);

        return $dataProvider;
    }
    public function mostrarListado(){
        $query = new Query;
        $porNotificacionesD =$query->select(['pno_id','n.por_id','pno_fecha_registro','upa_codigo'])
           ->from('por_notificaciones_diarias n')
           ->leftJoin('port_usuario_portafolio up','up.por_id=n.por_id')
           ->all();
        return $porNotificacionesD;
    }
}
