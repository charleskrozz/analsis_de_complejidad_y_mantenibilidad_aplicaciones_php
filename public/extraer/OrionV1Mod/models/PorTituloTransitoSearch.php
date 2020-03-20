<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorTituloTransito;
use yii\db\Query;

/**
 * PorTituloTransitoSearch represents the model behind the search form about `app\models\PorTituloTransito`.
 */
class PorTituloTransitoSearch extends PorTituloTransito
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ptt_id', 'PorId'], 'integer'],
            [['Emisor', 'Numeracion', 'Tipo', 'FechaRegistro', 'Observaciones','FechaSalida'], 'safe'],
            [['ValorNominal'], 'number'],
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
        $query = PorTituloTransito::find();

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
            'ptt_id' => $this->ptt_id,
            'ValorNominal' => $this->ValorNominal,
            'FechaRegistro' => $this->FechaRegistro,
            'PorId' => $this->PorId,
        ]);

        $query->andFilterWhere(['like', 'Emisor', $this->Emisor])
            ->andFilterWhere(['like', 'Numeracion', $this->Numeracion])
            ->andFilterWhere(['like', 'Tipo', $this->Tipo])
            ->andFilterWhere(['like', 'Observaciones', $this->Observaciones]);

        return $dataProvider;
    }
     public function mostrarListado(){
        $query = new Query;
        $porTitulosT= $query->select(['ptt_id','Emisor','Numeracion','ValorNominal',
            'Tipo','FechaRegistro','Observaciones']) 
            ->from('por_titulo_transito')
            ->all();

        return $porTitulosT;
    }
    public function consultarFecha($fechaInicio,$fechaFin,$porId){
        $query = new Query;
        $portConsultaFechaC =$query->select(['ptt_id','Emisor','Numeracion','ValorNominal',
            'Tipo','FechaRegistro','Observaciones']) 
            ->from('por_titulo_transito')
            //->where("((FechaRegistro >='".$fechaInicio."' AND FechaRegistro <='".$fechaFin."')OR ((FechaSalida is null and FechaRegistro <='".$fechaFin."') OR (FechaSalida >='".$fechaInicio."' AND FechaSalida<= '".$fechaFin."') OR (FechaSalida is not null and FechaRegistro<='".$fechaInicio."' and FechaSalida>= '".$fechaFin."'))) AND (PorId =".$porId.")")
			->where("FechaRegistro <='".$fechaInicio."' and (FechaSalida is null or FechaSalida >='".$fechaInicio."') AND (PorId =".$porId.")")
            ->all();
        
        return $portConsultaFechaC;
    }

   
}
