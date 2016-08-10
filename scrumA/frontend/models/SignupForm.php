<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password_hash;
    public $isNewRecord=true;
    public $id;
    public $rol;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            
            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password_hash);
        $user->generateAuthKey();
         $user->rol=$this->rol;
        $user->save() ? $user : null;
       
        return $user->id;
    }
    
    public function modificarUser($id_user){
        $user= User::findOne($id_user);
        if($user != null){
            $user->username=$this->username;
            $user->email=$this->email;
            $user->setPassword($this->password_hash);
            $user->generateAuthKey();
            $user->save();
            
            
        }
    }
   
      public function obtenerDatos($id_user){
        $user= User::findOne($id_user);
        $user->delete();
        
    }

        public function obtener($id_user){
        $user= User::findOne($id_user);
        if($user != null){
            $this->username=$user->username;
            $this->password_hash=$user->password_hash;
            $this->email=$user->email;
        }
        
    }
    
    public function getAdministradors()
    {
        return $this->hasMany(Administrador::className(), ['Id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntegrantes()
    {
        return $this->hasMany(Integrantes::className(), ['Id_user' => 'id']);
    }
    
    public static function isAdmin($id){
        if(User::findOne(['id'=>$id,'rol'=>1])){
            return true;
        }else{
            return false;
        }
    }
    
    public static function isIntegrante($id){
        if(User::findOne(['id'=>$id,'rol'=>2])){
            return true;
        }else{
            return false;
        }
    }
}
