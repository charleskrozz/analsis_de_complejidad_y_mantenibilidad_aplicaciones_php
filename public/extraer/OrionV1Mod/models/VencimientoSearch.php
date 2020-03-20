<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vencimiento;

/**
 * VencimientoSearch represents the model behind the search form about `app\models\Vencimiento`.
 */
class VencimientoSearch extends Vencimiento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nve_id', 'nve_lim_menor', 'nve_lim_mayor', 'nve_orden'], 'integer'],
            [['nve_nombre', 'nve_color'], 'safe'],
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
        $query = Vencimiento::find();

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
            'nve_id' => $this->nve_id,
            'nve_lim_menor' => $this->nve_lim_menor,
            'nve_lim_mayor' => $this->nve_lim_mayor,
            'nve_orden' => $this->nve_orden,
        ]);

        $query->andFilterWhere(['like', 'nve_nombre', $this->nve_nombre])
            ->andFilterWhere(['like', 'nve_color', $this->nve_color]);

        return $dataProvider;
    }
    
    public function listarVencimiento($params){
        $where = "";
        $values = (intval($params['filterscount']) > 0)? $this->buildWhere($params['filterscount'], $params['allparams'], $where) : [];       
        $ingresos = Yii::$app->db->createCommand("SELECT * FROM port_not_vencimiento ".$where." ORDER BY ".
                $params['sortdatafield'].' '.$params['sortorder']." OFFSET ".
                (intval($params['pagesize'])*  intval($params['page']))." ROWS FETCH NEXT ".$params['pagesize']." ROWS ONLY")
            ->bindValues($values)
            ->queryAll();
        
        return $ingresos;
    }
    
    public function contarVencimiento($params){
        $where = "";
        $values = (intval($params['filterscount']) > 0)? $this->buildWhere($params['filterscount'], $params['allparams'], $where) : [];        
        $total = Yii::$app->db->createCommand("SELECT count(*) FROM port_not_vencimiento ".$where)
            ->bindValues($values)
            ->queryScalar();
        
        return $total;
    }
    
    private function buildWhere($filterscount, $params, &$where){
        $where = " WHERE (";
	    $tmpdatafield = "";
        $tmpfilteroperator = "";
        $vals = [];
        for ($i = 0; $i < $filterscount; $i++){
            $filtervalue = $params["filtervalue" . $i];
            $filtercondition = $params["filtercondition" . $i];
            $filterdatafield = $params["filterdatafield" . $i];
            $filteroperator = $params["filteroperator" . $i];
            if ($tmpdatafield == ""){
		      $tmpdatafield = $filterdatafield;
            }else if ($tmpdatafield <> $filterdatafield){
		      $where.= ")AND(";
            }else if ($tmpdatafield == $filterdatafield){
                if ($tmpfilteroperator == 0){
                    $where.= " AND ";
                } else 
                            $where.= " OR ";
            }
            switch ($filtercondition){
            case "CONTAINS":
                $condition = " LIKE ";
                $value = "%{$filtervalue}%";
                break;
            case "DOES_NOT_CONTAIN":
                $condition = " NOT LIKE ";
                $value = "%{$filtervalue}%";
                break;
            case "EQUAL":
                $condition = " = ";
                $value = $filtervalue;
                break;
            case "NOT_EQUAL":
                $condition = " <> ";
                $value = $filtervalue;
                break;
            case "GREATER_THAN":
                $condition = " > ";
                $value = $filtervalue;
                break;
            case "LESS_THAN":
                $condition = " < ";
                $value = $filtervalue;
                break;
            case "GREATER_THAN_OR_EQUAL":
                $condition = " >= ";
                $value = $filtervalue;
                break;
            case "LESS_THAN_OR_EQUAL":
                $condition = " <= ";
                $value = $filtervalue;
                break;
            case "STARTS_WITH":
                $condition = " LIKE ";
                $value = "{$filtervalue}%";
                break;
            case "ENDS_WITH":
                $condition = " LIKE ";
                $value = "%{$filtervalue}";
                break;
            case "NULL":
                $condition = " IS NULL ";
                $value = "%{$filtervalue}%";
                break;
            case "NOT_NULL":
                $condition = " IS NOT NULL ";
                $value = "%{$filtervalue}%";
                break;
            }
            $vals[':val'.$i] = $value;

            $where.= " " . $filterdatafield . $condition . " :val".$i." ";
            if ($i == $filterscount - 1){
                $where.= ")";
            }
            $tmpfilteroperator = $filteroperator;
            $tmpdatafield = $filterdatafield;
        }
	
        return $vals;
    }
}
