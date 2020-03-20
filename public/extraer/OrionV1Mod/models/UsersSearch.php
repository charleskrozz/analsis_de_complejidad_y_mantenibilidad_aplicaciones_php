<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * UsersSearch represents the model behind the search form about `app\models\Users`.
 */
class UsersSearch extends Users
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_state', 'user_first_time', 'per_id'], 'integer'],
            [['username', 'password', 'auth_key', 'password_reset_token', 'user_identify', 'user_date_expiration'], 'safe'],
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
        $query = Users::find();

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
            'id' => $this->id,
            'user_state' => $this->user_state,
            'user_first_time' => $this->user_first_time,
            'user_date_expiration' => $this->user_date_expiration,
            'per_id' => $this->per_id,
            'per_id' => $this->user_exp_date,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'user_identify', $this->user_identify])
            ->andFilterWhere(['like', 'user_first_names', $this->user_first_names])
            ->andFilterWhere(['like', 'user_last_names', $this->user_last_names]);

        return $dataProvider;
    }
    
    public function listadoUsuarios(){
        $query = new Query;
        $query  ->select(['username','user_first_names','user_last_names','user_identify','id',
            '(case when user_state = 1 then :activo else :inactivo end) as estado', 'per_nombre']) 
            ->from('port_users u')
            ->innerJoin('port_perfil p', 'u.per_id=p.per_id');
        
        $command = $query->createCommand()
            ->bindValue(':activo', 'Activo', PDO::PARAM_STR)
            ->bindValue(':inactivo', 'Inactivo', PDO::PARAM_STR);
        $usuarios = $command->queryAll();

        return $usuarios;
    }
    
    public function comprobarUsuario($usuario){
        $query = new Query;
        $query  ->select('*')
                ->from('port_users')
                ->where('username = :usuario');
        $command = $query->createCommand()
            ->bindValue(':usuario', $usuario, PDO::PARAM_STR);
        $row = $command->queryRow();
        
        return $row;
    }
}
