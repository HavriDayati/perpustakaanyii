<?php

namespace app\models;

use Yii;
use yii\Helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $id_mhs
 * @property string $alamat
 * @property string $photo
 * @property integer $status
 * @property integer $id_jenis_kelamin
 * @property string $email
 * @property string $tgl_lhr
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'id_mhs', 'alamat', 'photo', 'status', 'id_jenis_kelamin', 'email', 'tgl_lhr'], 'required'],
            [['id_mhs', 'status', 'id_jenis_kelamin'], 'integer'],
            [['alamat'], 'string'],
            [['tgl_lhr'], 'safe'],
            [['nama', 'photo', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            
            'nama' => 'Nama',
            'id_mhs' => 'Nim',
            'alamat' => 'Alamat',
            'photo' => 'Photo',
            'status' => 'Status',
            'id_jenis_kelamin' => 'Jenis Kelamin',
            'email' => 'Email',
            'tgl_lhr' => 'Tanggal Lahir',
        ];
    }
    public function getIdJenisKelamin()
    {
        return $this->hasOne(JenisKelamin::className(), ['id' => 'id_jenis_kelamin']);
}
public static function getList()
    {
        return ArrayHelper::map(DataMahasiswa::find()->all(),'id','nama');
    }
    public static function getCount()
    {
        return self::find()->count();
}

public function getGambar($htmlOptions=[])
    {
        //jika file ada dalam direktori
        if($this->photo == null && ! file_exists('@web/uploads/'.$this->photo)){
            return Html::img('@web/images/Basis Data.jpg',$htmlOptions);
        } else {
            return Html::img('@web/uploads/'. $this->photo,$htmlOptions);
        }
    }
}
