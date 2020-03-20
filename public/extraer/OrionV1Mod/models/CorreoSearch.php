<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Correo;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * CorreoSearch represents the model behind the search form about `app\models\Correo`.
 */
class CorreoSearch extends Correo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cor_id', 'id'], 'integer'],
            [['cor_correo', 'fecha'], 'safe'],
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
        $query = Correo::find();

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
            'cor_id' => $this->cor_id,
            'id' => $this->id,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'cor_correo', $this->cor_correo]);

        return $dataProvider;
    }
    
    public function listarCorreo($ids){
        $query = new Query;
        $query  ->select('*')
                ->from('port_correo')
                ->where('id = :ids');
        $command = $query->createCommand()
            ->bindValue(':ids', $ids, PDO::PARAM_INT);
        $correos = $command->queryAll();
        
        return $correos;
    }
}
