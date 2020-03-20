<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Perfil;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * PerfilSearch represents the model behind the search form about `app\models\Perfil`.
 */
class PerfilSearch extends Perfil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_id', 'per_estado'], 'integer'],
            [['per_nombre', 'per_descripcion', 'per_fecha_creacion'], 'safe'],
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
        $query = Perfil::find();

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
            'per_id' => $this->per_id,
            'per_estado' => $this->per_estado,
            'per_fecha_creacion' => $this->per_fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'per_nombre', $this->per_nombre])
            ->andFilterWhere(['like', 'per_descripcion', $this->per_descripcion]);

        return $dataProvider;
    }
    
    public function mostrarListado(){
        $query = new Query;
        $query  ->select(['per_nombre','per_id',
            'per_descripcion','CONVERT(DATE, per_fecha_creacion, 121) as per_fecha_creacion',
            '(case when per_estado = 1 then :activo else :inactivo end) as estado']) 
            ->from('port_perfil');
        
            $command = $query->createCommand()
                ->bindValue(':activo', 'Activo', PDO::PARAM_STR)
                ->bindValue(':inactivo', 'Inactivo', PDO::PARAM_STR);
        $perfiles = $command->queryAll();

        return $perfiles;
    }
}
