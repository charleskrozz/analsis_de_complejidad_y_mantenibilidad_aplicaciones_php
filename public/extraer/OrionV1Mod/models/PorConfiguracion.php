<?php

namespace app\models;

use Yii;
use yii\db\Query;
use \yii\db\mssql\PDO;

/**
 * This is the model class for table "por_configuracion".
 *
 * @property integer $con_id
 * @property integer $por_id
 * @property integer $con_enable_valoraciones
 * @property integer $con_rf
 * @property integer $con_rfcc
 */
class PorConfiguracion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'por_configuracion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['por_id', 'usrId'], 'required'],
            [['por_id', 'con_enable_valoraciones', 'con_rf', 'con_rfcc','usrId'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'con_id' => 'Con ID',
            'por_id' => 'Portafolio',
            'con_enable_valoraciones' => '',
            'con_rf' => '',
            'con_rfcc' => '',
			'usrId' => 'Usuario',
        ];
    }
	
	public function actualizarRentafija($porId,$usrId,$check){
		if($check=="true")
			Yii::$app->db->createCommand('UPDATE por_configuracion SET con_rf=1 WHERE por_id='.$porId.' and usrId='.$usrId)->execute();
		else
			Yii::$app->db->createCommand('UPDATE por_configuracion SET con_rf=0 WHERE por_id='.$porId.' and usrId='.$usrId)->execute();
		return null;
	}
	public function actualizarRentafijacc($porId,$usrId,$check){
		if($check=="true")
			Yii::$app->db->createCommand('UPDATE por_configuracion SET con_rfcc=1 WHERE por_id='.$porId.' and usrId='.$usrId)->execute();
		else
			Yii::$app->db->createCommand('UPDATE por_configuracion SET con_rfcc=0 WHERE por_id='.$porId.' and usrId='.$usrId)->execute();
		return null;
	}
	public function obtenerConfig($porId,$usrId){
		$query = new Query;
        $query  ->from(['[por_configuracion] c'])
          ->select(['c.con_enable_valoraciones','c.con_rf','c.con_rfcc'])
		  ->andWhere(['c.por_id' => $porId,'c.usrId'=>$usrId]);

        $command = $query->createCommand();
        $catalogo = $command->queryAll();

        return $catalogo;
	}
	public function mostrarListado(){
        $query = new Query;
		
        $query  ->from(['[por_configuracion] c'])
          ->select(['c.con_id','c.por_id','c.con_enable_valoraciones','c.con_rf','c.con_rfcc','c.usrId','up.upa_nombre_comitente','u.username','con_rf_text'=>'(case when c.con_rf=1 then \'SI\' else \'NO\' end)','con_rfcc_text'=>'(case when c.con_rfcc=1 then \'SI\' else \'NO\' end)','up.upa_codigo'])
		->innerJoin(['port_usuario_portafolio up'],'up.por_id = c.por_id')
		->innerJoin(['port_users u'],'u.id = c.usrId');
		
        $command = $query->createCommand();
        $catalogo = $command->queryAll();

        return $catalogo;
    }
}
