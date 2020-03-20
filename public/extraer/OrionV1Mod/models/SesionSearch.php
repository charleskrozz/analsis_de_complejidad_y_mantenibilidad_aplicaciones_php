<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sesion;

/**
 * SesionSearch represents the model behind the search form about `app\models\Sesion`.
 */
class SesionSearch extends Sesion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ses_id', 'men_id', 'usu_id', 'por_id', 'com_id', 'ses_estado'], 'integer'],
            [['ses_fecha_inicio', 'ses_fecha_fin', 'ses_ip','ses_comitente'], 'safe'],
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
        $query = Sesion::find();

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
            'ses_id' => $this->ses_id,
            'men_id' => $this->men_id,
            'usu_id' => $this->usu_id,
            'por_id' => $this->por_id,
            'com_id' => $this->com_id,
            'ses_fecha_inicio' => $this->ses_fecha_inicio,
            'ses_fecha_fin' => $this->ses_fecha_fin,
        ]);

        $query->andFilterWhere(['like', 'ses_ip', $this->ses_ip]);

        return $dataProvider;
    }
    
    public function listarIngresosp($params){
        $params['sortdatafield'] = (empty($sortdatafield))? 'ses_id' : $sortdatafield;
        $params['sortorder'] = (empty($sortorder))? 'asc' : $sortorder;
        $where = "";
        $values = (intval($params['filterscount']) > 0)? $this->buildWhere($params['filterscount'], $params['allparams'], $where) : [];
        $where .= (empty(trim($where))? " WHERE " : " AND ")." s.ses_fecha_inicio between '".$params['finicio']."T00:00:00' and '".$params['ffin']."T23:59:59.999'";       
        $ingresos = Yii::$app->db->createCommand("SELECT s.ses_id,s.ses_fecha_inicio,s.ses_fecha_fin,u.username,u.user_first_names,u.user_last_names"
                .",u.user_identify,m.men_nombre,s.ses_ip,s.ses_comitente"
                . " FROM port_sesion s inner join port_menu m on(s.men_id=m.men_id) "
                . "inner join port_users u on(s.usu_id=u.id) ".$where." ORDER BY ".
                $params['sortdatafield'].' '.$params['sortorder'])
            ->bindValues($values)
            ->queryAll();
        
        return $ingresos;
    }
    
    public function listarIngreso($params){
        $where = "";
        $values = (intval($params['filterscount']) > 0)? $this->buildWhere($params['filterscount'], $params['allparams'], $where) : [];
        $where .= (empty(trim($where))? " WHERE " : " AND ")." s.ses_fecha_inicio between '".$params['finicio']."T00:00:00' and '".$params['ffin']."T23:59:59.999'";       
        $ingresos = Yii::$app->db->createCommand("SELECT s.ses_id,s.ses_fecha_inicio,s.ses_fecha_fin,u.username,u.user_first_names,u.user_last_names"
                .",u.user_identify,m.men_nombre,s.ses_ip,s.ses_comitente"
                . " FROM port_sesion s inner join port_menu m on(s.men_id=m.men_id) "
                . "inner join port_users u on(s.usu_id=u.id) ".$where." ORDER BY ".
                $params['sortdatafield'].' '.$params['sortorder']." OFFSET ".
                (intval($params['pagesize'])*  intval($params['page']))." ROWS FETCH NEXT ".$params['pagesize']." ROWS ONLY")
            ->bindValues($values)
            ->queryAll();
        
        return $ingresos;
    }
    
    public function contarIngreso($params){
        $where = "";
        $values = (intval($params['filterscount']) > 0)? $this->buildWhere($params['filterscount'], $params['allparams'], $where) : [];
        $where .= (empty(trim($where))? " WHERE " : " AND ")." ses_fecha_inicio between '".$params['finicio']."T00:00:00' and '".$params['ffin']."T23:59:59.999'";       
        $total = Yii::$app->db->createCommand("SELECT count(*) FROM port_sesion s inner join port_menu m on(s.men_id=m.men_id)".
                " inner join port_users u on(s.usu_id=u.id) ".$where)
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
