<?php
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "port_archivo".
 *
 * @property integer $arc_id
 * @property string $arc_nombre
 * @property string $arc_descripcion_corta
 * @property string $arc_descripcion_larga
 * @property string $arc_fecha
 * @property integer $usu_id
 * @property string $arc_path
 * @property string $arc_imagen
 * @property string $arc_fecha_ingreso
 * @property integer $arc_tipo
 * @property integer $arc_rep_id
 * @property integer $com_id
 * @property integer $por_id
 *
 * @property Users $usu
 */
class Archivod extends \yii\db\ActiveRecord
{    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_archivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arc_nombre', 'arc_descripcion_corta', 'arc_descripcion_larga', 'arc_path'], 'required'],
            [['arc_nombre', 'arc_descripcion_corta', 'arc_descripcion_larga', 'arc_path', 'arc_imagen', 'arc_original'], 'string'],       
            [['arc_fecha', 'arc_fecha_ingreso'], 'safe'],
            [['usu_id', 'arc_tipo', 'com_id', 'por_id', 'arc_rep_id', 'arc_descripcion_corta'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'arc_id' => 'Arc ID',
            'arc_nombre' => 'Descripción',
            'arc_descripcion_corta' => 'Año',
            'arc_descripcion_larga' => 'Mes',
            'arc_fecha' => 'Fecha',
            'usu_id' => 'Usuario',
            'arc_path' => 'Archivo',
            'arc_imagen' => 'Imagen',
            'arc_original' => 'Archivo original',
            'arc_fecha_ingreso' => 'Fecha de corte',
            'arc_tipo' => 'Tipo de archivo',
            'arc_rep_id' => 'Reporte',
            'com_id' => 'Comitente',
            'por_id' => 'Portafolio'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsu()
    {
        return $this->hasOne(Users::className(), ['id' => 'usu_id']);
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'arc_fecha',
                'updatedAtAttribute' => false,
                'value' => new Expression('CURRENT_TIMESTAMP'),
            ],
        ];
    }
}
