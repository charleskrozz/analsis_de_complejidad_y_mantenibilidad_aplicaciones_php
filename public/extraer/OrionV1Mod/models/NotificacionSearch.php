<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Notificacion;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * NotificacionSearch represents the model behind the search form about `app\models\Notificacion`.
 */
class NotificacionSearch extends Notificacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['not_id', 'por_id', 'not_dias'], 'integer'],
            [['not_portafolio'], 'string'],
            [['not_estado'], 'safe'],
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
        $query = Notificacion::find();

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
            'not_id' => $this->not_id,
            'por_id' => $this->por_id,
            'not_dias' => $this->not_dias,
        ]);

        $query->andFilterWhere(['like', 'not_estado', $this->not_estado]);

        return $dataProvider;
    }
    
    public function mostrarListado(){
        $query = new Query;
        $query->select(['not_id','por_id','not_dias','not_portafolio','not_color',
            "(case when not_estado = 'A' then :activo else :inactivo end) as not_estado"]) 
            ->from('port_notificacion');

        $command = $query->createCommand()
            ->bindValue(':activo', 'Activo', PDO::PARAM_STR)
            ->bindValue(':inactivo', 'Inactivo', PDO::PARAM_STR);
        $notificaciones = $command->queryAll();
        
        return $notificaciones;
    }
}
