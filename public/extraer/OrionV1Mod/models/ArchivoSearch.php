<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Archivo;

/**
 * ArchivoSearch represents the model behind the search form about `app\models\Archivo`.
 */
class ArchivoSearch extends Archivo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arc_id', 'usu_id'], 'integer'],
            [['arc_nombre', 'arc_descripcion_corta', 'arc_descripcion_larga', 'arc_fecha', 'arc_path', 'arc_imagen', 'arc_original', 'por_id', 'com_id'], 'safe'],
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
        $query = Archivo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'arc_id' => $this->arc_id,
            'arc_fecha' => $this->arc_fecha,
            'usu_id' => $this->usu_id,
        ]);

        $query->andFilterWhere(['like', 'arc_nombre', $this->arc_nombre])
            ->andFilterWhere(['like', 'arc_descripcion_corta', $this->arc_descripcion_corta])
            ->andFilterWhere(['like', 'arc_descripcion_larga', $this->arc_descripcion_larga])
            ->andFilterWhere(['like', 'arc_path', $this->arc_path])
            ->andFilterWhere(['like', 'arc_imagen', $this->arc_imagen])
            ->andFilterWhere(['like', 'arc_original', $this->arc_original]);

        return $dataProvider;
    }
    
    public function searchFile($params){
        $where = "";
        $values = (intval($params['filterscount']) > 0)? $this->buildWhere($params['filterscount'], $params['allparams'], $where) : [];
        $where .= (empty(trim($where))? " WHERE " : " AND ")." arc_tipo=".$params['tipoa'];        
        $where .= " AND arc_rep_id=".$params['idreport'];
        $archivos = Yii::$app->db->createCommand("SELECT * FROM port_archivo ".$where." ORDER BY ".
                $params['sortdatafield'].' '.$params['sortorder']." OFFSET ".
                (intval($params['pagesize'])*  intval($params['page']))." ROWS FETCH NEXT ".$params['pagesize']." ROWS ONLY")
            ->bindValues($values)
            ->queryAll();
        
        return $archivos;
    }
    
    public function searchFilen($params){
        $where = "";
        $values = (intval($params['filterscount']) > 0)? $this->buildWhere($params['filterscount'], $params['allparams'], $where) : [];
        $where .= (empty(trim($where))? " WHERE " : " AND ")." arc_tipo=".$params['tipoa'];        
        $where .= " AND arc_rep_id=".$params['idreport'];
        $archivos = Yii::$app->db->createCommand("SELECT *FROM port_archivo ".$where." ORDER BY ".
                $params['sortdatafield'].' '.$params['sortorder'])
            ->bindValues($values)
            ->queryAll();
        
        return $archivos;
    }
    
    public function totalFiles($params){
        $where = "";
        $values = (intval($params['filterscount']) > 0)? $this->buildWhere($params['filterscount'], $params['allparams'], $where) : [];
        $where .= (empty(trim($where))? " WHERE " : " AND ")." arc_tipo=".$params['tipoa'];
        $where .= " AND arc_rep_id=".$params['idreport'];
        $total = Yii::$app->db->createCommand("SELECT count(*) FROM port_archivo ".$where)
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
