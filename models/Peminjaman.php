<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "peminjaman".
 *
 * @property integer $id
 * @property integer $id_buku
 * @property integer $id_user
 * @property string $waktu_dipinjam
 * @property string $waktu_pengembalian
 *
 * @property Buku $idBuku
 * @property User $idUser
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peminjaman';
    }
    public static function getCount()
    {
        return self::find()->count();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['waktu_dipinjam', 'waktu_pengembalian'], 'required'],
            [['id_buku', 'id_user'], 'integer'],
            [['waktu_dipinjam', 'waktu_pengembalian', 'id_buku', 'id_user'], 'safe'],
            [['id_buku'], 'exist', 'skipOnError' => true, 'targetClass' => Buku::className(), 'targetAttribute' => ['id_buku' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_buku' => 'Nama Buku',
            'id_user' => 'Nama User',
            'waktu_dipinjam' => 'Waktu Dipinjam',
            'waktu_pengembalian' => 'Waktu Pengembalian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBuku()
    {
        return $this->hasOne(Buku::className(), ['id' => 'id_buku']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
    public static function getGrafikPerBuku()
    {
        $chart = null;
        foreach(Buku::find()->all() as $data)
        {
            $chart .= '{"label":"'.$data->nama.'","value":"'.$data->getCountGrafikBuku().'"},';
        }
        return $chart;
    }

    public function beforeSave($insert)
    {
        if($insert) {
            $this->id_user = Yii::$app->user->identity->id;
        }
        return true;
    }
 }
