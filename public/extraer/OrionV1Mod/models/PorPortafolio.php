<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_portafolio".
 *
 * @property integer $por_id
 * @property string $por_codigo
 * @property string $por_comentario
 * @property integer $cli_id
 * @property integer $por_estado
 * @property string $por_fecha_vigencia
 * @property string $por_fecha_creacion
 * @property string $por_fecha_actualizacion
 *
 * @property PorCliente $cli
 * @property PorItemCatalogo $porEstado
 */
class PorPortafolio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_portafolio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['por_codigo','por_estado','cli_id','por_titulo','por_fecha_apertura'], 'required'],
            [['por_codigo', 'por_comentario','por_titulo'], 'string'],
            [['cli_id', 'por_estado'], 'integer'],
            [['por_fecha_vigencia', 'por_fecha_creacion', 'por_fecha_actualizacion','por_fecha_apertura'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'por_id' => 'Por ID',
            'por_codigo' => 'Código',
            'por_comentario' => 'Comentario',
            'cli_id' => 'Cliente',
            'por_estado' => 'Estado',
            'por_fecha_vigencia' => 'Fecha cancelación',
            'por_fecha_creacion' => 'Fecha Creacion',
            'por_fecha_actualizacion' => 'Fecha Actualizacion',
            'por_titulo' => 'Descripción',
            'por_fecha_apertura' => 'Fecha apertura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCli()
    {
        return $this->hasOne(PorCliente::className(), ['cli_id' => 'cli_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorEstado()
    {
        return $this->hasOne(PorItemCatalogo::className(), ['itc_id' => 'por_estado']);
    }
	public function mostrarListado(){
        $query = new Query;
        $query  ->from(['por_portafolio p'])
          ->select(['p.por_id','p.por_codigo','p.por_comentario','c.cli_razon_social',
			'p.por_estado','p.por_fecha_creacion','p.por_fecha_vigencia','i.itc_nombre as por_estado_nombre','por_titulo','por_fecha_apertura'])
			->innerJoin(['por_cliente c'],'c.cli_id = p.cli_id')
            ->innerJoin(['por_item_catalogo i'],'p.por_estado = i.itc_id');

            $command = $query->createCommand();
        $catalogo = $command->queryAll();

        return $catalogo;
    }
}
