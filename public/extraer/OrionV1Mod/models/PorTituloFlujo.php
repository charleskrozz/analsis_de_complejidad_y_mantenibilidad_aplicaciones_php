<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_titulo_flujo".
 *
 * @property integer $tfl_id
 * @property integer $tiv_id
 * @property integer $tfl_periodo
 * @property double $tfl_capital
 * @property string $tfl_fecha_inicio
 * @property double $tfl_interes
 * @property double $tfl_amortizacion
 * @property string $tfl_fecha_vencimiento
 * @property string $tfl_fecha_registro
 * @property string $tfl_fecha_actualizacion
 */
class PorTituloFlujo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_titulo_flujo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tfl_id', 'tiv_id'], 'required'],
            [['tfl_id', 'tiv_id', 'tfl_periodo'], 'integer'],
            [['tfl_capital', 'tfl_interes', 'tfl_amortizacion'], 'number'],
            [['tfl_fecha_inicio', 'tfl_fecha_vencimiento', 'tfl_fecha_registro', 'tfl_fecha_actualizacion'], 'safe'],
            [['tiv_id'], 'exist', 'skipOnError' => true, 'targetClass' => PorTituloValor::className(), 'targetAttribute' => ['tiv_id' => 'tiv_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tfl_id' => 'Tfl ID',
            'tiv_id' => 'Tiv ID',
            'tfl_periodo' => 'Tfl Periodo',
            'tfl_capital' => 'Tfl Capital',
            'tfl_fecha_inicio' => 'Tfl Fecha Inicio',
            'tfl_interes' => 'Tfl Interes',
            'tfl_amortizacion' => 'Tfl Amortizacion',
            'tfl_fecha_vencimiento' => 'Tfl Fecha Vencimiento',
            'tfl_fecha_registro' => 'Tfl Fecha Registro',
            'tfl_fecha_actualizacion' => 'Tfl Fecha Actualizacion',
        ];
    }
	public function mostrarListado(){
        $query = new Query;
        $query  ->from(['por_portafolio p'])
          ->select(['p.por_id','p.por_codigo','p.por_comentario','c.cli_razon_social',
			'p.por_estado','p.por_fecha_creacion','p.por_fecha_vigencia','i.itc_nombre as por_estado_nombre'])
			->innerJoin(['por_cliente c'],'c.cli_id = p.cli_id')
            ->innerJoin(['por_item_catalogo i'],'p.por_estado = i.itc_id');

            $command = $query->createCommand();
        $catalogo = $command->queryAll();

        return $catalogo;
    }
    public function genrarTituloFlujoDef($tivId){
        $result = \Yii::$app->db->createCommand("EXEC dbo.GenerarTituloFLujoDefault @i_tivId=:i_tiv_id") 
                      ->bindValue(':i_tiv_id' , $tivId)
                      ->execute();
    }
}
