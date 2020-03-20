<?php 
    namespace app\models;
    
    use Yii;
    use yii\base\Model;
    
    class PasswordForm extends Model{
        public $oldpass;
        public $newpass;
        public $repeatnewpass;
        public $users;
        
        public function rules(){
            return [
                [['users','oldpass','newpass','repeatnewpass'],'required'],
                ['oldpass','findPasswords'],
                ['repeatnewpass','compare','compareAttribute'=>'newpass'],
            ];
        }
        
        public function findPasswords($attribute, $params){
            $user = Users::find()->where([
                'username'=>$this->users
            ])->one();
            if(!empty($user)){
                $password = $user->password;
                if(!Yii::$app->getSecurity()->validatePassword($this->oldpass ,$password)){
                    $this->addError($attribute,'Las claves no coinciden');
                }
            }else{
                $this->addError($attribute,'Las claves no coinciden');
            }
        }
        
        public function attributeLabels(){
            return [
                'users' => 'Nombre de usuario',
                'oldpass' => 'Clave Actual',
                'newpass' => 'Nueva Clave',
                'repeatnewpass' => 'Repita la Nueva Clave',
            ];
        }
    }