<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_cuenta_bancaria".
 *
 * @property integer $ctb_id
 * @property string $ctb_nombre
 * @property string $ctb_numero
 * @property integer $ctb_banco
 * @property string $ctb_comentario
 * @property integer $ctb_estado
 * @property string $ctb_fecha_registro
 */
class PorCuentaBancaria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_cuenta_bancaria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ctb_nombre', 'ctb_numero', 'ctb_banco','ctb_estado'], 'required'],
            [['ctb_nombre', 'ctb_numero', 'ctb_comentario'], 'string'],
            [['ctb_banco', 'ctb_estado'], 'integer'],
            [['ctb_fecha_registro'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ctb_id' => 'Ctb ID',
            'ctb_nombre' => 'Nombre',
            'ctb_numero' => 'Número cta.',
            'ctb_banco' => 'Banco',
            'ctb_comentario' => 'Comentario',
            'ctb_estado' => 'Estado',
            'ctb_fecha_registro' => 'Fecha Registro',
        ];
    }
    public function obtenerCuentaBancaria($estado){
		$query = new Query;
		$query  ->from(['por_cuenta_bancaria ctb'])
            ->select(['ctb.ctb_id','ctb.ctb_nombre','ctb.ctb_numero','ctb.ctb_banco','ctb.ctb_comentario','ctb.ctb_estado','ctb.ctb_fecha_registro','est.itc_nombre as estado_nombre',"[ctb_nombre] + ' ' + [ban].[itc_nombre] + ' ' + [ctb].[ctb_numero] as ctb_nombre_desc"])
            ->innerJoin(['por_item_catalogo est'],"ctb.ctb_estado = est.itc_id")
            ->innerJoin(['por_item_catalogo ban'],"ctb.ctb_banco = ban.itc_id")
			->andWhere(['est.itc_codigo' => $estado]);
			
		$command = $query->createCommand();
        $pagosLiq = $command->queryAll();

        return $pagosLiq;
    }
    public function mostrarListado(){
		$query = new Query;
		$query  ->from(['por_cuenta_bancaria ctb'])
            ->select(['ctb.ctb_id','ctb.ctb_nombre','ctb.ctb_numero','ctb.ctb_banco','ctb.ctb_comentario','ctb.ctb_estado','ctb.ctb_fecha_registro','est.itc_nombre as estado_nombre',"[ctb_nombre] + ' ' + [ban].[itc_nombre] + ' ' + [ctb].[ctb_numero] as ctb_nombre_desc","ban.itc_nombre as banco_nombre"])
            ->innerJoin(['por_item_catalogo est'],"ctb.ctb_estado = est.itc_id")
            ->innerJoin(['por_item_catalogo ban'],"ctb.ctb_banco = ban.itc_id");
			
		$command = $query->createCommand();
        $cuentaBan = $command->queryAll();

        return $cuentaBan;
    }
    
}
