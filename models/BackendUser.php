<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "backend_user".
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $username
 * @property string $password
 * @property string $authKey
 */
class BackendUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'backend_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'username', 'password', 'authKey'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['authKey'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
        ];
    }
    public function getAuthKey () 
    {
        return $this->authKey;
    }
    public function getId () 
    {
        return $this->id;

    }
    public function validateAuthKey ($authKey) 
    {
        return $this->authKey === $authKey;
    }
    public static function findIdentity ($id) 
    {
        return self::findOne($id);
    }
    public static function findIdentityByAccessToken ($token, $type = null) 
    {
        throw new NotSupportedException();
    }
    public static function findByUsername ($username)
    {
        return self::findOne(['username'=>$username]);
    }
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
