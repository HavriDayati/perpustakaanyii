<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penerbit".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat_penerbit
 * @property string $latitude
 * @property string $longitude
 * @property string $tahun_terbit
 */
class Penerbit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penerbit';
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
            [['alamat_penerbit', 'latitude', 'longitude', 'tahun_terbit'], 'required'],
            [['alamat_penerbit'], 'string'],
            [['nama', 'latitude', 'longitude', 'tahun_terbit'], 'string', 'max' => 255],
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
            'alamat_penerbit' => 'Alamat Penerbit',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'tahun_terbit' => 'Tahun Terbit',
        ];
    }
}
