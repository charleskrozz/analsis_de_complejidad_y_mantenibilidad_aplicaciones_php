<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $password_reset_token
 * @property integer $user_state
 * @property string $user_identify
 * @property integer $user_first_time
 * @property string $user_date_expiration
 * @property integer $per_id
 * @property string $user_first_names
 * @property string $user_last_names
 * @property integer $user_exp_date
 */
class Users extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'port_users';
    }
    
    public static $estados = array(0=>'INACTIVO', 1 => 'ACTIVO');    
    public static $siNo = array(1=>'SI', 0 => 'NO');
    public static $estadosc = array('I' => 'INACTIVO', 'A' => 'ACTIVO');
    public static $MESES = ['ENERO' => 'ENERO', 'FEBRERO' => 'FEBRERO', 'MARZO' => 'MARZO', 'ABRIL' => 'ABRIL', 'MAYO' => 'MAYO', 'JUNIO' => 'JUNIO', 
        'JULIO' => 'JULIO', 'AGOSTO' => 'AGOSTO', 'SEPTIEMBRE' => 'SEPTIEMBRE', 'OCTUBRE' => 'OCTUBRE', 'NOVIEMBRE' => 'NOVIEMBRE', 'DICIEMBRE' => 'DICIEMBRE'];
    var $estadoe;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'user_state', 'user_identify', 'per_id', 'user_exp_date'], 'required'],
            [['username', 'password', 'auth_key', 'password_reset_token', 'user_identify', 'user_first_names', 'user_last_names'], 'string'],
            [['user_state', 'user_first_time', 'per_id', 'user_exp_date'], 'integer'],
            ['username', 'unique', 'targetAttribute' => ['username'], 'message' => 'Usuario debe ser único.'],
            ['user_identify', 'unique', 'targetAttribute' => ['user_identify'], 'message' => 'Identificación ya registrada.'],
            [['user_date_expiration'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Usuario',
            'password' => 'Contraseña',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'user_state' => 'Estado',
            'user_identify' => 'Identificación',
            'user_first_time' => 'User First Time',
            'user_date_expiration' => 'Fecha de Expiración',
            'per_id' => 'Perfil',
            'user_last_names' => 'Apellidos',
            'user_first_names' => 'Nombres',
            'user_exp_date' => 'Expira Clave',
        ];
    }
    
    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    public function beforeSave($insert)
    {
        if(!empty($this->password) && $this->estadoe){
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        }
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        
        return false;
    }
    
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
    
    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
    */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
    
    public static function findByIdentity($identify){
        return static::findOne(['user_identify' => $identify]);
    }

    public static function getEstados($key = null){
        if($key !== null)
            return self::$estados[$key];

        return self::$estados;
    }
    
    public static function getEstadosc($key = null){
        if($key !== null)
            return self::$estadosc[$key];

        return self::$estadosc;
    }
    
    public static function getSiNo($key = null){
        if($key !== null)
            return self::$siNo[$key];

        return self::$siNo;
    } 
    
    public static function getMeses($key = null){
        if($key !== null)
            return self::$MESES[$key];

        return self::$MESES;
    } 
}
