<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\Helpers\ArrayHelper;

/**
 * This is the model class for table "buku".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $id_jenis
 * @property string $cover
 * @property integer $id_penulis
 */
class Buku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'buku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jenis', 'id_penulis'], 'integer'],
            [['file'], 'file'],
            [['id_jenis'], 'string', 'max' => 33],
            [['cover', 'id_penulis'], 'required'],
            [['nama', 'cover'], 'string', 'max' => 255],
            [['id_penulis'], 'string', 'max' =>40],
            [['id_jenis'], 'exist', 'skipOnError' => true, 'targetClass' => Jenis::className(), 'targetAttribute' => ['id_jenis' => 'id']],
            [['id_penulis'], 'exist', 'skipOnError' => true, 'targetClass' => Penulis::className(), 'targetAttribute' => ['id_penulis' => 'id']],
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
            'id_jenis' => 'Jenis Buku',
            'cover' => 'Cover',
            'id_penulis' => 'Penulis',
        ];
    }


public function getIdJenis()
    {
        return $this->hasOne(Jenis::className(), ['id' => 'id_jenis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPenulis()
    {
        return $this->hasOne(Penulis::className(), ['id' => 'id_penulis']);
    }

    //cara pertama pake fungsi getRelationField
    public function getRelationField($relation, $field)
    {
        if(!empty($this->$relation->$field)){
            return $this->$relation->$field;
        } else {
            return null;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjamen()
    {
        return $this->hasMany(Peminjaman::className(), ['id_buku' => 'id']);
    }
    
    public static function getList()
    {
        return ArrayHelper::map(Buku::find()->all(),'id','nama');
    }
    public static function getCount()
    {
        return self::find()->count();
    }

    public  function upload()
    {
        if ($this->validate()) {
            $this->cover->saveAs('uploads/' .$this->cover->baseName. '.' .$this->cover->extension);
            return true;
        } else {
            return false;
    }
}
}