<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_liquidez_reg".
 *
 * @property integer $liq_id
 * @property integer $por_id
 * @property integer $usr_id
 * @property integer $liq_tipo
 * @property double $liq_monto
 * @property integer $liq_estado
 * @property string $liq_fecha_registro
 * @property string $liq_fecha_aplicacion
 * @property integer $liq_origen
 * @property integer $liq_origen_id
 * @property string $liq_descripcion
 * @property integer $tfl_id
 * @property string $liq_tipo_res
 */
class PorLiquidezReg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_liquidez_reg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['por_id','liq_tipo','liq_estado','liq_origen','liq_monto','liq_fecha_registro','liq_descripcion','pll_id'], 'required'],
            [['por_id', 'usr_id', 'liq_tipo', 'liq_estado', 'liq_origen', 'liq_origen_id', 'tfl_id'], 'integer'],
            [['liq_monto'], 'number'],
            [['liq_fecha_registro', 'liq_fecha_aplicacion'], 'safe'],
            [['liq_descripcion', 'liq_tipo_res'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'liq_id' => 'Liq ID',
            'por_id' => 'Por ID',
            'usr_id' => 'Usr ID',
            'liq_tipo' => 'Tipo',
            'liq_monto' => 'Monto',
            'liq_estado' => 'Estado',
            'liq_fecha_registro' => 'Fecha Registro',
            'liq_fecha_aplicacion' => 'Fecha Aplicacion',
            'liq_origen' => 'Origen',
            'liq_origen_id' => 'Origen ID',
            'liq_descripcion' => 'Descripcion',
            'tfl_id' => 'Tfl ID',
            'liq_tipo_res' => 'Liq Tipo Res',
            'pll_id' => 'Tipo',
        ];
    }
    public function ApobarItemLiquidez($liqId,$fecha,$comentario,$aplicaLiq,$ctaBan){
		$result = \Yii::$app->db->createCommand("EXEC dbo.ApobarItemLiquidez @i_liqId=:i_liqId, @i_fecha=:i_fecha, @i_Desc=:i_Desc,@i_aplica_liq=:i_aplica_liq,@i_cta_ban=:i_cta_ban") 
                      ->bindValue(':i_liqId' , $liqId)
                      ->bindValue(':i_fecha', $fecha)
                      ->bindValue(':i_Desc', $comentario)
                      ->bindValue(':i_aplica_liq', $aplicaLiq)
                      ->bindValue(':i_cta_ban', $ctaBan)
                      ->execute();
    }
    public function AndirPagoLiquidez($liqId,$monto,$fecha,$comentario,$aplicaLiq,$ctaBan,$descCred){
		$result = \Yii::$app->db->createCommand("EXEC dbo.InsertatPagoItemLiquidez @i_liqId=:i_liqId,@i_monto=:i_monto, @i_fecha=:i_fecha, @i_Desc=:i_Desc,@i_aplica_liq=:i_aplica_liq,@i_cta_ban=:i_cta_ban,@i_desc_cred=:i_desc_cred") 
                      ->bindValue(':i_liqId' , $liqId)
                      ->bindValue(':i_monto' , $monto)
                      ->bindValue(':i_fecha', $fecha)
                      ->bindValue(':i_Desc', $comentario)
                      ->bindValue(':i_aplica_liq', $aplicaLiq)
                      ->bindValue(':i_cta_ban', $ctaBan)
                      ->bindValue(':i_desc_cred', $descCred)
                      ->execute();
    }
    public function cambiarEstadoLiq($liqId,$lpaId){
        $result = \Yii::$app->db->createCommand("EXEC dbo.CambiarEstadoLiqPorEliminarPago @i_liqId=:i_liqId,@i_lpaId=:i_lpaId") 
                      ->bindValue(':i_liqId' , $liqId)
                      ->bindValue(':i_lpaId' , $lpaId)
                      ->execute();
    }
}
