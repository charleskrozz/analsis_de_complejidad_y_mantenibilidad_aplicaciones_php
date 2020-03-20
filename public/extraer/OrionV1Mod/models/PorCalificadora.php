<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;
/**
 * This is the model class for table "por_calificadora".
 *
 * @property integer $cal_id
 * @property string $cal_nombre
 * @property string $cal_codigo
 * @property string $cal_descripcion_corta
 * @property integer $cal_estado
 * @property string $cal_fecha_actualizacion
 * @property string $cal_fecha_creacion
 *
 * @property PorEmisorCalificacion[] $porEmisorCalificacions
 */
class PorCalificadora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_calificadora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cal_nombre', 'cal_codigo','cal_descripcion_corta'], 'string'],
            [['cal_estado'], 'integer'],
            [['cal_nombre', 'cal_codigo', 'cal_estado'], 'required'],
            [['cal_fecha_actualizacion', 'cal_fecha_creacion'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cal_id' => 'Cal ID',
            'cal_nombre' => 'Nombre',
            'cal_codigo' => 'Código',
            'cal_descripcion_corta' =>'Descripción corta',
            'cal_estado' => 'Estado',
            'cal_fecha_actualizacion' => 'Fecha Actualización',
            'cal_fecha_creacion' => 'Fecha Creación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPorEmisorCalificacions()
    {
        return $this->hasMany(PorEmisorCalificacion::className(), ['cal_id' => 'cal_id']);
    }
    public function mostrarListado(){
        $query = new Query;
        $query  ->from(['por_calificadora ca'])
          ->select(['ca.cal_id','ca.cal_nombre','ca.cal_codigo','ca.cal_descripcion_corta','ca.cal_estado',
            'ca.cal_fecha_actualizacion','ca.cal_fecha_creacion','i.itc_nombre as nombre_estado'])
          ->innerJoin(['por_item_catalogo i'],'i.itc_id = ca.cal_estado');

            $command = $query->createCommand();
        $calificadora = $command->queryAll();

        return $calificadora;
    }
    public function obtenerEstado(){
      $query = new Query;

          $query->from(['por_item_catalogo i'])
        ->select(['i.itc_nombre','i.itc_id'])
        ->innerJoin(['por_catalogo c'],'c.cat_id = i.cat_id')
        ->andWhere(['c.cat_codigo' => 'COD_ESTADO']);

      $command = $query->createCommand();
      $catalogo = $command->queryAll();

      return $catalogo;
    }

}
