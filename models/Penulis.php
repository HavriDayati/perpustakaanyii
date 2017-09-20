<?php

namespace app\models;

use Yii;
use yii\Helpers\ArrayHelper;

/**
 * This is the model class for table "penulis".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $id_jenis_kelamin
 * @property string $alamat
 * @property string $lat
 * @property string $lon
 *
 * @property Buku[] $bukus
 */
class Penulis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penulis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'id_jenis_kelamin', 'lat', 'lon'], 'required'],
            [['id_jenis_kelamin'], 'integer'],
            [['alamat'], 'string'],
            [['nama'], 'string', 'max' => 255],
            [['lat', 'lon'], 'string', 'max' => 20],

            [['nama', 'lat', 'lon'], 'string', 'max' => 255],
            [['id_jenis_kelamin'], 'exist', 'skipOnError' => true, 'targetClass' => JenisKelamin::className(), 'targetAttribute' => ['id_jenis_kelamin' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'id_jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'lat' => 'Lat',
            'lon' => 'Lon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBukus()
    {
        return $this->hasMany(Buku::className(), ['id_penulis' => 'id']);
    }
/**
     * @return \yii\db\ActiveQuery
     */
    public function getIdJenisKelamin()
    {
        return $this->hasOne(JenisKelamin::className(), ['id' => 'id_jenis_kelamin']);
    }

    public static function getList()
    {
        return ArrayHelper::map(Penulis::find()->all(),'id','nama');
    }
    public static function getCount()
    {
        return self::find()->count();
    }
}