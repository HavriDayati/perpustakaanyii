<?php

namespace app\models;

use Yii;
use yii2tech\ar\softdelete\SoftDeleteBehavior;
use app\models\User;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $role
 * @property string $kode_pegawai
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $email
 * @property string $auth_key
 * @property string $access_token
 *
 * @property Pegawai $kodePegawai
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const ROLE_ADMIN = 1;
    const ROLE_MAHASISWA = 2;

    public $auth_key;
    public $access_token;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_role', 'username', 'password'], 'required'],
            [['id_role'], 'integer'],
            [['username', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_role' => 'Role',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function getRole()
    {
        if ($this->id_role === self::ROLE_ADMIN) {
            return 'Admin';
        } else {
            return 'Mahasiswa';
        }
    }

    public static function isAdmin()
    {
        if(isset(Yii::$app->user->identity->id)){
            return true;
        } else{
            return false;
        }
    }

    public static function getRoleList()
    {
        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_MAHASISWA => 'Mahasiswa',
        ];
    }
}
