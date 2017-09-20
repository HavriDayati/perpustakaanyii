<?php

namespace app\models;

use Yii;
use app\models\Pengguna;

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_buku', 'id_user', 'waktu_dipinjam', 'waktu_pengembalian'], 'required'],
            [['id_buku', 'id_user'], 'integer'],
            [['waktu_dipinjam', 'waktu_pengembalian'], 'safe'],
            [['id_buku'], 'exist', 'skipOnError' => true, 'targetClass' => Buku::className(), 'targetAttribute' => ['id_buku' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Pengguna::className(), 'targetAttribute' => ['id_user' => 'id']],
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
        return $this->hasOne(Pengguna::className(), ['id' => 'id_user']);
    }
}
