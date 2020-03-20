<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioPortafolio;
use yii\db\Query;
use yii\db\mssql\PDO;

/**
 * UsuarioPortafolioSearch represents the model behind the search form about `app\models\UsuarioPortafolio`.
 */
class UsuarioPortafolioSearch extends UsuarioPortafolio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['upa_id', 'usr_id', 'com_id', 'por_id', 'upa_principal'], 'integer'],
            [['upa_estado', 'upa_ultima_act', 'upa_nombre_comitente', 'upa_codigo'], 'safe'],
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
        $query = UsuarioPortafolio::find();

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
            'upa_id' => $this->upa_id,
            'usr_id' => $this->usr_id,
            'com_id' => $this->com_id,
            'por_id' => $this->por_id,
            'upa_ultima_act' => $this->upa_ultima_act,
            'upa_principal' => $this->upa_principal,
        ]);

        $query->andFilterWhere(['like', 'upa_estado', $this->upa_estado])
            ->andFilterWhere(['like', 'upa_nombre_comitente', $this->upa_nombre_comitente])
            ->andFilterWhere(['like', 'upa_codigo', $this->upa_codigo]);

        return $dataProvider;
    }
    
    public function usuconPortafolio($usuId){
        $query = new Query;
        $query  ->select('*')
                ->from('port_usuario_portafolio')
                ->where('usr_id = :usuId');
        $command = $query->createCommand()
            ->bindValue(':usuId', $usuId, PDO::PARAM_INT);
        $rows = $command->queryAll();
        
        return $rows;
    }
}
