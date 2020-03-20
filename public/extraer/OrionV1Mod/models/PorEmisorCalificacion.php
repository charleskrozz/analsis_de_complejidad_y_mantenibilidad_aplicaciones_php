<?php

namespace app\models;
use yii\db\Query;
use \yii\db\mssql\PDO;
use Yii;

/**
 * This is the model class for table "por_emisor_calificacion".
 *
 * @property integer $eca_id
 * @property integer $emi_id
 * @property integer $cal_id
 * @property string $eca_valor
 * @property string $eca_fecha
 * @property string $eca_numero_resolucion
 * @property string $eca_fecha_resolucion
 * @property integer $eca_estado
 * @property string $eca_fecha_actualizacion
 * @property string $eca_fecha_creacion
 *
 * @property PorEmisor $emi
 * @property PorCalificadora $cal
 * @property PorItemCatalogo $ecaEstado
 */
class PorEmisorCalificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_emisor_calificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eca_estado','cal_id','eca_fecha_desde'], 'required'],
            [['emi_id', 'cal_id', 'eca_estado'], 'integer'],
            [['eca_valor', 'eca_numero_resolucion'], 'string'],
            [['eca_fecha_resolucion', 'eca_fecha_actualizacion', 'eca_fecha_creacion','eca_fecha_desde','eca_fecha_hasta','eca_envia_not'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eca_id' => 'Eca ID',
            'emi_id' => 'Emi ID',
            'cal_id' => 'Calificadora',
            'eca_valor' => 'Categoría',
            'eca_numero_resolucion' => 'Comité',
            'eca_fecha_resolucion' => 'Fecha Comité',
            'eca_estado' => 'Estado',
            'eca_fecha_actualizacion' => 'Fecha Actualización',
            'eca_fecha_creacion' => 'Fecha Creación',
			'eca_fecha_desde' => 'Fecha Desde',
            'eca_fecha_hasta' => 'Fecha Hasta',
            'eca_envia_not' => '',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmi()
    {
        return $this->hasOne(PorEmisor::className(), ['emi_id' => 'emi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCal()
    {
        return $this->hasOne(PorCalificadora::className(), ['cal_id' => 'cal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcaEstado()
    {
        return $this->hasOne(PorItemCatalogo::className(), ['itc_id' => 'eca_estado']);
    }

    public function mostrarListado(){
        $query = new Query;
        $query  ->from(['por_emisor_calificacion ec'])
          ->select(['ec.eca_id','ec.emi_id','ec.cal_id','ec.eca_valor','ec.eca_fecha_desde','ec.eca_fecha_hasta','ec.eca_numero_resolucion',
            'ec.eca_fecha_resolucion','ec.eca_estado','ec.eca_fecha_actualizacion','it.itc_fecha_creacion',"case when [ec].[eca_envia_not]=1 then 'SI' else 'NO' end as eca_envia_not_desc"

        //  ,'e.emi_nombre as nombre_emisor','ca.cal_nombre as nombre_calificadora','it.itc_estado as nombre_estado'
        ])
            //  ->innerJoin(['por_item_catalogo it'],' it.itc_id = ec.eca_estado')
            //  ->innerJoin(['por_calificadora ca'],' ca.cal_id = ec.cal_id')
            //  ->innerJoin(['por_emisor e'],'e.emi_id = ec.emi_id')
              ;

            $command = $query->createCommand();
        $calificacion = $command->queryAll();

        return $calificacion;
    }
}
