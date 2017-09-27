<?php

namespace app\models;
use app\models\User;
use app\model\Peminjaman;
use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
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
            [['nama','username','password','role'],'required'],
            [['role'],'integer'],
            [['nama','username','password'],'string','max'=> 255],
            [['nama', 'username', 'password', 'authKey', 'accessToken', 'role'], 'required'],
            [['role'],'integer'],
            [['nama', 'username', 'password', 'authKey', 'accessToken'], 'string', 'max'=>255],

   ];
}


public function attributeLabels()
{
    return[
'id' => 'ID',
'nama' => 'Nama',
'username' => 'Username',
'password' => 'Password',
'authkey' => 'Authkey',
'accessToken' => 'Acces Token',
'role' => 'Role',
    ];
}

    public static function findIdentity($id)
    {
        $user = User::findOne($id);
        if(count($user)) {

            return new static($user);
        }

        return null;
        /*return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;*/
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = User::find()->where(['accessToken'=>$token])->one();

        if(count($user)) {
            return new static($user);
        }
        /*foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }*/

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = User::find()->where(['username'=>$username])->one();

        if (count($user)) {
            return new static($user);
        }
       /* foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }*/

        return null;
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
    
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
    public static function getCount()
    {
        return self::find()->count();
    }
    public function getPeminjamen()
    {
        return $this->hasMany(Peminjaman::className(), ['id_user' => 'id']);
    }
}
