<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_archivo_titulo_fisico".
 *
 * @property integer $atf_id
 * @property integer $tpo_id
 * @property string $atf_path
 * @property string $atf_fecha
 * @property string $atf_estado
 */
class PorArchivoTituloFisico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_archivo_titulo_fisico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tpo_id'], 'integer'],
            [['atf_path', 'atf_estado'], 'string'],
            [['atf_fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'atf_id' => 'Atf ID',
            'tpo_id' => 'Tpo ID',
            'atf_path' => 'Atf Path',
            'atf_fecha' => 'Atf Fecha',
            'atf_estado' => 'Atf Estado',
        ];
    }
}
