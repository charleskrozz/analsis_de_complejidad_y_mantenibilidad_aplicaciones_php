<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_cliente".
 *
 * @property integer $cli_id
 * @property string $cli_identificacion
 * @property string $cli_razon_social
 * @property string $cli_direcccion
 * @property string $cli_telefono
 * @property integer $cli_estado
 * @property string $cli_fecha_creacion
 * @property string $cli_fecha_actualizacion
 *
 * @property PorItemCatalogo $cliEstado
 * @property PorPortafolio[] $porPortafolios
 */
class PorCliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['cli_identificacion', 'cli_razon_social', 'cli_direcccion','cli_estado'], 'required'],
            [['cli_identificacion', 'cli_razon_social', 'cli_direcccion', 'cli_telefono','cli_contacto','cli_telefono_contacto'], 'string'],
            [['cli_estado'], 'integer'],			
            [['cli_fecha_creacion', 'cli_fecha_actualizacion'], 'safe']		
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cli_id' => 'Cli ID',
            'cli_identificacion' => 'Identificacion',
            'cli_razon_social' => 'Razon Social',
            'cli_direcccion' => 'Direccción',
            'cli_telefono' => 'Teléfono',
            'cli_estado' => 'Estado',
            'cli_fecha_creacion' => 'Cli Fecha Creacion',
            'cli_fecha_actualizacion' => 'Cli Fecha Actualizacion',
			'cli_contacto' => 'Contacto',
			'cli_telefono_contacto' => 'Teléfono contacto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliEstado()
    {
        return $this->hasOne(PorItemCatalogo::className(), ['itc_id' => 'cli_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorPortafolios()
    {
        return $this->hasMany(PorPortafolio::className(), ['cli_id' => 'cli_id']);
    }
	public function mostrarListado(){
        $query = new Query;
        $query  ->from(['por_cliente c'])
          ->select(['c.cli_id','c.cli_identificacion','c.cli_razon_social','c.cli_direcccion',
		  'c.cli_telefono','c.cli_estado','c.cli_fecha_creacion','i.itc_nombre as cli_estado_nombre','c.cli_contacto','c.cli_telefono_contacto'])
            ->innerJoin(['por_item_catalogo i'],'c.cli_estado = i.itc_id');

            $command = $query->createCommand();
        $catalogo = $command->queryAll();

        return $catalogo;
    }
}
