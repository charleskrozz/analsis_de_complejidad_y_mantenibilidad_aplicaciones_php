<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioMail;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * UsuariomailSearch represents the model behind the search form about `app\models\UsuarioMail`.
 */
class UsuariomailSearch extends UsuarioMail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pue_id', 'pue_principal', 'pue_habilitado', 'com_id', 'por_id'], 'integer'],
            [['pue_email'], 'safe'],
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
        $query = UsuarioMail::find();

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
            'pue_id' => $this->pue_id,
            'pue_principal' => $this->pue_principal,
            'pue_habilitado' => $this->pue_habilitado,
            'com_id' => $this->com_id,
            'por_id' => $this->por_id,
        ]);

        $query->andFilterWhere(['like', 'pue_email', $this->pue_email]);

        return $dataProvider;
    }
    
    public function listarCorreo($idport, $idCom, $iduu){
        $query = new Query;
        $query  ->select('*')
                ->from('port_usuario_email')
                ->where('com_id = :idCom and por_id= :idPor and usr_id= :idUsr');
        $command = $query->createCommand()
            ->bindValue(':idCom', $idCom, PDO::PARAM_INT)
            ->bindValue(':idPor', $idport, PDO::PARAM_INT)
            ->bindValue(':idUsr', $iduu, PDO::PARAM_INT);
        $correos = $command->queryAll();
        
        return $correos;
    }
}
