<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PorPagoVencimientoCustodia;
use yii\db\Query;

/**
 * PorPagoVencimientoCustodiaSearch represents the model behind the search form about `app\models\PorPagoVencimientoCustodia`.
 */
class PorPagoVencimientoCustodiaSearch extends PorPagoVencimientoCustodia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pvc_id'],['PorId'], 'integer'],
            [['Emisor', 'Numeracion', 'Tipo', 'FechaRegistro', 'Observaciones'] ,'safe'],
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
        $query = PorPagoVencimientoCustodia::find();

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
            'pvc_id' => $this->pvc_id,
            'ValorNominal' => $this->ValorNominal,
            'FechaRegistro' => $this->FechaRegistro,
        ]);

        $query->andFilterWhere(['like', 'Emisor', $this->Emisor])
            ->andFilterWhere(['like', 'Numeracion', $this->Numeracion])
            ->andFilterWhere(['like', 'Tipo', $this->Tipo])
            ->andFilterWhere(['like', 'Observaciones', $this->Observaciones]);

        return $dataProvider;
    }
     public function mostrarListado(){
        $query = new Query;
        $portPagosVCustodia= $query->select(['pvc_id','Emisor','Numeracion','ValorNominal',
            'Tipo','FechaRegistro','Observaciones']) 
            ->from('por_pago_vencimiento_custodia')
            ->all();

        return $portPagosVCustodia;
    }
     public function consultarFecha($fechaInicio,$fechaFin,$porId){
        $query = new Query;
        $portConsultaFechaC =$query->select(['pvc_id','Emisor','Numeracion','ValorNominal',
            'Tipo','FechaRegistro','Observaciones']) 
            ->from('por_pago_vencimiento_custodia')
            //->where("((FechaRegistro >='".$fechaInicio."' AND FechaRegistro <='".$fechaFin."')OR ((FechaSalida is null and FechaRegistro <='".$fechaFin."') OR (FechaSalida >='".$fechaInicio."' AND FechaSalida<= '".$fechaFin."') OR (FechaSalida is not null and FechaRegistro<='".$fechaInicio."' and FechaSalida>= '".$fechaFin."'))) AND (PorId =".$porId.")")
			->where("FechaRegistro <='".$fechaInicio."' and (FechaSalida is null or FechaSalida >='".$fechaInicio."') AND (PorId =".$porId.")")
            ->all();
        
        return $portConsultaFechaC;
    }
}
