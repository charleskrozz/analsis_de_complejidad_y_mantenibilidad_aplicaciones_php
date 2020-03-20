<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_codigos_autogenerados".
 *
 * @property integer $cau_id
 * @property string $cau_codigo
 * @property string $cau_nombre
 * @property string $cau_prefijo
 * @property integer $cau_valor
 * @property integer $cau_incremento
 */
class PorCodigosAutogenerados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_codigos_autogenerados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cau_codigo', 'cau_nombre', 'cau_prefijo'], 'string'],
            [['cau_valor', 'cau_incremento'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cau_id' => 'Cau ID',
            'cau_codigo' => 'Codigo',
            'cau_nombre' => 'Nombre',
            'cau_prefijo' => 'Prefijo',
            'cau_valor' => 'Valor actual',
            'cau_incremento' => 'Incremento',
        ];
    }
}
