<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "por_titulo_transito".
 *
 * @property integer $ptt_id
 * @property string $Emisor
 * @property string $Numeracion
 * @property double $ValorNominal
 * @property string $Tipo
 * @property string $FechaRegistro
 * @property string $Observaciones
 * @property integer $PorId
 */
class PorTituloTransito extends \yii\db\ActiveRecord
{
    const SCENARIO_EXIT = 'login';
    const SCENARIO_OTHER = 'register';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_titulo_transito';
    }
//    public function scenarios()
//    {
//        $scenarios = parent::scenarios();
//        $scenarios['update'] = ['Emisor','Numeracion','Tipo','ValorNominal','FechaRegistro'];
//        $scenarios['exit'] = ['FechaSalida'];
//        return $scenarios;
//    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Emisor', 'Numeracion', 'Tipo','ValorNominal','FechaRegistro'], 'required'],
            [['Emisor', 'Numeracion', 'Tipo', 'Observaciones'], 'string'],
            [['ValorNominal'], 'number'],
            [['FechaRegistro','FechaSalida'], 'safe'],
            [['PorId'], 'required'],
            [['PorId'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ptt_id' => 'Ptt ID',
            'Emisor' => 'Emisor',
            'Numeracion' => 'Numeracion',
            'ValorNominal' => 'Valor Nominal',
            'Tipo' => 'Tipo',
            'FechaRegistro' => 'Fecha Registro',
            'Observaciones' => 'Observaciones',
            'PorId' => 'Por ID',
            'FechaSalida '=>'Fecha Salida ',
        ];
    }
}
