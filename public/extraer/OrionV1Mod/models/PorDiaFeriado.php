<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;
/**
 * This is the model class for table "por_dia_feriado".
 *
 * @property integer $dfe_id
 * @property string $dfe_descripcion
 * @property string $dfe_fecha_inicio
 * @property string $dfe_fecha_fin
 * @property string $dfe_fecha_creacion
 * @property string $dfe_fecha_actualizacion
 */
class PorDiaFeriado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_dia_feriado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dfe_descripcion'], 'string'],
            [['dfe_fecha_inicio', 'dfe_fecha_fin', 'dfe_fecha_creacion', 'dfe_fecha_actualizacion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dfe_id' => 'Dfe ID',
            'dfe_descripcion' => 'Descripcion',
            'dfe_fecha_inicio' => 'Fecha Inicio',
            'dfe_fecha_fin' => 'Fecha Fin',
            'dfe_fecha_creacion' => 'Fecha Creacion',
            'dfe_fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }
	public function mostrarListado(){
        $query = new Query;
        $query  ->from(['[por_dia_feriado] d'])
          ->select(['d.dfe_id','d.dfe_descripcion','d.dfe_fecha_inicio','d.dfe_fecha_fin','d.dfe_fecha_creacion','d.dfe_fecha_actualizacion']);

            $command = $query->createCommand();
        $catalogo = $command->queryAll();

        return $catalogo;
    }
}
